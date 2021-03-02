<!DOCTYPE html>
<html>

<head>
	<title>Lab Task 3 Full Form With JSON</title>
</head>
<body>


    <?php  

    $name = $email =$uname = $password = $cpassword = $gender = $dateofbirth = "";
    $nameErr = $emailErr = $unameErr = $passwordErr = $cpasswordErr = $genderErr = $dateofbirthErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else  { 
    if (strlen($_POST["name"])<2){
       $nameErr = "Type atleast two words";
     }
      if (!preg_match("/^[a-zA-Z-' _]*$/",$name)) {
        $nameErr = "Only letters and white space allowed";
      }
      else{ $name = test_input($_POST["name"]);}
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if ($_POST["uname"]) {
  	$uname = test_input($_POST["uname"]);
  }

  if ($_POST["password"] != $_POST["cpassword"]) {
  	echo "Password didn't match";
  }
  else{ $password = test_input($_POST["password"]); }
    
    if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }

   if (empty($_POST["dateofbirth"])) {
    $dateofbirthErr = "Date of Birth required";
  } else if ($dateofbirth = date('d-m-Y', strtotime($_REQUEST['dateofbirth'])));
    { $dateofbirth = test_input($_POST["dateofbirth"]); }

}


    function test_input($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    ?>



<fieldset>
<legend>REGISTRATION</legend>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <br><hr>

  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <br><hr>

   User Name: <input type="text" name="uname" value="<?php echo $uname;?>">
  <br><hr>

   Password: <input type="Password" name="password" value="<?php echo $password;?>">
    <br><hr>
   Confirm Password: <input type="Password" name="cpassword" value="<?php echo $cpassword;?>">
    <br><hr>

    Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <br><hr>


  Date Of Birth: <input type="date" name="dateofbirth" value="<?php echo date('d-m-Y')?>">
  <br><hr>
  

  <input type="submit" name="submit" value="Submit">  
  <input type="reset" name="reset" value="Reset">

</form>
</fieldset>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $uname;
echo "<br>";
echo $password;
echo "<br>";
echo $gender;
echo "<br>";
echo $dateofbirth;
echo "<br>";

?>


</body>
</html>