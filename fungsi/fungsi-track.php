<?php
include_once "fungsi.php";

if (isset($_GET["sample"])) {
    $smp_test = $_GET["sample"];
    $rs = mysqli_query($konek, "SELECT * FROM tb_sample WHERE sample_test = '$smp_test'");
    $numrow = mysqli_num_rows($rs);

    if ($numrow === 1) {
        $samp = mysqli_fetch_assoc($rs);
        $id_loc = $samp["id_loc"];
        // $njo_cek = $samp["njo"];

        // if ($njo_cek == "") {
        //     $errornjo = true;
        //     return false;
        // }

        if ($id_loc == 1) {
            $loc = "Sample Before Test";
        } elseif ($id_loc == 2) {
            $loc = "Lab";
        } elseif ($id_loc == 3) {
            $loc = "Sample After Test";
        } elseif ($id_loc == 4) {
            $loc = "Finish";
        } else {
            $loc = "";
        }

        $sample = query("SELECT * FROM tb_sample WHERE sample_test='$smp_test'");
    } else {
        $errorsample = true;
    }
} else {
    $smp_test = "";
}



if (isset($_POST["btn-return"])) {
    if (return_track($_POST)) {
        header('Location: track.php');
    } else {
        echo "
            <script>
                alert('failed to return!');
            </script>
        ";
        header('Location track.php');
    }
}
if (isset($_POST["submit-kry"])) {
    if ($id_loc != 3) {
        if (tracking($_POST)) {
            header('Location: track.php');
        } else {
            $errorup = true;
        }
    }
    $errorid = true;
}

$sample_tbl = query("SELECT * FROM tb_sample WHERE njo != '' ORDER BY time_stamp DESC");
