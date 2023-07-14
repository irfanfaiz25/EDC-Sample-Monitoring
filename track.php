<?php
include 'fungsi/fungsi.php';

if (isset($_GET["sample"])) {
    $smp_test = $_GET["sample"];
    $rs = mysqli_query($konek, "SELECT * FROM track WHERE sample_test = '$smp_test'");
    // $samp = mysqli_fetch_assoc($rs);
    $numrow = mysqli_num_rows($rs);
    if ($numrow != 0) {
        $sample = query("SELECT * FROM track WHERE sample_test='$smp_test'");
    }
    $sample = query("SELECT * FROM track WHERE sample_test='$smp_test'");

} else {
    $smp_test = "";
}

if (isset($_POST["submit-kry"])) {
    if (tracking($_POST)) {
        header('Location: track.php');
    }
}

$trackk = query("SELECT * FROM track");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animated Step prog Bar</title>



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />


    <!-- UniIcon CDN Link  -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="css/style-track.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


</head>

<body>

    <nav>
        <div class="logo">
            <i class="bx bx-menu menu-icon"></i>
            <span class="logo-name">Sample Tracking</span>
        </div>
        <div class="sidebar">
            <div class="logo">
                <i class="bx bx-menu menu-icon"></i>
                <img src="img/logoo.png" height="45" width="190" alt="logo">
            </div>

            <div class="sidebar-content">
                <ul class="lists">
                    <li class="list">
                        <a href="index.php" class="nav-link">
                            <i class="bx bx-home-alt icon"></i>
                            <span class="link">Dashboard</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="sample.php" class="nav-link">
                            <i class="fa fa-database icon"></i>
                            <span class="link">Sample Data</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="track.php" class="nav-link">
                            <i class="fa fa-location-dot icon"></i>
                            <span class="link">Tracking</span>
                        </a>
                    </li>


                    <div class="bottom-cotent">
                        <li class="list">
                            <a href="#" class="nav-link">
                                <i class="bx bx-cog icon"></i>
                                <span class="link">Settings</span>
                            </a>
                        </li>
                        <li class="list">
                            <a href="#" class="nav-link">
                                <i class="bx bx-log-out icon"></i>
                                <span class="link">Logout</span>
                            </a>
                        </li>
                    </div>
            </div>
        </div>
    </nav>

    <section class="overlay"></section>

    <section id="main-content">
        <div class="card mt-4">
            <div class="card-body">
                <div class="row dataku">
                    <div class="col-md-4">

                        <form action="track.php" method="get">
                            <!-- <input type="hidden" name="track" class="form-cotrol" value=""> -->

                            <table class="table table-bordered align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>
                                            <img class="m-2" src="img/logoo.png" width="90" height="20" alt="">
                                        </th>
                                        <th class="text-center">
                                            <h5>SAMPLE TRACK</h5>
                                        </th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td><label for="sample-test">Sample Test</label></td>
                                    <td><input type="text" id="sample-test" name="sample" class="form-control" value="<?php
                                    if (isset($_GET["sample"])) {
                                        $smp = $_GET["sample"];
                                        echo $smp;
                                    }
                                    ?>" <?php
                                    if (!isset($_GET["sample"])) {
                                        echo 'autofocus';
                                    } else {
                                        echo '';
                                    }
                                    ?>>
                                    </td>
                                </tr>
                                <button type="submit" name="submit-sample" hidden></button>
                        </form>
                        <tr>
                            <form action="" method="post">
                                <input type="hidden" name="sample" value="<?= $smp_test; ?>">
                                <td><label for="id_kry">PIC</label></td>
                                <td><input type="text" id="id_kry" name="id_kry" class="form-control" <?php
                                if (isset($_GET["sample"])) {
                                    echo 'autofocus';
                                } else {
                                    echo '';
                                }
                                ?>>
                                </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="btn-add text-center pt-3 pb-3">
                                    <button type="submit" name="submit-kry" class="btn btn-lg btn-success"><strong>ADD
                                            TRACK</strong></button>
                                </div>
                            </td>
                            </form>
                        </tr>
                        </table>

                    </div>
                    <div class=" col-md-8">
                        <?php
                        if (isset($_GET["sample"])):
                            foreach ($sample as $row): ?>

                                <h2>
                                    <?= $row["sample_test"]; ?>
                                </h2>
                                <h6>
                                    <?= $row["nm_sample"]; ?>
                                </h6>

                                <ul class="bars mt-5">
                                    <li>
                                        <i class="icon uil uil-server"></i>
                                        <div class="prog one">
                                            <!-- <p>1</p> -->
                                            <i class="uil uil-check"></i>
                                        </div>
                                        <p class="text">Sample Rack</p>
                                    </li>
                                    <li>
                                        <i class="icon uil uil-flask"></i>
                                        <div class="prog two">
                                            <!-- <p>2</p> -->
                                            <i class="uil uil-check"></i>
                                        </div>
                                        <p class="text">Lab</p>
                                    </li>
                                    <li>
                                        <i class="icon uil uil-chart"></i>
                                        <div class="prog three">
                                            <!-- <p>3</p> -->
                                            <i class="uil uil-check"></i>
                                        </div>
                                        <p class="text">Testing</p>
                                    </li>
                                    <li>
                                        <i class="icon uil uil-server"></i>
                                        <div class="prog four">
                                            <!-- <p>4</p> -->
                                            <i class="uil uil-check"></i>
                                        </div>
                                        <p class="text">Sample Rack</p>
                                    </li>
                                    <li>
                                        <i class="icon uil uil-file-check-alt"></i>
                                        <div class="prog five">
                                            <!-- <p>5</p> -->
                                            <i class="uil uil-check"></i>
                                        </div>
                                        <p class="text">Finish</p>
                                    </li>
                                </ul>
                            <?php endforeach;
                        else: ?>
                            <h2>
                                Sample Test
                            </h2>
                            <h6>
                                Sample Name
                            </h6>

                            <ul class="bars mt-5">
                                <li>
                                    <i class="icon uil uil-server"></i>
                                    <div class="prog one">
                                        <!-- <p>1</p> -->
                                        <i class="uil uil-check"></i>
                                    </div>
                                    <p class="text">Sample Rack</p>
                                </li>
                                <li>
                                    <i class="icon uil uil-flask"></i>
                                    <div class="prog two">
                                        <!-- <p>2</p> -->
                                        <i class="uil uil-check"></i>
                                    </div>
                                    <p class="text">Lab</p>
                                </li>
                                <li>
                                    <i class="icon uil uil-chart"></i>
                                    <div class="prog three">
                                        <!-- <p>3</p> -->
                                        <i class="uil uil-check"></i>
                                    </div>
                                    <p class="text">Testing</p>
                                </li>
                                <li>
                                    <i class="icon uil uil-server"></i>
                                    <div class="prog four">
                                        <!-- <p>4</p> -->
                                        <i class="uil uil-check"></i>
                                    </div>
                                    <p class="text">Sample Rack</p>
                                </li>
                                <li>
                                    <i class="icon uil uil-file-check-alt"></i>
                                    <div class="prog five">
                                        <!-- <p>5</p> -->
                                        <i class="uil uil-check"></i>
                                    </div>
                                    <p class="text">Finish</p>
                                </li>
                            </ul>
                        <?php endif; ?>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="table-responsive">
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
                                <?php foreach ($trackk as $row): ?>
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
            </div>
        </div>
    </section>

    <script src="main.js"></script>



    <!-- <script src="js/fungsi.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <script src="js/script-trackk.js"></script>
    <script src="js/script.js"></script>
</body>

</html>