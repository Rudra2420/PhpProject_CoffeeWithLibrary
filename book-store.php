<?php

include_once('database/dbconn.php');
include_once('database/function.php');

?>

<!DOCTYPE html>
<html>
<head>

    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/jquery/jquery-3.min.js"></script>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book-Store</title>

 	<!--Vendor CSS CDN Link-->
  	
  	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

	<!--Vendor CSS CDN Link-->

    <!--main stylesheet link-->
    <link rel="stylesheet" href="assets/css/book-store.css">
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

<main>
		<div class="container-fluid">
			<div class="row">
				<nav class="col-lg-3 col-md-3 col-sm-12 " style="margin-top: 100px; margin-bottom:60px;">
					<div class="category mb-3">
						
						<ul class="list-group nav flex-column">
							<?php
									$fetchqry = "select * from book_category";
									
										$exeqry = mysqli_query($conn,$fetchqry);
										$num = mysqli_num_rows($exeqry);

										while($res = mysqli_fetch_array($exeqry)){
							?>

									<li class="list-group-item">	
										<a href="book-store.php?bcid=<?php echo $res['bcat_id']; ?>" >
									  		<span class="title" style="font-size: 16px; font-family: satisfy; letter-spacing: 1px; font-weight:bold"><?php echo $res['bcat_name']; ?></span>
										</a>
									</li>
							<?php	
								}
							?>

						</ul>
						
					</div>
				</nav>
			<div class="col" style="margin-top: 85px;">
			<div class="row products" id="products">
				
				<?php

				if(isset($_GET['bcid']))
				{
					$catid = $_GET['bcid'];
					$selectqry	= "select * from books where bcat_id = '$catid'";
					$exeqry2 = mysqli_query($conn,$selectqry);
					while($res2 = mysqli_fetch_assoc($exeqry2))
				{

				?>

				<div class="col-lg-3 col-md-4 col-sm-6 my-2 mb-3 mt-3 d-lg-flex d-md-flex d-sm-flex">
					<div class="card">
						<div class="card-body">
						<img src="<?= $res2['book_img'] ?>" alt="book-items" class="card-img-top">
							<h4 class="card-title mt-2"><?= $res2['book_name'] ?></h4>
							
						</div>
						<div class="card-footer p-0">
							<a href="book-store.php?bookid=<?php echo $res2['book_id']; ?>" class="btn btn-block btn-light m-0">Add To Subscription</a>
						</div>
					</div>
				</div>

			<?php
				}
			}
			else
			{
				$selectqry2 = "select * from books where bcat_id = 1";
				$exeqry3 = mysqli_query($conn,$selectqry2);
				while($res3 = mysqli_fetch_assoc($exeqry3))
				{

				?>

				<div class="col-lg-3 col-md-4 col-sm-6 my-2 mb-3 mt-3 d-lg-flex d-md-flex d-sm-flex">
					<div class="card">
						<div class="card-body">
						<img src="<?= $res3['book_img'] ?>" alt="book-items" class="card-img-top">
							<h4 class="card-title mt-2"><?= $res3['book_name'] ?></h4>
							
						</div>
						<div class="card-footer p-0">
							<!-- <a href="book-store.php?bookid=<?//php echo $res3['book_id']; ?>" class="btn btn-block btn-light m-0">Add To Subscription</a> -->
						</div>
					</div>
				</div>
			
			<?php
				}
			}
			?>
			
				</div>
			</div>
			</div>
		</div>
</main>

<?php
	include_once('footer.php');
?>

	<script src="assets/vendor/slick-master/slick/slick.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>
    <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
	
	<script type="text/javascript">
    $(function(){
      var navbar = $('.header-inner');
      $(window).scroll(function(){
        if($(window).scrollTop() <=40){
          navbar.removeClass('navbar-scroll');
        }else{
          navbar.addClass('navbar-scroll');
        }
      });
    });


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