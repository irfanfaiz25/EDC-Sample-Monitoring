<?php
include 'fungsi/fungsi.php';
include 'fungsi/fungsi-track.php';
include 'header.php';
?>
<section class="home-section">
    <div class="home-content" id="head-page">
        <i class='bx bx-menu'></i>
        <span class="text">Tracking</span>
        <div class="col-md-10">
            <div class="logout me-4" id="logout">
                <a href="logout.php">
                    <i class="fa fa-right-from-bracket fa-2xl text-black"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="card mt-1 ms-3 me-3">
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
                                <tr style="height: 100px;">
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
                            if (isset($_GET["sample"]) && $numrow === 1 && $samp["njo"] != ""):
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
                                <td colspan="2">
                                    <input type="hidden" name="sample" value="<?= $smp_test; ?>">
                                    <?php if (isset($errorid)): ?>
                                        <div id="myAlert" class="alert alert-danger alert-dismissible fade show">
                                            sample sudah finish!
                                            <button type="button" id="myBtn" class="btn-close"
                                                data-bs-dismiss="alert"></button>
                                        </div>
                                    <?php elseif (isset($error_user_reject)): ?>
                                        <div id="myAlert" class="alert alert-danger alert-dismissible fade show">
                                            proses ini hanya bisa dilakukan oleh user lab/testing !
                                            <button type="button" id="myBtn" class="btn-close"
                                                data-bs-dismiss="alert"></button>
                                        </div>
                                    <?php elseif (isset($errorup)): ?>
                                        <div id="myAlert" class="alert alert-danger alert-dismissible fade show">
                                            periksa kembali input-an sample!
                                            <button type="button" id="myBtn" class="btn-close"
                                                data-bs-dismiss="alert"></button>
                                        </div>
                                    <?php elseif (isset($errorsample)): ?>
                                        <div id="myAlert" class="alert alert-danger alert-dismissible fade show">
                                            sample tidak ditemukan!
                                            <button type="button" id="myBtn" class="btn-close"
                                                data-bs-dismiss="alert"></button>
                                        </div>
                                    <?php elseif (isset($error_njo)): ?>
                                        <div id="myAlert" class="alert alert-danger alert-dismissible fade show">
                                            sample belum memiliki njo!
                                            <button type="button" id="myBtn" class="btn-close"
                                                data-bs-dismiss="alert"></button>
                                        </div>
                                    <?php endif; ?>
                                    <div class="btn-add text-center pt-3 pb-3 pe-3">
                                        <?php
                                        if (isset($_GET["sample"])):
                                            ?>
                                            <button type="submit" name="submit-kry" class="btn btn-lg btn-success"
                                                autofocus><strong>ADD
                                                    TRACK</strong></button>
                                            <?php
                                        else:
                                            ?>
                                            <button type="submit" name="submit-kry"
                                                class="btn btn-lg btn-success disabled"><strong>ADD
                                                    TRACK</strong></button>
                                            <?php
                                        endif;
                                        ?>
                                    </div>

                                </td>
                        </form>
                        </tr>
                        </table>


                    </div>
                    <div class=" col-md-7">
                        <?php
                        if (isset($_GET["sample"]) && $numrow === 1):
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
                                            <p class="text">Lab/Testing</p>
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
                                            <?php
                                            if ($row["date_after"] != ""):
                                                ?>
                                                <p class="text mb-0">
                                                    <?= $row["after_test"]; ?>
                                                </p>
                                                <?php
                                            else:
                                                ?>
                                                <p class="text">Status After</p>
                                                <?php
                                            endif;
                                            ?>
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
                                            <p class="text">Lab/Testing</p>
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
                                            <?php
                                            if ($row["date_after"] != ""):
                                                ?>
                                                <p class="text mb-0">
                                                    <?= $row["after_test"]; ?>
                                                </p>
                                                <?php
                                            else:
                                                ?>
                                                <p class="text">Status After</p>
                                                <?php
                                            endif;
                                            ?>
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
                                            <p class="text">Lab/Testing</p>
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
                                            <?php
                                            if ($row["date_after"] != ""):
                                                ?>
                                                <p class="text mb-0">
                                                    <?= $row["after_test"]; ?>
                                                </p>
                                                <?php
                                            else:
                                                ?>
                                                <p class="text">Status After</p>
                                                <?php
                                            endif;
                                            ?>
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
                                            <p class="text">Lab/Testing</p>
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
                                            <?php
                                            if ($row["date_after"] != ""):
                                                ?>
                                                <p class="text mb-0">
                                                    <?= $row["after_test"]; ?>
                                                </p>
                                                <?php
                                            else:
                                                ?>
                                                <p class="text">Status After</p>
                                                <?php
                                            endif;
                                            ?>
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
                                            <p class="text">Lab/Testing</p>
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
                                            <?php
                                            if ($row["date_after"] != ""):
                                                ?>
                                                <p class="text mb-0">
                                                    <?= $row["after_test"]; ?>
                                                </p>
                                                <?php
                                            else:
                                                ?>
                                                <p class="text">Status After</p>
                                                <?php
                                            endif;
                                            ?>
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
                                    <p class="text">Lab/Testing</p>
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
                                    <p class="text">Status After</p>
                                </li>
                            </ul>
                        <?php endif; ?>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="table-responsive">
                            <table id="tabel-data-tracking"
                                class="table table-responsive table-bordered align-middle table-striped">
                                <thead class="table-secondary">
                                    <tr>
                                        <th>No</th>
                                        <th>Image</th>
                                        <th>Sample Test</th>
                                        <th>NJO</th>
                                        <th>Sample Name</th>
                                        <th>Qty</th>
                                        <th>Customer</th>
                                        <th>Tools</th>
                                        <th>Loc</th>
                                        <th>PIC</th>
                                        <th>Rack</th>
                                        <th>Remark</th>
                                        <th hidden>Timestamp</th>
                                    </tr>
                                </thead>
                                <?php
                                $i = 1;
                                foreach ($sample_tbl as $row):
                                    ?>
                                    <!-- <tbody> -->
                                    <tr>
                                        <td>
                                            <?= $i; ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($row["foto"] != ""):
                                                ?>
                                                <a href="" data-toggle="modal"
                                                    data-target="#detailImage<?= $row["sample_test"]; ?>">
                                                    <img src="img/foto-sample/<?= $row["foto"]; ?>" height="50"
                                                        alt="foto-sample">
                                                </a>
                                                <?php
                                            endif;
                                            ?>
                                        </td>
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
                                            <?= $row["tools"]; ?>
                                        </td>
                                        <td>
                                            <?php
                                            $id_loc = $row["id_loc"];
                                            if ($id_loc == 1) {
                                                $loc = "Sample Room (Before Test)";
                                            } elseif ($id_loc == 2) {
                                                $loc = "Lab / Testing";
                                            } elseif ($id_loc == 3) {
                                                $loc = "Sample Room (After Test)";
                                            } elseif ($id_loc == 4) {
                                                $loc = "Finish";
                                            } elseif ($id_loc == 0) {
                                                $loc = "Sample Room (not scanned yet)";
                                            }
                                            echo $loc;
                                            ?>
                                        </td>
                                        <td>
                                            <?= $row["pic"]; ?>
                                        </td>
                                        <td>
                                            <?= $row["rak"]; ?>
                                        </td>
                                        <td>
                                            <textarea type="text" class="form-control mb-2" cols="30" rows="3"
                                                readonly><?= $row["note"]; ?></textarea>
                                            <button type="button" class="btn btn-warning" data-toggle="modal"
                                                data-target="#remark<?= $row["sample_test"]; ?>"><i
                                                    class="fa fa-file-pen"></i></button>
                                        </td>
                                        <td hidden>
                                            <?= $row["time_stamp"]; ?>
                                        </td>
                                    </tr>
                                    <!-- </tbody> -->

                                    <!-- detail image modal -->
                                    <div id="detailImage<?= $row["sample_test"]; ?>" class="modal fade" tabindex="	-1">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="text-black">
                                                        Image Sample (
                                                        <?= $row["sample_test"]; ?>)
                                                    </h4>
                                                    <button type="button" class="btn-close" data-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12 text-center pb-5 pt-4">
                                                            <img src="img/foto-sample/<?= $row["foto"]; ?>"
                                                                alt="foto-sample" height="400">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end detail image modal -->

                                    <!-- remark modal -->
                                    <div class="modal" tabindex="-1" id="remark<?= $row["sample_test"]; ?>">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Remark</h4>
                                                    <button type="button" class="btn-close" data-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h6>Note : Jangan lupa tekan enter (line baru) jika ingin menambah
                                                        remark</h6>
                                                    <form action="" method="post">
                                                        <input type="hidden" name="sample_test"
                                                            value="<?= $row["sample_test"]; ?>">
                                                        <textarea name="remark" id="remark" class="form-control"
                                                            rows="5"><?= $row["note"]; ?></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary" name="btn-remark">Update
                                                        changes</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end remark modal -->

                                    <?php
                                    $i++;
                                endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<?php
include 'footer.php';
?>