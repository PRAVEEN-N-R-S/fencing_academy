<?php

include "config.php";

$phone=$_POST['phone'];

$otp=rand(100000,999999);

$sql="UPDATE users SET otp='$otp',otp_status='pending' WHERE phone='$phone'";

$conn->query($sql);

/* FAST2SMS API */

$fields = array(
"sender_id"=>"FSTSMS",
"message"=>"Your N.R.S. FENCING Academy OTP is $otp",
"language"=>"english",
"route"=>"p",
"numbers"=>$phone
);

$curl = curl_init();

curl_setopt_array($curl, array(
CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_POST => true,
CURLOPT_POSTFIELDS => json_encode($fields),
CURLOPT_HTTPHEADER => array(
"authorization: YOUR_API_KEY",
"content-type: application/json"
),
));

$response = curl_exec($curl);

curl_close(handle: $curl);

echo "OTP Sent";

?>