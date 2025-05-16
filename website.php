<?php
require('./conection.php');

// Select Semua Produk
$products = crud::Selectproducts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Celesta's Cake</title>
  <link rel="shortcut icon" type="image" href="./images/logo.png">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <!-- bootstrap links -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <!-- bootstrap links -->
  <!-- fonts links -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
  <!-- fonts links -->
  <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }
    .navbar {
        display: flex;
        justify-content: flex-end;
        background-color: white;
        padding: 10px;
    }
    .logout-btn {
        background-color: rgb(0, 0, 0);
        color: white;
        border: none;
        padding: 8px 15px;
        cursor: pointer;
        font-size: 16px;
        border-radius: 5px;
    }
    .logout-btn:hover {
        background-color: darkred;
    }
</style>
</head>
<body>
  <!-- home section -->
  <div class="home-section">
    <nav class="navbar navbar-expand-lg" id="navbar">
      <div class="container-fluid">
        <a class="navbar-brand" href="#" id="logo"><img src="./images/logo.png" alt="" width="30px">Celesta's Cake</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span><i class="fa-solid fa-bars"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#" id="first-child">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Store Location
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: pink;">
                <li><a class="dropdown-item" href="https://www.google.com/maps/place/Jl.+Khatib+Sulaiman,+Kota+Padang,+Sumatera+Barat/@-0.9149156,100.3558888,17z/data=!3m1!4b1!4m6!3m5!1s0x2fd4b8cebb287465:0xedb56d8ddbe53722!8m2!3d-0.9149156!4d100.3584637!16s%2Fg%2F1hf_cbwcf?entry=ttu&g_ep=EgoyMDI1MDMwOC4wIKXMDSoASAFQAw%3D%3D">Padang</a></li>
                <li><a class="dropdown-item" href="https://www.google.co.id/maps/place/Palembang+Icon+Mall/@-2.9758374,104.7396592,17z/data=!3m2!4b1!5s0x2e3b75e78ae37951:0xa1951d1feb306282!4m6!3m5!1s0x2e3b7593e506005f:0x73f563f41ea67273!8m2!3d-2.9758374!4d104.7422341!16s%2Fg%2F11spqvwk0w?entry=ttu&g_ep=EgoyMDI1MDMwOC4wIKXMDSoASAFQAw%3D%3D">Palembang</a></li>
                <li><a class="dropdown-item" href="https://www.google.com/maps/place/Blok+M+Square/@-6.2443433,106.7976949,17z/data=!3m1!5s0x2e69f16ea3e2e873:0xba51b6adb5e3a2e2!4m10!1m2!2m1!1sblok+m+jakarta!3m6!1s0x2e69f1ebfd6daa4d:0x8f10b22d03d7c9db!8m2!3d-6.244593!4d106.800649!15sCg5ibG9rIG0gamFrYXJ0YVoQIg5ibG9rIG0gamFrYXJ0YZIBD3Nob3BwaW5nX2NlbnRlcuABAA!16s%2Fm%2F04jnzbm?entry=ttu&g_ep=EgoyMDI1MDMwOC4wIKXMDSoASAFQAw%3D%3D">Jakarta</a></li>
                </ul>
            </li>
             <!-- Navbar Dropdown -->
    <ul class="nav navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Product
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: pink;">
                <?php
                if (count($products) > 0) {
                    foreach ($products as $product) {
                        echo '<li><a class="dropdown-item" href="#' . strtolower(str_replace(' ', '', $product['name'])) . '">' . $product['name'] . '</a></li>';
                    }
                }
                ?>
            </ul>
        </li>
    </ul>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="#about">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#contact" class="btn" target="_blank" rel="noopener noreferrer">Contact Us</a>
            </li>
          </ul>
         <div class="navbar">
    <a href="history.php" class="btn btn-outline-dark me-2">
        <i class="fa fa-box-open"></i> Pesanan Saya
    </a>
    <button class="logout-btn" onclick="logout()">Logout</button>
</div>
        
        <script>
            function logout() {
                let confirmLogout = confirm("Apakah Anda yakin ingin logout?");
                if (confirmLogout) {
                    alert("Anda telah logout!");
                    window.location.href = "login.php"; 
                }
            }
        </script>
          
            
        </div>
      </div>
    </nav>


    <!-- home content -->
    <section class="home">
      <div class="content">
        <h1>Super Delicious
          <br> <span>Cake</span>
        </h1>
        <p>Manisnya Kebahagiaan, Ada di Sini! 🍰✨</p>
        <a href="#cake" target="_blank">
        <div id="btn"><button>Order Sekarang</button></div>
        </a>
      </div>
      <div class="img">
        <img src="./uploads/c1.png" alt="">
      </div>
    </section>
  
    </div>
  <div class="container" id="cake">
    <h1>Delicious Cake</h1> 
     <!-- Cards for Products -->
     <!-- Cards for Products -->
<div class="row" style="margin-top: 30px;">
   <?php
if (count($products) > 0) {
    foreach ($products as $product) {
        $productId = strtolower(str_replace(' ', '', $product['name']));
        echo '<div class="col-md-3 py-3 py-md-0" style="margin-bottom: 20px;" id="' . $productId . '"> 
                <div class="card">
                    <img src="uploads/' . $product['image'] . '" alt="' . $product['name'] . '">
                    <div class="card-body">
                        <h3>' . $product['name'] . '</h3>
                        <p>' . $product['description'] . '</p>
                        <h5>Rp ' . number_format($product['price'], 0, ',', '.') . ',-</h5>
                        <!-- Form untuk Pemesanan -->
                        <form action="cart.php" method="POST">
                            <input type="hidden" name="product_id" value="' . $product['id'] . '">
                            <input type="hidden" name="product_name" value="' . $product['name'] . '">
                            <input type="hidden" name="product_price" value="' . $product['price'] . '">
                            
                            <!-- Pilihan jumlah barang -->
                            <label for="quantity">Jumlah:</label>
                            <input type="number" name="quantity" id="quantity" min="1" value="1" required>
                            
                            <!-- Tombol untuk Pesan -->
                            <button type="submit" class="btn btn-primary mt-2">Pesan</button>
                        </form>
                    </div>
                </div>
            </div>';
    }
}
?>
  <div class="container" id="about">
    <h1>ABOUT</h1>
    <div class="row align-items-center">
        <div class="col-md-6 d-flex justify-content-center">

          <div id="aboutCarousel" class="carousel slide" >
            <div class="carousel-inner" data-bs-ride="carousel">
              <div class="carousel-item active" data-bs-interval="3000">
                <img src="./uploads/tokocuwe.jpeg" class="d-block mx-auto" alt="About Us Image 1" width="300">
              </div>
              <div class="carousel-item" data-bs-interval="3000">
                <img src="https://i.pinimg.com/1200x/2c/16/70/2c16705496533ef268f4709b16025a27.jpg" class="d-block mx-auto" alt="About Us Image 2" width="300">
              </div>
              <div class="carousel-item" data-bs-interval="3000">
                <img src="https://i.pinimg.com/1200x/5b/4a/83/5b4a8314688d92e16111eeb29e8c725a.jpg" class="d-block mx-auto" alt="About Us Image 3" width="300">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#aboutCarousel" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#aboutCarousel" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
          

        </div>
        <div class="col-md-6">
       
            <p>Berawal dari kecintaan yang mendalam terhadap dessert, Celesta’s Cake hadir untuk menghadirkan hidangan manis yang bukan hanya lezat, tetapi juga menciptakan kebahagiaan dalam setiap gigitannya. Nama Celesta’s Cake diambil dari nama pendirinya, sebagai bentuk dedikasi dan passion dalam menciptakan dessert terbaik untuk dinikmati semua orang.
              Konsep warna brown & pink dipilih dengan makna yang mendalam—cokelat melambangkan kehangatan, ketulusan, dan rasa autentik dalam setiap kreasi kami, sementara pink merepresentasikan kelembutan, kebahagiaan, dan sentuhan kasih dalam setiap sajian.              
              Kami selalu menggunakan bahan berkualitas tinggi dan resep terbaik untuk menciptakan dessert yang rich, indulgent, dan unforgettable. Setiap gigitan dari Celesta’s Cake bukan hanya menghadirkan rasa manis, tetapi juga kebahagiaan yang bisa Anda bagikan dengan orang-orang tercinta.             
              Karena bagi kami, dessert adalah seni, cinta, dan kebahagiaan dalam satu sajian. 🍰💖</p>
           
    </div>
</div>
<br></br>
<br></br>

  <div class="container">
    <h2 id="contact">CONTACT</h2>
  </div>
    <div class="container" id="contact">
    <div class="row">
      <div class="col-md-6 py-3 py-md-0">
         <h3>CONTACT</h3>
         <p>Silakan isi form di bawah ini untuk melakukan pemesanan custom atau konsultasi mengenai kue favorit Anda. Kami akan segera merespons💖✨</p>
         <form id="contactForm">
          <input type="text" id="name" class="input-field" placeholder="Name" required>
          <input type="email" id="email" class="input-field" placeholder="Email" required>
          <input type="tel" id="phone" class="input-field" placeholder="Phone" required>
         <button type="submit" class="button">Send</button>
        </form>
        <p id="confirmationMessage" class="message" style="display: none;">Terima kasih! cek kontak masuk email anda secara berkala untuk mendapatkan informasi terbaru.</p>
    </div>

    <script>
        document.getElementById("contactForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Mencegah reload halaman
            
            // Mengosongkan input fields
            document.getElementById("name").value = "";
            document.getElementById("email").value = "";
            document.getElementById("phone").value = "";
            
            // Menampilkan pesan konfirmasi
            document.getElementById("confirmationMessage").style.display = "block";
        });
    </script>

      <div class="col-md-6 py-3 py-md-0">
        <h3>INFO</h3>
        <p>Ingin menikmati dessert spesial dari Celesta’s Cake atau memiliki pertanyaan? Jangan ragu untuk menghubungi kami! Kami siap melayani pesanan dan memberikan informasi terbaik untuk Anda💖</p>
        <i class="fas fa-phone"> <span>+62852732890008</span></i><br>
        <i class="fa-solid fa-envelope"> <span>celestascakeofficial@gmail.com</span></i><br>
        <i class="fa-solid fa-location-dot"> <span>Jln. Khatib Sulaiman no.46, Kota Padang</span></i><br>
      </div>
    </div>
  </div>
  <footer id="footer" style="margin-top: 50px;">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 footer-contact">
            <a class="navbar-brand" href="#" id="logo2"><img src="./images/logo.png" alt="" width="30px">Celesta's Cake</a>
            <br></br>
            <p>
              Padang <br><br>
              Palembang <br><br>
              Jakarta<br><br>
            </p>
            <strong><i class="fa-solid fa-phone"></i> Phone: <strong>+62852732890008</strong></strong><br></br>
            <strong><i class="fa-solid fa-envelope"></i>Email: <strong>celestascakeofficial@gmail.com</strong></strong><br>
            <a href="cv.html" target="_blank" style="text-decoration: none; color: inherit;">
            <strong>Profile Pengembang</strong>
            </a>
          </div>
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><a href="#home">Home</a></li>
              <li><a href="#about ">About</a></li>
              <li><a href="#contact">Contact</a></li>
              <li><a href="#contact">info</a></li>
              
            </ul>
          </div> 
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>pembayaran</h4>
            <p></p>
            <ul>
              <li>Transfer Bank</a></li>
              <li>Kartu Kredit/Debit</a></li>
              <li>Cash On Delivery</a></li>
              <li>Payment Gateway</a></li>
              
            </ul>
          </div>
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Social Links</h4>
            <p>Kunjungi Media Sosial Kami</p>
            <div class="socail-links mt-3">
              <a href="#"><i class="fa-brands fa-twitter"></i></a>
              <a href="#"><i class="fa-brands fa-facebook"></i></a>
              <a href="#"><i class="fa-brands fa-instagram"></i></a>
              <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  <hr>
  <div class="container py-4">
    <div class="copyright">
      &copy; Copyright <strong>Celesta's Cake</strong>.All Rights reserved
    </div>
    <div class="credits">
      Designed By <a href="https://www.instagram.com/syifacelestaa/">Syifa Naura Milla Celesta</a>
    </div>
  </div>
</footer>
  <a href="#" class="arrow"><i class="fa-solid fa-arrow-up"></i></a>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>