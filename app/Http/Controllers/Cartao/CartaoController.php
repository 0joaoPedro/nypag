<?php

namespace App\Http\Controllers\Cartao;

use App\Http\Controllers\Controller;
use Cielo\API30\Ecommerce\CieloEcommerce;
use Cielo\API30\Ecommerce\CreditCard;
use Cielo\API30\Ecommerce\Environment;
use Cielo\API30\Ecommerce\Request\CieloRequestException;
use Cielo\API30\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Models\Cartao;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CartaoController extends Controller
{
    public $ctrl = array(
        "name"    => "Cad Cartão",
        "route"   => "cartao",
        "title"   => "Cad Cartão",
        "errors" => ["error_all" => "Você não tem permissão!"]
    );
    public function index()
    {
        $ctrl = $this->ctrl;
        $cartao = Cartao::select(DB::raw("card_token"))->where("user_id", Auth::user()->id)->get();
        return view($ctrl['route'] . '.index', compact('ctrl'));
        // if(sizeof($cartao) > 0){
        // }else{
        //     return view($ctrl['route'] . '.create', compact('ctrl'));
        // }
    }

    public function create()
    {
        $ctrl = $this->ctrl;

        return view($ctrl['route'] . '.create', compact('ctrl'));
    }

    public function store(Request $request)
    {
        $ctrl = $this->ctrl;
        $bandeira = self::get_card_brand($request['number']);
        $number = substr($request['number'], 0, -1);
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
        // if (substr($request['number'], -1, 1) == (10 - $sum % 10) % 10) { validação desativada para testes
        $environment = Environment::sandbox();

        $merchant = new Merchant('4a46e00c-2319-43aa-b07d-b43108b9c74f', 'XYHDSBVFLQRUHCOVFSMDCXRJVBCLLMUFVTSBWQAL');

        $cardCielo = new CreditCard();
        $cardCielo->setCustomerName($request['name']);
        $cardCielo->setCardNumber($request['number']);
        $cardCielo->setHolder($request['name']);
        $cardCielo->setExpirationDate($request['expiry']);
        $cardCielo->setBrand($bandeira);
        $cardCielo->setSecurityCode($request['cvc']);
        $cardCielo->setSaveCard(true);

            $card['user_id'] = Auth::User()->id;
            $card['credit_card_holder'] = $request['name'];
            try {
                $cardCielo = (new CieloEcommerce($merchant, $environment))->tokenizeCard($cardCielo);
                $card['card_token'] = $cardCielo->getCardToken();
                Cartao::createCustom($card);
                return redirect()->route($ctrl['route'], ['ctrl' => $ctrl]);
            } catch (CieloRequestException $e) {
                return $error = $e->getCieloError();
            }
        // } else {
        //     dd('Cartão não válido');
        // }
    }

    public function edit($id)
    {
        $ctrl = $this->ctrl;

        $item = Cartao::where('id', $id)->first();
        return view($ctrl['route'] . '.create', compact('item', 'ctrl'));
    }

    public function update($id, Resquest $request)
    {
        $ctrl = $this->ctrl;
        // $this->validate($request, [
        //   'tipo_conta'    => 'required|string',
        //   'uni_banco_id'  => 'required',
        //   'agencia'       => 'required|numeric|digits_between:2,5',
        //   'conta'         => 'required|string|digits_between:3,12|unique:empresa_contas,conta,' . $id . ',id,deleted_at,NULL'
        // ]);
        Cartao::updateCustom($id, $request->all());
        return redirect()->route($ctrl['route'] . 'index', ['ctrl' => $ctrl]);
    }

    public function destroy($id)
    {
        $data['deleted_at'] = Carbon::now();
        Cartao::updateCustom($id, $data);
    }

    public function lista()
    {
        $ctrl = $this->ctrl;
        $itens = Cartao::select(DB::raw("id, card_token"))
            ->where("user_id", Auth::user()->id)
            ->whereNull('deleted_at')
            ->get();
        if (sizeof($itens) > 0) {
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
            foreach ($itens as $key => $card) {
                $response = $client->request('get', 'https://apiquerysandbox.cieloecommerce.cielo.com.br/1/card/' . $card->card_token);
                $resp = json_encode(json_decode($response->getBody(), true));
                $resp = explode(",", $resp);
                $cardNumber = substr($resp[0], 15, 19);
                $cardNumber = str_replace('"', "", $cardNumber);
                $cardHolder = substr($resp[1], 10, 49);
                $cardHolder = str_replace('"', "", $cardHolder);
                $cardExpiration = substr($resp[2], 18);
                $cardExpiration = str_replace(array('}', '\\', '"'), "", $cardExpiration);
                $cards[$key] = (array($card->id, $cardHolder, $cardNumber, $cardExpiration));
            }
        }
        return view($ctrl['route'] . '.lista', compact('ctrl', 'cards'));
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
