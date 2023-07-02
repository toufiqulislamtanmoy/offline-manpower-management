<?php include_once(__DIR__ . '/../userFunction/manageUser.php'); ?>

<?php
$connectionObj = new ManageUser();
$pendingList = $connectionObj->pendingList();
if (isset($_POST['cancel_request'])) {
  $hireID = $_POST['hire_id'];
  $returnData = $connectionObj->cancel_hire_request($hireID);
}
?>


<!-- Add this in your HTML file's body section -->
<script>
  // Function to show a success message using SweetAlert
  function showSuccessMessage(message) {
    Swal.fire({
      icon: 'success',
      title: 'Your Hiring Request Has Been Canceled',
      text: message,
      timer: 3000, // Auto close the alert after 3 seconds
      showConfirmButton: false
    });
    setTimeout(function() {
      window.location.replace(window.location.href);
    }, 2000);
  }

  // Function to show an error message using SweetAlert
  function showErrorMessage(message) {
    Swal.fire({
      icon: 'error',
      title: 'Error!',
      text: message
    });
  }

  // Check if the PHP variable $result is set and contains a value
  <?php if (isset($returnData)) { ?>
    <?php if ($returnData === "Success") { ?>
      showSuccessMessage("<?php echo $returnData; ?>");
    <?php } else { ?>
      showErrorMessage("<?php echo $returnData; ?>");
    <?php } ?>
  <?php } ?>
</script>

<section style="min-height: 400px;" class="mt-7rem bg-light-gray p-5">
  <?php
  if (!empty($pendingList)) {
    echo '<div style="background-image: url(\'/../manpowerbd/assests/img/gradent/searchBanner2.png\'); background-repeat: no-repeat; background-position: center; background-size: cover;" class="row row-cols-1 row-cols-md-3 row-cols-lg-3 g-4 mx-lg-4 p-3">';
    while ($row = mysqli_fetch_assoc($pendingList)) {
      echo '
        <div class="card" >
          <img src="' . $row['worker_photo'] . '" class="card-img-top" alt="...">
          <div class="card-body">
            <span class="card-title"><h5 class="d-inline-block">' . $row['worker_full_name'] . '</h5> <span>(' . $row['workerType'] . ')</span></span>
            <p class="card-text"> <span class="fw-bold">Hire Date: </span> ' . $row['hire_date'] . '</p>
            <p class="card-text"> <span class="fw-bold">Request: </span> ' . $row['accept'] . '</p>
            <p class="card-text"> <span class="fw-bold">Method: </span> ' . $row['working_method'] . '</p>
            <p class="card-text"> <span class="fw-bold">Working Hour: </span> ' . $row['working_hour'] . '</p>';
      if ($row['accept'] == 'Yes') {
        echo '<a href="#" class="btn btn-primary">Pay Now</a>';
      } else {
        echo '<div class="d-flex align-items-center justify-content-between">';
        echo '<button disabled class="btn btn-primary fs-6">Pay Now</button>';
  ?>
        <form method="post">
          <input type="hidden" name="hire_id" value="<?php echo $row['hire_id']; ?>">
          <input class="btn btn-danger" type="submit" value="Cancel Request" name="cancel_request">
        </form>
  <?php
        echo '</div>';
      }

      echo '
          </div>
        </div>
      ';
    }

    echo '<script>';
    echo 'console.log("IF Block: 202");';
    echo '</script>';
    echo '</div>';
  } else {
    echo '<script>';
    echo 'console.log("Else Block: 202");';
    echo '</script>';
    echo '</div>';

    echo '<p class="text-center d-flex align-items-center justify-content-center">No Pending List Found</p>';
  }
  ?>

</section>