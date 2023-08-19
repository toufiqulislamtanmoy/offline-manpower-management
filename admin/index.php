<?php
    
    include('functions/connection.php');
    include('includes/header.php');
    include('includes/navbar.php');
    $data = new Test();
    $user_value = $data->user_count();
    $worker_value = $data->worker_count();
    
    

?>

                <div class="pcoded-main-container">
                    <div class="pcoded-wrapper">
<?php include('includes/sidenav.php');  ?>
                        <div class="pcoded-content">
                            <div class="pcoded-inner-content">
                                <div class="main-body">
                                    <div class="page-wrapper">

                                        <div class="page-body">
                                            <div class="row">

                                                <!-- order-card start -->
                                                <div class="col-md-6 col-xl-3">
                                                    <div class="card bg-c-green order-card">
                                                        <div class="card-block">
                                                            <h6 class="m-b-20">Total User</h6>
                                                            <h2 class="text-right"><i
                                                                    class="ti-user f-left"></i><span><?php echo $user_value; ?></span></h2>
                                                            <p class="m-b-0">This Month<span class="f-right">213</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-xl-3">
                                                    <div class="card bg-c-blue order-card">
                                                        <div class="card-block">
                                                            <h6 class="m-b-20">Total Worker</h6>
                                                            <h2 class="text-right"><i
                                                                    class="ti-user f-left"></i><span><?php echo $worker_value; ?></span></h2>
                                                            <p class="m-b-0">Completed Services<span
                                                                    class="f-right">351</span></p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-xl-3">
                                                    <div class="card bg-c-yellow order-card">
                                                        <div class="card-block">
                                                            <h6 class="m-b-20">Revenue</h6>
                                                            <h2 class="text-right"><i
                                                                    class="ti-reload f-left"></i><span>$42,562</span>
                                                            </h2>
                                                            <p class="m-b-0">This Month<span
                                                                    class="f-right">$5,032</span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-xl-3">
                                                    <div class="card bg-c-pink order-card">
                                                        <div class="card-block">
                                                            <h6 class="m-b-20">Total Profit</h6>
                                                            <h2 class="text-right"><i
                                                                    class="ti-layout-sidebar-left f-left"></i><span>$9,562</span>
                                                            </h2>
                                                            <p class="m-b-0">This Month<span class="f-right">$542</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- order-card end -->

                                                <!-- statistic and process start -->
                                                <div class="col-lg-8 col-md-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h5>Statistics</h5>
                                                            <div class="card-header-right">
                                                                <ul class="list-unstyled card-option">
                                                                    <li><i class="fa fa-chevron-left"></i></li>
                                                                    <li><i class="fa fa-window-maximize full-card"></i>
                                                                    </li>
                                                                    <li><i class="fa fa-minus minimize-card"></i></li>
                                                                    <li><i class="fa fa-refresh reload-card"></i></li>
                                                                    <li><i class="fa fa-times close-card"></i></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="card-block">
                                                            <canvas id="Statistics-chart" height="200"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h5>Customer Feedback</h5>
                                                        </div>
                                                        <div class="card-block">
                                                            <span
                                                                class="d-block text-c-blue f-24 f-w-600 text-center">365247</span>
                                                            <canvas id="feedback-chart" height="100"></canvas>
                                                            <div class="row justify-content-center m-t-15">
                                                                <div class="col-auto b-r-default m-t-5 m-b-5">
                                                                    <h4>83%</h4>
                                                                    <p class="text-success m-b-0"><i
                                                                            class="ti-hand-point-up m-r-5"></i>Positive
                                                                    </p>
                                                                </div>
                                                                <div class="col-auto m-t-5 m-b-5">
                                                                    <h4>17%</h4>
                                                                    <p class="text-danger m-b-0"><i
                                                                            class="ti-hand-point-down m-r-5"></i>Negative
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- statustic and process end -->
                                                <!-- tabs card start -->

                                                <!-- tabs card end -->

                                                <!-- social statustic start -->
                                                <div class="col-md-12 col-lg-4">
                                                    <div class="card">
                                                        <div class="card-block text-center">
                                                            <i class="fa fa-envelope-open text-c-blue d-block f-40"></i>
                                                            <h4 class="m-t-20"><span class="text-c-blue">8.62k</span>
                                                                Subscribers</h4>
                                                            <p class="m-b-20">Your main list is growing</p>
                                                            <button class="btn btn-primary btn-sm btn-round">Manage
                                                                List</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-4">
                                                    <div class="card">
                                                        <div class="card-block text-center">
                                                            <i class="fa fa-twitter text-c-green d-block f-40"></i>
                                                            <h4 class="m-t-20"><span class="text-c-blgreenue">+40</span>
                                                                Followers</h4>
                                                            <p class="m-b-20">Your main list is growing</p>
                                                            <button class="btn btn-success btn-sm btn-round">Check them
                                                                out</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-lg-4">
                                                    <div class="card">
                                                        <div class="card-block text-center">
                                                            <i class="fa fa-puzzle-piece text-c-pink d-block f-40"></i>
                                                            <h4 class="m-t-20">Business Plan</h4>
                                                            <p class="m-b-20">This is your current active plan</p>
                                                            <button class="btn btn-danger btn-sm btn-round">Upgrade to
                                                                VIP</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- social statustic end -->



                                            </div>
                                        </div>

                                        <div id="styleSelector">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Warning Section Starts -->
            <!-- Older IE warning message -->
            <!--[if lt IE 9]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
            <!-- Warning Section Ends -->
            <!-- Required Jquery -->
            <script type="text/javascript" src="assets/js/jquery/jquery.min.js"></script>
            <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js"></script>
            <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
            <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js"></script>
            <!-- jquery slimscroll js -->
            <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
            <!-- modernizr js -->
            <script type="text/javascript" src="assets/js/modernizr/modernizr.js"></script>
            <!-- am chart -->
            <script src="assets/pages/widget/amchart/amcharts.min.js"></script>
            <script src="assets/pages/widget/amchart/serial.min.js"></script>
            <!-- Chart js -->
            <script type="text/javascript" src="assets/js/chart.js/Chart.js"></script>
            <!-- Todo js -->
            <script type="text/javascript " src="assets/pages/todo/todo.js "></script>
            <!-- Custom js -->
            <script type="text/javascript" src="assets/pages/dashboard/custom-dashboard.min.js"></script>
            <script type="text/javascript" src="assets/js/script.js"></script>
            <script type="text/javascript " src="assets/js/SmoothScroll.js"></script>
            <script src="assets/js/pcoded.min.js"></script>
            <script src="assets/js/vartical-demo.js"></script>
            <script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    </body>

</html>