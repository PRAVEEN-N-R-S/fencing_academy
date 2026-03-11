<?php
include "config.php";

if(isset($_POST['phone']) && isset($_POST['otp']) && isset($_POST['new_password']))
{

$phone = $_POST['phone'];
$otp = $_POST['otp'];
$new_password = $_POST['new_password'];

$sql = "SELECT * FROM users WHERE phone='$phone' AND otp='$otp'";
$result = $conn->query($sql);

if($result->num_rows > 0)
{

$update = "UPDATE users SET password='$new_password' WHERE phone='$phone'";
$conn->query($update);

echo "Password Updated Successfully";

}
else
{
echo "Invalid OTP";
}

}
else
{
echo "Form not submitted properly";
}
?>