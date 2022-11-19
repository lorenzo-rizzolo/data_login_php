<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo basename(getcwd()) ?></title>
</head>
<body>
    <header>
        DATAlogin
        <hr>
        <a href="">Ricarica la pagina</a>
    </header>

    <div class="cerca">
        <form method="post">
            <input type="text" name="cerca" placeholder="cerca...">
            <input type="submit" value="cerca" name="invia">
        </form>
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