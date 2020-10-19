<html lang="en">
	<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Products View</title>
		<link rel="stylesheet" href="FIRST_PAGE.css">
	</head>
	<body>
        <nav class="site-header sticky-top py-1">
			<div class="container d-flex flex-column flex-md-row justify-content-between">
				<a class="py-2" href="#" aria-label="Product"></a>
				<a class="py-2 d-none d-md-inline-block" href="#"> <img src="apple logo.png" height="30 px" width="30 px"> </a>
				<a class="py-2 d-none d-md-inline-block" href="Customer_HOME_PAGE.html">Home</a>
				<a class="py-2 d-none d-md-inline-block" href="Customer_Login.php">Admin Login</a>
				<a class="py-2 d-none d-md-inline-block" href="Customer_Logout.php">Logout</a>
				<a class="py-2 d-none d-md-inline-block" href="#"></a>
				<a class="py-2 d-none d-md-inline-block" href="#"></a>
				<a class="py-2 d-none d-md-inline-block" href="#"></a>
			</div>
		</nav>
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
        <h2> Fetching Product Details</h2>
        <form method="post" class="form1">
            <span class="text">Product Type: </span>
            <input type="text" name="pro_type">
            <span class="text">Product ID: </span>
            <input type="text" name="pro_id">
            <button type="submit" class="button" name="Fetch" value="Fetch">Fetch</button>
        </form>
        <?php
            if(array_key_exists('Fetch',$_POST))
            {
                Fetch();
            }
            function Fetch()
            {
                $con = mysqli_connect("localhost","root","123Aashish456","applestore");
                if($con)
                {
                    echo "<br>Connection Successful";
                    if(isset($_POST['pro_type']))
                    {
                        $pro_type=$_POST['pro_type'];
                        if($pro_type=="iPhone" || $pro_type=="iphone" || $pro_type=="IPHONE")
                        {
                            if (isset($_POST['pro_id']))
                            {
                                echo "<br>ID Received <br>";
                                $pro_name=$_POST['pro_id'];
                                $pro_id = $pro_name;
                                $get_iphone = "select * from iphone where iPhProductID='$pro_id'";
                                $run_iphone = mysqli_query($con,$get_iphone);
                                while($iphone_details = mysqli_fetch_array($run_iphone))
                                {
                                    $iPhProductID = $iphone_details['iPhProductID'];
                                    $iPhName_ = $iphone_details['iPhName_'];
                                    $DeviceID = $iphone_details['DeviceID'];
                                    $getting_other_details = "select * from iphonename where iPhName_='$iPhName_'";
                                    $running_other_details = mysqli_query($con,$getting_other_details);
                                    while($other_iphone_details = mysqli_fetch_array($running_other_details))
                                    {
                                        $iPhName_ = $other_iphone_details['iPhName_'];
                                        $iPhScreen = $other_iphone_details['iPhScreen'];
                                        $iPhRAM = $other_iphone_details['iPhRAM'];
                                        $iPhUnlocking_Feature = $other_iphone_details['iPhUnlocking_Feature'];
                                        $iPhStorage = $other_iphone_details['iPhStorage_'];
                                        $iPhBattery = $other_iphone_details['iPhBattery'];
                                        $iPhCharger = $other_iphone_details['iPhCharger'];
                                        $iPhWeight = $other_iphone_details['iPhWeight'];
                                        $iPhProcessor = $other_iphone_details['iPhProcessor'];
                                        $iPhPrice = $other_iphone_details['iPhPrice'];
                                        echo "
                                        <div>
                                            <b>iPhone ID                :</b> $iPhProductID         <br>
                                            <b>iPhone Name              :</b> $iPhName_             <br>
                                            <b>iPhone Device ID         :</b> $DeviceID             <br>
                                            <b>iPhone Screen Size       :</b> $iPhScreen            <br>
                                            <b>iPhone RAM               :</b> $iPhRAM               <br>
                                            <b>iPhone Unlocking Feature :</b> $iPhUnlocking_Feature <br>
                                            <b>iPhone Storage           :</b> $iPhStorage           <br>
                                            <b>iPhone Battery           :</b> $iPhBattery           <br>
                                            <b>iPhone Charger           :</b> $iPhCharger           <br>
                                            <b>iPhone Weight            :</b> $iPhWeight            <br>
                                            <b>iPhone Processor         :</b> $iPhProcessor         <br>
                                            <b>iPhone Price             :</b> $iPhPrice             <br>
                                        </div>
                                        ";
                                    }
                                }
                            }
                        }
                        else if($pro_type=="iPad" || $pro_type=="ipad" || $pro_type=="IPAD")
                        {
                            if (isset($_POST['pro_id']))
                            {
                                echo "<br>ID Received <br>";
                                $pro_name=$_POST['pro_id'];
                                $pro_id = $pro_name;
                                $get_ipad = "select * from ipad where iPaProductID='$pro_id'";
                                $run_ipad = mysqli_query($con,$get_ipad);
                                while($ipad_details = mysqli_fetch_array($run_ipad))
                                {
                                    $iPaProductID = $ipad_details['iPaProductID'];
                                    $iPaName_ = $ipad_details['iPaName_'];
                                    echo $iPaName_;
                                    $DeviceId = $ipad_details['DeviceId'];
                                    $getting_other_details = "select * from ipadname where iPaName='$iPaName_'";
                                    if($getting_other_details)
                                    {
                                        echo "<br>Query Given<br>";
                                    }
                                    $running_other_details = mysqli_query($con,$getting_other_details);
                                    if($running_other_details)
                                    {
                                        echo "Query Ran<br>";
                                    }
                                    while($other_ipad_details = mysqli_fetch_array($running_other_details))
                                    {
                                        echo "Inside while<br>";
                                        $iPaName            = $other_ipad_details['iPaName'];
                                        $iPaScreenSize      = $other_ipad_details['iPaScreenSize'];
                                        $iPaRAM             = $other_ipad_details['iPaRAM'];
                                        $iPaUnlocking_Feature=$other_ipad_details['iPaUnlocking_Feature'];
                                        $iPaStorage_        = $other_ipad_details['iPaStorage_'];
                                        $iPaBattery         = $other_ipad_details['iPaBattery'];
                                        $iPaWeight          = $other_ipad_details['iPaWeight'];
                                        $iPaProcessor       = $other_ipad_details['iPaProcessor'];
                                        $iPaPrice           = $other_ipad_details['iPaPrice'];
                                        echo "
                                        <div>
                                            <b>iPad ID                :</b> $iPaProductID         <br>
                                            <b>iPad Name              :</b> $iPaName_             <br>
                                            <b>iPad Device ID         :</b> $DeviceId             <br>
                                            <b>iPad Screen Size       :</b> $iPaScreen            <br>
                                            <b>iPad RAM               :</b> $iPaRAM               <br>
                                            <b>iPad Unlocking Feature :</b> $iPaUnlocking_Feature <br>
                                            <b>iPad Storage           :</b> $iPaStorage           <br>
                                            <b>iPad Battery           :</b> $iPaBattery           <br>
                                            <b>iPad Weight            :</b> $iPaWeight            <br>
                                            <b>iPad Processor         :</b> $iPaProcessor         <br>
                                            <b>iPad Price             :</b> $iPaPrice             <br>
                                        </div>
                                        ";
                                    }
                                }
                            }
                        }
                        else if($pro_type=="MacBook" || $pro_type=="macbook" || $pro_type=="MACBOOK")
                        {
                            if (isset($_POST['pro_id']))
                            {
                                echo "<br>ID Received <br>";
                                $pro_name=$_POST['pro_id'];
                                $pro_id = $pro_name;
                                $get_iphone = "select * from macbook where mProductID='$pro_id'";
                                $run_iphone = mysqli_query($con,$get_iphone);
                                while($iphone_details = mysqli_fetch_array($run_iphone))
                                {
                                    $mProductID = $iphone_details['mProductID'];
                                    $mName = $iphone_details['mName'];
                                    echo $mName;
                                    $DeviceId = $iphone_details['DeviceId'];
                                    $getting_other_details = "select * from macbookname where mName='$mName'";
                                    if($getting_other_details)
                                    {
                                        echo "<br>Query Given<br>";
                                    }
                                    $running_other_details = mysqli_query($con,$getting_other_details);
                                    if($running_other_details)
                                    {
                                        echo "Query Ran<br>";
                                    }
                                    while($other_macbook_details = mysqli_fetch_array($running_other_details))
                                    {
                                        $mName      = $other_macbook_details['mName'];
                                        $mScreensize= $other_macbook_details['mScreensize'];
                                        $mRAM       = $other_macbook_details['mRAM'];
                                        $mGPU       = $other_macbook_details['mGPU'];
                                        $mStorage_  = $other_macbook_details['mStorage_'];
                                        $mBattery   = $other_macbook_details['mBattery'];
                                        $mWeight    = $other_macbook_details['mWeight'];
                                        $mProcessor = $other_macbook_details['mProcessor'];
                                        $mPrice     = $other_macbook_details['mPrice'];
                                        echo "
                                        <div>
                                            <b>MackBook ID            :</b> $mProductID     <br>
                                            <b>MackBook Name          :</b> $mName          <br>
                                            <b>MackBook Device ID     :</b> $DeviceId       <br>
                                            <b>MackBook Screen Size   :</b> $mScreensize    <br>
                                            <b>MackBook RAM           :</b> $mRAM           <br>
                                            <b>MackBook GPU           :</b> $mGPU           <br>
                                            <b>MackBook Storage       :</b> $mStorage_      <br>
                                            <b>MackBook Battery       :</b> $mBattery       <br>
                                            <b>MackBook Weight        :</b> $mWeight        <br>
                                            <b>MackBook Processor     :</b> $mProcessor     <br>
                                            <b>MackBook Price         :</b> $mPrice         <br>
                                        </div>
                                        ";
                                    }
                                }
                            }
                        }
                        else if($pro_type=="AirPods" || $pro_type=="airpods" || $pro_type=="AIRPODS")
                        {
                            if (isset($_POST['pro_id']))
                            {
                                echo "<br>ID Received <br>";
                                $pro_name=$_POST['pro_id'];
                                $pro_id = $pro_name;
                                $get_airpods = "select * from airpods where aProductID='$pro_id'";
                                $run_airpods = mysqli_query($con,$get_airpods);
                                while($airpod_details = mysqli_fetch_array($run_airpods))
                                {
                                    $aProductID = $airpod_details['aProductID'];
                                    $aName_ = $airpod_details['aName_'];
                                    echo $aName_;
                                    $DeviceID = $airpod_details['DeviceID'];
                                    $getting_other_details = "select * from airpodsname where aName_='$aName_'";
                                    if($getting_other_details)
                                    {
                                        echo "<br>Query Given<br>";
                                    }
                                    $running_other_details = mysqli_query($con,$getting_other_details);
                                    if($running_other_details)
                                    {
                                        echo "Query Ran<br>";
                                    }
                                    while($other_airpod_details = mysqli_fetch_array($running_other_details))
                                    {
                                        $aName_             = $other_airpod_details['aName_'];
                                        $aDriver            = $other_airpod_details['aDriver'];
                                        $aRange_            = $other_airpod_details['aRange_'];
                                        $aGestureControl    = $other_airpod_details['aGestureControl'];
                                        $aBatteryBackup     = $other_airpod_details['aBatteryBackup'];
                                        $aBluetoothVersion  = $other_airpod_details['aBluetoothVersion'];
                                        $aPrice             = $other_airpod_details['aPrice'];
                                        echo "
                                        <div>
                                            <b>AirPod ID                :</b> $aProductID       <br>
                                            <b>AirPod Name              :</b> $aName_           <br>
                                            <b>AirPod Device ID         :</b> $DeviceID         <br>
                                            <b>AirPod Driver            :</b> $aDriver          <br>
                                            <b>AirPod Range             :</b> $aRange_          <br>
                                            <b>AirPod Gesture Control   :</b> $aGestureControl  <br>
                                            <b>AirPod Battery Backup    :</b> $aBatteryBackup   <br>
                                            <b>AirPod Bluetooth Version :</b> $mBattery         <br>
                                            <b>AirPod Price             :</b> $aPrice           <br>
                                        </div>
                                        ";
                                    }
                                }
                            }
                        }
                    }
                }
            }
        ?>
        <h2>Adding Product Details</h2>
        <form method="post" class="form1">
            <span class="text">Product Type: </span>
            <input type="text" name="pro_type">
            <span class="text">Product ID: </span>
            <input type="text" name="pro_id">
            <button type="submit" class="button" name="Add" value="Add">Add</button>
        </form>
        <?php
            if(array_key_exists('Add',$_POST))
            {
                Add();
            }
            function Add()
            {
                $con = mysqli_connect("localhost","root","123Aashish456","applestore");
                if($con)
                {
                    echo "<br>Connection Successful";
                    if(isset($_POST['pro_type']))
                    {
                        $pro_type=$_POST['pro_type'];
                        if($pro_type=="iPhone" || $pro_type=="iphone" || $pro_type=="IPHONE")
                        {
                            if (isset($_POST['pro_id']))
                            {
                                echo "<br>ID Received <br>";
                                $pro_name=$_POST['pro_id'];
                                $pro_id = $pro_name;
                                echo "
                                <form method='post' class='form1'>
                                    <span class='text'>  Apple Product ID:          </span><input type='text' name='apID'><br>
                                    <span class='text'>  iPhone Product ID:         </span><input type='text' name='iPhProductID'><br>
                                    <span class='text'>  iPhone Name:               </span><input type='text' name='iPhName_'><br>
                                    <span class='text'>  iPhone Device ID:          </span><input type='text' name='DeviceID'><br>
                                    <span class='text'>  iPhone Screen Size:        </span><input type='number' name='iPhScreen'><br>
                                    <span class='text'>  iPhone RAM:                </span><input type='number' name='iPhRAM'><br>
                                    <span class='text'>  iPhone Unlocking Feature:  </span><input type='text' name='iPhUnlocking_Feature'><br>
                                    <span class='text'>  iPhone Storage:            </span><input type='number' name='iPhStorage_'><br>
                                    <span class='text'>  iPhone Battery:            </span><input type='text' name='iPhBattery'><br>
                                    <span class='text'>  iPhone Charger:            </span><input type='text' name='iPhCharger'><br>
                                    <span class='text'>  iPhone Weight:             </span><input type='text' name='iPhWeight'><br>
                                    <span class='text'>  iPhone Processor:          </span><input type='text' name='iPhProcessor'><br>
                                    <span class='text'>  iPhone Price:              </span><input type='number' name='iPhPrice'><br>
                                    <button type='submit' class='button' name='Add_iPhone' value='Add_iPhone'>Add</button>
                                </form>
                                ";
                                if(array_key_exists('Add_iPhone',$_POST))
                                {
                                    Add_iPhone();
                                }
                                else
                                {
                                    echo "<br><b>FORM DIDN'T AUTHENTICATE.</b><br>";
                                }
                                function Add_iPhone()
                                {
                                    if(isset($_POST['iPhProductID']))
                                    {
                                        echo "<br>iPhone Detail Received!<br>";
                                        $apID                   = $_POST['apID'];
                                        $iPhProductID           = $_POST['iPhProductID'];
                                        $iPhName_               = $_POST['iPhName_'];
                                        $DeviceID               = $_POST['DeviceID'];
                                        $iPhScreen              = $_POST['iPhScreen'];
                                        $iPhRAM                 = $_POST['iPhRAM'];
                                        $iPhUnlocking_Feature   = $_POST['iPhUnlocking_Feature'];
                                        $iPhStorage_            = $_POST['iPhStorage_'];
                                        $iPhBattery             = $_POST['iPhBattery'];
                                        $iPhCharger             = $_POST['iPhCharger'];
                                        $iPhWeight              = $_POST['iPhWeight'];
                                        $iPhProcessor           = $_POST['iPhProcessor'];
                                        $iPhPrice               = $_POST['iPhPrice'];
                                        $add_iphone_query_1 = "insert into appleproducts(apID,apName,Buys) values('$apID','$iPhName_','X')";
                                        $add_iphone_query_2 = "insert into iphone(iPhProductID,iPhName_,DeviceID) values('$iPhProductID','$iPhName_','$DeviceID')";
                                        $add_iphone_query_3 = "insert into iphonename(iPhName_,iPhScreen,iPhRAM,iPhUnlocking_Feature,iPhStorage_,iPhBattery,iPhCharger,iPhWeight,iPhProcessor,iPhPrice) values('$iPhName_','$iPhScreen','$iPhRAM','$iPhUnlocking_Feature','$iPhStorage_','$iPhBattery','$iPhCharger','$iPhWeight','$iPhProcessor','$iPhPrice')";
                                        $run_add_iphone_query_1 = mysqli_query($con,$add_iphone_query_1);
                                        $run_add_iphone_query_2 = mysqli_query($con,$add_iphone_query_2);
                                        $run_add_iphone_query_3 = mysqli_query($con,$add_iphone_query_3);
                                        if($run_add_iphone_query_1)
                                        {
                                            echo "<br>In the process of adding the Product Details.<br>";
                                        }
                                        else
                                        {
                                            echo "<br><b>FIRST QUERY DID NOT RUN.</b><br>";
                                        }
                                        if($run_add_iphone_query_2)
                                        {
                                            echo "<br>Product Details <b>ADDED</b>.<br>";
                                        }
                                        else
                                        {
                                            echo "<br><b>SECOND QUERY DID NOT RUN. </b><br>";
                                        }
                                        if($run_add_iphone_query_3)
                                        {
                                            echo "<br>Process Completed.<br>";
                                        }
                                        else
                                        {
                                            echo "<br><b>THIRD QUERY DID NOT RUN.</b><br>";
                                        }

                                        // Displaying the Details after adding to the database
                                        $get_iphone = "select * from iphone where iPhProductID='$iPhProductID'";
                                        $run_iphone = mysqli_query($con,$get_iphone);
                                        while($iphone_details = mysqli_fetch_array($run_iphone))
                                        {
                                            $iPhProductID = $iphone_details['iPhProductID'];
                                            $iPhName_ = $iphone_details['iPhName_'];
                                            $DeviceID = $iphone_details['DeviceID'];
                                            $getting_other_details = "select * from iphonename where iPhName_='$iPhName_'";
                                            $running_other_details = mysqli_query($con,$getting_other_details);
                                            while($other_iphone_details = mysqli_fetch_array($running_other_details))
                                            {
                                                $iPhName_ = $other_iphone_details['iPhName_'];
                                                $iPhScreen = $other_iphone_details['iPhScreen'];
                                                $iPhRAM = $other_iphone_details['iPhRAM'];
                                                $iPhUnlocking_Feature = $other_iphone_details['iPhUnlocking_Feature'];
                                                $iPhStorage = $other_iphone_details['iPhStorage_'];
                                                $iPhBattery = $other_iphone_details['iPhBattery'];
                                                $iPhCharger = $other_iphone_details['iPhCharger'];
                                                $iPhWeight = $other_iphone_details['iPhWeight'];
                                                $iPhProcessor = $other_iphone_details['iPhProcessor'];
                                                $iPhPrice = $other_iphone_details['iPhPrice'];
                                                echo "
                                                <div>
                                                    <b>iPhone ID                :</b> $iPhProductID         <br>
                                                    <b>iPhone Name              :</b> $iPhName_             <br>
                                                    <b>iPhone Device ID         :</b> $DeviceID             <br>
                                                    <b>iPhone Screen Size       :</b> $iPhScreen            <br>
                                                    <b>iPhone RAM               :</b> $iPhRAM               <br>
                                                    <b>iPhone Unlocking Feature :</b> $iPhUnlocking_Feature <br>
                                                    <b>iPhone Storage           :</b> $iPhStorage           <br>
                                                    <b>iPhone Battery           :</b> $iPhBattery           <br>
                                                    <b>iPhone Charger           :</b> $iPhCharger           <br>
                                                    <b>iPhone Weight            :</b> $iPhWeight            <br>
                                                    <b>iPhone Processor         :</b> $iPhProcessor         <br>
                                                    <b>iPhone Price             :</b> $iPhPrice             <br>
                                                </div>
                                                ";
                                            }
                                        }
                                    }
                                    else
                                    {
                                        echo "<br><b>DATA NOT RECEIVED.</b><br>";
                                    }
                                }
                            }
                            else
                            {
                                echo "<br><b>ENTERED VALUE NOT FOUND.</b><br>";
                            }
                        }
                        else if($pro_type=="iPad" || $pro_type=="ipad" || $pro_type=="IPAD")
                        {
                            if (isset($_POST['pro_id']))
                            {
                                echo "<br>ID Received <br>";
                                $pro_name=$_POST['pro_id'];
                                $pro_id = $pro_name;
                                echo "
                                <form method='post' class='form1'>
                                    <span class-'text'>  Apple Product ID:        </span><input type='text' name='apID'><br>
                                    <span class='text'>  iPad Product ID:         </span><input type='text' name='iPaProductID'><br>
                                    <span class='text'>  iPad Name:               </span><input type='text' name='iPaName_'><br>
                                    <span class='text'>  iPad Device ID:          </span><input type='text' name='DeviceId'><br>
                                    <span class='text'>  iPad Screen Size:        </span><input type='number' name='iPaScreenSize'><br>
                                    <span class='text'>  iPad RAM:                </span><input type='number' name='iPaRAM'><br>
                                    <span class='text'>  iPad Unlocking Feature:  </span><input type='text' name='iPaUnlockingFeature'><br>
                                    <span class='text'>  iPad Storage:            </span><input type='number' name='iPaStorage_'><br>
                                    <span class='text'>  iPad Battery:            </span><input type='text' name='iPaBattery'><br>
                                    <span class='text'>  iPad Weight:             </span><input type='text' name='iPaWeight'><br>
                                    <span class='text'>  iPad Processor:          </span><input type='text' name='iPaProcessor'><br>
                                    <span class='text'>  iPad Price:              </span><input type='number' name='iPaPrice'><br>
                                    <button type='submit' class='button' name='Add_iPad' value='Add_iPad'>Add</button>
                                </form>
                                ";
                                if(array_key_exists('Add_iPad',$_POST))
                                {
                                    Add_iPad();
                                }
                                else
                                {
                                    echo "<br><b>FORM DIDN'T AUTHENTICATE.</b><br>";
                                }
                                function Add_iPad()
                                {
                                    if(isset($_POST['iPaProductID']))
                                    {
                                        echo "<br>iPad Detail Received!<br>";
                                        $apID                   = $_POST['apID'];
                                        $iPaProductID           = $_POST['iPhProductID'];
                                        $iPaName_               = $_POST['iPhName_'];
                                        $DeviceID               = $_POST['DeviceID'];
                                        $iPaScreen              = $_POST['iPhScreen'];
                                        $iPaRAM                 = $_POST['iPhRAM'];
                                        $iPaUnlocking_Feature   = $_POST['iPhUnlocking_Feature'];
                                        $iPaStorage_            = $_POST['iPhStorage_'];
                                        $iPaBattery             = $_POST['iPhBattery'];
                                        $iPaWeight              = $_POST['iPhWeight'];
                                        $iPaProcessor           = $_POST['iPhProcessor'];
                                        $iPaPrice               = $_POST['iPhPrice'];
                                        $add_ipad_query_1 = "insert into appleproducts(apID,apName,Buys) values('$apID','$iPaName_','X')";
                                        $add_ipad_query_2 = "insert into ipad(iPaProductID,iPaName_,DeviceId) values('$iPhProductID','$iPhName_','$DeviceID')";
                                        $add_ipad_query_3 = "insert into ipadname(iPaName,iPaScreenSize,iPaRAM,iPaUnlockingFeature,iPaStorage_,iPaBattery,iPaWeight,iPaProcessor,iPaPrice) values('$iPaName_','$iPaScreenSize','$iPaRAM','$iPaUnlockingFeature','$iPaStorage_','$iPaBattery','$iPaWeight','$iPaProcessor','$iPaPrice')";
                                        $run_add_ipad_query_1 = mysqli_query($con,$add_ipad_query_1);
                                        $run_add_ipad_query_2 = mysqli_query($con,$add_ipad_query_2);
                                        $run_add_ipad_query_3 = mysqli_query($con,$add_ipad_query_3);
                                        if($run_add_ipad_query_1)
                                        {
                                            echo "<br>In the process of adding the Product Details.<br>";
                                        }
                                        else
                                        {
                                            echo "<br><b>FIRST QUERY DID NOT RUN.</b><br>";
                                        }
                                        if($run_add_ipad_query_2)
                                        {
                                            echo "<br>Product Details <b>ADDED</b>.<br>";
                                        }
                                        else
                                        {
                                            echo "<br><b>SECOND QUERY DID NOT RUN.</b><br>";
                                        }
                                        if($run_add_ipad_query_3)
                                        {
                                            echo "<br>Process Completed.<br>";
                                        }
                                        else
                                        {
                                            echo "<br><b>THIRD QUERY DID NOT RUN.</b><br>";
                                        }

                                        // Displaying the Details after adding to the database
                                        echo "<br>ID Received <br>";
                                        $pro_name=$_POST['iPaProductID'];
                                        $pro_id = $pro_name;
                                        $get_ipad = "select * from ipad where iPaProductID='$pro_id'";
                                        $run_ipad = mysqli_query($con,$get_ipad);
                                        while($ipad_details = mysqli_fetch_array($run_ipad))
                                        {
                                            $iPaProductID = $ipad_details['iPaProductID'];
                                            $iPaName_ = $ipad_details['iPaName_'];
                                            echo $iPaName_;
                                            $DeviceId = $ipad_details['DeviceId'];
                                            $getting_other_details = "select * from ipadname where iPaName='$iPaName_'";
                                            if($getting_other_details)
                                            {
                                                echo "<br>Query Given<br>";
                                            }
                                            $running_other_details = mysqli_query($con,$getting_other_details);
                                            if($running_other_details)
                                            {
                                                echo "Query Ran<br>";
                                            }
                                            while($other_ipad_details = mysqli_fetch_array($running_other_details))
                                            {
                                                echo "Inside while<br>";
                                                $iPaName            = $other_ipad_details['iPaName'];
                                                $iPaScreenSize      = $other_ipad_details['iPaScreenSize'];
                                                $iPaRAM             = $other_ipad_details['iPaRAM'];
                                                $iPaUnlocking_Feature=$other_ipad_details['iPaUnlocking_Feature'];
                                                $iPaStorage_        = $other_ipad_details['iPaStorage_'];
                                                $iPaBattery         = $other_ipad_details['iPaBattery'];
                                                $iPaWeight          = $other_ipad_details['iPaWeight'];
                                                $iPaProcessor       = $other_ipad_details['iPaProcessor'];
                                                $iPaPrice           = $other_ipad_details['iPaPrice'];
                                                echo "
                                                <div>
                                                    <b>iPhone ID                :</b> $iPaProductID         <br>
                                                    <b>iPhone Name              :</b> $iPaName_             <br>
                                                    <b>iPhone Device ID         :</b> $DeviceId             <br>
                                                    <b>iPhone Screen Size       :</b> $iPaScreen            <br>
                                                    <b>iPhone RAM               :</b> $iPaRAM               <br>
                                                    <b>iPhone Unlocking Feature :</b> $iPaUnlocking_Feature <br>
                                                    <b>iPhone Storage           :</b> $iPaStorage           <br>
                                                    <b>iPhone Battery           :</b> $iPaBattery           <br>
                                                    <b>iPhone Weight            :</b> $iPaWeight            <br>
                                                    <b>iPhone Processor         :</b> $iPaProcessor         <br>
                                                    <b>iPhone Price             :</b> $iPaPrice             <br>
                                                </div>
                                                ";
                                            }
                                        }
                                    }
                                    else
                                    {
                                        echo "<br><b>DATA NOT RECEIVED.</b><br>";
                                    }
                                }
                            }
                            else
                            {
                                echo "<br><b>ENTERED VALUE NOT FOUND.</b><br>";
                            }
                        }
                        else if($pro_type=="MacBook" || $pro_type=="macbook" || $pro_type=="MACBOOK")
                        {
                            if (isset($_POST['pro_id']))
                            {
                                echo "<br>ID Received <br>";
                                $pro_name=$_POST['pro_id'];
                                $pro_id = $pro_name;
                                echo "
                                <form method='post' class='form1'>
                                    <span class='text'>  Apple Product ID:   </span><input type='text' name='apID'><br>
                                    <span class='text'>  MacBook Product ID: </span><input type='text' name='mProductID'><br>
                                    <span class='text'>  MacBook Name:       </span><input type='text' name='mName'><br>
                                    <span class='text'>  MacBook Device ID:  </span><input type='text' name='DeviceId'><br>
                                    <span class='text'>  MacBook Screen Size:</span><input type='number' name='mScreensize'><br>
                                    <span class='text'>  MacBook RAM:        </span><input type='number' name='mRAM'><br>
                                    <span class='text'>  MacBook GPU:        </span><input type='text' name='mGPU'><br>
                                    <span class='text'>  MacBook Storage:    </span><input type='number' name='mStorage_'><br>
                                    <span class='text'>  MacBook Battery:    </span><input type='text' name='mBattery'><br>
                                    <span class='text'>  MacBook Weight:     </span><input type='text' name='mWeight'><br>
                                    <span class='text'>  MacBook Processor:  </span><input type='text' name='mProcessor'><br>
                                    <span class='number'>MacBook Price:      </span><input type='number' name='mPrice'><br>
                                    <button type='submit' class='button' name='Add_MacBook' value='Add_MacBook'>Add</button>
                                </form>
                                ";
                                if(array_key_exists('Add_MacBook',$_POST))
                                {
                                    Add_MacBook();
                                }
                                else
                                {
                                    echo "<br><b>FORM DIDN'T AUTHENTICATE.</b><br>";
                                }
                                function Add_MacBook()
                                {
                                    if(isset($_POST['mProductID']))
                                    {
                                        echo "<br>MacBook Detail Received!<br>";
                                        $apID                 = $_POST['apID'];
                                        $mProductID           = $_POST['mProductID'];
                                        $mName                = $_POST['mName'];
                                        $DeviceId             = $_POST['DeviceId'];
                                        $mScreensize          = $_POST['mScreensize'];
                                        $mRAM                 = $_POST['mRAM'];
                                        $mGPU                 = $_POST['mGPU'];
                                        $mStorage_            = $_POST['mStorage_'];
                                        $mBattery             = $_POST['mBattery'];
                                        $mWeight              = $_POST['mWeight'];
                                        $mProcessor           = $_POST['mProcessor'];
                                        $mPrice               = $_POST['mPrice'];
                                        $add_macbook_query_1 = "insert into appleproducts(apID,apName,Buys) values('$apID','$mName','X')";
                                        $add_macbook_query_2 = "insert into macbook(mProductID,mName,DeviceId) values('$mProductID','$mName','$DeviceId')";
                                        $add_macbook_query_3 = "insert into mackbookname(mName,mScreensize,mRAM,mGPU,mStorage_,mBattery,mWeight,mProcessor,mPrice) values('$mName','$mScreensize','$mRAM','$mGPU','$mStorage_','$mBattery','$mWeight','$mProcessor','$mPrice')";
                                        $run_add_macbook_query_1 = mysqli_query($con,$add_macbook_query_1);
                                        $run_add_macbook_query_2 = mysqli_query($con,$add_macbook_query_2);
                                        $run_add_macbook_query_3 = mysqli_query($con,$add_macbook_query_3);
                                        if($run_add_macbook_query_1)
                                        {
                                            echo "<br>In the process of adding the Product Details.<br>";
                                        }
                                        else
                                        {
                                            echo "<br><b>FIRST QUERY DID NOT RUN.</b><br>";
                                        }
                                        if($run_add_macbook_query_2)
                                        {
                                            echo "<br>Product Details <b>ADDED</b>.<br>";
                                        }
                                        else
                                        {
                                            echo "<br><b>SECOND QUERY DID NOT RUN.</b><br>";
                                        }
                                        if($run_add_macbook_query_3)
                                        {
                                            echo "<br>Process Completed.<br>";
                                        }
                                        else
                                        {
                                            echo "<br><b>THIRD QUERY DID NOT RUN.</b><br>";
                                        }
                                        // Displaying Product Details by fetching
                                        $pro_name=$_POST['mProductID'];
                                        $pro_id = $pro_name;
                                        $get_macbook = "select * from macbook where mProductID='$pro_id'";
                                        $run_macbook = mysqli_query($con,$get_macbook);
                                        while($macbook_details = mysqli_fetch_array($run_macbook))
                                        {
                                            $mProductID = $macbook_details['mProductID'];
                                            $mName = $macbook_details['mName'];
                                            echo $mName;
                                            $DeviceId = $macbook_details['DeviceId'];
                                            $getting_other_details = "select * from macbookname where mName='$mName'";
                                            if($getting_other_details)
                                            {
                                                echo "<br>Query Given<br>";
                                            }
                                            $running_other_details = mysqli_query($con,$getting_other_details);
                                            if($running_other_details)
                                            {
                                                echo "Query Ran<br>";
                                            }
                                            while($other_macbook_details = mysqli_fetch_array($running_other_details))
                                            {
                                                $mName      = $other_macbook_details['mName'];
                                                $mScreensize= $other_macbook_details['mScreensize'];
                                                $mRAM       = $other_macbook_details['mRAM'];
                                                $mGPU       = $other_macbook_details['mGPU'];
                                                $mStorage_  = $other_macbook_details['mStorage_'];
                                                $mBattery   = $other_macbook_details['mBattery'];
                                                $mWeight    = $other_macbook_details['mWeight'];
                                                $mProcessor = $other_macbook_details['mProcessor'];
                                                $mPrice     = $other_macbook_details['mPrice'];
                                                echo "
                                                <div>
                                                    <b>MackBook ID            :</b> $mProductID     <br>
                                                    <b>MackBook Name          :</b> $mName          <br>
                                                    <b>MackBook Device ID     :</b> $DeviceId       <br>
                                                    <b>MackBook Screen Size   :</b> $mScreensize    <br>
                                                    <b>MackBook RAM           :</b> $mRAM           <br>
                                                    <b>MackBook GPU           :</b> $mGPU           <br>
                                                    <b>MackBook Storage       :</b> $mStorage_      <br>
                                                    <b>MackBook Battery       :</b> $mBattery       <br>
                                                    <b>MackBook Weight        :</b> $mWeight        <br>
                                                    <b>MackBook Processor     :</b> $mProcessor     <br>
                                                    <b>MackBook Price         :</b> $mPrice         <br>
                                                </div>
                                                ";
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        else if($pro_type=="AirPods" || $pro_type=="airpods" || $pro_type=="AIRPODS"){
                            if (isset($_POST['pro_id']))
                            {
                                echo "<br>ID Received <br>";
                                $pro_name=$_POST['pro_id'];
                                $pro_id = $pro_name;
                                echo "
                                <form method='post' class='form1'>
                                    <span class='text'>  Apple Product ID:          </span><input type='text' name='apID'><br>
                                    <span class='text'>  AirPods Product ID:        </span><input type='text' name='aProductID'><br>
                                    <span class='text'>  AirPods Name:              </span><input type='text' name='aName_'><br>
                                    <span class='text'>  AirPods Device ID:         </span><input type='text' name='DeviceID'><br>
                                    <span class='text'>  AirPods Driver:            </span><input type='number' name='aDriver'><br>
                                    <span class='text'>  AirPods Range:             </span><input type='number' name='aRange_'><br>
                                    <span class='text'>  AirPods Gesture Control:   </span><input type='text' name='aGestureControl'><br>
                                    <span class='text'>  AirPods Battery Backup:    </span><input type='text' name='aBatteryBackup'><br>
                                    <span class='text'>  AirPods Bluetooth Version: </span><input type='text' name='aBluetoothVersion'><br>
                                    <span class='text'>  AirPods Price:             </span><input type='number' name='aPrice'><br>
                                    <button type='submit' class='button' name='Add_AirPods' value='Add_AirPods'>Add</button>
                                </form>
                                ";
                                if(array_key_exists('Add_AirPods',$_POST))
                                {
                                    Add_AirPods();
                                }
                                else
                                {
                                    echo "<br><b>FORM DIDN'T AUTHENTICATE.</b><br>";
                                }
                                function Add_AirPods()
                                {
                                    if(isset($_POST['aProductID']))
                                    {
                                        echo "<br>AirPods Detail Received!<br>";
                                        $apID               = $_POST['apID'];
                                        $aProductID         = $_POST['aProductID'];
                                        $aName_             = $_POST['aName_'];
                                        $DeviceID           = $_POST['DeviceID'];
                                        $aDriver            = $_POST['aDriver'];
                                        $aRange_            = $_POST['aRange_'];
                                        $aGestureControl    = $_POST['aGestureControl'];
                                        $aBatteryBackup     = $_POST['aBatteryBackup'];
                                        $aBluetoothVersion  = $_POST['aBluetoothVersion'];
                                        $aPrice             = $_POST['aPrice'];
                                        $add_airpods_query_1 = "insert into appleproducts(apID,apName,Buys) values('$apID','$aName_','X')";
                                        $add_airpods_query_2 = "insert into airpods(aProductID,aName_,DeviceID) values('$aProductID','$aName_','$DeviceID')";
                                        $add_airpods_query_3 = "insert into airpodsname(aName_,aDriver,aRange_,aGestureControl,aBatteryBackup,aBluetoothVersion,aPrice) values('$aName_','$aDriver','$aRange_','$aGestureControl','$aBatteryBackup','$aBluetoothVersion','$aPrice')";
                                        $run_add_airpods_query_1 = mysqli_query($con,$add_airpods_query_1);
                                        $run_add_airpods_query_2 = mysqli_query($con,$add_airpods_query_2);
                                        $run_add_airpods_query_3 = mysqli_query($con,$add_airpods_query_3);
                                        if($run_add_airpods_query_1)
                                        {
                                            echo "<br>In the process of adding the Product Details.<br>";
                                        }
                                        else
                                        {
                                            echo "<br><b>FIRST QUERY DID NOT RUN.</b><br>";
                                        }
                                        if($run_add_airpods_query_2)
                                        {
                                            echo "<br>Product Details <b>ADDED</b>.<br>";
                                        }
                                        else
                                        {
                                            echo "<br><b>SECOND QUERY DID NOT RUN.</b><br>";
                                        }
                                        if($run_add_airpods_query_3)
                                        {
                                            echo "<br>Process Completed.<br>";
                                        }
                                        else
                                        {
                                            echo "<br><b>THIRD QUERY DID NOT RUN.</b><br>";
                                        }
                                        // Displaying Product Details by fetching
                                        $get_airpods = "select * from airpods where aProductID='$aProductID'";
                                        $run_airpods = mysqli_query($con,$get_airpods);
                                        while($airpod_details = mysqli_fetch_array($run_airpods))
                                        {
                                            $aProductID = $airpod_details['aProductID'];
                                            $aName_ = $airpod_details['aName_'];
                                            echo $aName_;
                                            $DeviceID = $airpod_details['DeviceID'];
                                            $getting_other_details = "select * from airpodsname where aName_='$aName_'";
                                            if($getting_other_details)
                                            {
                                                echo "<br>Query Given<br>";
                                            }
                                            $running_other_details = mysqli_query($con,$getting_other_details);
                                            if($running_other_details)
                                            {
                                                echo "Query Ran<br>";
                                            }
                                            while($other_airpod_details = mysqli_fetch_array($running_other_details))
                                            {
                                                $aName_             = $other_airpod_details['aName_'];
                                                $aDriver            = $other_airpod_details['aDriver'];
                                                $aRange_            = $other_airpod_details['aRange_'];
                                                $aGestureControl    = $other_airpod_details['aGestureControl'];
                                                $aBatteryBackup     = $other_airpod_details['aBatteryBackup'];
                                                $aBluetoothVersion  = $other_airpod_details['aBluetoothVersion'];
                                                $aPrice             = $other_airpod_details['aPrice'];
                                                echo "
                                                <div>
                                                    <b>AirPod ID                :</b> $aProductID       <br>
                                                    <b>AirPod Name              :</b> $aName_           <br>
                                                    <b>AirPod Device ID         :</b> $DeviceID         <br>
                                                    <b>AirPod Driver            :</b> $aDriver          <br>
                                                    <b>AirPod Range             :</b> $aRange_          <br>
                                                    <b>AirPod Gesture Control   :</b> $aGestureControl  <br>
                                                    <b>AirPod Battery Backup    :</b> $aBatteryBackup   <br>
                                                    <b>AirPod Bluetooth Version :</b> $mBattery         <br>
                                                    <b>AirPod Price             :</b> $aPrice           <br>
                                                </div>
                                                ";
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                    else
                    {
                        echo "<br><b>VALUE NOT RECEIVED</b><br>";
                    }
                }
                else
                {
                    echo "<br><b>CONNECTION FAILED.</b><br>";
                }
            }
        ?>
        <h2>Deleting Product Details</h2>
        <form method="post" class="form1">
            <span class="text">Product Type: </span>
            <input type="text" name="pro_type">
            <span class="text">Product ID: </span>
            <input type="text" name="pro_id">
            <button type="submit" class="button" name="Add" value="Add">Add</button>
        </form>
        <?php
            if(array_key_exists('Add',$_POST))
            {
                Delete();
            }
            function Delete()
            {
                $con = mysqli_connect("localhost","root","123Aashish456","applestore");
                if($con)
                {
                    echo "<br>Connection Successful";
                    if(isset($_POST['pro_type']))
                    {
                        $pro_type=$_POST['pro_type'];
                        if($pro_type=="iPhone" || $pro_type=="iphone" || $pro_type=="IPHONE")
                        {
                            if(isset($_POST['pro_id']))
                            {
                                echo "<br>ID Received <br>";
                                $pro_name=$_POST['pro_id'];
                                $pro_id = $pro_name;
                                // Displaying the Details after adding to the database
                                $get_iphone = "select * from iphone where iPhProductID='$pro_id'";
                                $run_iphone = mysqli_query($con,$get_iphone);
                                while($iphone_details = mysqli_fetch_array($run_iphone))
                                {
                                    $iPhProductID = $iphone_details['iPhProductID'];
                                    $iPhName_ = $iphone_details['iPhName_'];
                                    $DeviceID = $iphone_details['DeviceID'];
                                    $getting_other_details = "select * from iphonename where iPhName_='$iPhName_'";
                                    $running_other_details = mysqli_query($con,$getting_other_details);
                                    while($other_iphone_details = mysqli_fetch_array($running_other_details))
                                    {
                                        $iPhName_ = $other_iphone_details['iPhName_'];
                                        $iPhScreen = $other_iphone_details['iPhScreen'];
                                        $iPhRAM = $other_iphone_details['iPhRAM'];
                                        $iPhUnlocking_Feature = $other_iphone_details['iPhUnlocking_Feature'];
                                        $iPhStorage = $other_iphone_details['iPhStorage_'];
                                        $iPhBattery = $other_iphone_details['iPhBattery'];
                                        $iPhCharger = $other_iphone_details['iPhCharger'];
                                        $iPhWeight = $other_iphone_details['iPhWeight'];
                                        $iPhProcessor = $other_iphone_details['iPhProcessor'];
                                        $iPhPrice = $other_iphone_details['iPhPrice'];
                                        echo "
                                        <div>
                                            <b>iPhone ID                :</b> $iPhProductID         <br>
                                            <b>iPhone Name              :</b> $iPhName_             <br>
                                            <b>iPhone Device ID         :</b> $DeviceID             <br>
                                            <b>iPhone Screen Size       :</b> $iPhScreen            <br>
                                            <b>iPhone RAM               :</b> $iPhRAM               <br>
                                            <b>iPhone Unlocking Feature :</b> $iPhUnlocking_Feature <br>
                                            <b>iPhone Storage           :</b> $iPhStorage           <br>
                                            <b>iPhone Battery           :</b> $iPhBattery           <br>
                                            <b>iPhone Charger           :</b> $iPhCharger           <br>
                                            <b>iPhone Weight            :</b> $iPhWeight            <br>
                                            <b>iPhone Processor         :</b> $iPhProcessor         <br>
                                            <b>iPhone Price             :</b> $iPhPrice             <br>
                                        </div>
                                        ";
                                    }
                                }
                                $deleting_iphone_query_1 = "delete from iphonename where iPhName_='$iPhName_'";
                                $deleting_iphone_query_2 = "delete from iphone where iPhProductID='$iPhProductID'";
                                $running_deleting_iphone_query_1 = mysqli_query($con,$deleting_iphone_query_1);
                                $running_deleting_iphone_query_2 = mysqli_query($con,$deleting_iphone_query_2);
                                if($running_deleting_iphone_query_1)
                                {
                                    echo "<br>In the Process of deleting iPhone Details.<br>";
                                }
                                else
                                {
                                    echo "<br>Technical Glitch!.<br>Details Not Deleted.<br>";
                                }
                                if($running_deleting_iphone_query_2)
                                {
                                    echo "<br>iPhone Details DELETED.<br>";
                                }
                                else
                                {
                                    echo "<br>Technical Glitch!.<br>Details Not Deleted.<br>";
                                }
                            }
                            else
                            {
                                echo "<br><b>ENTERED VALUE NOT FOUND.</b><br>";
                            }
                        }
                        else if($pro_type=="iPad" || $pro_type=="ipad" || $pro_type=="IPAD")
                        {
                            if (isset($_POST['pro_id']))
                            {
                                echo "<br>ID Received <br>";
                                $pro_name=$_POST['pro_id'];
                                $pro_id = $pro_name;
                                $get_ipad = "select * from ipad where iPaProductID='$pro_id'";
                                $run_ipad = mysqli_query($con,$get_ipad);
                                while($ipad_details = mysqli_fetch_array($run_ipad))
                                {
                                    $iPaProductID = $ipad_details['iPaProductID'];
                                    $iPaName_ = $ipad_details['iPaName_'];
                                    echo $iPaName_;
                                    $DeviceId = $ipad_details['DeviceId'];
                                    $getting_other_details = "select * from ipadname where iPaName='$iPaName_'";
                                    if($getting_other_details)
                                    {
                                        echo "<br>Query Given<br>";
                                    }
                                    $running_other_details = mysqli_query($con,$getting_other_details);
                                    if($running_other_details)
                                    {
                                        echo "Query Ran<br>";
                                    }
                                    while($other_ipad_details = mysqli_fetch_array($running_other_details))
                                    {
                                        echo "Inside while<br>";
                                        $iPaName            = $other_ipad_details['iPaName'];
                                        $iPaScreenSize      = $other_ipad_details['iPaScreenSize'];
                                        $iPaRAM             = $other_ipad_details['iPaRAM'];
                                        $iPaUnlocking_Feature=$other_ipad_details['iPaUnlocking_Feature'];
                                        $iPaStorage_        = $other_ipad_details['iPaStorage_'];
                                        $iPaBattery         = $other_ipad_details['iPaBattery'];
                                        $iPaWeight          = $other_ipad_details['iPaWeight'];
                                        $iPaProcessor       = $other_ipad_details['iPaProcessor'];
                                        $iPaPrice           = $other_ipad_details['iPaPrice'];
                                        echo "
                                        <div>
                                            <b>iPad ID                :</b> $iPaProductID         <br>
                                            <b>iPad Name              :</b> $iPaName_             <br>
                                            <b>iPad Device ID         :</b> $DeviceId             <br>
                                            <b>iPad Screen Size       :</b> $iPaScreen            <br>
                                            <b>iPad RAM               :</b> $iPaRAM               <br>
                                            <b>iPad Unlocking Feature :</b> $iPaUnlocking_Feature <br>
                                            <b>iPad Storage           :</b> $iPaStorage           <br>
                                            <b>iPad Battery           :</b> $iPaBattery           <br>
                                            <b>iPad Weight            :</b> $iPaWeight            <br>
                                            <b>iPad Processor         :</b> $iPaProcessor         <br>
                                            <b>iPad Price             :</b> $iPaPrice             <br>
                                        </div>
                                        ";
                                    }
                                }
                                $deleting_ipad_query_1 = "delete from ipadname where iPaName_='$iPaName_'";
                                $deleting_ipad_query_2 = "delete from ipad where iPaProductID='$iPaProductID'";
                                $running_deleting_ipad_query_1 = mysqli_query($con,$deleting_ipad_query_1);
                                $running_deleting_ipad_query_2 = mysqli_query($con,$deleting_ipad_query_2);
                                if($running_deleting_ipad_query_1)
                                {
                                    echo "<br>In the Process of deleting iPad Details.<br>";
                                }
                                else
                                {
                                    echo "<br>Technical Glitch!.<br>Details Not Deleted.<br>";
                                }
                                if($running_deleting_ipad_query_2)
                                {
                                    echo "<br>iPad Details DELETED.<br>";
                                }
                                else
                                {
                                    echo "<br>Technical Glitch!.<br>Details Not Deleted.<br>";
                                }
                            }
                        }
                        else if($pro_type=="MacBook" || $pro_type=="macbook" || $pro_type=="MACBOOK")
                        {
                            if (isset($_POST['pro_id']))
                            {
                                echo "<br>ID Received <br>";
                                $pro_name=$_POST['pro_id'];
                                $pro_id = $pro_name;
                                $get_iphone = "select * from macbook where mProductID='$pro_id'";
                                $run_iphone = mysqli_query($con,$get_iphone);
                                while($iphone_details = mysqli_fetch_array($run_iphone))
                                {
                                    $mProductID = $iphone_details['mProductID'];
                                    $mName = $iphone_details['mName'];
                                    echo $mName;
                                    $DeviceId = $iphone_details['DeviceId'];
                                    $getting_other_details = "select * from macbookname where mName='$mName'";
                                    if($getting_other_details)
                                    {
                                        echo "<br>Query Given<br>";
                                    }
                                    $running_other_details = mysqli_query($con,$getting_other_details);
                                    if($running_other_details)
                                    {
                                        echo "Query Ran<br>";
                                    }
                                    while($other_macbook_details = mysqli_fetch_array($running_other_details))
                                    {
                                        $mName      = $other_macbook_details['mName'];
                                        $mScreensize= $other_macbook_details['mScreensize'];
                                        $mRAM       = $other_macbook_details['mRAM'];
                                        $mGPU       = $other_macbook_details['mGPU'];
                                        $mStorage_  = $other_macbook_details['mStorage_'];
                                        $mBattery   = $other_macbook_details['mBattery'];
                                        $mWeight    = $other_macbook_details['mWeight'];
                                        $mProcessor = $other_macbook_details['mProcessor'];
                                        $mPrice     = $other_macbook_details['mPrice'];
                                        echo "
                                        <div>
                                            <b>MackBook ID            :</b> $mProductID     <br>
                                            <b>MackBook Name          :</b> $mName          <br>
                                            <b>MackBook Device ID     :</b> $DeviceId       <br>
                                            <b>MackBook Screen Size   :</b> $mScreensize    <br>
                                            <b>MackBook RAM           :</b> $mRAM           <br>
                                            <b>MackBook GPU           :</b> $mGPU           <br>
                                            <b>MackBook Storage       :</b> $mStorage_      <br>
                                            <b>MackBook Battery       :</b> $mBattery       <br>
                                            <b>MackBook Weight        :</b> $mWeight        <br>
                                            <b>MackBook Processor     :</b> $mProcessor     <br>
                                            <b>MackBook Price         :</b> $mPrice         <br>
                                        </div>
                                        ";
                                    }
                                }
                                $deleting_macbook_query_1 = "delete from macbookname where mName='$mName'";
                                $deleting_macbook_query_2 = "delete from macbook where mProductID='$mProductID'";
                                $running_deleting_macbook_query_1 = mysqli_query($con,$deleting_macbook_query_1);
                                $running_deleting_macbook_query_2 = mysqli_query($con,$deleting_macbook_query_2);
                                if($running_deleting_macbook_query_1)
                                {
                                    echo "<br>In the Process of deleting MacBook Details.<br>";
                                }
                                else
                                {
                                    echo "<br>Technical Glitch!.<br>Details Not Deleted.<br>";
                                }
                                if($running_deleting_macbook_query_2)
                                {
                                    echo "<br>MacBook Details DELETED.<br>";
                                }
                                else
                                {
                                    echo "<br>Technical Glitch!.<br>Details Not Deleted.<br>";
                                }
                            }
                        }
                        else if($pro_type=="AirPods" || $pro_type=="airpods" || $pro_type=="AIRPODS")
                        {
                            if (isset($_POST['pro_id']))
                            {
                                echo "<br>ID Received <br>";
                                $pro_name=$_POST['pro_id'];
                                $pro_id = $pro_name;
                                $get_airpods = "select * from airpods where aProductID='$pro_id'";
                                $run_airpods = mysqli_query($con,$get_airpods);
                                while($airpod_details = mysqli_fetch_array($run_airpods))
                                {
                                    $aProductID = $airpod_details['aProductID'];
                                    $aName_ = $airpod_details['aName_'];
                                    echo $aName_;
                                    $DeviceID = $airpod_details['DeviceID'];
                                    $getting_other_details = "select * from airpodsname where aName_='$aName_'";
                                    if($getting_other_details)
                                    {
                                        echo "<br>Query Given<br>";
                                    }
                                    $running_other_details = mysqli_query($con,$getting_other_details);
                                    if($running_other_details)
                                    {
                                        echo "Query Ran<br>";
                                    }
                                    while($other_airpod_details = mysqli_fetch_array($running_other_details))
                                    {
                                        $aName_             = $other_airpod_details['aName_'];
                                        $aDriver            = $other_airpod_details['aDriver'];
                                        $aRange_            = $other_airpod_details['aRange_'];
                                        $aGestureControl    = $other_airpod_details['aGestureControl'];
                                        $aBatteryBackup     = $other_airpod_details['aBatteryBackup'];
                                        $aBluetoothVersion  = $other_airpod_details['aBluetoothVersion'];
                                        $aPrice             = $other_airpod_details['aPrice'];
                                        echo "
                                        <div>
                                            <b>AirPod ID                :</b> $aProductID       <br>
                                            <b>AirPod Name              :</b> $aName_           <br>
                                            <b>AirPod Device ID         :</b> $DeviceID         <br>
                                            <b>AirPod Driver            :</b> $aDriver          <br>
                                            <b>AirPod Range             :</b> $aRange_          <br>
                                            <b>AirPod Gesture Control   :</b> $aGestureControl  <br>
                                            <b>AirPod Battery Backup    :</b> $aBatteryBackup   <br>
                                            <b>AirPod Bluetooth Version :</b> $mBattery         <br>
                                            <b>AirPod Price             :</b> $aPrice           <br>
                                        </div>
                                        ";
                                    }
                                }
                                $deleting_airpods_query_1 = "delete from airpodsname where mName='$aName_'";
                                $deleting_airpods_query_2 = "delete from airpods where mProductID='$aProductID'";
                                $running_deleting_airpods_query_1 = mysqli_query($con,$deleting_airpods_query_1);
                                $running_deleting_airpods_query_2 = mysqli_query($con,$deleting_airpods_query_2);
                                if($running_deleting_airpods_query_1)
                                {
                                    echo "<br>In the Process of deleting AirPods Details.<br>";
                                }
                                else
                                {
                                    echo "<br>Technical Glitch!.<br>Details Not Deleted.<br>";
                                }
                                if($running_deleting_airpods_query_2)
                                {
                                    echo "<br>Airpods Details DELETED.<br>";
                                }
                                else
                                {
                                    echo "<br>Technical Glitch!.<br>Details Not Deleted.<br>";
                                }
                            }
                        }
                    }
                    else
                    {
                        echo "<br><b>Type of Product not received.</b><br>";
                    }
                }
                else
                {
                    echo "<br><b>Not CONNECTED TO DATABASE.</b><br>";
                }
            }
        ?>
	</body>
</html>