<?php
session_start();
require_once 'database/koneksi.php';

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

// Proses update data profil
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $telp = $_POST['telp'];

    $query = "UPDATE masyarakat SET nik='$nik', nama='$nama', username='$username', telp='$telp' WHERE username='" . $_SESSION['username'] . "'";
    
    if ($conn->query($query) === TRUE) {
        echo "Profil berhasil diperbarui!";
        header('Location: profil.php');
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
?>