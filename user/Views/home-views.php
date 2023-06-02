<?php include_once(__DIR__ . '/../userFunction/manageUser.php'); ?>

<?php

$connectionObj = new ManageUser();
// $returnData = $connectionObj->displayWorkerInUserInterFace();
$totalNumberOfPages = $connectionObj->pagination();
$limit = 8;
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
// Calculate the offset for the LIMIT clause in the SQL query
$offset = ($current_page - 1) * $limit;

$pageData = $connectionObj->currentPageData($limit, $offset);

?>

<section class="mt-7rem bg-light-gray p-5">
  <div id="worker-container" class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
    <?php while ($row = mysqli_fetch_assoc($pageData)) { ?>
      <div class="col">
        <div class="card mb-3 bg-card-black p-3">
          <h5 class="text-center light-gray font-M">Name: <?php echo $row['worker_full_name']; ?></h5>
          <div class="row g-0">
            <div class="col-md-5">

              <!-- <img class="img-fluid" src="/../manpowerbd/upload/" class="img-fluid rounded-start" alt="Image not found"> -->
              <img class="img-fluid rounded-start" src="/../manpowerbd/worker/upload/<?php echo $row['worker_photo']; ?>" class="img-fluid rounded-start" alt="Image not found">
              <div class="ratings mb-2 text-warning">
                <i class="fa-solid fa-star greenyellow-color"></i>
                <i class="fa-solid fa-star greenyellow-color"></i>
                <i class="fa-solid fa-star greenyellow-color"></i>
                <i class="fa-solid fa-star greenyellow-color"></i>
                <i class="fa-solid fa-star"></i>
              </div>
              <div class="text-white">
                <p><span class="fw-bold">Charge:</span> 700TK</p>
              </div>
            </div>
            <div class="col-md-7">
              <div class="card-body">
                <h5 class="card-title light-gray"><?php echo $row['workerType']; ?></h5>
                <p class="card-text light-gray"><i class="fa-solid fa-phone-volume"></i> <?php echo $row['worker_phone_number']; ?></p>

                <address class="card-title light-gray">Address: <?php echo $row['present_address']; ?></address>
                <div>
                  <a href="/../manpowerbd/user/worker-detail.php?id=<?php echo $row['worker_id']; ?>" class="btn btn-warning px-3 py-2 mt-3 font-M">
                    <i class="fa-regular fa-eye"></i> View Profile
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>

  <div class="d-flex justify-content-center">
    <?php
    echo '<ul class="pagination">';
    if ($current_page > 1) {
      echo '<li class="page-item"><a class="page-link" href="home.php?page=' . ($current_page - 1) . '"><</a></li>';
    } else {
      echo '<li class="page-item disabled"><a class="page-link" href="#"><</a></li>';
    }
    for ($i = 1; $i <= $totalNumberOfPages; $i++) {
      if ($i == $current_page) {
        echo '<li class="page-item active"><a class="page-link" href="#">' . $i . '</a></li>';
      } else {
        echo '<li class="page-item"><a class="page-link" href="home.php?page=' . $i . '">' . $i . '</a></li>';
      }
    }
    if ($current_page < $totalNumberOfPages) {
      echo '<li class="page-item"><a class="page-link" href="home.php?page=' . ($current_page + 1) . '">></a></li>';
    } else {
      echo '<li class="page-item disabled"><a class="page-link" href="#">></a></li>';
    }
    echo '</ul>';
    ?>

  </div>
</section>