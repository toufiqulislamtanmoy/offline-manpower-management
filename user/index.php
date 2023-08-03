<!DOCTYPE html>
<?php
session_start();
include('Includes/head.php');
?>

<body>

  <?php
  include('Includes/navbar.php');
  ?>
  <main style="min-height: calc(100vh - 25vh);">
    <?php
    if ($_SESSION['user_id']) {
      if ($views == 'home') {
        include('Views/home-views.php');
      } elseif ($views == 'user-profile') {
        include('Views/user-profile-view.php');
      } else if ($views == 'worker-detail') {
        include('Views/worker-detail-view.php');
      } else if ($views == 'pendingList') {
        include('Views/pendingList-view.php');
      } else if ($views == 'checkout') {
        include('Views/checkout-view.php');
      }elseif($views == 'hiring_history'){
        include('Views/hiring_history-view.php');
      }
    }else{
      echo "<script>window.location.replace('/../manpowerbd/index.php');</script>";
    }


    ?>
  </main>

  <?php
  include('Includes/footer.php');
  ?>