<?php
    session_start();
    //  login form checked
    include("../controller/connection.php");
    if(isset($_POST['login'])){
       function validate($data){
           $data = trim($data);
           $data = stripslashes($data);
           $data = htmlspecialchars($data);
           return $data;
       }
       $username = validate($_POST['username']);
       $password = md5(validate($_POST['password']));

       if(empty($username)){
           $_SESSION['errmsg']="Username is required";
           header("location: ./login.php");
           exit();
       }else if(empty($password)){
           $_SESSION['errmsg']="password is required";
           header("location: ./login.php");
           exit();
       }else{
           $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
           $result = mysqli_query($con,$sql);
           if(mysqli_num_rows($result) === 1){
               $row= mysqli_fetch_assoc($result);
               $active=$row['active'];
               if($row['username'] === $username && $row['password'] === $password){
                   $_SESSION['login']= $row['username'];
                   $_SESSION['id']=$row['id'];
                   $_SESSION['role']=$row['role'];
                   $_SESSION['active']=$row['active'];
                   header("location: ../index.php");
                   exit();
                   if($_SESSION['role']=="admin"){
                    header("location: index.php");
                   }elseif($_SESSION['role']!="admin"){
                    header("location: index.php");
                   }
               }else{
                   $_SESSION['errmsg']="Invalid username or password";
                   header("location: ./login.php?error");
                   exit();
               }
           }else{
               $_SESSION['errmsg']="Invalid username or password";
               header("location: ./login.php?error");
               exit();
           }
       }
    }else{
       $_SESSION['errmsg']="Invalid username or password";
       header("location: ./login.php?error");
       exit();
    }



?>