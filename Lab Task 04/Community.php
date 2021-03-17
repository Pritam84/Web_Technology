<?php require 'Logged.php';  ?>

<?php 

$textarea = "";
if (isset($_POST['Post']))
 {
	$textarea = $_POST['textarea'];
}
?>

<fieldset>
	<legend>Write Your Post</legend>
	<form method="POST">
     <textarea  placeholder="Write here..." name="textarea" rows="15" cols="50"> </textarea> </br><hr>
     <input type="submit" name="Post" value="Post">
     <input type="reset" name="Reset" value="Reset">

</form>
</fieldset>
<fieldset>
	<?php
echo "<h2>Your Post:</h2>";
echo $textarea;


?>
</fieldset>

<?php require'footer.php' ?>