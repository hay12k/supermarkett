<?php
    session_start();
    if(!isset($_SESSION['login']) && !isset($_SESSION['id'])){
        ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
    <section>
        <div class="login-box">
            <form action="./logincheck.php" method="post">
                <h2>Login</h2>
                <?php if(isset($_GET['error'])){?>
                <h1 class="errmsg"><?php echo htmlentities($_SESSION['errmsg']); ?></h1> 
                <?php } ?>
                <?php if(isset($_GET['success'])){?>
                <h1 class="success"><?php echo htmlentities($_SESSION['errmsg']); ?></h1> 
                <?php } ?>
                <div class="input-box">
                    <span class="icon"><i class='bx bxs-envelope'></i></span>
                    <input type="text" name="username" id="" require>
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <span class="icon"><i class='bx bxs-lock-alt'></i></span>
                    <input type="password" name="password" id="" require>
                    <label>Password</label>
                </div>
                <div class="remember-forget">
                    <label><input type="checkbox" name="checkbox" id="">Remember me</label>
                    <a href="password-reset.php">Forget Password</a>
                </div>
                <button type="submit" name="login">Login</button>
            </form>
        </div>
    </section>
</body>

</html>
<?php } else{
    header("location: ../index.php");
}?>