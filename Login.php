<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="./jquery-3.4.1.min.js"></script>
</head>
<body>
    <?php
    session_start();
    $error = array();
    $data = array();

    if (!empty($_POST['login'])) {
        // Get data
        $data['email'] = $_POST['email'] ?? '';
        $data['password'] = $_POST['password'] ?? '';
        if (isset($_POST['remember_me'])) {
            $rememberMe = $_POST['remember_me'];
        }

      
        function isEmail(string $email)
        {
            return (!filter_var($email, FILTER_VALIDATE_EMAIL)) ? false : true;
        }

        // Check data
        if (empty($data['email'])) {
            $error['email'] = 'Bạn chưa nhập email';
        } elseif (!isEmail($data['email']) || strlen($data['email']) > 255) {
            $error['email'] = 'Email không đúng định dạng';
        }

        if (empty($data['password'])) {
            $error['password'] = 'Bạn chưa nhập mật khẩu';
        } elseif (strlen($data['password']) < 6 || strlen($data['password']) > 50) {
            $error['password'] = 'Mật khẩu phải có độ dài từ 6 đến 50 ký tự';
        }

        // Receive data if entered correctly
        if ($data['email'] === 'lanhdd@gmail.com' && $data['password'] === 'lanhdd123456') {
            setcookie('remember', $rememberMe, time() - 432000);
            if (isset($rememberMe)) {
                setcookie('email', $data['email'], time() + 432000);
                setcookie('password', $data['password'], time() + 432000);
                setcookie('remember', $rememberMe, time() + 432000);
            }
            $_SESSION['email'] = $data['email'];
            $_SESSION['password'] = $data['password'];
            header('Location: LoginSuccess.php');
        } else {
            echo '<div style="color: red;">Đăng nhập thất bại</div>';
            // var_dump($_POST);
        }
    }
    ?>

    <fieldset style="width: 350px; margin: auto;">
    <form method="POST" action="">
    	<h1 style="text-align: center;">Login Form</h1>
        <table cellspacing="0" cellpadding="5">
            <tr>
                <td>Email</td>
                <td>
                    <input type="email" name="email" id="email" required="" 
                    value="<?php echo $_COOKIE['email'] ?? ''; ?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td style="color: red;">
                    <?php echo $error['email'] ?? ''; ?>
                    <span id="mess-email"></span>
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td>
                    <input type="password" name="password" id="password" 
                    required="" 
                    value="<?php echo $_COOKIE['password'] ?? ''; ?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td style="color: red;">
                    <?php
                    echo $error['password'] ?? '';
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" name="remember_me" id="remember-me"
                    <?php
                    if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
                        echo 'checked';
                    }
                    ?>
                    >Remember me
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="login" value="Login"/></td>
            </tr>
        </table>
    </form>
</fieldset>
</body>
</html>
