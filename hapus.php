<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:auth.php');
}
function hapusData($id)
{
    include 'db_connect.php';
    $koneksi = koneksiDatabase();
    mysqli_query($koneksi, "delete from t_nilai_siswa where id='$id'");
}
$id = $_GET['id'];
hapusData($id);
header("location:index.php");
