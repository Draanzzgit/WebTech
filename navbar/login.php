<?php
session_start();  // Memulai session
require 'koneksi.php';

$email = $_POST["email"];
$password = $_POST["password"];

// Query untuk mencari user berdasarkan email
$query_sql = "SELECT * FROM tb_user WHERE email = '$email'";
$result = mysqli_query($conn, $query_sql);

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);

    // Memeriksa apakah password yang dimasukkan cocok
    if ($password == $user['password']) {
        // Menyimpan data login di session
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $user['username']; // Bisa juga menambahkan informasi lain jika diperlukan

        // Redirect ke halaman utama setelah login berhasil
        header("Location: ../index.php");  // Ganti dengan file utama Anda
        exit();  // Pastikan script tidak dijalankan lebih lanjut
    } else {
        echo "<center><h1>Password Anda Salah. Silahkan Coba Login Kembali.</h1>
              <button><strong><a href='index.html'>Login</a></strong></button></center>";
    }
} else {
    echo "<center><h1>Email Anda Tidak Terdaftar. Silahkan Coba Login Kembali.</h1>
          <button><strong><a href='index.html'>Login</a></strong></button></center>";
}
?>
