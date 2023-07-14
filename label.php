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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" />


</head>

<body>
    <section id="main-content">
        <div class="card card-label mt-4">
            <div class="card-body">
                <div class="row dataku" id="print-area">
                    <div class="col-md-6 text-center">

                        <?php foreach ($cetak as $row): ?>
                            <table class="table table-bordered align-middle text-center" style="width: 600px;">
                                <tbody>
                                    <tr>
                                        <td class="label-header" rowspan="2" colspan="2">
                                            <img style="margin-left: 20px;" src="img/logoo.png" height="40" alt="logo">
                                            <span style="margin-left: 230px;">
                                                <img src="temp/<?php echo "$isi"; ?>.png"
                                                    style="height: 120px; margin-top: 0px;" alt="">
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <h4 class="pt-2" style="margin-bottom: 0px; padding-bottom: 0px; height: 30px;">
                                                <strong>PART TAG</strong>
                                            </h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <h6 style="margin-bottom: 0px; padding-bottom: 0px;"><strong>
                                                    <?= strtoupper($row["nm_sample"]); ?>
                                                </strong>
                                            </h6>
                                        </td>
                                    </tr>
                                    <tr style="text-align: left;">
                                        <td class="label-field"><strong>SAMPLE TEST:
                                                <?= strtoupper($row["sample_test"]); ?>
                                            </strong></td>
                                        <td class="label-field"><strong>QTY:
                                                <?= $row["qty"]; ?>
                                            </strong></td>
                                    </tr>
                                    <tr style="text-align: left;">
                                        <td class="label-field"><strong>CUSTOMER NAME:
                                                <?= strtoupper($row["customer"]); ?>
                                            </strong></td>
                                        <td class="label-field"><strong>ENTRY DATE:
                                                <?= strtoupper($row["tgl_datang"]); ?>
                                            </strong></td>
                                    </tr>
                                    <tr style="text-align: left;">
                                        <td class="label-field"><strong>ITEM TEST 1:
                                                <?= strtoupper($row["tujuan1"]); ?>
                                            </strong></td>
                                        <td class="label-field"><strong>ITEM TEST 2:
                                                <?= strtoupper($row["tujuan2"]); ?>
                                            </strong></td>
                                    </tr>
                                    <tr style="text-align: left;">
                                        <td class="label-field"><strong>ITEM TEST 3:
                                                <?= strtoupper($row["tujuan3"]); ?>
                                            </strong></td>
                                        <td class="label-field"><strong>ITEM TEST 4:
                                                <?= strtoupper($row["tujuan4"]); ?>
                                            </strong></td>
                                    </tr>
                                    <tr style="text-align: left;">
                                        <td class="label-field"><strong>ITEM TEST 5:
                                                <?= strtoupper($row["tujuan5"]); ?>
                                            </strong></td>
                                        <td class="label-field"><strong>TOOLS:
                                                <?= strtoupper($row["tools"]); ?>
                                            </strong></td>
                                    </tr>
                                    <tr style="text-align: left;">
                                        <td class="label-field"><strong>AFTER TEST:
                                                <?= strtoupper($row["after_test"]); ?>
                                            </strong></td>
                                        <td class="label-field"><strong>DUE DATE:
                                                <?= strtoupper($row["due_date"]); ?>
                                            </strong></td>
                                    </tr>
                                    <tr>
                                        <td class="label-header label-field" rowspan="2" colspan="2">
                                            <strong>NOTE :
                                                <?= strtoupper($row["note"]); ?>
                                            </strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php endforeach; ?>

                    </div>

                </div>
                <div class="col-md-12" style="float: right; padding-left: 270px;">
                    <button class="btn btn-warning" onclick="printPage('print-area')">PRINT</button>
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