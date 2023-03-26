<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Worker Login</title>
  <!-- Bootstrap CDN link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <!-- Google Fonts link -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@700&family=Montserrat:wght@800&family=Poppins&family=Tilt+Prism&family=Work+Sans&display=swap"
    rel="stylesheet">
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
          <div class="mb-3">
            <label for="workerEmail" class="form-label">Email address</label>
            <input type="email" class="form-control input-border" id="workerEmail" placeholder="name@gamil.com"
              aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="workerPassword" class="form-label">Password</label>
            <input type="password" placeholder="********" class="form-control input-border" id="workerPassword">
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Remember Me</label>
          </div>
          <p>
            If you forgot your password
            <a href="">forgot password!</a>
          </p>
          <button id="worker-login" type="submit" class="btn btn-success">Login</button>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
</body>

</html>