<?php include_once(__DIR__ . '/userFunction/manageUser.php'); ?>

<?php $connectionObj = new ManageUser(); ?>

<?php
$hire_id =  $_GET['hireId'];
// echo $hire_id;
if (isset($_POST['feedback'])){
    $result = $connectionObj->add_feedback($hire_id,$_POST);
    if(isset($result)){
        header("Location: success_notice.php");
    }
}
    
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <link rel="stylesheet" href="jquery.rateyo.css" />
    <title>Rating</title>
</head>

<body>
    <div class="container position-relative" style="top: 20%;">
        <div class="my-5">
            <h2 class="text-center">Please Submit The Review</h2>
        </div>
        <form method="post">
            <div class="w-100">
                <div class="d-flex align-items-center justify-content-center">
                    <div id="rateYo"></div>
                    <input class="d-none" type="text" name="rating" id="ratingValue">
                </div>

                <div class="input-group my-2 row">
                    <div class="col-sm-6 col-md-8 col-lg-12">
                        <textarea placeholder="Enter Your Review" name="review" class="form-control"></textarea>
                    </div>
                </div>

            </div>
            <input type="submit" value="Submit Review" name="feedback" class="btn btn-info">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <!-- Include jQuery library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

    <script>
        /* Javascript */

        $(function() {
            var $rateYo = $("#rateYo");
            var $ratingValue = $("#ratingValue");

            $rateYo.rateYo({
                starWidth: "40px",
                rating: 0, // Set initial rating value

                onSet: function(rating, rateYoInstance) {
                    // Update the rating value input field with the current rating
                    $ratingValue.val(rating);
                }
            });
        });
    </script>

</body>

</html>