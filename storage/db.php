<?php 

try {
    $mysqli = new mysqli("localhost","root","");
    $sql = "CREATE DATABASE IF NOT EXISTS `pos`";
    if($mysqli->query($sql)){
        //echo "Database create successfully";
        $mysqli->select_db("pos");
        create_table($mysqli);
        //seeding($mysqli);
    }
    
} catch (\Throwable $th) {
    echo "Cannot connect database!";
    die();
}

function create_table($mysqli){
    $sql = "CREATE TABLE IF NOT EXISTS `users`(`id` INT AUTO_INCREMENT,`username` VARCHAR(45) NOT NULL,`email` VARCHAR(90) UNIQUE NOT NULL,`password` VARCHAR(255) NOT NULL,`role` INT NOT NULL,PRIMARY KEY(`id`))";
    if(!$mysqli->query($sql)){
        return false;
    }
    return true;
}