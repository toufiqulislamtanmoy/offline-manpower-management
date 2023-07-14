<?php include('includes/head.php'); ?>

<body class="">
  <?php
  include('includes/navbar.php');
  ?>
  <main style="min-height: calc(100vh - 35vh);">
    <?php
    if ($_SESSION['worker_id']) {
      if ($views == 'worker_home') {
        include('views/worker_home-views.php');
      }
    }else{
      echo "<script>window.location.replace('/../manpowerbd/index.php');</script>";
    }
    ?>
  </main>
</body>
<?php include('includes/footer.php'); ?>