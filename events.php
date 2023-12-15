<?php
ob_start();
require("connect.php");

$today= date('M d, Y');

if (isset($_SESSION['user']))
{
$user = $_SESSION['user'];


	$Quedybbr="SELECT * FROM users WHERE email='$user'";
	   $run_quedybbr=mysqli_query($conn, $Quedybbr) or die('Error!!! ,query failed'.mysql_error());

					while($profidybbr=mysqli_fetch_array($run_quedybbr))
								 {
									 $naid=$profidybbr['id'];
									 $fname=$profidybbr['fname'];
									 $lname=$profidybbr['lname'];
									 $email=$profidybbr['email'];
								 }

}
else
{
	header("location:login.php");
}

?>

<!DOCTYPE html>
<html lang="en" class="light scroll-smooth" dir="ltr">
    
<head>
        <meta charset="UTF-8" />
        <title>My Events - My Digital Diary</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- Css -->
        <link href="assets/libs/%40iconscout/unicons/css/line.css" type="text/css" rel="stylesheet" />
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
                        <a href="logout.php" target="_blank" class="btn btn-icon rounded-full bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white"><i data-feather="key" class="h-4 w-4"></i></a>
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

        <!-- Start Hero -->
        <section class="relative lg:pb-24 pb-16">
            <div class="container-fluid">
                <div class="profile-banner relative text-transparent">
                    <input id="pro-banner" name="profile-banner" type="file" class="hidden" onchange="loadFile(event)" />
                    <div class="relative shrink-0">
                        <img src="assets/images/bg2.jpg" class="h-80 w-full object-cover" id="profile-banner" alt="">
                        <div class="absolute inset-0 bg-black/70"></div>
                        <label class="absolute inset-0 cursor-pointer" for="pro-banner"></label>
                    </div>
                </div>
            </div><!--end container-->

            <div class="container md:mt-24 mt-16">
                <div class="md:flex">
                    <div class="lg:w-1/4 md:w-1/3 md:px-3">
                        <div class="relative md:-mt-48 -mt-32">
                            <div class="p-6 rounded-md shadow dark:shadow-gray-800 bg-white dark:bg-slate-900">
                                <div class="profile-pic text-center mb-5">
                                    <input id="pro-img" name="profile-image" type="file" class="hidden" onchange="loadFile(event)" />
                                    <div>

                                        <div class="mt-4">
                                            <h5 class="text-lg font-semibold"><?php echo "$fname $lname"; ?></h5>
                                            <p class="text-slate-400"><?php echo $email; ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="border-t border-gray-100 dark:border-gray-700">
                                    <ul class="list-none sidebar-nav mb-0 mt-3" id="navmenu-nav">
                                        <li class="navbar-item account-menu">
                                            <a href="dashboard.php" class="navbar-link text-slate-400 flex items-center py-2 rounded">
                                                <span class="me-2 text-[18px] mb-0"><i class="uil uil-dashboard"></i></span>
                                                <h6 class="mb-0 font-semibold">Dashboard</h6>
                                            </a>
                                        </li>
    
                                        <li class="navbar-item account-menu">
                                            <a href="events.php" class="navbar-link text-slate-400 flex items-center py-2 rounded">
                                                <span class="me-2 text-[18px] mb-0"><i class="uil uil-diary-alt"></i></span>
                                                <h6 class="mb-0 font-semibold">My Events</h6>
                                            </a>
                                        </li>
    
                                        <li class="navbar-item account-menu">
                                            <a href="ideas.php" class="navbar-link text-slate-400 flex items-center py-2 rounded">
                                                <span class="me-2 text-[18px] mb-0"><i class="uil uil-diary-alt"></i></span>
                                                <h6 class="mb-0 font-semibold">My Ideas</h6>
                                            </a>
                                        </li>
    
                                        <li class="navbar-item account-menu">
                                            <a href="logout.php" class="navbar-link text-slate-400 flex items-center py-2 rounded">
                                                <span class="me-2 text-[18px] mb-0"><i class="uil uil-power"></i></span>
                                                <h6 class="mb-0 font-semibold">Sign Out</h6>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="lg:w-3/4 md:w-2/3 md:px-3 mt-[30px] md:mt-0">
                        <div class="grid lg:grid-cols-2j grid-cols-1 gap-[30px]">
                            <div class="mt-[30px] lg:mt-0">
                                <h5 class="text-xl font-semibold">My Events</h5>



                                <?php                   
 
 $Quedybbrbo="SELECT * FROM activities WHERE type='Event'AND userid='$naid' ORDER BY id DESC ";
 $run_quedybbrbo=mysqli_query($conn, $Quedybbrbo) or die('Error!!! ,query failed'.mysql_error());

              while($profidybbrbo=mysqli_fetch_array($run_quedybbrbo))
                           {
                            $evid=$profidybbrbo['id'];
                            $dat=$profidybbrbo['date'];
                            $title=$profidybbrbo['title'];
                            $activity=$profidybbrbo['activity'];
                           

 echo "

 <div class='flex transition-all duration-500 hover:scale-105 shadow dark:shadow-gray-800 hover:shadow-md dark:hover:shadow-gray-700 ease-in-out items-center p-4 rounded-md bg-white dark:bg-slate-900 mt-6'>
 <div class='flex-1 content ms-4'>
     <h3 class='text-lg text-medium'>$title</h3>
     <small class='text-slate-400 mb-0'>$dat</small>
     <p> $activity </p>    
 </div>
 <div>
         <a href='del-event.php?id=$evid' class='btn btn-icon bg-red-600/5 hover:bg-red-600 border-red-600/10 hover:border-red-600 text-red-600 hover:text-white rounded-full'><i data-feather='trash-2' class='h-4 w-4'></i></a>
 </div>
</div>

    ";
                           }

?>

                            

                                
                            </div>
                        </div>

                        
                        
                    </div>
                </div><!--end grid-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- End Hero -->

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
        <script src="assets/libs/feather-icons/feather.min.js"></script>
        <script src="assets/js/plugins.init.js"></script>
        <script src="assets/js/app.js"></script>
        <!-- JAVASCRIPTS -->
    </body>

</html>