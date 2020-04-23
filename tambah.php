<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:auth.php');
}
if ($_POST) {
    if ($_POST['submit'] == 'Tambah') {
        if ($_POST['nis'] == null || $_POST['nama'] == null || $_POST['nilai_pabp'] == null || $_POST['nilai_bahasa_indonesia'] == null || $_POST['nilai_ppkn'] == null || $_POST['nilai_bahasa_inggris'] == null || $_POST['nilai_matematika'] == null || $_POST['nilai_bahasa_sunda'] == null || $_POST['nilai_pkk'] == null) {
            echo "<script>alert('mohon isilah data yang lengkap')</script>";
        } else {
            tambahData();
        }
    }
}
function tambahData()
{
    include "db_connect.php";
    $koneksi = koneksiDatabase();
    $cek = mysqli_query($koneksi, "select * from t_nilai_siswa where nis='" . $_POST['nis'] . "'");
    $row = mysqli_num_rows($cek);
    if ($row == 0) {
        $data = [
            'nis' => $_POST['nis'],
            'nama' => $_POST['nama'],
            'jenis_kelamin' => $_POST['jenis_kelamin'],
            'nilai_pabp' => $_POST['nilai_pabp'],
            'nilai_b_indo' => $_POST['nilai_bahasa_indonesia'],
            'nilai_ppkn' => $_POST['nilai_ppkn'],
            'nilai_b_ing' => $_POST['nilai_bahasa_inggris'],
            'nilai_mtk' => $_POST['nilai_matematika'],
            'nilai_b_sund' => $_POST['nilai_bahasa_sunda'],
            'nilai_pkk' => $_POST['nilai_pkk']
        ];
        mysqli_query($koneksi, "insert into t_nilai_siswa values('', '" . $data['nis'] . "', '" . $data['nama'] . "', '" . $data['jenis_kelamin'] . "', '" . $data['nilai_pabp'] . "', '" . $data['nilai_b_indo'] . "', '" . $data['nilai_ppkn'] . "', '" . $data['nilai_b_ing'] . "', '" . $data['nilai_mtk'] . "', '" . $data['nilai_b_sund'] . "', '" . $data['nilai_pkk'] . "')");
        header("location:index.php");
    } else {
        echo "<script>alert('nomor NIS sudah ada di database')</script>";
    }
}
$jenis_kelamin = ["Laki-laki", "Perempuan"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="header">
        <div class="header-title">
            <h3>Tambah Data</h3>
        </div>
        <div class="profile">
            <p>Selamat datang, <?= $_SESSION['username'] ?></p>
            <a href="auth?action=logout">Logout</a>
        </div>
    </div>
    <div class="content">
        <p><a href="index.php" class="button-secondary">Kembali</a></p>
        <form method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td><label for="nis">NIS</label></td>
                    <td>:</td>
                    <td><input type="text" name="nis" class="input-text" id="nis"></td>
                </tr>
                <tr>
                    <td><label for="nama">Nama</label></td>
                    <td>:</td>
                    <td><input type="text" name="nama" class="input-text" id="nama"></td>
                </tr>
                <tr>
                    <td><label for="jenis_kelamin">Jenis Kelamin</label></td>
                    <td>:</td>
                    <td>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="input-select">
                            <?php for ($i = 0; $i < count($jenis_kelamin); $i++) { ?>
                                <option value="<?= $jenis_kelamin[$i] ?>"><?= $jenis_kelamin[$i] ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="nilai_pabp">Nilai PABP</label></td>
                    <td>:</td>
                    <td><input type="text" name="nilai_pabp" class="input-text" id="nilai_pabp"></td>
                </tr>
                <tr>
                    <td><label for="nilai_bahasa_indonesia">Nilai Bahasa Indonesia</label></td>
                    <td>:</td>
                    <td><input type="text" name="nilai_bahasa_indonesia" class="input-text" id="nilai_bahasa_indonesia"></td>
                </tr>
                <tr>
                    <td><label for="nilai_ppkn">Nilai PPKn</label></td>
                    <td>:</td>
                    <td><input type="text" name="nilai_ppkn" class="input-text" id="nilai_ppkn"></td>
                </tr>
                <tr>
                    <td><label for="nilai_bahasa_inggris">Nilai Bahasa Inggris</label></td>
                    <td>:</td>
                    <td><input type="text" name="nilai_bahasa_inggris" class="input-text" id="nilai_bahasa_inggris"></td>
                </tr>
                <tr>
                    <td><label for="nilai_matematika">Nilai Matematika</label></td>
                    <td>:</td>
                    <td><input type="text" name="nilai_matematika" class="input-text" id="nilai_matematika"></td>
                </tr>
                <tr>
                    <td><label for="nilai_bahasa_sunda">Nilai Bahasa Sunda</label></td>
                    <td>:</td>
                    <td><input type="text" name="nilai_bahasa_sunda" class="input-text" id="nilai_bahasa_sunda"></td>
                </tr>
                <tr>
                    <td><label for="nilai_pkk">Nilai PKK</label></td>
                    <td>:</td>
                    <td><input type="text" name="nilai_pkk" class="input-text" id="nilai_pkk"></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><input type="submit" name="submit" class="button-submit" value="Tambah"></td>
                </tr>
            </table>
        </form>
    </div>
    <div class="footer">
        Copyright &copy; <?= date('Y', time()); ?> Fauzan Rizkyana Gunawan (XI-RPL1)
    </div>
</body>

</html>