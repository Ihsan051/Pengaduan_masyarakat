<?php

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'pengaduan_masyarakat';

$conn = new mysqli($host, $username, $password, $dbname);

if(!$conn){
    echo 'koneksi gagal';
}
