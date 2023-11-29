<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
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
            max-width: 600px;
            margin: 20px auto;
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #333;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>

<nav>
    <a href="index.php">Home</a>
    <a href="showall.php">View Products</a>
</nav>

<form action="process.php" method="post" enctype="multipart/form-data">
    <h2>Add Product</h2>
    <label for="productName">Product Name:</label>
    <input type="text" id="productName" name="productName" required>

    <label for="productPrice">Product Price:</label>
    <input type="number" id="productPrice" name="productPrice" required>

    <label for="productImage">Product Image:</label>
    <input type="file" id="productImage" name="productImage" accept="image/*" required>

    <label for="productDescription">Product Description:</label>
    <textarea id="productDescription" name="productDescription" required></textarea>

    <button type="submit">Add Product</button>
</form>

</body>
</html>
