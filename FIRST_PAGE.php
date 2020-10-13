<html>
	<head>
        <title>DBMS Project</title>
	</head>
	<body>
		<form method="get">
            <input type="texr" name="pro_id">
            <button value="Fetch">Fetch</button>
        </form>
        <?php
            $con = mysqli_connect("localhost","root","123Aashish456","applestore");
            if($con)
            {
                echo "Connection Successful";
                if (isset($_GET['pro_id'])){
                    echo "ID Received <br>";
                    $pro_id=$_GET['pro_id'];
                    echo "<br> $pro_id";
                    $get_product="select * from appleproducts where apID='$pro_id' ";;
                    if($get_product){
                        echo "<br> Getting Product.";
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
                        $apID = $details['apID'];
                        $apName = $details['apName'];
                        $Buys = $details['Buys'];
                        echo "<div>$apID <br> $apName <br> $Buys</div>";
                    }
                }
            }
        ?>
	</body>
</html>