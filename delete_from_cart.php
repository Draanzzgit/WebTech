<?php
session_start();

// Ambil ID produk dari form
$id = $_POST['id'];

// Hapus produk dari session
if (isset($_SESSION['cart'][$id])) {
    unset($_SESSION['cart'][$id]);
}

// Redirect kembali ke halaman keranjang
header("Location: cart.php");
exit();
?>
