<?php include_once(__DIR__ . '/../userFunction/manageUser.php'); ?>

<?php

$connectionObj = new ManageUser();

$totalNumberOfPages = $connectionObj->pagination();
$limit = 9;
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($current_page - 1) * $limit;

// Perform the search query if the 'search' parameter is present
if (isset($_GET['search'])) {
  $searchInput = $_GET['searchInput'];
  $pageData = $connectionObj->searchWorkers($limit, $offset, $searchInput);
} else {
  $pageData = $connectionObj->currentPageData($limit, $offset);
}
?>

<section style="background-image: url('/../manpowerbd/assests/img/gradent/searchBanner2.png'); background-repeat: no-repeat; background-position: center; background-size: cover;" class="mt-7rem bg-light-gray p-5">
  <div class="my-5 rounded-4 px-3 d-flex justify-content-center align-items-center">
    <form class="d-lg-flex flex-lg-row justify-content-center mt-3 col-12 col-sm-6 mx-auto" role="search" method="get">
      <div>
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="searchInput">
      </div>
      <input type="submit" value="Search" name="search" class="btn btn-success mt-sm-0 mt-3">
  </div>
  </form>
  </div>


  <div id="worker-container" class="row row-cols-1 row-cols-md-3 row-cols-lg-3 g-4 mx-lg-4 ">
    <?php while ($row = mysqli_fetch_assoc($pageData)) { ?>
      <div class="col">
        <div class="card mb-3 bg-card-black p-3">

          <div class="row g-0">
            <div class="col-md-5 text-center">

              <!-- <img class="img-fluid" src="/../manpowerbd/upload/" class="img-fluid rounded-start" alt="Image not found"> -->
              <img style="height: 120px; width:120px" class="img-fluid rounded-circle" src="<?php echo $row['worker_photo']; ?>" class="img-fluid rounded-start" alt="Image not found">


              <?php
              $returnRating = $connectionObj->avg_rating($row['worker_id']);
              echo
              "
                <div class='my-1 text-center'>
                <i class='fa-solid fa-star text-warning'></i>
                <span class='text-white'>$returnRating/5</span>
                </div>
              ";
              ?>

              <div class="text-white text-center">
                <h5 class="card-title light-gray"><?php echo $row['workerType']; ?></h5>
              </div>
            </div>
            <div class="col-md-7">
              <div class="card-body">
                <h5 class="light-gray"><span class="fw-bold">Name:</span> <?php echo $row['worker_full_name']; ?></h5>
                <address class="card-title light-gray"><span class="fw-bold">Address: </span><?php echo $row['present_address']; ?></address>
                <table class="text-white">
                  <tr>
                    <td>Full Day</td>
                    <td>:<?php
                        if ($row['points'] > 100) {
                          echo $row['points'] * 0.03 + 700;
                        } else {
                          echo 700;
                        }
                        ?> BDT</td>
                  </tr>
                  <tr>
                    <td>Hourly</td>
                    <td>:
                      <?php
                      if ($row['points'] > 100) {
                        echo $row['points'] * 0.03 + 100;
                      } else {
                        echo 100;
                      }
                      ?> BDT/hr
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <a href="/../manpowerbd/user/worker-detail.php?id=<?php echo $row['worker_id']; ?>" class="btn btn-warning px-3 py-2 mt-3 font-M">
            <i class="fa-regular fa-eye"></i> View Profile
          </a>
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