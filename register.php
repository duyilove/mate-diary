<?php
ob_start();
require("connect.php");

if (isset($_SESSION['user']))
{
	header("location:dashboard.php");
}


if (isset($_POST['submit']))
	{
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$dob=$_POST['dob'];
$gender=$_POST['gender'];
$password=$_POST['password'];

		$veria="SELECT * FROM users WHERE email='$email'";
		$run_veria=mysqli_query($conn,$veria);
		$counta=mysqli_num_rows($run_veria);

		if($counta==0)
		{

            $ttt = time();
            $today= date('M d, Y');

	$Query="INSERT INTO users(id,fname,lname,email,phone,dob,gender,password,regdate) VALUES('$ttt','$fname','$lname','$email','$phone','$dob','$gender','$password','$today')";
	   mysqli_query($conn, $Query);

		header("location:login.php?response=SUCCESS. You can now proceed to login.");

       	}
	else
	{
	      $response="<h6 align='center'>ERROR! This email is already associated with an account.<br/></h6>";

	}


		}

?>

<!DOCTYPE html>
<html lang="en" class="light scroll-smooth" dir="ltr">
    
<head>
        <meta charset="UTF-8" />
        <title> Register - My Digital Diary</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="version" content="1.8.0" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.png" />

        <!-- Css -->
        <link href="assets/libs/tiny-slider/tiny-slider.css" rel="stylesheet">
        <link href="assets/libs/tobii/css/tobii.min.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/icons.css" />
        <link rel="stylesheet" href="assets/css/tailwind.css" />

    </head>
    
    <body class="font-nunito text-base text-black dark:text-white dark:bg-slate-900">
        
        <!-- Start Navbar -->
        <nav id="topnav" class="defaultscroll is-sticky">
            <div class="container">
                <!-- Logo container-->
                <a class="logo" href="index.html">
                    <span class="inline-block dark:hidden">
                        <img src="assets/images/logo-dark.png" class="l-dark" height="24" alt="">
                        <img src="assets/images/logo-light.png" class="l-light" height="24" alt="">
                    </span>
                    <img src="assets/images/logo-light.png" height="24" class="hidden dark:inline-block" alt="">
                </a>

                <!-- End Logo container-->
                <div class="menu-extras">
                    <div class="menu-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </div>
                </div>

                <!--Login button Start-->
                <ul class="buy-button list-none mb-0">
                    <li class="inline ps-1 mb-0">
                        <a href="login.php" target="_blank" class="btn btn-icon rounded-full bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white"><i data-feather="key" class="h-4 w-4"></i></a>
                    </li>
                </ul>
                <!--Login button End-->

                <div id="navigation">
                    <ul class="navigation-menu nav-light">
                        <li><a href="index.html" class="sub-menu-item">Home</a></li>
                        <li><a href="index.html#how-it-works" class="sub-menu-item">How It Works</a></li>
                        <li><a href="index.html#testimonials" class="sub-menu-item">Testimonials</a></li>
                    </ul>
                </div><!--end navigation-->
            </div><!--end container-->
        </nav><!--end header-->
        <!-- End Navbar -->

        <!-- Start Hero -->
        <section class="relative table w-full py-36 lg:py-44 bg-no-repeat bg-center bg-cover" style="background-image: url('assets/images/bg1.jpg');">
            <div class="absolute inset-0 bg-black opacity-75"></div>
            <div class="container">
                <div class="grid grid-cols-1 pb-8 text-center mt-10">
                    <h3 class="mb-6 md:text-4xl text-3xl md:leading-normal leading-normal font-medium text-white">Register</h3>

                    <p class="text-slate-300 text-lg max-w-xl mx-auto">Create An Account To Get Started</p>
                </div><!--end grid-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- End Hero -->

        <!-- Start Section-->
        <section class="relative">
            <div class="container mt-16">
                <div class="grid md:grid-cols-12 grid-cols-1 items-center gap-[30px]">
                    <div class="lg:col-span-7 md:col-span-6">

                    <?php
                                if (isset($response))
                                {
                                    echo "<span style='color: red;'><b>$response</b></span><br><br>";
                                }
                    ?>

                        <img src="assets/images/contact.svg" alt="">
                    </div>

                    <div class="lg:col-span-5 md:col-span-6 mt-8 md:mt-0">
                        <div class="lg:ms-5">
                            <div class="bg-white dark:bg-slate-900 rounded-md shadow dark:shadow-gray-800 p-6">

                                <form method="POST" name="myForm" id="myForm" action="">
                                    <p class="mb-0" id="error-msg"></p>
                                    <div id="simple-msg"></div>
                                    <div class="grid lg:grid-cols-12 lg:gap-6">
                                    <div class="lg:col-span-6 mb-5">
                                            <div class="ltr:text-left rtl:text-right">
                                                <label for="name" class="font-semibold">First Name:</label>
                                                <div class="form-icon relative mt-2">
                                                    <i data-feather="user" class="w-4 h-4 absolute top-3 start-4"></i>
                                                    <input name="fname" id="name" type="text" class="form-input ps-11" placeholder="First Name" required>
                                                </div>
                                            </div>
                                        </div>
        
                                        <div class="lg:col-span-6 mb-5">
                                            <div class="ltr:text-left rtl:text-right">
                                                <label for="name" class="font-semibold">Last Name:</label>
                                                <div class="form-icon relative mt-2">
                                                    <i data-feather="user" class="w-4 h-4 absolute top-3 start-4"></i>
                                                    <input name="lname" id="name" type="text" class="form-input ps-11" placeholder="Last Name" required>
                                                </div>
                                            </div>
                                        </div>
        
                                    </div>
    
                                    <div class="grid grid-cols-1">
                                    <div class="mb-5">
                                            <div class="ltr:text-left rtl:text-right">
                                                <label for="subject" class="font-semibold">Email</label>
                                                <div class="form-icon relative mt-2">
                                                    <i data-feather="book" class="w-4 h-4 absolute top-3 start-4"></i>
                                                    <input name="email" type="email" id="subject" class="form-input ps-11" placeholder="Email" required>
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="mb-5">
                                            <div class="ltr:text-left rtl:text-right">
                                                <label for="subject" class="font-semibold">Phone Number</label>
                                                <div class="form-icon relative mt-2">
                                                    <i data-feather="book" class="w-4 h-4 absolute top-3 start-4"></i>
                                                    <input name="phone" type="text" id="subject" class="form-input ps-11" placeholder="Phone Number">
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="mb-5">
                                            <div class="ltr:text-left rtl:text-right">
                                                <label for="subject" class="font-semibold">Date of Birth</label>
                                                <div class="form-icon relative mt-2">
                                                    <i data-feather="book" class="w-4 h-4 absolute top-3 start-4"></i>
                                                    <input name="dob" type="date" id="subject" class="form-input ps-11" placeholder="Date of Birth" required>
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="mb-5">
                                            <div class="ltr:text-left rtl:text-right">
                                                <label for="subject" class="font-semibold">Gender</label>
                                                <div class="form-icon relative mt-2">
                                                    <i data-feather="book" class="w-4 h-4 absolute top-3 start-4"></i>
                                            <select name="gender" class="form-input ps-11" required>
                                                <option value="" selected>Select Gender</option>
                                                <option>Male</option>
                                                <option>Female</option>
                                            </select>
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="mb-5">
                                            <div class="ltr:text-left rtl:text-right">
                                                <label for="subject" class="font-semibold">Password</label>
                                                <div class="form-icon relative mt-2">
                                                    <i data-feather="book" class="w-4 h-4 absolute top-3 start-4"></i>
                                                    <input name="password" type="password" id="subject" class="form-input ps-11" placeholder="Password" required>
                                                </div>
                                            </div>
                                        </div>
    
                                        
                                    </div>
                                    <button type="submit" id="submit" name="submit" class="btn bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md justify-center flex items-center">Submit</button>
                                    <br>
                                    <p>
                                        Already registered? <a href="login.php"><b>Login here</b></a>
                                    </p>

                                </form>
                            </div>
                        </div><br><br><br><br>
                    </div>
                </div>
            </div><!--end container-->
        </section><!--end section-->
        <!-- End Section-->

        <!-- Footer Start -->
        <footer class="footer bg-dark-footer relative text-gray-200 dark:text-gray-200">    
            <div class="py-[30px] px-0 border-t border-slate-800">
                <div class="container text-center">
                    <div class="grid md:grid-cols-2 items-center">
                        <div class="ltr:md:text-left rtl:md:text-right text-center">
                            <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> My Digital Diary</p>
                        </div>

                    </div><!--end grid-->
                </div><!--end container-->
            </div>
        </footer><!--end footer-->
        <!-- Footer End -->

        <!-- JAVASCRIPTS -->
        <script src="assets/libs/tiny-slider/min/tiny-slider.js"></script>
        <script src="assets/libs/tobii/js/tobii.min.js"></script>
        <script src="assets/libs/feather-icons/feather.min.js"></script>
        <script src="assets/js/plugins.init.js"></script>
        <script src="assets/js/app.js"></script>
        <!-- JAVASCRIPTS -->
    </body>

</html>