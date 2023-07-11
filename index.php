<?php

include 'fungsi/fungsi.php';

if (isset($_POST["btn-submit"])) {
  if (tambah($_POST)) {
    header('Location: index.php');
  } else {
    echo "
        <script>
          alert('data tidak berhasil ditambahkan');
          document.location.href = 'index.php';
        </script>
    ";
  }
}

$sample = query("SELECT * FROM tb_sample WHERE njo_stat=0");
$sample_ready = query("SELECT * FROM tb_sample WHERE njo_stat=1");

$query = mysqli_query($konek, "SELECT max(sample_test) as kodeTerbesar FROM tb_sample");
$data = mysqli_fetch_array($query);
$kode_sample = $data['kodeTerbesar'];

$year_now = date("y");


$urutan = (int) substr($kode_sample, 3, 3);

$urutan++;

$huruf = "ST";
$kode_sample = $huruf . $year_now . sprintf("%05s", $urutan);

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
  <link rel="stylesheet" href="css/styles.css" />

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
            <a href="#" class="nav-link">
              <i class="bx bx-home-alt icon"></i>
              <span class="link">Dashboard</span>
            </a>
          </li>
          <li class="list">
            <a href="#" class="nav-link">
              <i class="fa fa-database icon"></i>
              <span class="link">Sample Data</span>
            </a>
          </li>
          <li class="list">
            <a href="#" class="nav-link">
              <i class="bx bx-bell icon"></i>
              <span class="link">Notifications</span>
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

          <div class="col-md-7">
            <h2 class="mb-4">
              SAMPLE PENDING
            </h2>
            <div class="row">
              <div class="col-md-1">
                <div class="mb-3 pt-1">
                  <label for="cari" class="form-label"><strong>Search</strong></label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-3">
                  <input type="text" class="form-control" id="cari" aria-describedby="cari">
                </div>
              </div>
              <div class="col-md-2 mt-1">
                <i class="fa-solid fa-magnifying-glass fa-xl"></i>
              </div>
            </div>
            <div class="table-responsive">
              <div class="table-wrapper-scroll-y my-custom-scrollbar">
                <table class="table table-bordered align-middle text-center">
                  <thead class="table-dark">
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Work Code</th>
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
                        <td>
                          <?= $row["after_test"]; ?>
                        </td>
                        <td>
                          <?= $row["due_date"]; ?>
                        </td>
                        <td>
                          <button class="btn btn-sm btn-primary"><strong>DETAIL</strong></button>
                        </td>
                        <td width="100">
                          <div class="row text-center" style="padding-left: 10px; padding-right: 10px;">
                            <div class="col-md-6 p-0">
                              <button class="btn btn-sm btn-success" name="edit" data-toggle="modal"
                                data-target="#editModal<?= $row["sample_test"]; ?>">
                                <i class="fa fa-pen-to-square"></i>
                              </button>
                            </div>
                            <div class="col-md-6 p-0">
                              <button class="btn btn-sm btn-danger">
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
                              <h4 class="text-secondary">EDIT DATA</h4>
                              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $row["id_sample"]; ?>">
                                <input type="hidden" name="id_temp" value="1">

                                <label for="njo" class="mt-3 mb-1">NJO/Work Order</label>
                                <input type="text" class="form-control" name="njo" id="njo" value="<?= $row["njo"]; ?>">

                                <label for="sample" class="mt-3 mb-1">Nama Sample</label>
                                <input type="text" class="form-control" name="sample" id="sample"
                                  value="<?= $row["nm_sample"]; ?>">

                                <label for="qty" class="mt-3 mb-1">Qty</label>
                                <input type="text" class="form-control" name="qty" id="qty" value="<?= $row["qty"]; ?>">

                                <label for="tgl-dtg" class="mt-3 mb-1">Tanggal Datang</label>
                                <input type="text" class="form-control" name="tgl-dtg" id="tgl-dtg"
                                  value="<?= $row["tgl_datang"]; ?>">

                                <label for="tujuan" class="mt-3 mb-1">Tujuan </label>
                                <input type="text" class="form-control" name="tujuan1" id="tujuan"
                                  value="<?= $row["tujuan1"]; ?>">
                                <input type="text" class="form-control mt-3" name="tujuan2" id="tujuan"
                                  value="<?= $row["tujuan2"]; ?>">
                                <input type="text" class="form-control mt-3" name="tujuan3" id="tujuan"
                                  value="<?= $row["tujuan3"]; ?>">
                                <input type="text" class="form-control mt-3" name="tujuan4" id="tujuan"
                                  value="<?= $row["tujuan4"]; ?>">
                                <input type="text" class="form-control mt-3" name="tujuan5" id="tujuan"
                                  value="<?= $row["tujuan5"]; ?>">

                                <label for="tools" class="mt-3 mb-1">Tools </label>
                                <input type="text" class="form-control" name="tools" id="tools"
                                  value="<?= $row["tools"]; ?>">

                                <label for="after" class="mt-3 mb-1">After Test </label>
                                <input type="text" class="form-control" name="after" id="after"
                                  value="<?= $row["after_test"]; ?>">

                                <label for="note" class="mt-3 mb-1">Note </label>
                                <input type="text" class="form-control" name="note" id="note"
                                  value="<?= $row["note"]; ?>">

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-ban"></i>
                                CANCEL</button>
                              <button type="submit" class="btn btn-primary" name="editAnggota"><i class="fa fa-edit"></i>
                                UBAH</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

                    </tbody>

                    <?php $i++; ?>

                  <?php endforeach; ?>

                </table>
              </div>
            </div>
            <h2 class="mb-4 mt-2">
              SAMPLE READY
            </h2>
            <div class="row">
              <div class="col-md-1">
                <div class="mb-3 pt-1">
                  <label for="cari" class="form-label"><strong>Search</strong></label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-3">
                  <input type="text" class="form-control" id="cari" aria-describedby="cari">
                </div>
              </div>
              <div class="col-md-2 mt-1">
                <i class="fa-solid fa-magnifying-glass fa-xl"></i>
              </div>
            </div>
            <div class="table-responsive">
              <div class="table-wrapper-scroll-y my-custom-scrollbar">
                <table class="table table-bordered align-middle text-center">
                  <thead class="table-dark">
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Work Code</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Qty</th>
                      <th scope="col">Tanggal</th>
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
                        <td>
                          <?= $row["after_test"]; ?>
                        </td>
                        <td>
                          <?= $row["due_date"]; ?>
                        </td>
                        <td>printed</td>
                        <td>
                          <button class="btn btn-sm btn-primary"><strong>DETAIL</strong></button>
                        </td>
                        <td width="300">
                          <div class="row text-center" style="padding-left: 7px; padding-right: 10px;">
                            <div class="col-md-4 p-1">
                              <button class="btn btn-sm btn-warning">
                                <i class="fa fa-print"></i>
                              </button>
                            </div>
                            <div class="col-md-4 p-1">
                              <button class="btn btn-sm btn-success">
                                <i class="fa fa-pen-to-square"></i>
                              </button>
                            </div>
                            <div class="col-md-4 p-1">
                              <button class="btn btn-sm btn-danger">
                                <i class="fa fa-trash"></i>
                              </button>
                            </div>
                          </div>

                        </td>
                      </tr>
                    </tbody>

                    <?php $i++; ?>

                  <?php endforeach; ?>

                </table>
              </div>
            </div>

          </div>
          <div class="col-md-5">
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
                  <td><input type="text" id="sample-test" name="sample-test" class="form-disabled"
                      value="<?= $kode_sample; ?>"></td>
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
                  <td></td>
                  <td><input type="hidden" id="id_temp" name="id_temp" value="0" class="form-control"></td>
                </tr>
                <tr>
                  <td colspan="2">
                    <div class="btn-add text-center pt-3 pb-3">
                      <button type="submit" name="btn-submit" class="btn btn-lg btn-dark">Submit</button>
                    </div>
                  </td>
                </tr>
              </table>


            </form>
          </div>

        </div>
      </div>
    </div>
  </section>

  </section>

  <script src="js/script.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>

</body>

</html>