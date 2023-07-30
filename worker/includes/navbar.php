<?php session_start() ?>
<?php include_once(__DIR__ . '/../workerfunction/worker_function.php') ?>
<?php
$connectionObj = new WorkerFunction();
$wID = $_SESSION['worker_id'];
$notification = $connectionObj->new_notification($wID);
$notificationDEtails = $connectionObj->notification_details($wID);

?>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container">
    <a class="navbar-brand" href="/../manpowerbd/index.php"><span class="font-M fs-4"><span class=" fs-2 text-uppercase color-org">M</span>anp<span class=" fs-2 text-uppercase color-org">o</span>wer<span class=" fs-2 text-uppercase color-org">bd</span></span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav m-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/../manpowerbd/worker/worker_home.php">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/../manpowerbd/worker/worker_requested_work.php">Requested Work</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Work History</a>
        </li>
      </ul>
      <div>
        <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="border-0 position-absolute"><i class="fa-sharp fa-solid fa-bell"></i></button>
        <div class="position-relative" style="top: -10px; right: -20px;">
          <small><?php if ($notification > 0) {
                    echo $notification;
                  } ?></small>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Notifications</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="card">
            <div class="card-body">
              <div class="card-title">
                <?php if($notificationDEtails != 'No Notifications Found'){ 
                foreach ($notificationDEtails as $detail) : ?>
                  <p class="card-text">
                    <span class="fw-bold"><?php echo $detail; ?></span> send you a hiring request.
                  </p>
                <?php endforeach; }else{ ?> 
                  <p class="card-text">
                    <span class="fw-bold">No Notification Found</span>
                  </p>
                <?php } 
                ?>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
</nav>