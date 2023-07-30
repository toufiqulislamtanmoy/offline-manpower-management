<?php include_once(__DIR__ . '/../workerfunction/worker_function.php') ?>

<?php
$connectionObj = new WorkerFunction();
$wID = $_SESSION['worker_id'];

$request_result = $connectionObj->worker_request_list($wID);

if (isset($_POST['cancel_request'])) {
    $hireID = $_POST['hire_id'];
    $returnData = $connectionObj->worker_task_management($hireID, 'No');
}
if (isset($_POST['accept_request'])) {
    $hireID = $_POST['hire_id'];
    $returnData = $connectionObj->worker_task_management($hireID, 'Yes');
}
?>



<!-- Add this in your HTML file's body section -->
<script>
    // Function to show a success message using SweetAlert
    function showAcceptedMessage(message) {
        Swal.fire({
            icon: 'success',
            title: 'Task Accepted',
            text: message,
            timer: 3000, // Auto close the alert after 3 seconds
            showConfirmButton: false
        });
        setTimeout(function() {
            window.location.replace(window.location.href);
        }, 2000);
    }

    // Function to show an error message using SweetAlert
    function showRejectedMessage(message) {
        Swal.fire({
            icon: 'error',
            title: 'Task Deny',
            text: message
        });
        setTimeout(function() {
            window.location.replace(window.location.href);
        }, 2000);
    }

    // Check if the PHP variable $result is set and contains a value
    <?php if (isset($returnData)) { ?>
        <?php if ($returnData === "Accepted") { ?>
            showAcceptedMessage("<?php echo $returnData; ?>");
        <?php } else { ?>
            showRejectedMessage("<?php echo $returnData; ?>");
        <?php } ?>
    <?php } ?>
</script>

<section style="min-height: 400px;" class="mt-2bg-light-gray p-5">

    <div style="background-image: url('/../manpowerbd/assests/img/gradent/searchBanner2.png'); background-repeat: no-repeat; background-position: center; background-size: cover;" class="row row-cols-1 row-cols-md-3 row-cols-lg-3 gap-3 mx-lg-4 p-3">
        <?php foreach ($request_result as $row) : ?>
            <div class="card">
                <div class="text-center">
                    <img style="height: 220px; width: 220px;" src="<?php echo $row['profileImage']; ?>" class="rounded-circle p-2" alt="...">
                </div>
                <div class="card-body">
                    <span class="card-title">
                        <h5 class="d-inline-block"><?php echo $row['UserName']; ?></h5>
                    </span>
                    <p class="card-text">
                        <span class="fw-bold">Location: </span><?php echo $row['userAddress']; ?>
                    </p>
                    <p class="card-text">
                        <span class="fw-bold">Hire Date: </span><?php echo $row['start_date']; ?>
                    </p>
                    <p class="card-text">
                        <span class="fw-bold">End Date: </span><?php echo $row['end_date']; ?>
                    </p>
                    <p class="card-text">
                        <span class="fw-bold">Method: </span><?php echo $row['working_method']; ?>
                    </p>
                    <p class="card-text">
                        <span class="fw-bold">Working Hour: </span><?php echo $row['working_hour']; ?>
                    </p>
                    <p class="card-text">
                        <span class="fw-bold">Total Amount: </span><?php echo $row['charge']; ?> BDT
                    </p>

                    <?php if ($row['accept'] == "Yes") : ?>
                        <p class="text-success">You have accepted the task.</p>
                    <?php elseif ($row['accept'] == "No") : ?>
                        <p class="text-danger">You have denied the task.</p>
                    <?php else : ?>
                        <form method="post">
                            <input type="hidden" name="hire_id" value="<?php echo $row['hire_id']; ?>">
                            <input class="btn btn-success" type="submit" value="Accept Request" name="accept_request">
                            <input class="btn btn-danger" type="submit" value="Cancel Request" name="cancel_request">
                        </form>
                    <?php endif; ?>


                </div>
            </div>
        <?php endforeach; ?>
    </div>

    </div>
</section>