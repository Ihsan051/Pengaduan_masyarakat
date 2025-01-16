<?php
session_start();
require_once 'database/koneksi.php';

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

$username = $_SESSION['username'];
$query = "INSERT INTO pengaduan (nik, tanggal_pengaduan, isi_laporan, foto, status) 
          VALUES ('$nik', NOW(), '$isi_laporan', '$foto', '0')";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$nik = $row['nik'];

// Proses pengaduan
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nik = $_POST['nik'];
    $isi_laporan = $_POST['isi_laporan'];
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];

    // Upload foto
    $path = "foto/";
    $upload = move_uploaded_file($tmp, $path . $foto);

    // Simpan data pengaduan ke database
    $query = "INSERT INTO pengaduan (nik, tanggal_pengaduan, isi_laporan, foto, status) VALUES ('$nik', NOW(), '$isi_laporan', '$foto', '0')";
    $result = $conn->query($query);

    if ($result) {
        echo "Pengaduan berhasil dikirim!";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Pengaduan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Form Pengaduan</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" value="<?php echo $_POST['nik']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="isi_laporan">Isi Laporan</label>
                        <textarea class="form-control" id="isi_laporan" name="isi_laporan" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto">
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim Pengaduan</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>