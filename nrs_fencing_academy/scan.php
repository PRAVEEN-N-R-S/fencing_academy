<?php

include "config.php";

$id=$_GET['uid'];

$date=date("Y-m-d");
$time=date("H:i:s");

$sql="INSERT INTO attendance(user_id,date,time,status)

VALUES('$id','$date','$time','Present')";

$conn->query($sql);

echo "Attendance Marked";

?>