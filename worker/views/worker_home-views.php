
<?php include_once(__DIR__ . '/../workerfunction/worker_function.php') ?>

<?php
$connectionObj = new WorkerFunction();
$wID = $_SESSION['worker_id'];
$profile = $connectionObj->WorkerProfile(['id' => $wID]);
$returnReviews = $connectionObj->user_review($wID);
$lifeTimeEarnings = $connectionObj->totalEarnings($wID);
$stringEarnings = implode(", ", $lifeTimeEarnings);
if (isset($_GET['active'])) {
    $status = $_GET['active'];
    $updateStatus = $connectionObj->updateStatus($wID, $status);
}

?>

<script>
    // Function to show a success message using SweetAlert
    function yoouAreOnline(message) {
        Swal.fire({
            icon: 'success',
            title: 'You are Online',
            text: message,
            timer: 1000, // Auto close the alert after 3 seconds
            showConfirmButton: false
        });
        setTimeout(function() {
            window.location.replace('worker_home.php');
        }, 2000);
    }

    // Function to show an error message using SweetAlert
    function yoouAreOffline(message) {
        Swal.fire({
            icon: 'success',
            title: 'You are Offline',
            text: message,
            timer: 3000, // Auto close the alert after 3 seconds
            showConfirmButton: false
        });
        setTimeout(function() {
            window.location.replace('worker_home.php');
        }, 2000);
    }

    // Check if the PHP variable $result is set and contains a value
    <?php if (isset($updateStatus)) { ?>
        <?php if ($updateStatus === "Online") { ?>
            yoouAreOnline("<?php echo $updateStatus; ?>");
        <?php } else { ?>
            yoouAreOffline("<?php echo $updateStatus; ?>");
        <?php } ?>
    <?php } ?>
</script>

<div class="container mt-7rem ">
    <div class="row">
        <div class="col-12 col-sm-4">
            <!-- Content for the 5-column section -->
            <div class="card">
                <div class="py-md-3 ">
                    <div class="my-1 text-center">
                        <img style="height: 220px; width:220px" src="<?php echo $profile['worker_photo']; ?>" class="card-img-top rounded-circle border border-5 border-secondary shadow-lg" alt="...">
                    </div>
                    <div class="my-1 text-center">
                        <i class="fa-solid fa-star"></i>
                        <?php echo $profile['avg_rating']; ?>/5
                    </div>
                    <div id="" class="text-center">Status:
                        <?php
                        $worker_status = $profile['worker_status'];
                        if ($worker_status == 1) { ?>
                            <a href="worker_home.php?active=0"><i id="" class="fa-solid text-success fa-toggle-on cursor-p"></i></a>
                        <?php } else { ?>
                            <a href="worker_home.php?active=1"><i id="" class="fa-solid fa-toggle-off cursor-p"></i></a>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="px-3 text-center mt-2">
                        <h5 class="card-text "><span class="fw-bold">Total Earnings: </span> <?php echo !empty($stringEarnings) ? $stringEarnings : '0'; ?>
                            BDT</h5>
                    </div>
                </div>
                <div class="card-body ">
                    <h5 class="card-title text-justify fw-semibold"><?php echo $profile['worker_full_name']; ?></h5>
                    <p class="card-text "><span class="fw-bold">Expert: </span> <?php echo $profile['workerType']; ?></p>
                    <p class="card-text "><span class="fw-bold">Gender: </span><?php echo $profile['gender']; ?></p>
                    <p class="card-text "><span class="fw-bold">Phone: </span>+<?php echo $profile['worker_phone_number']; ?></p>
                    <p class="card-text "><span class="fw-bold">Location: </span> <?php echo $profile['present_address']; ?></p>
                    <!-- <a href="#" class="btn btn-outline-success">Heir Now</a> -->
                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#workerUpdateProfileModal" data-bs-whatever="@mdo">Update Profile</button>



                    <!-- Modal Content -->
                    <div class="modal fade " id="workerUpdateProfileModal" tabindex="-1" aria-labelledby="workerUpdateProfileModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="workerUpdateProfileModalLabel">Update Profile</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="updatePhoneNumber" class="col-form-label">Update Number:</label>
                                            <input type="text" class="form-control" id="updatePhoneNumber" name="updatePhoneNumber" value="<?php echo $profile['worker_phone_number']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="updateCurrentAddress" class="col-form-label">Update Current Address:</label>
                                            <input type="text" class="form-control" id="updateCurrentAddress" placeholder="Enter Update Address" name="updateCurrentAddress" value="<?php echo $profile['present_address']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="updateProfilePic" class="col-form-label">Update Profile:</label>
                                            <input type="file" class="form-control input-border" id="updateProfilePic" name="updateProfilePic">

                                        </div>
                                        <input type="submit" value="Update Profile" class="btn btn-outline-success" name="update">
                                    </form>

                                    <script>
                                        // Function to toggle the Hours input field and its read-only state
                                        function toggleHoursInput(enable) {
                                            const hourlyInput = document.getElementById('hourlyInput');
                                            const hoursInput = document.getElementById('hour');

                                            if (enable) {
                                                hourlyInput.style.display = 'block';
                                                hoursInput.readOnly = false;
                                            } else {
                                                hourlyInput.style.display = 'none';
                                                hoursInput.readOnly = true;
                                            }

                                            // Recalculate the salary whenever the hiring type is changed
                                            calculateSalary();
                                        }

                                        // Function to calculate the salary based on the hiring type and hours worked
                                        function calculateSalary() {
                                            const fullDaySalary = parseFloat(document.getElementById('fullDaySalary').value);
                                            const hourlySalary = parseFloat(document.getElementById('hourlySalary').value);
                                            const hoursInput = document.getElementById('hour');

                                            if (document.getElementById('inlineRadio1').checked) {
                                                // Full Day hiring selected
                                                document.getElementById('salary').value = fullDaySalary.toFixed(2);
                                            } else if (document.getElementById('inlineRadio2').checked) {
                                                // Hourly hiring selected
                                                const hoursWorked = parseFloat(hoursInput.value);
                                                if (!isNaN(hoursWorked)) {
                                                    const totalSalary = hourlySalary * hoursWorked;
                                                    document.getElementById('salary').value = totalSalary.toFixed(2);
                                                }
                                            }
                                        }

                                        // Get the radio button elements
                                        const hourlyRadio = document.getElementById('inlineRadio2');
                                        const hourlyInput = document.getElementById('hourlyInput');

                                        // Add event listeners to detect changes in the radio buttons and hours input
                                        hourlyRadio.addEventListener('change', function() {
                                            // If the "Hourly" radio button is selected, show the "Hours" input field; otherwise, hide it
                                            if (this.checked) {
                                                if (this.value === 'Hourly') {
                                                    toggleHoursInput(true);
                                                } else {
                                                    toggleHoursInput(false);
                                                }
                                            }
                                        });

                                        // Add an event listener to the hours input field to recalculate the salary when hours are changed
                                        document.getElementById('hour').addEventListener('input', calculateSalary);

                                        // Call the calculateSalary() function initially to set the correct salary based on the default hiring option
                                        calculateSalary();
                                    </script>


                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Content End -->
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
                                <img class="rounded-circle" style="height: 60px; width:60px" src="<?php echo $profileImage; ?>" alt="">
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