<?php
include "fungsi/fungsi.php";
include "fungsi/phpqrcode/qrlib.php";
include "fungsi/fungsi-sample.php";
include "header.php";
?>

<section class="home-section">
  <div class="home-content" id="head-page">
    <i class='bx bx-menu'></i>
    <span class="text">Sample</span>
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

          <div class="col-md-4">
            <h2 class="mb-4">
              SAMPLE INPUT
            </h2>
            <!-- errorinput notif -->
            <?php
            if (isset($errorinput)): ?>
              <div id="myAlert" class="alert alert-danger alert-dismissible fade show">
                input data gagal, periksa kembali data yang di inputkan!
                <button type="button" id="myBtn" class="btn-close" data-bs-dismiss="alert"></button>
              </div>
              <?php
            endif;

            // var_dump($_SESSION);
            ?>

            <form action="" method="post" enctype="multipart/form-data">

              <table class="table table-bordered align-middle">
                <thead class="table-light">
                  <tr>
                    <th>
                      <img class="m-2" src="img/logoo.png" width="90" height="20" alt="">
                    </th>
                    <th class="text-center">
                      <h5>SAMPLE TAG</h5>
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
                  <td><input type="text" id="njo" name="njo" class="form-control"
                      placeholder="filled in only when njo already exists"></td>
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
                  <td><input type="text" id="tanggaldatang" name="tanggaldatang" class="form-control"
                      value="<?= date("d-m-Y"); ?>" readonly></td>
                </tr>
                <tr>
                  <td><label for="tujuan">Tujuan</label></td>
                  <td>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="tujuan" id="tujuan1" value="laboratory">
                      <label class="form-check-label" for="tujuan1">Laboratory</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="tujuan" id="tujuan2" value="testing">
                      <label class="form-check-label" for="tujuan2">Testing</label>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><label for="tools">Tools</label></td>
                  <td>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="tools" id="tools1" value="ada">
                      <label class="form-check-label" for="tools1">Ada</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="tools" id="tools2" value="tidak">
                      <label class="form-check-label" for="tools2">Tidak</label>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><label for="foto">Foto Sample</label></td>
                  <td><input type="file" name="foto" id="foto" class="form-control"></td>
                </tr>
                <tr>
                  <td><label for="note">Remark</label></td>
                  <td><textarea type="text" id="note" name="note" class="form-control" rows="3"></textarea></td>
                </tr>
                <tr>
                  <td colspan="2">
                    <div class="btn-add text-center pt-3 pb-3">

                      <button type="button" class="btn btn-success btn-block btn-lg" data-toggle="modal"
                        data-target="#ceklisSample">
                        <strong>NEXT <i class="fa fa-circle-arrow-right"></i></strong>
                      </button>
                    </div>
                  </td>
                </tr>
              </table>



              <!-- MODAL CEKLIS FORM -->
              <div class="modal" id="ceklisSample">
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
                                <input class="form-check-input border-1 border-secondary" type="checkbox" value="1"
                                  id="cek1" name="cek_nama">
                              </td>
                            </tr>
                            <tr>
                              <td>2.</td>
                              <td class="text-start">
                                <label for="cek2">Jumlah sample sesuai dengan yang diorder.</label>
                              </td>
                              <td class="checkbox-lg">
                                <input class="form-check-input border-1 border-secondary" type="checkbox" value="1"
                                  id="cek2" name="cek_qty">
                              </td>
                            </tr>
                            <tr>
                              <td>3.</td>
                              <td class="text-start">
                                <label for="cek3">Kelengkapan sample sudah sesuai.</label>
                              </td>
                              <td class="checkbox-lg">
                                <input class="form-check-input border-1 border-secondary" type="checkbox" value="1"
                                  id="cek3" name="cek_comp">
                              </td>
                            </tr>
                            <tr>
                              <td>4.</td>
                              <td class="text-start">
                                <label for="cek4">Sample seragam (pengujian lebih dari 1 sample).</label>
                              </td>
                              <td class="checkbox-lg">
                                <input class="form-check-input border-1 border-secondary" type="checkbox" value="1"
                                  id="cek4" name="cek_dupl">
                              </td>
                            </tr>
                            <tr>
                              <td>5.</td>
                              <td class="text-start">
                                <label for="cek5">Kondisi sample layak untuk diuji.</label>
                              </td>
                              <td class="checkbox-lg">
                                <input class="form-check-input border-1 border-secondary" type="checkbox" value="1"
                                  id="cek5" name="cek_layak">
                              </td>
                            </tr>
                            <tr>
                              <td colspan="3" class="text-start">
                                Keterangan :
                                <p>1. &nbsp;Untuk point 3 bilamana sample yang diuji adalah sample assy.</p>
                                <p style="margin-top: -10px;">2. Untuk point 4 bilamana sample yang diuji lebih dari
                                  satu dan bentuknya harus sama saat diuji.</p>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="3" class="text-start">
                                Tekan checkbox dan berikan simbol (&#10003;) jika sesuai dan (&nbsp;) 'kosongkan' jika
                                tidak sesuai.
                              </td>
                            </tr>
                            <tr>
                              <td colspan="2">Sign name,</td>
                              <td>
                                <input type="text" class="form-control text-center pic_cek" name="pic_cek"
                                  value="<?= $_SESSION["user"]; ?>" readonly>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      <button type="submit" name="btn-submit" class="btn btn-success"><strong><i
                            class="fa fa-circle-plus"></i> REGISTER</strong>
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
              SAMPLE INCOMING
            </h2>

            <!-- error edit sample pending notif -->
            <?php
            if (isset($errorsample)): ?>
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
                <table id="tabel-data-sample" class="table table-bordered align-middle text-center table-striped">
                  <thead class="table-dark align-middle" height="50">
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Image</th>
                      <th scope="col">Sample Test</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Qty</th>
                      <th scope="col">Due Date</th>
                      <th scope="col">Detail</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <?php $i = 1; ?>
                  <?php foreach ($sample as $row): ?>
                    <tr>
                      <td>
                        <?= $i; ?>
                      </td>
                      <td>
                        <?php
                        if ($row["foto"] != ""):
                          ?>
                          <a href="" data-toggle="modal" data-target="#detailImage<?= $row["sample_test"]; ?>">
                            <img src="img/foto-sample/<?= $row["foto"]; ?>" height="50" alt="foto-sample">
                          </a>
                          <?php
                        endif;
                        ?>
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
                        <?= date("d-m-Y", strtotime($row["due_date"])); ?>
                      </td>
                      <td>
                        <button class="btn btn-sm btn-primary" data-toggle="modal"
                          data-target="#detailModal<?= $row["sample_test"]; ?>"><i class="fa fa-circle-info"></i></button>
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
                                      <input type="text" class="form-control" name="id"
                                        value="<?= $row["sample_test"]; ?>" readonly>
                                    </div>
                                  </div>

                                  <div class="row g-3 align-items-center mt-1 mb-1">
                                    <div class="col-md-4">
                                      <label for="njo">NJO/Work Order</label>
                                    </div>
                                    <div class="col-md-8">
                                      <input type="text" class="form-control" name="njo" id="njo"
                                        value="<?= $row["njo"]; ?>">
                                    </div>
                                  </div>

                                  <div class="row g-3 align-items-center mt-1 mb-1">
                                    <div class="col-md-4">
                                      <label for="sample">Nama Sample</label>
                                    </div>
                                    <div class="col-md-8">
                                      <input type="text" class="form-control" name="sample" id="sample"
                                        value="<?= $row["nm_sample"]; ?>">
                                    </div>
                                  </div>

                                  <div class="row g-3 align-items-center mt-1 mb-1">
                                    <div class="col-md-4">
                                      <label for="qty">Qty</label>
                                    </div>
                                    <div class="col-md-8">
                                      <input type="text" class="form-control" name="qty" id="qty"
                                        value="<?= $row["qty"]; ?>">
                                    </div>
                                  </div>

                                  <div class="row g-3 align-items-center mt-1 mb-1">
                                    <div class="col-md-4">
                                      <label for="cust">Customer</label>
                                    </div>
                                    <div class="col-md-8">
                                      <input type="text" class="form-control" name="cust" id="cust"
                                        value="<?= $row["customer"]; ?>">
                                    </div>
                                  </div>

                                  <div class="row g-3 align-items-center mt-1 mb-1">
                                    <div class="col-md-4">
                                      <label for="tgl-dtg">Tanggal Datang</label>
                                    </div>
                                    <div class="col-md-8">
                                      <input type="text" class="form-control" name="tgl-dtg" id="tgl-dtg"
                                        value="<?= $row["tgl_datang"]; ?>">
                                    </div>
                                  </div>

                                  <div class="row g-3 align-items-center mt-1 mb-1">
                                    <div class="col-md-4">
                                      <label for="tujuan">Tujuan</label>
                                    </div>
                                    <div class="col-md-8">
                                      <?php
                                      if ($row["tujuan1"] == "laboratory"):
                                        ?>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="tujuan1"
                                            id="tujuanPending<?= $i; ?>" value="laboratory" checked>
                                          <label class="form-check-label" for="tujuanPending<?= $i; ?>">Laboratory</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="tujuan1"
                                            id="tujuanPending2<?= $i; ?>" value="testing">
                                          <label class="form-check-label" for="tujuanPending2<?= $i; ?>">Testing</label>
                                        </div>
                                        <?php
                                      elseif ($row["tujuan1"] == "testing"):
                                        ?>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="tujuan1"
                                            id="tujuanPending<?= $i; ?>" value="laboratory">
                                          <label class="form-check-label" for="tujuanPending<?= $i; ?>">Laboratory</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="tujuan1"
                                            id="tujuanPending2<?= $i; ?>" value="testing" checked>
                                          <label class="form-check-label" for="tujuanPending2<?= $i; ?>">Testing</label>
                                        </div>
                                        <?php
                                      else:
                                        ?>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="tujuan1"
                                            id="tujuanPending<?= $i; ?>" value="laboratory">
                                          <label class="form-check-label" for="tujuanPending<?= $i; ?>">Laboratory</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="tujuan1"
                                            id="tujuanPending2<?= $i; ?>" value="testing">
                                          <label class="form-check-label" for="tujuanPending2<?= $i; ?>">Testing</label>
                                        </div>
                                        <?php
                                      endif;
                                      ?>
                                    </div>
                                  </div>

                                  <div class="row g-3 align-items-center mt-1 mb-1">
                                    <div class="col-md-4">
                                      <label for="tools">Tools </label>
                                    </div>
                                    <div class="col-md-8">
                                      <?php
                                      if ($row["tools"] == "ada"):
                                        ?>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="tools" id="tools1<?= $i ?>"
                                            value="ada" checked>
                                          <label class="form-check-label" for="tools1<?= $i ?>">Ada</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="tools" id="tools2<?= $i ?>"
                                            value="tidak">
                                          <label class="form-check-label" for="tools2<?= $i ?>">Tidak</label>
                                        </div>
                                        <?php
                                      else:
                                        ?>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="tools" id="tools1<?= $i ?>"
                                            value="ada">
                                          <label class="form-check-label" for="tools1<?= $i ?>">Ada</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="tools" id="tools2<?= $i ?>"
                                            value="tidak" checked>
                                          <label class="form-check-label" for="tools2<?= $i ?>">Tidak</label>
                                        </div>
                                        <?php
                                      endif;
                                      ?>
                                    </div>
                                  </div>

                                  <div class="row g-3 align-items-center mt-1 mb-1">
                                    <div class="col-md-4">
                                      <label for="foto">Image </label>
                                    </div>
                                    <div class="col-md-2">
                                      <img id="blah<?= $row["sample_test"]; ?>" src="img/foto-sample/<?= $row["foto"]; ?>"
                                        width="80" alt="">
                                    </div>
                                    <div class="col-md-6">
                                      <input type="file" class="form-control" name="foto" id="foto"
                                        onchange="document.getElementById('blah<?= $row['sample_test']; ?>').src = window.URL.createObjectURL(this.files[0])">
                                    </div>
                                  </div>

                                  <div class="row g-3 align-items-center mt-1 mb-1">
                                    <div class="col-md-4">
                                      <label for="note">Note </label>
                                    </div>
                                    <div class="col-md-8">
                                      <textarea type="text" class="form-control" name="note"
                                        id="note"><?= $row["note"]; ?></textarea>
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
                                    <input class="form-check-input border-1 border-primary" type="checkbox" value="1"
                                      id="cek1" name="cek1" <?php if ($row["cek_nama"] == true) {
                                        echo "checked";
                                      } ?>>
                                  </div>
                                </div>
                                <div class="row g-3 align-items-center mt-1 mb-1">
                                  <div class="col-md-10">
                                    <label for="cek2" class="col-form-label">
                                      2. Jumlah sample sesuai dengan yang di order
                                    </label>
                                  </div>
                                  <div class="col-md-2 checkbox-lg">
                                    <input class="form-check-input border-1 border-primary" type="checkbox" value="1"
                                      id="cek2" name="cek2" <?php if ($row["cek_qty"] == true) {
                                        echo "checked";
                                      } ?>>
                                  </div>
                                </div>
                                <div class="row g-3 align-items-center mt-1 mb-1">
                                  <div class="col-md-10">
                                    <label for="cek3" class="col-form-label">
                                      3. Kelengkapan sample sudah sesuai
                                    </label>
                                  </div>
                                  <div class="col-md-2 checkbox-lg">
                                    <input class="form-check-input border-1 border-primary" type="checkbox" value="1"
                                      id="cek3" name="cek3" <?php if ($row["cek_comp"] == true) {
                                        echo "checked";
                                      } ?>>
                                  </div>
                                </div>
                                <div class="row g-3 align-items-center mt-1 mb-1">
                                  <div class="col-md-10">
                                    <label for="cek4" class="col-form-label">
                                      4. Sample seragam (pengujian lebih dari 1 sample)
                                    </label>
                                  </div>
                                  <div class="col-md-2 checkbox-lg">
                                    <input class="form-check-input border-1 border-primary" type="checkbox" value="1"
                                      id="cek4" name="cek4" <?php if ($row["cek_dupl"] == true) {
                                        echo "checked";
                                      } ?>>
                                  </div>
                                </div>
                                <div class="row g-3 align-items-center mt-1 mb-1">
                                  <div class="col-md-10">
                                    <label for="cek5" class="col-form-label">
                                      5. Kondisi sample layak untuk diuji
                                    </label>
                                  </div>
                                  <div class="col-md-2 checkbox-lg">
                                    <input class="form-check-input border-1 border-primary" type="checkbox" value="1"
                                      id="cek5" name="cek5" <?php if ($row["cek_layak"] == true) {
                                        echo "checked";
                                      } ?>>
                                  </div>
                                </div>
                                <div class="row g-3 align-items-center mt-1 mb-1">
                                  <p class="mb-0"><strong>Notes :</p>
                                  <p class="mt-0">1. Untuk point 3 bilamana sample yang diuji adalah sample assy.</p>
                                  <p class="mt-0">2. Untuk point 4 bilamana sample yang diuji lebih dari satu dan
                                    bentuknya harus sama saat diuji.</p>
                                  <p class="mt-0">3. Tekan checkbox berikan simbol (&#10003;) jika sesuai dan (&nbsp;)
                                    "kosongkan" jika tidak sesuai.</strong></p>
                                  <p class="mt-5 text-center"><strong>Sign name,</strong></p>
                                  <div class="mt-0 text-center">
                                    <input type="text" name="pic_cek" value="<?= $_SESSION["user"]; ?>"
                                      class="form-control text-center fw-bold" readonly>
                                  </div>
                                </div>
                              </div>
                            </div>

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-xmark"></i>
                              CLOSE</button>
                            <button class="btn btn-primary" type="submit" name="edit-sample"><i class="fa fa-edit"></i>
                              UPDATE</button>
                            </form>
                          </div>

                        </div>
                      </div>
                    </div>
                    <!-- end modal edit -->

                    <!-- detail modal -->
                    <div id="detailModal<?= $row["sample_test"]; ?>" class="modal fade" tabindex="	-1">
                      <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="text-black">
                              Detail Sample
                            </h4>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="wrapper mt-1">
                                  <div class="color night-rider justify-content-center">
                                    <strong>
                                      <?= $row["sample_test"]; ?>
                                    </strong>
                                  </div>
                                  <div class="color anti-flash-white">
                                    NJO/Work Order &emsp13; :
                                    <span class="hex">
                                      <?= $row["njo"]; ?>
                                    </span>
                                  </div>
                                  <div class="color chinese-white">
                                    Nama Sample &emsp13; :
                                    <span class="hex">
                                      <?= $row["nm_sample"]; ?>
                                    </span>
                                  </div>
                                  <div class="color anti-flash-white">
                                    Qty &emsp13; :
                                    <span class="hex">
                                      <?= $row["qty"]; ?>
                                    </span>
                                  </div>
                                  <div class="color chinese-white">
                                    Customer &emsp13; :
                                    <span class="hex">
                                      <?= $row["customer"]; ?>
                                    </span>
                                  </div>
                                  <div class="color anti-flash-white">
                                    Tanggal Datang &emsp13; :
                                    <span class="hex">
                                      <?= $row["tgl_datang"]; ?>
                                    </span>
                                  </div>
                                  <div class="color chinese-white">
                                    Tujuan &emsp13; :
                                    <span class="hex">
                                      <?= $row["tujuan1"]; ?>
                                    </span>
                                  </div>
                                  <div class="color anti-flash-white">
                                    Tools &emsp13; :
                                    <span class="hex">
                                      <?= $row["tools"]; ?>
                                    </span>
                                  </div>
                                  <div class="color chinese-white">
                                    Note &emsp13; :
                                    <span class="hex">
                                      <?= $row["note"]; ?>
                                    </span>
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
                                    <input class="form-check-input border-1 border-primary" type="checkbox" value="1"
                                      id="cek1" name="cek1" <?php if ($row["cek_nama"] == true) {
                                        echo "checked";
                                      } ?> disabled>
                                  </div>
                                </div>
                                <div class="row g-3 align-items-center mt-1 mb-1">
                                  <div class="col-md-10">
                                    <label for="cek2" class="col-form-label">
                                      2. Jumlah sample sesuai dengan yang di order
                                    </label>
                                  </div>
                                  <div class="col-md-2 checkbox-lg">
                                    <input class="form-check-input border-1 border-primary" type="checkbox" value="1"
                                      id="cek2" name="cek2" <?php if ($row["cek_qty"] == true) {
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
                                    <input class="form-check-input border-1 border-primary" type="checkbox" value="1"
                                      id="cek3" name="cek3" <?php if ($row["cek_comp"] == true) {
                                        echo "checked";
                                      } ?> disabled>
                                  </div>
                                </div>
                                <div class="row g-3 align-items-center mt-1 mb-1">
                                  <div class="col-md-10">
                                    <label for="cek4" class="col-form-label">
                                      4. Sample seragam (pengujian lebih dari 1 sample)
                                    </label>
                                  </div>
                                  <div class="col-md-2 checkbox-lg">
                                    <input class="form-check-input border-1 border-primary" type="checkbox" value="1"
                                      id="cek4" name="cek4" <?php if ($row["cek_dupl"] == true) {
                                        echo "checked";
                                      } ?> disabled>
                                  </div>
                                </div>
                                <div class="row g-3 align-items-center mt-1 mb-1">
                                  <div class="col-md-10">
                                    <label for="cek5" class="col-form-label">
                                      5. Kondisi sample layak untuk diuji
                                    </label>
                                  </div>
                                  <div class="col-md-2 checkbox-lg">
                                    <input class="form-check-input border-1 border-primary" type="checkbox" value="1"
                                      id="cek5" name="cek5" <?php if ($row["cek_layak"] == true) {
                                        echo "checked";
                                      } ?> disabled>
                                  </div>
                                </div>
                                <div class="row g-3 align-items-center mt-1 mb-1">
                                  <p class="mb-0"><strong>Notes :</p>
                                  <p class="mt-0">1. Untuk point 3 bilamana sample yang diuji adalah sample assy.</p>
                                  <p class="mt-0">2. Untuk point 4 bilamana sample yang diuji lebih dari satu dan
                                    bentuknya harus sama saat diuji.</p>
                                  <p class="mt-0">3. Tekan checkbox berikan simbol (&#10003;) jika sesuai dan (&nbsp;)
                                    "kosongkan" jika tidak sesuai.</strong></p>
                                  <p class="mt-5"><strong>Sign name,</strong></p>
                                  <p class="mt-0 ms-3"><strong>
                                      <?= $row["pic_cek"]; ?>
                                    </strong></p>
                                </div>
                              </div>
                            </div>
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

                    <!-- detail image modal -->
                    <div id="detailImage<?= $row["sample_test"]; ?>" class="modal fade" tabindex="	-1">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="text-black">
                              Image Sample (
                              <?= $row["sample_test"]; ?>)
                            </h4>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-12 text-center pb-5 pt-4">
                                <img src="img/foto-sample/<?= $row["foto"]; ?>" alt="foto-sample" height="400">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- end detail image modal -->

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
            if (isset($errorready)): ?>
              <div id="myAlert" class="alert alert-danger alert-dismissible fade show">
                edit data gagal!
                <button type="button" id="myBtn" class="btn-close" data-bs-dismiss="alert"></button>
              </div>
              <?php
            endif;
            ?>

            <div class="table-responsive">
              <!-- <div class="table-wrapper-scroll-y my-custom-scrollbar"> -->
              <table id="tabel-data-ready" class="table table-bordered align-middle text-center table-striped">
                <thead class="table-dark align-middle" height="50">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Image</th>
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
                <?php foreach ($sample_ready as $row): ?>
                  <tr>
                    <td>
                      <?= $i; ?>
                    </td>
                    <td>
                      <?php
                      if ($row["foto"] != ""):
                        ?>
                        <a href="" data-toggle="modal" data-target="#detailImageReady<?= $row["sample_test"]; ?>">
                          <img src="img/foto-sample/<?= $row["foto"]; ?>" height="50" alt="foto-sample">
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
                      <?= date("d-m-Y", strtotime($row["due_date"])); ?>
                    </td>
                    <td>
                      <button class="btn btn-sm btn-primary" name="editReady" data-toggle="modal"
                        data-target="#detailReady<?= $row["sample_test"]; ?>"><i class="fa fa-circle-info"></i></button>
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
                                    <input type="text" class="form-control" name="id" value="<?= $row["sample_test"]; ?>"
                                      readonly>
                                  </div>
                                </div>

                                <div class="row g-3 align-items-center mt-1 mb-1">
                                  <div class="col-md-4">
                                    <label for="njo">NJO/Work Order</label>
                                  </div>
                                  <div class="col-md-8">
                                    <input type="text" class="form-control" name="njo" id="njo"
                                      value="<?= $row["njo"]; ?>">
                                  </div>
                                </div>

                                <div class="row g-3 align-items-center mt-1 mb-1">
                                  <div class="col-md-4">
                                    <label for="sample">Nama Sample</label>
                                  </div>
                                  <div class="col-md-8">
                                    <input type="text" class="form-control" name="sample" id="sample"
                                      value="<?= $row["nm_sample"]; ?>">
                                  </div>
                                </div>

                                <div class="row g-3 align-items-center mt-1 mb-1">
                                  <div class="col-md-4">
                                    <label for="qty">Qty</label>
                                  </div>
                                  <div class="col-md-8">
                                    <input type="text" class="form-control" name="qty" id="qty"
                                      value="<?= $row["qty"]; ?>">
                                  </div>
                                </div>

                                <div class="row g-3 align-items-center mt-1 mb-1">
                                  <div class="col-md-4">
                                    <label for="cust">Customer</label>
                                  </div>
                                  <div class="col-md-8">
                                    <input type="text" class="form-control" name="cust" id="cust"
                                      value="<?= $row["customer"]; ?>">
                                  </div>
                                </div>

                                <div class="row g-3 align-items-center mt-1 mb-1">
                                  <div class="col-md-4">
                                    <label for="tgl-dtg">Tanggal Datang</label>
                                  </div>
                                  <div class="col-md-8">
                                    <input type="text" class="form-control" name="tgl-dtg" id="tgl-dtg"
                                      value="<?= $row["tgl_datang"]; ?>">
                                  </div>
                                </div>

                                <div class="row g-3 align-items-center mt-1 mb-1">
                                  <div class="col-md-4">
                                    <label for="tujuan">Tujuan</label>
                                  </div>
                                  <div class="col-md-8">
                                    <?php
                                    if ($row["tujuan1"] == "laboratory"):
                                      ?>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="tujuan1"
                                          id="tujuanReady<?= $i; ?>" value="laboratory" checked>
                                        <label class="form-check-label" for="tujuanReady<?= $i; ?>">Laboratory</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="tujuan1"
                                          id="tujuanReady2<?= $i; ?>" value="testing">
                                        <label class="form-check-label" for="tujuanReady2<?= $i; ?>">Testing</label>
                                      </div>
                                      <?php
                                    elseif ($row["tujuan1"] == "testing"):
                                      ?>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="tujuan1"
                                          id="tujuanReady<?= $i; ?>" value="laboratory">
                                        <label class="form-check-label" for="tujuanReady<?= $i; ?>">Laboratory</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="tujuan1"
                                          id="tujuanReady2<?= $i; ?>" value="testing" checked>
                                        <label class="form-check-label" for="tujuanReady2<?= $i; ?>">Testing</label>
                                      </div>
                                      <?php
                                    else:
                                      ?>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="tujuan1"
                                          id="tujuanReady<?= $i; ?>" value="laboratory">
                                        <label class="form-check-label" for="tujuanReady<?= $i; ?>">Laboratory</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="tujuan1"
                                          id="tujuanReady2<?= $i; ?>" value="testing">
                                        <label class="form-check-label" for="tujuanReady2<?= $i; ?>">Testing</label>
                                      </div>
                                      <?php
                                    endif;
                                    ?>
                                  </div>
                                </div>

                                <div class="row g-3 align-items-center mt-1 mb-1">
                                  <div class="col-md-4">
                                    <label for="tools">Tools </label>
                                  </div>
                                  <div class="col-md-8">
                                    <?php
                                    if ($row["tools"] == "ada"):
                                      ?>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="tools" id="toolsReady1<?= $i ?>"
                                          value="ada" checked>
                                        <label class="form-check-label" for="toolsReady1<?= $i ?>">Ada</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="tools" id="toolsReady2<?= $i ?>"
                                          value="tidak">
                                        <label class="form-check-label" for="toolsReady2<?= $i ?>">Tidak</label>
                                      </div>
                                      <?php
                                    else:
                                      ?>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="tools" id="toolsReady1<?= $i ?>"
                                          value="ada">
                                        <label class="form-check-label" for="toolsReady1<?= $i ?>">Ada</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="tools" id="toolsReady2<?= $i ?>"
                                          value="tidak" checked>
                                        <label class="form-check-label" for="toolsReady2<?= $i ?>">Tidak</label>
                                      </div>
                                      <?php
                                    endif;
                                    ?>
                                  </div>
                                </div>

                                <div class="row g-3 align-items-center mt-1 mb-1">
                                  <div class="col-md-4">
                                    <label for="foto">Image </label>
                                  </div>
                                  <div class="col-md-2">
                                    <img id="blah<?= $row["sample_test"]; ?>" src="img/foto-sample/<?= $row["foto"]; ?>"
                                      width="80" alt="">
                                  </div>
                                  <div class="col-md-6">
                                    <input type="file" class="form-control" name="foto" id="foto"
                                      onchange="document.getElementById('blah<?= $row['sample_test']; ?>').src = window.URL.createObjectURL(this.files[0])">
                                  </div>
                                </div>

                                <div class="row g-3 align-items-center mt-1 mb-1">
                                  <div class="col-md-4">
                                    <label for="note">Note </label>
                                  </div>
                                  <div class="col-md-8">
                                    <textarea type="text" class="form-control" name="note"
                                      id="note"><?= $row["note"]; ?></textarea>
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
                                  <input class="form-check-input border-1 border-primary" type="checkbox" value="1"
                                    id="cek1" name="cek1" <?php if ($row["cek_nama"] == true) {
                                      echo "checked";
                                    } ?>>
                                </div>
                              </div>
                              <div class="row g-3 align-items-center mt-1 mb-1">
                                <div class="col-md-10">
                                  <label for="cek2" class="col-form-label">
                                    2. Jumlah sample sesuai dengan yang di order
                                    <?= $row["cek_qty"]; ?>
                                  </label>
                                </div>
                                <div class="col-md-2 checkbox-lg">
                                  <input class="form-check-input border-1 border-primary" type="checkbox" value="1"
                                    id="cek2" name="cek2" <?php if ($row["cek_qty"] == true) {
                                      echo "checked";
                                    } ?>>
                                </div>
                              </div>
                              <div class="row g-3 align-items-center mt-1 mb-1">
                                <div class="col-md-10">
                                  <label for="cek3" class="col-form-label">
                                    3. Kelengkapan sample sudah sesuai
                                  </label>
                                </div>
                                <div class="col-md-2 checkbox-lg">
                                  <input class="form-check-input border-1 border-primary" type="checkbox" value="1"
                                    id="cek3" name="cek3" <?php if ($row["cek_comp"] == true) {
                                      echo "checked";
                                    } ?>>
                                </div>
                              </div>
                              <div class="row g-3 align-items-center mt-1 mb-1">
                                <div class="col-md-10">
                                  <label for="cek4" class="col-form-label">
                                    4. Sample seragam (pengujian lebih dari 1 sample)
                                    <?= $row["cek_dupl"]; ?>
                                  </label>
                                </div>
                                <div class="col-md-2 checkbox-lg">
                                  <input class="form-check-input border-1 border-primary" type="checkbox" value="1"
                                    id="cek4" name="cek4" <?php if ($row["cek_dupl"] == true) {
                                      echo "checked";
                                    } ?>>
                                </div>
                              </div>
                              <div class="row g-3 align-items-center mt-1 mb-1">
                                <div class="col-md-10">
                                  <label for="cek5" class="col-form-label">
                                    5. Kondisi sample layak untuk diuji
                                    <?= $row["cek_layak"]; ?>
                                  </label>
                                </div>
                                <div class="col-md-2 checkbox-lg">
                                  <input class="form-check-input border-1 border-primary" type="checkbox" value="1"
                                    id="cek5" name="cek5" <?php if ($row["cek_layak"] == true) {
                                      echo "checked";
                                    } ?>>
                                </div>
                              </div>
                              <div class="row g-3 align-items-center mt-1 mb-1">
                                <p class="mb-0"><strong>Notes :</p>
                                <p class="mt-0">1. Untuk point 3 bilamana sample yang diuji adalah sample assy.</p>
                                <p class="mt-0">2. Untuk point 4 bilamana sample yang diuji lebih dari satu dan
                                  bentuknya harus sama saat diuji.</p>
                                <p class="mt-0">3. Tekan checkbox berikan simbol (&#10003;) jika sesuai dan (&nbsp;)
                                  "kosongkan" jika tidak sesuai.</strong></p>
                                <p class="mt-5 text-center"><strong>Sign name,</strong></p>
                                <div class="mt-0 text-center">
                                  <input type="text" name="pic_cek" value="<?= $_SESSION["user"]; ?>"
                                    class="form-control text-center fw-bold" readonly>
                                </div>
                              </div>
                            </div>
                          </div>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-xmark"></i>
                            CLOSE</button>
                          <button class="btn btn-primary" type="submit" name="edit-ready"><i class="fa fa-edit"></i>
                            UPDATE</button>
                          </form>
                        </div>

                      </div>
                    </div>
                  </div>
                  <!-- end ready modal edit -->

                  <!-- ready detail modal -->
                  <div id="detailReady<?= $row["sample_test"]; ?>" class="modal fade" tabindex="	-1">
                    <div class="modal-dialog modal-xl">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="text-black">
                            Detail Sample
                          </h4>
                          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="wrapper mt-1">
                                <div class="color night-rider justify-content-center">
                                  <strong>
                                    <?= $row["sample_test"]; ?>
                                  </strong>
                                </div>
                                <div class="color anti-flash-white">
                                  NJO/Work Order &emsp13; :
                                  <span class="hex">
                                    <?= $row["njo"]; ?>
                                  </span>
                                </div>
                                <div class="color chinese-white">
                                  Nama Sample &emsp13; :
                                  <span class="hex">
                                    <?= $row["nm_sample"]; ?>
                                  </span>
                                </div>
                                <div class="color anti-flash-white">
                                  Qty &emsp13; :
                                  <span class="hex">
                                    <?= $row["qty"]; ?>
                                  </span>
                                </div>
                                <div class="color chinese-white">
                                  Customer &emsp13; :
                                  <span class="hex">
                                    <?= $row["customer"]; ?>
                                  </span>
                                </div>
                                <div class="color anti-flash-white">
                                  Tanggal Datang &emsp13; :
                                  <span class="hex">
                                    <?= $row["tgl_datang"]; ?>
                                  </span>
                                </div>
                                <div class="color chinese-white">
                                  Tujuan &emsp13; :
                                  <span class="hex">
                                    <?= $row["tujuan1"]; ?>
                                  </span>
                                </div>
                                <div class="color anti-flash-white">
                                  Tools &emsp13; :
                                  <span class="hex">
                                    <?= $row["tools"]; ?>
                                  </span>
                                </div>
                                <div class="color chinese-white">
                                  Note &emsp13; :
                                  <span class="hex">
                                    <?= $row["note"]; ?>
                                  </span>
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
                                  <input class="form-check-input border-1 border-primary" type="checkbox" value="1"
                                    id="cek1" name="cek1" <?php if ($row["cek_nama"] == true) {
                                      echo "checked";
                                    } ?> disabled>
                                </div>
                              </div>
                              <div class="row g-3 align-items-center mt-1 mb-1">
                                <div class="col-md-10">
                                  <label for="cek2" class="col-form-label">
                                    2. Jumlah sample sesuai dengan yang di order
                                    <?= $row["cek_qty"]; ?>
                                  </label>
                                </div>
                                <div class="col-md-2 checkbox-lg">
                                  <input class="form-check-input border-1 border-primary" type="checkbox" value="1"
                                    id="cek2" name="cek2" <?php if ($row["cek_qty"] == true) {
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
                                  <input class="form-check-input border-1 border-primary" type="checkbox" value="1"
                                    id="cek3" name="cek3" <?php if ($row["cek_comp"] == true) {
                                      echo "checked";
                                    } ?> disabled>
                                </div>
                              </div>
                              <div class="row g-3 align-items-center mt-1 mb-1">
                                <div class="col-md-10">
                                  <label for="cek4" class="col-form-label">
                                    4. Sample seragam (pengujian lebih dari 1 sample)
                                    <?= $row["cek_dupl"]; ?>
                                  </label>
                                </div>
                                <div class="col-md-2 checkbox-lg">
                                  <input class="form-check-input border-1 border-primary" type="checkbox" value="1"
                                    id="cek4" name="cek4" <?php if ($row["cek_dupl"] == true) {
                                      echo "checked";
                                    } ?> disabled>
                                </div>
                              </div>
                              <div class="row g-3 align-items-center mt-1 mb-1">
                                <div class="col-md-10">
                                  <label for="cek5" class="col-form-label">
                                    5. Kondisi sample layak untuk diuji
                                    <?= $row["cek_layak"]; ?>
                                  </label>
                                </div>
                                <div class="col-md-2 checkbox-lg">
                                  <input class="form-check-input border-1 border-primary" type="checkbox" value="1"
                                    id="cek5" name="cek5" <?php if ($row["cek_layak"] == true) {
                                      echo "checked";
                                    } ?> disabled>
                                </div>
                              </div>
                              <div class="row g-3 align-items-center mt-1 mb-1">
                                <p class="mb-0"><strong>Notes :</p>
                                <p class="mt-0">1. Untuk point 3 bilamana sample yang diuji adalah sample assy.</p>
                                <p class="mt-0">2. Untuk point 4 bilamana sample yang diuji lebih dari satu dan bentuknya
                                  harus sama saat diuji.</p>
                                <p class="mt-0">3. Tekan checkbox berikan simbol (&#10003;) jika sesuai dan (&nbsp;)
                                  "kosongkan" jika tidak sesuai.</strong></p>
                                <p class="mt-5"><strong>Sign name,</strong></p>
                                <p class="mt-0 ms-3"><strong>
                                    <?= $row["pic_cek"]; ?>
                                  </strong></p>
                              </div>
                            </div>
                          </div>
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

                  <!-- detail image modal -->
                  <div id="detailImageReady<?= $row["sample_test"]; ?>" class="modal fade" tabindex="	-1">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="text-black">
                            Image Sample (
                            <?= $row["sample_test"]; ?>)
                          </h4>
                          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-12 text-center pb-5 pt-4">
                              <img src="img/foto-sample/<?= $row["foto"]; ?>" alt="foto-sample" height="400">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- end detail image modal -->

                  <?php $i++; ?>

                <?php endforeach; ?>

              </table>
              <!-- </div> -->
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

</section>

<?php
include "footer.php";
?>