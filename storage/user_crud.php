<?php 

function save_user($mysqli,$name,$email,$password,$role){
    $sql = "INSERT INTO `users`(`username`, `email`, `password`, `role`) VALUES ('$name','$email','$password','$role')";
    return $mysqli->query($sql);
}

function get_user_with_id($mysqli,$id){
    $sql = "SELECT * FROM `users` WHERE `id`=$id";
    $user = $mysqli->query($sql);
    return $user->fetch_assoc();
}

function get_user_with_email($mysqli,$email){
    $sql = "SELECT * FROM `users` WHERE `email`='$email'";
    $user = $mysqli->query($sql);
    return $user->fetch_assoc();
}

function get_users($mysqli){
    $sql = "SELECT * FROM users";
    return $mysqli->query($sql);
}