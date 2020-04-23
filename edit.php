<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:auth.php');
}
include 'db_connect.php';
$koneksi = koneksiDatabase();
if ($_POST) {
    if ($_POST['submit'] == 'Ubah') {
        if ($_POST['nis'] == null || $_POST['nama'] == null || $_POST['nilai_pabp'] == null || $_POST['nilai_bahasa_indonesia'] == null || $_POST['nilai_ppkn'] == null || $_POST['nilai_bahasa_inggris'] == null || $_POST['nilai_matematika'] == null || $_POST['nilai_bahasa_sunda'] == null || $_POST['nilai_pkk'] == null) {
            echo "<script>alert('mohon isilah data yang lengkap')</script>";
        } else {
            updateData($koneksi);
        }
    }
}
function updateData($koneksi)
{
    $cek = mysqli_query($koneksi, "select * from t_nilai_siswa where nis='" . $_POST['nis'] . "'");
    $row = mysqli_num_rows($cek);
    if ($row == 0 || $_POST['nis_dulu'] == $_POST['nis']) {
        $data = [
            'id' => $_POST['id'],
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
        mysqli_query($koneksi, "update t_nilai_siswa set nis='" . $data['nis'] . "', nama='" . $data['nama'] . "', jenis_kelamin='" . $data['jenis_kelamin'] . "', nilai_pabp='" . $data['nilai_pabp'] . "', nilai_b_indo='" . $data['nilai_b_indo'] . "', nilai_ppkn='" . $data['nilai_ppkn'] . "', nilai_b_ing='" . $data['nilai_b_ing'] . "', nilai_mtk='" . $data['nilai_mtk'] . "', nilai_b_sund='" . $data['nilai_b_sund'] . "', nilai_pkk='" . $data['nilai_pkk'] . "' where id='" . $data['id'] . "'");
        header("location:index.php");
    } else {
        echo "<script>alert('nomor NIS sudah ada di database')</script>";
    }
}
$id = $_GET['id'];
$data = mysqli_query($koneksi, "select * from t_nilai_siswa where id=$id");
$s = mysqli_fetch_array($data);
$jenis_kelamin = ["Laki-laki", "Perempuan"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="header">
        <div class="header-title">
            <h3>Ubah Data</h3>
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
                    <td>
                        <input type="hidden" name="id" value="<?= $s['id'] ?>">
                        <input type="hidden" name="nis_dulu" value="<?= $s['nis'] ?>">
                        <input type="text" name="nis" class="input-text" id="nis" value="<?= $s['nis'] ?>">
                    </td>
                </tr>
                <tr>
                    <td><label for="nama">Nama</label></td>
                    <td>:</td>
                    <td><input type="text" name="nama" class="input-text" id="nama" value="<?= $s['nama'] ?>"></td>
                </tr>
                <tr>
                    <td><label for="jenis_kelamin">Jenis Kelamin</label></td>
                    <td>:</td>
                    <td>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="input-select">
                            <?php for ($i = 0; $i < count($jenis_kelamin); $i++) { ?>
                                <?php if ($jenis_kelamin[$i] == $s['jenis_kelamin']) { ?>
                                    <option value="<?= $jenis_kelamin[$i] ?>" selected><?= $jenis_kelamin[$i] ?></option>
                                <?php } else { ?>
                                    <option value="<?= $jenis_kelamin[$i] ?>"><?= $jenis_kelamin[$i] ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="nilai_pabp">Nilai PABP</label></td>
                    <td>:</td>
                    <td><input type="text" name="nilai_pabp" class="input-text" id="nilai_pabp" value="<?= $s['nilai_pabp'] ?>"></td>
                </tr>
                <tr>
                    <td><label for="nilai_bahasa_indonesia">Nilai Bahasa Indonesia</label></td>
                    <td>:</td>
                    <td><input type="text" name="nilai_bahasa_indonesia" class="input-text" id="nilai_bahasa_indonesia" value="<?= $s['nilai_b_indo'] ?>"></td>
                </tr>
                <tr>
                    <td><label for="nilai_ppkn">Nilai PPKn</label></td>
                    <td>:</td>
                    <td><input type="text" name="nilai_ppkn" class="input-text" id="nilai_ppkn" value="<?= $s['nilai_ppkn'] ?>"></td>
                </tr>
                <tr>
                    <td><label for="nilai_bahasa_inggris">Nilai Bahasa Inggris</label></td>
                    <td>:</td>
                    <td><input type="text" name="nilai_bahasa_inggris" class="input-text" id="nilai_bahasa_inggris" value="<?= $s['nilai_b_ing'] ?>"></td>
                </tr>
                <tr>
                    <td><label for="nilai_matematika">Nilai Matematika</label></td>
                    <td>:</td>
                    <td><input type="text" name="nilai_matematika" class="input-text" id="nilai_matematika" value="<?= $s['nilai_mtk'] ?>"></td>
                </tr>
                <tr>
                    <td><label for="nilai_bahasa_sunda">Nilai Bahasa Sunda</label></td>
                    <td>:</td>
                    <td><input type="text" name="nilai_bahasa_sunda" class="input-text" id="nilai_bahasa_sunda" value="<?= $s['nilai_b_sund'] ?>"></td>
                </tr>
                <tr>
                    <td><label for="nilai_pkk">Nilai PKK</label></td>
                    <td>:</td>
                    <td><input type="text" name="nilai_pkk" class="input-text" id="nilai_pkk" value="<?= $s['nilai_pkk'] ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><input type="submit" name="submit" class="button-submit" value="Ubah"></td>
                </tr>
            </table>
        </form>
    </div>
    <div class="footer">
        Copyright &copy; <?= date('Y', time()); ?> Fauzan Rizkyana Gunawan (XI-RPL1)
    </div>
</body>

</html>