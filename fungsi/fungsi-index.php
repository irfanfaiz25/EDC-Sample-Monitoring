<?php
include_once "fungsi.php";

date_default_timezone_set("Asia/Jakarta");
$date = date("Y-m-d");

$sample = query("SELECT * FROM tb_sample WHERE njo != '' AND id_loc!=0 AND id_loc!=4 AND sample_stat=1 ORDER BY time_stamp DESC");
$sample_incoming = query("SELECT * FROM tb_sample WHERE njo='' AND id_loc=0 AND sample_stat=1 ORDER BY time_stamp DESC");
$sample_waiting = query("SELECT * FROM tb_sample WHERE njo!='' AND (id_loc=1 OR id_loc=0) AND sample_stat=1 ORDER BY time_stamp DESC");
$sample_scrap = query("SELECT * FROM tb_sample WHERE after_test='scrap' AND sample_stat=0 ORDER BY time_stamp DESC");
$sample_return = query("SELECT * FROM tb_sample WHERE after_test='return' AND sample_stat=0 ORDER BY time_stamp DESC");
$sample_exp_incoming = query("SELECT * FROM tb_sample WHERE due_date < '$date' AND sample_stat=1 AND (id_loc=0 OR id_loc=1)");
$sample_exp_after = query("SELECT * FROM tb_sample WHERE due_date < '$date' AND sample_stat=1 AND id_loc=3");
$sample_history = query("SELECT * FROM tb_sample");

$sample_pending = mysqli_query($konek, "SELECT COUNT(sample_test) AS total FROM tb_sample WHERE njo='' AND id_loc=0 AND sample_stat=1");
while ($row = mysqli_fetch_assoc($sample_pending)) {
    if (mysqli_num_rows($sample_pending) == 0) {
        $pending = "0";
    } else {
        $pending = $row["total"];
    }
}

$sample_ot = mysqli_query($konek, "SELECT COUNT(sample_test) AS total FROM tb_sample WHERE id_loc!=0 AND id_loc!=4 AND sample_stat=1");
while ($row = mysqli_fetch_assoc($sample_ot)) {
    if (mysqli_num_rows($sample_ot) == 0) {
        $ot = "0";
    } else {
        $ot = $row["total"];
    }
}

$sample_done = mysqli_query($konek, "SELECT COUNT(sample_test) AS total FROM tb_sample WHERE id_loc=3");
while ($row = mysqli_fetch_assoc($sample_done)) {
    if (mysqli_num_rows($sample_done) == 0) {
        $done = "0";
    } else {
        $done = $row["total"];
    }
}

$count_incoming = mysqli_query($konek, "SELECT COUNT(sample_test) AS total FROM tb_sample WHERE njo = '' AND id_loc=0 AND sample_stat=1");
while ($row = mysqli_fetch_assoc($count_incoming)) {
    if (mysqli_num_rows($count_incoming) == 0) {
        $incoming = "0";
    } else {
        $incoming = $row["total"];
    }
}

$count_waiting = mysqli_query($konek, "SELECT COUNT(sample_test) AS total FROM tb_sample WHERE njo != '' AND (id_loc=1 OR id_loc=0) AND sample_stat=1");
while ($row = mysqli_fetch_assoc($count_waiting)) {
    if (mysqli_num_rows($count_waiting) == 0) {
        $waiting = "0";
    } else {
        $waiting = $row["total"];
    }
}

$sample_all = mysqli_query($konek, "SELECT COUNT(sample_test) AS total FROM tb_sample WHERE njo != '' AND id_loc!=0 AND id_loc!=4 AND sample_stat=1");
while ($row = mysqli_fetch_assoc($sample_all)) {
    if (mysqli_num_rows($sample_all) == 0) {
        $all = "0";
    } else {
        $all = $row["total"];
    }
}

$scrap_count = mysqli_query($konek, "SELECT COUNT(sample_test) AS total FROM tb_sample WHERE after_test='scrap' AND sample_stat=0");
while ($row = mysqli_fetch_assoc($scrap_count)) {
    if (mysqli_num_rows($scrap_count) == 0) {
        $scrap = "0";
    } else {
        $scrap = $row["total"];
    }
}

$return_count = mysqli_query($konek, "SELECT COUNT(sample_test) AS total FROM tb_sample WHERE after_test='return'  AND sample_stat=0");
while ($row = mysqli_fetch_assoc($return_count)) {
    if (mysqli_num_rows($return_count) == 0) {
        $return_c = "0";
    } else {
        $return_c = $row["total"];
    }
}

$exp_count = mysqli_query($konek, "SELECT COUNT(sample_test) AS total FROM tb_sample WHERE due_date < '$date' AND sample_stat=1");
while ($row = mysqli_fetch_assoc($exp_count)) {
    if (mysqli_num_rows($exp_count) == 0) {
        $exp = "0";
    } else {
        $exp = $row["total"];
    }
}

$history_count = mysqli_query($konek, "SELECT COUNT(sample_test) AS total FROM tb_sample");
while ($row = mysqli_fetch_assoc($history_count)) {
    if (mysqli_num_rows($history_count) == 0) {
        $hist = "0";
    } else {
        $hist = $row["total"];
    }
}


if (isset($_GET["after_test"])) {
    if (update_after($_GET)) {
        header('Location: index.php');
    } else {
        $errorafter = true;
    }
}

if (isset($_POST["btn-remark"])) {
    if (updateRemark($_POST)) {
        header('Location: index.php');
    }
}