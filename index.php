<?php
require 'navbar/koneksi.php'; // Memuat koneksi database

// Query untuk mengambil semua produk
$query = "SELECT * FROM tb_barang WHERE category IN ('Atasan', 'Bawahan') LIMIT 4";
$result = mysqli_query($conn, $query);
?>

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
            <a class="nav-link active" aria-current="page" href="#">Home</a>
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
              <li><a class="dropdown-item" href="bawahan.php">Bawahan</a></li>
              <li><a class="dropdown-item" href="aksesoris.php">Aksesoris</a></li>
            </ul>
          </li>
        </ul>
        <li class="nav-item">
            <a class="nav-link" href="cart.php">Keranjang</a>
          </li>
      </div>
    </div>
  </div>
</nav>
  <!-- Banner -->
  <section class="container-fluid banner d-flex align-items-center">
    <div class="container">
      <h1 class="text-light text-center display-5 mb-3">Selamat Datang di Brosky Thrift</h1>
      <h2 class="text-light text-center mb-3">Mau Belanja Apa?</h2>
      <div class="col-md-8 offset-2">
      </div>
    </div>
  </section>
  <!-- Hot Sale -->
  <section class="container-fluid py-5">
    <div class="container">
      <h3 class="text-5xl font-bold text-center mb-5 py-5">Hot Sale</h3>

      <div class="row g-4 justify-content-center">
    <?php if ($result && mysqli_num_rows($result) > 0): ?>
        <?php while ($product = mysqli_fetch_assoc($result)): ?>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card" data-aos="fade-up" data-aos-duration="1000">
                    <img class="card-img-top" src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($product['name']) ?></h5>
                        <p class="card-text"><?= htmlspecialchars($product['description']) ?></p>
                        <p class="card-text"><strong>Harga:</strong> Rp<?= number_format($product['price'], 0, ',', '.') ?></p>
                        <a href="add_to_cart.php?id=<?= $product['id'] ?>" class="btn btn-primary text-bg-dark">
                            <i class="bi bi-cart-plus"></i> Keranjang
                        </a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>Produk tidak tersedia.</p>
    <?php endif; ?>
</div>
  <!-- Brands -->
  <section class="mt-4 d-flex flex-column align-items-center">
    <h3 class="text-5xl font-bold text-center mb-5 py-5">Popular Brands</h3>
    <div class="brands-container">
      <div class="brands-slider">
        <div class="brand" data-aos="fade-up" data-aos-duration="1000">
          <img src="image/brand/hnm.png" alt="H&M">
        </div>
        <div class="brand" data-aos="fade-up" data-aos-duration="1000">
          <img src="image/brand/canhart.png" alt="Canhartt">
        </div>
        <div class="brand" data-aos="fade-up" data-aos-duration="1000">
          <img src="image/brand/adidas.png" alt="Adidas">
        </div>
        <div class="brand" data-aos="fade-up" data-aos-duration="1000">
          <img src="image/brand/zara.png" alt="zara">
        </div>
        <div class="brand" data-aos="fade-up" data-aos-duration="1000">
          <img src="image/brand/lacoste.png" alt="Lacoste">
        </div>
      </div>
    </div>
  </section>
  <!--Men&Women-->
  <section class="mt-10 d-flex flex-column align-items-center">
    <h3 class="text-5xl font-bold text-center mb-5 py-5">Recomendation</h3>
    <!-- Flexbox container untuk card -->
    <div class="d-flex flex-row gap-4">
    <div style="display: flex; justify-content: space-between; gap: 2%;">
  <!-- Card 1: MEN -->
  <a href="men.php" style="text-decoration: none; width: 48%;">
    <div class="card text-bg-dark" data-aos="fade-up" data-aos-duration="1000">
      <img src="image/Collection/men.jpg" class="card-img" alt="men" style="width: 100%; height: auto;">
      <div class="card-img-overlay">
        <h5 class="card-title">MEN</h5>
      </div>
    </div>
  </a>

  <!-- Card 2: WOMEN -->
  <a href="women.php" style="text-decoration: none; width: 48%;">
    <div class="card text-bg-dark" data-aos="fade-up" data-aos-duration="1000">
      <img src="image/Collection/women.jpg" class="card-img" alt="women" style="width: 100%; height: auto;">
      <div class="card-img-overlay">
        <h5 class="card-title">WOMEN</h5>
      </div>
    </div>
  </a>
</div>
    </div>
  </section>
  <!--Shop-->
  <section id="shop" class="py-20 bg-white">
    <h3 class="text-5xl font-bold text-center mb-5">Shop</h3>
    <div class="grid grid-cols-2 md:grid-cols-4 w-11/12 md:container mx-auto gap-6">
      <!-- portofolio 1-->
      <div class="shadow-xl" data-aos="fade-up" data-aos-duration="1000">
        <a href="">
          <img src="image/product/thumb/8celana.jpg">
          <div class="py-3 px-5">
          </div>
        </a>
      </div>
      <div class="shadow-xl" data-aos="fade-up" data-aos-duration="1000">
        <a href="">
          <img src="image/product/thumb/11celana.jpg">
          <div class="py-3 px-5">
          </div>
        </a>
      </div>
      <div class="shadow-xl" data-aos="fade-up" data-aos-duration="1000">
        <a href="">
          <img src="image/product/thumb/2aksesoris.jpg">
          <div class="py-3 px-5">
          </div>
        </a>
      </div>
      <div class="shadow-xl" data-aos="fade-up" data-aos-duration="1000">
        <a href="">
          <img src="image/product/thumb/1aksesoris.jpg">
          <div class="py-3 px-5">
          </div>
        </a>
      </div>
      <div class="shadow-xl" data-aos="fade-up" data-aos-duration="1000">
        <a href="">
          <img src="image/product/thumb/3aksesoris.jpg">
          <div class="py-3 px-5">
          </div>
        </a>
      </div>
      <div class="shadow-xl" data-aos="fade-up" data-aos-duration="1000">
        <a href="">
          <img src="image/product/thumb/5aksesoris.jpg">
          <div class="py-3 px-5">
          </div>
        </a>
      </div>
      <div class="shadow-xl" data-aos="fade-up" data-aos-duration="1000">
        <a href="">
          <img src="image/product/thumb/7celana.jpg">
          <div class="py-3 px-5">
          </div>
        </a>
      </div>
      <div class="shadow-xl" data-aos="fade-up" data-aos-duration="1000">
        <a href="">
          <img src="image/product/thumb/9aksesoris.jpg">
          <div class="py-3 px-5">
          </div>
        </a>
      </div>
    </div>
  </section>

  <div class="d-flex justify-content-center mt-4">
    <a href="produk.php" class="btn btn-primary">Go to Products</a>
</div>
  <!--Banner2-->
  <section class="banner-section">
    <div class="container">
      <div class="row" data-aos="fade-up" data-aos-duration="1000">
        <div class="col-12">
          <div class="banner-container">
            <img src="image/banner2.jpg" alt="Banner Image" class="banner-image">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Footer Section -->
  <footer>
    <div class="footer-col">
      <h4>products</h4>
      <ul>
        <li><a href="#">teams</a></li>
        <li><a href="#">advertising</a></li>
        <li><a href="#">talent</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h4>network</h4>
      <ul>
        <li><a href="#">technology</a></li>
        <li><a href="#">science</a></li>
        <li><a href="#">business</a></li>
        <li><a href="#">professional</a></li>
        <li><a href="#">API</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h4>company</h4>
      <ul>
        <li><a href="#">about</a></li>
        <li><a href="#">legal</a></li>
        <li><a href="#">contact us</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h4>follow us</h4>
      <div class="links">
        <a href="#"><i class="fab fa-linkedin-in"></i></a>
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
  </footer>
  <footer>

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