<?php
// Initialize variables
$name = $email = $age = "";
$errors = [];
$showVerification = false;

// When form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get values
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $age = trim($_POST["age"]);

    // Validation
    if (empty($name)) {
        $errors["name"] = "Name is required";
    }

    if (empty($email)) {
        $errors["email"] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Invalid email format";
    }

    if (empty($age)) {
        $errors["age"] = "Age is required";
    } elseif (!is_numeric($age) || $age < 1) {
        $errors["age"] = "Enter valid age";
    }

    // If no errors → show verification page
    if (empty($errors)) {
        $showVerification = true;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Form Validation</title>
    <style>
        body { font-family: Arial; text-align: center; margin-top: 40px; }
        form { display: inline-block; text-align: left; }
        input { padding: 8px; margin: 5px 0; width: 250px; }
        .error { color: red; font-size: 14px; }
        button { padding: 8px 15px; margin-top: 10px; }
        .box { border: 1px solid #ccc; padding: 20px; display: inline-block; }
    </style>
</head>
<body>

<?php if ($showVerification): ?>

    <!-- Verification Page -->
    <div class="box">
        <h2>Submitted Details</h2>
        <p><strong>Name:</strong> <?= htmlspecialchars($name) ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>
        <p><strong>Age:</strong> <?= htmlspecialchars($age) ?></p>

        <br>
        <button onclick="window.close()">Close</button>
        <button onclick="window.location.href='<?= $_SERVER['PHP_SELF']; ?>'">Exit</button>
    </div>

<?php else: ?>

    <!-- Form Page -->
    <h2>Validation Form</h2>

    <form method="POST" action="">
        Name:<br>
        <input type="text" name="name" value="<?= htmlspecialchars($name) ?>">
        <div class="error"><?= $errors["name"] ?? "" ?></div>

        Email:<br>
        <input type="text" name="email" value="<?= htmlspecialchars($email) ?>">
        <div class="error"><?= $errors["email"] ?? "" ?></div>

        Age:<br>
        <input type="text" name="age" value="<?= htmlspecialchars($age) ?>">
        <div class="error"><?= $errors["age"] ?? "" ?></div>

        <button type="submit">Submit</button>
    </form>

<?php endif; ?>

</body>
</html>