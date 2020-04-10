<?php

namespace App\Http\Controllers\Payment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Cartao;
use App\Http\Models\PaymentOrder;
use Cielo\API30\Merchant;
use Cielo\API30\Ecommerce\Environment;
use Cielo\API30\Ecommerce\Sale;
use Cielo\API30\Ecommerce\CieloEcommerce;
use Cielo\API30\Ecommerce\Payment;
use Cielo\API30\Ecommerce\CreditCard;
use Cielo\API30\Ecommerce\Request\CieloRequestException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PaymentOrderController extends Controller
{
    public function store(Request $request)
    {
        $resultOk = [];
        $resultError =
            [
                '4' => 'Operação realizada com sucesso',
                '6' => 'Operação realizada com sucesso',
                '05' => 'Não Autorizada',
                '57' => 'Cartão Expirado',
                '78' => 'Cartão Bloqueado',
                '99' => 'Time Out',
                '77' => 'Cartão Cancelado',
                '70' => 'Problemas com o Cartão de Crédito',
                '99' => 'Operation Successful / Time Out'
            ];

        $ordem = PaymentOrder::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->first();
        $card = Cartao::select(DB::raw("credit_card_holder, card_token"))
            ->whereNull("deleted_at")
            ->where("user_id", Auth::user()->id)
            ->where("id", $request->card)->first();

        $environment = Environment::sandbox();

        $merchant = new Merchant('4a46e00c-2319-43aa-b07d-b43108b9c74f', 'XYHDSBVFLQRUHCOVFSMDCXRJVBCLLMUFVTSBWQAL');
        $sale = new Sale('123');

        if ($request->save && !$card) {
            $bandeira = self::get_card_brand($request->number);
            $cartao['user_id'] = Auth::User()->id;
            $cartao['credit_card_holder'] = $request->name;
            $cartao['number'] = $request->number;
            $cartao['bandeira'] = $bandeira;
            $cartao['expiry'] = $request->expiry;
            $cartao['cvc'] = $request->cod;
            $cartao['save'] = 'true';
            $cartao = self::tokenCartao($cartao, $merchant, $environment);
        }
        $payment = $sale->payment(str_replace('.', '', $ordem->valor_transacao));
        if ($ordem->forma == 1) {
            if ($request->save) {
                $payment->setType(Payment::PAYMENTTYPE_CREDITCARD)
                    ->creditCard($request->cod, CreditCard::VISA)
                    ->setCardToken($cartao['card_token']);
            } else {
                $payment->setType(Payment::PAYMENTTYPE_CREDITCARD)
                    ->creditCard($request->cod, CreditCard::VISA)
                    ->setCardToken($card->card_token);
            }
        } elseif ($ordem->forma == 0) {
            if ($request->save) {
                $payment->setType(Payment::PAYMENTTYPE_DEBITCARD)
                    ->debitCard($request->cod, CreditCard::VISA)
                    ->setCardToken($cartao['card_token']);
            } else {
                $payment->setType(Payment::PAYMENTTYPE_DEBITCARD)
                    ->debitCard($request->cod, CreditCard::VISA)
                    ->setCardToken($card->card_token);
            }
        } else {
            
            $payment = $sale->payment(str_replace('.', '', $ordem->valor_transacao), $ordem->forma);
            if ($request->save) {
                $payment->setType(Payment::PAYMENTTYPE_CREDITCARD)
                    ->creditCard($request->cod, CreditCard::VISA)
                    ->setCardToken($cartao['card_token']);
            } else {
                $payment->setType(Payment::PAYMENTTYPE_CREDITCARD)
                    ->creditCard($request->cod, CreditCard::VISA)
                    ->setCardToken($card->card_token);
            }
        }

        try {
            $sale = (new CieloEcommerce($merchant, $environment))->createSale($sale);
            $paymentId = $sale->getPayment()->getPaymentId();
            $paymentReturn = $sale->getPayment()->getReturnCode();
            if ($paymentReturn !== 4 || 6) {
                $order['user_id'] = Auth::user()->id;
                $order['payment_id'] = $paymentId;
                $order['ordem_id'] = "1234";
                $order['status'] = 1;
                $order['sended_at'] = date('Y-m-d H:i:s');
                // $create = PaymentOrder::createCustom($order);
                $client = new \GuzzleHttp\Client(
                    [
                        'headers' => [
                            'Content-Type' => 'application/json',
                            'MerchantId' => '4a46e00c-2319-43aa-b07d-b43108b9c74f',
                            'MerchantKey' => 'XYHDSBVFLQRUHCOVFSMDCXRJVBCLLMUFVTSBWQAL'
                        ],
                        'verify' => false
                    ]
                );
                $response = $client->request('get', 'https://apiquerysandbox.cieloecommerce.cielo.com.br/1/sales/' . $paymentId);
                $resp = json_encode(json_decode($response->getBody(), true));
            }
            return view('payment' . '.result', compact('ctrl', 'item', 'resp', 'paymentReturn', 'resultError'));
        } catch (CieloRequestException $e) {
            return $error = $e->getCieloError();
        }
    }

    public function lista()
    {

        $payments = PaymentOrder::select('*')
            ->where("user_id", Auth::user()->id)
            ->get();

        foreach ($payments as $payment) {
            $payment['data_mes'] = date('M', strtotime($payment->sended_at));
            $payment['data_dia'] = date('d', strtotime($payment->sended_at));
            $payment['valor_formatado'] = number_format($payment->valor_transacao, 2, ',', '.');
            if ($payment->payment_id) {
                $api = "https://apiquerysandbox.cieloecommerce.cielo.com.br/1/sales/" . $payment->payment_id;
                $response = (new \GuzzleHttp\Client)->get(
                    $api,
                    [
                        'headers' => [
                            'Content-Type' => 'application/json',
                            'MerchantId' => '4a46e00c-2319-43aa-b07d-b43108b9c74f',
                            'MerchantKey' => 'XYHDSBVFLQRUHCOVFSMDCXRJVBCLLMUFVTSBWQAL'
                        ]
                    ]
                );
                $resp = json_decode($response->getBody(), true);
                $compra['tipo'] = $resp['Payment']['Type'];
                isset($resp['Payment']['Installments']) ? $compra['parcela'] = $resp['Payment']['Installments'] : $compra['parcela'] = "";
                $compra['vtotal'] = $resp['Payment']['Amount'];
                $resp['Payment']['Type'] == 'DebitCard' ? $payment['cartao'] = $resp['Payment']['DebitCard'] : $payment['cartao'] = $resp['Payment']['CreditCard'];
                $payment['compra'] = $compra;
            }
        }
        return view('payment.transacao', compact('payments'));
    }

    public function tokenCartao($cartao, $merchant, $environment)
    {
        // if(self::cardIsValid($cartao['number'])){
        $cardCielo = new CreditCard();
        $cardCielo->setCustomerName($cartao['credit_card_holder']);
        $cardCielo->setCardNumber($cartao['number']);
        $cardCielo->setHolder($cartao['credit_card_holder']);
        $cardCielo->setExpirationDate($cartao['expiry']);
        $cardCielo->setBrand($cartao['bandeira']);
        $cardCielo->setSecurityCode($cartao['cvc']);
        $cardCielo->setSaveCard(true);
        try {
            $cardCielo = (new CieloEcommerce($merchant, $environment))->tokenizeCard($cardCielo);
            $cartao['card_token'] = $cardCielo->getCardToken();
            $save = filter_var($cartao['save'], FILTER_VALIDATE_BOOLEAN);
            if ($save == true) {
                Cartao::createCustom($cartao);
            }
            return $cartao;
        } catch (CieloRequestException $e) {
            return $error = $e->getCieloError();
        }
        // }else{
        //     dd("não valido");
        // }
    }

    public function bandeira()
    {
        define('CARD_NUMBERS', [
            'AMEX' => [
                '34' => ['15'],
                '37' => ['15'],
            ],
            'DINERS' => [
                '36'      => ['14-19'],
                '300-305' => ['16-19'],
                '3095'    => ['16-19'],
                '38-39'   => ['16-19'],
            ],
            "ELO" => [
                "40117" => ['16'],
                "431274" => ['16'],
                "438935" => ['16'],
                "451416" => ['16'],
                "457393" => ['16'],
                "457631" => ['16'],
                "457632" => ['16'],
                "4984" => ['16'],
                "504175" => ['16'],
                "506699" => ['16'],
                "5067" => ['16'],
                "50900" => ['16'],
                "5090" => ['16'],
                "5091" => ['16'],
                "5092" => ['16'],
                "5093" => ['16'],
                "5094" => ['16'],
                "5095" => ['16'],
                "5096" => ['16'],
                "5097" => ['16'],
                "5098" => ['16'],
                "5099" => ['16'],
                "627780" => ['16'],
                "636297" => ['16'],
                "636368" => ['16'],
                "6500" => ['16'],
                "6504" => ['16'],
                "6505" => ['16'],
                "6507" => ['16'],
                "6509" => ['16'],
                "6516" => ['16'],
                "6550" => ['16']
            ],
            'JCB' => [
                '3528-3589' => ['16-19'],
            ],
            'DISCOVER' => [
                '6011'          => ['16-19'],
                '622126-622925' => ['16-19'],
                '624000-626999' => ['16-19'],
                '628200-628899' => ['16-19'],
                '64'            => ['16-19'],
                '65'            => ['16-19'],
            ],
            'DANKORT' => [
                '5019' => ['16'],
            ],
            "HIPERCARD" => [
                "384100" => ['19'],
                "384140" => ['19'],
                "384160" => ['19'],
                "60"     => ['19']
            ],
            'MAESTRO' => [
                '6759'   => ['12-19'],
                '676770' => ['12-19'],
                '676774' => ['12-19'],
                '50'     => ['12-19'],
                '56-69'  => ['12-19'],
            ],
            'MASTERCARD' => [
                '2221-2720' => ['16'],
                '51-55'     => ['16'],
            ],
            'UNIONPAY' => [
                '81' => ['16'], // Treated as Discover cards on Discover network
            ],
            'VISA' => [
                '4' => ['13-19'], // Including related/partner brands: Dankort, Electron, etc. Note: majority of Visa cards are 16 digits, few old Visa cards may have 13 digits, and Visa is introducing 19 digits cards
            ],
        ]);

        return CARD_NUMBERS;
    }

    public function get_card_brand($cardNumber, $validateLength = true)
    {
        $foundCardBrand = '';

        $cardNumber = (string) $cardNumber;
        $cardNumber = str_replace(['-', ' ', '.'], '', $cardNumber); // Trim and remove noise

        if (in_array(substr($cardNumber, 0, 1), ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'])) { // Try to find card number only if first digit is a number, if not then there is no need to check
            $cardNumber = preg_replace('/[^0-9]/', '0', $cardNumber); // Set all non-digits to zero, like "X" and "#" that maybe used to hide some digits
            $cardNumber = str_pad($cardNumber, 6, '0', STR_PAD_RIGHT); // If $cardNumber passed is less than 6 digits, will append 0s on right to make it 6

            $firstSixDigits   = (int) substr($cardNumber, 0, 6); // Get first 6 digits
            $cardNumberLength = strlen($cardNumber); // Total digits of the card

            foreach (self::bandeira() as $brand => $rows) {
                foreach ($rows as $prefix => $lengths) {
                    $prefix    = (string) $prefix;
                    $prefixMin = 0;
                    $prefixMax = 0;
                    if (strpos($prefix, '-') !== false) { // If "dash" exist in prefix, then this is a range of prefixes
                        $prefixArray = explode('-', $prefix);
                        $prefixMin = (int) str_pad($prefixArray[0], 6, '0', STR_PAD_RIGHT);
                        $prefixMax = (int) str_pad($prefixArray[1], 6, '9', STR_PAD_RIGHT);
                    } else { // This is fixed prefix
                        $prefixMin = (int) str_pad($prefix, 6, '0', STR_PAD_RIGHT);
                        $prefixMax = (int) str_pad($prefix, 6, '9', STR_PAD_RIGHT);
                    }

                    $isValidPrefix = $firstSixDigits >= $prefixMin && $firstSixDigits <= $prefixMax; // Is string starts with the prefix

                    if ($isValidPrefix && !$validateLength) {
                        $foundCardBrand = $brand;
                        break 2; // Break from both loops
                    }
                    if ($isValidPrefix && $validateLength) {
                        foreach ($lengths as $length) {
                            $isValidLength = false;
                            if (strpos($length, '-') !== false) { // If "dash" exist in length, then this is a range of lengths
                                $lengthArray = explode('-', $length);
                                $minLength = (int) $lengthArray[0];
                                $maxLength = (int) $lengthArray[1];
                                $isValidLength = $cardNumberLength >= $minLength && $cardNumberLength <= $maxLength;
                            } else { // This is fixed length
                                $isValidLength = $cardNumberLength == (int) $length;
                            }
                            if ($isValidLength) {
                                $foundCardBrand = $brand;
                                break 3; // Break from all 3 loops
                            }
                        }
                    }
                }
            }
        }
        return $foundCardBrand;
    }

    function cardIsValid($cardNumber)
    {
        $number = substr($cardNumber, 0, -1);
        $doubles = [];

        for ($i = 0, $t = strlen($number); $i < $t; ++$i) {
            $doubles[] = substr($number, $i, 1) * ($i % 2 == 0 ? 2 : 1);
        }

        $sum = 0;

        foreach ($doubles as $double) {
            for ($i = 0, $t = strlen($double); $i < $t; ++$i) {
                $sum += (int) substr($double, $i, 1);
            }
        }

        return substr($cardNumber, -1, 1) == (10 - $sum % 10) % 10;
    }
}
