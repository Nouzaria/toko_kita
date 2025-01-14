<?php
include 'service/connection.php';

if (isset($_GET['id'])) {
    // Ambil ID dari parameter URL
    $id = $_GET['id'];

    // Query untuk mengambil data barang
    $result = $conn->query("SELECT * FROM tb_barang WHERE id = '$id'");
    $mahasiswa = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $id = $_POST['id'];
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $selling_price = $_POST['selling_price'];
    $stock = $_POST['stock'];


    // Query untuk update data barang
    $sql = "UPDATE tb_barang SET 
                name = '$name', 
                category = '$category', 
                price = '$price', 
                selling_price = '$selling_price', 
                stock = '$stock', 
            WHERE id = '$id'";

    // Eksekusi query dan cek hasilnya
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data barang berhasil diperbarui');</script>";
        echo "<script>window.location.href='dashboard.php?page=dashboard';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
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

    <h1>Edit Data Barang</h1>
    <form action="edit_barang.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $barang['id']; ?>">

        <label for="name">Nama Barang:</label>
        <input type="text" id="name" name="name" value="<?php echo $barang['name']; ?>" required>

        <label for="category">Kategori:</label>
        <input type="text" id="category" name="category" value="<?php echo $barang['category']; ?>" required>

        <label for="price">Harga Dasar:</label>
        <input type="text" id="price" name="price" value="<?php echo $barang['price']; ?>" required>

        <label for="selling_price">Harga Jual:</label>
        <input type="text" id="selling_price" name="selling_price" value="<?php echo $barang['selling_price']; ?>" required>

        <label for="stock">Stok:</label>
        <input type="text" id="stock" name="stock" value="<?php echo $barang['stock']; ?>" required>

        <button type="submit">Update Barang</button>
    </form>

    <a href="index.php?page=dashboard">Kembali ke Data Barang</a>

</body>
</html>
