<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User Signup</title>
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
      <div class="container d-flex flex-column min-vh-100 align-items-center justify-content-center">
        <div class="signup-content border border-warning white-bg p-5 bxSh rounded-5">
          <h4 class="text-center font-M fs-3 mb-5 color-beguni">User Signup</h4>
          <form action="" method="post">
            <div class="mb-3">
              <label for="userFullname" class="form-label">Full Name</label>
              <input type="text" class="form-control input-border" id="userFullname" placeholder="Full Name">
            </div>
            <div class="mb-3">
              <label for="userNid" class="form-label">NID Number</label>
              <input type="text" class="form-control input-border" id="userNid" placeholder="NID Card Number">
            </div>
            <div class="mb-3 row">
              <label for="userGender" class="col-sm-2 col-form-label">Gender: </label>
              <div class="col-sm-10">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                  <label class="form-check-label" for="male">
                    Male
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                  <label class="form-check-label" for="female">
                    Female
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" id="other" value="other">
                  <label class="form-check-label" for="other">
                    Other
                  </label>
                </div>
              </div>
            </div>
            
            
            
            <div class="mb-3">
              <label for="userPhone" class="form-label">Phone Number</label>
              <input type="text" class="form-control input-border" id="userPhone" placeholder="+8801825xxxx">
            </div>
            <div class="mb-3">
              <label for="userAddress" class="form-label">Address</label>
              <input type="text" class="form-control input-border" id="userAddress" placeholder="Address">
            </div>
            <div class="mb-3">
              <label for="userEmail" class="form-label">Email Address</label>
              <input type="email" class="form-control input-border" id="userEmail" placeholder="name@gamil.com">
              <p id="email-warning" class="text-danger d-none">Please enter a valid email address</p>
            </div>
            <div class="mb-3">
              <label for="userPassword" class="form-label">Password</label>
              <input type="password" placeholder="********" class="form-control input-border" id="userPassword">
              <p id="pass-warning" class="text-danger d-none">Passwords do not match</p>
            </div>
            <div class="mb-3">
              <label for="userConfirmPassword" class="form-label">Confirm Password</label>
              <input type="password" placeholder="********" class="form-control input-border" id="userConfirmPassword">
              <p id="pass-confirm-warning" class="text-danger d-none">Passwords do not match</p>
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Remember Me</label>
            </div>
            <div class="text-center">
              <p>If you forget your password, <a href="#">click here</a></p>
              <button id="Signup" type="submit" class="btn btn-success">Signup</button>
            </div>
          </form>
          <p class="text-center my-3">
            Already have an account? <a href="ulogin.php">Log in</a>
          </p>
        </div>
      </div>
    </section>
  </main>
  
  

  <!-- my custom script -->
  <script src="assests/js/userSignup.js"></script>
  <!-- Bootstrap Script CDN link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
</body>

</html>