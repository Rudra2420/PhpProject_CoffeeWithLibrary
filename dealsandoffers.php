<?php
session_start();
include_once('database/dbconn.php');
include_once('database/function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	       
        <script src="assets/vendor/jquery/jquery-3.min.js"></script>
		
		    <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Deals And Offers</title>
	
          <!--Vendor CSS CDN Link-->
    
          <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
          <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
          <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
          <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
          <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
          <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

          <!--Vendor CSS CDN Link-->

          <!--main stylesheet link-->
              <link rel="stylesheet" href="assets/css/dealsandoffers.css">
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


<!--STARTING OF OFFERS SECTION-->

<div class="container">
 
 <div class="row flex-items-xs-middle flex-items-xs-center">
        <?php  
          $selqry = "SELECT * FROM offers WHERE offer_category='Cafe Offer'";
          $selqryexe = mysqli_query($conn,$selqry);

          while($row = mysqli_fetch_assoc($selqryexe))
          {

        ?>
  <div class="col-xs-12 col-lg-4">  
    <div class="coupon">
        
        <div class="containers">
        <h3 class="brand"><span style="color: #be9c79 !important"><?php echo $row['offer_category'] ?></span></h3>
        </div>
        <img src="assets/img/product.jpg" alt="Cafe House">
        
        <div class="containers" style="background-color:white">
          <h2><b><?php echo $row['offer_name'] ?></b></h2> 
          <p><?php echo $row['offer_desc'] ?></p>
        </div>
        
        <div class="containers">
          <p>Use Promo Code: <span class="promo"><?php echo $row['offer_code'] ?></span></p>
          <p class="expire">Expires: <?php echo $row['offer_expr_date'] ?></p>
        </div>
        
      </div>
    
    </div>
    <?php
    }
    ?>

  </div><!--End of row div-->

</div>



<!--SECOND SECTION OF OFFERS-->


<div class="container">
 
 <div class="row flex-items-xs-middle flex-items-xs-center">
      <?php  
          $selqry2 = "SELECT * FROM offers WHERE offer_category='Library Offer'";
          $selqryexe2 = mysqli_query($conn,$selqry2);

          while($row2 = mysqli_fetch_assoc($selqryexe2))
          {

      ?>
  <div class="col-xs-12 col-lg-4">  
    <div class="coupon">
    
        <div class="containers">
        <h3 class="brand"><span style="color: #be9c79 !important"><?php echo $row2['offer_category'] ?></span></h3>
        </div>
        <img src="assets/img/read-coffee.png" alt="Cafe House">
        
        <div class="containers" style="background-color:white">
          <h2><b><?php echo $row2['offer_name'] ?></b></h2> 
          <p><?php echo $row2['offer_desc'] ?></p>
        </div>
        
        <div class="containers">
          <p>Use Promo Code: <span class="promo"><?php echo $row2['offer_code'] ?></span></p>
          <p class="expire">Expires: <?php echo $row2['offer_expr_date'] ?></p>
        </div>
      </div>
    </div>

    <?php
    }
    ?>
  </div><!--End of row div-->
</div>

<?php

  include_once('footer.php');

?>	
	
	
			<script src="assets/vendor/slick-master/slick/slick.min.js"></script>
			<script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
			<script src="assets/vendor/venobox/venobox.min.js"></script>
			<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
			<script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>

<script>
    $(document).ready(function(){
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
