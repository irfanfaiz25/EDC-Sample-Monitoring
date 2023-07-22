<?php
include 'fungsi/fungsi.php';

$table = query("SELECT * FROM tb_sample ORDER BY time_stamp DESC");
if (isset($_POST["btn-submit"])) {
    // if (jajal($_POST)) {
    //     header('Location: tes.php');
    // } else {
    //     echo "
    //         <script>
    //             alert('gagal');
    //         </script>
    //     ";
    // }
    var_dump($_POST);
}


?>
<!DOCTYPE html>
<html>

<head>
    <title>data tables</title>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" /> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200&display=swap');

        * {
            padding: 0px;
            margin: 0px
        }

        body {
            background: #8E24AA;
            color: #fff;
            font-family: 'Manrope', sans-serif
        }

        nav {
            display: flex;
            align-items: center;
            background: #AB47BC;
            height: 60px;
            position: relative;
            border-bottom: 1px solid #495057
        }

        .icon {
            cursor: pointer;
            margin-right: 50px;
            line-height: 60px
        }

        .icon span {
            background: #f00;
            padding: 7px;
            border-radius: 50%;
            color: #fff;
            vertical-align: top;
            margin-left: -25px
        }

        .icon img {
            display: inline-block;
            width: 26px;
            margin-top: 4px
        }

        .icon:hover {
            opacity: .7
        }

        .logo {
            flex: 1;
            margin-left: 50px;
            color: #eee;
            font-size: 20px;
            font-family: monospace
        }

        .notifications {
            width: 300px;
            height: 0px;
            opacity: 0;
            position: absolute;
            top: 63px;
            right: 62px;
            border-radius: 5px 0px 5px 5px;
            background-color: #fff;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
        }

        .notifications h2 {
            font-size: 14px;
            padding: 10px;
            border-bottom: 1px solid #eee;
            color: #999
        }

        .notifications h2 span {
            color: #f00
        }

        .notifications-item {
            display: flex;
            border-bottom: 1px solid #eee;
            padding: 6px 9px;
            margin-bottom: 0px;
            cursor: pointer
        }

        .notifications-item:hover {
            background-color: #eee
        }

        .notifications-item img {
            display: block;
            width: 50px;
            height: 50px;
            margin-right: 9px;
            border-radius: 50%;
            margin-top: 2px
        }

        .notifications-item .text h4 {
            color: #777;
            font-size: 16px;
            margin-top: 3px
        }

        .notifications-item .text p {
            color: #aaa;
            font-size: 12px
        }
    </style>
</head>

<body>

    <!-- <nav> -->
    <div class="logo"> BBBOOTSTRAP.COM </div>
    <div class="icon" id="bell"> <i class="fa fa-bell fa-2xl"></i> </div>
    <div class="notifications" id="box">
        <h2>Notifications - <span>2</span></h2>
        <div class="notifications-item"> <img src="https://i.imgur.com/uIgDDDd.jpg" alt="img">
            <div class="text">
                <h4>Samso aliao</h4>
                <p>Samso Nagaro Like your home work</p>
            </div>
        </div>
        <div class="notifications-item"> <img src="https://img.icons8.com/flat_round/64/000000/vote-badge.png"
                alt="img">
            <div class="text">
                <h4>John Silvester</h4>
                <p>+20 vista badge earned</p>
            </div>
        </div>
    </div>
    <!-- </nav> -->
    <script>
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
    </script>
</body>

</html>