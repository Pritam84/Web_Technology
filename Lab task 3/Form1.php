<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $passErr = "";
$name = $password =  "";

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

 
   

  if (empty($_POST["password"])) {
    $passErr = "Password is required";
  }
  else {
    if (strlen($_POST["password"])<8) {
      $passErr = "contain atleast eight characters";
    }
       if (!preg_match("/^[@, #, $,%]*$/",$password)) {
      $passErr = "Password must contain at least one of the special characters";
    }
    else{ $password = test_input($_POST["password"]);}
  }
 }
  


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


<fieldset>
  <legend>Login</legend>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  Password: <input type="Password" name="password" value="<?php echo $password;?>">
  <span class="error">* <?php echo $passErr;?></span>
  <br><br>
  <input type="checkbox" name="checkbox"> Remember me
  <hr>

  
  <input type="submit" name="submit" value="Submit">  
</form>
</fieldset>

<?php

echo $name;
echo "<br>";
echo $password;
echo "<br>";

?>

</body>
</html>