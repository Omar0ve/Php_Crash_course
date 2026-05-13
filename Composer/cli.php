<?php
//This is where we can install third-party packages
require 'vendor/autoload.php';
//we Will define the class 
use Retr0\Composer\MyApp;
//we call the package we just installed 
use GuzzleHttp\Client;
$client = new Client();
//request function take two parameters to get information from the api
$response = $client->request('GET','https://api.coingecko.com/api/v3/simple/price?ids=bitcoin&vs_currencies=usd');
//get body returns JSON string 
$body = $response->getBody();
//now we will call the Json 
$data = json_decode($body);
// the data now stored in the variable data and we will print it 
echo " Bitcoin to USD : " . $data->bitcoin->usd;
$app = new MyApp();
$app->run();



