<?php
    include "service/connection.php";
    session_start();

    $added_message = "";

    if (isset($_SESSION["is_login"])) {
        header("location: dashboard.php");
    }

    if(isset($_POST['tambah_barang'])) {
        $id            = $_POST['id'];
        $name          = $_POST['name'];
        $category      = $_POST['category'];
        $price         = $_POST['price'];
        $selling_price = $_POST['selling_price'];
        $stock         = $_POST['stock'];

        try {
            $sql = "INSERT INTO tb_barang (id, name, category, price, selling_price, stock) VALUES ('$id', '$name', '$category', '$price', $selling_price, $stock)";

            if($conn->query($sql)) {
                $added_message = "Added Successfully";
            } else {
                $added_message = "Failed to Add";
            }
        } catch (mysqli_sql_exception) {
            $added_message = "ID has been taken";
        }
        $conn->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
        }
        form {
            max-width: 500px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="date"], select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <h1>Tambah Data Barang</h1>
    <form action="tambah_barang.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $barang['id']; ?>">

        <label for="name">Nama Barang:</label>
        <input type="text" id="name" name="name" required>

        <label for="category">Kategori:</label>
        <input type="text" id="category" name="category" required>

        <label for="price">Harga Dasar:</label>
        <input type="text" id="price" name="price" required>

        <label for="selling_price">Harga Jual:</label>
        <input type="text" id="selling_price" name="selling_price" required>

        <label for="stock">Stok:</label>
        <input type="text" id="stock" name="stock" required>

        <button type="submit">Tambah Barang</button>
    </form>

    <a href="dashboard.php?page=dashboard">Kembali ke Data Barang</a>

</body>
</html>
