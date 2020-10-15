<html lang="en">
	<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DBMS Project</title>
		<link rel="stylesheet" href="FIRST_PAGE.css">
	</head>
	<body>
        <div class="header">
            <a href="HOME_PAGE.html" class="logo">Apple</a>
            <div class="header-right">
                <a class="active" href="Product_Details.php">Home</a>
                <a href="Login.php">Login</a>
                <a href="Logout.php">Logout</a>
            </div>
        </div>
        <style>
            input {
                width: 10%;
            }
            input[type=text] {
                padding: 12px 20px;
                margin: 8px 0;
                box-sizing: border-box;
                border: none;
                border-bottom: 2px solid red;
            }
        </style>
        <h2> Fetching Customer Details</h2>
        <form method="get" class="form1">
            <span class="text">Customer ID: </span>
            <input type="text" name="customer_id">
            <button type="submit" value="Fetch">Fetch</button>
        </form>
        <?php
            $con = mysqli_connect("localhost","root","123Aashish456","applestore");
            if($con)
            {
                echo "<br>Connection Successful";
                if (isset($_GET['customer_id']))
                {
                    echo "<br>ID Received <br>";
                    $customer_id=$_GET['customer_id'];
                    echo "<br> $customer_id";
                    $get_customer="select * from customer where cID='$customer_id'";
                    $run = mysqli_query($con,$get_customer);
                    while($details = mysqli_fetch_array($run))
                    {
                        echo "<br> Inside while";
                        $cID = $details['cID'];
                        $HANDLES = $details['HANDLES'];
                        $cEmail = $details['cEmail'];
                        $cLastPurchase = $details['cLastPurchase'];
                        $fetch_other_details = "select * from customeremail where cEmail='$cEmail'";
                        $run_other = mysqli_query($con,$fetch_other_details);
                        while($other_details=mysqli_fetch_array($run_other))
                        {
                            $cEmail = $other_details['cEmail'];
                            $cName_ = $other_details['cName_'];
                            $cGender = $other_details['cGender'];
                            $cPhone = $other_details['cPhone'];
                            $cType = $other_details['cType'];
                            echo "
                            <div>
                                <b>Customer ID              :</b> $cID          <br>
                                <b>Customer Name            :</b> $cName_       <br>
                                <b>Customer Gender          :</b> $cGender      <br>
                                <b>Customer Handler         :</b> $HANDLES      <br>
                                <b>Customer Email           :</b> $cEmail       <br>
                                <b>Customer Last Purchase   :</b> $cLastPurchase<br>
                                <b>Customer Phone           :</b> $cPhone       <br>
                                <b>Customer Type            :</b> $cType        <br>
                            </div>
                            ";
                        }
                    }
                }
            }
        ?>
	</body>
</html>