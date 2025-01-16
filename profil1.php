<?php
session_start();
require_once 'database/koneksi.php';

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

// Ambil data user dari database
$username = $_SESSION['username'];
$query = "SELECT * FROM masyarakat WHERE username = '$username'";
$result = $conn->query($query);
$user_data = $result->fetch_assoc();

// Tampilkan data profil
?>

<!DOCTYPE html>
           <html>
 <head>
  <link
   crossorigin="anonymous"
   href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
   integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
   rel="stylesheet"
  />
 </head>
 <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
   <div class="container">
    <a class="navbar-brand" href="#">Pengaduan Masyarakat</a>
    <button
     class="navbar-toggler"
     type="button"
     data-bs-toggle="collapse"
     data-bs-target="#navbarNav"
     aria-controls="navbarNav"
     aria-expanded="false"
     aria-label="Toggle navigation"
    >
     <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
     <ul class="navbar-nav ms-auto">
      <li class="nav-item">
       <a class="nav-link" href="#">Beranda</a>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="#">Laporan</a>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="#">Profil</a>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="#">Logout</a>
      </li>
     </ul>
    </div>
   </div>
  </nav>

  <div class="container mt-5">
   <div class="row">
    <div class="col-md-4">
     <div class="card text-center bg-light shadow-sm">
      <div class="card-body">
       <img
        src="https://placehold.co/100x100"
        alt="Profile picture with a landscape background"
        class="rounded-circle mb-3"
        style="width: 100px; height: 100px;"
       />
       <h5 class="card-title"><?php echo $user_data['username']; ?></</h5>
       <p class="card-text text-muted">Level</p>
      </div>
     </div>
    </div>

    <div class="col-md-8">
     <div class="bg-light p-4 rounded shadow-sm">
      <h5 class="mb-4">Identitas Diri</h5>
      <div class="row mb-2">
       <div class="col-4 fw-bold"><?php echo $user_data['nama']; ?></</div>
       <div class="col-8">: nama</div>
      </div>
      <div class="row mb-2">
       <div class="col-4 fw-bold">Alamat</div>
       <div class="col-8">: </div>
      </div>
      <div class="row mb-2">
       <div class="col-4 fw-bold">Email</div>
       <div class="col-8"></div>
      </div>
      <div class="row">
       <div class="col-4 fw-bold">No Telp</div>
       <div class="col-8">: <?php echo $user_data['telp']; ?></</div>
      </div>
     </div>
    </div>
   </div>
  </div>

  <script
   src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
   integrity="sha384-AEN6o7WCkkty9fyxxgT0BG5lV3BjJ+Q6e1Z1j6p6r2b1suudQ/YxszqoAT9uk7yM"
   crossorigin="anonymous"
  ></script>
 </body>
</html>
