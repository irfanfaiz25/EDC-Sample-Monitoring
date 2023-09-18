<?php
include_once 'fungsi.php';

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
$come = mysqli_query($konek, "SELECT COUNT(sample_test) AS total, EXTRACT(MONTH FROM tgl_datang) AS month FROM tb_sample
WHERE id_loc=0 AND YEAR(tgl_datang)=YEAR(CURDATE()) AND MONTH(tgl_datang)='$month'");
if (mysqli_num_rows($come) == 0) {
    $come_jan = '0';
} else {
    while ($row = mysqli_fetch_assoc($come)) {
        $come_jan = $row["total"];
    }
}

// month feb
$month = 2;
$come = mysqli_query($konek, "SELECT COUNT(sample_test) AS total, EXTRACT(MONTH FROM tgl_datang) AS month FROM tb_sample
WHERE id_loc=0 AND YEAR(tgl_datang)=YEAR(CURDATE()) AND MONTH(tgl_datang)='$month'");
if (mysqli_num_rows($come) == 0) {
    $come_feb = '0';
} else {
    while ($row = mysqli_fetch_assoc($come)) {
        $come_feb = $row["total"];
    }
}

// month march
$month = 3;
$come = mysqli_query($konek, "SELECT COUNT(sample_test) AS total, EXTRACT(MONTH FROM tgl_datang) AS month FROM tb_sample
WHERE id_loc=0 AND YEAR(tgl_datang)=YEAR(CURDATE()) AND MONTH(tgl_datang)='$month'");
if (mysqli_num_rows($come) == 0) {
    $come_march = '0';
} else {
    while ($row = mysqli_fetch_assoc($come)) {
        $come_march = $row["total"];
    }
}

// month april
$month = 4;
$come = mysqli_query($konek, "SELECT COUNT(sample_test) AS total, EXTRACT(MONTH FROM tgl_datang) AS month FROM tb_sample
WHERE id_loc=0 AND YEAR(tgl_datang)=YEAR(CURDATE()) AND MONTH(tgl_datang)='$month'");
if (mysqli_num_rows($come) == 0) {
    $come_april = '0';
} else {
    while ($row = mysqli_fetch_assoc($come)) {
        $come_april = $row["total"];
    }
}

// month may
$month = 5;
$come = mysqli_query($konek, "SELECT COUNT(sample_test) AS total, EXTRACT(MONTH FROM tgl_datang) AS month FROM tb_sample
WHERE id_loc=0 AND YEAR(tgl_datang)=YEAR(CURDATE()) AND MONTH(tgl_datang)='$month'");
if (mysqli_num_rows($come) == 0) {
    $come_may = '0';
} else {
    while ($row = mysqli_fetch_assoc($come)) {
        $come_may = $row["total"];
    }
}

// month june
$month = 6;
$come = mysqli_query($konek, "SELECT COUNT(sample_test) AS total, EXTRACT(MONTH FROM tgl_datang) AS month FROM tb_sample
WHERE id_loc=0 AND YEAR(tgl_datang)=YEAR(CURDATE()) AND MONTH(tgl_datang)='$month'");
if (mysqli_num_rows($come) == 0) {
    $come_june = '0';
} else {
    while ($row = mysqli_fetch_assoc($come)) {
        $come_june = $row["total"];
    }
}

// month july
$month = 7;
$come = mysqli_query($konek, "SELECT COUNT(sample_test) AS total, EXTRACT(MONTH FROM tgl_datang) AS month FROM tb_sample
WHERE id_loc=0 AND YEAR(tgl_datang)=YEAR(CURDATE()) AND MONTH(tgl_datang)='$month'");
if (mysqli_num_rows($come) == 0) {
    $come_july = '0';
} else {
    while ($row = mysqli_fetch_assoc($come)) {
        $come_july = $row["total"];
    }
}

// month august
$month = 8;
$come = mysqli_query($konek, "SELECT COUNT(sample_test) AS total, EXTRACT(MONTH FROM tgl_datang) AS month FROM tb_sample
WHERE id_loc=0 AND YEAR(tgl_datang)=YEAR(CURDATE()) AND MONTH(tgl_datang)='$month'");
if (mysqli_num_rows($come) == 0) {
    $come_august = '0';
} else {
    while ($row = mysqli_fetch_assoc($come)) {
        $come_august = $row["total"];
    }
}

// month sept
$month = 9;
$come = mysqli_query($konek, "SELECT COUNT(sample_test) AS total, EXTRACT(MONTH FROM tgl_datang) AS month FROM tb_sample
WHERE id_loc=0 AND YEAR(tgl_datang)=YEAR(CURDATE()) AND MONTH(tgl_datang)='$month'");
if (mysqli_num_rows($come) == 0) {
    $come_sept = '0';
} else {
    while ($row = mysqli_fetch_assoc($come)) {
        $come_sept = $row["total"];
    }
}

// month oct
$month = 10;
$come = mysqli_query($konek, "SELECT COUNT(sample_test) AS total, EXTRACT(MONTH FROM tgl_datang) AS month FROM tb_sample
WHERE id_loc=0 AND YEAR(tgl_datang)=YEAR(CURDATE()) AND MONTH(tgl_datang)='$month'");
if (mysqli_num_rows($come) == 0) {
    $come_oct = '0';
} else {
    while ($row = mysqli_fetch_assoc($come)) {
        $come_oct = $row["total"];
    }
}

// month nov
$month = 11;
$come = mysqli_query($konek, "SELECT COUNT(sample_test) AS total, EXTRACT(MONTH FROM tgl_datang) AS month FROM tb_sample
WHERE id_loc=0 AND YEAR(tgl_datang)=YEAR(CURDATE()) AND MONTH(tgl_datang)='$month'");
if (mysqli_num_rows($come) == 0) {
    $come_nov = '0';
} else {
    while ($row = mysqli_fetch_assoc($come)) {
        $come_nov = $row["total"];
    }
}

// month dec
$month = 12;
$come = mysqli_query($konek, "SELECT COUNT(sample_test) AS total, EXTRACT(MONTH FROM tgl_datang) AS month FROM tb_sample
WHERE id_loc=0 AND YEAR(tgl_datang)=YEAR(CURDATE()) AND MONTH(tgl_datang)='$month'");
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
$take = mysqli_query($konek, "SELECT COUNT(date_take) AS total, EXTRACT(MONTH FROM date_take) AS month FROM tb_sample
WHERE YEAR(date_take)=YEAR(CURDATE()) AND MONTH(date_take)='$month' GROUP BY month");
if (mysqli_num_rows($take) == 0) {
    $take_jan = '0';
} else {
    while ($row = mysqli_fetch_assoc($take)) {
        $take_jan = $row["total"];
    }
}

// month feb
$month = 2;
$take = mysqli_query($konek, "SELECT COUNT(date_take) AS total, EXTRACT(MONTH FROM date_take) AS month FROM tb_sample
WHERE YEAR(date_take)=YEAR(CURDATE()) AND MONTH(date_take)='$month' GROUP BY month");
if (mysqli_num_rows($take) == 0) {
    $take_feb = '0';
} else {
    while ($row = mysqli_fetch_assoc($take)) {
        $take_feb = $row["total"];
    }
}

// month march
$month = 3;
$take = mysqli_query($konek, "SELECT COUNT(date_take) AS total, EXTRACT(MONTH FROM date_take) AS month FROM tb_sample
WHERE YEAR(date_take)=YEAR(CURDATE()) AND MONTH(date_take)='$month' GROUP BY month");
if (mysqli_num_rows($take) == 0) {
    $take_march = '0';
} else {
    while ($row = mysqli_fetch_assoc($take)) {
        $take_march = $row["total"];
    }
}

// month april
$month = 4;
$take = mysqli_query($konek, "SELECT COUNT(date_take) AS total, EXTRACT(MONTH FROM date_take) AS month FROM tb_sample
WHERE YEAR(date_take)=YEAR(CURDATE()) AND MONTH(date_take)='$month' GROUP BY month");
if (mysqli_num_rows($take) == 0) {
    $take_april = '0';
} else {
    while ($row = mysqli_fetch_assoc($take)) {
        $take_april = $row["total"];
    }
}

// month may
$month = 5;
$take = mysqli_query($konek, "SELECT COUNT(date_take) AS total, EXTRACT(MONTH FROM date_take) AS month FROM tb_sample
WHERE YEAR(date_take)=YEAR(CURDATE()) AND MONTH(date_take)='$month' GROUP BY month");
if (mysqli_num_rows($take) == 0) {
    $take_may = '0';
} else {
    while ($row = mysqli_fetch_assoc($take)) {
        $take_may = $row["total"];
    }
}

// month june
$month = 6;
$take = mysqli_query($konek, "SELECT COUNT(date_take) AS total, EXTRACT(MONTH FROM date_take) AS month FROM tb_sample
WHERE YEAR(date_take)=YEAR(CURDATE()) AND MONTH(date_take)='$month' GROUP BY month");
if (mysqli_num_rows($take) == 0) {
    $take_june = '0';
} else {
    while ($row = mysqli_fetch_assoc($take)) {
        $take_june = $row["total"];
    }
}

// month july
$month = 7;
$take = mysqli_query($konek, "SELECT COUNT(date_take) AS total, EXTRACT(MONTH FROM date_take) AS month FROM tb_sample
WHERE YEAR(date_take)=YEAR(CURDATE()) AND MONTH(date_take)='$month' GROUP BY month");
if (mysqli_num_rows($take) == 0) {
    $take_july = '0';
} else {
    while ($row = mysqli_fetch_assoc($take)) {
        $take_july = $row["total"];
    }
}

// month august
$month = 8;
$take = mysqli_query($konek, "SELECT COUNT(date_take) AS total, EXTRACT(MONTH FROM date_take) AS month FROM tb_sample
WHERE YEAR(date_take)=YEAR(CURDATE()) AND MONTH(date_take)='$month' GROUP BY month");
if (mysqli_num_rows($take) == 0) {
    $take_august = '0';
} else {
    while ($row = mysqli_fetch_assoc($take)) {
        $take_august = $row["total"];
    }
}

// month sept
$month = 9;
$take = mysqli_query($konek, "SELECT COUNT(date_take) AS total, EXTRACT(MONTH FROM date_take) AS month FROM tb_sample
WHERE YEAR(date_take)=YEAR(CURDATE()) AND MONTH(date_take)='$month' GROUP BY month");
if (mysqli_num_rows($take) == 0) {
    $take_sept = '0';
} else {
    while ($row = mysqli_fetch_assoc($take)) {
        $take_sept = $row["total"];
    }
}

// month oct
$month = 10;
$take = mysqli_query($konek, "SELECT COUNT(date_take) AS total, EXTRACT(MONTH FROM date_take) AS month FROM tb_sample
WHERE YEAR(date_take)=YEAR(CURDATE()) AND MONTH(date_take)='$month' GROUP BY month");
if (mysqli_num_rows($take) == 0) {
    $take_oct = '0';
} else {
    while ($row = mysqli_fetch_assoc($take)) {
        $take_oct = $row["total"];
    }
}

// month nov
$month = 11;
$take = mysqli_query($konek, "SELECT COUNT(date_take) AS total, EXTRACT(MONTH FROM date_take) AS month FROM tb_sample
WHERE YEAR(date_take)=YEAR(CURDATE()) AND MONTH(date_take)='$month' GROUP BY month");
if (mysqli_num_rows($take) == 0) {
    $take_nov = '0';
} else {
    while ($row = mysqli_fetch_assoc($take)) {
        $take_nov = $row["total"];
    }
}

// month dec
$month = 12;
$take = mysqli_query($konek, "SELECT COUNT(date_take) AS total, EXTRACT(MONTH FROM date_take) AS month FROM tb_sample
WHERE YEAR(date_take)=YEAR(CURDATE()) AND MONTH(date_take)='$month' GROUP BY month");
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
$return = mysqli_query($konek, "SELECT COUNT(date_return) AS total, EXTRACT(MONTH FROM date_return) AS month FROM
tb_sample WHERE YEAR(date_return)=YEAR(CURDATE()) AND MONTH(date_return)='$month' GROUP BY month");
if (mysqli_num_rows($return) == 0) {
    $return_jan = '0';
} else {
    while ($row = mysqli_fetch_assoc($return)) {
        $return_jan = $row["total"];
    }
}

// month feb
$month = 2;
$return = mysqli_query($konek, "SELECT COUNT(date_return) AS total, EXTRACT(MONTH FROM date_return) AS month FROM
tb_sample WHERE YEAR(date_return)=YEAR(CURDATE()) AND MONTH(date_return)='$month' GROUP BY month");
if (mysqli_num_rows($return) == 0) {
    $return_feb = '0';
} else {
    while ($row = mysqli_fetch_assoc($return)) {
        $return_feb = $row["total"];
    }
}

// month march
$month = 3;
$return = mysqli_query($konek, "SELECT COUNT(date_return) AS total, EXTRACT(MONTH FROM date_return) AS month FROM
tb_sample WHERE YEAR(date_return)=YEAR(CURDATE()) AND MONTH(date_return)='$month' GROUP BY month");
if (mysqli_num_rows($return) == 0) {
    $return_march = '0';
} else {
    while ($row = mysqli_fetch_assoc($return)) {
        $return_march = $row["total"];
    }
}

// month april
$month = 4;
$return = mysqli_query($konek, "SELECT COUNT(date_return) AS total, EXTRACT(MONTH FROM date_return) AS month FROM
tb_sample WHERE YEAR(date_return)=YEAR(CURDATE()) AND MONTH(date_return)='$month' GROUP BY month");
if (mysqli_num_rows($return) == 0) {
    $return_april = '0';
} else {
    while ($row = mysqli_fetch_assoc($return)) {
        $return_april = $row["total"];
    }
}

// month may
$month = 5;
$return = mysqli_query($konek, "SELECT COUNT(date_return) AS total, EXTRACT(MONTH FROM date_return) AS month FROM
tb_sample WHERE YEAR(date_return)=YEAR(CURDATE()) AND MONTH(date_return)='$month' GROUP BY month");
if (mysqli_num_rows($return) == 0) {
    $return_may = '0';
} else {
    while ($row = mysqli_fetch_assoc($return)) {
        $return_may = $row["total"];
    }
}

// month june
$month = 6;
$return = mysqli_query($konek, "SELECT COUNT(date_return) AS total, EXTRACT(MONTH FROM date_return) AS month FROM
tb_sample WHERE YEAR(date_return)=YEAR(CURDATE()) AND MONTH(date_return)='$month' GROUP BY month");
if (mysqli_num_rows($return) == 0) {
    $return_june = '0';
} else {
    while ($row = mysqli_fetch_assoc($return)) {
        $return_june = $row["total"];
    }
}

// month july
$month = 7;
$return = mysqli_query($konek, "SELECT COUNT(date_return) AS total, EXTRACT(MONTH FROM date_return) AS month FROM
tb_sample WHERE YEAR(date_return)=YEAR(CURDATE()) AND MONTH(date_return)='$month' GROUP BY month");
if (mysqli_num_rows($return) == 0) {
    $return_july = '0';
} else {
    while ($row = mysqli_fetch_assoc($return)) {
        $return_july = $row["total"];
    }
}

// month august
$month = 8;
$return = mysqli_query($konek, "SELECT COUNT(date_return) AS total, EXTRACT(MONTH FROM date_return) AS month FROM
tb_sample WHERE YEAR(date_return)=YEAR(CURDATE()) AND MONTH(date_return)='$month' GROUP BY month");
if (mysqli_num_rows($return) == 0) {
    $return_august = '0';
} else {
    while ($row = mysqli_fetch_assoc($return)) {
        $return_august = $row["total"];
    }
}

// month sept
$month = 9;
$return = mysqli_query($konek, "SELECT COUNT(date_return) AS total, EXTRACT(MONTH FROM date_return) AS month FROM
tb_sample WHERE YEAR(date_return)=YEAR(CURDATE()) AND MONTH(date_return)='$month' GROUP BY month");
if (mysqli_num_rows($return) == 0) {
    $return_sept = '0';
} else {
    while ($row = mysqli_fetch_assoc($return)) {
        $return_sept = $row["total"];
    }
}

// month oct
$month = 10;
$return = mysqli_query($konek, "SELECT COUNT(date_return) AS total, EXTRACT(MONTH FROM date_return) AS month FROM
tb_sample WHERE YEAR(date_return)=YEAR(CURDATE()) AND MONTH(date_return)='$month' GROUP BY month");
if (mysqli_num_rows($return) == 0) {
    $return_oct = '0';
} else {
    while ($row = mysqli_fetch_assoc($return)) {
        $return_oct = $row["total"];
    }
}

// month nov
$month = 11;
$return = mysqli_query($konek, "SELECT COUNT(date_return) AS total, EXTRACT(MONTH FROM date_return) AS month FROM
tb_sample WHERE YEAR(date_return)=YEAR(CURDATE()) AND MONTH(date_return)='$month' GROUP BY month");
if (mysqli_num_rows($return) == 0) {
    $return_nov = '0';
} else {
    while ($row = mysqli_fetch_assoc($return)) {
        $return_nov = $row["total"];
    }
}

// month dec
$month = 12;
$return = mysqli_query($konek, "SELECT COUNT(date_return) AS total, EXTRACT(MONTH FROM date_return) AS month FROM
tb_sample WHERE YEAR(date_return)=YEAR(CURDATE()) AND MONTH(date_return)='$month' GROUP BY month");
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