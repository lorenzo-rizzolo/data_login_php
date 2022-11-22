<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">	
    <link rel='stylesheet' href='css/style.css'>
    <title>error</title>
</head>
<?php
session_start();
include 'var.php';

if($_SESSION['pw']==$password){
    header("location:datalogin.php");
}elseif(isset($_GET['adm_acc'])){
    if($_GET['adm_pw'] == $password){
        $_SESSION['pw'] = $_GET['adm_pw'];
        header("location:datalogin.php");
    }
}
?>
<body>
    <header>
        DATAlogin
    </header>

    <div class="error">
        Non ti trovi sul localhost, usa una password.
    </div>
    <div class="form">
        <form method="get">
            <input type="password" name="adm_pw" placeholder="password">
            <input type="submit" name="adm_acc" value="Accedi" >
        </form>
    </div>
</body>
</html>