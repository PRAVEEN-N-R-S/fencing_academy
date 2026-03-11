<?php
header("Content-Type: application/json");

// Sample data (we can replace with database later)
$users = [
    ["id" => 1, "name" => "Praveen", "email" => "praveen@gmail.com", "city" => "Salem"],
    ["id" => 2, "name" => "Arun", "email" => "arun@gmail.com", "city" => "Chennai"],
    ["id" => 3, "name" => "Kumar", "email" => "kumar@gmail.com", "city" => "Coimbatore"]
];

echo json_encode($users);
?>