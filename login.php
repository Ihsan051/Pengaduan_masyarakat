<?php
require_once './database/koneksi.php';

function login($username, $password) {
  global $conn;
  $query = "SELECT * FROM masyarakat WHERE username = '$username' AND password = '$password'";
  $result = $conn->query($query);
  if ($result->num_rows > 0) {
    return true;
  } else {
    return false;
  }
}

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password =  md5($_POST['password']);
  if (login($username, $password)) {
    session_start();
    $_SESSION['username'] = $username;
    header('Location: dashboard.php');
  } else {
    echo "Login gagal!";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
      <div class="col-md-5 d-none d-md-block text-center">
        <img src="./asset/Computer.svg" alt="Illustration of a person with headphones working on a laptop" class="img-fluid" style="max-height: 300px">
      </div>
      <div class="col-md-5">
        <div class="card shadow border-0 card-color">
          <div class="card-body p-4">
            <h2 class="text-center font-color fw-bold mb-4 font-color">Login</h2>
            <form method="post">
              <div class="mb-3">
                <label for="username" class="form-label font-color">Username</label>
                <input type="text" class="form-control background-color text-light border-0" id="username" name="username" placeholder="Username">
              </div>
              <div class="mb-3">
                <label for="password" class="form-label font-color">Password</label>
                <input type="password" class="form-control background-color text-white border-0" id="password" name="password" placeholder="Password">
              </div>
              <button type="submit" class="btn background-color text-light w-100 rounded-pill fw-bold" name="login">Log In</button>
              <div class="text-center mt-3">
                <a href="#" class="text-decoration-none font-color fw-bold">
                  Forgot Password?
                </a>
                <br />
                <a href="register.php" class="text-decoration-none font-color fw-bold">
                  Tidak punya akun? <strong>Register</strong>
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2vUJ8G7HiV2JbBCsrLhY6fZ6o6eSQzM4P6xNF9jEAcxwCgYArsPkvw0D9KN" crossorigin="anonymous"></script>
</body>
</html>