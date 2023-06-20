<?php session_start() ?>
<?php include_once(__DIR__ . '/../userFunction/manageUser.php'); ?>
<?php
$connectionObj = new ManageUser();

$workerId = $_GET['id'];
// echo $workerId;
$userId = $_SESSION['user_id'];
$returnData = $connectionObj->viewWorkerProfile(['id' => $workerId], $userId);
$returnReviews = $connectionObj->user_review($workerId, $userId);

// $reviewAndRating = $connectionObj ->userReview(['id' => $workerId])

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
                        <?php echo $returnData['avg_rating']; ?>/5
                    </div>
                    <div class="px-3 text-left">
                        <p>
                            <?php if (isset($returnData['bio'])) {
                                echo $returnData['bio'];
                            } else echo '';  ?>
                        </p>
                    </div>
                </div>
                <div class="card-body ">
                    <h5 class="card-title text-justify fw-semibold"><?php echo $returnData['worker_full_name']; ?></h5>
                    <p class="card-text "><span class="fw-bold">Expert: </span> <?php echo $returnData['workerType']; ?></p>
                    <!-- <p class="card-text "><span class="fw-bold">Charge: </span> 700TK</p> -->
                    <table>
                        <tr>
                            <th>Hiring Option</th>
                            <th>Charge</th>
                        </tr>
                        <tr>
                            <td>Full Day</td>
                            <td>700TK</td>
                        </tr>
                        <tr>
                            <td>Hourly</td>
                            <td>100TK/hr</td>
                        </tr>
                    </table>

                    <p class="card-text "><span class="fw-bold">Gender: </span><?php echo $returnData['gender']; ?></p>
                    <p class="card-text "><span class="fw-bold">Location: </span> <?php echo $returnData['present_address']; ?></p>
                    <a href="#" class="btn btn-outline-success">Heir Now</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-8">
            <?php
            if (!empty($returnReviews)) {
                echo '<script>console.log("Inside if")</script>';
                foreach ($returnReviews as $review) {
                    $profileImage = $review['profileImage'];
                    $userName = $review['UserName'];
                    $reviewDate =  $review['review_date'];
                    $userRating = $review['user_rating'];
                    $userReview = $review['user_review'];
            ?>
                    <div class="card">
                        <div class="card-header d-flex align-items-start gap-4">
                            <div>
                                <img class="rounded-circle" style="height: 60px; width:60px" src="/../manpowerbd/user/upload/<?php echo $profileImage; ?>" alt="">
                            </div>
                            <div>
                                <h6><?php echo $userName; ?></h6>
                                <p class="text-secondary"><?php echo $reviewDate; ?></p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-title">
                                <?php
                                for ($i = 1; $i <= 5; $i++) {
                                    if ($i <= $userRating) {
                                        echo '<i class="fa-solid fa-star text-warning"></i>';
                                    } else {
                                        echo '<i class="fa-solid fa-star"></i>';
                                    }
                                }
                                ?>
                            </div>
                            <p class="card-text">
                                <?php echo $userReview; ?>
                            </p>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo '<p class="text-center">No Review added yet..</p>';
            }
            ?>
            
        </div>

    </div>
</div>