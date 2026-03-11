<?php
session_start();
include "config.php";

if(!isset($_SESSION['user'])){
header("Location:index.php");
}
$user=$conn->query("SELECT * FROM users WHERE id='$id'")->fetch_assoc();
?>

<h2>Welcome to NRS Academy</h2>
<img src="uploads/<?php echo $user['photo']; ?>" width="150">

<p>Email: <?php echo $user['email']; ?></p>

<p>Game: <?php echo $user['game']; ?></p>

<p>Trainer: <?php echo $user['trainer']; ?></p>

<a href="idcard.php">My ID Card</a>

<a href="attendance.php">Attendance</a>

<a href="workout.php">Workout Schedule</a>

<a href="logout.php">Logout</a>