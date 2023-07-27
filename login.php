<?php
include 'fungsi/fungsi.php';

if (isset($_POST["btn-regist"])) {
   if (regist($_POST) > 0) {
      $alert_suc = true;
   } else {
      $alert_fail = true;
   }
}

if (isset($_POST["btn-login"])) {
   $username = $_POST["username"];
   $password = $_POST["password"];

   $res = mysqli_query($konek, "SELECT * FROM tb_user WHERE username='$username'");
   if (mysqli_num_rows($res) === 1) {
      $row = mysqli_fetch_assoc($res);

      if (password_verify($password, $row["password"])) {
         header('Location: index.php');
         exit;
      }
   }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link rel="stylesheet" href="css/login-style.css">
   <title>Document</title>
</head>

<body>
   <div class="bg">
      <div class="row">
         <div class="col-md-12">
            <div class="wrapper">
               <div class="card-switch">
                  <label class="switch">
                     <input type="checkbox" class="toggle">
                     <span class="slider"></span>
                     <span class="card-side"></span>
                     <div class="flip-card__inner">
                        <div class="flip-card__front">
                           <div class="title m-0">
                              <img src="img/logoo.png" width="200" alt="">
                           </div>
                           <form class="flip-card__form" action="" method="post">
                              <input class="flip-card__input" name="username" placeholder="Username" type="text">
                              <input class="flip-card__input" name="password" placeholder="Password" type="password">
                              <button class="flip-card__btn" type="submit" name="btn-login">Let`s go!</button>
                           </form>
                        </div>
                        <div class="flip-card__back">
                           <div class="title">
                              <img src="img/logoo.png" width="200" alt="">
                           </div>
                           <form class="flip-card__form" action="" method="post">
                              <input class="flip-card__input" placeholder="Name" name="name" type="name">
                              <input class="flip-card__input" name="username" placeholder="Username" type="text">
                              <input class="flip-card__input" name="password" placeholder="Password" type="password">
                              <input class="flip-card__input" name="password2" placeholder="Confirm Password" type="password">
                              <input class="flip-card__input" name="token" placeholder="Enter token" type="password">
                              <select class="flip-card__inputt" name="level" id="level">
                                 <option value="">Choose Your User Level</option>
                                 <option value="marketing">Marketing</option>
                                 <option value="lab">Lab</option>
                                 <option value="testing">Testing</option>
                              </select>
                              <button class="flip-card__btn" type="submit" name="btn-regist">Regist!</button>
                           </form>
                        </div>
                     </div>
                  </label>
               </div>
            </div>
         </div>
      </div>
   </div>

</body>

</html>