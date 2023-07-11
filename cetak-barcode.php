<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_GET['isi_konten'])) {

        $isi = $_GET['isi_konten'];

        include "fungsi/phpqrcode/qrlib.php";

        $penyimpanan = "temp/";

        if (!file_exists($penyimpanan))
            mkdir($penyimpanan);

        QRcode::png($isi, $penyimpanan . 'hasil_qrcode.png', QR_ECLEVEL_L, 10, 5);

        // menampilkan qrcode 
        echo '<img src="' . $penyimpanan . 'hasil_qrcode.png">';

    }
    ?>
</body>

</html>