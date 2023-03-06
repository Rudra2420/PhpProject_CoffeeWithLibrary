<?php
session_start();
include_once('database/dbconn.php');
include_once('database/function.php');

	$lusername2 = $_SESSION['IS_LOGIN'];
	$userqry2 = "SELECT * FROM customer WHERE cust_name = '$lusername2'";
	$userdataexe2 = mysqli_query($conn,$userqry2);
	$luserdata2 = mysqli_fetch_assoc($userdataexe2);
	$luserid2 = $luserdata2['cust_id'];
?>

<!DOCTYPE html>
<html>
<head>

	<script src="assets/vendor/jquery/jquery-3.min.js"></script>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cart</title>

 	<!--Vendor CSS CDN Link-->
  	
  	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

	<!--Vendor CSS CDN Link-->

    <!--main stylesheet link-->
    <link rel="stylesheet" href="assets/css/cart.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <!--main stylesheet link-->

    <!--Font Awsome Latest Version -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/d65000b73d.js" crossorigin="anonymous"></script>
    <!--Font Awsome Latest Version -->

</head>
<body>

<?php
	include_once('navbar.php');
?>

<div class="container">

	<div class="row justify-content-center">
		<div class="col-lg-10">

			<div style="display: <?php if(isset($_SESSION['showAlert'])){echo $_SESSION['showAlert'];}else{echo 'none';} unset($_SESSION['showAlert']); ?>;margin-top: 90px;margin-bottom: 0;" class="alert alert-success alert-dismissible">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			  <strong><?php if(isset($_SESSION['message'])){echo $_SESSION['message'];} unset($_SESSION['showAlert']); ?></strong>
			</div>

			<div class="table-responsive-md table-responsive-sm" style="margin-top: 90px; margin-bottom: 100px;">
				<table class="table table-bordered table-striped text-center">
					<thead>
						<tr>
							<td colspan="6">
								<h4 class="text-center text-info m-0">Products in your cart!</h4>
							</td>
						</tr>
						<tr>
							<!-- <th>ID</th> -->
							<th>Item Name</th>
							<th>Image</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Total Price</th>
							<th>
								<a href="action.php?clear=all" class="badge-danger badge p-1" onclick="return confirm('Are you sure want to clear your cart?');"><i class="fas fa-trash"></i>&nbsp;&nbsp;Clear Cart</a>
							</th>
						</tr>
					</thead>
					<tbody>
					<form method="post">
						<?php
							// $selqry = "SELECT * FROM cart_example";
							$selqry = "SELECT * FROM cart JOIN food_items ON cart.fitem_id = food_items.fitem_id AND cart.cust_id = '$luserid2'";
							$selqryexe = mysqli_query($conn,$selqry);
							$grand_total = 0;
							while ($row = mysqli_fetch_assoc($selqryexe)) 
								{
							?>

								<tr>
									
									<input type="hidden" id="cartuser" class="cartuser" value="<?= $row['cust_id'] ?>">
									<input type="hidden" id="sessionuser" class="sessionuser" value="<?= $luserid2 ?>">
									<!-- <td><?php //echo $row['cart_id']; ?></td> -->
									<input type="hidden" class="fid2" value="<?= $row['cart_id'] ?>">
									<td><?php echo $row['fitem_name']; ?></td>
									<td><img src="<?php echo $row['fitem_img']; ?>" width="60"></td>
									<td><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<?php echo number_format($row['fitem_price'],2); ?></td>
									<input type="hidden" class="fiprice2" value="<?= $row['fitem_price'] ?>">
									<td><input type="number" class="form-cintrol itemqty" value="<?php echo $row['qty']; ?>" style="width: 60px;"></td>
									<td><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<?php echo number_format($row['total_price'],2); ?></td>
									<td>
										<a href="action.php?remove=<?= $row['cart_id']?>" class="text-danger lead" onclick="return confirm('Are you sure want to remove this item?');"><i class="fas fa-trash-alt"></i></a>
									</td>
								</tr>



							<?php
							$grand_total += $row['total_price'];	
							}

						 ?>
						 <tr>
						 	<td colspan="2">
						 		<a href="menu.php" name="cs" class="btn btn-success"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Countinue Shopping</a>
						 	</td>
						 	<td colspan="2">
						 		<b>Grand Total</b>
						 	</td>
						 	<td><b><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<?php echo number_format($grand_total,2); ?></b></td>
						 	<td>
								 <!-- <a href="checkout.php" name="checkout" class="btn btn-info <?= ($grand_total>1)?"":"disabled"; ?>" ><i class="far fa-credit-card"></i>&nbsp;&nbsp;Checkout</a> -->
								 
									<button type="submit" name="checkout" class="btn btn-info <?= ($grand_total>1)?"":"disabled"; ?>"> <i class="far fa-credit-card"></i>&nbsp;&nbsp;Checkout</button> 
								 
							</td>
						 </tr>
						 </form>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


<?php


	if(isset($_POST['checkout']))
	{
			$cartselqry = "SELECT * FROM cart WHERE cust_id = '$luserid2'";
			$cartselqryexe = mysqli_query($conn,$cartselqry);
			// $row3 = mysqli_fetch_assoc($cartselqryexe);
			$cartfid = array();
			if(mysqli_num_rows($cartselqryexe)>0)
			{
				while($row3 = mysqli_fetch_assoc($cartselqryexe))
				{
					$cartfid[] = $row3['cart_id'];
					$cartcustid = $row3['cust_id'];
				}
				// print_r($cartfid);
				$cartids = implode(', ',$cartfid);
				
			}
			// echo $cartids;
			

			$ordqry = "SELECT * FROM orders WHERE cust_id = '$luserid2'";
			$ordqryexe = mysqli_query($conn,$ordqry);
			$ordary = mysqli_fetch_assoc($ordqryexe);
			$ocartid = $ordary['cart_id'];
			
			$ordid = $ordary['ord_id'];

			$_SESSION['GRAND_TOTAL'] = $grand_total;

			$offerselqry = "SELECT * FROM offers WHERE offer_category = 'Cafe Offer'";
			$offerselqryexe = mysqli_query($conn,$offerselqry);
			$fetchqry = mysqli_fetch_assoc($offerselqryexe);
			
			$_SESSION['ORDER_CHECKOUT'] = $fetchqry['offer_category'];

		if(!$ocartid)
		{
			$today = date("Y-m-d");
			$insordqry = "INSERT INTO orders (cust_id, ord_date, cart_id, grand_total) VALUES ($cartcustid, '$today', '$cartids', '$grand_total')";
			$insordqryexe = mysqli_query($conn,$insordqry);
			echo "<script>Your order is sccuessfull...</script>";
			redirect('menu_checkout.php');
		}
		else
		{
			echo "<script>alert('Your order is already added...')</script>";
			redirect('menu_checkout.php');
		}

		
	}

?>

<?php
include_once('footer.php');
?>



	<script src="assets/vendor/slick-master/slick/slick.min.js"></script>
    <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>
  	<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>



<script type="text/javascript">

	$(document).ready(function(){
		$(".itemqty").on('change',function(){
			var $el = $(this).closest('tr');
			var fid2 = $el.find(".fid2").val();
			var fiprice2 = $el.find(".fiprice2").val();
			var fqty2 = $el.find(".itemqty").val();
			location.reload(true);
			$.ajax({
				url:'action.php',
				method: 'post',
				cache: false,
				data:{fid2:fid2,fiprice2:fiprice2,fqty2:fqty2},
				success: function(response){
					console.log(response);
				}
			});
		});
	

		function load_cart_item_number() {
			$.ajax({
				url: 'action.php',
				method: 'get',
				data:{
					cartItem: "cart_item"
				},
				success: function(response) {
	          		$("#cart-item").html(response);
	        	}
			});
		}
		load_cart_item_number();
	
	});
</script>

</body>
</html>