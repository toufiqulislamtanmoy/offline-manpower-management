<!DOCTYPE html>
<?php
include('Includes/head.php');
?>

<body  >
  
  <?php
    include('Includes/navbar.php');
  ?>
  <main style="min-height: calc(100vh - 25vh);">
    <?php
    
    if($views == 'home'){
      include('Views/home-views.php');
    }elseif($views == 'user-profile'){
      include('Views/user-profile-view.php');
    }else if($views == 'worker-detail'){
      include('Views/worker-detail-view.php');
    }
    
    ?>
  </main>

 <?php
  include('Includes/footer.php');
 ?>