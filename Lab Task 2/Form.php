<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php

$nameErr = $emailErr = $dateofbirthErr = $genderErr = $degreeErr = $bloodgroupErr = "";
$name = $email = $dateofbirth = $gender = $degree = $bloodgroup = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-'. ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
    else if (strlen("name")<2)
    {
    	echo"Contains at least two words";
    }
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
    
  if (empty($_POST["dateofbirth"])) {
    $dateofbirthErr = "Date of Birth required";
  } else if ($dateofbirth = date('d-m-Y', strtotime($_REQUEST['dateofbirth'])));
    {echo $dateofbirth; 
  }



  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

  
 if(!empty($_POST['degree'])) {
    if(count($_POST['degree'])<2){
    $degreeErr = "Select at least two degrees";
    }
    else{
          foreach($_POST['degree'] as $value){
            $degree .= $value." ";
        } 
  }
}

if (empty($_POST["bloodgroup"])) {
    $bloodgroupErr = "Select a blood group";
  } else {
    $bloodgroup = test_input($_POST["bloodgroup"]);
  }



 

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Date of Birth: <input type="date" name="dateofbirth" value="<?php echo date('d-m-Y')?>">
  <span class="error"><?php echo $dateofbirthErr;?></span>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  Degree: 
                          <input type="checkbox" name="c[]" value="SSC" /> SSC
                          <input type="checkbox" name="c[]" value="HSC" /> HSC 
                          <input type="checkbox" name="c[]" value="BSc" /> BSc	
                          <input type="checkbox" name="c[]" value="MSc" /> MSc <br> <br/>


   Blood Group:
  <select id="blood" name="bloodgroup">
    <option value=""></option>
    <option value="ab+">AB+</option>
    <option value="a+">A+</option>
    <option value="b+">B+</option>
    <option value="o+">O+</option>
    <option value="ab-">AB-</option>
    <option value="a-">A-</option>
    <option value="b-">B-</option>
    <option value="o-">O-</option>
  </select>
  <span class="error">*<?php echo $bloodgroupErr;?></span>
  <br><br>

  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $dateofbirth;
echo "<br>";
echo $gender;
echo "<br>";
echo $degree;
echo "<br>";
echo $bloodgroup;
echo "<br>";

?>

</body>
</html>
