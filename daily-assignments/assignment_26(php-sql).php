<?php
include "sql-db.php";

// Insert Data
if (isset($_POST['submit'])) {

    $name   = $_POST['name'];
    $email  = $_POST['email'];
    $course = $_POST['course'];
    $marks  = $_POST['marks'];

    $sql = "INSERT INTO student (name,email,course,marks)
            VALUES ('$name','$email','$course','$marks')";

    mysqli_query($conn, $sql);
}

// Search
$search = "";
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $result = mysqli_query($conn,
        "SELECT * FROM student 
         WHERE name LIKE '%$search%' 
         OR course LIKE '%$search%'");
} else {
    $result = mysqli_query($conn, "SELECT * FROM student");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Form</title>
    <style>
        body{font-family:Arial; max-width:900px; margin:20px auto;}
        input{padding:6px; margin:5px;}
        table{width:100%; border-collapse:collapse;}
        th,td{border:1px solid #ccc; padding:8px;}
        th{background:#f4f4f4;}
    </style>
</head>
<body>

<h2>Student Registration Form</h2>

<form method="POST">
    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="course" placeholder="Course" required>
    <input type="number" name="marks" placeholder="Marks" required>
    <button type="submit" name="submit">Submit</button>
</form>

<hr>

<h3>Search Students</h3>
<form method="GET">
    <input type="text" name="search" placeholder="Search by Name or Course" value="<?= $search ?>">
    <button type="submit">Search</button>
</form>

<hr>

<h3>Student Records</h3>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Course</th>
        <th>Marks</th>
        <th>Date</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['course'] ?></td>
            <td><?= $row['marks'] ?></td>
            <td><?= $row['created_at'] ?? 'N/A' ?></td>
        </tr>
    <?php } ?>

</table>

</body>
</html>