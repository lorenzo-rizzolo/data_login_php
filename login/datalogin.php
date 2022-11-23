<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">	
    <link rel='stylesheet' href='css/style.css'>
    <title><?php echo basename(getcwd()) ?></title>
</head>
<body>
<script>
    function show(){
        document.getElementById('pul_menu').innerHTML = "<button onclick='not_show()'>Nascondi Men&ugrave;</button>";
        document.getElementById('opt').style.display = "inline-block";
    }
    function not_show(){
        document.getElementById('pul_menu').innerHTML = "<button onclick='show()'>Mostra Men&ugrave;</button>";
        document.getElementById('opt').style.display = "none";
    }
</script>

<?php
    session_start();
    include 'var.php';
	if($_SERVER['REMOTE_ADDR'] != "::1" && $_SESSION['pw']!=$password){
		include "error.php";
        exit(1);
    }
?>
    <header>
        DATAlogin
        <hr>
        <a href="">Ricarica la pagina</a>
    </header>
    <?php include "../data_login.php"; ?>

    <div id="pul_menu">
        <button onclick="show()">Mostra Men&ugrave;</button>
    </div>

    <div id="opt">
        <div class="cerca">
            <h4>Cerca Utente</h4>
            <form method="post">
                <input type="search" name="cerca" placeholder="cerca nome...">
                <input type="submit" value="cerca" name="invia">
            </form>
        </div>
        <div class="cerca">
            <h4>Nuovo utente semplice</h4>
            <form method="post">
                <input type="text" name="nome" placeholder="nome">
                <input type="password" name="pas" placeholder="password">
                <input type="submit" value="crea" name="nuovo">
            </form>
            <?php
                if(isset($_POST['nuovo'])){
                    $name = $_POST['nome'];
                    $passw = $_POST['pas'];
                    if($name!="" && $passw!=""){
                        add_user_basic($name, $passw);
                    }
                }
            ?>
        </div>
        <div class="cerca">
            <h4>Elimina utente</h4>
            <form method="post">
                <input type="text" name="nomeus" placeholder="nome">
                <input type="password" name="passw" placeholder="password">
                <input type="submit" value="elimina" name="elimina">
            </form>
            <?php
                if(isset($_POST['elimina'])){
                    $name = $_POST['nomeus'];
                    $passwd = $_POST['passw'];
                    if($name!="" && $passwd!=""){
                        //$passw = substr($passw, 0, 1);
                        //echo $name.$passwd." eliminato ";
                        del_user_basic($name, $passwd);
                    }
                }
            ?>
        </div>
    </div>
    <br>
    <?php
        if(isset($_POST['invia'])){
            $name = $_POST['cerca'];
            if($name=="" || $name==" "){$name="-";}
            echo "<span style='margin:20px;'>Ricerca di: </span>".$name."<br>";
            $find = false;
            foreach(glob("users/*.txt") as $user){
                $us = substr(basename($user), 0, -4);
                if($us == $name){
                    $us = substr(basename($user), 0, -4);
                    echo "<div class='db'>";
                    echo $us."<br>";
                    $file = fopen($user, "r");
                    foreach(file($user) as $line) {
                        echo $line."<br>";
                    }
                    echo "</div><br>";
                    $find=true;
                }
            }
            if(!$find){
                echo "<span style='margin:20px;'>Nessun utente con nome ".$name." trovato<br></span>";
            }
        }
    ?>
    
    <?php
        foreach(glob("users/*.txt") as $user){
            $us = substr(basename($user), 0, -4);
            echo "<div class='db'>";
            echo $us."<br>";
            $file = fopen($user, "r");
            foreach(file($user) as $line) {
                echo $line."<br>";
            }
            echo "</div>";
        }
    
    ?>

</body>
</html>