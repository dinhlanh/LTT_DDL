<!DOCTYPE html>
<html>
<head>
    <title>Login Success</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php
    if (!empty($_POST['logout'])) {
        session_start();
        session_destroy();
        if (!isset($_COOKIE['remember'])) {
            setcookie('email', '', time() - 43200);
            setcookie('password', '', time() - 43200);
        }
        header('Location: Login.php');
    }
    ?>
    <h1 style="color: blue">Đăng nhập thành công</h1>
    <form action="" method="POST">
        <input type="submit" name="logout" id="logout" value="LOGOUT">
    </form>
</body>
</html>
