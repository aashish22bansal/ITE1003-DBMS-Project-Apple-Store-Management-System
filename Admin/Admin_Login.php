<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style01.css" />
        <title>Admin Sign in & Sign up Form</title>
    </head>
    <body>
        <div class="container">
            <div class="forms-container">
                <div class="signin-signup">
                    <form action="Admin_HOME_PAGE.html" class="sign-in-form" method="post">
                        <h2 class="title">Sign in</h2>
                        <div class="input-field">
                            <i class="fas fa-user"></i>
                            <input type="text" name="Login_Admin_ID" placeholder="Admin ID" />
                        </div>
                        <div class="input-field">
                            <i class="fas fa-user"></i>
                            <input type="text" name="Login_Username" placeholder="Email" />
                        </div>
                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="Login_Password" placeholder="Password" />
                        </div>
                        <input type="submit" name="Login" value="Login" class="btn solid" />
                        <p class="social-text">Or Sign in with social platforms</p>
                        <div class="social-media">
                            <a href="#" class="social-icon">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="social-icon">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="social-icon">
                                <i class="fab fa-google"></i>
                            </a>
                            <a href="#" class="social-icon">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    </form>
                    <!--form action="Admin_HOME_PAGE.html" class="sign-up-form" method="post">
                        <h2 class="title">Sign up</h2>
                        <div class="input-field">
                            <i class="fas fa-user"></i>
                            <input type="text" name="Register_Admin_ID" placeholder="Admin ID" />
                        </div>
                        <div class="input-field">
                            <i class="fas fa-envelope"></i>
                            <input type="email" name="Register_Username" placeholder="Email" />
                        </div>
                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="Register_Password" placeholder="Password" />
                        </div>
                        <input type="submit" class="btn" name="Register" value="Register" />
                        <p class="social-text">Or Sign up with social platforms</p>
                        <div class="social-media">
                            <a href="#" class="social-icon">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="social-icon">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="social-icon">
                                <i class="fab fa-google"></i>
                            </a>
                            <a href="#" class="social-icon">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    </form-->
                </div>
            </div>

            <!--div class="panels-container">
                <div class="panel left-panel">
                    <div class="content">
                        <h3>New here ?</h3>
                        <p>Get started!<br>Conserve the environment for a better tomorrow.</br></p>
                        <button class="btn transparent" id="sign-up-btn">Sign up</button>
                    </div>
                    <img src="img/log.svg" class="image" alt="" />
                </div>
                <div class="panel right-panel">
                    <div class="content">
                        <h3>One of us ?</h3>
                        <p>Amazing perks coming your way!!<br>To know more...</p>
                        <button class="btn transparent" id="sign-in-btn">Sign in</button>
                    </div>
                    <img src="img/register.svg" class="image" alt="" />
                </div>
            </div-->
        </div>

        <script src="app.js"></script>
    </body>
    <?php
        $con = mysqli_connect("localhost","root","123Aashish456","applestore");
        if($con)
        {
            if(isset($_POST['Login_Admin_ID']))
            {
                if(array_key_exists('Login',$_POST))
                {
                    Admin_Login();
                }
                function Admin_Login()
                {
                    $Login_Admin_ID = $_POST['Login_Admin_ID'];
                    $Login_Username = $_POST['Login_Username'];
                    $Login_Password = $_POST['Login_Password'];
                    $checking_admin = "select * from admin where adID='$Login_Admin_ID' and adEmail='$Login_Username' and adPassword='$Login_Password'";
                    $running_checking_admin = mysqli_query($con,$checking_admin);
                    if($checking_admin=mysqli_fetch_array($running_checking_admin))
                    {
                        header(Admin_HOME_PAGE.html);
                    }
                    else{
                        echo "<script>Admin Does not Exist.</script>";
                    }
                }
            }
            /*
            else if(isset($_POST['Register_Admin_ID']))
            {
                if(array_key_exists('Register',$_POST))
                {
                    Admin_Register();
                }
                function Admin_Register()
                {
                    $Register_Admin_ID = $_POST['Register_Admin_ID'];
                    $Register_Username = $_POST['Register_Username'];
                    $Register_Password = $_POST['Register_Password'];
                    $registering_admin = "insert into admin(adID,adEmail,adPassword) values('$Register_Admin_ID','$Register_Username','$Register_Password')";
                    $running_registering_admin = mysqli_query($con,$registering_admin);
                    if($running_registering_admin)
                    {
                        header(Admin_HOME_PAGE.html);
                    }
                }
            }
            */
        }
        else
        {
            echo "Not Connected to Database";
        }
    ?>
</html>