<?php 
    session_start();
    include("../controller/connection.php");

       //forget password
       if(isset($_POST['forgetPassword'])){
        $email= mysqli_real_escape_string($con, $_POST['email']);
        $token= md5(rand());
        $check_email= "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $check_email_run=mysqli_query($con, $check_email);
        if(mysqli_num_rows($check_email_run) > 0){
            $row=mysqli_fetch_array($check_email_run);
            $get_name= $row['FullName'];
            $get_email= $row['email'];
            $update_token= "UPDATE users SET verify_token='$token' WHERE email='$get_email' LIMIT 1";
            $update_token_run= mysqli_query($con, $update_token);
            if($update_token_run){
                $mail= require __DIR__ . "/mailer.php";
                $mail->setFrom('hayaangroup93@gmail.com');
                $mail->addAddress($get_email);     //Add a recipient
                $mail->Subject ="Reset password request";
                $mail->Body = <<<END
                    <p><b>Dear</b><strong> $get_name,</strong></p>
                    <p>We’ve received a password reset request. Click the button below to securely reset your password. If you didn't make this request, no worries, you can safely ignore this email..</p>
                    <a class="btn btn-success rounded-pill" href='https://localhost/supermarkett/admin/authantication/change-password.php?token=$token&email=$get_email'>Click Here</a>
                    <p>Alternatively, you can copy and paste the following link into your browser's address window.</p>
                    <a href="https://localhost/supermarkett/admin/authantication/change-password.php?token=$token&email=$get_email">http://http://localhost/supermarkett/admin/authantication/change-password.php?token=$token&email=$get_email</a>
                END;
                $mail->send();
                $_SESSION['errmsg']= "we e-mailed you a password reset link";
                header("location: password-reset.php?success");
                exit(0);
            }else{
                $_SESSION['errmsg']= "Something went wrong. #1";
                header("location: password-reset.php?error");
                exit(0);
            }
        }else{
            $_SESSION['errmsg']= "No Email Found";
            header("location: password-reset.php?error");
            exit(0);
        }
    }else{
        
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
    <section>
        <div class="login-box">
            <form action="password-reset.php" method="post" autocomplete="off" enctype="multipart/form-data">
                <h2>Reset Password</h2>
                <?php if(isset($_GET['error'])){?>
                <h1 class="errmsg"><?php echo htmlentities($_SESSION['errmsg']); ?></h1> 
                <?php } ?>
                <?php if(isset($_GET['success'])){?>
                <h1 class="success"><?php echo htmlentities($_SESSION['errmsg']); ?></h1> 
                <?php } ?>
                <div class="input-box">
                    <span class="icon"><i class='bx bxs-envelope'></i></span>
                    <input type="email" name="email" id="" require>
                    <label>Email</label>
                </div>
                <button type="submit" name="forgetPassword">Login</button>
            </form>
        </div>
    </section>
</body>

</html>