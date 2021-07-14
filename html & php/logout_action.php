<?php
    include "connect.php";

    session_start();
    session_destroy();

   
        header("location:confirmlogout.php");        
?>
