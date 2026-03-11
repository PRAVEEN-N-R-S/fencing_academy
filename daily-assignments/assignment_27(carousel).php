<?php

/* ===== MYSQL CONNECTION ===== */

$conn = new mysqli("localhost","root","","website_db");

if($conn->connect_error){
    die("Connection Failed");
}

/* ===== FORM SUBMIT ===== */

if(isset($_POST['submit'])){

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$sql = "INSERT INTO users(name,email,phone)
VALUES('$name','$email','$phone')";

$conn->query($sql);

echo "<script>alert('Registration Successful')</script>";

}

?>

<!DOCTYPE html>
<html>
<head>
<title>Carousel Website</title>

<style>

/* ===== BODY ===== */

body{
font-family: Arial;
margin:0;
background:#f2f2f2;
}

/* ===== NAVBAR ===== */

.navbar{
background:#333;
padding:15px;
}

.navbar a{
color:white;
margin:15px;
text-decoration:none;
font-weight:bold;
}

/* ===== CAROUSEL ===== */

.carousel{
width:100%;
height:350px;
overflow:hidden;
position:relative;
}

.carousel img{
width:100%;
height:350px;
display:none;
}

/* ===== FORM ===== */

.form-box{
width:350px;
background:white;
margin:40px auto;
padding:20px;
box-shadow:0 0 10px #ccc;
}

input{
width:100%;
padding:8px;
margin:10px 0;
}

button{
padding:10px;
width:100%;
background:#333;
color:white;
border:none;
}

</style>

</head>

<body>

<!-- ===== NAVBAR ===== -->

<div class="navbar">

<a href="#">Home</a>
<a href="#">Gallery</a>
<a href="#">Register</a>

</div>


<!-- ===== CAROUSEL ===== -->

<div class="carousel">

<img src="https://images.unsplash.com/photo-1508609349937-5ec4ae374ebf" class="slide">
<img src="https://images.unsplash.com/photo-1521412644187-c49fa049e84d" class="slide">
<img src="https://images.unsplash.com/photo-1517649763962-0c623066013b" class="slide">

</div>


<!-- ===== REGISTRATION FORM ===== -->

<div class="form-box">

<h2>Register</h2>

<form method="POST">

<input type="text" name="name" placeholder="Enter Name" required>

<input type="email" name="email" placeholder="Enter Email" required>

<input type="text" name="phone" placeholder="Enter Phone" required>

<button type="submit" name="submit">Register</button>

</form>

</div>


<!-- ===== JAVASCRIPT CAROUSEL ===== -->

<script>

let slides = document.querySelectorAll(".slide");
let index = 0;

function showSlide(){

slides.forEach((img)=>{
img.style.display="none";
});

slides[index].style.display="block";

index++;

if(index==slides.length){
index=0;
}

}

setInterval(showSlide,2000);

showSlide();

</script>


</body>
</html>