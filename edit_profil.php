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

// Tampilkan form edit profil
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit Profil</h2>
                <form action="update_profil.php" method="post">
                    <div class="form-group">
                        <label for="nik">Nik</label>
                        <input type="text" class="form-control" id="nik" name="nik" value="<?php echo $user_data['nik']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $user_data['nama']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?php echo $user_data['username']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="telp">No. Telepon</label>
                        <input type="text" class="form-control" id="telp" name="telp" value="<?php echo $user_data['telp']; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>