<?php include_once(__DIR__ . '/../userFunction/manageUser.php'); ?>

<?php

    $connectionObj = new ManageUser();
    $returnData = $connectionObj -> displayWorkerInUserInterFace();
?>

<section class="mt-7rem bg-light-gray p-5">
  <div id="worker-container" class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
    <?php while ($row = mysqli_fetch_assoc($returnData)) { ?>
      <div class="col">
        <div class="card mb-3 bg-card-black p-3">
          <h5 class="text-center light-gray font-M">Name: <?php echo $row['worker_full_name']; ?></h5>
          <div class="row g-0">
            <div class="col-md-4">
            
              <!-- <img class="img-fluid" src="/../manpowerbd/upload/" class="img-fluid rounded-start" alt="Image not found"> -->
              <img class="img-fluid" src="/../manpowerbd/worker/upload/<?php echo $row['worker_photo']; ?>" class="img-fluid rounded-start" alt="Image not found">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title light-gray">Type: <?php echo $row['workerType']; ?></h5>
                <p class="card-text light-gray"><i class="fa-solid fa-phone-volume"></i> <?php echo $row['worker_phone_number']; ?></p>
                <div class="ratings mb-2 text-warning">
                  <i class="fa-solid fa-star greenyellow-color"></i>
                  <i class="fa-solid fa-star greenyellow-color"></i>
                  <i class="fa-solid fa-star greenyellow-color"></i>
                  <i class="fa-solid fa-star greenyellow-color"></i>
                  <i class="fa-solid fa-star"></i>
                </div>
                <address class="card-title light-gray">Address: <?php echo $row['present_address']; ?></address>
                <div>
                  <a href="" class="btn btn-warning px-3 py-2 mt-3 font-M">
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
</section>