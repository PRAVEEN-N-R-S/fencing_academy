 

<?php
// -------- MYSQL CONNECTION ----------
$servername = "localhost";
$username = "root";
$password = "";
$database = "github_db";

$conn = new mysqli($servername, $username, $password, $database);

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY,
    login VARCHAR(100),
    name VARCHAR(100),
    company VARCHAR(100),
    location VARCHAR(100)
)";
$conn->query($sql);

// Insert data if form submitted
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $login = $_POST['login'];
    $name = $_POST['name'];
    $company = $_POST['company'];
    $location = $_POST['location'];

    $insert = "REPLACE INTO users VALUES('$id','$login','$name','$company','$location')";
    $conn->query($insert);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>GitHub Fetch + MySQL</title>
    <style>
        body{
            font-family: Arial;
            text-align:center;
            background:#f4f4f4;
        }
        .card{
            width:350px;
            margin:50px auto;
            padding:20px;
            background:white;
            box-shadow:0 0 10px gray;
            border-radius:10px;
        }
        button{
            padding:10px;
            margin:10px;
            cursor:pointer;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>GitHub User Details</h2>
    <button onclick="getUser()">Fetch User</button>

    <p><b>ID:</b> <span id="id"></span></p>
    <p><b>Login:</b> <span id="login"></span></p>
    <p><b>Name:</b> <span id="fullname"></span></p>
    <p><b>Company:</b> <span id="company"></span></p>
    <p><b>Location:</b> <span id="location"></span></p>

    <form method="POST">
        <input type="hidden" name="id" id="hid_id">
        <input type="hidden" name="login" id="hid_login">
        <input type="hidden" name="name" id="hid_name">
        <input type="hidden" name="company" id="hid_company">
        <input type="hidden" name="location" id="hid_location">
        <button type="submit">Save to MySQL</button>
    </form>
</div>

<script>
function getUser(){
    fetch("https://api.github.com/users/lanuradha9712")
    .then(response => response.json())
    .then(data => {

        let {id, login, name, company, location} = data;

        console.log(id);
        console.log(company);
        console.log(location);
        console.log(name);

        document.querySelector("#id").innerText = id;
        document.querySelector("#login").innerText = login;
        document.querySelector("#fullname").innerText = name;
        document.querySelector("#company").innerText = company;
        document.querySelector("#location").innerText = location;

        // Set hidden form values
        document.querySelector("#hid_id").value = id;
        document.querySelector("#hid_login").value = login;
        document.querySelector("#hid_name").value = name;
        document.querySelector("#hid_company").value = company;
        document.querySelector("#hid_location").value = location;
    });
}
</script>

</body>
</html>