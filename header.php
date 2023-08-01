<?php
session_start();

if (!isset($_SESSION["login"])) {
    header('Location: login.php');
    exit;
}

$inactive = 600;
if (!isset($_SESSION['timeout']))
    $_SESSION['timeout'] = time() + $inactive;

$session_life = time() - $_SESSION['timeout'];

if ($session_life > $inactive) {
    session_destroy();
    session_unset();
    $_SESSION = [];
    header("Location:index.php");
}

$_SESSION['timeout'] = time();
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
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style-trackk.css">
    <link rel="stylesheet" href="css/card-setting.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- data table -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" />

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

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
                        <img src="img/user-img/<?= $_SESSION["img"]; ?>" alt="profileImg">
                    </div>
                    <div class="name-job">
                        <div class="profile_name"><?= $_SESSION["user"]; ?></div>
                        <div class="job"><?= $_SESSION["level"]; ?></div>
                    </div>
                    <a href="">
                        <i class=''></i>
                    </a>
                </div>
            </li>
        </ul>
    </div>