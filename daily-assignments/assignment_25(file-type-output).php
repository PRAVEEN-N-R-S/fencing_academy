<?php
session_start();

// Initialize session storage
if (!isset($_SESSION['submissions'])) {
    $_SESSION['submissions'] = [];
}

// Escape function
function e($v){ return htmlspecialchars($v ?? '', ENT_QUOTES, 'UTF-8'); }

// Handle Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name  = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $skills = $_POST["skills"] ?? [];

    if ($name && $email) {
        $_SESSION['submissions'][] = [
            "name" => $name,
            "email" => $email,
            "phone" => $phone,
            "skills" => $skills,
            "date" => date("Y-m-d H:i:s")
        ];
    }
}

// Export CSV
if (isset($_GET['export']) && $_GET['export'] == 'csv') {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="submissions.csv"');

    $out = fopen('php://output', 'w');
    fputcsv($out, ['Name','Email','Phone','Skills','Date']);

    foreach ($_SESSION['submissions'] as $s) {
        fputcsv($out, [
            $s['name'],
            $s['email'],
            $s['phone'],
            implode('|', $s['skills']),
            $s['date']
        ]);
    }
    fclose($out);
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>file outputs</title>
    <style>
        body{font-family:Arial;max-width:1000px;margin:20px auto}
        form{padding:15px;border:1px solid #e6f4a8;margin-bottom:20px}
        input{padding:6px;margin:5px 0;width:250px}
        table{width:100%;border-collapse:collapse}
        th,td{border:1px solid #f5a6a6;padding:8px}
        th{background:#f4f4f4}
        .tag{background:#eef;padding:3px 6px;border-radius:4px;margin:2px;display:inline-block}
        button{padding:6px 12px;margin:5px}
        .actions{margin:10px 0}
    </style>
</head>
<body>

<h2>User Fills</h2>

<form method="POST">
    <label>Name:</label><br>
    <input type="text" name="name" required><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br>

    <label>Phone:</label><br>
    <input type="text" name="phone"><br>

    <label>Skills (DB):</label><br>
    <input type="checkbox" name="skills[]" value="HTML,CSS"> HTML/CSS
    <input type="checkbox" name="skills[]" value="JavaScript"> JavaScript
    <input type="checkbox" name="skills[]" value="PHP"> PHP
    <br><br>

    <button type="submit">Submit</button>
</form>

<?php if (!empty($_SESSION['submissions'])): ?>

<div class="actions">
    <a href="?export=csv"><button>Export CSV</button></a>
    <button onclick="exportPDF()">Export PDF</button>
</div>

<table id="dataTable">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Skills</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($_SESSION['submissions'] as $s): ?>
        <tr>
            <td><?= e($s['name']) ?></td>
            <td><?= e($s['email']) ?></td>
            <td><?= e($s['phone']) ?></td>
            <td>
                <?php foreach($s['skills'] as $skill): ?>
                    <span class="tag"><?= e($skill) ?></span>
                <?php endforeach; ?>
            </td>
            <td><?= e($s['date']) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php endif; ?>

<script>
// Export as PDF using browser print
function exportPDF() {
    const printContents = document.getElementById("dataTable").outerHTML;
    const win = window.open("", "", "width=900,height=700");
    win.document.write("<html><head><title>Export PDF</title></head><body>");
    win.document.write("<h2>User Submissions</h2>");
    win.document.write(printContents);
    win.document.write("</body></html>");
    win.document.close();
    win.print();
}
</script>

</body>
</html>