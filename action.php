<?php
session_start();
include_once('database/dbconn.php');
include_once('database/function.php');

if(isset($_SESSION['IS_LOGIN']))
{
	$lusername = $_SESSION['IS_LOGIN'];
	$userqry = "SELECT * FROM customer WHERE cust_name = '$lusername'";
	$userdataexe = mysqli_query($conn,$userqry);
	$luserdata = mysqli_fetch_assoc($userdataexe);
	$luserid = $luserdata['cust_id'];
}

if(isset($_POST['fid'])) 
	{
		$fid 		=	$_POST['fid'];
		$fiprice	=	$_POST['fiprice'];
		$fiqty		=	1;

		$stmt	=	"select * from cart where fitem_id = '$fid' AND cust_id = '$luserid'";
		$exe    =	mysqli_query($conn,$stmt);
		$resexe = mysqli_fetch_assoc($exe);
		$fitemId = $resexe['fitem_id'];
		$custID	=	$resexe['cust_id'];
		

		

			if(!$fitemId)
			{
			$insqry = "INSERT INTO cart (fitem_id, cust_id, qty, total_price) VALUES ($fid,$luserid,$fiqty,'$fiprice')";
			$exe2 = mysqli_query($conn,$insqry);

			echo '<div class="alert alert-success alert-dismissible">
  				<button type="button" class="close" data-dismiss="alert">&times;</button>
  				<strong>Item added to your cart!</strong>
					</div>';
			}
	
			else
			{
				echo '<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Item already added to your cart!</strong>
						</div>';
			}
		
			
	}

	
	if(isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item'){

		$sql = "SELECT * FROM cart WHERE cust_id = '$luserid'";
		$exe3 = mysqli_query($conn,$sql);
		$rowcount = mysqli_num_rows($exe3);
		echo $rowcount;
	}

	if (isset($_GET['remove'])) {
		$did = $_GET['remove'];
		$delqry = "DELETE FROM cart WHERE cart_id = '$did' AND cust_id = '$luserid'";
		$delqryexe = mysqli_query($conn,$delqry);

		$_SESSION['showAlert'] = 'block';
		$_SESSION['message'] = 'Item removed from the cart!';
		header('location:cart.php');

	}

	if (isset($_GET['clear'])) {

		$delqry2 = "DELETE FROM cart WHERE cust_id = '$luserid'";
		$delqryexe2 = mysqli_query($conn,$delqry2);
		$_SESSION['showAlert'] = 'block';
		$_SESSION['message'] = 'All item removed from the cart!';
		header('location:cart.php');
	}
	
	
	if (isset($_POST['fqty2'])) {
		$fqty2 = $_POST['fqty2'];
		$fid2 = $_POST['fid2'];
		$fiprice2 = $_POST['fiprice2'];
		$tprice = $fqty2*$fiprice2;

		$upqry = "UPDATE cart SET qty='$fqty2', total_price='$tprice' WHERE cart_id='$fid2' AND cust_id = '$luserid'";
		$upqryexe = mysqli_query($conn, $upqry);

	}
?>