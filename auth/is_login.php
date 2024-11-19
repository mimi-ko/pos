<?php 

$user = json_decode($_COOKIE['user'],true);

if(!$user){
    header("location:../index.php?invalid");
}else {
    $url = $_SERVER['REQUEST_URI'];
    $arr= explode('/',$url);
    $code = 0;

    if($arr[count($arr)-2] !== "pos"){
        $role_name = $arr[count($arr)-2];
        switch($role_name){
            case 'admin';
            $code = 1;
            break;
            case 'cashier';
            $code = 2;
            break;
            case 'kitchen';
            $code = 3;
            break;
            case 'waiter';
            $code = 4;
            break;
        }
    }if($code != $user['role']){
        header("location:../401.php");
    }
}