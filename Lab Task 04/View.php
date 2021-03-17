<?php require 'Logged.php' ?>

<?php
    $dtls = file_get_contents('data.json');
    $dtlsok = json_decode($dtls);

    foreach($dtlsok as $value)
    {
       
        echo "<h2>Name: $value->name</h2>";
        echo "<h2>Email: $value->email</h2>";
        echo "<h2>Password: $value->password</h2>";
         echo "<h2>Username: $value->uname</h2>";
        echo "<h2>Gender: $value->gender</h2>";
        
    }
?>

<?php require 'footer.php' ?>
