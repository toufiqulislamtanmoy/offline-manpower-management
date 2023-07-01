<?php session_start() ?>
<?php include_once(__DIR__ . '/../userFunction/manageUser.php'); ?>
<?php
$connectionObj = new ManageUser();

$userId = $_SESSION['user_id'];

$user = $connectionObj->user_details($userId);
?>
<section class="container mt-7rem">
    <div class=" bg-light-gray p-5 ">
        <div class="card mb-3 rounded-4" >
            <div class="d-lg-flex align-items-center">
                <div class=" p-3">
                    <img style="height: 220px; width:220px" src="<?php echo $user['profileImage']; ?>" class="img-fluid rounded-circle" alt="...">
                </div>
                <div class="">
                    <div class="card-body">
                        <h5 class="card-title fw-bold"><?php echo $user['UserName']; ?></h5>
                        <p class="card-text"><small class="text-muted"><?php echo $user['userEmail']; ?></small></p>
                        <p class="card-text"><small class="text-muted"><?php echo $user['userPhone']; ?></small></p>
                        <p class="card-text"><small class="text-muted"><?php echo $user['userAddress']; ?></small></p>
                        <button class="btn btn-success">Edit Profile</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>