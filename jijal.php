<?php
include 'fungsi/fungsi.php';
include 'fungsi/chart-fungsi.php';
include 'fungsi/fungsi-index.php';
include 'header.php';

?>


<section id="home-page" class="home-section">
    <div class="home-content" id="head-page">
        <i class='bx bx-menu'></i>
        <span class="text">Dashboard</span>
        <div class="col-md-10">
            <div class="logout me-4" id="logout">
                <a href="logout.php">
                    <i class="fa fa-right-from-bracket fa-2xl text-black"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container cont-dash">
            <div class="row me-3 cont-dash2">
                <div class="col-md-4 pt-3">
                    <div class="card-dash">
                        <div class="block-content">
                            <p class="teks-light">Sample Incoming</p>
                            <div class="value-light">
                                <p class="fill">
                                    <?= $pending; ?>
                                </p>
                                <span class="icon-dash fa-regular fa-clock fa-6x">
                                </span>
                            </div>
                            <div class="note">Pcs</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 pt-3">
                    <div class="card-dash-2">
                        <div class="block-content">
                            <p class="teks-light">Sample On Progress</p>
                            <div class="value-light">
                                <p class="fill">
                                    <?= $ot; ?>
                                </p>
                                <span class="icon-dash fa fa-truck-fast fa-6x">
                                </span>
                            </div>
                            <div class="note">Pcs</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 pt-3">
                    <div class="card-dash-3">
                        <div class="block-content">
                            <p class="teks-light">Sample After Test</p>
                            <div class="value-light">
                                <p class="fill">
                                    <?= $done; ?>
                                </p>
                                <span class="icon-dash fa fa-clipboard-check fa-6x">
                                </span>
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
                            <a href="#incoming" class="nav-link active" data-bs-toggle="tab"><strong>
                                    <span class="badge rounded-pill badge-notification bg-danger">
                                        <?= $all; ?>
                                    </span>
                                    INCOMING</strong></a>
                        </li>
                        <li class="nav-item">
                            <a href="#waiting" class="nav-link" data-bs-toggle="tab"><strong>
                                    <span class="badge rounded-pill badge-notification bg-danger">
                                        <?= $all; ?>
                                    </span>
                                    WAITING</strong></a>
                        </li>
                        <li class="nav-item">
                            <a href="#tracking" class="nav-link" data-bs-toggle="tab"><strong>
                                    <span class="badge rounded-pill badge-notification bg-danger">
                                        <?= $all; ?>
                                    </span>
                                    TRACKING</strong></a>
                        </li>
                        <li class="nav-item">
                            <a href="#scrap" class="nav-link" data-bs-toggle="tab"><strong>
                                    <span class="badge rounded-pill badge-notification bg-danger">
                                        <?= $scrap; ?>
                                    </span>
                                    SCRAP</strong></a>
                        </li>
                        <li class="nav-item">
                            <a href="#return" class="nav-link" data-bs-toggle="tab"><strong>
                                    <span class="badge rounded-pill badge-notification bg-danger">
                                        <?= $return_c; ?>
                                    </span>
                                    RETURN CUST.</strong></a>
                        </li>
                        <li class="nav-item">
                            <a href="#exp" class="nav-link" data-bs-toggle="tab"><strong>
                                    <span class="badge rounded-pill badge-notification bg-danger">
                                        <?= $exp; ?>
                                    </span>
                                    EXP</strong></a>
                        </li>
                        <li class="nav-item">
                            <a href="#history" class="nav-link" data-bs-toggle="tab"><strong>
                                    <span class="badge rounded-pill badge-notification bg-danger">
                                        <?= $hist; ?>
                                    </span>
                                    HISTORY</strong></a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-12">
                    <div class="tab-content">
                        <div class="tab-pane fade show" id="tracking">
                            <div class="card-dash-body">

                                <div class="table-responsive">
                                    <div id="pending-table" style="color: black !important;">
                                        <table id="tabel-data-track"
                                            class="table table-bordered align-middle text-center">
                                            <thead class="table-secondary">
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Tracking</th>
                                                    <th scope="col" hidden>Timestamp</th>
                                                    <th scope="col">After</th>
                                                </tr>
                                            </thead>
                                            <?php $i = 1; ?>
                                            <?php foreach ($sample as $data): ?>
                                                <tr>
                                                    <td>
                                                        <?= $i; ?>
                                                    </td>
                                                    <td class="track-column">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="tag pt-3 ps-5">
                                                                    <h2>
                                                                        <?= $data["sample_test"]; ?>
                                                                    </h2>
                                                                    <h6>
                                                                        <?= $data["njo"]; ?>
                                                                    </h6>
                                                                    <h6>
                                                                        <?= $data["nm_sample"]; ?>
                                                                    </h6>
                                                                    <a href="" data-toggle="modal"
                                                                        data-target="#detailImage<?= $data["sample_test"]; ?>">
                                                                        <img src="img/foto-sample/<?= $data["foto"]; ?>"
                                                                            height="70" alt="">
                                                                    </a>

                                                                    <!-- detail image modal -->
                                                                    <div id="detailImage<?= $data["sample_test"]; ?>"
                                                                        class="modal fade" tabindex="	-1">
                                                                        <div class="modal-dialog modal-lg">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h4 class="text-black">
                                                                                        Image Sample (
                                                                                        <?= $data["sample_test"]; ?>)
                                                                                    </h4>
                                                                                    <button type="button" class="btn-close"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <div class="row">
                                                                                        <div
                                                                                            class="col-md-12 text-center pb-5 pt-4">
                                                                                            <img src="img/foto-sample/<?= $data["foto"]; ?>"
                                                                                                alt="foto-sample"
                                                                                                height="400">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- end detail image modal -->
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
                                                                            <i class="icon-green uil uil-server"></i>
                                                                            <div class="prog one active-green">
                                                                                <i class="uil uil-check"></i>
                                                                            </div>
                                                                            <p class="text-green mb-0">Sample Before Test</p>
                                                                            <?php
                                                                            if ($data["tgl_datang"] != ""):
                                                                                ?>
                                                                                <p class="text mt-0">(
                                                                                    <?= date("d-m-Y H:i:s", strtotime($data["tgl_datang"])); ?>)
                                                                                </p>
                                                                                <?php
                                                                            endif;
                                                                            ?>
                                                                        </li>
                                                                        <li>
                                                                            <i class="icon-green uil uil-flask"></i>
                                                                            <div class="prog two">
                                                                                <i class="uil uil-check">
                                                                                </i>
                                                                            </div>
                                                                            <p class="text-green mb-0">Lab/Testing</p>
                                                                            <?php
                                                                            if ($data["date_take"] != ""):
                                                                                ?>
                                                                                <p class="text mt-0">(
                                                                                    <?= date("d-m-Y H:i:s", strtotime($data["date_take"])); ?>)
                                                                                </p>
                                                                                <?php
                                                                            endif;
                                                                            ?>
                                                                        </li>
                                                                        <li>
                                                                            <i class="icon-green uil uil-server"></i>
                                                                            <div class="prog four">
                                                                                <i class="uil uil-check"></i>
                                                                            </div>
                                                                            <p class="text-green mb-0">Sample After Test</p>
                                                                            <?php
                                                                            if ($data["date_return"] != ""):
                                                                                ?>
                                                                                <p class="text mt-0">(
                                                                                    <?= date("d-m-Y H:i:s", strtotime($data["date_return"])); ?>)
                                                                                </p>
                                                                                <?php
                                                                            endif;
                                                                            ?>
                                                                        </li>
                                                                        <li>
                                                                            <i class="icon-green uil uil-file-check-alt"></i>
                                                                            <div class="prog five">
                                                                                <i class="uil uil-check"></i>
                                                                            </div>
                                                                            <?php
                                                                            if ($data["date_after"] != ""):
                                                                                ?>
                                                                                <p class="text-green">
                                                                                    <?= $data["after_test"]; ?>
                                                                                </p>
                                                                                <p class="text mt-0">(
                                                                                    <?= date("d-m-Y H:i:s", strtotime($data["date_after"])); ?>)
                                                                                </p>
                                                                                <?php
                                                                            else:
                                                                                ?>
                                                                                <p class="text-green">Status After</p>
                                                                                <?php
                                                                            endif;
                                                                            ?>
                                                                        </li>
                                                                    </ul>
                                                                <?php elseif ($loc == "Lab"): ?>
                                                                    <ul class="bars mt-2">
                                                                        <li>
                                                                            <i class="icon-green uil uil-server"></i>
                                                                            <div class="prog one active-green">
                                                                                <i class="uil uil-check"></i>
                                                                            </div>
                                                                            <p class="text-green mb-0">Sample Before Test</p>
                                                                            <?php
                                                                            if ($data["tgl_datang"] != ""):
                                                                                ?>
                                                                                <p class="text mt-0">(
                                                                                    <?= date("d-m-Y H:i:s", strtotime($data["tgl_datang"])); ?>)
                                                                                </p>
                                                                                <?php
                                                                            endif;
                                                                            ?>
                                                                        </li>
                                                                        <li>
                                                                            <i class="icon-green uil uil-flask"></i>
                                                                            <div class="prog two active-green">
                                                                                <i class="uil uil-check">
                                                                                </i>
                                                                            </div>
                                                                            <p class="text-green mb-0">Lab/Testing</p>
                                                                            <?php
                                                                            if ($data["date_take"] != ""):
                                                                                ?>
                                                                                <p class="text mt-0">(
                                                                                    <?= date("d-m-Y H:i:s", strtotime($data["date_take"])); ?>)
                                                                                </p>
                                                                                <?php
                                                                            endif;
                                                                            ?>
                                                                        </li>
                                                                        <li>
                                                                            <i class="icon-green uil uil-server"></i>
                                                                            <div class="prog four">
                                                                                <i class="uil uil-check"></i>
                                                                            </div>
                                                                            <p class="text-green mb-0">Sample After Test</p>
                                                                            <?php
                                                                            if ($data["date_return"] != ""):
                                                                                ?>
                                                                                <p class="text mt-0">(
                                                                                    <?= date("d-m-Y H:i:s", strtotime($data["date_return"])); ?>)
                                                                                </p>
                                                                                <?php
                                                                            endif;
                                                                            ?>
                                                                        </li>
                                                                        <li>
                                                                            <i class="icon-green uil uil-file-check-alt"></i>
                                                                            <div class="prog five">
                                                                                <i class="uil uil-check"></i>
                                                                            </div>
                                                                            <?php
                                                                            if ($data["date_after"] != ""):
                                                                                ?>
                                                                                <p class="text-green">
                                                                                    <?= $data["after_test"]; ?>
                                                                                </p>
                                                                                <p class="text mt-0">(
                                                                                    <?= date("d-m-Y H:i:s", strtotime($data["date_after"])); ?>)
                                                                                </p>
                                                                                <?php
                                                                            else:
                                                                                ?>
                                                                                <p class="text-green">Status After</p>
                                                                                <?php
                                                                            endif;
                                                                            ?>
                                                                        </li>
                                                                    </ul>
                                                                <?php elseif ($loc == "Sample After Test"): ?>
                                                                    <ul class="bars mt-2">
                                                                        <li>
                                                                            <i class="icon-green uil uil-server"></i>
                                                                            <div class="prog one active-green">
                                                                                <i class="uil uil-check"></i>
                                                                            </div>
                                                                            <p class="text-green mb-0">Sample Before Test</p>
                                                                            <?php
                                                                            if ($data["tgl_datang"] != ""):
                                                                                ?>
                                                                                <p class="text mt-0">(
                                                                                    <?= date("d-m-Y H:i:s", strtotime($data["tgl_datang"])); ?>)
                                                                                </p>
                                                                                <?php
                                                                            endif;
                                                                            ?>
                                                                        </li>
                                                                        <li>
                                                                            <i class="icon-green uil uil-flask"></i>
                                                                            <div class="prog two active-green">
                                                                                <i class="uil uil-check">
                                                                                </i>
                                                                            </div>
                                                                            <p class="text-green mb-0">Lab/Testing</p>
                                                                            <?php
                                                                            if ($data["date_take"] != ""):
                                                                                ?>
                                                                                <p class="text mt-0">(
                                                                                    <?= date("d-m-Y H:i:s", strtotime($data["date_take"])); ?>)
                                                                                </p>
                                                                                <?php
                                                                            endif;
                                                                            ?>
                                                                        </li>
                                                                        <li>
                                                                            <i class="icon-green uil uil-server"></i>
                                                                            <div class="prog four active-green">
                                                                                <i class="uil uil-check"></i>
                                                                            </div>
                                                                            <p class="text-green mb-0">Sample After Test</p>
                                                                            <?php
                                                                            if ($data["date_return"] != ""):
                                                                                ?>
                                                                                <p class="text mt-0">(
                                                                                    <?= date("d-m-Y H:i:s", strtotime($data["date_return"])); ?>)
                                                                                </p>
                                                                                <?php
                                                                            endif;
                                                                            ?>
                                                                        </li>
                                                                        <li>
                                                                            <i class="icon-green uil uil-file-check-alt"></i>
                                                                            <div class="prog five">
                                                                                <i class="uil uil-check"></i>
                                                                            </div>
                                                                            <?php
                                                                            if ($data["date_after"] != ""):
                                                                                ?>
                                                                                <p class="text-green">
                                                                                    <?= $data["after_test"]; ?>
                                                                                </p>
                                                                                <p class="text mt-0">(
                                                                                    <?= date("d-m-Y H:i:s", strtotime($data["date_after"])); ?>)
                                                                                </p>
                                                                                <?php
                                                                            else:
                                                                                ?>
                                                                                <p class="text-green">Status After</p>
                                                                                <?php
                                                                            endif;
                                                                            ?>
                                                                        </li>
                                                                    </ul>
                                                                <?php elseif ($loc == "Finish"): ?>
                                                                    <ul class="bars mt-2">
                                                                        <li>
                                                                            <i class="icon-green uil uil-server"></i>
                                                                            <div class="prog one active-green">
                                                                                <i class="uil uil-check"></i>
                                                                            </div>
                                                                            <p class="text-green mb-0">Sample Before Test</p>
                                                                            <?php
                                                                            if ($data["tgl_datang"] != ""):
                                                                                ?>
                                                                                <p class="text mt-0">(
                                                                                    <?= date("d-m-Y H:i:s", strtotime($data["tgl_datang"])); ?>)
                                                                                </p>
                                                                                <?php
                                                                            endif;
                                                                            ?>
                                                                        </li>
                                                                        <li>
                                                                            <i class="icon-green uil uil-flask"></i>
                                                                            <div class="prog two active-green">
                                                                                <i class="uil uil-check">
                                                                                </i>
                                                                            </div>
                                                                            <p class="text-green mb-0">Lab/Testing</p>
                                                                            <?php
                                                                            if ($data["date_take"] != ""):
                                                                                ?>
                                                                                <p class="text mt-0">(
                                                                                    <?= date("d-m-Y H:i:s", strtotime($data["date_take"])); ?>)
                                                                                </p>
                                                                                <?php
                                                                            endif;
                                                                            ?>
                                                                        </li>
                                                                        <li>
                                                                            <i class="icon-green uil uil-server"></i>
                                                                            <div class="prog four active-green">
                                                                                <i class="uil uil-check"></i>
                                                                            </div>
                                                                            <p class="text-green mb-0">Sample After Test</p>
                                                                            <?php
                                                                            if ($data["date_return"] != ""):
                                                                                ?>
                                                                                <p class="text mt-0">(
                                                                                    <?= date("d-m-Y H:i:s", strtotime($data["date_return"])); ?>)
                                                                                </p>
                                                                                <?php
                                                                            endif;
                                                                            ?>
                                                                        </li>
                                                                        <li>
                                                                            <i class="icon-green uil uil-file-check-alt"></i>
                                                                            <div class="prog five active-green">
                                                                                <i class="uil uil-check"></i>
                                                                            </div>
                                                                            <?php
                                                                            if ($data["date_after"] != ""):
                                                                                ?>
                                                                                <p class="text-green">
                                                                                    <?= $data["after_test"]; ?>
                                                                                </p>
                                                                                <p class="text mt-0">(
                                                                                    <?= date("d-m-Y H:i:s", strtotime($data["date_after"])); ?>)
                                                                                </p>
                                                                                <?php
                                                                            else:
                                                                                ?>
                                                                                <p class="text-green">Status After</p>
                                                                                <?php
                                                                            endif;
                                                                            ?>
                                                                        </li>
                                                                    </ul>
                                                                <?php else: ?>
                                                                    <ul class="bars mt-2">
                                                                        <li>
                                                                            <i class="icon-green uil uil-server"></i>
                                                                            <div class="prog one">
                                                                                <i class="uil uil-check"></i>
                                                                            </div>
                                                                            <p class="text-green mb-0">Sample Before Test</p>
                                                                            <?php
                                                                            if ($data["tgl_datang"] != "" && $data["id_loc"] != 0):
                                                                                ?>
                                                                                <p class="text mt-0">(
                                                                                    <?= date("d-m-Y H:i:s", strtotime($data["tgl_datang"])); ?>)
                                                                                </p>
                                                                                <?php
                                                                            endif;
                                                                            ?>
                                                                        </li>
                                                                        <li>
                                                                            <i class="icon-green uil uil-flask"></i>
                                                                            <div class="prog two">
                                                                                <i class="uil uil-check">
                                                                                </i>
                                                                            </div>
                                                                            <p class="text-green mb-0">Lab/Testing</p>
                                                                            <?php
                                                                            if ($data["date_take"] != ""):
                                                                                ?>
                                                                                <p class="text mt-0">(
                                                                                    <?= date("d-m-Y H:i:s", strtotime($data["date_take"])); ?>)
                                                                                </p>
                                                                                <?php
                                                                            endif;
                                                                            ?>
                                                                        </li>
                                                                        <li>
                                                                            <i class="icon-green uil uil-server"></i>
                                                                            <div class="prog four">
                                                                                <i class="uil uil-check"></i>
                                                                            </div>
                                                                            <p class="text-green mb-0">Sample After Test</p>
                                                                            <?php
                                                                            if ($data["date_return"] != ""):
                                                                                ?>
                                                                                <p class="text mt-0">(
                                                                                    <?= date("d-m-Y H:i:s", strtotime($data["date_return"])); ?>)
                                                                                </p>
                                                                                <?php
                                                                            endif;
                                                                            ?>
                                                                        </li>
                                                                        <li>
                                                                            <i class="icon-green uil uil-file-check-alt"></i>
                                                                            <div class="prog five">
                                                                                <i class="uil uil-check"></i>
                                                                            </div>
                                                                            <?php
                                                                            if ($data["date_after"] != ""):
                                                                                ?>
                                                                                <p class="text-green">
                                                                                    <?= $data["after_test"]; ?>
                                                                                </p>
                                                                                <p class="text mt-0">(
                                                                                    <?= date("d-m-Y H:i:s", strtotime($data["date_after"])); ?>)
                                                                                </p>
                                                                                <?php
                                                                            else:
                                                                                ?>
                                                                                <p class="text-green">Status After</p>
                                                                                <?php
                                                                            endif;
                                                                            ?>
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
                                                        <button class="btn btn-primary btn-sm dropdown-toggle" role="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false" <?php
                                                            if ($data["id_loc"] != 3) {
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

                        v class="tab-pane fade show" id="scrap">
                        <div class="card-dash-body">

                            <div class="table-responsive">
                                <div id="pending-table" style="color: black !important;">
                                    <table id="tabel-scrap" class="table table-bordered align-middle text-center">
                                        <thead class="table-secondary">
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Tracking</th>
                                                <th scope="col">Timestamp</th>
                                            </tr>
                                        </thead>
                                        <?php $i = 1; ?>
                                        <?php foreach ($sample_scrap as $data): ?>
                                            <tr>
                                                <td>
                                                    <?= $i; ?>
                                                </td>
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
                                                                <a href="" data-toggle="modal"
                                                                    data-target="#detailImage<?= $data["sample_test"]; ?>">
                                                                    <img src="img/foto-sample/<?= $data["foto"]; ?>"
                                                                        height="70" alt="">
                                                                </a>

                                                                <!-- detail image modal -->
                                                                <div id="detailImage<?= $data["sample_test"]; ?>"
                                                                    class="modal fade" tabindex="	-1">
                                                                    <div class="modal-dialog modal-lg">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="text-black">
                                                                                    Image Sample (
                                                                                    <?= $data["sample_test"]; ?>)
                                                                                </h4>
                                                                                <button type="button" class="btn-close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="row">
                                                                                    <div
                                                                                        class="col-md-12 text-center pb-5 pt-4">
                                                                                        <img src="img/foto-sample/<?= $data["foto"]; ?>"
                                                                                            alt="foto-sample" height="400">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- end detail image modal -->
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
                                                                        <i class="icon-black uil uil-server"></i>
                                                                        <div class="prog one active-black">
                                                                            <i class="uil uil-check"></i>
                                                                        </div>
                                                                        <p class="text-black mb-0">Sample Before Test</p>
                                                                        <p class="text mt-0">(
                                                                            <?= date("d-m-Y H:i:s", strtotime($data["tgl_datang"])); ?>)
                                                                        </p>
                                                                    </li>
                                                                    <li>
                                                                        <i class="icon-black uil uil-flask"></i>
                                                                        <div class="prog two">
                                                                            <i class="uil uil-check">
                                                                            </i>
                                                                        </div>
                                                                        <p class="text-black mb-0">Lab/Testing</p>
                                                                        <p class="text mt-0">(
                                                                            <?= date("d-m-Y H:i:s", strtotime($data["date_take"])); ?>)
                                                                        </p>
                                                                    </li>
                                                                    <li>
                                                                        <i class="icon-black uil uil-server"></i>
                                                                        <div class="prog four">
                                                                            <i class="uil uil-check"></i>
                                                                        </div>
                                                                        <p class="text-black mb-0">Sample After Test</p>
                                                                        <p class="text mt-0">(
                                                                            <?= date("d-m-Y H:i:s", strtotime($data["date_return"])); ?>)
                                                                        </p>
                                                                    </li>
                                                                    <li>
                                                                        <i class="icon-black uil uil-file-check-alt"></i>
                                                                        <div class="prog five">
                                                                            <i class="uil uil-check"></i>
                                                                        </div>
                                                                        <?php
                                                                        if ($data["date_after"] != ""):
                                                                            ?>
                                                                            <p class="text-black mb-0">
                                                                                <?= $data["after_test"]; ?>
                                                                            </p>
                                                                            <p class="text mt-0">(
                                                                                <?= date("d-m-Y H:i:s", strtotime($data["date_after"])); ?>)
                                                                            </p>
                                                                            <?php
                                                                        else:
                                                                            ?>
                                                                            <p class="text-black">Status After</p>
                                                                            <?php
                                                                        endif;
                                                                        ?>
                                                                    </li>
                                                                </ul>
                                                            <?php elseif ($loc == "Lab"): ?>
                                                                <ul class="bars mt-2">
                                                                    <li>
                                                                        <i class="icon-black uil uil-server"></i>
                                                                        <div class="prog one active-black">
                                                                            <i class="uil uil-check"></i>
                                                                        </div>
                                                                        <p class="text-black mb-0">Sample Before Test</p>
                                                                        <p class="text mt-0">(
                                                                            <?= date("d-m-Y H:i:s", strtotime($data["tgl_datang"])); ?>)
                                                                        </p>
                                                                    </li>
                                                                    <li>
                                                                        <i class="icon-black uil uil-flask"></i>
                                                                        <div class="prog two active-black">
                                                                            <i class="uil uil-check">
                                                                            </i>
                                                                        </div>
                                                                        <p class="text-black mb-0">Lab/Testing</p>
                                                                        <p class="text mt-0">(
                                                                            <?= date("d-m-Y H:i:s", strtotime($data["date_take"])); ?>)
                                                                        </p>
                                                                    </li>
                                                                    <li>
                                                                        <i class="icon-black uil uil-server"></i>
                                                                        <div class="prog four">
                                                                            <i class="uil uil-check"></i>
                                                                        </div>
                                                                        <p class="text-black mb-0">Sample After Test</p>
                                                                        <p class="text mt-0">(
                                                                            <?= date("d-m-Y H:i:s", strtotime($data["date_return"])); ?>)
                                                                        </p>
                                                                    </li>
                                                                    <li>
                                                                        <i class="icon-black uil uil-file-check-alt"></i>
                                                                        <div class="prog five">
                                                                            <i class="uil uil-check"></i>
                                                                        </div>
                                                                        <?php
                                                                        if ($data["date_after"] != ""):
                                                                            ?>
                                                                            <p class="text-black mb-0">
                                                                                <?= $data["after_test"]; ?>
                                                                            </p>
                                                                            <p class="text mt-0">(
                                                                                <?= date("d-m-Y H:i:s", strtotime($data["date_after"])); ?>)
                                                                            </p>
                                                                            <?php
                                                                        else:
                                                                            ?>
                                                                            <p class="text-black">Status After</p>
                                                                            <?php
                                                                        endif;
                                                                        ?>
                                                                    </li>
                                                                </ul>
                                                            <?php elseif ($loc == "Sample After Test"): ?>
                                                                <ul class="bars mt-2">
                                                                    <li>
                                                                        <i class="icon-black uil uil-server"></i>
                                                                        <div class="prog one active-black">
                                                                            <i class="uil uil-check"></i>
                                                                        </div>
                                                                        <p class="text-black mb-0">Sample Before Test</p>
                                                                        <p class="text mt-0">(
                                                                            <?= date("d-m-Y H:i:s", strtotime($data["tgl_datang"])); ?>)
                                                                        </p>
                                                                    </li>
                                                                    <li>
                                                                        <i class="icon-black uil uil-flask"></i>
                                                                        <div class="prog two active-black">
                                                                            <i class="uil uil-check">
                                                                            </i>
                                                                        </div>
                                                                        <p class="text-black mb-0">Lab/Testing</p>
                                                                        <p class="text mt-0">(
                                                                            <?= date("d-m-Y H:i:s", strtotime($data["date_take"])); ?>)
                                                                        </p>
                                                                    </li>
                                                                    <li>
                                                                        <i class="icon-black uil uil-server"></i>
                                                                        <div class="prog four active-black">
                                                                            <i class="uil uil-check"></i>
                                                                        </div>
                                                                        <p class="text-black mb-0">Sample After Test</p>
                                                                        <p class="text mt-0">(
                                                                            <?= date("d-m-Y H:i:s", strtotime($data["date_return"])); ?>)
                                                                        </p>
                                                                    </li>
                                                                    <li>
                                                                        <i class="icon-black uil uil-file-check-alt"></i>
                                                                        <div class="prog five">
                                                                            <i class="uil uil-check"></i>
                                                                        </div>
                                                                        <?php
                                                                        if ($data["date_after"] != ""):
                                                                            ?>
                                                                            <p class="text-black mb-0">
                                                                                <?= $data["after_test"]; ?>
                                                                            </p>
                                                                            <p class="text mt-0">(
                                                                                <?= date("d-m-Y H:i:s", strtotime($data["date_after"])); ?>)
                                                                            </p>
                                                                            <?php
                                                                        else:
                                                                            ?>
                                                                            <p class="text-black">Status After</p>
                                                                            <?php
                                                                        endif;
                                                                        ?>
                                                                    </li>
                                                                </ul>
                                                            <?php elseif ($loc == "Finish"): ?>
                                                                <ul class="bars mt-2">
                                                                    <li>
                                                                        <i class="icon-black uil uil-server"></i>
                                                                        <div class="prog one active-black">
                                                                            <i class="uil uil-check"></i>
                                                                        </div>
                                                                        <p class="text-black mb-0">Sample Before Test</p>
                                                                        <p class="text mt-0">(
                                                                            <?= date("d-m-Y H:i:s", strtotime($data["tgl_datang"])); ?>)
                                                                        </p>
                                                                    </li>
                                                                    <li>
                                                                        <i class="icon-black uil uil-flask"></i>
                                                                        <div class="prog two active-black">
                                                                            <i class="uil uil-check">
                                                                            </i>
                                                                        </div>
                                                                        <p class="text-black mb-0">Lab/Testing</p>
                                                                        <p class="text mt-0">(
                                                                            <?= date("d-m-Y H:i:s", strtotime($data["date_take"])); ?>)
                                                                        </p>
                                                                    </li>
                                                                    <li>
                                                                        <i class="icon-black uil uil-server"></i>
                                                                        <div class="prog four active-black">
                                                                            <i class="uil uil-check"></i>
                                                                        </div>
                                                                        <p class="text-black mb-0">Sample After Test</p>
                                                                        <p class="text mt-0">(
                                                                            <?= date("d-m-Y H:i:s", strtotime($data["date_return"])); ?>)
                                                                        </p>
                                                                    </li>
                                                                    <li>
                                                                        <i class="icon-black uil uil-file-check-alt"></i>
                                                                        <div class="prog five active-black">
                                                                            <i class="uil uil-check"></i>
                                                                        </div>
                                                                        <?php
                                                                        if ($data["date_after"] != ""):
                                                                            ?>
                                                                            <p class="text-black mb-0">
                                                                                <?= $data["after_test"]; ?>
                                                                            </p>
                                                                            <p class="text mt-0">(
                                                                                <?= date("d-m-Y H:i:s", strtotime($data["date_after"])); ?>)
                                                                            </p>
                                                                            <?php
                                                                        else:
                                                                            ?>
                                                                            <p class="text-black">Status After</p>
                                                                            <?php
                                                                        endif;
                                                                        ?>
                                                                    </li>
                                                                </ul>
                                                            <?php else: ?>
                                                                <ul class="bars mt-2">
                                                                    <li>
                                                                        <i class="icon-black uil uil-server"></i>
                                                                        <div class="prog one">
                                                                            <i class="uil uil-check"></i>
                                                                        </div>
                                                                        <p class="text-black mb-0">Sample Before Test</p>
                                                                        <p class="text mt-0">(
                                                                            <?= date("d-m-Y H:i:s", strtotime($data["tgl_datang"])); ?>)
                                                                        </p>
                                                                    </li>
                                                                    <li>
                                                                        <i class="icon-black uil uil-flask"></i>
                                                                        <div class="prog two">
                                                                            <i class="uil uil-check">
                                                                            </i>
                                                                        </div>
                                                                        <p class="text-black mb-0">Lab/Testing</p>
                                                                        <p class="text mt-0">(
                                                                            <?= date("d-m-Y H:i:s", strtotime($data["date_take"])); ?>)
                                                                        </p>
                                                                    </li>
                                                                    <li>
                                                                        <i class="icon-black uil uil-server"></i>
                                                                        <div class="prog four">
                                                                            <i class="uil uil-check"></i>
                                                                        </div>
                                                                        <p class="text-black mb-0">Sample After Test</p>
                                                                        <p class="text mt-0">(
                                                                            <?= date("d-m-Y H:i:s", strtotime($data["date_return"])); ?>)
                                                                        </p>
                                                                    </li>
                                                                    <li>
                                                                        <i class="icon-black uil uil-file-check-alt"></i>
                                                                        <div class="prog five">
                                                                            <i class="uil uil-check"></i>
                                                                        </div>
                                                                        <?php
                                                                        if ($data["date_after"] != ""):
                                                                            ?>
                                                                            <p class="text-black mb-0">
                                                                                <?= $data["after_test"]; ?>
                                                                            </p>
                                                                            <p class="text mt-0">(
                                                                                <?= date("d-m-Y H:i:s", strtotime($data["date_after"])); ?>)
                                                                            </p>
                                                                            <?php
                                                                        else:
                                                                            ?>
                                                                            <p class="text-black">Status After</p>
                                                                            <?php
                                                                        endif;
                                                                        ?>
                                                                    </li>
                                                                </ul>
                                                                <?php
                                                            endif; ?>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
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

                    <div class="tab-pane fade show" id="return">
                        <div class="card-dash-body">

                            <div class="table-responsive">
                                <div id="pending-table" style="color: black !important;">
                                    <table id="tabel-return" class="table table-bordered align-middle text-center">
                                        <thead class="table-secondary">
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Tracking</th>
                                                <th scope="col">Timestamp</th>
                                            </tr>
                                        </thead>
                                        <?php $i = 1; ?>
                                        <?php foreach ($sample_return as $data): ?>
                                            <tr>
                                                <td>
                                                    <?= $i; ?>
                                                </td>
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
                                                                <a href="" data-toggle="modal"
                                                                    data-target="#detailImage<?= $data["sample_test"]; ?>">
                                                                    <img src="img/foto-sample/<?= $data["foto"]; ?>"
                                                                        height="70" alt="">
                                                                </a>

                                                                <!-- detail image modal -->
                                                                <div id="detailImage<?= $data["sample_test"]; ?>"
                                                                    class="modal fade" tabindex="	-1">
                                                                    <div class="modal-dialog modal-lg">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="text-black">
                                                                                    Image Sample (
                                                                                    <?= $data["sample_test"]; ?>)
                                                                                </h4>
                                                                                <button type="button" class="btn-close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="row">
                                                                                    <div
                                                                                        class="col-md-12 text-center pb-5 pt-4">
                                                                                        <img src="img/foto-sample/<?= $data["foto"]; ?>"
                                                                                            alt="foto-sample" height="400">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- end detail image modal -->
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
                                                                        <i class="icon-black uil uil-server"></i>
                                                                        <div class="prog one active-black">
                                                                            <i class="uil uil-check"></i>
                                                                        </div>
                                                                        <p class="text-black mb-0">Sample Before Test</p>
                                                                        <p class="text mt-0">(
                                                                            <?= date("d-m-Y H:i:s", strtotime($data["tgl_datang"])); ?>)
                                                                        </p>
                                                                    </li>
                                                                    <li>
                                                                        <i class="icon-black uil uil-flask"></i>
                                                                        <div class="prog two">
                                                                            <i class="uil uil-check">
                                                                            </i>
                                                                        </div>
                                                                        <p class="text-black mb-0">Lab/Testing</p>
                                                                        <p class="text mt-0">(
                                                                            <?= date("d-m-Y H:i:s", strtotime($data["date_take"])); ?>)
                                                                        </p>
                                                                    </li>
                                                                    <li>
                                                                        <i class="icon-black uil uil-server"></i>
                                                                        <div class="prog four">
                                                                            <i class="uil uil-check"></i>
                                                                        </div>
                                                                        <p class="text-black mb-0">Sample After Test</p>
                                                                        <p class="text mt-0">(
                                                                            <?= date("d-m-Y H:i:s", strtotime($data["date_return"])); ?>)
                                                                        </p>
                                                                    </li>
                                                                    <li>
                                                                        <i class="icon-black uil uil-file-check-alt"></i>
                                                                        <div class="prog five">
                                                                            <i class="uil uil-check"></i>
                                                                        </div>
                                                                        <p class="text-black">Finish</p>
                                                                    </li>
                                                                            </ul>
                                                                
                                                            <?php endif; endforeach; ?>