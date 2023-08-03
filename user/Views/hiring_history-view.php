<?php include_once(__DIR__ . '/../userfunction/manageUser.php'); ?>
<?php
$connectionObj = new ManageUser();
$uId = $_SESSION['user_id'];
$result = $connectionObj->Hiring_history($uId);
?>

</style>
<div class="container mt-4">
    <h2 class="text-center mt-10rem">Hiring History</h2>
    <hr>

    <div class="mt-5 table-wrapper">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Worker Name</th>
                    <th scope="col">Worker Type</th>
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
                        <td><?php echo $row['worker_full_name']; ?></td>
                        <td><?php echo $row['workerType']; ?></td>
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
