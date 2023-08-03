<?php
include "fungsi/fungsi.php";
include "header.php";
include "fungsi/fungsi-setting.php";
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

    <div class="page-content page-container mt-3" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-xl-6 col-md-12">
                    <div class="card user-card-full">
                        <div class="row m-l-0 m-r-0">
                            <div class="col-sm-4 bg-c-lite-green user-profile">
                                <div class="card-block text-center text-white">
                                    <div class="m-b-25">
                                        <img src="img/user-img/<?= $foto; ?>" width="80" class="img-radius" alt="User-Profile-Image">
                                    </div>
                                    <h6 class="f-w-600"><?= $nama; ?></h6>
                                    <p><?= $_SESSION["level"]; ?></p>
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
                                            <h6 class="text-muted f-w-400"><?= $username; ?></h6>
                                        </div>
                                        <div class="col-sm-6 mt-2">
                                            <p class="m-b-10 f-w-600">Position</p>
                                            <h6 class="text-muted f-w-400"><?= $level; ?></h6>
                                        </div>
                                        <div class="col-md-12">
                                            <button id="myButton" class="btn btn-primary btn-sm float-end me-3 mt-xl-5"><strong>EDIT </strong><i class="fa fa-gears"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="editProfile" class="container rounded pb-5 edit-setting" style="display: none;">
        <div class="row">
            <div class="col-md-12">
                <div class="card-dash-setting pb-5">
                    <div class="row">
                        <div class="col-md-3 border-right">
                            <div class="d-flex flex-column align-items-center text-center p-0 py-3 pt-0"><img class="img-radius mt-5" id="img" width="150px" src="img/user-img/<?= $foto; ?>"><span class="text-black pt-2"><?= $nama; ?></span><span class="text-black-50"><?= $level; ?></span><span></span></div>
                        </div>
                        <div class="col-md-9 border-right pe-5">
                            <div class="p-3 py-5">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="text-right text-black">Profile Settings</h4>
                                    </div>
                                    <div class="row mt-3 text-black">
                                        <div class="col-md-3">
                                            <input type="file" class="custom-file-input pt-0 pb-2" name="foto" id="upload">
                                        </div>
                                        <div class="col-md-2 mt-2 me-4">
                                            <label for="upload"><i class="fa fa-images fa-2xl"></i></label>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-warning float-end" data-toggle="modal" data-target="#editPass">Change password <i class="fa fa-key"></i></button>
                                        </div>
                                        <input type="text" name="id" value="<?= $_SESSION["id"]; ?>" hidden>
                                        <input type="text" name="foto_old" value="<?= $foto; ?>" hidden>
                                        <div class="col-md-12"><label class="labels">Username</label><input type="text" class="form-control" name="username" placeholder="" value="<?= $username; ?>" disabled></div>
                                        <div class="col-md-12"><label class="labels">Name</label><input type="text" class="form-control" name="nama" placeholder="" value="<?= $nama; ?>"></div>
                                        <div class="col-md-12"><label class="labels pt-2">Position</label><input type="text" class="form-control" name="level" placeholder="" value="<?= $level; ?>" disabled></div>

                                    </div>
                                    <div class="mt-5 mb-0 pb-0 text-center"><button class="btn btn-primary profile-button" type="submit" name="btn-pass">Save Profile <i class="fa fa-floppy-disk"></i></button></div>
                            </div>
                            <!-- detail modal -->
                            <div id="editPass" class="modal fade" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="text-black">
                                                Edit password
                                            </h4>
                                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-black">
                                            <div class="col-md-12"><label class="labels pt-2">Old Passsword</label><input type="password" class="form-control" name="old_password" placeholder="" value=""></div>
                                            <div class="col-md-12"><label class="labels pt-2">New Passsword</label><input type="password" class="form-control" name="password" placeholder="" value=""></div>
                                            <div class="col-md-12"><label class="labels pt-2">Confirm Passsword</label><input type="password" class="form-control" name="password2" placeholder="" value=""></div>
                                        </div>

                                        <div class="modal-footer">
                                            <!-- <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-xmark"></i>
                                                CLOSE</button> -->
                                            <button class="btn btn-success" data-dismiss="modal"><i class="fa fa-floppy-disk"></i>
                                                SAVE</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end modal detail -->
                            </form>

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