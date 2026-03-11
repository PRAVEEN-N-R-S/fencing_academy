<?php
/* ===== MYSQL CONNECTION ===== */
$conn = new mysqli("localhost","root","","website_db");

if($conn->connect_error){
    die("Connection Failed: ".$conn->connect_error);
}

/* ===== FORM INSERT ===== */
if(isset($_POST['submit'])){
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];

$sql="INSERT INTO users(name,email,phone) VALUES('$name','$email','$phone')";
$conn->query($sql);

echo "<script>alert('User Registered Successfully');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Promise Based Website</title>

<style>

/* ===== BODY ===== */
body{
font-family:Arial;
margin:0;
background:#f2f2f2;
}

/* ===== NAVBAR ===== */
.navbar{
background:#333;
padding:15px;
text-align:center;
}

.navbar a{
color:white;
margin:20px;
text-decoration:none;
font-weight:bold;
}

/* ===== HERO SECTION ===== */
.hero{
height:250px;
background:linear-gradient(to right,#1f4e79,#4facfe);
color:white;
display:flex;
align-items:center;
justify-content:center;
font-size:28px;
}

/* ===== FORM ===== */
.form-box{
width:350px;
margin:40px auto;
background:white;
padding:20px;
box-shadow:0 0 10px #ccc;
border-radius:6px;
}

input{
width:100%;
padding:10px;
margin:10px 0;
}

button{
width:100%;
padding:10px;
background:#1f4e79;
color:white;
border:none;
cursor:pointer;
}

#status{
text-align:center;
margin-top:10px;
font-weight:bold;
}

</style>

</head>

<body>

<!-- ===== NAVBAR ===== -->
<div class="navbar">
<a href="#">Home</a>
<a href="#">About</a>
<a href="#">Register</a>
</div>

<!-- ===== HERO ===== -->
<div class="hero">
ithu namma.. Promise based Website
</div>

<!-- ===== FORM ===== -->
<div class="form-box">

<h3>Register</h3>

<form id="registerForm" method="POST">

<input type="text" name="name" id="name" placeholder="Enter Name" required>

<input type="email" name="email" id="email" placeholder="Enter Email" required>

<input type="number" name="phone" id="phone" placeholder="Enter phone number" required>

<button type="submit" name="submit">Register</button>

</form>

<div id="status"></div>

</div>


<script>

/* ===== PROMISE FUNCTION ===== */

function validateForm(){

return new Promise(function(resolve,reject){

let name=document.getElementById("name").value;
let email=document.getElementById("email").value;
let phone=document.getElementById("phone").value;

document.getElementById("status").innerHTML="Checking data...";

setTimeout(function(){

if(name.length>2 && email.includes("@")){
resolve("Validation Successful");
}
else{
reject("Invalid Input Data");
}

},1500);

});

}


/* ===== FORM EVENT ===== */

document.getElementById("registerForm").addEventListener("submit",function(event){

event.preventDefault();

validateForm()

.then(function(message){

document.getElementById("status").style.color="green";
document.getElementById("status").innerHTML=message;

/* Submit form after promise success */
setTimeout(()=>{
event.target.submit();
},1000);

})

.catch(function(error){

document.getElementById("status").style.color="red";
document.getElementById("status").innerHTML=error;

});

});

</script>

</body>
</html>