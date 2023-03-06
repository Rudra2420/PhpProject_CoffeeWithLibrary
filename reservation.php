<?php
session_start();
include_once('database/dbconn.php');
include_once('database/function.php');

    if(!isset($_SESSION['IS_LOGIN']))
    {
        echo "<script>alert('Please do registration and login first...')</script>";
        redirect('forms/login-registration.php');
    }

	$lusername2 = $_SESSION['IS_LOGIN'];
	$userqry2 = "SELECT * FROM customer WHERE cust_name = '$lusername2'";
	$userdataexe2 = mysqli_query($conn,$userqry2);
	$luserdata2 = mysqli_fetch_assoc($userdataexe2);
    $luserid2 = $luserdata2['cust_id'];
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Reservation Form</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="assets/css/reservation.css">
    </head>
    <body>

        <section class = "banner">
            <h1>MAKE YOUR RESERVATION</h1>
            <div class = "card-container col-md-6 col-lg-6">
                <div class = "card-img">
                    <!-- image here -->
                </div>

                <div class = "card-content col-md-6 col-lg-6">
                    <h3>Reservation</h3>
                    
                    <form method="POST" >
					
					    <div class = "form-row">
                            <input type = "text" name="username" placeholder="Full Name" required>
                            <input type = "number" name="userphn" placeholder="Phone Number" required>
                        </div>
                    
						
                        <div class = "form-row ">
                            <input type="date" name="revdate" required>

                            <input type="time" name="revhours" required/>

                            <!-- <select name = "revhours" required>
                                <option value = "hour-select">Select Hour</option>
                                <option value = "10">10: 00</option>
                                <option value = "10">12: 00</option>
                                <option value = "10">14: 00</option>
                                <option value = "10">16: 00</option>
                                <option value = "10">18: 00</option>
                                <option value = "10">20: 00</option>
                                <option value = "10">22: 00</option>
                            </select> -->
                        </div>

                        <div class = "form-row">
                            <input type = "number" name="persons" placeholder="How Many Persons?" min = "1"  >
                        </div>

                        <div class = "form-row">
                            <input type="text" name="token" value=" Token Amount: 300" disabled>

                            <input type = "submit" name="reservtable" value = "BOOK TABLE">
                        </div>
                    </form>

                </div>
            </div>
        </section>


<?php

    

    if(isset($_POST['reservtable']))
    {
        $userrevdate = $_POST['revdate'];

        $selqry = "SELECT * FROM reservation_tbl WHERE cust_id = $luserid2 AND rev_date = '$userrevdate'";
        $selqryexe = mysqli_query($conn,$selqry);
        $numofrcd = mysqli_num_rows($selqryexe);

        // $fetchary = mysqli_fetch_assoc($selqryexe);
        // $revid = $fetchary['rev_id'];
        // $_SESSION['REV_ID'] = $revid;
        // echo $revid;
        

        if($numofrcd>0)
        {
           echo "<script>alert('You are already booked a table on this day...')</script>";
            redirect('index.php');
        }
        else
        {
            $username = $_POST['username'];
            $userphn = $_POST['userphn'];
            // date_default_timezone_set("Asia/Kolkata");
            $revhours = $_POST['revhours'];
            $persons = $_POST['persons'];
            
            $tknamt = "300";
            $_SESSION['TKN_AMT'] = $tknamt;
            $defaultstatus = "pending";

            $insqry = "INSERT INTO reservation_tbl (cust_id, rev_date, capacity, token_amt, rev_status, rev_time, cust_ph) VALUES ($luserid2, '$userrevdate', $persons, '$tknamt', '$defaultstatus', '$revhours', '$userphn')";
            $insqryexe = mysqli_query($conn,$insqry);

            if(!$insqryexe)
            {
                echo "<script>alert('Table Reservation Is Failed...')</script>";
            }
            else
            {
                echo "<script>alert('Table Reservation Is Successful please countinue to checkout process...')</script>";
                redirect('rev_checkout.php');
            }

        }
    }
?>


    </body>
</html> 