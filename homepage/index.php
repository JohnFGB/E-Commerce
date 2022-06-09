<?php 
 // inisialisasi sesi
session_start();
 
// cec jika user belom login,balikin ke login page
if (!isset($_SESSION['username'])) {
    header("location:../php/login.php");
}
 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- LINK BOX ICON -->
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="../favicon.png" />
    <!-- LINK GOOGLE FONTS (MENAMBAHKAN FONT BARU) -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="style.css" />
    <title>ShopeeFy | Online Shop</title>
  </head>
  <body>
        <!-- SCROLL -->
    <a href="#home" class="scroll-top">
      <i class="bx bxs-up-arrow-square"></i>
    </a>
    <header>
      <div class="nav container">
        <a href="#" class="logo">ShopeeFy</a>
        <!-- NAVBAR -->
        <ul class="navbar">
          <li><a href="#home" class="nav-link">Home</a></li>
          <li><a href="../product/product.php" class="nav-link">Product</a></li>
          <li><a href="../blog/index.html" class="nav-link">Blog</a></li>
          <i class="bx bx-log-out nav-link"><a href="../php/logout.php" class="login"> Logout</a></i>
        </ul>
        <!-- MENU ICON -->
        <div class="menu-icon">
          <div class="line1"></div>
          <div class="line2"></div>
          <div class="line3"></div>
        </div>
      </div>
    </header>
    <div class="header-section"></div>
    <section class="best-selling-product-section">
      <h1 class="section-title">best selling products</h1>
      <div class="product-container">
        <div class="product-cart">
          <img src="https://filebroker-cdn.lazada.co.id/kf/S126243c128194047811d3ea246a77355N.jpg" class="product-img" alt="" />
          <p class="product-name">Goddie</p>
        </div>
        <div class="product-cart">
          <img src="https://cf.shopee.co.id/file/ada52b403db243c044b7d78d3153d778" class="product-img" alt="" />
          <p class="product-name">M&M</p>
        </div>
        <div class="product-cart">
          <img src="https://ncrsport.com/img/storage/large/170923c-1.jpg" class="product-img" alt="" />
          <p class="product-name">Comvas</p>
        </div>
        <div class="product-cart">
          <img src="https://ae01.alicdn.com/kf/H5e99e6b821284f0791e92b7d44d44fdeN.jpg" class="product-img" alt="" />
          <p class="product-name">Covid</p>
        </div>
      </div>
    </section>
    <!--Mid Section-->
    <section class="mid-section">
      <div class="section-item-container">
        <img src="https://img.freepik.com/free-vector/hand-drawn-flat-travel-agency-facebook-cover_23-2149376923.jpg?w=2000" class="section-bg" alt="" />
        <div class="section-info">
          <h1 class="title">ShopeeFy Premium Quality with <span>LOVE</span></h1>
          <p class="info">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolor, est natus. Ut enim itaque eos!</p>
        </div>
      </div>
    </section>
    <!--SECTION KOLEKSI-->
    <section class="image-mid-section">
      <div class="image-collage">
        <div class="image-collection">
          <img src="https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//91/MTA-42183063/adidas_adidas_shoes_superstar_sports_shoes_-eg4958-_full02_iymqcb1y.jpg" class="collage-img" alt="" />
          <img src="https://ae01.alicdn.com/kf/H5e99e6b821284f0791e92b7d44d44fdeN.jpg" class="collage-img" alt="" />
          <img src="https://ncrsport.com/img/storage/large/170923c-1.jpg" class="collage-img" alt="" />
        </div>
      </div>
    </section>
    <section class="end-section">
      <div class="section-item-container">
        <img src="../img/bg-1.png" class="section-bg" alt="" />
        <div class="section-info">
          <h1 class="title">ORDER <span>NOW</span></h1>
          <p class="info">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolor, est natus. Ut enim itaque eos!</p>
        </div>
      </div>
    </section>
    <section class="footer-container" id="footer">
      <div class="social">
        <a href="https://www.instagram.com/johnlnn_/"><i class="bx bxl-instagram"></i></a>
        <a href="https://www.linkedin.com/in/Johnlnn"><i class="bx bxl-linkedin-square"></i></a>
        <a href="https://github.com/JohnFGB"><i class="bx bxl-github"></i></a>
      </div>
      <div class="footer-links">
        <a href="https://www.privacypolicyonline.com/live.php?token=6TdqyNdbPWOAjWgfwkkL0Nqcc0YiMrHq">Privacy Policy</a>
        <a href="https://www.privacypolicyonline.com/live.php?token=4LW1B44Jk3Cy6rfmINdTirvRrUUpUBF2">Terms of Use</a>
        <a href="https://www.privacypolicyonline.com/live.php?token=b4JHlj1kPGdp2j9HD4wYiB7VB2yiNptD">Disclaimer</a>
      </div>
      <!--COPYRIGHT-->
      <p class="author">&#169; JOHN 2022</p>
    </section>
    <script src="index.js"></script>
  </body>
</html>
