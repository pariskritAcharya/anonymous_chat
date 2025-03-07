<?php

$_HOST="localhost";
    $_USERNAME="root";
    $_PASS="";
    $_DATABASE="chats";

    $conn =  new mysqli($_HOST,$_USERNAME,$_PASS,$_DATABASE);

    if($conn -> connect_error){
      die("connection error".mysql_error());
    }

    ?>
    