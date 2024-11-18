<?php require_once('./storage/db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"/>
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <script src="./assets/javascript/bootstrap.js"></script>
    <script src="./assets/javascript/jquery.js"></script>

</head>
<body class="bd">
    <div class="card mx-auto login-container">
        <div class="card-body">
            <h2 class="text-center mt-2">Login Form</h2>
            <form action="" method="post">
                <div class="form-floating mt-4 mb-1">
                    <input type="email" name="" id="" class="form-control">
                    <label for="email">Email Address</label>
                </div>
                <div class="form-floating mt-4 mb-1">
                    <input type="password" name="" id="password" class="form-control">
                    <label for="password">password</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="show">
                    <label for="show" class="form-check-label">Show Password</label>
                </div>
                <input type="submit" class="custom-btn mt-3" value="Login">
            </form>
        </div>
    </div>
</body>
<script>
    let show = $("#show");
    let password = $("#password")
    show.on("click",()=>{
        if ($('#show').is(':checked')) {
        password.get(0).type = "text";
    } else {
        password.get(0).type = "password";
    }
        
    })
</script>
</html>