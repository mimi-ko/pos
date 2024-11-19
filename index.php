<?php require_once("./storage/db.php"); ?>
<?php require_once("./storage/user_crud.php"); ?>
<?php 
    if(isset($_COOKIE['user'])){
        header("location:./home.php");
    }
?>

<?php

$users = get_users($mysqli);
$users = $users->fetch_all();
$admin_user = array_filter($users, function ($user) {
    return $user[4] == 1;
});

if (!$admin_user) {
    $admin_password = password_hash("password", PASSWORD_BCRYPT);
    save_user($mysqli, "admin", "admin@gmail.com", $admin_password, 1);
}

$email = $email_err = $password = $password_err = "";

if (isset($_POST['submit'])) {
    $email = $mysqli->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    if ($email === "") {
        $email_err = "Fill the email";
    }
    if ($password === "") {
        $password_err = "Fill the password";
    }
    if ($email_err == "" && $password_err == "") {
       
        $user = get_user_with_email($mysqli, $email);
        if (!$user) {
            $email_err = "User doesn't esist!";
        } else {
            // if ($password !== $user['password']) {
            //     $password_err = "Password does not match!";
            // } else {
            //     header("Location:./home.php");
            // }
            if(password_verify($password, $user['password'])){
                setcookie("user", json_encode($user), time() + (86400 * 2), "/");
                header("Location:./home.php");
            }else{
                $password_err = "Wrong Password";
            }
        }
    }
}

?>
<!DOCTYPE html>
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

<body class="bd">
    <div class="card mx-auto login-container">
        <div class="card-body">
            <h2 class="text-center mt-2">Login Form</h2>
            <?php if(isset($_GET['invalid'])){ ?>
                <div class="alert alert-danger">Please Login first</div>
            <?php } ?>
            <form method="post">
                <div class="form-floating mt-4 mb-1">
                    <input type="email" name="email" id="" class="form-control" value="<?= $email ?>">
                    <label for="email">Email Address</label>
                    <div class="text-danger" style="font-size:14px; margin:7px"><?= $email_err ?></div>
                </div>
                <div class="form-floating mt-4 mb-1">
                    <input type="password" name="password" id="password" class="form-control" value="<?= $password ?>">
                    <label for="password">password</label>
                    <div class="text-danger" style="font-size:14px; margin:7px"><?= $password_err ?></div>
                </div>
                <div class="form-check mt-4 mb-1">
                    <input type="checkbox" class="form-check-input" id="show">
                    <label for="show" class="form-check-label">Show Password</label>
                </div>
                <input type="submit" name="submit" class="custom-btn mt-3" value="Login">
            </form>
        </div>
    </div>
</body>
<script>
    let show = $("#show");
    let password = $("#password")
    show.on("click", () => {
        if ($('#show').is(':checked')) {
            password.get(0).type = "text";
        } else {
            password.get(0).type = "password";
        }
    });
</script>

</html>