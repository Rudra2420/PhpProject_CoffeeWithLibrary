<?php
session_start();
include_once('database/dbconn.php');
include_once('database/function.php');
// echo $_SESSION['IS_LOGIN'];
?>


<!DOCTYPE html>
<html>

<head>

    <!-- <script src="assets/vendor/jquery/jquery.min.js"></script> -->
    <script src="assets/vendor/jquery/jquery-3.min.js"></script>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menu</title>

    <!--Vendor CSS CDN Link-->

    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!--Vendor CSS CDN Link-->

    <!--main stylesheet link-->
    <link rel="stylesheet" href="assets/css/menu.css">
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

                <div class="col-lg-3 col-md-3 col-sm-12 " style="margin-top: 100px;margin-bottom: 60px;">
                    <div class="category ">
                        <ul class="list-group nav flex-column">
                            <?php
									$fetchqry = "select * from food_category";
									
									$exeqry = mysqli_query($conn,$fetchqry);
									$num = mysqli_num_rows($exeqry);

									while($res = mysqli_fetch_array($exeqry))
									{
									?>

                            <li class="list-group-item" style="text-align: left;">
                                <a href="menu.php?fcid=<?php echo $res['fcat_id']; ?>">
                                    <span class="title"
                                        style="font-size: 16px; font-family: satisfy; letter-spacing: 1px;"><b><?php echo $res['fcat_name']; ?></b></span>
                                </a>
                            </li>
                            <?php	
									}
								?>

                        </ul>
                    </div>
                </div>
                <div class="col" style="margin-top: 85px;">
                    <div id="msg"></div>
                    <div class="row products" id="products">


                        <?php

				if(isset($_GET['fcid']))
				{
				$catid = $_GET['fcid'];
				$selectqry	= "select * from food_items where fcat_id = '$catid'";
				$exeqry2 = mysqli_query($conn,$selectqry);
				while($res2 = mysqli_fetch_assoc($exeqry2))
				{

				?>

                        <div class="col-lg-3 col-md-4 col-sm-6 d-lg-flex d-md-flex d-sm-flex d-xs-flex my-2 mb-3 mt-3">
                            <div class="card">
                                <div class="card-body">
                                    <img src="<?= $res2['fitem_img'] ?>" alt="food-items" class="card-img">
                                    <h4 class="card-title mt-2 text-wrap"><?= $res2['fitem_name'] ?></h4>
                                    <h5>Price <b><?= $res2['fitem_price'] ?></b></h5>
                                </div>
                                <div class="card-footer p-0 ctftr">
                                    <form class="form-submit" method="POST">
                                        <input type="hidden" class="fid" name="" value="<?=$res2['fitem_id']?>">
                                        <input type="hidden" class="finame" name="" value="<?=$res2['fitem_name']?>">
                                        <input type="hidden" class="fiimg" name="" value="<?=$res2['fitem_img']?>">
                                        <input type="hidden" class="fiprice" name="" value="<?=$res2['fitem_price']?>">
                                        <button class="btn btn-block btn-light m-0 addItemBtn" name="addToCartBtn">Add
                                            To Cart</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <?php
				}
				
			}

			
			else
			{
				$selectqry2 = "select * from food_items where fcat_id = 1";
				$exeqry3 = mysqli_query($conn,$selectqry2);
				while($res3 = mysqli_fetch_assoc($exeqry3))
				{

				?>

                        <div class="col-lg-3 col-md-4 col-sm-6 my-2 mb-3 mt-3">
                            <div class="card">
                                <div class="card-body">
                                    <img src="<?= $res3['fitem_img'] ?>" alt="food-items" class="card-img-top">
                                    <h4 class="card-title mt-2"><?= $res3['fitem_name'] ?></h4>
                                    <h5>Price <b><?= $res3['fitem_price'] ?></b></h5>
                                </div>
                                <div class="card-footer p-0 ctftr">
                                    <form class="form-submit" method="POST">
                                        <input type="hidden" class="fid" name="" value="<?=$res3['fitem_id']?>">
                                        <input type="hidden" class="finame" name="" value="<?=$res3['fitem_name']?>">
                                        <input type="hidden" class="fiimg" name="" value="<?=$res3['fitem_img']?>">
                                        <input type="hidden" class="fiprice" name="" value="<?=$res3['fitem_price']?>">
                                        <button class="btn btn-block btn-light m-0 addItemBtn" name="addToCartBtn">Add To Cart</button>
                                    </form>
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
    <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>

	<?php
	if(isset($_POST['addToCartBtn'])){
		if($_SESSION['IS_LOGIN'])
		{
	?>
    <script type="text/javascript">
    $(document).ready(function() {
        $(".addItemBtn").click(function(e) {
            e.preventDefault();
            var $form = $(this).closest(".form-submit");
            var fid = $form.find(".fid").val();
            var finame = $form.find(".finame").val();
            var fiimg = $form.find(".fiimg").val();
            var fiprice = $form.find(".fiprice").val();

            $.ajax({
                url: 'action.php',
                method: 'post',
                data: {
                    fid: fid,
                    finame: finame,
                    fiimg: fiimg,
                    fiprice: fiprice
                },
                success: function(response) {
                    $("#msg").html(response);
                    load_cart_item_number();
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
	<?php
	}
		else{
					echo"<script>alert('If you want to add item to your cart you have to do first login')</script>";
					redirect('forms/login-registration.php');
		}
	}
	?>

    <!-- e.preventDefault() is stop page to do refresh while sending data to the server by click on add to cart button.... -->
</body>

</html>