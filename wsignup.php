<?php include("functions/connection.php"); ?>
<?php
$connectionObj = new Main();
if (isset($_POST['signup'])) {
  $result = $connectionObj->worker_signup($_POST);
}
?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Worker Signup</title>

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
  <!-- Sweet Alert CDN -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <!-- Jquery cdn -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- My custom css -->
  <link rel="stylesheet" href="assests/css/main.css">
</head>

<body>
  <main>
    <section class="bg-gra">
      <div class="container d-flex flex-column min-vh-100 align-items-center justify-content-center">
        <div class="signup-content border border-warning white-bg p-5 bxSh rounded-5">
          <h4 class="text-center font-M fs-3 mb-5 color-beguni">Worker Signup</h4>
          <form class="" id="signupForm" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="workerFullname" class="form-label">Full Name</label>
              <input type="text" class="form-control input-border" id="workerFullname" placeholder="Enter Fullname (According To your NID)" name="workerFullname" value="<?php if (isset($_POST['workerFullname'])) echo $_POST['workerFullname'] ?>">
            </div>
            <div class="mb-3">
              <label for="fatherName" class="form-label">Father's Name</label>
              <input type="text" class="form-control input-border" id="fatherName" placeholder="Father's Name (According To your NID)" name="fatherName" value="<?php if (isset($_POST['fatherName'])) echo $_POST['fatherName'] ?>">
            </div>
            <div>
              <label for="dob" class="form-label">Date of Birth:</label>
              <input type="date" class="form-control input-border" id="dob" name="dob" min="1900-01-01" max="2023-04-18" value="<?php if (isset($_POST['dob'])) echo $_POST['dob'] ?>">
            </div>
            <div class="mb-3">
              <label for="workerProfile" class="form-label">Upload Your Photo</label>
              <input type="file" class="form-control input-border" id="workerProfile" name="workerProfile">
            </div>
            <div class="mb-3">
              <label for="workerNid" class="form-label">NID Number</label>
              <input type="text" class="form-control input-border" id="workerNid" placeholder="NID Card Number" name="workerNid" value="<?php if (isset($_POST['workerNid'])) echo $_POST['workerNid'] ?>">
            </div>
            <div class="mb-3">
              <label for="gender" class="form-label">Gender</label>
              <select required class="form-control input-border" id="gender" name="gender">
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
              </select>
            </div>


            <div class="mb-3">
              <label for="workerType" class="form-label">Worker Type</label>
              <select required class="form-control input-border" id="workerType" name="workerType">
                <option value="">Select Worker Type</option>
                <option value="Electrician">Electrician</option>
                <option value="Plumber">Plumber</option>
                <option value="Carpenter">Carpenter</option>
                <option value="Mechanic">Mechanic</option>
                <option value="Cook">Cook</option>
                <option value="Painter">Painter</option>
                <option value="Housekeeper">Housekeeper</option>
                <!-- Add more options for different worker types -->
              </select>
            </div>

            <div class="mb-3">
              <label for="workerPhone" class="form-label">Phone Number</label>
              <input type="text" class="form-control input-border" id="workerPhone" placeholder="+8801825xxxx" name="workerPhoneNumber" value="<?php if (isset($_POST['workerPhoneNumber'])) echo $_POST['workerPhoneNumber'] ?>">
            </div>
            <div class="mb-3">
              <label for="workerAddrss" class="form-label">Present Address</label>
              <input type="text" class="form-control input-border" id="workerAddrss" placeholder="Address" name="workerAddrss" value="<?php if (isset($_POST['workerAddrss'])) echo $_POST['workerAddrss'] ?>">
            </div>
            <div class="mb-3">
              <label for="workerPAddrss" class="form-label">Permanent Address</label>
              <input type="text" class="form-control input-border" id="workerPAddrss" placeholder="Address" name="workerPAddrss" value="<?php if (isset($_POST['workerPAddrss'])) echo $_POST['workerPAddrss'] ?>">
            </div>
            <div class="mb-3">
              <label for="workerEmail" class="form-label">Email Address</label>
              <input type="email" class="form-control input-border" id="workerEmail" placeholder="xyz@xyz.com" name="workerEmail" value="<?php if (isset($_POST['workerEmail'])) echo $_POST['workerEmail'] ?>">
              <p id="email-warning" class="text-danger d-none">Please enter a valid email address</p>
            </div>
            <div class="mb-3">
              <label for="workerPassword" class="form-label">Password</label>
              <input type="password" placeholder="Strong password gives you Strong Security" class="form-control input-border" id="workerPassword" name="workerPassword" value="<?php if (isset($_POST['workerPassword'])) echo $_POST['workerPassword'] ?>">
              <p id="pass-warning" class="text-danger d-none">Passwords do not match</p>
            </div>
            <div class="mb-3">
              <label for="workerConfrimPassword" class="form-label">Confirm Password</label>
              <input type="password" placeholder="Strong password gives you Strong Security" class="form-control input-border" id="workerConfrimPassword" name="workerConfrimPassword" value="<?php if (isset($_POST['workerConfrimPassword'])) echo $_POST['workerConfrimPassword'] ?>">
              <p id="pass-confirm-warning" class="text-danger d-none">Passwords do not match</p>
            </div>
            <div class="text-danger my-1"> <?php if (isset($result)) {
                                              echo $result;
                                            } else {
                                              echo '';
                                            } ?> </div>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>