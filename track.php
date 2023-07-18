<?php
include 'fungsi/fungsi.php';

if (isset($_GET["sample"])) {
    $smp_test = $_GET["sample"];
    $rs = mysqli_query($konek, "SELECT * FROM tb_sample WHERE sample_test = '$smp_test'");
    $numrow = mysqli_num_rows($rs);


    $samp = mysqli_fetch_assoc($rs);
    $id_loc = $samp["id_loc"];

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
    $smp_test = "";
}



if (isset($_POST["btn-return"])) {
    if (return_track($_POST)) {
        header('Location: track.php');
    } else {
        echo "
            <script>
                alert('gagal');
            </script>
        ";
        header('Location track.php');
    }
}
if (isset($_POST["submit-kry"])) {
    if (!isset($_GET["sample"])):
        echo "
            <script>
                alert('Sample belum di confirm!');
            </script>
        ";
        header('Location: track.php');
        return false;
    endif;
    if ($id_loc == 4):
        echo "
            <script>
                alert('Sample sudah finish!');
            </script>
        ";
    endif;
    if (tracking($_POST)) {
        header('Location: track.php');
    } else {
        echo "
                            <script>
                                alert('gagal');
                            </script>
                        ";
        header('Location track.php');
    }
}

?>
<?php

$sample_tbl = query("SELECT * FROM tb_sample ORDER BY time_stamp DESC");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample Tracking</title>



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />


    <!-- UniIcon CDN Link  -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="css/style-track.css">
    <link rel="stylesheet" href="css/styles.css">
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
                    <div class="col-md-5">

                        <form action="track.php" method="get">
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
                        <form action="" method="post">
                            <?php
                            if (isset($_GET["sample"])):
                                if ($loc == ""): ?>
                                    <tr>
                                        <td><label for="rak">Rack No.</label></td>
                                        <td><input type="text" name="rak" id="rak" class="form-control"
                                                placeholder="Enter the rack number first" <?php
                                                if (isset($_GET["sample"])) {
                                                    echo 'autofocus';
                                                } else {
                                                    echo '';
                                                }
                                                ?>></td>
                                    </tr>
                                <?php endif;
                            endif; ?>
                            <tr>

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
                                        <button type="submit" name="submit-kry"
                                            class="btn btn-lg btn-success"><strong>ADD
                                                TRACK</strong></button>
                                    </div>
                                </td>
                        </form>
                        </tr>
                        </table>


                    </div>
                    <div class=" col-md-7">
                        <?php
                        if (isset($_GET["sample"])):
                            foreach ($sample as $row): ?>

                                <div class="row">
                                    <div class="col-md-9">
                                        <h2>
                                            <?= $row["sample_test"]; ?>
                                        </h2>
                                        <h6>
                                            <?= $row["nm_sample"]; ?>
                                        </h6>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="btn-return text-center pt-3 pb-3 ps-4">
                                            <button name="return" class="btn btn-lg btn-danger text-white" data-toggle="modal"
                                                data-target="#returnModal<?= $row["sample_test"]; ?>">
                                                <i class="fa fa-rotate-left"></i>
                                                <strong>RETURN</strong></button>
                                        </div>
                                    </div>
                                </div>

                                <!-- detail modal -->
                                <div id="returnModal<?= $row["sample_test"]; ?>" class="modal fade" tabindex="	-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="text-black">
                                                    <?= $row["sample_test"]; ?>
                                                </h4>
                                                <button type="button" class="btn-close" data-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="" method="post">

                                                    <input type="hidden" name="sample_test" id="sample_test"
                                                        value="<?= $row["sample_test"]; ?>">

                                                    <label for="sample" class="mt-3 mb-1">Nama Sample</label>
                                                    <input type="text" class="form-control" name="sample" id="sample"
                                                        value="<?= $row["nm_sample"]; ?>" readonly>

                                                    <label for="track" class="mt-3 mb-1">Track</label>
                                                    <input type="text" class="form-control" name="track" id="track"
                                                        value="<?= $loc; ?>" readonly>

                                                    <label for="return" class="mt-3 mb-1">Return</label>
                                                    <select class="form-select" aria-label="" name="return" id="return">
                                                        <option selected>Return to</option>
                                                        <?php if ($id_loc == 1): ?>
                                                            <option value="0">Sample Rack</option>
                                                        <?php elseif ($id_loc == 2): ?>
                                                            <option value="0">Sample Rack</option>
                                                            <option value="1">Sampe Before Test</option>
                                                        <?php elseif ($id_loc == 3): ?>
                                                            <option value="0">Sample Rack</option>
                                                            <option value="1">Sampe Before Test</option>
                                                            <option value="2">Lab/Testing</option>
                                                        <?php elseif ($id_loc == 4): ?>
                                                            <option value="0">Sample Rack</option>
                                                            <option value="1">Sampe Before Test</option>
                                                            <option value="2">Lab/Testing</option>
                                                            <option value="3">Sample After Test</option>
                                                        <?php else: ?>
                                                        <?php endif; ?>
                                                    </select>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                                        class="fa fa-xmark"></i><strong> CANCEL</strong>
                                                </button>
                                                <button type="submit" class="btn btn-primary" name="btn-return"><i
                                                        class="fa fa-rotate-left"></i><strong> RETURN</strong>
                                                </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end modal detail -->

                                <?php if ($loc == "Sample Before Test"): ?>
                                    <ul class="bars mt-5">
                                        <li>
                                            <i class="icon uil uil-server"></i>
                                            <div class="prog one active">
                                                <i class="uil uil-check"></i>
                                            </div>
                                            <p class="text">Sample Before Test</p>
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
                                            <p class="text">Sample After Test</p>
                                        </li>
                                        <li>
                                            <i class="icon uil uil-file-check-alt"></i>
                                            <div class="prog five">
                                                <i class="uil uil-check"></i>
                                            </div>
                                            <p class="text">Finish</p>
                                        </li>
                                    </ul>
                                <?php elseif ($loc == "Lab"): ?>
                                    <ul class="bars mt-5">
                                        <li>
                                            <i class="icon uil uil-server"></i>
                                            <div class="prog one active">
                                                <i class="uil uil-check"></i>
                                            </div>
                                            <p class="text">Sample Before Test</p>
                                        </li>
                                        <li>
                                            <i class="icon uil uil-flask"></i>
                                            <div class="prog two active">
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
                                            <p class="text">Sample After Test</p>
                                        </li>
                                        <li>
                                            <i class="icon uil uil-file-check-alt"></i>
                                            <div class="prog five">
                                                <i class="uil uil-check"></i>
                                            </div>
                                            <p class="text">Finish</p>
                                        </li>
                                    </ul>
                                <?php elseif ($loc == "Sample After Test"): ?>
                                    <ul class="bars mt-5">
                                        <li>
                                            <i class="icon uil uil-server"></i>
                                            <div class="prog one active">
                                                <i class="uil uil-check"></i>
                                            </div>
                                            <p class="text">Sample Before Test</p>
                                        </li>
                                        <li>
                                            <i class="icon uil uil-flask"></i>
                                            <div class="prog two active">
                                                <i class="uil uil-check">
                                                </i>
                                            </div>
                                            <p class="text">Lab</p>
                                        </li>
                                        <li>
                                            <i class="icon uil uil-server"></i>
                                            <div class="prog four active">
                                                <i class="uil uil-check"></i>
                                            </div>
                                            <p class="text">Sample After Test</p>
                                        </li>
                                        <li>
                                            <i class="icon uil uil-file-check-alt"></i>
                                            <div class="prog five">
                                                <i class="uil uil-check"></i>
                                            </div>
                                            <p class="text">Finish</p>
                                        </li>
                                    </ul>
                                <?php elseif ($loc == "Finish"): ?>
                                    <ul class="bars mt-5">
                                        <li>
                                            <i class="icon uil uil-server"></i>
                                            <div class="prog one active">
                                                <i class="uil uil-check"></i>
                                            </div>
                                            <p class="text">Sample Before Test</p>
                                        </li>
                                        <li>
                                            <i class="icon uil uil-flask"></i>
                                            <div class="prog two active">
                                                <i class="uil uil-check">
                                                </i>
                                            </div>
                                            <p class="text">Lab</p>
                                        </li>
                                        <li>
                                            <i class="icon uil uil-server"></i>
                                            <div class="prog four active">
                                                <i class="uil uil-check"></i>
                                            </div>
                                            <p class="text">Sample After Test</p>
                                        </li>
                                        <li>
                                            <i class="icon uil uil-file-check-alt"></i>
                                            <div class="prog five active">
                                                <i class="uil uil-check"></i>
                                            </div>
                                            <p class="text">Finish</p>
                                        </li>
                                    </ul>
                                <?php else: ?>
                                    <ul class="bars mt-5">
                                        <li>
                                            <i class="icon uil uil-server"></i>
                                            <div class="prog one">
                                                <i class="uil uil-check"></i>
                                            </div>
                                            <p class="text">Sample Before Test</p>
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
                                            <p class="text">Sample After Test</p>
                                        </li>
                                        <li>
                                            <i class="icon uil uil-file-check-alt"></i>
                                            <div class="prog five">
                                                <i class="uil uil-check"></i>
                                            </div>
                                            <p class="text">Finish</p>
                                        </li>
                                    </ul>
                                    <?php
                                endif;
                            endforeach;
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
                                        <i class="uil uil-check"></i>
                                    </div>
                                    <p class="text">Sample Before Test</p>
                                </li>
                                <li>
                                    <i class="icon uil uil-flask"></i>
                                    <div class="prog two">
                                        <i class="uil uil-check"></i>
                                    </div>
                                    <p class="text">Lab</p>
                                </li>
                                <li>
                                    <i class="icon uil uil-server"></i>
                                    <div class="prog four">
                                        <i class="uil uil-check"></i>
                                    </div>
                                    <p class="text">Sample After Test</p>
                                </li>
                                <li>
                                    <i class="icon uil uil-file-check-alt"></i>
                                    <div class="prog five">
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
                                <thead class="table-secondary">
                                    <tr>
                                        <th>Sample Test</th>
                                        <th>NJO</th>
                                        <th>Sample Name</th>
                                        <th>Qty</th>
                                        <th>Customer</th>
                                        <th>Ent. Date</th>
                                        <th>Item Test</th>
                                        <th>Tools</th>
                                        <th>After Test</th>
                                        <th>Loc</th>
                                        <th>PIC</th>
                                        <th>Rack</th>
                                    </tr>
                                </thead>
                                <?php foreach ($sample_tbl as $row): ?>
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
                                                <?= $row["customer"]; ?>
                                            </td>
                                            <td>
                                                <?= $row["tgl_datang"]; ?>
                                            </td>
                                            <td>
                                                <ul class="lists">
                                                    <li>
                                                        <?= $row["tujuan1"]; ?>
                                                    </li>
                                                    <li>
                                                        <?= $row["tujuan2"]; ?>
                                                    </li>
                                                    <li>
                                                        <?= $row["tujuan3"]; ?>
                                                    </li>
                                                    <li>
                                                        <?= $row["tujuan4"]; ?>
                                                    </li>
                                                    <li>
                                                        <?= $row["tujuan5"]; ?>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td>
                                                <?= $row["tools"]; ?>
                                            </td>
                                            <td>
                                                <?= $row["after_test"]; ?>
                                            </td>
                                            <td>
                                                <?= $row["id_loc"]; ?>
                                            </td>
                                            <td>
                                                <?= $row["pic"]; ?>
                                            </td>
                                            <td>
                                                <?= $row["rak"]; ?>
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

    <script src="js/script-track.js"></script>
    <script src="js/script.js"></script>
</body>

</html>