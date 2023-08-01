<?php
session_start();

if (isset($_SESSION["login"])) {
   header('Location: index.php');
   exit;
}

include 'fungsi/fungsi.php';

if (isset($_POST["btn-regist"])) {
   if (regist($_POST) > 0) {
      $alert_suc = true;
   } else {
      $alert_fail = true;
   }
   // var_dump($_POST);
   // var_dump($_FILES);
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


   <link rel="stylesheet" href="css/login-style.css">
   <title>Document</title>
</head>

<body>

   <div class="section">
      <div class="container">
         <div class="row full-height justify-content-center">
            <div class="col-12 text-center align-self-center py-5">
               <div class="section pb-5 pt-5 pt-sm-2 text-center">
                  <h6 class="mb-0 pb-3"><span>Log In </span><span>Sign Up</span></h6>
                  <input class="uil uil-lock-alt checkbox" type="checkbox" id="reg-log" name="reg-log" />
                  <label for="reg-log"></label>
                  <div class="card-3d-wrap mx-auto">
                     <div class="card-3d-wrapper">
                        <div class="card-front">
                           <div class="center-wrap">
                              <div class="section text-center">
                                 <form action="" method="post">
                                    <h4 class="log-text mb-4 pb-3">Log In</h4>
                                    <div class="form-group">
                                       <input type="text" name="username" class="form-style" placeholder="Your Username" id="logemail" autocomplete="off">
                                       <i class="input-icon fa fa-user-circle"></i>
                                    </div>
                                    <div class="form-group mt-2">
                                       <input type="password" name="password" class="form-style" placeholder="Your Password" id="logpass" autocomplete="off">
                                       <i class="input-icon uil fa fa-key"></i>
                                    </div>
                                    <button type="submit" name="btn-login" class="btn mt-5">login</button>
                                    <p class="mb-0 mt-4 text-center"><a href="#0" class="link">Forgot your password?</a></p>
                                 </form>
                              </div>
                           </div>
                        </div>
                        <div class="card-back">
                           <div class="center-wrap">
                              <div class="section-back text-center">
                                 <form action="" method="post" enctype="multipart/form-data">
                                    <h4 class=" mb-4 pb-3">Sign Up</h4>
                                    <div class="form-group">
                                       <input type="text" name="name" class="form-style" placeholder="Your Name" id="logname" autocomplete="off">
                                       <i class="input-icon fa fa-user-pen"></i>
                                    </div>
                                    <div class="form-group mt-2">
                                       <input type="text" name="username" class="form-style" placeholder="Your Username" id="logemail" autocomplete="off">
                                       <i class="input-icon fa fa-user-circle"></i>
                                    </div>
                                    <div class="form-group mt-2">
                                       <input type="password" name="password" class="form-style" placeholder="Your Password" id="logpass" autocomplete="off">
                                       <i class="input-icon fa fa-key"></i>
                                    </div>
                                    <div class="form-group mt-2">
                                       <input type="password" name="password2" class="form-style" placeholder="Confirm Password" id="logpass" autocomplete="off">
                                       <i class="input-icon fa fa-key"></i>
                                    </div>
                                    <div class="form-group mt-2">
                                       <select class="form-style" name="level" id="logpass" autocomplete="off">
                                          <option value="">Your User Level</option>
                                          <option value="marketing">Marketing</option>
                                          <option value="lab">Lab</option>
                                       </select>
                                       <i class="input-icon fa fa-users-line"></i>
                                    </div>
                                    <div class="form-group mt-2">
                                       <input type="file" name="foto" class="form-style" placeholder="Your Photo" id="foto" autocomplete="off">
                                       <i class="input-icon fa fa-camera-retro"></i>
                                    </div>
                                    <div class="form-group mt-2">
                                       <input type="password" name="token" class="form-style" placeholder="Enter Token" id="logpass" autocomplete="off">
                                       <i class="input-icon fa fa-lock"></i>
                                    </div>
                                    <button type="submit" name="btn-regist" class="btn mt-4">submit</a>
                                 </form>
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
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>