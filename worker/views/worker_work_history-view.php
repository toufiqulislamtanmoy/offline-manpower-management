<?php
include_once(__DIR__ . '/../workerfunction/worker_function.php');

$connectionObj = new WorkerFunction();
$wID = $_SESSION['worker_id'];
$result = $connectionObj->work_history($wID);
?>

</style>
<div class="container mt-4">
    <h2 class="text-center">Work History</h2>
    <hr>

    <div class="mt-5 table-wrapper">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Location</th>
                    <th scope="col">Charge</th>
                    <th scope="col">Transaction ID</th>
                    <th scope="col">Transaction Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $count; ?></th>
                        <td><?php echo $row['UserName']; ?></td>
                        <td><?php echo $row['location']; ?></td>
                        <td><?php echo $row['charge']; ?> BDT</td>
                        <td><?php echo $row['transactionId']; ?></td>
                        <td><?php echo $row['end_date']; ?></td>
                    </tr>
                    <?php
                    $count++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
