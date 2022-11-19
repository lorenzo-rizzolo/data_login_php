<?php
//esempio di come usare add_user
/*$arra = array(3, "cacca", 5, "ciao");
$n = "lorenzo";
$p = "qwe123";
add_user($n, $p, $arra);*/

function add_user($name, $pas, $arr){
    $user = fopen("login/users/".$name.".txt", "w");
    fwrite($user,$pas);
    foreach($arr as $detail){
        fwrite($user, "\n".$detail);
    }
    fclose($user);
}
function add_user_basic($name, $pas){
    $user = fopen("login/users/".$name.".txt", "w");
    fwrite($user,$pas);
    fclose($user);
}

function get_all_user(){
    $i=0;
    $gen_i =0;
    $gen_arr = array();
    $arr = array();
    foreach(glob("login/users/*.txt") as $user){
        $us = substr(basename($user), 0, -4);
        $arr[$i++]=$us;
        //echo $us."<br>";
        foreach(file($user) as $line){
            $arr[$i++] = $line;
            //echo $line."<br>";
        }
        $gen_arr[$gen_i++]=$arr;
        $i=0;
        foreach($arr as $r){
            $arr[$i++]=NULL;
        }
        $i=0;
    }
    return $gen_arr;
}

function get_pass($name){
    $i=0;
    $arr = array();
    $find = false;
    $error = array();
    foreach(glob("login/users/*.txt") as $user){
        $us = substr(basename($user), 0, -4);
        if($us===$name){
            $arr[$i++]=$us;
            $file = fopen($user, "r");
            $l=0;
            $p="";
            foreach(file($user) as $line){
                if($l==0){
                    $p=$line;
                    $arr[$i++]=$line;
                    //echo $line;
                }
                break;
            }
            $find = true;
            //echo $us." - ".$p;
        }
    }
    if($find == false){
        $error[0]= "Error, ".$name." non trovato.";
        return $error;
    }
    return $arr;
}

function del_user($name, $pass){
    $del = false;
    foreach(glob("login/users/*.txt") as $user){
        $us = basename($user);
        $us = substr($us, 0, -4);
        if($us === $name){
            $file = fopen($user, "r");
            $l=0;
            foreach(file($user) as $line){
                if($l==0){
                    $line = substr($line, 0, -1);
                    //echo $line.$pass;
                    if($line == $pass){
                        //echo $line;
                        unlink($user);
                        $del = true;
                    }
                    //echo $line;
                } 
                $l++;
            }
        }
    }
    if($del==true){
        return "Utente ".$name." eliminato.";
    }else{
        return "Utente ".$name." non trovato.";
    }
}

?>