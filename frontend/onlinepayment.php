<?php
$total=$_GET["total"];
include '../src/Instamojo.php';
$API_KEY = "65587527faeffc4395f7a3103547f247";
$AUTH_TOKEN = "052f1b86d18451ef0e24b495214e1525";
$api = new Instamojo\Instamojo($API_KEY, $AUTH_TOKEN);
try {
$response = $api->paymentRequestCreate(array(
"purpose" => "Food-Items-Summary",
"amount" => $total,
"buyer_name" => "Nitesh",
"send_email" => true,
"email" => "nitesh.setti2001@gmail.com",
"phone" => "9912383102",
"redirect_url" => "http://localhost/instamojo/payment-success.php"
));
header('Location: ' . $response['longurl']);
exit();
}catch (Exception $e) {
print('Error: ' . $e->getMessage());
}
?>