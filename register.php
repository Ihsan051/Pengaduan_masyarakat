
<?php
require_once 'database/koneksi.php';

if (isset($_POST['register'])) {
  $nik = $_POST['nik'];
  $nama_lengkap = $_POST['nama'];
  $telepon = $_POST['telp'];
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $query = "INSERT INTO masyarakat (nik, nama, telp, username, password) VALUES ('$nik', '$nama_lengkap', '$telepon', '$username', '$password')";
  $result = $conn->query($query);

  if ($result) {
    echo 'Register berhasil';
  } else {
    echo 'Register gagal';
  }
}
?>

<!DOCTYPE html>
<html>
 <head>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
    crossorigin="anonymous"
  />
  <style>
    .card-color{
      background-color: #d5d5e2 !important;
    }
    .background-color{
      background-color: #6c63fe !important;
    }
    .font-color{
      color: #6c63fe !important;
    }
    ::placeholder {
      color: white !important;
    }
  </style>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
 </head>
 <body class="bg-light">
  <div class="container d-flex justify-content-center align-items-center vh-100">
   <div class="row w-100 justify-content-center align-items-center">
    <div class="col-md-5 d-none d-md-block ">
    <div class="card shadow border-0 card-color">
      <div class="card-body p-4">
       <h2 class=" font-color fw-bold mb-4 font-color text-center">Register</h2>
       <form method="post">
        <div class="mb-2">
         <label for="username" class="font-color">Nik</label>
         <input
           type="text" class="form-control background-color text-light border-0" id="nik" name="nik" placeholder="Masukan Nik"
         />
        </div>
        <div class="mb-2">
         <label for="Nama_lengkap" class="font-color">Nama Lengkap</label>
         <input type="text" class="form-control background-color text-white border-0" id="nama" name="nama" placeholder="Masukan Nama Lengkap "
         />
        </div>
        <div class="mb-2">
         <label for="Nama_lengkap" class="font-color">Telepon</label>
         <input type="text" class="form-control background-color text-white border-0" id="telp" name="telp" placeholder="Masukan Nomor Telepon"
         />
        </div>
        <div class="mb-2">
         <label for="Nama_lengkap" class="font-color">Username</label>
         <input type="text" class="form-control background-color text-white border-0" id="username" name="username" placeholder="Masukan Username"
         />
        </div>
        <div class="mb-4">
         <label for="Password" class="font-color">Password</label>
         <input type="password" class="form-control background-color text-white border-0" id="password" name="password" placeholder="Masukan Password"
         />
        </div>
        <button type="submit" class="btn background-color text-light w-100 rounded-pill fw-bold" name="register">
         Log In
        </button>
        <div class=" mt-3 text-center">
         <a href="#" class="text-decoration-none font-color fw-bold">
          Forgot Password?
         </a>
         <br />
         <a href="login.php" class="text-decoration-none font-color fw-bold">
          Sudah punya akun? <strong>Login</strong>
         </a>
        </div>
       </form>
      </div>
     </div>
    </div>
    <div class="col-md-5">
    <img
       src="./asset/Computer.svg" alt="Illustration of a person with headphones working on a laptop" class="img-fluidstyle ms-5" width="400px" />
    </div>
   </div>
  </div>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2vUJ8G7HiV2JbBCsrLhY6fZ6o6eSQzM4P6xNF9jEAcxwCgYArsPkvw0D9KN"
    crossorigin="anonymous"
  ></script>
 </body>
</html>
