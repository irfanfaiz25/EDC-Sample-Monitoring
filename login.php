<?php
session_start();

if (isset($_SESSION["login"])) {
   header('Location: index.php');
   exit;
}

include 'fungsi/fungsi.php';

if (isset($_POST["btn-regist"])) {
   if (regist($_POST) > 0) {
      $regist_success = true;
   } else {
      $regist_fail = true;
   }
}

if (isset($_POST["btn-login"])) {
   $username = $_POST["username"];
   $password = $_POST["password"];

   $res = mysqli_query($konek, "SELECT * FROM tb_user WHERE username='$username'");
   if (mysqli_num_rows($res) === 1) {
      $row = mysqli_fetch_assoc($res);
      $id = $row["id"];
      $user = $row["username"];
      $nama = $row["nama"];
      $level = $row["level_user"];
      $img = $row["foto"];

      if (password_verify($password, $row["password"])) {
         $_SESSION["login"] = true;
         $_SESSION["id"] = $id;
         $_SESSION["user"] = $user;
         $_SESSION["level"] = $level;
         $_SESSION["img"] = $img;
         $_SESSION["nama"] = $nama;

         header('Location: index.php');
         exit;
      } else {
         $alert_pass = true;
      }
   } else {
      $alert_user = true;
   }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/solid.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


   <link rel="stylesheet" href="css/login.css">
   <title>Document</title>

</head>

<body>

   <div class="container" id="container">
      <div class="form-container sign-up-container">
         <form action="" method="post" enctype="multipart/form-data">
            <h1>Register</h1>
            <input type="text" name="name" placeholder="Name" />
            <input type="text" name="username" placeholder="Username" />
            <input type="password" name="password" placeholder="Password" />
            <input type="password" name="password2" placeholder="Confirm password" />
            <select name="level" id="level">
               <option value="">User level</option>
               <option value="marketing">Marketing</option>
               <option value="testing">Testing</option>
               <option value="lab">Lab</option>
            </select>
            <input type="file" name="foto" placeholder="Choose image" id="foto" title=" " />
            <input type="password" name="token" placeholder="Confirm token" />
            <button type="submit" name="btn-regist">Sign Up</button>
         </form>
      </div>
      <div class="form-container sign-in-container">
         <form action="" method="post" enctype="multipart/form-data">
            <h1 class="mb-5">Sign in</h1>

            <input type="text" name="username" placeholder="Username" />
            <input type="password" name="password" placeholder="Password" />

            <?php
            if (isset($regist_fail)) : ?>
               <div id="myAlert" class="alert alert-danger alert-dismissible fade show">
                  Register failed
                  <button type="button" id="myBtn" class="btn-close" data-bs-dismiss="alert"></button>
               </div>
            <?php
            elseif (isset($alert_pass)) : ?>
               <div id="myAlert" class="alert alert-danger alert-dismissible fade show">
                  Incorrect password
                  <button type="button" id="myBtn" class="btn-close" data-bs-dismiss="alert"></button>
               </div>
            <?php
            elseif (isset($alert_user)) : ?>
               <div id="myAlert" class="alert alert-danger alert-dismissible fade show">
                  Username not found
                  <button type="button" id="myBtn" class="btn-close" data-bs-dismiss="alert"></button>
               </div>
            <?php
            endif;
            ?>

            <a href="#">Forgot your password?</a>
            <button type="submit" name="btn-login">Sign In</button>
         </form>
      </div>
      <div class="overlay-container">
         <div class="overlay">
            <div class="overlay-panel overlay-left">
               <img src="img/logoo.png" width="320" alt="astra otoparts">
               <p>To keep connected with us please login with your personal info</p>
               <button class="ghost" id="signIn">Sign In</button>
            </div>
            <div class="overlay-panel overlay-right">
               <img src="img/logoo.png" width="320" alt="astra otoparts">
               <p>Enter your personal details and start journey with us</p>
               <button class="ghost" id="signUp">Sign Up</button>
            </div>
         </div>
      </div>
   </div>
   <script>
      const signUpButton = document.getElementById('signUp');
      const signInButton = document.getElementById('signIn');
      const container = document.getElementById('container');

      signUpButton.addEventListener('click', () => {
         container.classList.add("right-panel-active");
      });

      signInButton.addEventListener('click', () => {
         container.classList.remove("right-panel-active");
      });
   </script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>