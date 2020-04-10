<?php

namespace App\Http\Controllers\Cielo;

use App\Http\Controllers\Controller;
use Cielo\API30\Merchant;
use Cielo\API30\Ecommerce\Environment;
use Cielo\API30\Ecommerce\Sale;
use Cielo\API30\Ecommerce\CieloEcommerce;
use Cielo\API30\Ecommerce\Payment;
use Cielo\API30\Ecommerce\CreditCard;
use Cielo\API30\Ecommerce\Request\CieloRequestException;

class PaymentController extends Controller
{
  public function cartaoCredito()
  {
    $environment = $environment = Environment::sandbox();

    $merchant = new Merchant('4a46e00c-2319-43aa-b07d-b43108b9c74f', 'XYHDSBVFLQRUHCOVFSMDCXRJVBCLLMUFVTSBWQAL');

    // Crie uma instância de Sale informando o ID do pedido na loja
    $sale = new Sale('123');

    // Crie uma instância de Customer informando o nome do cliente
    $customer = $sale->customer('Fulano de Tal');

    // Crie uma instância de Payment informando o valor do pagamento
    $payment = $sale->payment(27376);

    // Crie uma instância de Credit Card utilizando os dados de teste
    // esses dados estão disponíveis no manual de integração
    $payment->setType(Payment::PAYMENTTYPE_CREDITCARD)
      ->creditCard("123", CreditCard::VISA)
      ->setExpirationDate("12/2019")
      ->setCardNumber("0000000000000001")
      ->setHolder("Fulano de Tal");

    // Crie o pagamento na Cielo
    try {
      // Configure o SDK com seu merchant e o ambiente apropriado para criar a venda
      $sale = (new CieloEcommerce($merchant, $environment))->createSale($sale);

      // Com a venda criada na Cielo, já temos o ID do pagamento, TID e demais
      // dados retornados pela Cielo
      $paymentId = $sale->getPayment()->getPaymentId();

      // Com o ID do pagamento, podemos fazer sua captura, se ela não tiver sido capturada ainda
      $sale = (new CieloEcommerce($merchant, $environment))->captureSale($paymentId, 15700, 0);

      // E também podemos fazer seu cancelamento, se for o caso
      // $sale = (new CieloEcommerce($merchant, $environment))->cancelSale($paymentId, 15700);
    } catch (CieloRequestException $e) {
      // Em caso de erros de integração, podemos tratar o erro aqui.
      // os códigos de erro estão todos disponíveis no manual de integração.
      $error = $e->getCieloError();
    }
    return $sale;
  }

  public function token()
  {
    $environment = Environment::sandbox();

    $merchant = new Merchant('4a46e00c-2319-43aa-b07d-b43108b9c74f', 'XYHDSBVFLQRUHCOVFSMDCXRJVBCLLMUFVTSBWQAL');

    $card = new CreditCard();
    $card->setCustomerName('Fulano de Tal');
    $card->setCardNumber('0000000000000001');
    $card->setHolder('Fulano de Tal');
    $card->setExpirationDate('10/2020');
    $card->setBrand(CreditCard::VISA);
    try {
      return $card = (new CieloEcommerce($merchant, $environment))->tokenizeCard($card);
      dd($card);

      $cardToken = $card->getCardToken();
    } catch (CieloRequestException $e) {
      $error = $e->getCieloError();
    }
  }

  public function debito()
  {
    $environment = $environment = Environment::sandbox();

    // Configure seu merchant
    $merchant = new Merchant('4a46e00c-2319-43aa-b07d-b43108b9c74f', 'XYHDSBVFLQRUHCOVFSMDCXRJVBCLLMUFVTSBWQAL');

    // Crie uma instância de Sale informando o ID do pedido na loja
    $sale = new Sale('123');

    // Crie uma instância de Customer informando o nome do cliente
    $customer = $sale->customer('Fulano de Tal');

    // Crie uma instância de Payment informando o valor do pagamento
    $payment = $sale->payment(15700);

    // Defina a URL de retorno para que o cliente possa voltar para a loja
    // após a autenticação do cartão
    $payment->setReturnUrl('https://localhost/test');

    // Crie uma instância de Debit Card utilizando os dados de teste
    // esses dados estão disponíveis no manual de integração
    $payment->debitCard("123", CreditCard::VISA)
      ->setExpirationDate("12/2018")
      ->setCardNumber("0000000000000001")
      ->setHolder("Fulano de Tal");

    // Crie o pagamento na Cielo
    try {
      // Configure o SDK com seu merchant e o ambiente apropriado para criar a venda
      $sale = (new CieloEcommerce($merchant, $environment))->createSale($sale);

      // Com a venda criada na Cielo, já temos o ID do pagamento, TID e demais
      // dados retornados pela Cielo
      $paymentId = $sale->getPayment()->getPaymentId();

      // Utilize a URL de autenticação para redirecionar o cliente ao ambiente
      // de autenticação do emissor do cartão
      $authenticationUrl = $sale->getPayment()->getAuthenticationUrl();
    } catch (CieloRequestException $e) {
      // Em caso de erros de integração, podemos tratar o erro aqui.
      // os códigos de erro estão todos disponíveis no manual de integração.
      $error = $e->getCieloError();
    }

    return $sale;
  }

  public function boleto()
  {
    $environment = $environment = Environment::sandbox();

    // Configure seu merchant
    $merchant = new Merchant('4a46e00c-2319-43aa-b07d-b43108b9c74f', 'XYHDSBVFLQRUHCOVFSMDCXRJVBCLLMUFVTSBWQAL');

    // Crie uma instância de Sale informando o ID do pedido na loja
    $sale = new Sale('123');

    // Crie uma instância de Customer informando o nome do cliente,
    // documento e seu endereço
    $customer = $sale->customer('Fulano de Tal')
      ->setIdentity('00000000001')
      ->setIdentityType('CPF')
      ->address()->setZipCode('22750012')
      ->setCountry('BRA')
      ->setState('RJ')
      ->setCity('Rio de Janeiro')
      ->setDistrict('Centro')
      ->setStreet('Av Marechal Camara')
      ->setNumber('123');

    // Crie uma instância de Payment informando o valor do pagamento
    $payment = $sale->payment(15700)
      ->setType(Payment::PAYMENTTYPE_BOLETO)
      ->setAddress('Rua de Teste')
      ->setBoletoNumber('1234')
      ->setAssignor('Empresa de Teste')
      ->setDemonstrative('Desmonstrative Teste')
      ->setExpirationDate(date('d/m/Y', strtotime('+1 month')))
      ->setIdentification('11884926754')
      ->setInstructions('Esse é um boleto de exemplo');

    // Crie o pagamento na Cielo
    try {
      // Configure o SDK com seu merchant e o ambiente apropriado para criar a venda
      $sale = (new CieloEcommerce($merchant, $environment))->createSale($sale);

      // Com a venda criada na Cielo, já temos o ID do pagamento, TID e demais
      // dados retornados pela Cielo
      $paymentId = $sale->getPayment()->getPaymentId();
      $boletoURL = $sale->getPayment()->getUrl();

      printf("URL Boleto: %s\n", $boletoURL);
    } catch (CieloRequestException $e) {
      // Em caso de erros de integração, podemos tratar o erro aqui.
      // os códigos de erro estão todos disponíveis no manual de integração.
      $error = $e->getCieloError();
    }
  }
}
