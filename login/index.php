<head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="css/favicon.ico" />
</head>
<?php  
    //echo "\nUser IP Address - ".$_SERVER['REMOTE_ADDR']."\n\n";  
    if($_SERVER['REMOTE_ADDR'] == "::1"){
       include "datalogin.php";
    }else{
        include "error.php";
    }
?> 