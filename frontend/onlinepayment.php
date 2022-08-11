<?php
ob_start();
session_start();
$name=$_SESSION["name"];
$phone=$_SESSION["phno"];
$total = $_GET["to"];
$details=$_GET["total"];
include '../src/Instamojo.php';
include '../backend/dbconnection.php';
$API_KEY = "228dd3d6fc4bdc113e9e2f59c7073dbf";
$AUTH_TOKEN = "c486bc3beff3be0f81c7dd58cd7c098d";
$api = new Instamojo\Instamojo($API_KEY, $AUTH_TOKEN);
try {
        $response = $api->paymentRequestCreate(array(
        "purpose" => "Food-Items-Summary",
        "amount" => $total,
        "buyer_name" => $name,
        "send_email" => true,
        "send_sms" => true,
        "email" => "nitesh.setti2001@gmail.com",
        "phone" => $phone,
        "redirect_url" => "https://knvsrestuarant.000webhostapp.com/FinalYearProject/frontend/bills.php?%20details=".$details
    ));
    header('Location: ' . $response['longurl']);
    exit();
} catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}
