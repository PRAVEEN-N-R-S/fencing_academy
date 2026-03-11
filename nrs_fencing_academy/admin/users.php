<?php
include "../config.php";

$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>Users List</title>

<style>

table{
border-collapse:collapse;
width:80%;
margin:40px auto;
font-family:Arial;
}

th,td{
border:1px solid #ccc;
padding:10px;
text-align:center;
}

th{
background:#007bff;
color:white;
}

</style>

</head>

<body>

<h2 style="text-align:center;">Registered Users</h2>

<table>

<tr>
<th>Name</th>
<th>Email</th>
<th>Game</th>
</tr>

<?php

while($row = $result->fetch_assoc()){
?>

<tr>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['game']; ?></td>
</tr>

<?php
}
?>

</table>

</body>
</html>