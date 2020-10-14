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
        <h2> Fetching Employee Details</h2>
        <form method="get" class="form1">
            <span class="text">Employee ID: </span>
            <input type="text" name="pro_id">
            <button type="submit" value="Fetch">Fetch</button>
        </form>
        <?php
            $con = mysqli_connect("localhost","root","123Aashish456","applestore");
            if($con)
            {
                echo "<br>Connection Successful";
                if (isset($_GET['pro_id'])){
                    echo "<br>ID Received <br>";
                    $pro_id=$_GET['pro_id'];
                    echo "<br> $pro_id";
                    $get_product="select * from employee where eID='$pro_id' ";
                    if($get_product){
                        echo "<br> Getting Employee.";
                    }
                    $run = mysqli_query($con,$get_product);
                    if($run){
                        echo "<br> Query Ran";
                    }
                    /*$details = mysqli_fetch_array($run);
                    if($details){
                        echo "<br> Details ran";
                    }*/
                    while($details = mysqli_fetch_array($run)){
                        echo "<br> Inside while";
                        //echo $details;
                        $eID = $details['eID'];
                        $eName = $details['eName'];
                        echo "<div>$eID <br> $eName </div>";
                    }
                }
            }
        ?>
	</body>
</html>