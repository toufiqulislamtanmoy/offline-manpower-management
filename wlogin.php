<?php
include("functions/connection.php");
$connectionObj=new Main();
if(isset($_POST['login'])){
  $result = $connectionObj->worker_login($_POST);
}

?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Worker Login</title>

  <!-- Favicon icon -->
  <link rel="icon" href="/../manpowerbd/assests/img/icons/favicon.png" type="image/png">
  <!-- Bootstrap CDN link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <!-- Google Fonts link -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@700&family=Montserrat:wght@800&family=Poppins&family=Tilt+Prism&family=Work+Sans&display=swap" rel="stylesheet">
  <!-- Font awesome cdn -->
  <script src="https://kit.fontawesome.com/2137699d39.js" crossorigin="anonymous"></script>
  <!-- My custom css -->
  <link rel="stylesheet" href="assests/css/main.css">
</head>

<body>

  <main>
    <section class="bg-gra">
      <div class="container d-flex flex-column vh-100 align-content-center justify-content-center">
        <div class="login-content border border-warning white-bg p-5 w-75 m-auto bxSh rounded-5">
          <h4 class="text-center font-M fs-3 mb-5 color-beguni">Worker Login</h4>
          <form action="" method="post">
            <div class="mb-3">
              <label for="workerEmail" class="form-label">Email address</label>
              <input name="workerEmail" type="email" class="form-control input-border" id="workerEmail" placeholder="name@gamil.com" aria-describedby="emailHelp">
              <p id="email-warning" class=" text-danger d-none">Email Did not match</p>
            </div>
            <div class="mb-3">
              <label for="workerPassword" class="form-label">Password</label>
              <input type="password" placeholder="********" class="form-control input-border" id="workerPassword" name="workerPassword">
              <p id="pass-warning" class=" text-danger d-none">Password Did not match</p>
            </div>
            <p>
              <a href="">forget password!</a>
            </p>
            <div class="text-danger">
              <?php if(isset($result)){echo $result;} else{echo "";} ?>
            </div>
            <input type="submit" name="login" value="Login" id="login-btn" class="btn btn-success">
          </form>
          <p class="text-center my-3">
            I don't have an account
            <a href="wsignup.php">Sign Up</a>
          </p>
        </div>
      </div>
    </section>
  </main>

  <!-- Worker login custom js -->

  <script src="assests/js/workerLogin.js"></script>
  <!-- Bootstrap Script CDN link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>