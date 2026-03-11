<?php
include "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Fencing Academy Registration</title>

<style>

body{
font-family: Arial, sans-serif;
background:#f4f6f9;
margin:0;
padding:0;
}

.container{
width:400px;
margin:50px auto;
background:white;
padding:30px;
border-radius:10px;
box-shadow:0 0 10px rgba(0,0,0,0.1);
}

h2{
text-align:center;
margin-bottom:20px;
}

input, select{
width:100%;
padding:10px;
margin:8px 0;
border:1px solid #ccc;
border-radius:5px;
font-size:14px;
}

button{
width:100%;
padding:10px;
border:none;
background:#007bff;
color:white;
font-size:16px;
border-radius:5px;
cursor:pointer;
margin-top:10px;
}

button:hover{
background:#0056b3;
}

.otp-btn{
background:#28a745;
}

.otp-btn:hover{
background:#1e7e34;
}

#otp_status{
margin-top:10px;
font-size:14px;
color:green;
text-align:center;
}

</style>

<script>

function sendOTP(){

var phone = document.getElementById("phone").value;

if(phone==""){
alert("Enter phone number");
return;
}

var xhr = new XMLHttpRequest();
xhr.open("POST","send_otp.php",true);
xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");

xhr.onload=function(){
document.getElementById("otp_status").innerHTML=this.responseText;
}

xhr.send("phone="+phone);

}

</script>

</head>

<body>

<div class="container">

<h2>Fencing Academy Registration</h2>

<form action="register_process.php" method="POST" enctype="multipart/form-data">

<input type="text" name="name" placeholder="Full Name" required>

<input type="email" name="email" placeholder="Email" required>

<input type="text" name="phone" id="phone" placeholder="Phone Number" required>

<button type="button" class="otp-btn" onclick="sendOTP()">Send OTP</button>

<div id="otp_status"></div>

<input type="text" name="otp" placeholder="Enter OTP" required>

<select name="game" required>

<option value="">Select Game</option>
<option>Foil</option>
<option>Sabre</option>
<option>Epee</option>
<option>Gym</option>

</select>

<select name="trainer" required>

<option value="">Select Trainer</option>
<option>Coach Arun</option>
<option>Coach Ravi</option>
<option>General Training</option>

</select>

<select name="timing" required>

<option value="">Select Timing</option>
<option>Morning</option>
<option>Evening</option>

</select>

<label>Upload Photo</label>
<input type="file" name="photo" required>

<input type="password" name="password" placeholder="Password" required>

<button type="submit">Register</button>

</form>

</div>

</body>
</html>