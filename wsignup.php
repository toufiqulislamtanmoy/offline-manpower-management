<?php
include("functions/connection.php");
$connectionObj=new Main();
if(isset($_POST['signup'])){
  $connectionObj->user_signup($_POST);
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Worker Signup</title>
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
          <h4 class="text-center font-M fs-3 mb-5 color-beguni">Worker Signup</h4>
          <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="userFullname" class="form-label">Full Name</label>
              <input required type="text" class="form-control input-border" id="userFullname" placeholder="Enter Fullname (According To your NID)" name="userFullname" value="<?php if(isset($_POST['userFullname'])) echo $_POST['userFullname'] ?>">
            </div>
            <div class="mb-3">
              <label for="userFullname" class="form-label">Father's Name</label>
              <input required type="text" class="form-control input-border" id="userFullname" placeholder="Father's Name (According To your NID)" name="userFullname" value="<?php if(isset($_POST['userFullname'])) echo $_POST['userFullname'] ?>">
            </div>
            <div>
              <label for="dob" class="form-label">Date of Birth:</label>
              <input required type="date" class="form-control input-border" id="dob" name="dob" min="1900-01-01" max="2023-04-18">
            </div>
            <div class="mb-3">
              <label for="userProfile" class="form-label">Upload Your Photo</label>
              <input required type="file" class="form-control input-border" id="userProfile" name="userProfile">
            </div>
            <div class="mb-3">
              <label for="userNid" class="form-label">NID Number</label>
              <input required type="text" class="form-control input-border" id="userNid" placeholder="NID Card Number" name="userNID" value="<?php if(isset($_POST['userNID'])) echo $_POST['userNID'] ?>">
            </div>            
            
            <div class="mb-3">
              <label for="userPhone" class="form-label">Phone Number</label>
              <input required type="text" class="form-control input-border" id="userPhone" placeholder="+8801825xxxx" name="userPhoneNumber" value="<?php if(isset($_POST['userPhoneNumber'])) echo $_POST['userPhoneNumber'] ?>">
            </div>
            <div class="mb-3">
              <label for="userAddress" class="form-label">Present Address</label>
              <input required type="text" class="form-control input-border" id="userAddress" placeholder="Address" name="userAddress" value="<?php if(isset($_POST['userAddress'])) echo $_POST['userAddress'] ?>">
            </div>            
            <div class="mb-3">
              <label for="userAddress" class="form-label">Permanent Address</label>
              <input required type="text" class="form-control input-border" id="userAddress" placeholder="Address" name="userAddress" value="<?php if(isset($_POST['userAddress'])) echo $_POST['userAddress'] ?>">
            </div>
            <div class="mb-3">
              <label for="userEmail" class="form-label">Email Address</label>
              <input required type="email" class="form-control input-border" id="userEmail" placeholder="xyz@xyz.com" name="userEmail" value="<?php if(isset($_POST['userEmail'])) echo $_POST['userEmail'] ?>">
              <p id="email-warning" class="text-danger d-none">Please enter a valid email address</p>
            </div>
            <div class="mb-3">
              <label for="userPassword" class="form-label">Password</label>
              <input required type="password" placeholder="Strong password gives you Strong Security" class="form-control input-border" id="userPassword" name="userPassword" value="<?php if(isset($_POST['userPassword'])) echo $_POST['userPassword'] ?>">
              <p id="pass-warning" class="text-danger d-none">Passwords do not match</p>
            </div>
            <div class="mb-3">
              <label for="userConfirmPassword" class="form-label">Confirm Password</label>
              <input required type="password" placeholder="Strong password gives you Strong Security" class="form-control input-border" id="userConfirmPassword" name="userConfrimPassword" value="<?php if(isset($_POST['userConfrimPassword'])) echo $_POST['userConfrimPassword'] ?>">
              <p id="pass-confirm-warning" class="text-danger d-none">Passwords do not match</p>
            </div>
            <input type="submit" value="Sign Up" name="signup" class="btn btn-success">
          </form>
          <p class="text-center my-3">
            Already have an account? <a href="wlogin.php">Log in</a>
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