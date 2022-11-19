<head>
    <link rel="stylesheet" href="../css/style.css">
</head>
<?php  
    //echo "\nUser IP Address - ".$_SERVER['REMOTE_ADDR']."\n\n";  
    if($_SERVER['REMOTE_ADDR'] == "::1"){
        echo "<header>Bene, sei sul server principale.</header>";
    }else{
        include "../error.php";
    }
?> 