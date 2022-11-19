<?php
function add_user($name, $pas, $arr){
    $per="login/users/";
    if(basename(getcwd())=="login"){
        $per="users/";
    }
    $user = fopen($per.$name.".txt", "w");
    fwrite($user,$pas);
    foreach($arr as $detail){
        fwrite($user, "\n".$detail);
    }
    fclose($user);
}
function add_user_basic($name, $pas){
    $per="login/users/";
    if(basename(getcwd())=="login"){
        $per="users/";
    }
    $user = fopen($per.$name.".txt", "w");
    fwrite($user,$pas);
    fclose($user);
}

function get_all_user(){
    $i=0;
    $gen_i =0;
    $gen_arr = array();
    $arr = array();
    $per="/login/users/*.txt";
    if(basename(getcwd())=="login"){
        $per="/users/*.txt";
    }
    foreach(glob($per) as $user){
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
    $per="/login/users/*.txt";
    if(basename(getcwd())=="login"){
        $per="/users/*.txt";
    }
    foreach(glob($per) as $user){
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
    $per="login/users/*.txt";
    if(basename(getcwd())=="login"){
        $per="users/*.txt";
    }
    foreach(glob($per) as $user){
        $us = basename($user);
        $us = substr($us, 0, -4);
        //echo $us.$name."<br>";
        if($us == $name){
            //echo "trovato<br>";
            $file = fopen($user, "r");
            $l=0;
            //echo $us.$l;
            foreach(file($user) as $line){
                //echo $line."<br>";
                if($l==0){
                    $line = substr($line, 0, -1);
                    //echo $line."<br>";
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
        echo "<script>alert(Utente ".$name." eliminato..);</script>";
    }else{
        echo "<script>alert(Utente ".$name." non trovato o password errata.);</script>";
    }
}

function del_user_basic($name, $pass){
    $del = false;
    $per="login/users/*.txt";
    if(basename(getcwd())=="login"){
        $per="users/*.txt";
    }
    foreach(glob($per) as $user){
        $us = basename($user);
        $us = substr($us, 0, -4);
        //echo $us.$name."<br>";
        if($us == $name){
            //echo "trovato<br>";
            $file = fopen($user, "r");
            $l=0;
            //echo $us.$l;
            foreach(file($user) as $line){
                //echo $line."<br>";
                if($l==0){
                    //echo $line."<br>";
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
        echo "<script>alert('Utente ".$name." eliminato..');</script>";
    }else{
        echo "<script>alert('Utente ".$name." non trovato o password errata.');</script>";
    }
}

?>