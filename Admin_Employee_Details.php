<?php
    $con = mysqli_connect("localhost","root","123Aashish456","applestore");
?>
<html lang="en">
	<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Employee View</title>
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
        <h2> Fetching Employee Details</h2>
        <form method="post" class="form1">
            <span class="text">Employee ID: </span>
            <input type="text" name="pro_id">
            <button type="submit" value="Fetch">Fetch</button>
        </form>
        <?php
            if($con)
            {
                echo "<br>Connection Successful";
                if (isset($_POST['pro_id']))
                {
                    echo "<br>ID Received <br>";
                    $pro_id=$_POST['pro_id'];
                    echo "<br> $pro_id";
                    $get_product="select * from employee where eID='$pro_id' ";
                    if($get_product)
                    {
                        echo "<br> Getting Employee.";
                    }
                    $run = mysqli_query($con,$get_product);
                    if($run)
                    {
                        echo "<br> Query Ran";
                    }
                    /*$details = mysqli_fetch_array($run);
                    if($details){
                        echo "<br> Details ran";
                    }*/
                    while($details = mysqli_fetch_array($run))
                    {
                        echo "<br> Inside while";
                        //echo $details;
                        $eID = $details['eID'];
                        $eAcc_No = $details['eAcc_No'];
                        $eHire = $details['eHire'];
                        $eSalary = $details['eSalary'];
                        $get_other_details = "select * from employeeaccount where eAcc_No='$eAcc_No'";
                        $run_other = mysqli_query($con,$get_other_details);
                        $other_details = mysqli_fetch_array($run_other);
                        $eName = $other_details['eName'];
                        $ePhone = $other_details['ePhone'];
                        $eDOB = $other_details['eDOB'];
                        $eBank = $other_details['eBank'];
                        echo "
                        <div>
                            <b>Employee ID           :</b> $eID <br>
                            <b>Employee Name         :</b> $eName<br>
                            <b>Employee Phone        :</b> $ePhone<br>
                            <b>Employee Date of Birth:</b> $eDOB<br>
                            <b>Employee Account No.  :</b> $eAcc_No<br>
                            <b>Employee Bank         :</b> $eBank<br>
                            <b>Employee Hire Date    :</b> $eHire<br>
                            <b>Employee Salary       :</b> $eSalary<br>
                        </div>
                        ";
                    }
                }
            }
        ?>
        <h2> Adding an Employee Details</h2>
        <form method="post" class="form1">
            <span class="text">Employee ID:             </span><input type="text" name="emp_id"><br>
            <span class="text">Employee Name:           </span><input type="text" name="emp_name"><br>
            <span class="text">Employee Phone:          </span><input type="text" name="emp_phone"><br>
            <span class="text">Employee Date of Birth:  </span><input type="date" name="emp_dob"><br>
            <span class="text">Employee Account No.:    </span><input type="text" name="emp_acc"><br>
            <span class="text">Employee Bank:           </span><input type="text" name="emp_bank"><br>
            <span class="text">Employee Hire Date:      </span><input type="date" name="emp_hire"><br>
            <span class="text">Employee Salary:         </span><input type="number" name="emp_sal"><br>
            <button type="submit" value="Fetch">Add</button>
        </form>
        <?php
            if($con)
            {
                if(isset($_POST['emp_id']))
                {
                    echo "<br>Employee Detail Received!<br>";
                    $emp_id = $_POST['emp_id'];
                    $emp_name = $_POST['emp_name'];
                    $emp_phone = $_POST['emp_phone'];
                    $emp_dob = $_POST['emp_dob'];
                    $emp_acc = $_POST['emp_acc'];
                    $emp_bank = $_POST['emp_bank'];
                    $emp_hire = $_POST['emp_hire'];
                    $emp_sal = $_POST['emp_sal'];
                    echo "
                    <div>
                        <b>Employee ID           :</b> $emp_id <br>
                        <b>Employee Name         :</b> $emp_name<br>
                        <b>Employee Phone        :</b> $emp_phone<br>
                        <b>Employee Date of Birth:</b> $emp_dob<br>
                        <b>Employee Account No.  :</b> $emp_acc<br>
                        <b>Employee Bank         :</b> $emp_bank<br>
                        <b>Employee Hire Date    :</b> $emp_hire<br>
                        <b>Employee Salary       :</b> $emp_sal<br>
                    </div>
                    ";
                    $insert_employee_table_1 = "insert into employee(eID,eAcc_No,eHire,eSalary) values('$emp_id','$emp_acc','$emp_hire','$emp_sal')";
                    $insert_employee_table_2 = "insert into employeeaccount(eAcc_No,eName,ePhone,eDOB,eBank) values('$emp_acc','$emp_name','$emp_phone','$emp_dob','$emp_bank')";
                    $run_query_1 = mysqli_query($con,$insert_employee_table_1);
                    $run_query_2 = mysqli_query($con,$insert_employee_table_2);
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
        <h2>Removing an Employee</h2>
        <form method="post" class="form1">
            <span class="text">Employee ID: </span>
            <input type="text" name="pro_id">
            <button type="submit" value="Fetch">Fire Employee</button>
        </form>
        <?php
            if($con)
            {
                echo "<br>Connection Successful";
                if (isset($_POST['pro_id']))
                {
                    echo "<br>ID Received <br>";
                    $pro_id=$_POST['pro_id'];
                    echo "<br> $pro_id";
                    $get_product="select * from employee where eID='$pro_id' ";
                    if($get_product)
                    {
                        echo "<br> Getting Employee.";
                    }
                    $run = mysqli_query($con,$get_product);
                    if($run)
                    {
                        echo "<br> Query Ran";
                    }
                    /*$details = mysqli_fetch_array($run);
                    if($details){
                        echo "<br> Details ran";
                    }*/
                    while($details = mysqli_fetch_array($run))
                    {
                        echo "<br> Inside while";
                        //echo $details;
                        $eID = $details['eID'];
                        $eAcc_No = $details['eAcc_No'];
                        $eHire = $details['eHire'];
                        $eSalary = $details['eSalary'];
                        $get_other_details = "select * from employeeaccount where eAcc_No='$eAcc_No'";
                        $run_other = mysqli_query($con,$get_other_details);
                        $other_details = mysqli_fetch_array($run_other);
                        $eName = $other_details['eName'];
                        $ePhone = $other_details['ePhone'];
                        $eDOB = $other_details['eDOB'];
                        $eBank = $other_details['eBank'];
                        echo "
                        <div>
                            <b>Employee ID           :</b> $eID <br>
                            <b>Employee Name         :</b> $eName<br>
                            <b>Employee Phone        :</b> $ePhone<br>
                            <b>Employee Date of Birth:</b> $eDOB<br>
                            <b>Employee Account No.  :</b> $eAcc_No<br>
                            <b>Employee Bank         :</b> $eBank<br>
                            <b>Employee Hire Date    :</b> $eHire<br>
                            <b>Employee Salary       :</b> $eSalary<br>
                        </div>
                        ";
                        echo "Now removing the Details the Employee from the Database inorder to complete the Process.";
                        $fire_query_1 = "delete from employeeaccount where eAcc_No='$eAcc_No'";
                        $fire_query_2 = "delete from employee where eID='$eID'";
                        $run_fire_query_1 = mysqli_query($con,$fire_query_1);
                        $run_fire_query_2 = mysqli_query($con,$fire_query_2);
                        if($run_fire_query_1)
                        {
                            echo "<br>Employee Personal Details DELETED.";
                        }
                        if($run_fire_query_2)
                        {
                            echo "<br>Employee Details Deleted COMPLETELY.";
                        }
                        echo "<br>The Employee has been FIRED.";
                    }
                }
            }
        ?>
	</body>
</html>