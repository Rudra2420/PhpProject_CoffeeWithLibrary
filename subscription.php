<?php
session_start();
include_once('database/dbconn.php');
include_once('database/function.php');

     if(!isset($_SESSION['IS_LOGIN']))
    {
        echo "<script>alert('Without Login you cannot get library subscription....')</script>";
        redirect('forms/login-registration.php');
    }


    $lusername2 = $_SESSION['IS_LOGIN'];
	$userqry2 = "SELECT * FROM customer WHERE cust_name = '$lusername2'";
	$userdataexe2 = mysqli_query($conn,$userqry2);
	$luserdata2 = mysqli_fetch_assoc($userdataexe2);
	$luserid2 = $luserdata2['cust_id'];

?>
<link rel="stylesheet" href="assets/css/subscription.css">

<!DOCTYPE html>
<html>
<head>

    <!-- <script src="assets/vendor/jquery/jquery.min.js"></script> -->
    <script src="assets/vendor/jquery/jquery-3.min.js"></script>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Library Subscription</title>

 	<!--Vendor CSS CDN Link-->
  	
  	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

	<!--Vendor CSS CDN Link-->

    <!--main stylesheet link-->
    <!-- <link rel="stylesheet" href="assets/css/menu2.css"> -->
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

        <!-- End Of Navbar Menu -->
		<!-- End Of Header -->

    <div class="cp-page-content">
    <div class="main_pack_section"> 
        <div class="main_package_block" >
            <div class="main_package_inner" >
                <div class="package-block" style="margin-top: 15%;">
                    
                    <div class=" main_pack_name" style=" width: 100%;" >For Regular Readers </div>
                    
                        <div class="package-label">
                            <ul>
                                <li>Subpackage Name</li>
                                <li>Package Price</li> 
                                <li>Maximum Books</li>
                                <li>No of Month</li>
                                <li>0</li>
                            </ul>
                        </div>
                    
                    <div class="package-right-block ">
                            
                    <?php 
                        $selqry = "SELECT * FROM lib_subscription";
                        $selexe = mysqli_query($conn,$selqry);
                        while($row = mysqli_fetch_assoc($selexe))
                        {
                        ?>

                            <div class="inner_package" style="width:33.33%">
                                <form method="post" action="" id="subscribe_package" name="subscribe_package">
                                    <ul>
                                        <li><?php echo $row['subs_plan_name'] ?></li>
                                        <li><ins><?php echo $row['subs_amt'] ?></ins> <span class="currency_span">INR</span></li> 
                                        <li><?php echo $row['no_of_book'] ?></li>
                                        <li><?php echo $row['subs_validity'] ?></li>
                                        <li>
                                        <input type="hidden" name="package_id" value="<?php echo $row['subs_id'] ?>">
                                        <input type="hidden" name="package_name" value="<?php echo $row['subs_plan_name'] ?>">
                                        <input type="hidden" name="package_amt" value="<?php echo $row['subs_amt'] ?>">
                                        <input type="hidden" name="package_validity" value="<?php echo $row['subs_validity'] ?>">
                                        <input type="submit" name="subscribe" id="subscribe" value="Subscribe"></li>
                                    </ul>
                                </form>
                            </div>

                        <?php
                        }   
                        ?>
                            
                    </div>
            </div>
        </div>
    </div>
</div>
</div>




<?php
 if(isset($_POST['subscribe']))
 {
    if($_SESSION['IS_LOGIN'])
    {
        $today = date("Y-m-d");
        $subsclickedid = $_POST['package_id'];
        $subsclickedname = $_POST['package_name'];
        $subsclickedamt = $_POST['package_amt'];
        $subsclickedval = $_POST['package_validity'];

        $subsordselqry = "SELECT * FROM cust_subs_ord WHERE cust_id = $luserid2";
        $subsordselqryexe = mysqli_query($conn,$subsordselqry);

        $subsordary = mysqli_fetch_assoc($subsordselqryexe);
        $custid = $subsordary['cust_id'];
        $custsubsorddate = $subsordary['subs_ord_date'];
        $custsubsexprdate = $subsordary['cust_subs_epr_date'];

        $_SESSION['SUBS_AMT'] = $subsclickedamt;

        $offerselqry2 = "SELECT * FROM offers WHERE offer_category = 'Library Offer'";
        $offerselqryexe2 = mysqli_query($conn,$offerselqry2);

        $fetchqry2 = mysqli_fetch_assoc($offerselqryexe2);
        $_SESSION['SUBS_CHECKOUT'] = $fetchqry2['offer_category'];

        if($today>$custsubsexprdate)
        {

            $subs_expiry_date = strtotime($subsclickedval,strtotime($today));
            $expires = date('Y-m-d',$subs_expiry_date);

            $subsordqry = "INSERT INTO cust_subs_ord (subs_id, cust_id, subs_ord_date, cust_subs_epr_date, subs_ord_amt) VALUES ($subsclickedid, $luserid2, '$today', '$expires', '$subsclickedamt')";
            $exe1 = mysqli_query($conn,$subsordqry);

            echo "<script>alert('Subscription order submited successfully countinue to checkout process...')</script>";
            
            redirect('subs_checkout.php');
        }
        else
        {
            echo "<script>alert('You have already one subscription try to get new subscription after this one is expired')</script>";
            redirect('subs_checkout.php');
        }
      
    }
    else
    {
        echo"<script>alert('If you want to get subscription you have to do first login')</script>";
		redirect('forms/login-registration.php');
    }


 }
?>


<?php 
    include_once('footer.php');
?>


    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>




    


</body>
</html>