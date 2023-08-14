<?php
// session_start();
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
    $note = htmlspecialchars($data["note"]);
    $date_ent = date_create(date('Y-m-d'));
    date_modify($date_ent, '+1 month');
    $due_date = date_format($date_ent, 'Y-m-d');
    $pic_cek = $data["pic_cek"];

    if (isset($data["cek_nama"])) {
        $cek_nama = 1;
    } else {
        $cek_nama = 0;
    }

    if (isset($data["cek_qty"])) {
        $cek_qty = 1;
    } else {
        $cek_qty = 0;
    }

    if (isset($data["cek_comp"])) {
        $cek_comp = 1;
    } else {
        $cek_comp = 0;
    }

    if (isset($data["cek_dupl"])) {
        $cek_dupl = 1;
    } else {
        $cek_dupl = 0;
    }

    if (isset($data["cek_layak"])) {
        $cek_layak = 1;
    } else {
        $cek_layak = 0;
    }

    if (
        $nama == "" || $qty == "" || $cust == "" || $tgl_dtg == ""
        || $tgl_dtg == "dd/mm/yyyy" || $tools == ""
    ) {
        return false;
    }

    $tgl_dtg = $tgl_dtg . date(" H:i:s");

    $input = "INSERT IGNORE INTO tb_sample (sample_test,njo,nm_sample,qty,customer,tgl_datang,tujuan1,tujuan2,tujuan3,tujuan4,tujuan5,
    tools,after_test,date_take,date_return,due_date,date_after,note,id_loc,pic,rak,time_stamp,cek_nama,cek_qty,cek_comp,cek_dupl,cek_layak,pic_cek,sample_stat)
    VALUES ('$smp_test','$njo','$nama','$qty','$cust','$tgl_dtg','$tujuan1','$tujuan2','$tujuan3','$tujuan4','$tujuan5','$tools',
    '','','','$due_date','','$note','','','','','$cek_nama','$cek_qty','$cek_comp','$cek_dupl','$cek_layak','$pic_cek',1)";

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
    session_start();

    $sample = htmlspecialchars($data["sample"]);
    date_default_timezone_set("Asia/Jakarta");
    $date = date("Y-m-d H:i:s");


    $rs = mysqli_query($konek, "SELECT * FROM tb_sample WHERE sample_test = '$sample'");
    $cari_sample = mysqli_fetch_assoc($rs);
    $id_loc = $cari_sample["id_loc"];
    $date_subs = date_create($cari_sample["tgl_datang"]);
    $date_ret = date_create(date("Y-m-d"));
    date_modify($date_subs, '+1 month');
    date_modify($date_ret, '+1 month');
    $due_date1 = date_format($date_subs, 'Y-m-d');
    $due_date2 = date_format($date_ret, 'Y-m-d');

    $nama = $_SESSION["user"];

    $loc = $id_loc + 1;

    if (isset($data["rak"])) {
        $rak = $data["rak"];
        if ($id_loc == 0) {
            $update = "UPDATE tb_sample SET id_loc=$loc, pic='$nama', rak='$rak', due_date='$due_date1' WHERE sample_test='$sample'";
        } elseif ($loc == 4 || $id_loc < 0) {
            return false;
        }
    } else {
        if ($id_loc == 1) {
            $update = "UPDATE tb_sample SET id_loc=$loc, pic='$nama', date_take='$date' WHERE sample_test='$sample'";
        } elseif ($id_loc == 2) {
            $update = "UPDATE tb_sample SET id_loc=$loc, pic='$nama', date_return='$date', due_date='$due_date2' WHERE sample_test='$sample'";
        } elseif ($id_loc == 3) {
            $update = "UPDATE tb_sample SET id_loc=$loc, pic='$nama', due_date='$due_date2' WHERE sample_test='$sample'";
        } elseif ($loc == 4 || $id_loc < 0) {
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

function update_after($data)
{
    global $konek;

    $sample_test = $data["sample_test"];
    $after_test = $data["after_test"];
    $date_after = date("d-m-Y H:i:s");

    $update = "UPDATE tb_sample SET after_test='$after_test', date_after='$date_after', sample_stat=0, id_loc=4 WHERE sample_test='$sample_test'";
    mysqli_query($konek, $update);

    return mysqli_affected_rows($konek);
}

function regist($data)
{
    global $konek;

    $nama = htmlspecialchars($data["name"]);
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($konek, $data["password"]);
    $password2 = mysqli_real_escape_string($konek, $data["password2"]);
    $level = htmlspecialchars($data["level"]);
    $token = $data["token"];

    if ($nama == "" || $username == "" || $password == "" || $password2 == "" || $level == "" || $token == "" || $level == "") {
        return false;
    }

    if ($token != 123) {
        return false;
    }

    $res = mysqli_query($konek, "SELECT username FROM tb_user WHERE username='$username'");

    if (mysqli_fetch_assoc($res)) {
        return false;
    }

    if ($password !== $password2) {
        return false;
    }

    $foto = upload();
    if (!$foto) {
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($konek, "INSERT INTO tb_user (nama,username,password,level_user,foto) VALUES ('$nama','$username','$password','$level','$foto')");

    return mysqli_affected_rows($konek);
}

function upload()
{
    $namaFile = $_FILES['foto']['name'];
    $ukuran = $_FILES['foto']['size'];
    $eror = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    if ($eror === 4) {
        echo "
                <script>
                    alert('Pilih foto yang akan di upload');
                </script>
            ";
        return false;
    }

    $valEkstensiFoto = ['jpg', 'jpeg', 'png'];
    $ekstensiFoto = explode('.', $namaFile);
    $ekstensiFoto = strtolower(end($ekstensiFoto));

    if (!in_array($ekstensiFoto, $valEkstensiFoto)) {
        echo "
                <script>
                    alert('Incorrect extension!');
                </script>
            ";
        return false;
    }

    if ($ukuran > 2000000) {
        echo "
                <script>
                    alert('File too large');
                </script>
            ";
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiFoto;

    move_uploaded_file($tmpName, 'img/user-img/' . $namaFileBaru);
    return $namaFileBaru;
}

function updateProfil($data)
{
    global $konek;

    $id = $data["id"];
    $nama = $data["nama"];
    // $username = $data["username"];

    $res = mysqli_query($konek, "SELECT * FROM tb_user WHERE id=$id");
    $user = mysqli_fetch_assoc($res);
    $pass_ori = $user["password"];

    if ($_FILES['foto']['size'] <= 0) {
        $foto = $data["foto_old"];
    } else {
        $foto = upload();
    }

    if ($data["old_password"] != "" || $data["password"] != "" || $data["password2"] != "") {
        $old_pass = $data["old_password"];
        $pass = $data["password"];
        $pass2 = $data["password2"];
        if (password_verify($old_pass, $pass_ori)) {
            if ($pass !== $pass2) {
                return false;
            }
            $new_pass = password_hash($pass, PASSWORD_DEFAULT);
            mysqli_query($konek, "UPDATE tb_user SET nama='$nama', password='$new_pass', foto='$foto' WHERE id=$id");
        }
        return false;
    } else {
        mysqli_query($konek, "UPDATE tb_user SET nama='$nama', foto='$foto' WHERE id=$id");
    }

    return mysqli_affected_rows($konek);
}
