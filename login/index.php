<?php  
    //echo "\nUser IP Address - ".$_SERVER['REMOTE_ADDR']."\n\n";  
    if($_SERVER['REMOTE_ADDR'] == "::1"){
        header("location:datalogin.php");
    }else{
        header("location:error.php");
    }
?> 