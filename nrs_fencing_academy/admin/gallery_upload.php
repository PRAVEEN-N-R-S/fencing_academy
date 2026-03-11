<?php
include "config.php";

if(isset($_POST['upload'])){

$name=$_FILES['image']['name'];
$tmp=$_FILES['image']['tmp_name'];

move_uploaded_file($tmp,"../gallery/".$name);

$conn->query("INSERT INTO gallery(image) VALUES('$name')");
}
?>

<form method="POST" enctype="multipart/form-data">

<input type="file" name="image">

<button name="upload">Upload</button>

</form>