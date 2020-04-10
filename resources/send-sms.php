<?php

// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md
// require_once '/path/to/vendor/autoload.php';

use Twilio\Rest\Client;

// Find your Account Sid and Auth Token at twilio.com/console
// DANGER! This is insecure. See http://twil.io/secure
$sid    = "ACa009387a1b313577619057e3a71f04bc";
$token  = "0b47ad877eeae0d6b6aafc0fab396419";
$twilio = new Client($sid, $token);

$message = $twilio->messages
    ->create(
        "+5592988528753", // Destinatário
        array(
            "body" => "[PAGUE TUDO AZUL] Seja bem Vindo Diogo Noleto.",
            "from" => "+19282324092", //nosso número da twilio
            "mediaUrl" => array("http://boleto.nyata.com.br")
        )
    );

print($message->sid);
