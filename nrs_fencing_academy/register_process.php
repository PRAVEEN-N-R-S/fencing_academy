<?php

include "config.php";
include "phpqrcode/qrlib.php";

$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$game=$_POST['game'];
$trainer=$_POST['trainer'];
$timing=$_POST['timing'];
$password=$_POST['password'];

$user_id="NRS".rand(1000,9999);

$qr_path="qrcodes/".$user_id.".png";

QRcode::png($user_id,$qr_path);

$sql="INSERT INTO users(user_id,name,email,phone,password,game,trainer,timing,qr_code,membership_status)

VALUES('$user_id','$name','$email','$phone','$password','$game','$trainer','$timing','$qr_path','inactive')";

$conn->query($sql);

echo "Registration Success";

?>