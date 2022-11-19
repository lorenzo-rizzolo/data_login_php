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
        }
    </style>
    <title>tutorial</title>
</head>

<body>
    
<h3>Tutorial su come usare questa API</h3>

<?php
include 'data_login.php';
?>

<h4>Aggiungo utente con dettagli</h4>
<?php
$n = "test2";
$p = "qwe456";
$id = 4;
$date = date("d-m-y");
$arra = array($id, $date);
echo "aggiungo: | ".$n." | ".$p." | ".$id." | ".$date;
add_user($n, $p, $arra);
?>

<h4>Aggiungo utente con solo name e password</h4>
<?php
$n = "test1";
$p = "qwe123";
add_user_basic($n, $p);
?>

<h4>Stampo tutti gli utenti</h4>
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

<h4>Stampo la password di un utente preciso</h4>
<?php
$user = "test2";
foreach(get_pass($user) as $u){
    echo $u."<br>"  ;
}
?>

</body>


