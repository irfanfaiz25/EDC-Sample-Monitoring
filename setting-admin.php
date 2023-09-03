<?php
include "fungsi/fungsi.php";
include "header.php";
include "fungsi/fungsi-setting.php";
?>
<section id="home-page" class="home-section">
    <div class="home-content" id="head-page">
        <i class='bx bx-menu'></i>
        <span class="text">Setting</span>
        <div class="col-md-10">
            <div class="logout me-4" id="logout">
                <a href="logout.php">
                    <i class="fa fa-right-from-bracket fa-2xl text-black"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="page-content page-container mt-3" id="page-content">
            <div class="padding">
                <div class="row container d-flex justify-content-center">
                    <?php
                    foreach ($admin_set as $row):
                        ?>
                        <div class="col-xl-6 col-md-12">
                            <div class="card user-card-full">
                                <div class="row m-l-0 m-r-0">
                                    <div class="col-sm-4 bg-c-lite-green user-profile">
                                        <div class="card-block text-center text-white">
                                            <div class="m-b-25">
                                                <img src="img/user-img/<?= $row["foto"]; ?>" width="80" class="img-radius"
                                                    alt="User-Profile-Image">
                                            </div>
                                            <h6 class="f-w-600">
                                                <?= $row["nama"]; ?>
                                            </h6>
                                            <p>
                                                <?= $row["level_user"]; ?>
                                            </p>
                                            <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="card-block">
                                            <div class="row card-logo">
                                                <img src="img/logoo.png" class="mb-4 mt-0" alt="">
                                            </div>
                                            <h6 class="m-b-20 p-b-5 b-b-default f-w-600">User Information</h6>
                                            <div class="row">
                                                <div class="col-sm-6 mt-2">
                                                    <p class="m-b-10 f-w-600">Username</p>
                                                    <h6 class="text-muted f-w-400">
                                                        <?= $row["username"]; ?>
                                                    </h6>
                                                </div>
                                                <div class="col-sm-6 mt-2">
                                                    <p class="m-b-10 f-w-600">Position</p>
                                                    <h6 class="text-muted f-w-400">
                                                        <?= $row["level_user"]; ?>
                                                    </h6>
                                                </div>
                                                <div class="col-md-12">
                                                    <button class="btn btn-primary btn-sm float-end me-3 mt-xl-5"
                                                        data-toggle="modal"
                                                        data-target="#editUser<?= $row["id"]; ?>"><strong>EDIT </strong><i
                                                            class="fa fa-gears"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- detail modal -->
                        <div id="editUser<?= $row["id"]; ?>" class="modal fade" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="text-black">
                                            Edit User
                                        </h4>
                                        <button type="button" class="btn-close" data-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-black">
                                        <div class="row">
                                            <div class="col-md-3 border-right">
                                                <div
                                                    class="d-flex flex-column align-items-center text-center p-0 py-3 pt-0">
                                                    <img class="img-radius mt-5" id="img<?= $row["id"]; ?>" width="150px"
                                                        src="img/user-img/<?= $row["foto"]; ?>"><span
                                                        class="text-black pt-2">
                                                        <?= $row["nama"]; ?>
                                                    </span><span class="text-black-50">
                                                        <?= $row["level_user"]; ?>
                                                    </span><span></span>
                                                </div>
                                            </div>
                                            <div class="col-md-9 border-right pe-5">
                                                <div class="p-3 py-5">
                                                    <form action="" method="post" enctype="multipart/form-data">
                                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                                            <h4 class="text-right text-black">Profile Settings</h4>
                                                        </div>
                                                        <div class="row mt-3 text-black">
                                                            <div class="col-md-3">
                                                                <input type="file" class="custom-file-input pt-0 pb-2"
                                                                    name="foto" id="foto"
                                                                    onchange="document.getElementById('img<?= $row['id']; ?>').src = window.URL.createObjectURL(this.files[0])">
                                                            </div>
                                                            <div class="col-md-2 mt-2 me-4">
                                                                <label for="upload"><i
                                                                        class="fa fa-images fa-2xl"></i></label>
                                                            </div>
                                                            <input type="text" name="id" value="<?= $row["id"]; ?>" hidden>
                                                            <input type="text" name="foto_old" value="<?= $row["foto"]; ?>"
                                                                hidden>
                                                            <div class="col-md-12"><label class="labels">Username</label>
                                                                <input type="text" class="form-control" name="username"
                                                                    placeholder="" value="<?= $row["username"]; ?>"
                                                                    disabled>
                                                            </div>
                                                            <div class="col-md-12"><label class="labels">Name</label>
                                                                <input type="text" class="form-control" name="nama"
                                                                    placeholder="" value="<?= $row["nama"]; ?>">
                                                            </div>
                                                            <div class="col-md-12"><label
                                                                    class="labels pt-2">Position</label>
                                                                <select class="form-select"
                                                                    aria-label=".form-select-sm example" name="level">
                                                                    <option selected>
                                                                        <?= $row["level_user"]; ?>
                                                                    </option>
                                                                    <option value="marketing">Marketing</option>
                                                                    <option value="lab">Lab</option>
                                                                    <option value="testing">Testing</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success" name="btn-update-admin"><i
                                                class="fa fa-floppy-disk"></i>
                                            SAVE</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end modal detail -->
                        </form>
                        <?php
                    endforeach;
                    ?>

                </div>
            </div>
        </div>


    </div>
</section>

<?php
include 'footer.php';
?>