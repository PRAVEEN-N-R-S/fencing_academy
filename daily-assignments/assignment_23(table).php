<!DOCTYPE html>
<html>
<head>
    <title>Table</title>
    <style>
        body {
            font-family: Arial;
            text-align: center;
            padding: 20px;
        }

        table {
            width: 70%;
            margin: auto;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        button {
            padding: 8px 15px;
            margin-bottom: 15px;
            background: green;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<h2>Fetch Data || Async/Await</h2>

<button onclick="loadData()">Load Data</button>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>City</th>
        </tr>
    </thead>
    <tbody id="tableBody"></tbody>
</table>

<script>
async function loadData() {
    try {
        const response = await fetch("tabledata.php");
        const data = await response.json();

        const tableBody = document.getElementById("tableBody");
        tableBody.innerHTML = "";

        data.forEach(user => {
            tableBody.innerHTML += `
                <tr>
                    <td>${user.id}</td>
                    <td>${user.name}</td>
                    <td>${user.email}</td>
                    <td>${user.city}</td>
                </tr>
            `;
        });

    } catch (error) {
        alert("Error loading data");
        console.error(error);
    }
}
</script>

</body>
</html>