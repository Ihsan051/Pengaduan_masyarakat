<?php 
session_start();
include_once 'database/koneksi.php';

require_once 'database/koneksi.php';
if (empty($_SESSION['username'])) {
    # code...
    header('Location: login.php');
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pengaduan Masyarakat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style></style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Pengaduan Masyarakat</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Laporan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profil.php">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="container mt-4">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active">Dashboard</a>
                    <a href="buat_pengaduan.php" class="list-group-item list-group-item-action">Buat Pengaduan</a>
                    <a href="#" class="list-group-item list-group-item-action">Riwayat Pengaduan</a>
                    <a href="#" class="list-group-item list-group-item-action">Manajemen Pengguna</a>
                    <a href="#" class="list-group-item list-group-item-action">Laporan Statistik</a>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                <div class="row">
                    <!-- Card 1: Total Laporan -->
                    <div class="col-md-4">
                        <div class="card text-white bg-primary mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Total Laporan</h5>
                                <p class="card-text">100</p>
                            </div>
                        </div>
                    </div>
                    <!-- Card 2: Laporan Diproses -->
                    <div class="col-md-4">
                        <div class="card text-white bg-warning mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Laporan Diproses</h5>
                                <p class="card-text">25</p>
                            </div>
                        </div>
                    </div>
                    <!-- Card 3: Laporan Selesai -->
                    <div class="col-md-4">
                        <div class="card text-white bg-success mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Laporan Selesai</h5>
                                <p class="card-text">75</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Table: Riwayat Pengaduan -->
                <div class="card">
                    <div class="card-header">
                        Riwayat Pengaduan
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tanggal</th>
                                    <th>Judul</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>2025-01-14</td>
                                    <td>Jalan Rusak</td>
                                    <td><span class="badge bg-warning">Diproses</span></td>
                                    <td><button class="btn btn-sm btn-primary">Detail</button></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>2025-01-10</td>
                                    <td>Sampah Menumpuk</td>
                                    <td><span class="badge bg-success">Selesai</span></td>
                                    <td><button class="btn btn-sm btn-primary">Detail</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>





