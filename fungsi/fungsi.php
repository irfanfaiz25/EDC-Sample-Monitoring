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
    $after = htmlspecialchars($data["status"]);
    $duedate = htmlspecialchars($data["duedate"]);
    $note = htmlspecialchars($data["note"]);
    $id_temp = htmlspecialchars($data["id_temp"]);

    $input = "INSERT IGNORE INTO tb_sample VALUES ('$smp_test','$njo','$nama','$qty','$cust','$tgl_dtg',
    '$tujuan1','$tujuan2','$tujuan3','$tujuan4','$tujuan5','$tools','$after','$duedate','$note','$id_temp')";

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
    $id_temp = htmlspecialchars($data["id_temp"]);

    $edit = "UPDATE tb_sample SET sample_test='$smp_test',njo='$njo',nm_sample='$nama',qty='$qty',
    customer='$cust',tgl_datang='$tgl_dtg',tujuan1='$tujuan1',tujuan2='$tujuan2',tujuan3='$tujuan3',
    tujuan4='$tujuan4',tujuan5='$tujuan5',tools='$tools',after_test='$after',due_date='$duedate',
    note='$note',njo_stat='$id_temp' WHERE sample_test='$smp_test'";

    mysqli_query($konek, $edit);
    return mysqli_affected_rows($konek);

}

?>