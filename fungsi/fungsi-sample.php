<?php

include_once 'fungsi.php';

$sample = query("SELECT * FROM tb_sample WHERE njo='' AND sample_stat=1");
$sample_ready = query("SELECT * FROM tb_sample WHERE njo!='' AND sample_stat=1");
$today = date("d/m/Y");
// echo $today;

// membuat kode
$query = mysqli_query($konek, "SELECT max(sample_test) AS kodeTerbesar FROM tb_sample");
$data = mysqli_fetch_array($query);
$kode_sample = $data['kodeTerbesar'];
$year_now = date("y");
$urutan = (int) substr($kode_sample, 4, 4);
$urutan++;
$huruf = "ST";
$kode_sample = $huruf . $year_now . sprintf("%04s", $urutan);
// kode selesai


if (isset($_POST["btn-submit"])) {
    if (tambah($_POST)) {
        header('Location: sample.php');
    } else {
        $errorinput = true;
    }
}

if (isset($_POST["edit-sample"])) {
    if (ubahSample($_POST)) {
        header('Location: sample.php');
    } else {
        $errorsample = true;
    }
}

if (isset($_POST["edit-ready"])) {
    if (ubahSample($_POST)) {
        header('Location: sample.php');
    } else {
        $errorready = true;
    }
}
