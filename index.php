<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:auth.php');
}
function tampilDaftarNilaiSiswa()
{
    include 'db_connect.php';
    $koneksi = koneksiDatabase();
    $data = mysqli_query($koneksi, "select * from t_nilai_siswa order by nis asc");
    return $data;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Hasil Ujian Akhir Semester Kelas XI-RPL1</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="header">
        <div class="header-title">
            <h3>Daftar Hasil Ujian Akhir Semester Kelas XI-RPL1</h3>
        </div>
        <div class="profile">
            <p>Selamat datang, <?= $_SESSION['username'] ?></p>
            <a href="auth.php?action=logout">Logout</a>
        </div>
    </div>
    <div class="content">
        <p><a href="tambah.php" class="button-primary tambah-data">Tambah Data</a></p>
        <table border="1" cellspacing="0" cellpadding="7" class="daftar">
            <thead>
                <tr>
                    <th rowspan="2" width="10">No</th>
                    <th rowspan="2" width="10">NIS</th>
                    <th rowspan="2" width="200">Nama</th>
                    <th colspan="7">Nilai</th>
                    <th rowspan="2" colspan="3" width="100">Opsi</th>
                </tr>
                <tr>
                    <th width="79">PABP</th>
                    <th width="79">B. Indo</th>
                    <th width="79">PPKn</th>
                    <th width="79">B. Ing</th>
                    <th width="79">Mat</th>
                    <th width="79">B. Sund</th>
                    <th width="79">PKK</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $data = tampilDaftarNilaiSiswa();
                while ($siswa = mysqli_fetch_array($data)) {
                ?>
                    <tr>
                        <th><?= $no++; ?></th>
                        <td><?= $siswa['nis']; ?></td>
                        <td><?= $siswa['nama']; ?></td>
                        <td><?= $siswa['nilai_pabp']; ?></td>
                        <td><?= $siswa['nilai_b_indo']; ?></td>
                        <td><?= $siswa['nilai_ppkn']; ?></td>
                        <td><?= $siswa['nilai_b_ing']; ?></td>
                        <td><?= $siswa['nilai_mtk']; ?></td>
                        <td><?= $siswa['nilai_b_sund']; ?></td>
                        <td><?= $siswa['nilai_pkk']; ?></td>
                        <td width="50"><a href="detail.php?id=<?= $siswa['id']; ?>" class="button-success">Detail</a></td>
                        <td width="50"><a href="edit.php?id=<?= $siswa['id']; ?>" class="button-warning">Edit</a></td>
                        <td width="50"><a href="javascript:void(0);" class="button-danger" onclick="konfirmasi(<?= $siswa['id'] ?>)">Hapus</a></td>
                    </tr>
                    <script>
                        function konfirmasi(id) {
                            var ya = confirm('Apakah anda yakin menghapus data tersebut?');
                            if (ya == true) {
                                window.location = 'hapus.php?id=' + id;
                            }
                        }
                    </script>
                <?php }
                ?>
            </tbody>
        </table>
    </div>
    <div class="footer">
        Copyright &copy; <?= date('Y', time()); ?> Fauzan Rizkyana Gunawan (XI-RPL1)
    </div>
</body>

</html>