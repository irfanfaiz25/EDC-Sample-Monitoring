<?php
include 'fungsi/fungsi.php';
include "fungsi/phpqrcode/qrlib.php";

$sample = query("SELECT * FROM tb_sample WHERE njo=''");
$sample_ready = query("SELECT * FROM tb_sample WHERE njo!=''");
$today = date("d/m/Y");
// echo $today;

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


if (isset($_POST["btn-submit"])) {
  if (tambah($_POST)) {
    header('Location: sample.php');
  } else {
    $errorinput = true;
  }
}

if (isset($_POST["edit-sample"])) {
  if (ubahSample($_POST)) {
    header('Location: sample.php');
  } else {
    $errorsample = true;
  }
}

if (isset($_POST["edit-ready"])) {
  if (ubahSample($_POST)) {
    header('Location: sample.php');
  } else {
    $errorready = true;
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="css/style.css">


  <!-- CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" />

  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

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
      <span class="text">Sample Data</span>
    </div>
    <div class="card mt-1 ms-3 me-3">
      <div class="card-body">
        <div class="row dataku">

          <div class="col-md-4">
            <h2 class="mb-4">
              SAMPLE INPUT
            </h2>
            <!-- errorinput notif -->
            <?php
            if (isset($errorinput)) : ?>
              <div id="myAlert" class="alert alert-danger alert-dismissible fade show">
                input data gagal, periksa kembali data yang di inputkan!
                <button type="button" id="myBtn" class="btn-close" data-bs-dismiss="alert"></button>
              </div>
            <?php
            endif;
            ?>
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
                  <td><input type="text" id="sample-test" name="sample-test" class="form-control" value="<?= $kode_sample; ?>" readonly></td>
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
                  <td><label for="note">Note</label></td>
                  <td><textarea type="text" id="note" name="note" class="form-control" rows="3"></textarea></td>
                </tr>
                <tr>
                  <td colspan="2">
                    <div class="btn-add text-center pt-3 pb-3">

                      <button type="button" class="btn btn-success btn-block btn-lg" data-toggle="modal" data-target="#myModal">
                        <strong>NEXT <i class="fa fa-circle-arrow-right"></i></strong>
                      </button>
                    </div>
                  </td>
                </tr>
              </table>



              <!-- MODAL CEKLIS FORM -->
              <div class="modal" id="myModal">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">SAMPLE DATA CONFIRMATION</h4>
                      <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                      <div class="table-responsive">
                        <table class="table table-bordered text-center">
                          <thead class="table-light">
                            <tr>
                              <th colspan="2">
                                <img class="m-2" src="img/logoo.png" width="90" height="20" alt="">
                              </th>
                              <th class="text-center">
                                <h5>CHECK LIST SAMPLE</h5>
                              </th>
                            </tr>
                            <tr>
                              <th width="10">NO</th>
                              <th>ITEM</th>
                              <th>MKT</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>1.</td>
                              <td class="text-start">
                                <label for="cek1">Nama/nomor sample sesuai dengan yang diorder.</label>
                              </td>
                              <td class="checkbox-lg">
                                <input class="form-check-input border-1 border-secondary" type="checkbox" value="1" id="cek1" name="cek_nama">
                              </td>
                            </tr>
                            <tr>
                              <td>2.</td>
                              <td class="text-start">
                                <label for="cek2">Jumlah sample sesuai dengan yang diorder.</label>
                              </td>
                              <td class="checkbox-lg">
                                <input class="form-check-input border-1 border-secondary" type="checkbox" value="1" id="cek2" name="cek_qty">
                              </td>
                            </tr>
                            <tr>
                              <td>3.</td>
                              <td class="text-start">
                                <label for="cek3">Kelengkapan sample sudah sesuai.</label>
                              </td>
                              <td class="checkbox-lg">
                                <input class="form-check-input border-1 border-secondary" type="checkbox" value="1" id="cek3" name="cek_comp">
                              </td>
                            </tr>
                            <tr>
                              <td>4.</td>
                              <td class="text-start">
                                <label for="cek4">Sample seragam (pengujian lebih dari 1 sample).</label>
                              </td>
                              <td class="checkbox-lg">
                                <input class="form-check-input border-1 border-secondary" type="checkbox" value="1" id="cek4" name="cek_dupl">
                              </td>
                            </tr>
                            <tr>
                              <td>5.</td>
                              <td class="text-start">
                                <label for="cek5">Kondisi sample layak untuk diuji.</label>
                              </td>
                              <td class="checkbox-lg">
                                <input class="form-check-input border-1 border-secondary" type="checkbox" value="1" id="cek5" name="cek_layak">
                              </td>
                            </tr>
                            <tr>
                              <td colspan="3" class="text-start">
                                Keterangan :
                                <p>1. &nbsp;Untuk point 3 bilamana sample yang diuji adalah sample assy.</p>
                                <p style="margin-top: -10px;">2. Untuk point 4 bilamana sample yang diuji lebih dari satu dan bentuknya harus sama saat diuji.</p>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="3" class="text-start">
                                Tekan checkbox dan berikan simbol (&#10003;) jika sesuai dan (&nbsp;) 'kosongkan' jika tidak sesuai.
                              </td>
                            </tr>
                            <tr>
                              <td colspan="2">Sign name,</td>
                              <td>Silmi</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      <button type="submit" name="btn-submit" class="btn btn-success"><strong><i class="fa fa-circle-plus"></i> REGISTER</strong>
                      </button>
                    </div>

                  </div>
                </div>
              </div>
              <!-- END MODAL CEKLIS FORM -->
            </form>

          </div>
          <div class="col-md-8">
            <h2 class="mb-4">
              SAMPLE PENDING
            </h2>

            <!-- error edit sample pending notif -->
            <?php
            if (isset($errorsample)) : ?>
              <div id="myAlert" class="alert alert-danger alert-dismissible fade show">
                edit data gagal!
                <button type="button" id="myBtn" class="btn-close" data-bs-dismiss="alert"></button>
              </div>
            <?php
            endif;
            ?>

            <div class="table-responsive">
              <!-- <div class="table-wrapper-scroll-y my-custom-scrollbar"> -->
              <div id="pending-table">
                <table id="tabel-data1" class="table table-bordered align-middle text-center table-striped">
                  <thead class="table-dark align-middle" height="50">
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Sample Test</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Qty</th>
                      <th scope="col">Tanggal</th>
                      <th scope="col">Due Date</th>
                      <th scope="col">Detail</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <?php $i = 1; ?>
                  <?php foreach ($sample as $row) : ?>
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
                        <?= $row["due_date"]; ?>
                      </td>
                      <td>
                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detailModal<?= $row["sample_test"]; ?>"><strong>DETAIL</strong></button>
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
                            <button class="btn btn-sm btn-success" name="edit" data-toggle="modal" data-target="#editModal<?= $row["sample_test"]; ?>">
                              <i class="fa fa-pen-to-square"></i>
                            </button>
                          </div>
                          <div class="col-md-4 p-1">
                            <button class="btn btn-sm btn-danger" name="delete" data-toggle="modal" data-target="#deleteModal<?= $row["sample_test"]; ?>">
                              <i class="fa fa-trash"></i>
                            </button>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <!-- modal edit data -->
                    <div id="editModal<?= $row["sample_test"]; ?>" class="modal fade" tabindex="	-1">
                      <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="text-black">EDIT</h4>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-6">
                                <h2>SAMPLE DATA</h2>
                                <form action="" method="post" enctype="multipart/form-data">
                                  <div class="row g-3 align-items-center mt-3 mb-1">
                                    <div class="col-md-4">
                                      <label for="id">Sample Test</label>
                                    </div>
                                    <div class="col-md-8">
                                      <input type="text" class="form-control" name="id" value="<?= $row["sample_test"]; ?>" readonly>
                                    </div>
                                  </div>

                                  <div class="row g-3 align-items-center mt-1 mb-1">
                                    <div class="col-md-4">
                                      <label for="njo">NJO/Work Order</label>
                                    </div>
                                    <div class="col-md-8">
                                      <input type="text" class="form-control" name="njo" id="njo" value="<?= $row["njo"]; ?>">
                                    </div>
                                  </div>

                                  <div class="row g-3 align-items-center mt-1 mb-1">
                                    <div class="col-md-4">
                                      <label for="sample">Nama Sample</label>
                                    </div>
                                    <div class="col-md-8">
                                      <input type="text" class="form-control" name="sample" id="sample" value="<?= $row["nm_sample"]; ?>">
                                    </div>
                                  </div>

                                  <div class="row g-3 align-items-center mt-1 mb-1">
                                    <div class="col-md-4">
                                      <label for="qty">Qty</label>
                                    </div>
                                    <div class="col-md-8">
                                      <input type="text" class="form-control" name="qty" id="qty" value="<?= $row["qty"]; ?>">
                                    </div>
                                  </div>

                                  <div class="row g-3 align-items-center mt-1 mb-1">
                                    <div class="col-md-4">
                                      <label for="cust">Customer</label>
                                    </div>
                                    <div class="col-md-8">
                                      <input type="text" class="form-control" name="cust" id="cust" value="<?= $row["customer"]; ?>">
                                    </div>
                                  </div>

                                  <div class="row g-3 align-items-center mt-1 mb-1">
                                    <div class="col-md-4">
                                      <label for="tgl-dtg">Tanggal Datang</label>
                                    </div>
                                    <div class="col-md-8">
                                      <input type="text" class="form-control" name="tgl-dtg" id="tgl-dtg" value="<?= $row["tgl_datang"]; ?>">
                                    </div>
                                  </div>

                                  <div class="row g-3 align-items-center mt-1 mb-1">
                                    <div class="col-md-4">
                                      <label for="tujuan">Tujuan (Item-test)</label>
                                    </div>
                                    <div class="col-md-8">
                                      <input type="text" class="form-control" name="tujuan1" id="tujuan1" value="<?= $row["tujuan1"]; ?>">
                                      <input type="text" class="form-control mt-1" name="tujuan2" id="tujuan2" value="<?= $row["tujuan2"]; ?>">
                                      <input type="text" class="form-control mt-1" name="tujuan3" id="tujuan3" value="<?= $row["tujuan3"]; ?>">
                                      <input type="text" class="form-control mt-1" name="tujuan4" id="tujuan4" value="<?= $row["tujuan4"]; ?>">
                                      <input type="text" class="form-control mt-1" name="tujuan5" id="tujuan5" value="<?= $row["tujuan5"]; ?>">
                                    </div>
                                  </div>

                                  <div class="row g-3 align-items-center mt-1 mb-1">
                                    <div class="col-md-4">
                                      <label for="tools">Tools </label>
                                    </div>
                                    <div class="col-md-8">
                                      <input type="text" class="form-control" name="tools" id="tools" value="<?= $row["tools"]; ?>">
                                    </div>
                                  </div>

                                  <div class="row g-3 align-items-center mt-1 mb-1">
                                    <div class="col-md-4">
                                      <label for="note">Note </label>
                                    </div>
                                    <div class="col-md-8">
                                      <textarea type="text" class="form-control" name="note" id="note"><?= $row["note"]; ?></textarea>
                                    </div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                <h2>CHEKLIST SAMPLE</h2>
                                <div class="row g-3 align-items-center mt-3 mb-1">
                                  <div class="col-md-10">
                                    <label for="cek1" class="col-form-label">
                                      1. Nama/nomor sample sesuai dengan yang di order
                                    </label>
                                  </div>
                                  <div class="col-md-2 checkbox-lg">
                                    <input class="form-check-input border-1 border-primary" type="checkbox" value="1" id="cek1" name="cek1" <?php if ($row["cek_nama"] == true) {
                                                                                                                                              echo "checked";
                                                                                                                                            } ?> disabled>
                                  </div>
                                </div>
                                <div class="row g-3 align-items-center mt-1 mb-1">
                                  <div class="col-md-10">
                                    <label for="cek2" class="col-form-label">
                                      2. Jumlah sample sesuai dengan yang di order <?= $row["cek_qty"]; ?>
                                    </label>
                                  </div>
                                  <div class="col-md-2 checkbox-lg">
                                    <input class="form-check-input border-1 border-primary" type="checkbox" value="1" id="cek2" name="cek2" <?php if ($row["cek_qty"] == true) {
                                                                                                                                              echo "checked";
                                                                                                                                            } ?> disabled>
                                  </div>
                                </div>
                                <div class="row g-3 align-items-center mt-1 mb-1">
                                  <div class="col-md-10">
                                    <label for="cek3" class="col-form-label">
                                      3. Kelengkapan sample sudah sesuai
                                    </label>
                                  </div>
                                  <div class="col-md-2 checkbox-lg">
                                    <input class="form-check-input border-1 border-primary" type="checkbox" value="1" id="cek3" name="cek3" <?php if ($row["cek_comp"] == true) {
                                                                                                                                              echo "checked";
                                                                                                                                            } ?> disabled>
                                  </div>
                                </div>
                                <div class="row g-3 align-items-center mt-1 mb-1">
                                  <div class="col-md-10">
                                    <label for="cek4" class="col-form-label">
                                      4. Sample seragam (pengujian lebih dari 1 sample) <?= $row["cek_dupl"]; ?>
                                    </label>
                                  </div>
                                  <div class="col-md-2 checkbox-lg">
                                    <input class="form-check-input border-1 border-primary" type="checkbox" value="1" id="cek4" name="cek4" <?php if ($row["cek_dupl"] == true) {
                                                                                                                                              echo "checked";
                                                                                                                                            } ?> disabled>
                                  </div>
                                </div>
                                <div class="row g-3 align-items-center mt-1 mb-1">
                                  <div class="col-md-10">
                                    <label for="cek5" class="col-form-label">
                                      5. Kondisi sample layak untuk diuji <?= $row["cek_layak"]; ?>
                                    </label>
                                  </div>
                                  <div class="col-md-2 checkbox-lg">
                                    <input class="form-check-input border-1 border-primary" type="checkbox" value="1" id="cek5" name="cek5" <?php if ($row["cek_layak"] == true) {
                                                                                                                                              echo "checked";
                                                                                                                                            } ?> disabled>
                                  </div>
                                </div>
                                <div class="row g-3 align-items-center mt-1 mb-1">
                                  <p class="mb-0"><strong>Notes :</p>
                                  <p class="mt-0">1. Untuk point 3 bilamana sample yang diuji adalah sample assy.</p>
                                  <p class="mt-0">2. Untuk point 4 bilamana sample yang diuji lebih dari satu dan bentuknya harus sama saat diuji.</p>
                                  <p class="mt-0">3. Tekan checkbox berikan simbol (&#10003;) jika sesuai dan (&nbsp;) "kosongkan" jika tidak sesuai.</strong></p>
                                  <p class="mt-5"><strong>Sign name,</p>
                                  <p class="mt-0 ms-3"><strong>Silmi</strong></p>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-xmark"></i>
                              CLOSE</button>
                            <button class="btn btn-primary" type="submit" name="submit-check"><i class="fa fa-edit"></i>
                              SUBMIT</button>
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
                            <h6>Note &emsp13; :
                              <?= $row["note"]; ?>
                            </h6>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-xmark"></i>
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
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa-regular fa-circle-xmark"></i>
                                  CANCEL
                                </button>
                                <a href="hapus.php?id_sample=<?= $row["sample_test"]; ?>">
                                  <button type="submit" class="btn btn-success" name="delete-sample"><i class="fa-regular fa-circle-check"></i>
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

                    <?php $i++; ?>

                  <?php endforeach; ?>

                </table>
              </div>
              <!-- </div> -->
            </div>

            <h2 class="mb-4 mt-3">
              SAMPLE READY
            </h2>

            <?php
            if (isset($errorready)) : ?>
              <div id="myAlert" class="alert alert-danger alert-dismissible fade show">
                edit data gagal!
                <button type="button" id="myBtn" class="btn-close" data-bs-dismiss="alert"></button>
              </div>
            <?php
            endif;
            ?>

            <div class="table-responsive">
              <!-- <div class="table-wrapper-scroll-y my-custom-scrollbar"> -->
              <table id="tabel-data2" class="table table-bordered align-middle text-center table-striped">
                <thead class="table-dark align-middle" height="50">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Sample Test</th>
                    <th scope="col">Work Code</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Due Date</th>
                    <th scope="col">Detail</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <?php $i = 1; ?>
                <?php foreach ($sample_ready as $row) : ?>
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
                      <?= $row["due_date"]; ?>
                    </td>
                    <td>
                      <button class="btn btn-sm btn-primary" name="editReady" data-toggle="modal" data-target="#detailReady<?= $row["sample_test"]; ?>"><strong>DETAIL</strong></button>
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
                          <button class="btn btn-sm btn-success" name="editReady" data-toggle="modal" data-target="#editReady<?= $row["sample_test"]; ?>">
                            <i class="fa fa-pen-to-square"></i>
                          </button>
                        </div>
                        <div class="col-md-4 p-1">
                          <button class="btn btn-sm btn-danger" name="delete" data-toggle="modal" data-target="#deleteReady<?= $row["sample_test"]; ?>">
                            <i class="fa fa-trash"></i>
                          </button>
                        </div>
                      </div>

                    </td>
                  </tr>

                  <!-- modal ready edit data -->
                  <div id="editReady<?= $row["sample_test"]; ?>" class="modal fade" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="text-black">EDIT DATA</h4>
                          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="" method="post" enctype="multipart/form-data">

                            <label for="id" class="mt-3 mb-1">Sample Test</label>
                            <input type="text" class="form-control" name="id" value="<?= $row["sample_test"]; ?>" readonly>

                            <label for="njo" class="mt-3 mb-1">NJO/Work Order</label>
                            <input type="text" class="form-control" name="njo" id="njo" value="<?= $row["njo"]; ?>">

                            <label for="sample" class="mt-3 mb-1">Nama Sample</label>
                            <input type="text" class="form-control" name="sample" id="sample" value="<?= $row["nm_sample"]; ?>">

                            <label for="qty" class="mt-3 mb-1">Qty</label>
                            <input type="text" class="form-control" name="qty" id="qty" value="<?= $row["qty"]; ?>">

                            <label for="cust" class="mt-3 mb-1">Customer</label>
                            <input type="text" class="form-control" name="cust" id="cust" value="<?= $row["customer"]; ?>">

                            <label for="tgl-dtg" class="mt-3 mb-1">Tanggal Datang</label>
                            <input type="text" class="form-control" name="tgl-dtg" id="tgl-dtg" value="<?= $row["tgl_datang"]; ?>">

                            <label for="tujuan" class="mt-3 mb-1">Tujuan (Item-test)</label>
                            <input type="text" class="form-control" name="tujuan1" id="tujuan1" value="<?= $row["tujuan1"]; ?>">
                            <input type="text" class="form-control mt-3" name="tujuan2" id="tujuan2" value="<?= $row["tujuan2"]; ?>">
                            <input type="text" class="form-control mt-3" name="tujuan3" id="tujuan3" value="<?= $row["tujuan3"]; ?>">
                            <input type="text" class="form-control mt-3" name="tujuan4" id="tujuan4" value="<?= $row["tujuan4"]; ?>">
                            <input type="text" class="form-control mt-3" name="tujuan5" id="tujuan5" value="<?= $row["tujuan5"]; ?>">

                            <label for="tools" class="mt-3 mb-1">Tools </label>
                            <input type="text" class="form-control" name="tools" id="tools" value="<?= $row["tools"]; ?>">

                            <label for="note" class="mt-3 mb-1">Note </label>
                            <input type="text" class="form-control" name="note" id="note" value="<?= $row["note"]; ?>">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-xmark"></i>
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
                          <h6>Note &emsp13; :
                            <?= $row["note"]; ?>
                          </h6>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-xmark"></i>
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
                              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa-regular fa-circle-xmark"></i>
                                CANCEL
                              </button>
                              <a href="hapus.php?id_sample=<?= $row["sample_test"]; ?>">
                                <button type="submit" class="btn btn-success" name="delete-sample"><i class="fa-regular fa-circle-check"></i>
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

                  <?php $i++; ?>

                <?php endforeach; ?>

              </table>
              <!-- </div> -->
            </div>
          </div>

        </div>
      </div>
    </div>


  </section>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var btn = document.getElementById("myBtn");
      var element = document.getElementById("myAlert");

      // Create alert instance
      var myAlert = new bootstrap.Alert(element);

      btn.addEventListener("click", function() {
        myAlert.close();
      });
    });

    setTimeout(() => {
      const alert = document.getElementById('myAlert');

      alert.style.display = 'none';

    }, 2000);

    $(document).ready(function() {
      $('#tabel-data1').DataTable();
    });

    $(document).ready(function() {
      $('#tabel-data2').DataTable();
    });

    $('#tabel-data1').dataTable({
      "pageLength": 5
    });

    $('#tabel-data2').dataTable({
      "pageLength": 5
    });
  </script>

  <!-- <script src="js/fungsi.js"></script> -->
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="js/script.js"></script>
</body>

</html>