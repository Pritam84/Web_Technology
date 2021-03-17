

<?php require'Logged.php'?>


<?php 




if (isset($_SESSION['uname'])) {
	//echo "<h1> Welcome ".$_SESSION['uname']."</h2>";
	echo "<a href='View.php'>View Profile</a><br>";
	echo "<a href='Community.php'>Your Community</a><br>";
	echo "<a href='fileupload.php'>Upload Picture</a><br>";
	echo "<a href='Forgot.php'>Reset Password</a><br>";
	//echo "<br><a href='logout.php'>Logout</a><br>";


}
else{
		$msg="error";
		header("location:login.php");

	}

 ?>

 <?php require'footer.php'  ?>