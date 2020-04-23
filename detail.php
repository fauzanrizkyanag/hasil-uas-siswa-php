<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:auth.php');
}
function getDataById($id)
{
    include 'db_connect.php';
    $koneksi = koneksiDatabase();
    $data = mysqli_query($koneksi, "select * from t_nilai_siswa where id=$id");
    $hasil = mysqli_fetch_array($data);
    return $hasil;
}
$s = getDataById($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="header">
        <div class="header-title">
            <h3>Detail</h3>
        </div>
        <div class="profile">
            <p>Selamat datang, <?= $_SESSION['username'] ?></p>
            <a href="auth?action=logout">Logout</a>
        </div>
    </div>
    <div class="content">
        <p><a href="index.php" class="button-secondary">Kembali</a></p>
        <div class="detail">
            <p>Nama : <?= $s['nama']; ?></p>
            <p>NIS : <?= $s['nis']; ?></p>
            <p>Jenis Kelamin : <?= $s['jenis_kelamin'] ?></p>
            <p>
                <table>
                    <tr>
                        <td>Pendidikan Agama dan Budi Perketi</td>
                        <td>:</td>
                        <td><?= $s['nilai_pabp'] ?></td>
                    </tr>
                    <tr>
                        <td>Bahasa Indonesia</td>
                        <td>:</td>
                        <td><?= $s['nilai_b_indo'] ?></td>
                    </tr>
                    <tr>
                        <td>PPKn</td>
                        <td>:</td>
                        <td><?= $s['nilai_ppkn'] ?></td>
                    </tr>
                    <tr>
                        <td>Bahasa Inggris</td>
                        <td>:</td>
                        <td><?= $s['nilai_b_ing'] ?></td>
                    </tr>
                    <tr>
                        <td>Matematika</td>
                        <td>:</td>
                        <td><?= $s['nilai_mtk'] ?></td>
                    </tr>
                    <tr>
                        <td>Bahasa Sunda</td>
                        <td>:</td>
                        <td><?= $s['nilai_b_sund'] ?></td>
                    </tr>
                    <tr>
                        <td>Produk Kreatif dan Kewirausahaan</td>
                        <td>:</td>
                        <td><?= $s['nilai_pkk'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <td>Jumlah Nilai</td>
                        <td>:</td>
                        <td><?= $jumlah = $s['nilai_pabp'] + $s['nilai_b_indo'] + $s['nilai_ppkn'] + $s['nilai_b_ing'] + $s['nilai_mtk'] + $s['nilai_b_sund'] + $s['nilai_pkk']; ?></td>
                    </tr>
                    <tr>
                        <td>Nilai Rata-rata</td>
                        <td>:</td>
                        <td><?= $nilaiRata = $jumlah / 7; ?></td>
                    </tr>
                </table>
            </p>
        </div>
    </div>
    <div class="footer">
        Copyright &copy; <?= date('Y', time()); ?> Fauzan Rizkyana Gunawan (XI-RPL1)
    </div>
</body>

</html>