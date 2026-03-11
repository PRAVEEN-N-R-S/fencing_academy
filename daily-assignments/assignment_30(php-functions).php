<?php

/* ===== SESSION ===== */

session_start();
$_SESSION["username"]="Student";

/* ===== INCLUDE FUNCTIONS ===== */

include("header_functions.php");
/*include_once("header_functions.php");*/

/*require("header_functions.php");*/
/*require_once("header_functions.php");*/

/* ===== FILE UPLOAD ===== */

$uploadMessage="";

if(isset($_POST["upload"])){

$fileName=$_FILES["file"]["name"];
$tempName=$_FILES["file"]["tmp_name"];

$folder="uploads/".$fileName;

if(move_uploaded_file($tempName,$folder)){
$uploadMessage="File Uploaded Successfully";
}
else{
$uploadMessage="Upload Failed";
}

}

/* ===== GET METHOD ===== */

$getMessage="";
if(isset($_GET["name"])){
$getMessage="Hello ".$_GET["name"];
}

/* ===== POST METHOD ===== */

$postMessage="";
if(isset($_POST["email"])){
$postMessage="Email Received: ".$_POST["email"];
}

/* ===== REQUEST METHOD ===== */

$requestMessage="";
if(isset($_REQUEST["city"])){
$requestMessage="City: ".$_REQUEST["city"];
}

?>

<!DOCTYPE html>
<html>
<head>
<title>PHP Functions</title>

<style>

body{
font-family:Arial;
background:#f2f2f2;
margin:0;
}

.navbar{
background:#333;
padding:15px;
color:white;
}

.container{
width:500px;
margin:40px auto;
background:white;
padding:20px;
box-shadow:0 0 10px #ccc;
}

input{
width:100%;
padding:8px;
margin:8px 0;
}

button{
padding:10px;
width:100%;
background:#1f4e79;
color:white;
border:none;
}

</style>

</head>

<body>

<div class="navbar">
PHP functions Website
</div>

<div class="container">

<?php siteMessage(); ?>

<h3>GET Example</h3>

<form method="GET">
<input type="text" name="name" placeholder="Enter Name">
<button type="submit">Send GET</button>
</form>

<p><?php echo $getMessage; ?></p>


<h3>POST Example</h3>

<form method="POST">
<input type="email" name="email" placeholder="Enter Email">
<button type="submit">Send POST</button>
</form>

<p><?php echo $postMessage; ?></p>


<h3>REQUEST Example</h3>

<form method="POST">
<input type="text" name="city" placeholder="Enter City">
<button type="submit">Send REQUEST</button>
</form>

<p><?php echo $requestMessage; ?></p>


<h3>File Upload</h3>

<form method="POST" enctype="multipart/form-data">

<input type="file" name="file">

<button name="upload">Upload File</button>

</form>

<p><?php echo $uploadMessage; ?></p>


<h3>Server Information</h3> 

 <?php 

/* echo "Server Name: ".$_SERVER["SERVER_NAME"]."<br>";
echo "Browser: ".$_SERVER["HTTP_USER_AGENT"]."<br>";

?>


<h3>Session Example</h3>

<?php
echo "Logged User: ".$_SESSION["username"];
?>


<h3>Print_r Example</h3>

<?php
print_r($_SERVER);*/
?> 

</div>

</body>
</html>