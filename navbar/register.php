<?php
require 'koneksi.php';

$fullname = $_POST["fullname"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];

// Gunakan prepared statement
$stmt = $conn->prepare("SELECT * FROM tb_user WHERE username = ? OR email = ?");
$stmt->bind_param("ss", $username, $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "Pendaftaran Gagal: Username atau Email sudah terdaftar.";
} else {
    $stmt = $conn->prepare("INSERT INTO tb_user (fullname, username, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $fullname, $username, $email, $password);

    if ($stmt->execute()) {
        header("Location: authentication.php");
    } else {
        echo "Pendaftaran Gagal: " . $conn->error;
    }
}
?>
