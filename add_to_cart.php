<?php
session_start();
require 'navbar/koneksi.php'; // Memuat koneksi database

// Ambil ID produk dari URL
$id = $_GET['id'];

// Query untuk mendapatkan data produk berdasarkan ID
$query = "SELECT * FROM tb_barang WHERE id = $id";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $product = mysqli_fetch_assoc($result);

    // Tambahkan produk ke session keranjang
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity']++;
    } else {
        $_SESSION['cart'][$id] = [
            'name' => $product['name'],
            'price' => $product['price'],
            'quantity' => 1,
        ];
    }

    header("Location: cart.php");
    exit();
} else {
    die("Produk tidak ditemukan.");
}
?>
