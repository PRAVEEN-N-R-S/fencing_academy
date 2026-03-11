<?php
include "config.php";

$students = $conn->query("SELECT COUNT(*) as total FROM users")->fetch_assoc()['total'];

$attendance = $conn->query("SELECT COUNT(*) as total FROM attendance WHERE date=CURDATE()")->fetch_assoc()['total'];

$coaches = 3;
?>

<h2>Admin Dashboard</h2>

<div class="card">Total Students: <?php echo $students; ?></div>

<div class="card">Today's Attendance: <?php echo $attendance; ?></div>

<div class="card">Coaches: <?php echo $coaches; ?></div>

<a href="students.php">Manage Students</a>
<a href="schedule.php">Training Schedule</a>
<a href="gallery_upload.php">Upload Gallery</a>