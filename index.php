<?php
session_start();
include_once('database/dbconn.php');
include_once('database/function.php');
// echo $_SESSION['is_login'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <script src="assets/vendor/jquery/jquery.min.js"></script> -->
    <script src="assets/vendor/jquery/jquery-3.min.js"></script>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>cafe house</title>
     
    <!--Vendor CSS Link-->


    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap-grid.css">
        <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css"> -->


    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--Vendor CSS CDN Link-->

    <!--main stylesheet link-->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <!--main stylesheet link-->

    <!--Font Awsome Latest Version -->
    <script src="https://kit.fontawesome.com/d65000b73d.js" crossorigin="anonymous"></script>
    <!--Font Awsome Latest Version -->


</head>

<body>



    <?php

        include_once('navbar.php');

    ?>

    <!-- End Of Navbar Menu -->
    <!-- End Of Header -->


    <!--slider bar-->
    <section>
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active" data-interval="10000">
                    <img src="assets/img/bg1-img.jpg" class="d-block w-100 h-100" alt="">
                    <div class="carousel-caption d-none d-md-block">
                        <h2>Welcome To Cafe House</h2>
                        <p>Start A Day With Coffee</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="assets/img/bg2-img.jpg" class="d-block w-100 h-100" alt="">
                    <div class="carousel-caption d-none d-md-block">
                        <h2>Black Coffee Benefits</h2>
                        <p>Black coffee also contains antioxidants, which help in the weight loss process</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="assets/img/bg3-img.jpg" class="d-block w-100 h-100" alt="">
                    <div class="carousel-caption d-none d-md-block">
                        <h2>New Day With Coffee Roasters</h2>   
                        <p>Coffee is a beverage that puts one to sleep when not drank</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
    <!--End Of Slider Bar-->



    <!--Main section-->
    <main>

        <!--section V1-->

        <section class="section-info-v1">
            <div class="container container-v2">
                <div class="d-flex justify-content-center">

                    <div class="title-info text-center">
                        <h2 class="title_heading mb-0" style="color: #be9c79">Surprising Health<br> Benefits Of Coffee
                        </h2>
                    </div>

                </div>

                <p class="content_info">Coffee iѕ rich in antioxidant substances called polyphenol: A series оf
                    chemicals called catechins; EGCG (epigallocatechin gallate) iѕ the mоѕt powerful.Antioxidants hаvе
                    thе ability tо mop uр free radicals capable оf causing blood clots (which соuld lead tо thrombosis)
                    аnd plaque formations оn innеr walls оf arteries leading tо cardiovascular disease.
                </p>



            </div>
        </section>
        <!--End Of Section V1-->

        <!--Coffee Types Gallery Section-->

        <section id="coffee-types-gallery" class="coffee-types-gallery">

            <div class="coffee-types-container">
                <div class="box">
                    <div class="imgbox">
                        <img src="assets/img/americano.jpg">
                        <div class="details">
                            <div class="content">
                                <h2>Cappuccino</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="imgbox">
                        <img src="assets/img/c4.jpg">
                        <div class="details">
                            <div class="content">
                                <h2>Black</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="imgbox">
                        <img src="assets/img/c5.jpg">
                        <div class="details">
                            <div class="content">
                                <h2>Cortado</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="imgbox">
                        <img src="assets/img/doppio.jpg">
                        <div class="details">
                            <div class="content">
                                <h2>Doppio</h2>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="box">
                    <div class="imgbox">
                        <img src="assets/img/Stanford.jpg">
                        <div class="details">
                            <div class="content">
                                <h2>Espresso</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="imgbox">
                        <img src="assets/img/oxford.jpg">
                        <div class="details">
                            <div class="content">
                                <h2>Red Eye</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="imgbox">
                        <img src="assets/img/cambridge.jpg">
                        <div class="details">
                            <div class="content">
                                <h2>Americano</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="imgbox">
                        <img src="assets/img/c4.jpg">
                        <div class="details">
                            <div class="content">
                                <h2>Latte</h2>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section>

        <!--End Of Coffee Types Gallery Section-->


        <!-- ======= Events Section ======= -->
        <section id="events" class="events">
            <div class="container">

                <div class="event-section-title">
                    <h2>Organize <span>Events</span> in our Restaurant</h2>
                </div>

                <div class="owl-carousel events-carousel">

                    <div class="row event-item">
                        <div class="col-lg-6">
                            <img src="assets/img/Standup-Comedy-1-696x464.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="col-lg-6 pt-4 pt-lg-0 content">
                            <h3>Stand Up Comedy Show</h3>
                            <div class="price">
                                <!-- <p><span>$189</span></p> -->
                            </div>
                            <p class="font-italic">
                            Come and witness some seasoned and some new comics try out brand new material. Spend the evening with 8 new comics and 3 special acts! Talent Trails provides a platform for young stand-up comedians to showcase their talents! 
                            </p>
                            <ul>
                                <li><i class="icofont-check-circled"></i> Cafe House,Ahemdabad When: Every Friday, 7 pm onwards Entry</li>
                                <li><i class="icofont-check-circled"></i> Price: The entry to the venue is INR 600 per person.</li>
                                <li><i class="icofont-check-circled"></i> Amazing Comedy With The Comedy Factory.</li>
                            </ul>
                            <p>
                            This comedy show is going to be an amazing experience. Come along with your friends, to watch a hilarious line-up of stand-up artists that are sure to leave you in splits!
                            </p>
                        </div>
                    </div>

                    <div class="row event-item">
                        <div class="col-lg-6">
                            <img src="assets/img/DJ-event.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="col-lg-6 pt-4 pt-lg-0 content">
                            <h3>31st Dance Night</h3>
                            <div class="price">
                                <!-- <p><span>$290</span></p> -->
                            </div>
                            <p class="font-italic">
                            Celebrate New Year’s Eve at the Welcome 2021: First We Feast, set in the Fire & Flames Banquet Hall, in Cafe House. The neon blazing lights and the lively ambiance is sure to appeal to you. With popular DJs playing upbeat music that is sure to have you up on you feat.
                            </p>
                            <ul>
                                <li><i class="icofont-check-circled"></i> Timings: 8:00 PM 31 Dec to 1.00 AM 1 Jan.</li>
                                <li><i class="icofont-check-circled"></i> Price: Packages starting from INR 1500.</li>
                                <li><i class="icofont-check-circled"></i> Limited walk-ins available.</li>
                            </ul>
                            <p>
                                Get ready to enjoy with your friends at this bash in Cafe House Ahmedabad.
                            </p>
                        </div>
                    </div>

                    <div class="row event-item">
                        <div class="col-lg-6">
                            <img src="assets/img/musical-night-event.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="col-lg-6 pt-4 pt-lg-0 content">
                            <h3>Musical Nights</h3>
                            <div class="price">
                                <!-- <p><span>$99</span></p> -->
                            </div>
                            <p class="font-italic">
                            Get ready for a memorable evening with your loved ones. The singer will be taking song requests from all the guests and will be singing it as requested by the guests. It’s a musical treat for everyone, so book your tickets now!!
                            </p>
                            <ul>
                                <li><i class="icofont-check-circled"></i> Timings: 8:00 PM to 12:00 PM 25 Dec & 8:00 PM 12:00 PM 26 Dec.</li>
                                <li><i class="icofont-check-circled"></i> Price: Packages starting from INR 2100.</li>
                                <li><i class="icofont-check-circled"></i> Limited walk-ins available.</li>
                            </ul>
                            <p>
                                Get ready to enjoy with your friends at this bash in Ahemdabad.Get ready to enjoy with your friends at this bash in Ahemdabad.
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Events Section -->

    </main>
    <!--End Of Main section-->

    
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

    <script src="assets/js/events.js"></script>

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