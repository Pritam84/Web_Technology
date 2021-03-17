<?php 

session_start();

$username="Abc";
$password="Abc";

if (isset($_POST['uname'])) 
   {
    if ($_POST['uname']==$username && $_POST['pass']==$password) {
        $_SESSION['uname'] = $username;
        header("location:New.php");
    }
    else
    {
        $msg="username or password invalid";
    }

}

?>
        <?php if(isset($msg)){?>
            <?php echo $msg;?>
        <?php } ?>
  <?php require'Welcome.php' ?>
<fieldset>
    <legend>Login</legend>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

        

        
            <b> Username: &nbsp </b><input type="text" name="uname"> <br><hr>

           <b> Password: &nbsp </b> <input type="password" name="pass"> <br><hr>

                                    <input type="submit" name="Login" value="Login"> &nbsp
                                    <input type="reset" name="reset"> &nbsp &nbsp <a href="Forgot1.php"><b>Forgot Password? </b></a>

    
</form>
</fieldset>
<?php require'footer.php' ?>
