<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Pengaduan_masyarakat";

$conn = new mysqli($servername, $username, $password);

if(!$conn){
    echo "Koneksi error";
}
$sql = "DROP DATABASE IF EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database dropped successfully<br>";
} else {
    echo "Error dropping database: " . $conn->error . "<br>";
}

$sql = "CREATE DATABASE $dbname";
if (!$conn->query($sql) === TRUE) {
    echo "Database gagal dibuat";
}

$conn->select_db($dbname);

$table_masyarakat = "CREATE table masyarakat (
            nik char(16) PRIMARY KEY NOT NULL,
            nama varchar(35) NOT NULL,
            username varchar(25) unique NOT NULL,
            password varchar(32) NOT NULL,
            telp varchar(13) NOT NULL
            )";

if($conn->query($table_masyarakat) === TRUE){
    echo "table masyarakat berhasil dibuat";
}else{
    echo "table gagal dibuat" . $conn->error;
}

echo "<br>";

$table_pengaduan = "CREATE table pengaduan (
    id_pengaduan int(11) PRIMARY KEY NOT NULL,
    tanggal_pengaduan date NOT NULL,
    nik char(16) NOT NULL,
    isi_laporan text NOT NULL,
    foto varchar(255) NOT NULL,
    status enum('0','proses','selesai'),
    FOREIGN KEY (nik) REFERENCES masyarakat(nik) 
    )";
 
 if($conn->query($table_pengaduan) === TRUE){
    echo "table Pengaduan berhasil dibuat";
    }else{
    echo "table gagal dibuat" . $conn->error;
    }

    echo "<br>";

$table_petugas = "CREATE table petugas (
    id_petugas int(11) PRIMARY KEY NOT NULL,
    nama_petugas varchar(35) NOT NULL,
    username varchar(25) NOT NULL,
    telp varchar(13) NOT NULL,
    level enum('admin','petugas') NOT NULL
    )";

if($conn->query($table_petugas)){
    echo "Table petugas berhasil dibuat";
}else {
    echo "table petugas gagal dibuat";
}
echo "<br>";


    $table_tanggapan = "CREATE table tanggapan (
        id_tanggapan int(11) PRIMARY KEY NOT NULL,
        id_pengaduan int(11) NOT NULL,
        tgl_tanggapan date NOT NULL,
        tanggapan text NOT NULL,
        id_petugas int(11) NOT NULL,
        FOREIGN KEY (id_petugas) REFERENCES petugas(id_petugas),
        FOREIGN KEY (id_pengaduan) REFERENCES pengaduan(id_pengaduan)
        )";

    if($conn->query($table_tanggapan)){
        echo "table tanggapan berhasil dibuat";
    }else{
        echo "tabble gagal dibuat" . $conn->error;
    }