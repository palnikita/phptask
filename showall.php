<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        nav {
            background-color: #333;
            overflow: hidden;
        }
        nav a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        nav a:hover {
            background-color: #ddd;
            color: black;
        }
        form {
            float: right;
            margin: 10px;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #333;
            color: white;
        }
    </style>
</head>
<body>

<nav>
    <a href="showall.php">Home</a>
    <form action="showall.php" method="GET">
        <input type="text" name="search" placeholder="Search products">
        <button type="submit">Search</button>
    </form>
</nav>

<h2>Product List</h2>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "foralltech";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$search_query = isset($_GET['search']) ? $_GET['search'] : '';

$sql = "SELECT * FROM `user`";
if (!empty($search_query)) {
    $sql .= " WHERE `productName` LIKE '%$search_query%' OR `productDescription` LIKE '%$search_query%'";
}

$result = $conn->query($sql);

if ($result !== false) {
    echo "<table>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Description</th>
            </tr>";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['productName']}</td>
                    <td>{$row['productPrice']}</td>
                    <td><img src='{$row['productImage']}' alt='Product Image' style='width: 50px; height: 50px;'></td>
                    <td>{$row['productDescription']}</td>
                </tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No matching products found.</td></tr>";
    }

    echo "</table>";
} else {
    echo "Error in SQL query: " . $conn->error;
}

$conn->close();
?>

</body>
</html>
