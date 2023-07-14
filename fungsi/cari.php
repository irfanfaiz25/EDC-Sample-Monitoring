<?php
require 'fungsi.php';

$keyword = $_GET["keyword"];

$query = "SELECT * FROM tb_sample WHERE sample_test LIKE '%$keyword%' OR nm_sample LIKE '%$keyword%' AND njo=''";
$sample = query($query);
?>

<table class="table table-bordered align-middle text-center">
    <thead class="table-dark">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Sample Test</th>
            <th scope="col">Nama</th>
            <th scope="col">Qty</th>
            <th scope="col">Tanggal</th>
            <th scope="col">After Test</th>
            <th scope="col">Due Date</th>
            <th scope="col">Detail</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <?php $i = 1; ?>
    <?php foreach ($sample as $row): ?>
        <tbody>
            <tr>
                <td>
                    <?= $i; ?>
                </td>
                <td>
                    <?= $row["sample_test"]; ?>
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
                <td>
                    <?= $row["after_test"]; ?>
                </td>
                <td>
                    <?= $row["due_date"]; ?>
                </td>
                <td>
                    <button class="btn btn-sm btn-primary" data-toggle="modal"
                        data-target="#detailModal<?= $row["sample_test"]; ?>"><strong>DETAIL</strong></button>
                </td>
                <td width="150">
                    <div class="row text-center" style="padding-left: 10px; padding-right: 10px;">
                        <div class="col-md-4 p-1">
                            <a href="label.php?sample_test=<?= $row["sample_test"]; ?>">
                                <button class="btn btn-sm btn-warning" name="cetakqr">
                                    <i class="fa fa-print"></i>
                                </button>
                            </a>
                        </div>
                        <div class="col-md-4 p-1">
                            <button class="btn btn-sm btn-success" name="edit" data-toggle="modal"
                                data-target="#editModal<?= $row["sample_test"]; ?>">
                                <i class="fa fa-pen-to-square"></i>
                            </button>
                        </div>
                        <div class="col-md-4 p-1">
                            <button class="btn btn-sm btn-danger" name="delete" data-toggle="modal"
                                data-target="#deleteModal<?= $row["sample_test"]; ?>">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </td>
            </tr>

            <!-- modal edit data -->
            <div id="editModal<?= $row["sample_test"]; ?>" class="modal fade" tabindex="	-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="text-black">EDIT DATA</h4>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post" enctype="multipart/form-data">

                                <label for="id" class="mt-3 mb-1">Sample Test</label>
                                <input type="text" class="form-control" name="id" value="<?= $row["sample_test"]; ?>"
                                    readonly>

                                <label for="njo" class="mt-3 mb-1">NJO/Work Order</label>
                                <input type="text" class="form-control" name="njo" id="njo" value="<?= $row["njo"]; ?>">

                                <label for="sample" class="mt-3 mb-1">Nama Sample</label>
                                <input type="text" class="form-control" name="sample" id="sample"
                                    value="<?= $row["nm_sample"]; ?>">

                                <label for="qty" class="mt-3 mb-1">Qty</label>
                                <input type="text" class="form-control" name="qty" id="qty" value="<?= $row["qty"]; ?>">

                                <label for="cust" class="mt-3 mb-1">Customer</label>
                                <input type="text" class="form-control" name="cust" id="cust"
                                    value="<?= $row["customer"]; ?>">

                                <label for="tgl-dtg" class="mt-3 mb-1">Tanggal Datang</label>
                                <input type="text" class="form-control" name="tgl-dtg" id="tgl-dtg"
                                    value="<?= $row["tgl_datang"]; ?>">

                                <label for="tujuan" class="mt-3 mb-1">Tujuan (Item-test)</label>
                                <input type="text" class="form-control" name="tujuan1" id="tujuan1"
                                    value="<?= $row["tujuan1"]; ?>">
                                <input type="text" class="form-control mt-3" name="tujuan2" id="tujuan2"
                                    value="<?= $row["tujuan2"]; ?>">
                                <input type="text" class="form-control mt-3" name="tujuan3" id="tujuan3"
                                    value="<?= $row["tujuan3"]; ?>">
                                <input type="text" class="form-control mt-3" name="tujuan4" id="tujuan4"
                                    value="<?= $row["tujuan4"]; ?>">
                                <input type="text" class="form-control mt-3" name="tujuan5" id="tujuan5"
                                    value="<?= $row["tujuan5"]; ?>">

                                <label for="tools" class="mt-3 mb-1">Tools </label>
                                <input type="text" class="form-control" name="tools" id="tools"
                                    value="<?= $row["tools"]; ?>">

                                <label for="after" class="mt-3 mb-1">After Test </label>
                                <input type="text" class="form-control" name="after" id="after"
                                    value="<?= $row["after_test"]; ?>">

                                <label for="duedate" class="mt-3 mb-1">Due Date </label>
                                <input type="text" class="form-control" name="duedate" id="duedate"
                                    value="<?= $row["due_date"]; ?>">

                                <label for="note" class="mt-3 mb-1">Note </label>
                                <input type="text" class="form-control" name="note" id="note" value="<?= $row["note"]; ?>">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-ban"></i>
                                CANCEL</button>
                            <button type="submit" class="btn btn-primary" name="edit-sample"><i class="fa fa-edit"></i>
                                EDIT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal edit -->

            <!-- detail modal -->
            <div id="detailModal<?= $row["sample_test"]; ?>" class="modal fade" tabindex="	-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="text-black">
                                <?= $row["sample_test"]; ?>
                            </h4>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h6>NJO/Work Order &emsp13; :
                                <?= $row["njo"]; ?>
                            </h6>
                            <h6>Nama Sample &emsp13; :
                                <?= $row["nm_sample"]; ?>
                            </h6>
                            <h6>Qty &emsp13; :
                                <?= $row["qty"]; ?>
                            </h6>
                            <h6>Customer &emsp13; :
                                <?= $row["customer"]; ?>
                            </h6>
                            <h6>Tanggal Datang &emsp13; :
                                <?= $row["tgl_datang"]; ?>
                            </h6>
                            <h6>Tujuan 1 &emsp13; :
                                <?= $row["tujuan1"]; ?>
                            </h6>
                            <h6>Tujuan 2 &emsp13; :
                                <?= $row["tujuan2"]; ?>
                            </h6>
                            <h6>Tujuan 3 &emsp13; :
                                <?= $row["tujuan3"]; ?>
                            </h6>
                            <h6>Tujuan 4 &emsp13; :
                                <?= $row["tujuan4"]; ?>
                            </h6>
                            <h6>Tujuan 5 &emsp13; :
                                <?= $row["tujuan5"]; ?>
                            </h6>
                            <h6>Tools &emsp13; :
                                <?= $row["tools"]; ?>
                            </h6>
                            <h6>After Test &emsp13; :
                                <?= $row["after_test"]; ?>
                            </h6>
                            <h6>Due Date &emsp13; :
                                <?= $row["due_date"]; ?>
                            </h6>
                            <h6>Note &emsp13; :
                                <?= $row["note"]; ?>
                            </h6>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-ban"></i>
                                CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal detail -->

            <!-- confirm delete modal -->
            <div id="deleteModal<?= $row["sample_test"]; ?>" class="modal fade" tabindex="	-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 text-center pb-5 pt-4">
                                    <img src="img/delete.png" alt="delete" width="200">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center text-secondary">
                                    <h2>ARE YOU SURE ?</h2>
                                    <h6 class="pb-5">Do you want to delete '
                                        <?= $row["sample_test"]; ?> ' This process cannot be undone.
                                    </h6>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                            class="fa-regular fa-circle-xmark"></i>
                                        CANCEL
                                    </button>
                                    <a href="hapus.php?id_sample=<?= $row["sample_test"]; ?>">
                                        <button type="submit" class="btn btn-success" name="delete-sample"><i
                                                class="fa-regular fa-circle-check"></i>
                                            YES
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end confirm delete modal -->

        </tbody>

        <?php $i++; ?>

    <?php endforeach; ?>

</table>