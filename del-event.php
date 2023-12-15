<?php
ob_start();
require("connect.php");

$today= date('M d, Y');


if (isset($_SESSION['user']))
{
$user = $_SESSION['user'];

}
else
{
	header("location:login.php");
}


if (isset($_GET['id']))
	{
$iid=$_GET['id'];


	$Query="DELETE FROM activities WHERE id='$iid'";
	   mysqli_query($conn, $Query);


                     header("location:events.php");

		}




?>
