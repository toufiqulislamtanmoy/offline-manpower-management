<?php
include("functions/connection.php");

if (isset($_SESSION['user_id'])) {
  echo '<script>';
  echo 'console.log("User ID: 202");';
  echo '</script>';
  $loggedIn = true;
  $connectionObj = new Main();
  $userId = $_SESSION['user_id'];
  $user = $connectionObj->user_details($userId);
} else {
  $loggedIn = false;
  echo '<script>';
  echo 'console.log("User ID: 404");';
  echo '</script>';
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
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

  <header class="container">
    <!-- Navabr -->
    <nav class="container navbar-expand-lg navbar navbar-dark bg-dark shadow-lg">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><span class="font-M fs-4"><span class=" fs-2 text-uppercase color-org">M</span>anp<span class=" fs-2 text-uppercase color-org">o</span>wer<span class=" fs-2 text-uppercase color-org">bd</span></span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav m-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#service">Service</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#team">Our Team</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#contact">Contact US</a>
            </li>
            <?php if ($loggedIn) { ?>
              <li class="nav-item">
                <a class="nav-link" href="user/home.php">Find Worker</a>
              </li>
            <?php } ?>
          </ul>
          <?php if (!$loggedIn) { ?>
            <!-- SIgnup Button Starts from here -->
            <button type="button" class="bg-transparent text-white border-0 me-2" data-bs-toggle="modal" data-bs-target="#signupPreview">
              Sign Up
            </button>
            <!-- Button trigger modal -->
            <button type="button" class="ms-2 bg-transparent text-white border-0" data-bs-toggle="modal" data-bs-target="#login-preview">
              Login
            </button>
          <?php } else { ?>
            <div class="dropdown">
              <img style="height: 44px; width:44px; cursor: pointer;" src="<?php echo $user['profileImage'] ?>" alt="not found" class="dropdown-toggle rounded-circle border border-3 " data-bs-toggle="dropdown" aria-expanded="false" />
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="user/user-profile.php">Profile Setting</a></li>
                <li><a class="dropdown-item" href="user/logout.php">Log Out</a></li>
              </ul>
            </div>
          <?php } ?>

          <!-- signup option preview -->
          <!-- Modal -->
          <div class="modal fade" id="signupPreview" tabindex="-1" aria-labelledby="signupPreviewLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="signupPreviewLabel">Choose Signup Account Type</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <h4 class="text-center my-3">
                    <a href="usignup.php" class=" btn btn-warning px-5">User</a>
                  </h4>
                  <h4 class="text-center my-3">
                    <a href="wsignup.php" class=" btn btn-warning px-5">Worker</a>
                  </h4>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>



          <!-- login option preview -->
          <!-- Modal -->
          <div class="modal fade" id="login-preview" tabindex="-1" aria-labelledby="login-previewLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="login-previewLabel">Sign In to Your Account As</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <h4 class="text-center my-3">
                    <a href="ulogin.php" class=" btn btn-warning px-5">User</a>
                  </h4>
                  <h4 class="text-center my-3">
                    <a href="wlogin.php" class=" btn btn-warning px-5">Worker</a>
                  </h4>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <!-- Banner -->
    <section id="home" class="bgimg d-flex flex-column gap-3 align-items-center justify-content-center">
      <h1 class="font-TIT text-white">`Workers at Fingertips.!`</h1>
      <p class="font-w fs-5  c-w-75 text-center text-white">The concept of having easy access to all necessary workers
        at any given time, typically achieved through the use of technology and digital platforms. This approach allows
        for greater flexibility and efficiency in managing human resources.
      </p>
      <div>

        <button id="explore" class=" py-3 btn btn-success">Explore More</button>
      </div>
    </section>
  </header>

  <main>
    <!-- Our service -->
    <section id="service" class="container my-5">
      <h1 class="fs-1 fw-bold text-center font-M my-5">Services</h1>
      <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
          <div class="card">
            <img src="assests/img/service/matchmaking.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Matchmaking</h5>
              <p class="card-text over-content">The worker management system is a platform designed to connect workers
                with users who need their services. The system offers a variety of services that help both workers and
                users to find the right match for their needs.</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="assests/img/service/hireing.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Easy to Hire</h5>
              <p class="card-text over-content">One of the main features of the worker management system is the hiring
                system, which allows users to log in and search for workers based on their qualifications, skills, and
                experience. Workers can create profiles and provide information about their availability, location,
                rates, and other relevant details. Users can view these profiles and select the workers who best match
                their needs.</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="assests/img/service/flexibility_hiring.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Flexible Hiring Options</h5>
              <p class="card-text over-content">The Worker Management System offers various hiring options, including
                hourly, daily, and contract-based hiring. This allows users to select the most suitable option for their
                needs, whether they require a worker for a short-term project or a long-term engagement.the system
                ensures transparency in the hiring process by providing users with access to workers' profiles, which
                include information on their qualifications, skills, and experience. Users can also view ratings and
                reviews from previous clients, which can help them make informed decisions when selecting a worker. This
                ensures that users can find the right worker for their specific needs and also helps to maintain a high
                level of worker performance.</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="assests/img/service/PMA.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Performance Monitoring & Action</h5>
              <p class="card-text over-content">The worker management system also has a feedback system that allows
                users to rate and review workers based on their performance. This helps to ensure that workers provide
                high-quality service and maintain a good reputation on the platform. The system monitors worker
                performance and takes action if necessary, such as removing workers who consistently receive poor
                ratings or providing additional training or support. Workers with good ratings and reviews may also be
                highlighted on the platform, which can help them to attract more business. Overall, the feedback system
                is a key feature of the worker management system that helps to maintain a high level of quality and
                professionalism.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Our Team -->
    <section id="team" class="container my-5">
      <h1 class="fs-1 fw-bold text-center font-M my-5">Team</h1>
      <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="2000">
            <img src="assests/img/gradent/bg-01.jpg" class=" d-block  c-img-h" alt="...">
            <div class="carousel-caption  d-md-block">
              <a class="text-decoration-none" href="https://toufiqulislamtanmoy.web.app/" target="_blank">
                <img class="prof-img" src="assests/img/team/0.png" alt="">
                <h5 class="fs-3 fw-bold font-M text-white my-1">Toufiqul Islam Tanmoy</h5>
                <p class=" text-white">Founder & Developer</p>
              </a>
            </div>
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src="assests/img/gradent/bg-01.jpg" class=" d-block c-img-h" alt="...">
            <div class="carousel-caption  d-md-block">
              <img class="prof-img" src="assests/img/team/1.jpg" alt="">
              <h5 class="fs-3 fw-bold font-M text-white my-1">Ariful Islam</h5>
              <p class="text-white">Lead Designer </p>
            </div>
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src="assests/img/gradent/bg-01.jpg" class="d-block c-img-h" alt="...">
            <div class="carousel-caption  d-md-block">
              <img class="prof-img" src="assests/img/team/2.jpg" alt="">
              <h5 class="fs-3 fw-bold font-M text-white my-1">Samia Zaman</h5>
              <p class="text-white">Lead Designer</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </section>


    <!-- Contact Us -->
    <section id="contact" class=" bg-warning py-3">
      <div class="container">
        <h1 class="fs-1 fw-bold text-center font-M my-5">Contact Us</h1>
        <div class="row row-cols-1 row-cols-md-2 g-4">
          <div class="col">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Your Name: </label>
              <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Email address</label>
              <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Phone Number:</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="018*****">
            </div>

          </div>
          <div class="col">
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Message</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="mb-3">
              <button class="btn btn-success">Send</button>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer class="bg-dark py-3">
    <div class="container">
      <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
          <h5 class="text-white text-center">Usefull Links</h5>
          <div class="link-items text-center">
            <a class="link-info d-block" href="">Home</a>
            <a class="link-info d-block" href="">Service</a>
            <a class="link-info d-block" href="">Team</a>
            <a class="link-info d-block" href="">Contact Us</a>
          </div>
        </div>
        <div class="col">
          <h5 class="text-white text-center">Social Links</h5>
          <div class="social-links text-center">
            <a class="link-primary fs-3 me-3 mt-3" href=""><i class="fa-brands fa-facebook"></i></a>
            <a class="link-danger  fs-3 me-3 mt-3" href=""><i class="fa-brands fa-instagram"></i></a>
            <a class="link-primary fs-3 me-3 mt-3" href=""><i class="fa-brands fa-twitter"></i></a>
            <a class="link-primary fs-3 me-3 mt-3 " href=""><i class="fa-brands fa-linkedin"></i></a>
          </div>
        </div>
      </div>
      <p class="text-center text-white my-3">All &copy;Copyright Reserved by
        <a class="text-white navbar-brand" href="#">
          <span class="font-M fs-5">
            <span class=" fs-2 text-uppercase color-org">M</span>
            anp
            <span class=" fs-2 text-uppercase color-org">o</span>
            wer
            <span class=" fs-2 text-uppercase color-org">
              bd</span>
          </span>
        </a>
      </p>
    </div>
  </footer>

  <!-- Bootstrap Script CDN link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>