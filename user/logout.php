// logout.php

<?php
session_start();

$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect the user to the homepage after logout
header('Location: /../manpowerbd/index.php'); // Replace 'index.php' with the desired landing page
exit();
?>
