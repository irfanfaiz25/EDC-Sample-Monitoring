<?php
include 'fungsi/fungsi.php';

// $dataPoints1 = array(
//     array("label" => "2010", "y" => 36.12),
//     array("label" => "2011", "y" => 34.87),
//     array("label" => "2012", "y" => 40.30),
//     array("label" => "2013", "y" => 35.30),
//     array("label" => "2014", "y" => 39.50),
//     array("label" => "2015", "y" => 50.82),
//     array("label" => "2016", "y" => 74.70)
// );
// $dataPoints2 = array(
//     array("label" => "2010", "y" => 64.61),
//     array("label" => "2011", "y" => 70.55),
//     array("label" => "2012", "y" => 72.50),
//     array("label" => "2013", "y" => 81.30),
//     array("label" => "2014", "y" => 63.60),
//     array("label" => "2015", "y" => 69.38),
//     array("label" => "2016", "y" => 98.70)
// );

$test = array();
$test2 = array();
$count = 0;
$count2 = 0;

$res = mysqli_query($konek, "SELECT EXTRACT(MONTH FROM tgl_datang) AS month_come, EXTRACT(MONTH FROM date_take) AS month_take, EXTRACT(MONTH FROM date_return) AS month_return, 
COUNT(tgl_datang) AS total FROM tb_sample GROUP BY month_come, month_take, month_return");


while ($row = mysqli_fetch_array($res)) {

    // var_dump($row["month"]);
    $date = $row["month_come"];
    $date2 = $row["month_take"];
    // $monthNum = 5;
    $monthName = date("F", mktime(0, 0, 0, $date, 10));
    $monthName2 = date("F", mktime(0, 0, 0, $date2, 10));
    // $newDate = date("F", strtotime($date));
    $tot = $row["total"];

    $test[$count]['label'] = $monthName;
    $test[$count]['y'] = $tot;
    $test2[$count]['label'] = $monthName2;
    $test2[$count]['y'] = $tot;

    $count = $count + 1;
    // $count2 = $count2 + 1;
}

// $res2 = mysqli_query($konek, "SELECT EXTRACT(MONTH FROM date_take) AS month, COUNT(date_take) AS total FROM tb_sample GROUP BY EXTRACT(MONTH FROM date_take)");
// // SELECT EXTRACT(MONTH FROM tgl_datang) AS month_come, EXTRACT(MONTH FROM date_take) AS month_take, EXTRACT(MONTH FROM date_return) AS month_return, COUNT(tgl_datang) AS total FROM tb_sample GROUP BY month_come, month_take, month_return
// while ($row = mysqli_fetch_array($res2)) {

//     // var_dump($row["month"]);
//     $date = $row["month"];
//     // $monthNum = 5;
//     $monthName = date("F", mktime(0, 0, 0, $date, 10));
//     // $newDate = date("F", strtotime($date));
//     $tot = $row["total"];

//     $test2[$count2]['label'] = $monthName;
//     $test2[$count2]['y'] = $tot;
//     // $test2[$count]['label'] = $row["nm_sample"];
//     // $test2[$count]['y'] = $row["qty"];

//     // $count = $count + 1;
//     $count2 = $count2 + 1;
// }
?>
<!DOCTYPE HTML>
<html>

<head>
    <script>
        window.onload = function () {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "Average Amount Spent on Real and Artificial X-Mas Trees in U.S."
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
                    name: "Sample Before Test",
                    indexLabel: "{y}",
                    yValueFormatString: "#0.##",
                    showInLegend: true,
                    dataPoints: <?php echo json_encode($test, JSON_NUMERIC_CHECK); ?>
                }, {
                    type: "column",
                    name: "Sample On Track",
                    indexLabel: "{y}",
                    yValueFormatString: "#0.##",
                    showInLegend: true,
                    dataPoints: <?php echo json_encode($test2, JSON_NUMERIC_CHECK); ?>
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
</head>

<body>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>

</html>