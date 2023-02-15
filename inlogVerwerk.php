<?php
require 'db_Config.php';

if(isset($_POST['username']) && isset($_POST['password'])){

    $user    = $_POST['username'];
    $pass    = $_POST['password'];

    $pass=sha1($pass);

    $query   = "SELECT * FROM `users` ";
    $query  .= "WHERE `username`='$user' AND `password`='$pass'";

    $result = mysqli_query($mysqli, $query);
    $item = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) == 1)
    {
        session_start();
        $_SESSION['username'] = $user;
        header("location:toonagenda.php");
    }

    else
    {
        echo "Username of Wachtwoord is fout <br/>";
        echo "<a href='inlog.html'>Terug</a>";
    }
}

else
{
    echo "<p>Het formulier is niet goed verstuurd</p>";
}
?>