<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- LINK CSS -->
    <link rel="stylesheet" href="style.css" />
    <link rel="shortcut icon" href="../favicon.png" />
    <!-- LINK UNTUK ICON TAMBAHAN -->
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />

    <!-- LINK GOOGLE FONTS (MENAMBAHKAN FONT BARU) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>ShopeeFy | Shopping Cart</title>
  </head>
  <body>
    <!-- HEADER -->
    <header>
      <!-- NAVBAR -->
      <div class="nav container">
        <a href="#" class="logo">ShopeeFy</a>
        <!-- NAVBAR -->
        <ul class="navbar">
          <li><a href="../homepage/index.php" class="nav-link">Home</a></li>
          <li><a href="../product/product.php" class="nav-link">Product</a></li>
          <li><a href="../blog/index.html" class="nav-link">Blog</a></li>
          <i class="bx bx-cart nav-link" id="cart-icon"></i>
          <i class="bx bx-log-out nav-link"><a href="../php/logout.php" class="login"> Logout</a></i>
        </ul>
        <!-- MENU ICON -->
        <div class="menu-icon">
          <div class="line1"></div>
          <div class="line2"></div>
          <div class="line3"></div>
        </div>
        <!-- CART ICON -->

        <!-- ADD TO CART -->
        <div class="cart">
          <h2 class="cart-title">Item Cart</h2>
          <!-- ISI CART -->
          <div class="cart-content"></div>
          <!-- TOTAL HARGA -->
          <div class="total">
            <div class="total-title">Total :</div>
            <div class="total-price">Rp0</div>
          </div>
          <!-- TOMBOL BUY -->
          <button type="button" class="btn-buy">Buy Now</button>
          <!-- TUTUP CART -->
          <i class="bx bx-x-circle" id="close-cart"></i>
        </div>
      </div>
    </header>
    <!-- SECTION BARANG-->
    <section class="shop container">
      <h2 class="section-title">Products</h2>
      <div class="shop-content">
        <div class="product-box">
          <img src="../img/baju2.jpg" alt="" class="product-img" />
          <h2 class="product-title">T-Shirt MASA</h2>
          <span class="price">Rp 120000</span>
          <i class="bx bx-cart add-cart"></i>
        </div>
        <div class="product-box">
          <img src="../img/baju1.jpg" alt="" class="product-img" />
          <h2 class="product-title">T-Shirt Ember</h2>
          <span class="price">Rp 150000</span>
          <i class="bx bx-cart add-cart"></i>
        </div>
        <div class="product-box">
          <img src="https://ae01.alicdn.com/kf/H5e99e6b821284f0791e92b7d44d44fdeN.jpg" alt="" class="product-img" />
          <h2 class="product-title">T-Shirt Covid</h2>
          <span class="price">Rp 90000</span>
          <i class="bx bx-cart add-cart"></i>
        </div>
        <div class="product-box">
          <img src="https://cf.shopee.co.id/file/37d8edf96b9033411818c598e8b95868" alt="" class="product-img" />
          <h2 class="product-title">T-Shirt Streetwear</h2>
          <span class="price">Rp 120000</span>
          <i class="bx bx-cart add-cart"></i>
        </div>
        <div class="product-box">
          <img src="https://ae01.alicdn.com/kf/HTB1y.7XMpXXXXX2XXXXq6xXFXXXb/Gratis-Pengiriman-FLASH-sederhana-pria-desain-logo-unisex-360gsm-800g-berat-zip-up-hoodie-kaus-82.jpg_Q90.jpg_.webp" alt="" class="product-img" />
          <h2 class="product-title">Hoodie Tag</h2>
          <span class="price">Rp120000</span>
          <i class="bx bx-cart add-cart"></i>
        </div>
        <div class="product-box">
          <img src="https://cf.shopee.co.id/file/ada52b403db243c044b7d78d3153d778" alt="" class="product-img" />
          <h2 class="product-title">Hoodie M&M</h2>
          <span class="price">Rp 130000</span>
          <i class="bx bx-cart add-cart"></i>
        </div>
        <div class="product-box">
          <img src="https://filebroker-cdn.lazada.co.id/kf/S126243c128194047811d3ea246a77355N.jpg" alt="" class="product-img" />
          <h2 class="product-title">Hoodie Goodie</h2>
          <span class="price">Rp 110000</span>
          <i class="bx bx-cart add-cart"></i>
        </div>
        <div class="product-box">
          <img src="https://cf.shopee.co.id/file/d322e6deb5418aead2f1e2573590ad5d" alt="" class="product-img" />
          <h2 class="product-title">Crewneck Neckwrec</h2>
          <span class="price">Rp 120000</span>
          <i class="bx bx-cart add-cart"></i>
        </div>
        <div class="product-box">
          <img src="https://ncrsport.com/img/storage/large/170923c-1.jpg" alt="" class="product-img" />
          <h2 class="product-title">Comvass Chuck Norris</h2>
          <span class="price">Rp 120000</span>
          <i class="bx bx-cart add-cart"></i>
        </div>
        <div class="product-box">
          <img src="https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//89/MTA-3428432/nike_nike-men-air-jordan-1-mid-sepatu-sneakers-pria---orange-black--852542-800-_full12.jpg" alt="" class="product-img" />
          <h2 class="product-title">Naik Aer Bondan 1</h2>
          <span class="price">Rp 120000</span>
          <i class="bx bx-cart add-cart"></i>
        </div>
        <div class="product-box">
          <img src="https://www.planetsports.asia/media/catalog/product/cache/932b880b51303ef8bdfacfab1d810ff5/0/1/01-ADIDAS-F34RUADI5-ADIFW6125-Black_6.jpg" alt="" class="product-img" />
          <h2 class="product-title">Ardiles Bima Sakti</h2>
          <span class="price">Rp 120000</span>
          <i class="bx bx-cart add-cart"></i>
        </div>
        <div class="product-box">
          <img src="https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//107/MTA-24657497/puma_puma_shoes_scorch_runner_lotus-sunblaze_original__full07_gsl5u26j.jpg" alt="" class="product-img" />
          <h2 class="product-title">Lion Runner Shoes</h2>
          <span class="price">Rp 120000</span>
          <i class="bx bx-cart add-cart"></i>
        </div>
      </div>
    </section>

    <!-- JAVASCRIPT LINK UNTUK SWEETALERT-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- JAVASCRIPT LINK -->
    <script src="index.js"></script>
  </body>
</html>
