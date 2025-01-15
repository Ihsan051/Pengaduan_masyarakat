<?php
require_once 'database/koneksi.php';
require_once 'login.php';

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

// Tampilkan data user
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profil Saya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Profil Saya</h2>
                <table class="table table-striped">
                    <tr>
                        <th>Nik</th>
                        <td><?php echo $user_data['nik']; ?></td>
                    </tr>
                    <tr>
                        <th>Nama Lengkap</th>
                        <td><?php echo $user_data['nama']; ?></td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td><?php echo $user_data['username']; ?></td>
                    </tr>
                    <tr>
                        <th>No. Telepon</th>
                        <td><?php echo $user_data['telp']; ?></td>
                    </tr>
                </table>
                <a href="edit_profil.php" class="btn btn-primary">Edit Profil</a>
            </div>
        </div>
    </div>
</body>
</html>