<?php
include 'service/connection.php';

if (isset($_GET['id'])) {
    // Ambil ID dari parameter URL
    $id = $_GET['id'];

    // Query untuk menghapus data barang
    $sql = "DELETE FROM tb_barang WHERE id = '$id'";

    // Eksekusi query dan cek hasilnya
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data barang berhasil dihapus');</script>";
        echo "<script>window.location.href='dashboard.php?page=dashboard';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "ID tidak ditemukan.";
}

$conn->close();
?>