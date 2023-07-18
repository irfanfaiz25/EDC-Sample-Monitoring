<?php

$konek = mysqli_connect("localhost", "root", "", "db_edc");


function query($query)
{
    global $konek;
    $result = mysqli_query($konek, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $konek;

    $smp_test = htmlspecialchars($data["sample-test"]);
    $njo = htmlspecialchars($data["njo"]);
    $nama = htmlspecialchars($data["sample"]);
    $qty = htmlspecialchars($data["qty"]);
    $cust = htmlspecialchars($data["cust"]);
    $tgl_dtg = htmlspecialchars($data["tanggaldatang"]);
    $tujuan1 = htmlspecialchars($data["tujuan"]);
    $tujuan2 = htmlspecialchars($data["tujuan2"]);
    $tujuan3 = htmlspecialchars($data["tujuan3"]);
    $tujuan4 = htmlspecialchars($data["tujuan4"]);
    $tujuan5 = htmlspecialchars($data["tujuan5"]);
    $tools = htmlspecialchars($data["tools"]);
    // $duedate = htmlspecialchars($data["duedate"]);
    $note = htmlspecialchars($data["note"]);

    if (isset($data["status"])) {
        $after = htmlspecialchars($data["status"]);
    }

    if (
        $nama == "" || $qty == "" || $cust == "" || $tgl_dtg == ""
        || $tgl_dtg == "dd/mm/yyyy" || $tools == "" || $after == ""
    ) {
        return false;
    }

    $input = "INSERT IGNORE INTO tb_sample VALUES ('$smp_test','$njo','$nama','$qty','$cust','$tgl_dtg',
    '$tujuan1','$tujuan2','$tujuan3','$tujuan4','$tujuan5','$tools','$after','','','','$note','','','','')";

    mysqli_query($konek, $input);

    return mysqli_affected_rows($konek);
}

function ubahSample($data)
{
    global $konek;

    $smp_test = htmlspecialchars($data["id"]);
    $njo = htmlspecialchars($data["njo"]);
    $nama = htmlspecialchars($data["sample"]);
    $qty = htmlspecialchars($data["qty"]);
    $cust = htmlspecialchars($data["cust"]);
    $tgl_dtg = htmlspecialchars($data["tgl-dtg"]);

    $tujuan1 = htmlspecialchars($data["tujuan1"]);
    $tujuan2 = htmlspecialchars($data["tujuan2"]);
    $tujuan3 = htmlspecialchars($data["tujuan3"]);
    $tujuan4 = htmlspecialchars($data["tujuan4"]);
    $tujuan5 = htmlspecialchars($data["tujuan5"]);
    $tools = htmlspecialchars($data["tools"]);
    $after = htmlspecialchars($data["after"]);
    // $duedate = htmlspecialchars($data["duedate"]);
    $note = htmlspecialchars($data["note"]);

    $edit = "UPDATE tb_sample SET sample_test='$smp_test',njo='$njo',nm_sample='$nama',qty='$qty',
    customer='$cust',tgl_datang='$tgl_dtg',tujuan1='$tujuan1',tujuan2='$tujuan2',tujuan3='$tujuan3',
    tujuan4='$tujuan4',tujuan5='$tujuan5',tools='$tools',after_test='$after',
    note='$note' WHERE sample_test='$smp_test'";

    mysqli_query($konek, $edit);

    return mysqli_affected_rows($konek);
}

function hapus($id)
{
    global $konek;

    mysqli_query($konek, "DELETE FROM tb_sample WHERE sample_test = '$id'");

    return mysqli_affected_rows($konek);
}

function tracking($data)
{
    global $konek;

    $sample = htmlspecialchars($data["sample"]);
    $id_kry = htmlspecialchars($data["id_kry"]);
    date_default_timezone_set("Asia/Jakarta");
    $date = date("Y-m-d H:i:s");


    $rs = mysqli_query($konek, "SELECT * FROM tb_sample WHERE sample_test = '$sample'");
    $cari_sample = mysqli_fetch_assoc($rs);
    $id_loc = $cari_sample["id_loc"];
    $date_subs = date_create($cari_sample["tgl_datang"]);
    date_modify($date_subs, '+1 month');
    $due_date1 = date_format($date_subs, 'Y-m-d');

    $nama = "faiz";

    $loc = $id_loc + 1;

    if (isset($data["rak"])) {
        $rak = $data["rak"];
        if ($id_loc == 0) {
            $update = "UPDATE tb_sample SET id_loc=$loc, pic='$nama', rak='$rak', due_date='$due_date1' WHERE sample_test='$sample'";
        } elseif ($id_loc > 4 || $id_loc < 0) {
            return false;
        }
    } else {
        if ($id_loc == 1) {
            $update = "UPDATE tb_sample SET id_loc=$loc, pic='$nama', date_take='$date' WHERE sample_test='$sample'";
        } elseif ($id_loc == 2) {
            $update = "UPDATE tb_sample SET id_loc=$loc, pic='$nama', date_return='$date' WHERE sample_test='$sample'";
        } elseif ($id_loc > 4 || $id_loc < 0) {
            return false;
        }
    }


    mysqli_query($konek, $update);

    return mysqli_affected_rows($konek);
}

function return_track($data)
{
    global $konek;

    $location = (int) $data["return"];
    $sample = $data["sample_test"];

    $update = "UPDATE tb_sample SET id_loc=$location WHERE sample_test='$sample'";

    mysqli_query($konek, $update);

    return mysqli_affected_rows($konek);

}

function cari_sample($keyword)
{
    global $konek;

    $cari = "SELECT * FROM tb_sample WHERE sample_test LIKE '%$keyword%' OR nm_sample LIKE '%$keyword%' AND njo=''";

    return query($cari);
}

function cari_sample_ready($keyword)
{
    global $konek;

    $cari = "SELECT * FROM tb_sample WHERE sample_test LIKE '%$keyword%' OR nm_sample LIKE '%$keyword%' OR njo LIKE '%$keyword%' AND njo != ''";

    return query($cari);
}


?>