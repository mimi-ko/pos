<?php require_once('../auth/is_login.php') ?>
<?php 
    if(isset($_POST['logout'])){
        setcookie("user", '', -1, "/");
        header("location:../index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casher</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <script src="./assets/javascript/bootstrap.js"></script>
    <script src="./assets/javascript/jquery.js"></script>
</head>
<body>
    <h2>Casher Page</h2>
    <form method="post">
        <input type="submit" name="logout" value="Logout" class="btn btn-danger mx-3">
    </form>
</body>
</html>