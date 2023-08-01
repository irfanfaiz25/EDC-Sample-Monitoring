<?php
include 'fungsi/fungsi.php';

if (isset($_GET['sample_test'])) {

    $isi = $_GET['sample_test'];

    include "fungsi/phpqrcode/qrlib.php";

    $penyimpanan = "temp/";

    if (!file_exists($penyimpanan))
        mkdir($penyimpanan);

    QRcode::png($isi, $penyimpanan . $isi . '.png', QR_ECLEVEL_L, 10, 5);

    // menampilkan qrcode 
    // echo '<img src="' . $penyimpanan . 'hasil_qrcode.png">';

    $cetak = query("SELECT * FROM tb_sample WHERE sample_test='$isi'");
} else {
    echo "
        <script>
        alert ('data tidak ada !');
        </script>
    ";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" />


</head>

<style>
    td,
    th {
        border-width: 2.5px !important;
        border-color: black;
    }

    section {
        /* scale: 50%; */
        margin-left: 400px;
    }
</style>

<body>
    <section id="main-content">
        <div class="row">
            <div class="col-md-12 card-tag">
                <div class="card card-label mt-4">
                    <div class="card-body">
                        <div id="print-area">
                            <?php
                            // for ($i = 1; $i <= 2; $i++) {
                            ?>
                            <div class="row dataku mb-4">
                                <div class="col-md-6 text-center">

                                    <?php foreach ($cetak as $row) : ?>
                                        <table class=" table table-bordered align-middle text-center" style="width: 600px;">
                                            <tbody>
                                                <tr>
                                                    <td class="label-header" rowspan="2" colspan="4">
                                                        <img style="margin-left: 20px;" src="img/logoo.png" height="50" alt="logo">
                                                        <span class="float-end">
                                                            <h1 class="pt-3 pe-5">
                                                                <strong>PART TAG</strong>
                                                            </h1>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <h4 style="margin-bottom: 0px; padding-bottom: 0px;"><strong>
                                                                <?= strtoupper($row["nm_sample"]); ?>
                                                            </strong>
                                                        </h4>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="label-head text-start">SAMPLE TEST:</td>
                                                    <td class="label-field"><?= strtoupper($row["sample_test"]); ?></td>
                                                    <td class="label-head text-start">NJO:</td>
                                                    <td class="label-field"><?= $row["njo"]; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="label-head text-start">CUSTOMER NAME:</td>
                                                    <td class="label-field"><?= strtoupper($row["customer"]); ?></td>
                                                    <td class="label-head text-start">QTY:</td>
                                                    <td class="label-field"><?= strtoupper($row["qty"]); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="label-head text-start">ITEM TEST 1:</td>
                                                    <td class="label-field"><?= strtoupper($row["tujuan1"]); ?></td>
                                                    <td class="label-head text-start">ITEM TEST 2:</td>
                                                    <td class="label-field"><?= strtoupper($row["tujuan2"]); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="label-head text-start">ITEM TEST 3:</td>
                                                    <td class="label-field"><?= strtoupper($row["tujuan3"]); ?></td>
                                                    <td class="label-head text-start">ITEM TEST 4:</td>
                                                    <td class="label-field"><?= strtoupper($row["tujuan4"]); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="label-head text-start">ITEM TEST 5:</td>
                                                    <td class="label-field"><?= strtoupper($row["tujuan5"]); ?></td>
                                                    <td class="label-head text-start">TOOLS:</td>
                                                    <td class="label-field"><?= strtoupper($row["tools"]); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="label-head text-start">AFTER TEST:</td>
                                                    <td class="label-field">
                                                        <input class="form-check-input border-2 border-dark" type="checkbox" value="" id="scrap" name="scrap" value="1">
                                                        <label class="form-check-label" for="scrap">
                                                            Scrap
                                                        </label>
                                                        <input class="form-check-input border-2 border-dark" type="checkbox" value="" id="scrap" name="scrap" value="1">
                                                        <label class="form-check-label" for="scrap">
                                                            Return
                                                        </label>
                                                    </td>
                                                    <td class="label-head text-start">DATE ENTRY:</td>
                                                    <td class="label-field"><?= strtoupper(date("d-m-Y", strtotime($row["tgl_datang"]))); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="label-header label-field" rowspan="2" colspan="3">
                                                        NOTE :
                                                        <br>
                                                        <?= strtoupper($row["note"]); ?>
                                                    </td>
                                                    <td>
                                                        <img src="temp/<?php echo "$isi"; ?>.png" style="height: 150px;" alt="">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    <?php endforeach; ?>

                                </div>
                            </div>
                            <?php
                            // }
                            ?>
                        </div>
                        <div class="col-md-12" style="float: right; padding-left: 270px;">
                            <button class="btn btn-warning" onclick="printPage('print-area')">PRINT</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>


</body>
<script>
    function printPage(area) {
        var printContent = document.getElementById(area).innerHTML;
        var original = document.body.innerHTML;
        document.body.innerHTML = printContent;
        window.print();
        document.body.innerHTML = original;
    }
</script>

</html>