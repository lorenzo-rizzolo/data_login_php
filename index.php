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
    <link rel="shortcut icon" href="login/css/favicon.ico" />
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
        <li>per accedere alla gestione del DataBase usa <code>localhost/login</code></li>
        <li>Ci sono 4 funzioni principali:
            <ul>
                <li>
                    <code>add_user(nome, pass, array_di_dettagli); aggiunge un utente con dettagli aggiuntivi.</code>
                </li>
                <li>
                    <code>add_user_basic(nome, pass); aggiunge un utente basic.</code>
                </li>
                <li>
                    <code>del_user(nome, password); elimina un utente.</code>
                </li>
                <li>
                    <code>del_user_basic(nome, password); elimina un utente basic.</code>
                </li>
                <li>
                    <code>change_pass(nome, password); cambia password ad un utente.</code>
                </li>
                <li>
                    <code>change_pass_basic(nome, password); cambia password ad un utente basic.</code>
                </li>
                <li>
                    <code>get_all_user(); resitutisce un array di array con gli utenti e le loro info.</code>
                </li>
                <li>
                    <code>get_pass(nome); restituisce un array con nome e password dell'utente.</code>
                </li>
            </ul>
        </li>
    </ul>
</div>

<div class="box">
    <h4>Aggiungo utente con dettagli <small>(guarda il codice in index.php)</small></h4>
    <?php
        $n = "test_detail";
        $p = "detail";
        $id = 1;
        $date = date("d-m-y");
        $arra = array($id, $date);
        echo "aggiungo: | ".$n." | ".$p." | ".$id." | ".$date;
        //add_user($n, $p, $arra);
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
    foreach(get_all_user() as $user){
        echo "<div class='user'>";
        foreach($user as $us){
            echo $us."<br>";
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
    $pas = "54769";
    //del_user($user, $pas);
    ?>
</div>

<div class="box">
    <h4>Cambia password ad un utente<small>(guarda il codice in index.php)</small></h4>
    <?php
    $user = "test_detail";
    $pas = "5439";
    //change_pass($user, $pas);
    ?>
</div>

<div class="box">
    <h4>Cambia password ad un utente basic<small>(guarda il codice in index.php)</small></h4>
    <?php
    $user = "test2";
    $pas = "test";
    //change_pass_basic($user, $pas);
    ?>
</div>

</body>


