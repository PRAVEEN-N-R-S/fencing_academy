<?php

$img = $_GET['img'];

$images = array(
1 => "https://images.unsplash.com/photo-1508609349937-5ec4ae374ebf",
2 => "https://images.unsplash.com/photo-1521412644187-c49fa049e84d",
3 => "https://images.unsplash.com/photo-1517649763962-0c623066013b"
);

?>

<!DOCTYPE html>
<html>
<head>
<title>Image View</title>

<style>

body{
margin:0;
background:black;
display:flex;
justify-content:center;
align-items:center;
height:100vh;
}

img{
width:100%;
max-width:1200px;
height:auto;
}

</style>

</head>

<body>

<img src="<?php echo $images[$img]; ?>">

</body>
</html>