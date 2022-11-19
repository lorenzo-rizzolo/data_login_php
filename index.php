<head>
    <style>
        body{
            font-size:120%;
        }
        .user{
            background-color:blue;
            color:white;
            width:200px;
            padding:20px;
            margin:10px;
            border-radius:20px;
        }
        h3{
            color:red;
            background-color:rgb(149, 216, 115);
            padding:10px;
            margin:10px;
            border-radius:20px;
        }
        .box{
            background-color:rgb(149, 216, 115);
            padding:10px;
            margin:10px;
            border-radius:20px;
        }
    </style>
    <title>tutorial</title>
</head>

<body>
    
<h3>Tutorial su come usare questa API <small>(guarda il codice in index.php)</small></h3>

<?php
include 'data_login.php';
?>
<div class="box">
    <i>Per usare le funzioni:</i><br>
    <ul>
        <li>includi il file <code>data_login.php</code></li>
        <li>Ci sono 4 funzioni principali:
            <ul>
                <li>
                    <code>add_user(nome, pass, array_di_dettagli); aggiunge un utente con dettagli aggiuntivi.</code>
                </li>
                <li>
                    <code>add_user_basic(nome, pass); aggiunge un utente.</code>
                </li>
                <li>
                    <code>get_all_user(); resitutisce un array di array con gli utenti e le loro info.</code>
                </li>
                <li>
                    <code>get_pass(nome); restituisce un array con nome e password dell'utente.</code>
                </li>
                <li>
                    <code>del_user(nome, password); elimina un utente.</code>
                </li>
            </ul>
        </li>
    </ul>
</div>

<div class="box">
    <h4>Aggiungo utente con dettagli <small>(guarda il codice in index.php)</small></h4>
    <?php
        $n = "test";
        $p = "qwe456";
        $id = 4;
        $date = date("d-m-y");
        $arra = array($id, $date);
        echo "aggiungo: | ".$n." | ".$p." | ".$id." | ".$date;
        add_user($n, $p, $arra);
    ?>
</div>

<div class="box">
    <h4>Aggiungo utente con solo name e password <small>(guarda il codice in index.php)</small></h4>
    <?php
    $n = "test1";
    $p = "qwe123";
    add_user_basic($n, $p);
    ?>
</div>

<div class="box">
    <h4>Stampo tutti gli utenti <small>(guarda il codice in index.php)</small></h4>
    <?php
    $i=0;
    foreach(get_all_user() as $user){
        echo "<div class='user'>";
        foreach($user as $us){
            echo $us."<br>";
            $i++;
        }
        echo "</div>";
    }
    ?>
</div>

<div class="box">
    <h4>Stampo la password di un utente preciso <small>(guarda il codice in index.php)</small></h4>
    <?php
    $user = "test2";
    foreach(get_pass($user) as $u){
        echo $u."<br>";
    }
    ?>
</div>
<div class="box">
    <h4>Elimino un utente<small>(guarda il codice in index.php)</small></h4>
    <?php
    $user = "test2";
    $pas = "qwe456";
    echo del_user($user, $pas);
    ?>
</div>

</body>


