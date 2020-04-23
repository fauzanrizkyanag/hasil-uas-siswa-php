<?php
session_start();
if (isset($_SESSION['username'])) {
    header("location:index.php");
}
function loginProcess()
{
    include "db_connect.php";
    $koneksi = koneksiDatabase();
    $data = [
        'username' => $_POST['username'],
        'password' => $_POST['password']
    ];
    $cek = mysqli_query($koneksi, "select * from t_user where username='" . $data['username'] . "' && password='" . $data['password'] . "'");
    $row = mysqli_num_rows($cek);
    if ($row == 1) {
        $_SESSION['username'] = $data['username'];
        header("location:index.php");
    } else {
        echo "<script>alert('username / password anda salah')</script>";
    }
}
if ($_GET) {
    if ($_GET['action'] == 'logout') {
        session_start();
        session_destroy();
        header("location:auth.php");
    }
}
if ($_POST) {
    if ($_POST['username'] == null || $_POST['password'] == null) {
        echo "<script>alert('mohon isilah form login yang benar')</script>";
    } else {
        loginProcess();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="content login-form">
        <h3 class="login-title">Login</h3>
        <?= isset($error) ? $error : null ?>
        <form method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td><label for="username">Username</label></td>
                    <td>:</td>
                    <td><input type="text" name="username" class="input-text auth" id="username"></td>
                </tr>
                <tr>
                    <td><label for="password">Password</label></td>
                    <td>:</td>
                    <td><input type="password" name="password" class="input-text auth" id="password"></td>
                </tr>
                <tr>
                    <td colspan="3"><input type="submit" name="submit" class="button-submit" value="Login"></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>