<?php
function koneksiDatabase()
{
    $connect = mysqli_connect("localhost", "root", "", "daftar_nilai_siswa");
    return $connect;
}
// $koneksi = koneksiDatabase();
