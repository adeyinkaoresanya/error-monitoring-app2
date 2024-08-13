<?php
// send_twilio_alert.php

require 'vendor/autoload.php';


use Twilio\Rest\Client;

$twilio_sid = getenv('TWILIO_ACCOUNT_SID');
$twilio_token = getenv('TWILIO_AUTH_TOKEN');
$twilio_number = getenv('TWILIO_PHONE_NUMBER');
$alert_number = getenv('ALERT_PHONE_NUMBER');


$client = new Client($twilio_sid, $twilio_token);
$error_message = "Critical error detected in your application. Please check the logs immediately.";

$twiml = "<Response><Say>$error_message</Say></Response>";

$client->calls->create(
    $alert_number,
    $twilio_number,
    ['twiml' => $twiml]
);
