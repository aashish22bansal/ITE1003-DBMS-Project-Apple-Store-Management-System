<html lang="en">
	<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Customer View</title>
		<link rel="stylesheet" href="FIRST_PAGE.css">
	</head>
	<body>
        <div class="header">
            <a href="Admin_HOME_PAGE.html" class="logo">Apple</a>
            <div class="header-right">
                <a class="active" href="Admin_HOME_PAGE.html">Home</a>
                <a href="Customer_Login.php">Customer Login</a>
                <a href="Logout.php">Logout</a>
            </div>
        </div>
        <style>
            input 
            {
                width: 10%;
            }
            input[type=text] 
            {
                padding: 12px 20px;
                margin: 8px 0;
                box-sizing: border-box;
                border: none;
                border-bottom: 2px solid red;
            }
        </style>
        <h2> Fetching Customer Details</h2>
        <form method="post" class="form1">
            <span class="text">Customer ID: </span>
            <input type="text" name="customer_id">
            <button type="submit" value="Fetch">Fetch</button>
        </form>
        <?php
            $con = mysqli_connect("localhost","root","123Aashish456","applestore");
            if($con)
            {
                echo "<br>Connection Successful";
                if (isset($_POST['customer_id']))
                {
                    echo "<br>ID Received <br>";
                    $customer_id=$_POST['customer_id'];
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
        <h2> Adding an Customer Details</h2>
        <form method="post" class="form1">
            <span class="text">Customer ID:             </span><input type="text" name="cust_id"><br>
            <span class="text">Customer Name:           </span><input type="text" name="cust_name"><br>
            <span class="text">Customer Gender [M or F]:</span><input type="text" name="cust_gender"><br>
            <span class="text">Customer Handler:        </span><input type="text" name="cust_handler"><br>
            <span class="text">Customer Email:          </span><input type="text" name="cust_email"><br>
            <span class="text">Customer Last Purchase:  </span><input type="date" name="cust_last_purchase"><br>
            <span class="text">Customer Phone:          </span><input type="text" name="cust_phone"><br>
            <span class="text">Customer Type:           </span><input type="text" name="cust_type"><br>
            <button type="submit" value="Fetch">Add</button>
        </form>
        <?php
            if($con)
            {
                if(isset($_POST['cust_id']))
                {
                    echo "<br>Customer Detail Received!<br>";
                    $cust_id = $_POST['cust_id'];
                    $cust_name = $_POST['cust_name'];
                    $cust_gender = $_POST['cust_gender'];
                    $cust_handler = $_POST['cust_handler'];
                    $cust_email = $_POST['cust_email'];
                    $cust_last_purchase = $_POST['cust_last_purchase'];
                    $cust_phone = $_POST['cust_phone'];
                    $cust_type = $_POST['cust_type'];
                    echo "
                    <div>
                        <b>Customer ID              :</b> $cust_id <br>
                        <b>Customer Name            :</b> $cust_name<br>
                        <b>Customer Gender          :</b> $cust_gender<br>
                        <b>Customer Handler         :</b> $cust_handler<br>
                        <b>Customer Email           :</b> $cust_email<br>
                        <b>Customer Last Purchase   :</b> $cust_last_purchase<br>
                        <b>Customer Phone           :</b> $cust_phone<br>
                        <b>Customer Type            :</b> $cust_type<br>
                    </div>
                    ";
                    $insert_customer_table_1 = "insert into customer(cID,HANDLES,cEmail,cLastPurchase) values('$cust_id','$cust_handler','$cust_email','$cust_last_purchase')";
                    $insert_customer_table_2 = "insert into customeremail(cEmail,cName_,cGender,cPhone,cType) values('$cust_email','$cust_name','$cust_gender','$cust_phone','$cust_type')";
                    $run_query_1 = mysqli_query($con,$insert_customer_table_1);
                    $run_query_2 = mysqli_query($con,$insert_customer_table_2);
                    if($run_query_1)
                    {
                        echo "<br>Query 1 worked<br>";
                    }
                    if($run_query_2)
                    {
                        echo "<br>Query 2 worked<br>";
                    }
                }
            }
        ?>
        <h2>Removing a Customer</h2>
        <form method="post" class="form1">
            <span class="text">Customer ID: </span>
            <input type="text" name="pro_id">
            <button type="submit" value="Fetch">Remove Customer</button>
        </form>
        <?php
            if($con)
            {
                echo "<br>Connection Successful";
                if (isset($_POST['customer_id']))
                {
                    echo "<br>ID Received <br>";
                    $customer_id=$_POST['customer_id'];
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
                            echo "Now removing the Details the Customer from the Database inorder to complete the Process.";
                            $fire_query_1 = "delete from customeremail where cEmail='$cEmail'";
                            $fire_query_2 = "delete from customer where cID='$cID'";
                            $run_fire_query_1 = mysqli_query($con,$fire_query_1);
                            $run_fire_query_2 = mysqli_query($con,$fire_query_2);
                            if($run_fire_query_1)
                            {
                                echo "<br>Customer Personal Details DELETED.";
                            }
                            if($run_fire_query_2)
                            {
                                echo "<br>Customer Details Deleted COMPLETELY.";
                            }
                            echo "<br>The Customer has been REMOVED.";
                        }
                    }
                }
            }
        ?>
	</body>
</html>