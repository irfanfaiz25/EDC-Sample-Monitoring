<?php
include "fungsi/fungsi.php";
include "header.php";
include "fungsi/fungsi-setting.php";
?>
<section id="home-page" class="home-section">
    <div class="home-content">
        <i class='bx bx-menu'></i>
        <span class="text">Dashboard</span>
        <span class="notif me-5">
            <a href="logout.php">
                <i class="fa fa-right-from-bracket fa-2xl text-black"></i>
            </a>
        </span>
    </div>
    <div class="page-content page-container" id="page-content">
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
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right text-black">Profile Settings</h4>
                                </div>
                                <div class="row mt-3 text-black">
                                    <input type="file" class="custom-file-input pt-0 pb-2" name="foto" id="upload">
                                    <input type="text" name="id" value="<?= $_SESSION["id"]; ?>" hidden>
                                    <div class="col-md-12"><label class="labels">Username</label><input type="text" class="form-control" name="username" placeholder="" value="<?= $username; ?>" disabled></div>
                                    <div class="col-md-12"><label class="labels">Name</label><input type="text" class="form-control" name="username" placeholder="" value="<?= $nama; ?>"></div>
                                    <!-- <div class="col-md-12"><label class="labels pt-2">New Passsword</label><input type="text" class="form-control" name="password" placeholder="" value=""></div>
                                    <div class="col-md-12"><label class="labels pt-2">Confirm Passsword</label><input type="text" class="form-control" name="password2" placeholder="" value=""></div> -->
                                    <div class="col-md-12"><label class="labels pt-2">Position</label><input type="text" class="form-control" name="level" placeholder="" value="<?= $level; ?>" disabled></div>

                                </div>
                                <div class="mt-5 mb-0 pb-0 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile <i class="fa fa-floppy-disk"></i></button></div>
                            </div>
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