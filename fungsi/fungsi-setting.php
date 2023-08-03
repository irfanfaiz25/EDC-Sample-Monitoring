<?php
include_once 'fungsi.php';


$id = $_SESSION["id"];
$res = mysqli_query($konek, "SELECT * FROM tb_user WHERE id=$id");
while ($row = mysqli_fetch_assoc($res)) {
    $username = $row["username"];
    $nama = $row["nama"];
    $pass = $row["password"];
    $level = $row["level_user"];
    $foto = $row["foto"];
}

if (isset($_POST["btn-pass"])) {
    if (updateProfil($_POST)) {
        header('Location: setting.php');
    } else {
        $errorUpdateProfil = true;
    }
}
