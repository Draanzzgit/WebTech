<?php
session_start();

// Ambil ID produk dan jumlah baru dari form
$id = $_POST['id'];
$quantity = (int) $_POST['quantity'];

// Perbarui jumlah produk di session
if (isset($_SESSION['cart'][$id])) {
    if ($quantity > 0) {
        $_SESSION['cart'][$id]['quantity'] = $quantity;
    } else {
        // Jika jumlah diubah menjadi 0, hapus produk
        unset($_SESSION['cart'][$id]);
    }
}

// Redirect kembali ke halaman keranjang
header("Location: cart.php");
exit();
?>
