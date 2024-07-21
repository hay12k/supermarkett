<?php
    session_start();
    include("../controller/connection.php");
    if(isset($_POST['updatePassword'])){
        $email= mysqli_real_escape_string($con, $_POST['email']);
        $password= md5(mysqli_real_escape_string($con, $_POST['password']));
        $confirmPassword= md5(mysqli_real_escape_string($con, $_POST['confirmPassword']));
        $token= mysqli_real_escape_string($con, $_POST['token_password']);
        if(!empty($token)){
            if(!empty($email) && !empty($password) &&!empty($confirmPassword)){
                $check_token= "SELECT verify_token FROM users WHERE verify_token= '$token' LIMIT 1";
                $check_token_run= mysqli_query($con,$check_token);
                if(mysqli_num_rows($check_token_run) > 0){
                    if($password == $confirmPassword){
                        $updatePassword= "UPDATE users SET password ='$password' WHERE verify_token= '$token' LIMIT 1";
                        $updatePassword_run= mysqli_query($con,$updatePassword);
                        if($updatePassword_run){
                            $_SESSION['errmsg']= "New password SuccessfullyUpdated.!";
                            header("location: login.php?success");
                            exit(0);
                        }else{
                            $_SESSION['errmsg']= "Did not update password. Something went wrong.!";
                            header("location: change-password.php?error&?token=$token&email=$email");
                            exit(0);
                        }
                    }else{
                        $_SESSION['errmsg']= "Password and Confirm password not match";
                        header("location: change-password.php?error&?token=$token&email=$email");
                        exit(0);
                    }
                }else{
                    $_SESSION['errmsg']= "Invalid Token";
                    header("location: change-password.php?error&?token=$token&email=$email");
                    exit(0);
                }
            }else{
                $_SESSION['errmsg']= "All Filed are mandatory";
                header("location: change-password.php?error&?token=$token&email=$email");
                exit(0);
            }
        }else{
            $_SESSION['errmsg']= "No Taken Available";
            header("location: change-password.php?error&?token=$token&email=$email");
            exit(0);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
    <section>
        <div class="login-box">
            <form action="#" method="post">
                <h2>Change Password</h2>
                <?php if(isset($_GET['error'])){?>
                <h1 class="errmsg"><?php echo htmlentities($_SESSION['errmsg']); ?></h1> 
                <?php } ?>
                <input type="hidden" name="token_password" value="<?php if(isset($_GET['token'])){ echo $_GET['token'];} ?>">
                <div class="input-box">
                    <span class="icon"><i class='bx bxs-envelope'></i></span>
                    <input type="Email" name="email" id="" value="<?php if(isset($_GET['email'])){ echo $_GET['email'];} ?>" require>
                    <label>Emil</label>
                </div>
                <div class="input-box">
                    <span class="icon"><i class='bxs-lock-alt'></i></span>
                    <input type="password" name="password" id="" require>
                    <label>Password</label>
                </div>
                <div class="input-box">
                    <span class="icon"><i class='bx bxs-lock-alt'></i></span>
                    <input type="password" name="confirmPassword" id="" require>
                    <label>Confirm Password</label>
                </div>
                <button type="submit" name="updatePassword">Login</button>
            </form>
        </div>
    </section>
</body>

</html>