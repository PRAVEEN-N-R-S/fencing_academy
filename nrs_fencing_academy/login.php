<!DOCTYPE html>
<html>
<head>

<title>Login</title>

<style>

body{
font-family:Arial;
background:#243b55;
display:flex;
justify-content:center;
align-items:center;
height:100vh;
}

.login-box{
background:white;
padding:40px;
border-radius:8px;
width:350px;
text-align:center;
}

input{
width:100%;
padding:10px;
margin:10px 0;
}

button{
width:100%;
padding:10px;
background:#007bff;
border:none;
color:white;
}

a{
display:block;
margin-top:10px;
}

</style>

</head>

<body>

<div class="login-box">

<h2>Login</h2>

<form action="login.php" method="POST">

<input type="email" name="email" placeholder="Email">

<input type="password" name="password" placeholder="Password">

<button type="submit">Login</button>

<a href="forget_password.php">Forgot Password?</a>

</form>

</div>

</body>
</html>