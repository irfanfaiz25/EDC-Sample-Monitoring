<?php
include 'fungsi/fungsi.php';

if (isset($_GET["sample"])) {
    $smp_test = $_GET["sample"];
    $sample = query("SELECT * FROM tb_sample WHERE sample_test='$smp_test'");
} else {
    $sample = query("SELECT * FROM tb_sample");
}

date_default_timezone_set("Asia/Jakarta");
$date = date("Y-m-d H:i:s");
echo $date . "\n";

$date_subs = date_create('2006-12-12');
date_modify($date_subs, '+1 month');
echo date_format($date_subs, 'Y-m-d');


// $rs = mysqli_query($konek, "SELECT * FROM tb_sample WHERE sample_test = 'ST230004'");
// $cari_sample = mysqli_fetch_assoc($rs);

// $nm = $cari_sample["nm_sample"];

// var_dump($nm);
// $smp = $_GET["sample"];

$track = query("SELECT * FROM track");
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
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="css/style-track.css">
</head>

<?php
if (isset($_POST["btn-send"])) {
    if (tracking($_POST)):
        ?>
        <figure class="notification">
            <div class="notification-body">
                <i class="notification_icon fa-regular fa-circle-check"></i>
                Data has been inserted!
            </div>
            <div class="notification_progress"></div>
        </figure>
        <meta http-equiv="refresh" content="2.5">
        <?php
    endif;
}
?>

<body>
    <div class="row">
        <div class="col-md-4">
            <form action="test.php" method="get">
                <label for="sample">Sample Test</label>
                <input type="text" name="sample" id="sample" class="form-control">
                <button type="submit" name="btn-submit" class="btn btn-primary">submit</button>
            </form>
        </div>
        <div class="col-md-8">
            <table class="table table-responsive table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Sample Test</th>
                        <th>Work Order</th>
                        <th>Nama Sample</th>
                        <th>Qty</th>
                        <th>Tanggal Datang</th>
                    </tr>
                </thead>
                <?php foreach ($sample as $row): ?>
                    <tbody>
                        <tr>
                            <td>
                                <?= $row["sample_test"]; ?>
                            </td>

                            <td>
                                <?= $row["njo"]; ?>
                            </td>
                            <td>
                                <?= $row["nm_sample"]; ?>
                            </td>
                            <td>
                                <?= $row["qty"]; ?>
                            </td>
                            <td>
                                <?= $row["tgl_datang"]; ?>
                            </td>
                        </tr>
                    </tbody>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

    <?php
    if (isset($_GET["sample"])) {
        $ids = $_GET["sample"];
    } else {
        $ids = "";
    }
    ?>
    <div class="row">
        <div class="col-md-4">
            <form action="" method="post">
                <label for="sample">Sample</label>
                <input type="text" name="id_sample" id="sample" class="form-control" value="<?= $ids; ?>">
                <label for="kry">User</label>
                <input type="text" name="id_kry" id="kry" class="form-control">

                <button type="submit" name="btn-send" class="btn btn-primary">submit</button>
            </form>
        </div>
        <div class="col-md-8">
            <div class="container">
                <table class="table table-responsive table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Sample Test</th>
                            <th>Work Order</th>
                            <th>Nama Sample</th>
                            <th>Id Kry</th>
                            <th>Tracking</th>
                        </tr>
                    </thead>
                    <?php foreach ($track as $row): ?>
                        <tbody>
                            <tr>
                                <td>
                                    <?= $row["sample_test"]; ?>
                                </td>

                                <td>
                                    <?= $row["njo"]; ?>
                                </td>
                                <td>
                                    <?= $row["nm_sample"]; ?>
                                </td>
                                <td>
                                    <?= $row["id_kry"]; ?>
                                </td>
                                <td>
                                    <?= $row["tracking"]; ?>
                                </td>
                            </tr>
                        </tbody>
                    <?php endforeach; ?>
                </table>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="container">
                <table class="table table-responsive table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Sample Test</th>
                            <th>Work Order</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>
                                <ul class="bars mt-5" style="margin-top: 0px !important; ">
                                    <li>
                                        <i class="icon uil uil-server"></i>
                                        <div class="prog one active">
                                            <i class="uil uil-check"></i>
                                        </div>
                                        <p class="text">Sample Rack</p>
                                    </li>
                                    <li>
                                        <i class="icon uil uil-flask"></i>
                                        <div class="prog two">
                                            <i class="uil uil-check">
                                            </i>
                                        </div>
                                        <p class="text">Lab</p>
                                    </li>
                                    <li>
                                        <i class="icon uil uil-server"></i>
                                        <div class="prog four">
                                            <i class="uil uil-check"></i>
                                        </div>
                                        <p class="text">Sample Rack</p>
                                    </li>
                                    <li>
                                        <i class="icon uil uil-file-check-alt"></i>
                                        <div class="prog five">
                                            <i class="uil uil-check"></i>
                                        </div>
                                        <p class="text">Finish</p>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-md-4">

        </div>
    </div>

    <script src="js/script.js"></script>
</body>

</html>