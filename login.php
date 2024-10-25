<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== REMIXICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/login.css">

    <title>Ucheque</title>
</head>

<body>
    <div class="login">
        <img src="images/login-bg.jpg" alt="login image" class="login__img">

        <form action="./controller/login_process.php" method="POST" class="login__form">
            <div class="logo--cont">
                <img src="images/logo-dark.png" alt="" />
            </div>

            <h1 class="login__title">Log In</h1>

            <div class="login__content">
                <div class="login__box">
                    <i class="ri-user-3-line login__icon"></i>
                    <div class="login__box-input">
                        <input type="email" name="email" required class="login__input" id="login-email" placeholder=" ">
                        <label for="login-email" class="login__label">Email</label>
                    </div>
                </div>

                <div class="login__box">
                    <i class="ri-lock-2-line login__icon"></i>
                    <div class="login__box-input">
                        <input type="password" name="password" required class="login__input" id="login-pass"
                            placeholder=" ">
                        <label for="login-pass" class="login__label">Password</label>
                        <i class="ri-eye-off-line login__eye" id="login-eye"></i>
                    </div>
                </div>
            </div>

            <div class="login__check">
                <div class="login__check-group">
                    <input type="checkbox" class="login__check-input" id="login-check">
                    <label for="login-check" class="login__check-label">Remember me</label>
                </div>

                <a href="#" class="login__forgot">Forgot Password?</a>
            </div>

            <button name="login" type="submit" class="login__button">Login</button>

            <?php if (isset($_SESSION['error'])): ?>
            <p class="error"><?php echo $_SESSION['error'];
                                    unset($_SESSION['error']); ?></p>
            <?php endif; ?>
        </form>
        <p>Don't have an account? <a href="register.php">Register here</a></p>
    </div>

    <!--=============== MAIN JS ===============-->
    <script src="assets/main.js"></script>
</body>

</html>