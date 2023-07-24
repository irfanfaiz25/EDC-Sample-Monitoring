<?php
include 'fungsi/fungsi.php';

$sample = query("SELECT * FROM tb_sample ORDER BY time_stamp DESC");
$sample_scrap = query("SELECT * FROM tb_sample WHERE after_test='scrap' ORDER BY time_stamp DESC");
$sample_return = query("SELECT * FROM tb_sample WHERE after_test='return' ORDER BY time_stamp DESC");

if (isset($_GET["after_test"])) {
    if (update_after($_GET)) {
        header('Location: index.php');
    } else {
        $errorafter = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EDC Management</title>

    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style-trackk.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- data table -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" />

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <div class="sidebar close">
        <div class="logo-details ps-2 pt-2">
            <img src="img/logoo-astra.png" height="50px" alt="">
            <span class="logo_name"><i>AOP</i></span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="index.php">
                    <i class='fa fa-home'></i>
                    <span class="link_name">Dashboard</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="index.php">Dashboard</a></li>
                </ul>
            </li>
            <li>
                <a href="sample.php">
                    <i class='fa fa-database'></i>
                    <span class="link_name">Sample Data</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="sample.php">Sample Data</a></li>
                </ul>
            </li>
            <li>
                <a href="track.php">
                    <i class='fa fa-location-dot'></i>
                    <span class="link_name">Tracking</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="track.php">Tracking</a></li>
                </ul>
            </li>
            <li>
                <a href="setting.php">
                    <i class='bx bx-cog'></i>
                    <span class="link_name">Setting</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="setting.php">Setting</a></li>
                </ul>
            </li>
            <li>
                <div class="profile-details">
                    <div class="profile-content">
                        <img src="img/davida.jpg" alt="profileImg">
                    </div>
                    <div class="name-job">
                        <div class="profile_name">Agustinus</div>
                        <div class="job">Web Designer</div>
                    </div>
                    <i class='bx bx-log-out'></i>
                </div>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <div class="home-content">
            <i class='bx bx-menu'></i>
            <span class="text">Dashboard</span>
            <span class="notif">
                <div class="icon" id="bell"> <i class="fa fa-bell fa-2xl"></i><span
                        class="badge rounded-pill badge-notification bg-danger mt-1">9</span></div>
                <div class="notifications" id="box">
                    <h2>Notifications - <span>2</span></h2>
                    <div class="notifications-item">
                        <div class="text">
                            <h4>Samso aliao</h4>
                            <p>Samso Nagaro Like your home work</p>
                        </div>
                    </div>
                    <div class="notifications-item">
                        <div class="text">
                            <h4>John Silvester</h4>
                            <p>+20 vista badge earned</p>
                        </div>
                    </div>
                </div>
            </span>
        </div>

        <div class="container cont-dash">
            <div class="row ms-3 cont-dash2">
                <div class="col-md-4 pt-3">
                    <div class="card-dash">
                        <div class="block-content">
                            <p class="teks-light">Sample Pending</p>
                            <div class="value-light">
                                <p class="fill">$0</p>
                            </div>
                            <div class="note">Pcs</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 pt-3">
                    <div class="card-dash-2">
                        <div class="block-content">
                            <p class="teks-light">Sample On Track</p>
                            <div class="value-light">
                                <p class="fill">$</p>
                            </div>
                            <div class="note">Pcs</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 pt-3">
                    <div class="card-dash-3">
                        <div class="block-content">
                            <p class="teks-light">Total Sample</p>
                            <div class="value-light">
                                <p class="fill">$</p>
                            </div>
                            <div class="note">Pcs</div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            if (isset($errorafter)): ?>
                <div id="myAlert" class="alert alert-danger alert-dismissible fade show ms-4 mt-4">
                    Add action after failed!
                    <button type="button" id="myBtn" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                <?php
            endif;
            ?>
            <div class="row pb-4 ps-4 nav-tab">
                <div class="col-md-12">
                    <ul id="myTab" class="nav nav-tabs float-end pe-5">
                        <li class="nav-item">
                            <a href="#tracking" class="nav-link active"
                                data-bs-toggle="tab"><strong>TRACKING</strong></a>
                        </li>
                        <li class="nav-item">
                            <a href="#scrap" class="nav-link" data-bs-toggle="tab"><strong>SCRAP</strong></a>
                        </li>
                        <li class="nav-item">
                            <a href="#return" class="nav-link" data-bs-toggle="tab"><strong>RETURN CUST.</strong></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tracking">
                            <div class="card-dash-body">

                                <div class="table-responsive">
                                    <div id="pending-table" style="color: black !important;">
                                        <table id="tabel-data" class="table table-bordered align-middle text-center">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th scope="col">Tracking</th>
                                                    <th scope="col" hidden>Timestamp</th>
                                                    <th scope="col">After</th>
                                                </tr>
                                            </thead>
                                            <?php $i = 1; ?>
                                            <?php foreach ($sample as $data): ?>
                                                <tr>
                                                    <td class="track-column">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="tag pt-3 ps-5">
                                                                    <h2>
                                                                        <?= $data["sample_test"]; ?>
                                                                    </h2>
                                                                    <h6>
                                                                        <?= $data["nm_sample"]; ?>
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9 track-graph">
                                                                <?php

                                                                $id_loc = $data["id_loc"];
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
                                                                if ($loc == "Sample Before Test"): ?>
                                                                    <ul class="bars mt-2">
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
                                                                    <ul class="bars mt-2">
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
                                                                    <ul class="bars mt-2">
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
                                                                    <ul class="bars mt-2">
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
                                                                    <ul class="bars mt-2">
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
                                                                endif; ?>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td hidden>
                                                        <?= $data["time_stamp"]; ?>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-danger btn-sm dropdown-toggle" role="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false" <?php
                                                            if ($data["id_loc"] != 4) {
                                                                echo "disabled";
                                                            }
                                                            ?>>
                                                            After Test
                                                        </button>

                                                        <ul class="nav-links dropdown-menu">
                                                            <li><a class="dropdown-item"
                                                                    href="?after_test=scrap&&sample_test=<?= $data["sample_test"]; ?>">Scrap</a>
                                                            </li>
                                                            <li><a class="dropdown-item"
                                                                    href="?after_test=return&&sample_test=<?= $data["sample_test"]; ?>">Return
                                                                    to Customer</a></li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <?php $i++; ?>
                                            <?php endforeach; ?>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade show active" id="scrap">
                            <div class="card-dash-body">

                                <div class="table-responsive">
                                    <div id="pending-table" style="color: black !important;">
                                        <table id="tabel-scrap" class="table table-bordered align-middle text-center">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th scope="col">Tracking</th>
                                                    <th scope="col" hidden>Timestamp</th>
                                                </tr>
                                            </thead>
                                            <?php $i = 1; ?>
                                            <?php foreach ($sample_scrap as $data): ?>
                                                <tr>
                                                    <td class="track-column">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="tag pt-3 ps-5">
                                                                    <h2>
                                                                        <?= $data["sample_test"]; ?>
                                                                    </h2>
                                                                    <h6>
                                                                        <?= $data["nm_sample"]; ?>
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9 track-graph">
                                                                <?php

                                                                $id_loc = $data["id_loc"];
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
                                                                if ($loc == "Sample Before Test"): ?>
                                                                    <ul class="bars mt-2">
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
                                                                    <ul class="bars mt-2">
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
                                                                    <ul class="bars mt-2">
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
                                                                    <ul class="bars mt-2">
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
                                                                    <ul class="bars mt-2">
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
                                                                endif; ?>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td hidden>
                                                        <?= $data["time_stamp"]; ?>
                                                    </td>
                                                </tr>

                                                <?php $i++; ?>
                                            <?php endforeach; ?>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade show active" id="return">
                            <div class="card-dash-body">

                                <div class="table-responsive">
                                    <div id="pending-table" style="color: black !important;">
                                        <table id="tabel-return" class="table table-bordered align-middle text-center">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th scope="col">Tracking</th>
                                                    <th scope="col" hidden>Timestamp</th>
                                                </tr>
                                            </thead>
                                            <?php $i = 1; ?>
                                            <?php foreach ($sample_return as $data): ?>
                                                <tr>
                                                    <td class="track-column">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="tag pt-3 ps-5">
                                                                    <h2>
                                                                        <?= $data["sample_test"]; ?>
                                                                    </h2>
                                                                    <h6>
                                                                        <?= $data["nm_sample"]; ?>
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9 track-graph">
                                                                <?php

                                                                $id_loc = $data["id_loc"];
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
                                                                if ($loc == "Sample Before Test"): ?>
                                                                    <ul class="bars mt-2">
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
                                                                    <ul class="bars mt-2">
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
                                                                    <ul class="bars mt-2">
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
                                                                    <ul class="bars mt-2">
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
                                                                    <ul class="bars mt-2">
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
                                                                endif; ?>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td hidden>
                                                        <?= $data["time_stamp"]; ?>
                                                    </td>
                                                </tr>

                                                <?php $i++; ?>
                                            <?php endforeach; ?>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>



                </div>

            </div>

        </div>

        </div>

    </section>

    <script>
        $(document).ready(function () {
            $('#tabel-data').DataTable();
        });

        $('#tabel-data').dataTable({
            "pageLength": 2
        });

        var table = $('#tabel-data').DataTable();

        table
            .order([1, 'desc'])
            .draw();

        $(document).ready(function () {
            $('#tabel-scrap').DataTable();
        });

        $('#tabel-scrap').dataTable({
            "pageLength": 2
        });

        var table = $('#tabel-scrap').DataTable();

        table
            .order([1, 'desc'])
            .draw();

        $(document).ready(function () {
            $('#tabel-return').DataTable();
        });

        $('#tabel-return').dataTable({
            "pageLength": 2
        });

        var table = $('#tabel-return').DataTable();

        table
            .order([1, 'desc'])
            .draw();



        document.addEventListener("DOMContentLoaded", function () {
            var tabList = [].slice.call(document.querySelectorAll('a[data-bs-toggle="tab"]'));
            tabList.forEach(function (tab) {
                tab.addEventListener("shown.bs.tab", function (e) {
                    console.log(e.target); // newly activated tab
                    console.log(e.relatedTarget); // previous active tab
                    var activeTab = e.target.innerText; // Get the name of active tab
                    var previousTab = e.relatedTarget.innerText; // Get the name of previous active tab
                    document.querySelector(".active-tab span").innerHTML = activeTab;
                    document.querySelector(".previous-tab span").innerHTML = previousTab;
                });
            });
        });

        $(document).ready(function () {




            var down = false;

            $('#bell').click(function (e) {

                var color = $(this).text();
                if (down) {

                    $('#box').css('height', '0px');
                    $('#box').css('opacity', '0');
                    down = false;
                } else {

                    $('#box').css('height', 'auto');
                    $('#box').css('opacity', '1');
                    down = true;

                }

            });

        });
    </script>

    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    <script src="js/script-track.js"></script>
</body>

</html>