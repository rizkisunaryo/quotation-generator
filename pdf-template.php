<?php
require_once 'mysqlCon.php';
require_once 'util.php';

$custName = $_GET['firstName']." ".$_GET['lastName'];
$address = $_GET['address'];
$city = $_GET['city'];
$postal = $_GET['postal'];
$country = $_GET['country'];
$phone = $_GET['phone'];
$businessEmail = $_GET['businessEmail'];
$email = $_GET['email'];

$totalNetPrice = 0;
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
			
		<div id="headerSection" class="row">
			<div id="quotationNo">QUOTATION</div>
			<div id="headerBlock">
				<div id="companyName">IP SERVERONE SOLUTIONS SDN BHD</div>
				<table id="headerTable">
					<col width="*">
				  <col width="*">
				  <col width="15%">
					<tr>
						<td class="headerAddress">A-1-1, Block A, Glomac Damansara, Jalan Damansara, 60000 Kuala Lumpur, Malaysia</td>
						<td class="alignRight">Date:</td>
						<td class="alignRight"><?php echo date("Y-m-d"); ?></td>
					</tr>
					<tr>
						<td class="headerAddress">Tel: 603. 2026 1688&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fax:603. 7728 3188</td>
						<td class="alignRight">Payment Term:</td>
						<td class="alignRight">PREPAY</td>
					</tr>
					<tr>
						<td></td>
						<td class="alignRight">Validity:</td>
						<td class="alignRight">14 Days</td>
					</tr>
				</table>
			</div>
		</div>

		<div id="customerSection" class="row">
			<table>
				<tr>
					<td class="alignRight">Customer:</td>
					<td class="customerValueCell"><?php echo $custName; ?></td>
				</tr>
				<tr>
					<td class="alignRight top">Address:</td>
					<td class="customerValueCell"><?php echo $address.', '.$city.'<br />'.$postal.'<br />'.$country; ?></td>
				</tr>
				<tr>
					<td class="alignRight">Phone:</td>
					<td class="customerValueCell"><?php echo $phone; ?></td>
				</tr>
				<tr>
					<td class="alignRight">Email:</td>
					<td class="customerValueCell"><?php echo $businessEmail; ?></td>
				</tr>
			</table>
		</div>

		<div id="itemsSection" class="row">
			<table id="itemsTable">
				<col width="10%">
				<col width="51%">
				<col width="10%">
				<col width="14%">
				<col width="15%">
				<tr id="itemsTableHeader">
					<td class="itemsTableHeaderCell alignCenter cellBorder cellBorderLeft">Item</td>
					<td class="itemsTableHeaderCell cellBorder">Description</td>
					<td class="itemsTableHeaderCell alignCenter cellBorder">QTY</td>
					<td class="itemsTableHeaderCell alignCenter cellBorder">UNIT PRICE</td>
					<td class="itemsTableHeaderCell alignCenter cellBorder">TOTAL</td>
				</tr>
				<?php
				foreach ($_GET['item'] as $getItemKey => $getItemValue) {
					if ($getItemValue<1) continue;
					?>
					<tr>
					<?php
					$itemSql = "SELECT item,price,fee FROM item WHERE item='".$getItemKey."'";
					$itemResults = $conn->query($itemSql);
					while($itemRow = $itemResults->fetch_assoc()) {
						?>
						<td class="alignCenter cellBorder cellBorderLeft top"><?php echo $itemRow['item'] ?>*</td>
						<td class="cellBorder top">
							<ul>
								<?php
								$itemFeatureSql = "SELECT feature_id FROM item_feature where item_id='".$itemRow['item']."'";
								$itemFeatureResults = $conn->query($itemFeatureSql);
								while($itemFeatureRow = $itemFeatureResults->fetch_assoc()) {
									$featureSql = "SELECT `desc` FROM feature WHERE id=".$itemFeatureRow['feature_id'];
									$featureResults = $conn->query($featureSql);
									while($featureRow = $featureResults->fetch_assoc()) {
									?>
									<li><?php echo $featureRow['desc']; ?></li>
									<?php
									}
								}
								?>
							</ul>
							<br />
							<span class="bold cellValue">* Setup fee RM <?php echo $itemRow['fee']; ?> - Waived</span>
							<br /><br /><br />
						</td>
						<td class="alignCenter cellBorder top"><?php echo $getItemValue; ?> Unit</td>
						<td class="alignRight itemsTableCellPadding cellBorder top"><?php echo get2Decimal($itemRow['price']); ?></td>
						<?php
						$totalUnitPrice = $itemRow['price']*$getItemValue;
						$totalNetPrice += $totalUnitPrice;
						?>
						<td class="alignRight itemsTableCellPadding cellBorder top">RM <?php echo get2Decimal($totalUnitPrice); ?></td>
						<?php
					}
					?>
					</tr>
					<?php
				}
				?>
				<tr>
					<td class="cellBorder cellBorderLeft cellBorderLast"></td>
					<td class="cellBorder cellBorderLast">
						<br />
						<span class="bold cellValue">* = GST @ Standard Rated 6%</span>
						<br /><br />
					</td>
					<td class="cellBorder cellBorderLast"></td>
					<td class="cellBorder cellBorderLast"></td>
					<td class="cellBorder cellBorderLast"></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td class="totalPriceLabel">Sub Total</td>
					<td class="totalPriceValue">RM <?php echo get2Decimal($totalNetPrice); ?></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td class="totalPriceLabel">GST @ 6 %</td>
					<td class="totalPriceValue gstNumber">RM <?php echo get2Decimal($totalNetPrice*6/100); ?></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td class="totalPriceLabel">GST @ 6 %</td>
					<td class="totalPriceValue totalPriceNumber">RM <?php echo get2Decimal($totalNetPrice*6/100); ?></td>
				</tr>
			</table>
		</div>

		<div id="confirmOrder" class="row">
			<div class="bold">To confirm order:</div>
			<div>Stamp this document and fax to 03-7728 3188</div>
		</div>

		<div id="closure" class="row">
			We hope that our quotation is favourable to you and we are looking forward to receive you valued orders. If you require any further clarification, please do not hesitate to contact us.
		</div>

		<div id="signature" class="row">
			<table id="signatureTable">
				<col width="50%">
			  <col width="50%">
			  <tr>
			  	<td class="top">
			  		<div>Yours sincerely,</div>
			  		<div class="bold">Lee Cheung Loong</div>
			  		<div class="bold">60-123319286</div>
			  	</td>
			  	<td class="top">
			  		<div class="bold alignCenter signBox">Confirmed & proceed</div>
			  	</td>
			  </tr>
			</table>
		</div>

	</div>

	<script src="res/js/jquery-1.11.2.min.js"></script>
	<script src="res/js/jquery.cookie.js"></script>
	<script src="res/js/bootstrap.min.js"></script>
</body>
</html>