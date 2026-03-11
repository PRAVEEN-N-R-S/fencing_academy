<!DOCTYPE html>
<html>
<head>

<title> N.R.S. Fencing Academy</title>
<link rel="stylesheet" href="style.css">
<style>

body{
margin:0;
font-family:Arial;
background:color(srgb 0.1 0.1 0.1);
}

/* NAVBAR */

.navbar{
display:flex;
justify-content:space-between;
align-items:center;
background:#111;
color:white;
padding:15px 40px;
}

.navbar h2{
margin:0;
}

.navbar a{
color:white;
text-decoration:none;
margin-left:20px;
}

.login-btn{
background:#ff3c00;
padding:8px 15px;
border-radius:4px;
}

/* HERO SECTION */

.hero{
height:500px;
background:url("fencing_bg2.jpg") center/cover;
display:flex;
align-items:center;
justify-content:center;
color:white;
text-align:center;
}

.hero h1{
font-size:50px;
background:rgba(0, 0, 0, 0.5);
padding:20px;
}

/* ACHIEVEMENTS */

.section{
padding:50px;
text-align:center;
}

.achievements{
display:flex;
justify-content:center;
gap:40px;
margin-top:30px;
}

.box{
background:brown;
padding:30px;
width:200px;
box-shadow:0 0 10px rgba(0,0,0,0.2);
}

/* COACHES */

.coaches{
display:flex;
justify-content:center;
gap:30px;
flex-wrap:wrap;
}

.coach-card{
background:black;
width:250px;
box-shadow:0 0 10px rgba(0, 0, 0, 0.2);
border-radius:8px;
overflow:hidden;
}

.coach-card img{
width:100%;
height:250px;
object-fit:cover;
}

.coach-card h3{
margin:10px;
}

/* GALLERY */

.gallery{
display:flex;
overflow-x:auto;
gap:20px;
padding:20px;
}

.gallery img{
height:200px;
border-radius:8px;
}

/* FOOTER */

footer{
background:#111;
color:white;
text-align:center;
padding:20px;
margin-top:40px;
}

</style>

</head>

<body>
<script src="js/slider.js"></script>
<!-- NAVBAR -->

<div class="navbar">

<h2> N.R.S. Fencing Academy</h2>

<div>

<a href="#">Home</a>
<a href="#">Programs</a>
<a href="#">Gallery</a>
<a href="#">Contact</a>
<a href="login.php" class="login-btn">Login</a>

</div>

</div>

<!-- HERO BANNER -->

<section class="hero">

<div class="hero-content">

<h1> N.R.S. Fencing Academy</h1>

<p>Train Like a Champion</p>

<a href="register.php" class="btn">Join Academy</a>

</div>

</section>

<!-- ACHIEVEMENTS -->

<div class="section">

<h2>🏆 Our Achievements</h2>

<div class="achievements">

<div class="box">
<h1>50+</h1>
<p>State Medals</p>
</div>

<div class="box">
<h1>20+</h1>
<p>National Players</p>
</div>

<div class="box">
<h1>10+</h1>
<p>International Events</p>
</div>

</div>

</div>

<!-- COACHES -->

<div class="section">

<h2>👨‍🏫 Our Coaches</h2>

<div class="coaches">

<div class="coach-card">
<img src="coach2.jpg">
<h3>Coach 1</h3>
<p>Foil Specialist</p>
</div>

<div class="coach-card">
<img src="coach1.jpg">
<h3>Coach 2</h3>
<p>Sabre Specialist</p>
</div>

<div class="coach-card">
<img src="coach3.jpg">
<h3>Coach 3</h3>
<p>Epee specialist</p>
</div>

</div>

</div>

<!-- GALLERY -->

<div class="section">

<h2>📸 Academy Gallery</h2>

<div class="gallery">

<img src="news1.jpg">
<img src="news2.jpg">
<img src="news3.jpg">
<img src="news4.jpg">

</div>

</div>

<!-- FOOTER -->

<footer>

<p>SPOT: MADURAI |PROJECT: TNSKILL |ID: MD2025-M266443</p>
 
</footer>

</body>
</html>