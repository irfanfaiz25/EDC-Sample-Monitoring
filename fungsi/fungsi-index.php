<?php
include_once "fungsi.php";

date_default_timezone_set("Asia/Jakarta");
$date = date("Y-m-d");

$sample = query("SELECT * FROM tb_sample WHERE njo!='' ORDER BY time_stamp DESC");
$sample_scrap = query("SELECT * FROM tb_history WHERE after_test='scrap' ORDER BY time_stamp DESC");
$sample_return = query("SELECT * FROM tb_history WHERE after_test='return' ORDER BY time_stamp DESC");
$sample_exp = query("SELECT * FROM tb_sample WHERE due_date < '$date'");

$sample_pending = mysqli_query($konek, "SELECT COUNT(sample_test) AS total FROM tb_sample WHERE id_loc=0");
while ($row = mysqli_fetch_assoc($sample_pending)) {
    if (mysqli_num_rows($sample_pending) == 0) {
        $pending = "0";
    } else {
        $pending = $row["total"];
    }
}

$sample_ot = mysqli_query($konek, "SELECT COUNT(sample_test) AS total FROM tb_sample WHERE id_loc!=0 AND id_loc!=4");
while ($row = mysqli_fetch_assoc($sample_ot)) {
    if (mysqli_num_rows($sample_ot) == 0) {
        $ot = "0";
    } else {
        $ot = $row["total"];
    }
}

$sample_done = mysqli_query($konek, "SELECT COUNT(sample_test) AS total FROM tb_sample");
while ($row = mysqli_fetch_assoc($sample_done)) {
    if (mysqli_num_rows($sample_done) == 0) {
        $done = "0";
    } else {
        $done = $row["total"];
    }
}

$sample_all = mysqli_query($konek, "SELECT COUNT(sample_test) AS total FROM tb_sample WHERE njo != ''");
while ($row = mysqli_fetch_assoc($sample_all)) {
    if (mysqli_num_rows($sample_all) == 0) {
        $all = "0";
    } else {
        $all = $row["total"];
    }
}

$scrap_count = mysqli_query($konek, "SELECT COUNT(sample_test) AS total FROM tb_history WHERE after_test='scrap'");
while ($row = mysqli_fetch_assoc($scrap_count)) {
    if (mysqli_num_rows($scrap_count) == 0) {
        $scrap = "0";
    } else {
        $scrap = $row["total"];
    }
}

$return_count = mysqli_query($konek, "SELECT COUNT(sample_test) AS total FROM tb_history WHERE after_test='return'");
while ($row = mysqli_fetch_assoc($return_count)) {
    if (mysqli_num_rows($return_count) == 0) {
        $return_c = "0";
    } else {
        $return_c = $row["total"];
    }
}

$exp_count = mysqli_query($konek, "SELECT COUNT(sample_test) AS total FROM tb_sample WHERE due_date < '$date'");
while ($row = mysqli_fetch_assoc($exp_count)) {
    if (mysqli_num_rows($exp_count) == 0) {
        $exp = "0";
    } else {
        $exp = $row["total"];
    }
}


if (isset($_GET["after_test"])) {
    if (update_after($_GET)) {
        header('Location: index.php');
    } else {
        $errorafter = true;
    }
}
