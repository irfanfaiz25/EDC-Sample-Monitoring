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

    $input = "INSERT IGNORE INTO tb_sample VALUES ('$njo','$nama','$qty','$cust','$tgl_dtg',
    '$tujuan1','$tujuan2','$tujuan3','$tujuan4','$tujuan5','$tools','$after','$duedate','$note','$id_temp')";

    mysqli_query($konek, $input);

    return mysqli_affected_rows($konek);
}

?>