<?php
include "config.php";

$sql = "SELECT users.name, attendance.date, attendance.status
FROM attendance
JOIN users
ON attendance.student_id = users.id";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>

<title>Attendance</title>

<style>

table{
width:70%;
margin:auto;
border-collapse:collapse;
}

th,td{
border:1px solid #ccc;
padding:10px;
text-align:center;
}

th{
background:#444;
color:white;
}

h2{
text-align:center;
}

</style>

</head>

<body>

<h2>Student Attendance</h2>

<table>

<tr>
<th>Name</th>
<th>Date</th>
<th>Status</th>
</tr>

<?php
while($row = $result->fetch_assoc()){
?>

<tr>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['date']; ?></td>
<td><?php echo $row['status']; ?></td>
</tr>

<?php
}
?>

</table>

</body>
</html>