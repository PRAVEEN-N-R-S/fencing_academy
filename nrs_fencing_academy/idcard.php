<?php
session_start();
include "config.php";

$id=$_SESSION['user'];

$sql="SELECT * FROM users WHERE user_id='$id'";

$result=$conn->query($sql);

$row=$result->fetch_assoc();

?>

<div class="idcard">

<h3>N.R.S. Fencing Academy</h3>

<p>Name : <?php echo $row['name']; ?></p>

<p>ID : <?php echo $row['user_id']; ?></p>

<p>Game : <?php echo $row['game']; ?></p>

<img src="<?php echo $row['qr_code']; ?>">

</div>