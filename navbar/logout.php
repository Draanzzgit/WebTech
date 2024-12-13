<?php
session_start();

// Hapus semua session yang ada
session_unset();
session_destroy();

// Redirect ke halaman utama setelah logout
header("Location: ../index.php");  // Ganti dengan halaman utama Anda
exit();
?>