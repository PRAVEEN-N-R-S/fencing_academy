<?php

include "config.php";

$phone=$_POST['phone'];

$otp=rand(100000,999999);

$sql="UPDATE users SET otp='$otp' WHERE phone='$phone'";

$conn->query($sql);

/* Send SMS */

echo "OTP Sent";

?>