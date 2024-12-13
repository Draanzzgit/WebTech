<?php
session_start();
require 'navbar/koneksi.php'; // Memuat koneksi database

// Periksa apakah session cart ada
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Broskyy</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<!--navbar-->
<nav class="navbar bg-body-tertiary fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Broskyy</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
      aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Broskyy</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="produk.php">Products</a>
          </li>

          <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true): ?>
            <!-- Jika sudah login, tampilkan Logout -->
            <li class="nav-item">
              <a class="nav-link" href="navbar/logout.php">Logout</a>
            </li>
          <?php else: ?>
            <!-- Jika belum login, tampilkan Sign Up -->
            <li class="nav-item">
              <a class="nav-link" href="navbar/authentication.php">Sign Up</a>
            </li>
          <?php endif; ?>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="atasan.php">Atasan</a></li>
              <li><a class="dropdown-item" href="navbar/bawahan.php">Bawahan</a></li>
              <li><a class="dropdown-item" href="aksesoris.php">Aksesoris</a></li>
            </ul>
          </li>
        </ul>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="cart.php">Keranjang</a>
          </li>
      </div>
    </div>
  </div>
</nav>

<div class="container py-5">
    <h2>Keranjang Belanja</h2>
    <?php if (empty($cart)): ?>
        <p>Keranjang Anda kosong.</p>
    <?php else: ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $total = 0;
                foreach ($cart as $id => $item): 
                    $subtotal = $item['price'] * $item['quantity'];
                    $total += $subtotal;
                ?>
                    <tr>
                        <td><?= htmlspecialchars($item['name']) ?></td>
                        <td>Rp<?= number_format($item['price'], 0, ',', '.') ?></td>
                        <td>
                            <form action="update_cart.php" method="POST" style="display: inline;">
                                <input type="hidden" name="id" value="<?= $id ?>">
                                <input type="number" name="quantity" value="<?= $item['quantity'] ?>" min="1" style="width: 60px;">
                                <button type="submit" class="btn btn-sm btn-primary">Update</button>
                            </form>
                        </td>
                        <td>Rp<?= number_format($subtotal, 0, ',', '.') ?></td>
                        <td>
                            <form action="delete_from_cart.php" method="POST" style="display: inline;">
                                <input type="hidden" name="id" value="<?= $id ?>">
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3"><strong>Total</strong></td>
                    <td><strong>Rp<?= number_format($total, 0, ',', '.') ?></strong></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <a href="index.html" class="btn btn-success">Lanjutkan ke Checkout</a>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"
      integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous"
      async></script>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
</body>
</html>
