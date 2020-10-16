<html lang="en">
	<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Products View</title>
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
            <button type="submit" value="Fetch">Fetch</button>
        </form>
        <?php
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
                    else if($pro_type=="AirPods" || $pro_type=="airpods" || $pro_type=="AIRPODS"){
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
        ?>
	</body>
</html>