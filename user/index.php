<!DOCTYPE html>
<?php
include('Includes/head.php');
?>

<body>
  
  <?php
    include('Includes/navbar.php');
  ?>
  <main>
    <?php
    
    if($views == 'home'){
      include('Views/home-views.php');
    }elseif($views == 'user-profile'){
      include('Views/user-profile-view.php');
    }
    
    ?>
  </main>

 <?php
  include('Includes/footer.php');
 ?>