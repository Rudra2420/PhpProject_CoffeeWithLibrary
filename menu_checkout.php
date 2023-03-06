<?php
session_start();
include_once('database/dbconn.php');
include_once('database/function.php');

	$lusername2 = $_SESSION['IS_LOGIN'];
	$userqry2 = "SELECT * FROM customer WHERE cust_name = '$lusername2'";
    $userdataexe2 = mysqli_query($conn,$userqry2);
  
	$luserdata2 = mysqli_fetch_assoc($userdataexe2);
    $luserid2 = $luserdata2['cust_id'];
    $luseremail = $luserdata2['cust_email'];
    $luserphn = $luserdata2['cust_mob'];

    $total = $_SESSION['GRAND_TOTAL'];
    $ordckt = $_SESSION['ORDER_CHECKOUT'];

?>

<!DOCTYPE html>
<html>

<head>
    <script src="assets/vendor/jquery/jquery-3.min.js"></script>

    <title>Checkout</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
    body {
        font-family: Arial;
        font-size: 17px;
        padding: 8px;
    }

    * {
        box-sizing: border-box;
    }

    .row {
        display: -ms-flexbox;
        /* IE10 */
        display: flex;
        -ms-flex-wrap: wrap;
        /* IE10 */
        flex-wrap: wrap;
        margin: 0 -16px;
    }

    .col-25 {
        -ms-flex: 25%;
        /* IE10 */
        flex: 25%;
    }

    .col-50 {
        -ms-flex: 50%;
        /* IE10 */
        flex: 50%;
    }

    .col-75 {
        -ms-flex: 75%;
        /* IE10 */
        flex: 75%;
    }

    .col-25,
    .col-50,
    .col-75 {
        padding: 0 16px;
    }

    .container {
        background-color: #f2f2f2;
        padding: 5px 20px 15px 20px;
        border: 1px solid lightgrey;
        border-radius: 3px;
    }

    input[type=text] {
        width: 100%;
        margin-bottom: 20px;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    label {
        margin-bottom: 10px;
        display: block;
    }

    .icon-container {
        margin-bottom: 20px;
        padding: 7px 0;
        font-size: 24px;
    }

    .btn {
        background-color: #4CAF50;
        color: white;
        padding: 12px;
        margin: 10px 0;
        border: none;
        width: 100%;
        border-radius: 3px;
        cursor: pointer;
        font-size: 17px;
    }

    .btn:hover {
        background-color: #45a049;
    }

    a {
        color: #2196F3;
    }

    hr {
        border: 1px solid lightgrey;
    }

    span.price {
        float: right;
        color: grey;
    }

    /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
    @media (max-width: 800px) {
        .row {
            flex-direction: column-reverse;
        }

        .col-25 {
            margin-bottom: 20px;
        }
    }
    </style>
</head>


<body>


    <div class="row">
        <div class="col-75">
            <div class="container">
                <form method="post">

                    <div class="row">
                        <div class="col-50">
                            <h3>Billing Address</h3>

                            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                            <input type="text" id="fname" name="firstname" value="<?php  echo $lusername2 ?>">
                            <label for="email"><i class="fa fa-envelope"></i> Email</label>
                            <input type="text" id="email" name="email" value="<?php echo $luseremail; ?>">
                            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street" required>
                            <label for="city"><i class="fa fa-institution"></i> City</label>
                            <input type="text" id="city" name="city" placeholder="New York" required>

                            <div class="row">

                                <div class="col-50">
                                    <label for="state">State</label>
                                    <input type="text" id="state" name="state" placeholder="NY" required>
                                </div>

                                <div class="col-50">
                                    <label for="zip">Pincode</label>
                                    <input type="text" id="zip" name="pin" placeholder="100001" required>
                                </div>
                            </div>

                            <div class="col-50" style="padding-top: 10px;">
                                <div class="row">
                                    <label></label>
                                    <input type="text" id="code" name="promocode" placeholder="Enter promo code">
                                    <!-- <button type="button" name="codeapply" class="btn btn-primary">Apply Coupon</button>  -->
                                    <!-- <a href="checkout.php?promo=<?php //echo $_POST['promocode']; ?>" onclick="" class="btn btn-primary" name="codeapply" style="text-decoration: none;">Apply</a> -->
                                </div>


                            </div>
                        </div>

                        <div class="col-50">
                            <h3>Payment</h3>
                            <label for="fname">Accepted Cards</label>

                            <div class="icon-container">
                                <i class="fa fa-cc-visa" style="color:navy;"></i>
                                <i class="fa fa-cc-amex" style="color:blue;"></i>
                                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                <i class="fa fa-cc-discover" style="color:orange;"></i>
                            </div>

                            <label for="cname">Name on Card</label>
                            <input type="text" id="cname" name="cardname" placeholder="John More Doe" required>
                            <label for="ccnum">Credit card number</label>
                            <input type="text" min="19" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" required>
                            <label for="expmonth">Exp Month</label>
                            <input type="text" id="expmonth" name="expmonth" placeholder="September" required>

                            <div class="row">
                                <div class="col-50">
                                    <label for="expyear">Exp Year</label>
                                    <input type="text" id="expyear" name="expyear" placeholder="2018" required>
                                </div>

                                <div class="col-50">
                                    <label for="cvv">CVV</label>
                                    <input type="text" min="3" id="cvv" name="cvv" placeholder="352" required>
                                </div>


                            </div>
                        </div>
                    </div>
                    <br>

                    <button type="submit" name="cfmord" class="btn">Confirm Order</button>

                </form>
            </div>
        </div>
    </div>
    <?php
  
if(isset($_POST['cfmord']))
  { 
    if($_POST['promocode'] != "")
    { 
      $code = $_POST['promocode'];

      if($_SESSION['ORDER_CHECKOUT'])
      {
        $offerselqry = "SELECT * FROM offers WHERE offer_code = '$code' AND offer_category = '$ordckt'";
        $exe1 = mysqli_query($conn,$offerselqry);
        $count = mysqli_num_rows($exe1);

          if($count>0)
          {
              $fetchqry = mysqli_fetch_assoc($exe1);
              $minamt = $fetchqry['min_ord_amt'];
              $offercode = $fetchqry['offer_code'];
              $offercat = $fetchqry['offer_category'];
              $offerdisc = $fetchqry['disc_per'];

              if($total >= $minamt)
              {
                $finalpayableamt = $total-(($total*$offerdisc)/100);
                $paidamt = number_format($finalpayableamt,2);
                echo"<script>alert('Your payment is successfully done with this amount {$paidamt} for your order...')</script>";
                redirect('index.php');
              }
              else
              {
                echo"<script>alert('You can not apply this coupon code')</script>";
              }
          }
          else
          {
            echo"<script>alert('You can not apply library offer coupon please enter valid coupon code...')</script>";
          }
      }
      else
      {
        echo "<script>alert('Coupon code is invalid.....')/script>";
      }
    }
    else
    {
        $paidordamt =  number_format($total,2);

        echo"<script>alert('Your payment is successfully done with this amount {$paidordamt} for your order...')</script>";
        redirect('index.php');
      
    }

}
?>

</body>

</html>