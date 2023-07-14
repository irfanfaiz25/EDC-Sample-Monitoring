<?php
include 'fungsi/fungsi.php';
include "fungsi/phpqrcode/qrlib.php";

$sample = query("SELECT * FROM tb_sample WHERE njo=''");
$sample_ready = query("SELECT * FROM tb_sample WHERE njo!=''");

// membuat kode
$query = mysqli_query($konek, "SELECT max(sample_test) as kodeTerbesar FROM tb_sample");
$data = mysqli_fetch_array($query);
$kode_sample = $data['kodeTerbesar'];
$year_now = date("y");
$urutan = (int) substr($kode_sample, 4, 4);
$urutan++;
$huruf = "ST";
$kode_sample = $huruf . $year_now . sprintf("%04s", $urutan);
// kode selesai

if (isset($_POST["btn-cari"])) {
  $sample = cari_sample($_POST["keyword"]);
} elseif (isset($_POST["btn-reset"])) {
  $sample;
}

if (isset($_POST["cari-ready"])) {
  $sample_ready = cari_sample_ready($_POST["keyword_ready"]);
} elseif (isset($_POST["reset-ready"])) {
  $sample_ready;
}

?>

<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>EDC Management</title>

  <!-- Boxicons CSS -->
  <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <!-- CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css" />

</head>

<body>
  <nav>
    <div class="logo">
      <i class="bx bx-menu menu-icon"></i>
      <span class="logo-name">Sample Data</span>
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
              <i class="bx bx-bell icon"></i>
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
            <h2 class="mb-4">
              SAMPLE INPUT
            </h2>
            <form action="" method="post">

              <table class="table table-bordered align-middle">
                <thead class="table-light">
                  <tr>
                    <th>
                      <img class="m-2" src="img/logoo.png" width="90" height="20" alt="">
                    </th>
                    <th class="text-center">
                      <h5>PART TAG</h5>
                    </th>
                  </tr>
                </thead>
                <tr>
                  <td><label for="sample-test">Sample Test</label></td>
                  <td><input type="text" id="sample-test" name="sample-test" class="form-control"
                      value="<?= $kode_sample; ?>" readonly></td>
                </tr>
                <tr>
                  <td><label for="njo">NJO / Work Code</label></td>
                  <td><input type="text" id="njo" name="njo" class="form-control"></td>
                </tr>
                <tr>
                  <td><label for="sample">Nama Sample</label></td>
                  <td><input type="text" id="sample" name="sample" class="form-control"></td>
                </tr>
                <tr>
                  <td><label for="qty">Quantity</label></td>
                  <td><input type="text" id="qty" name="qty" class="form-control"></td>
                </tr>
                <tr>
                  <td><label for="cust">Customer</label></td>
                  <td><input type="text" id="cust" name="cust" class="form-control"></td>
                </tr>
                <tr>
                  <td><label for="tanggaldatang">Tanggal Datang</label></td>
                  <td><input type="date" id="tanggaldatang" name="tanggaldatang" class="form-control"></td>
                </tr>
                <tr>
                  <td><label for="tujuan">Tujuan</label></td>
                  <td><input type="text" id="tujuan" placeholder="tujuan 1" name="tujuan" class="form-control"></td>
                </tr>
                <tr>
                  <td></td>
                  <td><input type="text" id="tujuan2" placeholder="tujuan 2" name="tujuan2" class="form-control"></td>
                </tr>
                <tr>
                  <td></td>
                  <td><input type="text" id="tujuan3" placeholder="tujuan 3" name="tujuan3" class="form-control"></td>
                </tr>
                <tr>
                  <td></td>
                  <td><input type="text" id="tujuan4" placeholder="tujuan 4" name="tujuan4" class="form-control"></td>
                </tr>
                <tr>
                  <td></td>
                  <td><input type="text" id="tujuan5" placeholder="tujuan 5" name="tujuan5" class="form-control"></td>
                </tr>
                <tr>
                  <td><label for="tools">Equipment / Tools</label></td>
                  <td><input type="text" id="tools" name="tools" class="form-control"></td>
                </tr>
                <tr>
                  <td><label for="cust">Status After Test</label></td>
                  <td>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="return">
                      <label class="form-check-label" for="inlineRadio1">Diambil Customer</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="scrap">
                      <label class="form-check-label" for="inlineRadio2">Scrap</label>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><label for="duedate">Due Date</label></td>
                  <td><input type="date" id="duedate" name="duedate" class="form-control"></td>
                </tr>
                <tr>
                  <td><label for="note">Note</label></td>
                  <td><textarea type="text" id="note" name="note" class="form-control" rows="3"></textarea></td>
                </tr>
                <tr>
                  <td colspan="2">
                    <div class="btn-add text-center pt-3 pb-3">
                      <button type="submit" name="btn-submit" class="btn btn-lg btn-success"><strong><i
                            class="fa fa-circle-plus"></i> ADD</strong>

                      </button>
                    </div>
                  </td>
                </tr>
              </table>


            </form>

          </div>
          <div class="col-md-8">
            <h2 class="mb-4">
              SAMPLE PENDING
            </h2>

            <form action="" method="post">
              <div class="row">
                <div class="col-md-1">
                  <div class="mb-3 pt-1">
                    <label for="keyword" class="form-label"><strong>Search</strong></label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="mb-3">
                    <input type="text" class="form-control" id="keyword" name="keyword" aria-describedby="cari"
                      autocomplete="off">
                  </div>
                </div>
                <div class="col-md-1">
                  <button class="btn btn-dark" name="btn-cari" id="btn-cari">
                    <i class="fa-solid fa-magnifying-glass fa-xl"></i>
                  </button>
                </div>
                <div class="col-md-1" style="margin-left: -20px;">
                  <button class="btn btn-secondary" name="btn-reset" id="btn-reset"><strong>RESET</strong></button>
                </div>
              </div>
            </form>



            <div class="table-responsive">
              <div class="table-wrapper-scroll-y my-custom-scrollbar">
                <div id="pending-table">
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
                                  <input type="text" class="form-control" name="note" id="note"
                                    value="<?= $row["note"]; ?>">

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                    class="fa fa-ban"></i>
                                  CANCEL</button>
                                <button type="submit" class="btn btn-primary" name="edit-sample"><i
                                    class="fa fa-edit"></i>
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
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                    class="fa fa-ban"></i>
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
                </div>
              </div>
            </div>

            <h2 class="mb-4 mt-2">
              SAMPLE READY
            </h2>

            <form action="" method="post">
              <div class="row">
                <div class="col-md-1">
                  <div class="mb-3 pt-1">
                    <label for="keyword_ready" class="form-label"><strong>Search</strong></label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="mb-3">
                    <input type="text" class="form-control" id="keyword_ready" name="keyword_ready"
                      aria-describedby="cari" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-1">
                  <button class="btn btn-dark" name="cari-ready" id="cari-ready">
                    <i class="fa-solid fa-magnifying-glass fa-xl"></i>
                  </button>
                </div>
                <div class="col-md-1" style="margin-left: -20px;">
                  <button class="btn btn-secondary" name="reset-ready" id="btn-reset"><strong>RESET</strong></button>
                </div>
              </div>
            </form>

            <div class="table-responsive">
              <div class="table-wrapper-scroll-y my-custom-scrollbar">
                <table class="table table-bordered align-middle text-center">
                  <thead class="table-dark">
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Sample Test</th>
                      <th scope="col">Work Code</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Qty</th>
                      <th scope="col">After Test</th>
                      <th scope="col">Due Date</th>
                      <th scope="col">Status</th>
                      <th scope="col">Detail</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <?php $i = 1; ?>
                  <?php foreach ($sample_ready as $row): ?>
                    <tbody>
                      <tr>
                        <td>
                          <?= $i; ?>
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
                          <?= $row["after_test"]; ?>
                        </td>
                        <td>
                          <?= $row["due_date"]; ?>
                        </td>
                        <td>printed</td>
                        <td>
                          <button class="btn btn-sm btn-primary" name="editReady" data-toggle="modal"
                            data-target="#detailReady<?= $row["sample_test"]; ?>"><strong>DETAIL</strong></button>
                        </td>
                        <td width="150">
                          <div class="row text-center" style="padding-left: 7px; padding-right: 10px;">
                            <div class="col-md-4 p-1">
                              <a href="label.php?sample_test=<?= $row["sample_test"]; ?>">
                                <button class="btn btn-sm btn-warning" name="cetakqr">
                                  <i class="fa fa-print"></i>
                                </button>
                              </a>
                            </div>
                            <div class="col-md-4 p-1">
                              <button class="btn btn-sm btn-success" name="editReady" data-toggle="modal"
                                data-target="#editReady<?= $row["sample_test"]; ?>">
                                <i class="fa fa-pen-to-square"></i>
                              </button>
                            </div>
                            <div class="col-md-4 p-1">
                              <button class="btn btn-sm btn-danger" name="delete" data-toggle="modal"
                                data-target="#deleteReady<?= $row["sample_test"]; ?>">
                                <i class="fa fa-trash"></i>
                              </button>
                            </div>
                          </div>

                        </td>
                      </tr>

                      <!-- modal ready edit data -->
                      <div id="editReady<?= $row["sample_test"]; ?>" class="modal fade" tabindex="	-1">
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
                                <input type="text" class="form-control" name="note" id="note"
                                  value="<?= $row["note"]; ?>">

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-ban"></i>
                                CANCEL</button>
                              <button type="submit" class="btn btn-primary" name="edit-ready"><i class="fa fa-edit"></i>
                                EDIT</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- end ready modal edit -->

                      <!-- ready detail modal -->
                      <div id="detailReady<?= $row["sample_test"]; ?>" class="modal fade" tabindex="	-1">
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
                      <!-- end ready modal detail -->

                      <!-- confirm delete modal ready -->
                      <div id="deleteReady<?= $row["sample_test"]; ?>" class="modal fade" tabindex="	-1">
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
                      <!-- end confirm delete modal ready -->

                    </tbody>

                    <?php $i++; ?>

                  <?php endforeach; ?>

                </table>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <!-- php button fungsi -->
    <?php
    if (isset($_POST["btn-submit"])) {
      if (tambah($_POST)):
        ?>
        <figure class="notification">
          <div class="notification-body">
            <i class="notification_icon fa-regular fa-circle-check"></i>
            Input data success!
          </div>
          <div class="notification_progress"></div>
        </figure>
        <meta http-equiv="refresh" content="1">
        <?php
      else:
        ?>
        <figure class="notification-fail">
          <div class="notification-body">
            <i class="notification_icon fa-regular fa-circle-check"></i>
            Input data failed!
          </div>
          <div class="notification_progress"></div>
        </figure>
        <meta http-equiv="refresh" content="1">
        <?php
      endif;
    }

    if (isset($_POST["edit-sample"])) {
      if (ubahSample($_POST)):
        ?>
        <figure class="notification-edit">
          <div class="notification-body">
            <i class="notification_icon fa-regular fa-circle-check"></i>
            Edit data success!
          </div>
          <div class="notification_progress"></div>
        </figure>
        <meta http-equiv="refresh" content="1">
        <?php
      else:
        ?>
        <figure class="notification-fail-edit">
          <div class="notification-body">
            <i class="notification_icon fa-regular fa-circle-check"></i>
            Edit data failed!
          </div>
          <div class="notification_progress"></div>
        </figure>
        <meta http-equiv="refresh" content="1">
        <?php
      endif;
    }

    if (isset($_POST["edit-ready"])) {
      if (ubahSample($_POST)):
        ?>
        <figure class="notification-edit">
          <div class="notification-body">
            <i class="notification_icon fa-regular fa-circle-check"></i>
            Edit data success!
          </div>
          <div class="notification_progress"></div>
        </figure>
        <meta http-equiv="refresh" content="1">
        <?php
      else:
        ?>
        <figure class="notification-fail-edit">
          <div class="notification-body">
            <i class="notification_icon fa-regular fa-circle-check"></i>
            Edit data failed!
          </div>
          <div class="notification_progress"></div>
        </figure>
        <meta http-equiv="refresh" content="1">
        <?php
      endif;
    }

    ?>
  </section>

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
  <script src="js/script.js"></script>
</body>

</html>