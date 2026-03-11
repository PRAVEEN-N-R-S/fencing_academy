<?php
include "../config.php";

if(isset($_POST['add'])){

$game=$_POST['game'];
$trainer=$_POST['trainer'];
$time=$_POST['time'];
$day=$_POST['day'];

$conn->query("INSERT INTO schedule(game,trainer,time,day)
VALUES('$game','$trainer','$time','$day')");
}

?>

<form method="POST">

Game
<input name="game">

Trainer
<input name="trainer">

Time
<input name="time">

Day
<input name="day">

<button name="add">Add Schedule</button>

</form>