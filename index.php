<?php
require_once 'mysqlCon.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>IPSERVERONE</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="res/css/bootstrap.min.css" rel="stylesheet">
	<link href="res/css/ipserverone.css" rel="stylesheet">
	<style type="text/css">
	* {
		font-size: 14px;
	}
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12" style="max-width:500px;">
				<h1>Sign up for our DS-X4+ plan</h1>
				<br />
				<form role="form" method="get" action="sendQuotation.php">
					<h3>Your business name</h3>
			    <div class="form-group" style="margin-bottom:30px;">
			      <label class="sr-only" for="businessName">Business name</label>
			      <input type="text" class="form-control" id="businessName" placeholder="" name="businessName">
			    </div>

			    <h3>About your business</h3>
			    <div class="form-group">
			      <label class="sr-only" for="address">Address</label>
			      <input type="text" class="form-control" id="address" placeholder="Address" name="address">
			    </div>
			    <div class="form-group">
			      <label class="sr-only" for="country">Select list (select one):</label>
			      <select class="form-control" id="country" name="country">
			      	<option value="" selected="selected">- Please Select -</option>
			        <option value="Indonesia">Indonesia</option>
			        <option value="Malaysia">Malaysia</option>
			      </select>
			    </div>
			    <div class="row">
			    	<div class="col-xs-7" style="padding-right:0;">
				    	<div class="form-group">
					      <label class="sr-only" for="city">City</label>
					      <input type="text" class="form-control" id="city" placeholder="City" name="city">
					    </div>
				    </div>
				    <div class="col-xs-5" style="padding-left:5px;">
					    <div class="form-group">
					      <label class="sr-only" for="postal">Postal / Zip Code</label>
					      <input type="text" class="form-control" id="postal" placeholder="Postal / Zip Code" name="postal">
					    </div>
				  	</div>
			    </div>
			    <div class="row">
			    	<div class="col-xs-5" style="padding-right:0;">
				    	<div class="form-group">
					      <label class="sr-only" for="phone">Phone</label>
					      <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone">
					    </div>
				    </div>
				    <div class="col-xs-7" style="padding-left:5px;">
					    <div class="form-group">
					      <label class="sr-only" for="businessEmail">Business email</label>
					      <input type="text" class="form-control" id="businessEmail" placeholder="Business email" name="businessEmail">
					    </div>
				  	</div>
			    </div>

			    <h3>About you</h3>
			    <div class="row">
			    	<div class="col-xs-6" style="padding-right:0;">
				    	<div class="form-group">
					      <label class="sr-only" for="firstName">First Name</label>
					      <input type="text" class="form-control" id="firstName" placeholder="First Name" name="firstName">
					    </div>
				    </div>
				    <div class="col-xs-6" style="padding-left:5px;">
					    <div class="form-group">
					      <label class="sr-only" for="lastName">Last Name</label>
					      <input type="text" class="form-control" id="lastName" placeholder="Last Name" name="lastName">
					    </div>
				  	</div>
			    </div>
		    	<div class="form-group">
			      <label class="sr-only" for="email">Your email</label>
			      <input type="text" class="form-control" id="email" placeholder="Your email" name="email">
			    </div>

			    <?php 
				  	// $itemSql = "SELECT item FROM item";
						// $itemResults = $conn->query($itemSql);
						// while($itemRow = $itemResults->fetch_assoc()) {
					    ?>
					    <!-- <div style="padding-top:5px;">
						    <?php echo $itemRow['item']; ?> 
						    <div class="form-group">
						      <label class="sr-only" for="<?php echo $itemRow['item']; ?>">Enter quantity</label>
						      <input type="text" class="form-control" id="<?php echo $itemRow['item']; ?>" placeholder="Enter quantity" name="item[<?php echo $itemRow['item']; ?>]">
						    </div>
					    </div> -->
					    <?php
				  	// }
			    ?>
			    <input type="hidden" name="item[DS-X4+]" value="1" />

			    <br />
			    <button type="submit" class="btn btn-default">Submit</button>
			  </form>
		  </div>
	  </div>
	</div>

	<script src="res/js/jquery-1.11.2.min.js"></script>
	<script src="res/js/jquery.cookie.js"></script>
	<script src="res/js/bootstrap.min.js"></script>
</body>
</html>