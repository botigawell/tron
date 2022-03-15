<?php
include_once '../vendor/autoload.php';

$private_key = ''; // private key tron
$address = ''; // address yang pengen di cek
$token_address = ''; // token address
$api_key = ''; // tronscan api key

$headers = [
    'Content-Type'=> "application/json",
    'TRON-PRO-API-KEY'=> $api_key
];

use IEXBase\TronAPI\Tron;

$fullNode = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io', 30000, false, false, $headers);
$solidityNode = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io', 30000, false, false, $headers);
$eventServer = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io', 30000, false, false, $headers);

try {
    $tron = new \IEXBase\TronAPI\Tron($fullNode, $solidityNode, $eventServer);
} catch (\IEXBase\TronAPI\Exception\TronException $e) {
    exit($e->getMessage());
}

$contract = $tron->contract($token_address);  // Tether USDT https://tronscan.org/#/token20/TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t
echo $contract->balanceOf($address);
die;