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
</head>
<body>
	<div class="container-fluid">
		<h1>GENERATE QUOTATION</h1>
		<br />
		<form class="form-inline" role="form" method="get" action="sendQuotation.php">
	    <div class="form-group">
	      <label class="sr-only" for="name">Name:</label>
	      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
	    </div>
	    &nbsp;&nbsp;&nbsp;
	    <div class="form-group">
	      <label class="sr-only" for="email">Email:</label>
	      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
	    </div>
	    <br /><br />
	    <div style="font-weight:bold; font-size:1.2em;">ITEMS</div>

	    <?php 
	    $itemSql = "SELECT item FROM item";
			$itemResults = $conn->query($itemSql);
			while($itemRow = $itemResults->fetch_assoc()) {
		    ?>
		    <div style="padding-top:5px;">
			    <?php echo $itemRow['item']; ?> 
			    <div class="form-group">
			      <label class="sr-only" for="<?php echo $itemRow['item']; ?>">Enter quantity</label>
			      <input type="text" class="form-control" id="<?php echo $itemRow['item']; ?>" placeholder="Enter quantity" name="item[<?php echo $itemRow['item']; ?>]">
			    </div>
		    </div>
		    <?php
	  	}
	    ?>

	    <br />
	    <button type="submit" class="btn btn-default">Submit</button>
	  </form>

	</div>

	<script src="res/js/jquery-1.11.2.min.js"></script>
	<script src="res/js/jquery.cookie.js"></script>
	<script src="res/js/bootstrap.min.js"></script>
</body>
</html>