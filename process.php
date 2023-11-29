<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "foralltech";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productDescription = $_POST['productDescription'];

    $targetDirectory = "upload/";
    $targetFile = $targetDirectory . basename($_FILES["productImage"]["name"]);
    move_uploaded_file($_FILES["productImage"]["tmp_name"], $targetFile);

    $sql = "INSERT INTO `user` (`productName`, `productPrice`, `productImage`, `productDescription`) VALUES ('$productName', $productPrice, '$targetFile', '$productDescription')";

    if ($conn->query($sql) === TRUE) {
        echo "Product added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
