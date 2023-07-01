<?php include_once(__DIR__ . '/../userFunction/manageUser.php'); ?>
<?php
$connectionObj = new ManageUser();

$workerId = $_GET['id'];
// echo $workerId;
$userId = $_SESSION['user_id'];
$returnData = $connectionObj->viewWorkerProfile(['id' => $workerId], $userId);
$returnReviews = $connectionObj->user_review($workerId, $userId);
$user = $connectionObj->user_details($userId);
// worker hiring process start here
if (isset($_POST['hire'])) {
    $result = $connectionObj->hiring($_POST, $userId, $workerId);
}
?>
<!-- Add this in your HTML file's body section -->
<script>
    // Function to show a success message using SweetAlert
    function showSuccessMessage(message) {
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: message,
            timer: 3000, // Auto close the alert after 3 seconds
            showConfirmButton: false
        });
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
    <?php if (isset($result)) { ?>
        <?php if ($result === "Success") { ?>
            showSuccessMessage("<?php echo $result; ?>");
        <?php } else { ?>
            showErrorMessage("<?php echo $result; ?>");
        <?php } ?>
    <?php } ?>
</script>

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
                            <td>
                                <?php
                                if ($returnData['points'] > 100) {
                                    echo $returnData['points'] * 0.03 + 700;
                                    $salary = $returnData['points'] * 0.03 + 700;
                                } else {
                                    echo 700;
                                    $salary = 700;
                                }
                                ?> BDT
                            </td>
                        </tr>
                        <tr>
                            <td>Hourly</td>
                            <td>
                                <?php
                                if ($returnData['points'] > 100) {
                                    echo $returnData['points'] * 0.03 + 100;
                                    $hourSalary = $returnData['points'] * 0.03 + 100;
                                } else {
                                    echo 100;
                                    $hourSalary = 100;
                                }
                                ?> BDT/hr
                            </td>
                        </tr>
                    </table>

                    <p class="card-text "><span class="fw-bold">Gender: </span><?php echo $returnData['gender']; ?></p>
                    <p class="card-text "><span class="fw-bold">Location: </span> <?php echo $returnData['present_address']; ?></p>
                    <!-- <a href="#" class="btn btn-outline-success">Heir Now</a> -->
                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#hireNowModal" data-bs-whatever="@mdo">Hire Now</button>



                    <!-- Modal Content -->
                    <div class="modal fade " id="hireNowModal" tabindex="-1" aria-labelledby="hireNowModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="hireNowModalLabel">Hiring Method</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post">
                                        <div class="mb-3">
                                            <label for="user_name" class="col-form-label">Name:</label>
                                            <input readonly type="text" class="form-control" id="user_name" name="user_name" value="<?php echo $user['UserName']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="working_date" class="col-form-label">Working Date:</label>
                                            <input type="date" class="form-control" id="working_date" name="working_date">
                                        </div>
                                        <div class="mb-3">
                                            <label for="hiringType" class="col-form-label">Hiring Type:</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="hiringType" id="inlineRadio1" value="Full Day" onclick="toggleHoursInput(false)">
                                                <label class="form-check-label" for="inlineRadio1">Full Day</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="hiringType" id="inlineRadio2" value="Hourly" onclick="toggleHoursInput(true)">
                                                <label class="form-check-label" for="inlineRadio2">Hourly</label>
                                            </div>
                                            <div class="mb-3" id="hourlyInput" style="display: none;">
                                                <label for="hour" class="col-form-label">Hours:</label>
                                                <input required type="text" class="form-control" id="hour" name="hour" placeholder="How many hours need to work?">
                                            </div>
                                            <!-- Add a hidden field to store the full-day and hourly salary values -->
                                            <input type="hidden" id="fullDaySalary" value="<?php echo $salary; ?>">
                                            <input type="hidden" id="hourlySalary" name="working_hour" value="<?php echo $hourSalary; ?>">

                                            <!-- Display the salary based on hiring type using JavaScript -->
                                            <div class="mb-3">
                                                <label for="salary" class="col-form-label">Salary:</label>
                                                <input readonly type="text" class="form-control" id="salary" name="salary" value="">
                                            </div>
                                        </div>
                                        <input type="submit" value="Hire" class="btn btn-outline-success" name="hire">
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