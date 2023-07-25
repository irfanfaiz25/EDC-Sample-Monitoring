<?php
include 'fungsi/fungsi.php';

$sample = query("SELECT * FROM tb_sample ORDER BY time_stamp DESC");
$sample_scrap = query("SELECT * FROM tb_sample WHERE after_test='scrap' ORDER BY time_stamp DESC");
$sample_return = query("SELECT * FROM tb_sample WHERE after_test='return' ORDER BY time_stamp DESC");

if (isset($_GET["after_test"])) {
    if (update_after($_GET)) {
        header('Location: index.php');
    } else {
        $errorafter = true;
    }
}

$y = date("Y");
$year1 = $y - ("1");
$year2 = $y - ("2");

// date come sample
// year -1 come sample
$come = mysqli_query($konek, "SELECT COUNT(tgl_datang) AS total FROM tb_sample WHERE YEAR(tgl_datang)='$year1'");
if (mysqli_num_rows($come) == 0) {
    $come_year1 = '0';
} else {
    while ($row = mysqli_fetch_assoc($come)) {
        $come_year1 = $row["total"];
    }
}

// year -2 come sample
$come = mysqli_query($konek, "SELECT COUNT(tgl_datang) AS total FROM tb_sample WHERE YEAR(tgl_datang)='$year2'");
if (mysqli_num_rows($come) == 0) {
    $come_year2 = '0';
} else {
    while ($row = mysqli_fetch_assoc($come)) {
        $come_year2 = $row["total"];
    }
}

// month jan
$month = 1;
$come = mysqli_query($konek, "SELECT COUNT(tgl_datang) AS total, EXTRACT(MONTH FROM tgl_datang) AS month FROM tb_sample WHERE YEAR(tgl_datang)=YEAR(CURDATE()) AND MONTH(tgl_datang)='$month' GROUP BY month");
if (mysqli_num_rows($come) == 0) {
    $come_jan = '0';
} else {
    while ($row = mysqli_fetch_assoc($come)) {
        $come_jan = $row["total"];
    }
}

// month feb
$month = 2;
$come = mysqli_query($konek, "SELECT COUNT(tgl_datang) AS total, EXTRACT(MONTH FROM tgl_datang) AS month FROM tb_sample WHERE YEAR(tgl_datang)=YEAR(CURDATE()) AND MONTH(tgl_datang)='$month' GROUP BY month");
if (mysqli_num_rows($come) == 0) {
    $come_feb = '0';
} else {
    while ($row = mysqli_fetch_assoc($come)) {
        $come_feb = $row["total"];
    }
}

// month march
$month = 3;
$come = mysqli_query($konek, "SELECT COUNT(tgl_datang) AS total, EXTRACT(MONTH FROM tgl_datang) AS month FROM tb_sample WHERE YEAR(tgl_datang)=YEAR(CURDATE()) AND MONTH(tgl_datang)='$month' GROUP BY month");
if (mysqli_num_rows($come) == 0) {
    $come_march = '0';
} else {
    while ($row = mysqli_fetch_assoc($come)) {
        $come_march = $row["total"];
    }
}

// month april
$month = 4;
$come = mysqli_query($konek, "SELECT COUNT(tgl_datang) AS total, EXTRACT(MONTH FROM tgl_datang) AS month FROM tb_sample WHERE YEAR(tgl_datang)=YEAR(CURDATE()) AND MONTH(tgl_datang)='$month' GROUP BY month");
if (mysqli_num_rows($come) == 0) {
    $come_april = '0';
} else {
    while ($row = mysqli_fetch_assoc($come)) {
        $come_april = $row["total"];
    }
}

// month may
$month = 5;
$come = mysqli_query($konek, "SELECT COUNT(tgl_datang) AS total, EXTRACT(MONTH FROM tgl_datang) AS month FROM tb_sample WHERE YEAR(tgl_datang)=YEAR(CURDATE()) AND MONTH(tgl_datang)='$month' GROUP BY month");
if (mysqli_num_rows($come) == 0) {
    $come_may = '0';
} else {
    while ($row = mysqli_fetch_assoc($come)) {
        $come_may = $row["total"];
    }
}

// month june
$month = 6;
$come = mysqli_query($konek, "SELECT COUNT(tgl_datang) AS total, EXTRACT(MONTH FROM tgl_datang) AS month FROM tb_sample WHERE YEAR(tgl_datang)=YEAR(CURDATE()) AND MONTH(tgl_datang)='$month' GROUP BY month");
if (mysqli_num_rows($come) == 0) {
    $come_june = '0';
} else {
    while ($row = mysqli_fetch_assoc($come)) {
        $come_june = $row["total"];
    }
}

// month july
$month = 7;
$come = mysqli_query($konek, "SELECT COUNT(tgl_datang) AS total, EXTRACT(MONTH FROM tgl_datang) AS month FROM tb_sample WHERE YEAR(tgl_datang)=YEAR(CURDATE()) AND MONTH(tgl_datang)='$month' GROUP BY month");
if (mysqli_num_rows($come) == 0) {
    $come_july = '0';
} else {
    while ($row = mysqli_fetch_assoc($come)) {
        $come_july = $row["total"];
    }
}

// month august
$month = 8;
$come = mysqli_query($konek, "SELECT COUNT(tgl_datang) AS total, EXTRACT(MONTH FROM tgl_datang) AS month FROM tb_sample WHERE YEAR(tgl_datang)=YEAR(CURDATE()) AND MONTH(tgl_datang)='$month' GROUP BY month");
if (mysqli_num_rows($come) == 0) {
    $come_august = '0';
} else {
    while ($row = mysqli_fetch_assoc($come)) {
        $come_august = $row["total"];
    }
}

// month sept
$month = 9;
$come = mysqli_query($konek, "SELECT COUNT(tgl_datang) AS total, EXTRACT(MONTH FROM tgl_datang) AS month FROM tb_sample WHERE YEAR(tgl_datang)=YEAR(CURDATE()) AND MONTH(tgl_datang)='$month' GROUP BY month");
if (mysqli_num_rows($come) == 0) {
    $come_sept = '0';
} else {
    while ($row = mysqli_fetch_assoc($come)) {
        $come_sept = $row["total"];
    }
}

// month oct
$month = 10;
$come = mysqli_query($konek, "SELECT COUNT(tgl_datang) AS total, EXTRACT(MONTH FROM tgl_datang) AS month FROM tb_sample WHERE YEAR(tgl_datang)=YEAR(CURDATE()) AND MONTH(tgl_datang)='$month' GROUP BY month");
if (mysqli_num_rows($come) == 0) {
    $come_oct = '0';
} else {
    while ($row = mysqli_fetch_assoc($come)) {
        $come_oct = $row["total"];
    }
}

// month nov
$month = 11;
$come = mysqli_query($konek, "SELECT COUNT(tgl_datang) AS total, EXTRACT(MONTH FROM tgl_datang) AS month FROM tb_sample WHERE YEAR(tgl_datang)=YEAR(CURDATE()) AND MONTH(tgl_datang)='$month' GROUP BY month");
if (mysqli_num_rows($come) == 0) {
    $come_nov = '0';
} else {
    while ($row = mysqli_fetch_assoc($come)) {
        $come_nov = $row["total"];
    }
}

// month dec
$month = 12;
$come = mysqli_query($konek, "SELECT COUNT(tgl_datang) AS total, EXTRACT(MONTH FROM tgl_datang) AS month FROM tb_sample WHERE YEAR(tgl_datang)=YEAR(CURDATE()) AND MONTH(tgl_datang)='$month' GROUP BY month");
if (mysqli_num_rows($come) == 0) {
    $come_dec = '0';
} else {
    while ($row = mysqli_fetch_assoc($come)) {
        $come_dec = $row["total"];
    }
}

// end sample come 

// date take sample
// year -1 take sample
$take = mysqli_query($konek, "SELECT COUNT(date_take) AS total FROM tb_sample WHERE YEAR(date_take)='$year1'");
if (mysqli_num_rows($take) == 0) {
    $take_year1 = '0';
} else {
    while ($row = mysqli_fetch_assoc($take)) {
        $take_year1 = $row["total"];
    }
}

// year -2 come sample
$take = mysqli_query($konek, "SELECT COUNT(date_take) AS total FROM tb_sample WHERE YEAR(date_take)='$year2'");
if (mysqli_num_rows($take) == 0) {
    $take_year2 = '0';
} else {
    while ($row = mysqli_fetch_assoc($take)) {
        $take_year2 = $row["total"];
    }
}

// month jan
$month = 1;
$take = mysqli_query($konek, "SELECT COUNT(date_take) AS total, EXTRACT(MONTH FROM date_take) AS month FROM tb_sample WHERE YEAR(date_take)=YEAR(CURDATE()) AND MONTH(date_take)='$month' GROUP BY month");
if (mysqli_num_rows($take) == 0) {
    $take_jan = '0';
} else {
    while ($row = mysqli_fetch_assoc($take)) {
        $take_jan = $row["total"];
    }
}

// month feb
$month = 2;
$take = mysqli_query($konek, "SELECT COUNT(date_take) AS total, EXTRACT(MONTH FROM date_take) AS month FROM tb_sample WHERE YEAR(date_take)=YEAR(CURDATE()) AND MONTH(date_take)='$month' GROUP BY month");
if (mysqli_num_rows($take) == 0) {
    $take_feb = '0';
} else {
    while ($row = mysqli_fetch_assoc($take)) {
        $take_feb = $row["total"];
    }
}

// month march
$month = 3;
$take = mysqli_query($konek, "SELECT COUNT(date_take) AS total, EXTRACT(MONTH FROM date_take) AS month FROM tb_sample WHERE YEAR(date_take)=YEAR(CURDATE()) AND MONTH(date_take)='$month' GROUP BY month");
if (mysqli_num_rows($take) == 0) {
    $take_march = '0';
} else {
    while ($row = mysqli_fetch_assoc($take)) {
        $take_march = $row["total"];
    }
}

// month april
$month = 4;
$take = mysqli_query($konek, "SELECT COUNT(date_take) AS total, EXTRACT(MONTH FROM date_take) AS month FROM tb_sample WHERE YEAR(date_take)=YEAR(CURDATE()) AND MONTH(date_take)='$month' GROUP BY month");
if (mysqli_num_rows($take) == 0) {
    $take_april = '0';
} else {
    while ($row = mysqli_fetch_assoc($take)) {
        $take_april = $row["total"];
    }
}

// month may
$month = 5;
$take = mysqli_query($konek, "SELECT COUNT(date_take) AS total, EXTRACT(MONTH FROM date_take) AS month FROM tb_sample WHERE YEAR(date_take)=YEAR(CURDATE()) AND MONTH(date_take)='$month' GROUP BY month");
if (mysqli_num_rows($take) == 0) {
    $take_may = '0';
} else {
    while ($row = mysqli_fetch_assoc($take)) {
        $take_may = $row["total"];
    }
}

// month june
$month = 6;
$take = mysqli_query($konek, "SELECT COUNT(date_take) AS total, EXTRACT(MONTH FROM date_take) AS month FROM tb_sample WHERE YEAR(date_take)=YEAR(CURDATE()) AND MONTH(date_take)='$month' GROUP BY month");
if (mysqli_num_rows($take) == 0) {
    $take_june = '0';
} else {
    while ($row = mysqli_fetch_assoc($take)) {
        $take_june = $row["total"];
    }
}

// month july
$month = 7;
$take = mysqli_query($konek, "SELECT COUNT(date_take) AS total, EXTRACT(MONTH FROM date_take) AS month FROM tb_sample WHERE YEAR(date_take)=YEAR(CURDATE()) AND MONTH(date_take)='$month' GROUP BY month");
if (mysqli_num_rows($take) == 0) {
    $take_july = '0';
} else {
    while ($row = mysqli_fetch_assoc($take)) {
        $take_july = $row["total"];
    }
}

// month august
$month = 8;
$take = mysqli_query($konek, "SELECT COUNT(date_take) AS total, EXTRACT(MONTH FROM date_take) AS month FROM tb_sample WHERE YEAR(date_take)=YEAR(CURDATE()) AND MONTH(date_take)='$month' GROUP BY month");
if (mysqli_num_rows($take) == 0) {
    $take_august = '0';
} else {
    while ($row = mysqli_fetch_assoc($take)) {
        $take_august = $row["total"];
    }
}

// month sept
$month = 9;
$take = mysqli_query($konek, "SELECT COUNT(date_take) AS total, EXTRACT(MONTH FROM date_take) AS month FROM tb_sample WHERE YEAR(date_take)=YEAR(CURDATE()) AND MONTH(date_take)='$month' GROUP BY month");
if (mysqli_num_rows($take) == 0) {
    $take_sept = '0';
} else {
    while ($row = mysqli_fetch_assoc($take)) {
        $take_sept = $row["total"];
    }
}

// month oct
$month = 10;
$take = mysqli_query($konek, "SELECT COUNT(date_take) AS total, EXTRACT(MONTH FROM date_take) AS month FROM tb_sample WHERE YEAR(date_take)=YEAR(CURDATE()) AND MONTH(date_take)='$month' GROUP BY month");
if (mysqli_num_rows($take) == 0) {
    $take_oct = '0';
} else {
    while ($row = mysqli_fetch_assoc($take)) {
        $take_oct = $row["total"];
    }
}

// month nov
$month = 11;
$take = mysqli_query($konek, "SELECT COUNT(date_take) AS total, EXTRACT(MONTH FROM date_take) AS month FROM tb_sample WHERE YEAR(date_take)=YEAR(CURDATE()) AND MONTH(date_take)='$month' GROUP BY month");
if (mysqli_num_rows($take) == 0) {
    $take_nov = '0';
} else {
    while ($row = mysqli_fetch_assoc($take)) {
        $take_nov = $row["total"];
    }
}

// month dec
$month = 12;
$take = mysqli_query($konek, "SELECT COUNT(date_take) AS total, EXTRACT(MONTH FROM date_take) AS month FROM tb_sample WHERE YEAR(date_take)=YEAR(CURDATE()) AND MONTH(date_take)='$month' GROUP BY month");
if (mysqli_num_rows($take) == 0) {
    $take_dec = '0';
} else {
    while ($row = mysqli_fetch_assoc($take)) {
        $take_dec = $row["total"];
    }
}

// end sample take date 

// date return sample
// year -1 return sample
$take = mysqli_query($konek, "SELECT COUNT(date_return) AS total FROM tb_sample WHERE YEAR(date_return)='$year1'");
if (mysqli_num_rows($take) == 0) {
    $take_year1 = '0';
} else {
    while ($row = mysqli_fetch_assoc($take)) {
        $take_year1 = $row["total"];
    }
}

// year -2 return sample
$take = mysqli_query($konek, "SELECT COUNT(date_return) AS total FROM tb_sample WHERE YEAR(date_return)='$year2'");
if (mysqli_num_rows($take) == 0) {
    $take_year2 = '0';
} else {
    while ($row = mysqli_fetch_assoc($take)) {
        $take_year2 = $row["total"];
    }
}

// month jan
$month = 1;
$return = mysqli_query($konek, "SELECT COUNT(date_return) AS total, EXTRACT(MONTH FROM date_return) AS month FROM tb_sample WHERE YEAR(date_return)=YEAR(CURDATE()) AND MONTH(date_return)='$month' GROUP BY month");
if (mysqli_num_rows($return) == 0) {
    $return_jan = '0';
} else {
    while ($row = mysqli_fetch_assoc($return)) {
        $return_jan = $row["total"];
    }
}

// month feb
$month = 2;
$return = mysqli_query($konek, "SELECT COUNT(date_return) AS total, EXTRACT(MONTH FROM date_return) AS month FROM tb_sample WHERE YEAR(date_return)=YEAR(CURDATE()) AND MONTH(date_return)='$month' GROUP BY month");
if (mysqli_num_rows($return) == 0) {
    $return_feb = '0';
} else {
    while ($row = mysqli_fetch_assoc($return)) {
        $return_feb = $row["total"];
    }
}

// month march
$month = 3;
$return = mysqli_query($konek, "SELECT COUNT(date_return) AS total, EXTRACT(MONTH FROM date_return) AS month FROM tb_sample WHERE YEAR(date_return)=YEAR(CURDATE()) AND MONTH(date_return)='$month' GROUP BY month");
if (mysqli_num_rows($return) == 0) {
    $return_march = '0';
} else {
    while ($row = mysqli_fetch_assoc($return)) {
        $return_march = $row["total"];
    }
}

// month april
$month = 4;
$return = mysqli_query($konek, "SELECT COUNT(date_return) AS total, EXTRACT(MONTH FROM date_return) AS month FROM tb_sample WHERE YEAR(date_return)=YEAR(CURDATE()) AND MONTH(date_return)='$month' GROUP BY month");
if (mysqli_num_rows($return) == 0) {
    $return_april = '0';
} else {
    while ($row = mysqli_fetch_assoc($return)) {
        $return_april = $row["total"];
    }
}

// month may
$month = 5;
$return = mysqli_query($konek, "SELECT COUNT(date_return) AS total, EXTRACT(MONTH FROM date_return) AS month FROM tb_sample WHERE YEAR(date_return)=YEAR(CURDATE()) AND MONTH(date_return)='$month' GROUP BY month");
if (mysqli_num_rows($return) == 0) {
    $return_may = '0';
} else {
    while ($row = mysqli_fetch_assoc($return)) {
        $return_may = $row["total"];
    }
}

// month june
$month = 6;
$return = mysqli_query($konek, "SELECT COUNT(date_return) AS total, EXTRACT(MONTH FROM date_return) AS month FROM tb_sample WHERE YEAR(date_return)=YEAR(CURDATE()) AND MONTH(date_return)='$month' GROUP BY month");
if (mysqli_num_rows($return) == 0) {
    $return_june = '0';
} else {
    while ($row = mysqli_fetch_assoc($return)) {
        $return_june = $row["total"];
    }
}

// month july
$month = 7;
$return = mysqli_query($konek, "SELECT COUNT(date_return) AS total, EXTRACT(MONTH FROM date_return) AS month FROM tb_sample WHERE YEAR(date_return)=YEAR(CURDATE()) AND MONTH(date_return)='$month' GROUP BY month");
if (mysqli_num_rows($return) == 0) {
    $return_july = '0';
} else {
    while ($row = mysqli_fetch_assoc($return)) {
        $return_july = $row["total"];
    }
}

// month august
$month = 8;
$return = mysqli_query($konek, "SELECT COUNT(date_return) AS total, EXTRACT(MONTH FROM date_return) AS month FROM tb_sample WHERE YEAR(date_return)=YEAR(CURDATE()) AND MONTH(date_return)='$month' GROUP BY month");
if (mysqli_num_rows($return) == 0) {
    $return_august = '0';
} else {
    while ($row = mysqli_fetch_assoc($return)) {
        $return_august = $row["total"];
    }
}

// month sept
$month = 9;
$return = mysqli_query($konek, "SELECT COUNT(date_return) AS total, EXTRACT(MONTH FROM date_return) AS month FROM tb_sample WHERE YEAR(date_return)=YEAR(CURDATE()) AND MONTH(date_return)='$month' GROUP BY month");
if (mysqli_num_rows($return) == 0) {
    $return_sept = '0';
} else {
    while ($row = mysqli_fetch_assoc($return)) {
        $return_sept = $row["total"];
    }
}

// month oct
$month = 10;
$return = mysqli_query($konek, "SELECT COUNT(date_return) AS total, EXTRACT(MONTH FROM date_return) AS month FROM tb_sample WHERE YEAR(date_return)=YEAR(CURDATE()) AND MONTH(date_return)='$month' GROUP BY month");
if (mysqli_num_rows($return) == 0) {
    $return_oct = '0';
} else {
    while ($row = mysqli_fetch_assoc($return)) {
        $return_oct = $row["total"];
    }
}

// month nov
$month = 11;
$return = mysqli_query($konek, "SELECT COUNT(date_return) AS total, EXTRACT(MONTH FROM date_return) AS month FROM tb_sample WHERE YEAR(date_return)=YEAR(CURDATE()) AND MONTH(date_return)='$month' GROUP BY month");
if (mysqli_num_rows($return) == 0) {
    $return_nov = '0';
} else {
    while ($row = mysqli_fetch_assoc($return)) {
        $return_nov = $row["total"];
    }
}

// month dec
$month = 12;
$return = mysqli_query($konek, "SELECT COUNT(date_return) AS total, EXTRACT(MONTH FROM date_return) AS month FROM tb_sample WHERE YEAR(date_return)=YEAR(CURDATE()) AND MONTH(date_return)='$month' GROUP BY month");
if (mysqli_num_rows($return) == 0) {
    $return_dec = '0';
} else {
    while ($row = mysqli_fetch_assoc($return)) {
        $return_dec = $row["total"];
    }
}

// end sample return date 


$dataPoints1 = array(
    array("label" => "$year2", "y" => 46),
    array("label" => "$year1", "y" => 35),
    array("label" => "January", "y" => $come_jan),
    array("label" => "February", "y" => $come_feb),
    array("label" => "March", "y" => $come_march),
    array("label" => "April", "y" => $come_april),
    array("label" => "May", "y" => $come_may),
    array("label" => "June", "y" => $come_june),
    array("label" => "July", "y" => $come_july),
    array("label" => "August", "y" => $come_august),
    array("label" => "September", "y" => $come_sept),
    array("label" => "October", "y" => $come_oct),
    array("label" => "November", "y" => $come_nov),
    array("label" => "December", "y" => $come_dec)
);
$dataPoints2 = array(
    array("label" => "$year2", "y" => 40),
    array("label" => "$year1", "y" => 29),
    array("label" => "January", "y" => $take_jan),
    array("label" => "February", "y" => $take_feb),
    array("label" => "March", "y" => $take_march),
    array("label" => "April", "y" => $take_april),
    array("label" => "May", "y" => $take_may),
    array("label" => "June", "y" => $take_june),
    array("label" => "July", "y" => $take_july),
    array("label" => "August", "y" => $take_august),
    array("label" => "September", "y" => $take_sept),
    array("label" => "October", "y" => $take_oct),
    array("label" => "November", "y" => $take_nov),
    array("label" => "December", "y" => $take_dec)
);

$dataPoints3 = array(
    array("label" => "$year2", "y" => 50),
    array("label" => "$year1", "y" => 39),
    array("label" => "January", "y" => $return_jan),
    array("label" => "February", "y" => $return_feb),
    array("label" => "March", "y" => $return_march),
    array("label" => "April", "y" => $return_april),
    array("label" => "May", "y" => $return_may),
    array("label" => "June", "y" => $return_june),
    array("label" => "July", "y" => $return_july),
    array("label" => "August", "y" => $return_august),
    array("label" => "September", "y" => $return_sept),
    array("label" => "October", "y" => $return_oct),
    array("label" => "November", "y" => $return_nov),
    array("label" => "December", "y" => $return_dec)
);
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- data table -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" />
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
            <span class="text">Dashboard</span>
            <span class="notif">
                <div class="icon" id="bell"> <i class="fa fa-bell fa-2xl"></i><span
                        class="badge rounded-pill badge-notification bg-danger mt-1">9</span></div>
                <div class="notifications" id="box">
                    <h2>Notifications - <span>2</span></h2>
                    <div class="notifications-item">
                        <div class="text">
                            <h4>Samso aliao</h4>
                            <p>Samso Nagaro Like your home work</p>
                        </div>
                    </div>
                    <div class="notifications-item">
                        <div class="text">
                            <h4>John Silvester</h4>
                            <p>+20 vista badge earned</p>
                        </div>
                    </div>
                </div>
            </span>
        </div>

        <div class="container cont-dash">
            <div class="row ms-3 cont-dash2">
                <div class="col-md-4 pt-3">
                    <div class="card-dash">
                        <div class="block-content">
                            <p class="teks-light">Sample Pending</p>
                            <div class="value-light">
                                <p class="fill">$0</p>
                            </div>
                            <div class="note">Pcs</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 pt-3">
                    <div class="card-dash-2">
                        <div class="block-content">
                            <p class="teks-light">Sample On Track</p>
                            <div class="value-light">
                                <p class="fill">$</p>
                            </div>
                            <div class="note">Pcs</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 pt-3">
                    <div class="card-dash-3">
                        <div class="block-content">
                            <p class="teks-light">Total Sample</p>
                            <div class="value-light">
                                <p class="fill">$</p>
                            </div>
                            <div class="note">Pcs</div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            if (isset($errorafter)): ?>
                <div id="myAlert" class="alert alert-danger alert-dismissible fade show ms-4 mt-4">
                    Add action after failed!
                    <button type="button" id="myBtn" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                <?php
            endif;
            ?>
            <div class="row pb-4 ps-4 mt-4 nav-tab">
                <div class="col-md-12">
                    <nav>
                        <div class="nav nav-tabs mb-3 justify-content-end me-3 text-dark" id="nav-tab" role="tablist">
                            <button class="nav-link active pe-1" id="nav-tracking-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-tracking" type="button" role="tab" aria-controls="nav-tracking"
                                aria-selected="true"><strong>TRACKING</strong>
                                <span class="badge rounded-pill badge-notification bg-danger">9</span></button>
                            <button class="nav-link pe-1" id="nav-scrap-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-scrap" type="button" role="tab" aria-controls="nav-scrap"
                                aria-selected="false"><strong>SCRAP</strong>
                                <span class="badge rounded-pill badge-notification bg-danger">5</span></button>
                            <button class="nav-link pe-1" id="nav-return-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-return" type="button" role="tab" aria-controls="nav-return"
                                aria-selected="false"><strong>RETURN</strong>
                                <span class="badge rounded-pill badge-notification bg-danger">2</span></button>
                            <button class="nav-link pe-1" id="nav-exp-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-exp" type="button" role="tab" aria-controls="nav-exp"
                                aria-selected="false"><strong>EXP</strong>
                                <span class="badge rounded-pill badge-notification bg-danger">10</span></button>
                        </div>
                    </nav>

                    <!-- tab content -->
                    <div class="tab-content p-1 bg-white" id="nav-tabContent">

                        <!-- tracking content -->
                        <div class="tab-pane fade active show" id="nav-tracking" role="tabpanel"
                            aria-labelledby="nav-tracking-tab">
                            <div class="card-dash-body">

                                <div class="table-responsive">
                                    <div id="pending-table" style="color: black !important;">
                                        <table id="tabel-data" class="table table-bordered align-middle text-center">
                                            <thead class="table-secondary">
                                                <tr>
                                                    <th scope="col">Tracking</th>
                                                    <th scope="col" hidden>Timestamp</th>
                                                    <th scope="col">After</th>
                                                </tr>
                                            </thead>
                                            <?php $i = 1; ?>
                                            <?php foreach ($sample as $data): ?>
                                                <tr>
                                                    <td class="track-column">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="tag pt-3 ps-5">
                                                                    <h2>
                                                                        <?= $data["sample_test"]; ?>
                                                                    </h2>
                                                                    <h6>
                                                                        <?= $data["nm_sample"]; ?>
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9 track-graph">
                                                                <?php

                                                                $id_loc = $data["id_loc"];
                                                                if ($id_loc == 1) {
                                                                    $loc = "Sample Before Test";
                                                                } elseif ($id_loc == 2) {
                                                                    $loc = "Lab";
                                                                } elseif ($id_loc == 3) {
                                                                    $loc = "Sample After Test";
                                                                } elseif ($id_loc == 4) {
                                                                    $loc = "Finish";
                                                                } else {
                                                                    $loc = "";
                                                                }
                                                                if ($loc == "Sample Before Test"): ?>
                                                                    <ul class="bars mt-2">
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
                                                                            <p class="text">Lab</p>
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
                                                                            <p class="text">Finish</p>
                                                                        </li>
                                                                    </ul>
                                                                <?php elseif ($loc == "Lab"): ?>
                                                                    <ul class="bars mt-2">
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
                                                                            <p class="text">Lab</p>
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
                                                                            <p class="text">Finish</p>
                                                                        </li>
                                                                    </ul>
                                                                <?php elseif ($loc == "Sample After Test"): ?>
                                                                    <ul class="bars mt-2">
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
                                                                            <p class="text">Lab</p>
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
                                                                            <p class="text">Finish</p>
                                                                        </li>
                                                                    </ul>
                                                                <?php elseif ($loc == "Finish"): ?>
                                                                    <ul class="bars mt-2">
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
                                                                            <p class="text">Lab</p>
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
                                                                            <p class="text">Finish</p>
                                                                        </li>
                                                                    </ul>
                                                                <?php else: ?>
                                                                    <ul class="bars mt-2">
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
                                                                            <p class="text">Lab</p>
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
                                                                            <p class="text">Finish</p>
                                                                        </li>
                                                                    </ul>
                                                                    <?php
                                                                endif; ?>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td hidden>
                                                        <?= $data["time_stamp"]; ?>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-danger btn-sm dropdown-toggle" role="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            After Test
                                                        </button>

                                                        <ul class="nav-links dropdown-menu">
                                                            <li><a class="dropdown-item"
                                                                    href="?after_test=scrap&&sample_test=<?= $data["sample_test"]; ?>">Scrap</a>
                                                            </li>
                                                            <li><a class="dropdown-item"
                                                                    href="?after_test=return&&sample_test=<?= $data["sample_test"]; ?>">Return
                                                                    to Customer</a></li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <?php $i++; ?>
                                            <?php endforeach; ?>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- scrap content -->
                        <div class="tab-pane fade show" id="nav-scrap" role="tabpanel" aria-labelledby="nav-scrap-tab">
                            <div class="card-dash-body">
                                <div class="table-responsive text-dark">
                                    <table id="tabel-scrap" class="table table-bordered text-center align-middle">
                                        <thead class="table-secondary">
                                            <tr>
                                                <th scope="col">Tracking</th>
                                                <th scope="col">Timestamp</th>
                                                <th scope="col">After</th>
                                            </tr>
                                        </thead>
                                        <?php $i = 1; ?>
                                        <?php foreach ($sample_scrap as $data): ?>
                                            <tr>
                                                <td class="track-column">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="tag pt-3 ps-5">
                                                                <h2>
                                                                    <?= $data["sample_test"]; ?>
                                                                </h2>
                                                                <h6>
                                                                    <?= $data["nm_sample"]; ?>
                                                                </h6>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9 track-graph">
                                                            <?php

                                                            $id_loc = $data["id_loc"];
                                                            if ($id_loc == 1) {
                                                                $loc = "Sample Before Test";
                                                            } elseif ($id_loc == 2) {
                                                                $loc = "Lab";
                                                            } elseif ($id_loc == 3) {
                                                                $loc = "Sample After Test";
                                                            } elseif ($id_loc == 4) {
                                                                $loc = "Finish";
                                                            } else {
                                                                $loc = "";
                                                            }
                                                            if ($loc == "Sample Before Test"): ?>
                                                                <ul class="bars mt-2">
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
                                                                        <p class="text">Lab</p>
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
                                                                        <p class="text">Finish</p>
                                                                    </li>
                                                                </ul>
                                                            <?php elseif ($loc == "Lab"): ?>
                                                                <ul class="bars mt-2">
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
                                                                        <p class="text">Lab</p>
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
                                                                        <p class="text">Finish</p>
                                                                    </li>
                                                                </ul>
                                                            <?php elseif ($loc == "Sample After Test"): ?>
                                                                <ul class="bars mt-2">
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
                                                                        <p class="text">Lab</p>
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
                                                                        <p class="text">Finish</p>
                                                                    </li>
                                                                </ul>
                                                            <?php elseif ($loc == "Finish"): ?>
                                                                <ul class="bars mt-2">
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
                                                                        <p class="text">Lab</p>
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
                                                                        <p class="text">Finish</p>
                                                                    </li>
                                                                </ul>
                                                            <?php else: ?>
                                                                <ul class="bars mt-2">
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
                                                                        <p class="text">Lab</p>
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
                                                                        <p class="text">Finish</p>
                                                                    </li>
                                                                </ul>
                                                                <?php
                                                            endif; ?>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <?= $data["time_stamp"]; ?>
                                                </td>
                                                <td>
                                                    <button class="btn btn-danger btn-sm dropdown-toggle" role="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        After Test
                                                    </button>

                                                    <ul class="nav-links dropdown-menu">
                                                        <li><a class="dropdown-item"
                                                                href="?after_test=scrap&&sample_test=<?= $data["sample_test"]; ?>">Scrap</a>
                                                        </li>
                                                        <li><a class="dropdown-item"
                                                                href="?after_test=return&&sample_test=<?= $data["sample_test"]; ?>">Return
                                                                to Customer</a></li>
                                                    </ul>
                                                </td>
                                            </tr>

                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- return tab content -->
                        <div class="tab-pane fade show" id="nav-return" role="tabpanel"
                            aria-labelledby="nav-return-tab">
                            <div class="card-dash-body">
                                <div class="table-responsive text-dark">
                                    <table id="tabel-return" class="table table-bordered text-center align-middle">
                                        <thead class="table-secondary">
                                            <tr>
                                                <th scope="col">Tracking</th>
                                                <th scope="col">Timestamp</th>
                                                <th scope="col">After</th>
                                            </tr>
                                        </thead>
                                        <?php $i = 1; ?>
                                        <?php foreach ($sample_return as $data): ?>
                                            <tr>
                                                <td class="track-column">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="tag pt-3 ps-5">
                                                                <h2>
                                                                    <?= $data["sample_test"]; ?>
                                                                </h2>
                                                                <h6>
                                                                    <?= $data["nm_sample"]; ?>
                                                                </h6>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9 track-graph">
                                                            <?php

                                                            $id_loc = $data["id_loc"];
                                                            if ($id_loc == 1) {
                                                                $loc = "Sample Before Test";
                                                            } elseif ($id_loc == 2) {
                                                                $loc = "Lab";
                                                            } elseif ($id_loc == 3) {
                                                                $loc = "Sample After Test";
                                                            } elseif ($id_loc == 4) {
                                                                $loc = "Finish";
                                                            } else {
                                                                $loc = "";
                                                            }
                                                            if ($loc == "Sample Before Test"): ?>
                                                                <ul class="bars mt-2">
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
                                                                        <p class="text">Lab</p>
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
                                                                        <p class="text">Finish</p>
                                                                    </li>
                                                                </ul>
                                                            <?php elseif ($loc == "Lab"): ?>
                                                                <ul class="bars mt-2">
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
                                                                        <p class="text">Lab</p>
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
                                                                        <p class="text">Finish</p>
                                                                    </li>
                                                                </ul>
                                                            <?php elseif ($loc == "Sample After Test"): ?>
                                                                <ul class="bars mt-2">
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
                                                                        <p class="text">Lab</p>
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
                                                                        <p class="text">Finish</p>
                                                                    </li>
                                                                </ul>
                                                            <?php elseif ($loc == "Finish"): ?>
                                                                <ul class="bars mt-2">
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
                                                                        <p class="text">Lab</p>
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
                                                                        <p class="text">Finish</p>
                                                                    </li>
                                                                </ul>
                                                            <?php else: ?>
                                                                <ul class="bars mt-2">
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
                                                                        <p class="text">Lab</p>
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
                                                                        <p class="text">Finish</p>
                                                                    </li>
                                                                </ul>
                                                                <?php
                                                            endif; ?>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <?= $data["time_stamp"]; ?>
                                                </td>
                                                <td>
                                                    <button class="btn btn-danger btn-sm dropdown-toggle" role="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        After Test
                                                    </button>

                                                    <ul class="nav-links dropdown-menu">
                                                        <li><a class="dropdown-item"
                                                                href="?after_test=scrap&&sample_test=<?= $data["sample_test"]; ?>">Scrap</a>
                                                        </li>
                                                        <li><a class="dropdown-item"
                                                                href="?after_test=return&&sample_test=<?= $data["sample_test"]; ?>">Return
                                                                to Customer</a></li>
                                                    </ul>
                                                </td>
                                            </tr>

                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end tab content -->

                </div>
            </div>

            <div class="row cont-dash2 pe-1 pb-4">
                <div class="col-md-12">
                    <div class="card-dash-body">
                        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                    </div>
                </div>
            </div>

        </div>

        </div>

    </section>

    <script>
        $(document).ready(function () {
            $('#tabel-data').DataTable();
        });

        $('#tabel-data').dataTable({
            "pageLength": 2
        });

        var table = $('#tabel-data').DataTable();

        table
            .order([1, 'desc'])
            .draw();

        $(document).ready(function () {
            $('#tabel-scrap').DataTable();
        });

        $('#tabel-scrap').dataTable({
            "pageLength": 2
        });

        var table = $('#tabel-scrap').DataTable();

        table
            .order([1, 'desc'])
            .draw();

        $(document).ready(function () {
            $('#tabel-return').DataTable();
        });

        $('#tabel-return').dataTable({
            "pageLength": 2
        });

        var table = $('#tabel-return').DataTable();

        table
            .order([1, 'desc'])
            .draw();

        $(document).ready(function () {

            var down = false;

            $('#bell').click(function (e) {

                var color = $(this).text();
                if (down) {

                    $('#box').css('height', '0px');
                    $('#box').css('opacity', '0');
                    down = false;
                } else {

                    $('#box').css('height', 'auto');
                    $('#box').css('opacity', '1');
                    down = true;

                }

            });

        });

        window.onload = function () {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "Sample Count AOP EDC"
                },
                axisY: {
                    includeZero: true
                },
                legend: {
                    cursor: "pointer",
                    verticalAlign: "center",
                    horizontalAlign: "right",
                    itemclick: toggleDataSeries
                },
                data: [{
                    type: "column",
                    color: "#00b4d8",
                    name: "Sample Before Test",
                    indexLabel: "{y}",
                    yValueFormatString: "#0.##",
                    showInLegend: true,
                    dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
                }, {
                    type: "column",
                    color: "#ffc300",
                    name: "Sample On Tracking",
                    indexLabel: "{y}",
                    yValueFormatString: "#0.##",
                    showInLegend: true,
                    dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
                }, {
                    type: "column",
                    color: "#06d6a0",
                    name: "Sample After Test",
                    indexLabel: "{y}",
                    yValueFormatString: "#0.##",
                    showInLegend: true,
                    dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
                }
                ]
            });
            chart.render();

            function toggleDataSeries(e) {
                if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                    e.dataSeries.visible = false;
                }
                else {
                    e.dataSeries.visible = true;
                }
                chart.render();
            }

        }
    </script>

    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    <script src="js/script-track.js"></script>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>

</html>