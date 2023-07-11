<?php
include 'fungsi/fungsi.php';

if (isset($_GET["sample"])) {
    $smp_test = $_GET["sample"];
    $sample = query("SELECT * FROM tb_sample WHERE sample_test='$smp_test'");
} else {
    $sample = query("SELECT * FROM tb_sample");
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
    <link rel="stylesheet" href="css/styles.css" />
</head>

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
</body>

</html>