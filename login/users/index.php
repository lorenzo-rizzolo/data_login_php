<head>
    <link rel="stylesheet" href="../css/style.css">
</head>
<?php  
    //echo "\nUser IP Address - ".$_SERVER['REMOTE_ADDR']."\n\n";  
    if($_SERVER['REMOTE_ADDR'] == "::1"){
        echo "<script>window.open('../datalogin.php','_self');</script>";
    }else{
        echo "<script>window.open('../','_self');</script>";
    }
?> 