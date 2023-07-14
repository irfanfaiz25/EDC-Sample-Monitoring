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
    $duedate = htmlspecialchars($data["duedate"]);
    $note = htmlspecialchars($data["note"]);

    if (isset($data["status"])) {
        $after = htmlspecialchars($data["status"]);
    }

    if (
        $nama == "" || $qty == "" || $cust == "" || $tgl_dtg == ""
        || $tgl_dtg == "dd/mm/yyyy" || $tools == "" || $after == "" || $duedate == "" || $duedate == "dd/mm/yyy"
    ) {
        return false;
    }

    $input = "INSERT IGNORE INTO tb_sample VALUES ('$smp_test','$njo','$nama','$qty','$cust','$tgl_dtg',
    '$tujuan1','$tujuan2','$tujuan3','$tujuan4','$tujuan5','$tools','$after','$duedate','$note')";

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
    $duedate = htmlspecialchars($data["duedate"]);
    $note = htmlspecialchars($data["note"]);

    $edit = "UPDATE tb_sample SET sample_test='$smp_test',njo='$njo',nm_sample='$nama',qty='$qty',
    customer='$cust',tgl_datang='$tgl_dtg',tujuan1='$tujuan1',tujuan2='$tujuan2',tujuan3='$tujuan3',
    tujuan4='$tujuan4',tujuan5='$tujuan5',tools='$tools',after_test='$after',due_date='$duedate',
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

    $rs = mysqli_query($konek, "SELECT * FROM tb_sample WHERE sample_test = '$sample'");
    $cari_sample = mysqli_fetch_assoc($rs);
    $njo = $cari_sample["njo"];
    $nama = $cari_sample["nm_sample"];

    $rsl = mysqli_query($konek, "SELECT * FROM parkir WHERE id_kry = '$id_kry'");
    $cari_kry = mysqli_fetch_assoc($rsl);
    $posisi = $cari_kry["posisi"];

    $insert = "INSERT IGNORE INTO track VALUES ('$sample','$njo','$nama','$id_kry','$posisi')";

    mysqli_query($konek, $insert);

    return mysqli_affected_rows($konek);
}

function update_track($data)
{
    global $konek;

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