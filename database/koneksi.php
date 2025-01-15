<?php

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'pengaduan_masyarakat';

$koneksi = new mysqli($host, $username, $password, $dbname);

if(!$koneksi){
    echo 'koneksi gagal';
}
