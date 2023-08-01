<?php include_once(__DIR__ . '/userFunction/manageUser.php'); ?>

<?php $connectionObj = new ManageUser(); ?>


<?php
$val_id = urlencode($_POST['val_id']);
$store_id = urlencode("manpo64a168b85464d");
$store_passwd = urlencode("manpo64a168b85464d@ssl");
$requested_url = ("https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php?val_id=" . $val_id . "&store_id=" . $store_id . "&store_passwd=" . $store_passwd . "&v=1&format=json");

$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $requested_url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false); # IF YOU RUN FROM LOCAL PC
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); # IF YOU RUN FROM LOCAL PC

$result = curl_exec($handle);

$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if ($code == 200 && !(curl_errno($handle))) {

	# TO CONVERT AS ARRAY
	# $result = json_decode($result, true);
	# $status = $result['status'];

	# TO CONVERT AS OBJECT
	$result = json_decode($result);

	# TRANSACTION INFO
	$status = $result->status;
	$tran_date = $result->tran_date;
	$tran_id = $result->tran_id;
	$val_id = $result->val_id;
	$amount = $result->amount;
	$store_amount = $result->store_amount;
	$bank_tran_id = $result->bank_tran_id;
	$card_type = $result->card_type;

	# EMI INFO
	$emi_instalment = $result->emi_instalment;
	$emi_amount = $result->emi_amount;
	$emi_description = $result->emi_description;
	$emi_issuer = $result->emi_issuer;

	# ISSUER INFO
	$card_no = $result->card_no;
	$card_issuer = $result->card_issuer;
	$card_brand = $result->card_brand;
	$card_issuer_country = $result->card_issuer_country;
	$card_issuer_country_code = $result->card_issuer_country_code;

	# API AUTHENTICATION
	$APIConnect = $result->APIConnect;
	$validated_on = $result->validated_on;
	$gw_version = $result->gw_version;

	// echo $status;
	// echo $tran_date;
	// echo $tran_id;
	// echo $amount;
	$hireId =  $_GET['hire_id'];

	$returnData = $connectionObj->payment_success($hireId, $tran_id, $tran_date);

	if ($returnData == "success") {
	}
} else {

	echo "Failed to connect with SSLCOMMERZ";
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
	<div class="container position-relative top-50">
		<form method="post">
			<div class="w-100">
				<div class="d-flex align-items-center justify-content-center">
					<div id="rateYo"></div>
					<input class="d-none" type="text" name="rating" id="ratingValue">
				</div>

				<div class="input-group my-2 row">
					<div class="col-sm-6 col-md-8 col-lg-12">
						<textarea class="form-control"></textarea>
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