<?php

$base = "storage/";
$message = "";

/* CREATE FOLDER */

if(isset($_POST['create_folder'])){

$name = $_POST['foldername'];
$path = $base.$name;

if(!file_exists($path)){
mkdir($path);
$message="Folder Created";
}else{
$message="Folder already exists";
}

}

/* DELETE FOLDER */

if(isset($_POST['delete_folder'])){

$name=$_POST['delete_name'];
$path=$base.$name;

if(is_dir($path)){
rmdir($path);
$message="Folder Deleted";
}

}

/* RENAME FOLDER */

if(isset($_POST['rename_folder'])){

$old=$base.$_POST['old_name'];
$new=$base.$_POST['new_name'];

if(file_exists($old)){
rename($old,$new);
$message="Folder Renamed";
}

}

/* FILE UPLOAD */

if(isset($_POST['upload'])){

$file=$_FILES['file']['name'];
$tmp=$_FILES['file']['tmp_name'];

$path=$base.$file;

if(move_uploaded_file($tmp,$path)){
$message="File Uploaded";
}

}

/* DELETE FILE */

if(isset($_GET['delete'])){

$file=$base.$_GET['delete'];

if(file_exists($file)){
unlink($file);
$message="File Deleted";
}

}

/* LIST FILES */

$files=scandir($base);

?>

<!DOCTYPE html>
<html>
<head>
<title>PHP File Manager</title>

<style>

body{
font-family:Arial;
background:#f2f2f2;
}

.container{
width:600px;
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

.list{
margin-top:20px;
}

.item{
padding:8px;
border-bottom:1px solid #ccc;
}

a{
color:red;
text-decoration:none;
}

.message{
color:green;
font-weight:bold;
}

</style>
</head>

<body>

<div class="container">

<h2>Mini PHP File Manager</h2>

<p class="message"><?php echo $message; ?></p>

<!-- CREATE FOLDER -->

<form method="POST">

<h3>Create Folder</h3>

<input type="text" name="foldername" placeholder="Folder Name">

<button name="create_folder">Create</button>

</form>

<!-- DELETE FOLDER -->

<form method="POST">

<h3>Delete Folder</h3>

<input type="text" name="delete_name" placeholder="Folder Name">

<button name="delete_folder">Delete</button>

</form>

<!-- RENAME -->

<form method="POST">

<h3>Rename Folder</h3>

<input type="text" name="old_name" placeholder="Old Name">

<input type="text" name="new_name" placeholder="New Name">

<button name="rename_folder">Rename</button>

</form>

<!-- FILE UPLOAD -->

<form method="POST" enctype="multipart/form-data">

<h3>Upload File</h3>

<input type="file" name="file">

<button name="upload">Upload</button>

</form>

<!-- DIRECTORY LIST -->

<div class="list">

<h3>Files / Folders</h3>

<?php

foreach($files as $file){

if($file!="." && $file!=".."){

echo "<div class='item'>";

echo $file;

echo " | <a href='?delete=$file'>Delete</a>";

echo "</div>";

}

}

?>

</div>

<!-- PATH -->

<h3>Directory Location</h3>

<?php echo realpath($base); ?>

</div>

</body>
</html>