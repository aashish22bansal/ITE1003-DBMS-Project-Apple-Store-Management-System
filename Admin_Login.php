<html>
    <head>
        <title>Admin Login</title>
        <link rel="stylesheet" href="Login.css">
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
        <form action="Admin_HOME_PAGE.html" method="post">
            <div class="imgcontainer">
                <img src="login.jpg" alt="Avatar" class="avatar" width="100px" height="100px">
            </div>

            <div class="container">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Email" name="uname" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>

                <button type="submit">Login</button>
                <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" class="cancelbtn">Cancel</button>
                <!--span class="psw">Forgot <a href="#">password?</a></span-->
            </div>
        </form>
        <?php
            session_start();
            $db=mysqli_connect("localhost","root","123Aashish456","applestore");
            if (!isset($_SESSION['uname'])) {
                echo "<a href='Login.php'>Login</a>";
            }
            else{
                echo "Welcome: ".$_SESSION['uname']. "";
				$admin_email = $_SESSION['uname'];
				$checking_in_admin = "select * from admin where adEmail='$admin_email'";
				$running_query = mysqli_query($con,$checking_in_admin);
				if($running_query){
					header("Employee_Details.php"); /* Redirect browser */
					exit();
				}
            }
        ?>
    </body>

</html>