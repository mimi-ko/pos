<?php require_once('./auth/is_login.php'); ?>

<?php 
    // if(isset($_POST['logout'])){
    //     setcookie("user", '', -1, "/");;
    // }
var_dump($user);
    if($user['role'] == 1){
        header("location:./admin/index.php");
    }else if($user['role'] == 2){
        header("location:./cashier/index.php");
    }else if($user['role'] == 3){
        header("location:./kitchen/index.php");
    }else{
        header("location:./waiter/index.php");
    }

?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <script src="./assets/javascript/bootstrap.js"></script>
    <script src="./assets/javascript/jquery.js"></script>
</head>
<body>
    <h1 class="text-center">Welcome</h1>

    <form method="post">
        <input type="submit" name="logout" value="Logout" class="btn btn-danger mx-3">
    </form>
</body>
</html> -->