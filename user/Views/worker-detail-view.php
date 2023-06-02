<?php include_once(__DIR__ . '/../userFunction/manageUser.php'); ?>
<?php
$connectionObj = new ManageUser();
$isDisabled = true;
$workerId = $_GET['id'];
// echo $workerId;

$returnData = $connectionObj->viewWorkerProfile(['id' => $workerId]);
?>

<script>
    var workerId = "<?php echo $workerId; ?>"; // Pass the workerId variable to JavaScript
    console.log(workerId); // Output the worker ID in the browser console
</script>

<?php




?>

<div class="container mt-7rem ">
    <div class="row">
        <div class="col-12 col-sm-4">
            <!-- Content for the 5-column section -->
            <div class="card">
                <div class="py-md-3 ">
                    <div class="my-1 text-center">
                        <img style="height: 220px; width:220px" src="/../manpowerbd/worker/upload/<?php echo $returnData['worker_photo']; ?>" class="card-img-top rounded-circle border border-5 border-secondary shadow-lg" alt="...">
                    </div>
                    <div class="my-1 text-center">
                        <i class="fa-solid fa-star"></i>
                        5/5
                    </div>
                    <div class="px-3 text-left">
                        <p>
                        <?php if(isset($returnData['bio'])){echo $returnData['bio'];}else echo '';  ?>
                        </p>
                    </div>
                </div>
                <div class="card-body ">
                    <h5 class="card-title text-justify fw-semibold"><?php echo $returnData['worker_full_name']; ?></h5>
                    <p class="card-text "><span class="fw-bold">Expert: </span> <?php echo $returnData['workerType']; ?></p>
                    <p class="card-text "><span class="fw-bold">Charge: </span> 700TK</p>
                    <p class="card-text "><span class="fw-bold">Gender: </span><?php echo $returnData['gender']; ?></p>
                    <p class="card-text "><span class="fw-bold">Location: </span> <?php echo $returnData['present_address']; ?></p>
                    <a href="#" class="btn btn-outline-success">Heir Now</a>
                    <button <?php if ($isDisabled) echo 'disabled'; ?> class="btn btn-outline-info">Pay Now</button>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-8 ">
            <!-- Content for the 7-column section -->
            <div class="card">
                <div class="card-header d-flex align-items-start gap-4">
                    <div>
                        <img class="rounded-circle" style="height: 60px; width:60px" src="/../manpowerbd/assests/img/team/2.jpg" alt="">
                    </div>
                    <div>
                        <h6>Tansika Tamanna</h6>
                        <p class="text-secondary">03/05/2023</p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-title">
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <p class="card-text">
                        With supporting text below as a natural lead-in to additional content. With supporting text below as a natural lead-in to additional content.
                    </p>
                </div>
            </div>
            <div class="card">
                <div class="card-header d-flex align-items-start gap-4">
                    <div>
                        <img class="rounded-circle" style="height: 60px; width:60px" src="/../manpowerbd/assests/img/team/2.jpg" alt="">
                    </div>
                    <div>
                        <h6>Tansika Tamanna</h6>
                        <p class="text-secondary">03/05/2023</p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-title">
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <p class="card-text">
                        With supporting text below as a natural lead-in to additional content. With supporting text below as a natural lead-in to additional content.
                    </p>
                </div>
            </div>
            <div class="card">
                <div class="card-header d-flex align-items-start gap-4">
                    <div>
                        <img class="rounded-circle" style="height: 60px; width:60px" src="/../manpowerbd/assests/img/team/2.jpg" alt="">
                    </div>
                    <div>
                        <h6>Tansika Tamanna</h6>
                        <p class="text-secondary">03/05/2023</p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-title">
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <p class="card-text">
                        With supporting text below as a natural lead-in to additional content. With supporting text below as a natural lead-in to additional content.
                    </p>
                </div>
            </div>
            <div class="card">
                <div class="card-header d-flex align-items-start gap-4">
                    <div>
                        <img class="rounded-circle" style="height: 60px; width:60px" src="/../manpowerbd/assests/img/team/2.jpg" alt="">
                    </div>
                    <div>
                        <h6>Tansika Tamanna</h6>
                        <p class="text-secondary">03/05/2023</p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-title">
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <p class="card-text">
                        With supporting text below as a natural lead-in to additional content. With supporting text below as a natural lead-in to additional content.
                    </p>
                </div>
            </div>
            <div class="card">
                <div class="card-header d-flex align-items-start gap-4">
                    <div>
                        <img class="rounded-circle" style="height: 60px; width:60px" src="/../manpowerbd/assests/img/team/2.jpg" alt="">
                    </div>
                    <div>
                        <h6>Tansika Tamanna</h6>
                        <p class="text-secondary">03/05/2023</p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-title">
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <p class="card-text">
                        With supporting text below as a natural lead-in to additional content. With supporting text below as a natural lead-in to additional content.
                    </p>
                </div>
            </div>
            <div class="card">
                <div class="card-header d-flex align-items-start gap-4">
                    <div>
                        <img class="rounded-circle" style="height: 60px; width:60px" src="/../manpowerbd/assests/img/team/2.jpg" alt="">
                    </div>
                    <div>
                        <h6>Tansika Tamanna</h6>
                        <p class="text-secondary">03/05/2023</p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-title">
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <p class="card-text">
                        With supporting text below as a natural lead-in to additional content. With supporting text below as a natural lead-in to additional content.
                    </p>
                </div>
            </div>
            <div class="card">
                <div class="card-header d-flex align-items-start gap-4">
                    <div>
                        <img class="rounded-circle" style="height: 60px; width:60px" src="/../manpowerbd/assests/img/team/2.jpg" alt="">
                    </div>
                    <div>
                        <h6>Tansika Tamanna</h6>
                        <p class="text-secondary">03/05/2023</p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-title">
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <p class="card-text">
                        With supporting text below as a natural lead-in to additional content. With supporting text below as a natural lead-in to additional content.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>