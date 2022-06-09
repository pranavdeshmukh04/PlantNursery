<?php
    include '../PHP/profileconfig.php';
    require_once('../PHP/component.php');
    error_reporting(0);
    session_start();

    if (isset($_SESSION['username']) and isset($_SESSION['email'])) {
        header("Location: SigninPage.php");
    }
    if(isset($_POST['register'])){
        
        $password = md5($_POST['password']);
        $cpassword = md5($_POST['cpassword']);
        
        if (empty($_POST["username"])) {
            echo "<script>alert('Name is required')</script>";
          } else {
            $username = $_POST['username'];
            if (!preg_match("/^[A-Za-z][A-Za-z0-9_]*$/",$username)) {
              echo "<script>alert('Only letters, numbers and white space allowed');</script>";
            }
          }
          
        if (empty($_POST["email"])) {
            echo "<script>alert('Email is required');</script>";
        } else {
            $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Invalid email format');</script>";
        }
        }
        if ($password == $cpassword) {
            $sql = "SELECT * FROM profiletb WHERE email='$email'";
            $result = mysqli_query($conn, $sql);
            if (!$result->num_rows > 0) {
                $sql = "INSERT INTO profiletb (USERNAME, EMAIL, PASSWORD)
                        VALUES ('$username', '$email', '$password')";
                $result = mysqli_query($conn, $sql);
                if ($result and !empty($_POST["username"]) and !empty($_POST["email"])) {
                    echo "<script>alert('User Registration Completed.')</script>";
                    $username = "";
                    $email = "";
                    $_POST['password'] = "";
                    $_POST['cpassword'] = "";
                } else {
                    // $msg = 'Something Wrong Went.';
                    // notificationcomponent($msg);
                    echo "<script>alert('Something Wrong Went.')</script>";
                }
            } else {
                // $msg = 'Email Already Exists.';
                // notificationcomponent($msg);
                echo "<script>alert('Email Already Exists.')</script>";
                $email = "";
            }
            
        } else {
            echo "<script>alert('Password Not Matched.')</script>";
            $_POST['password'] = "";
            $_POST['cpassword'] = "";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plant Nursery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="icon" href="../Images And Logos/PlantNursery Logo/favicon.png">
    <link rel="stylesheet" href="../CSS/SignupPage.css">
    <style>
          @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
        .alert{
        background: #d5eae4;
        padding: 20px 40px;
        min-width: 420px;
        position: absolute;
        right: 0;
        top: 10px;
        border-radius: 4px;
        border-left: 8px solid #077B8A;
        overflow: hidden;
        opacity: 0;
        pointer-events: none;
        }
        .alert.showAlert{
        opacity: 1;
        pointer-events: auto;
        }
        .alert.show{
        animation: show_slide 1s ease forwards;
        }
        @keyframes show_slide {
        0%{
            transform: translateX(100%);
        }
        40%{
            transform: translateX(-10%);
        }
        80%{
            transform: translateX(0%);
        }
        100%{
            transform: translateX(-10px);
        }
        }
        .alert.hide{
            animation: hide_slide 1s ease forwards;
        }
        @keyframes hide_slide {
        0%{
            transform: translateX(-10px);
        }
        40%{
            transform: translateX(0%);
        }
        80%{
            transform: translateX(-10%);
        }
        100%{
            transform: translateX(100%);
        }
        }
        .alert .fa-exclamation-circle{
        position: absolute;
        left: 20px;
        top: 50%;
        transform: translateY(-50%);
        color: #077B8A;
        font-size: 30px;
        }
        .alert .msg{
        font-family: 'poppins';
        font-style: normal;
        font-weight: 600;
        font-size: 18px;
        color: #077B8A;
        }
        .alert .close-btn{
        position: absolute;
        right: 0px;
        top: 50%;
        transform: translateY(-50%);
        background: #d5eae4;
        padding: 20px 18px;
        cursor: pointer;
        }
        .alert .close-btn:hover{
        background: #d5eae4;
        }
        .alert .close-btn .fas{
        color: #077B8A;
        font-size: 22px;
        line-height: 40px;
        }
        .wobble-ver-left {
            -webkit-animation: wobble-ver-left 0.8s both;
                    animation: wobble-ver-left 0.8s both;
            }
            @-webkit-keyframes wobble-ver-left {
            0%,
            100% {
                -webkit-transform: translateY(0) rotate(0);
                        transform: translateY(0) rotate(0);
                -webkit-transform-origin: 50% 50%;
                        transform-origin: 50% 50%;
            }
            15% {
                -webkit-transform: translateY(-30px) rotate(-6deg);
                        transform: translateY(-30px) rotate(-6deg);
            }
            30% {
                -webkit-transform: translateY(15px) rotate(6deg);
                        transform: translateY(15px) rotate(6deg);
            }
            45% {
                -webkit-transform: translateY(-15px) rotate(-3.6deg);
                        transform: translateY(-15px) rotate(-3.6deg);
            }
            60% {
                -webkit-transform: translateY(9px) rotate(2.4deg);
                        transform: translateY(9px) rotate(2.4deg);
            }
            75% {
                -webkit-transform: translateY(-6px) rotate(-1.2deg);
                        transform: translateY(-6px) rotate(-1.2deg);
            }
            }
            @keyframes wobble-ver-left {
            0%,
            100% {
                -webkit-transform: translateY(0) rotate(0);
                        transform: translateY(0) rotate(0);
                -webkit-transform-origin: 50% 50%;
                        transform-origin: 50% 50%;
            }
            15% {
                -webkit-transform: translateY(-30px) rotate(-6deg);
                        transform: translateY(-30px) rotate(-6deg);
            }
            30% {
                -webkit-transform: translateY(15px) rotate(6deg);
                        transform: translateY(15px) rotate(6deg);
            }
            45% {
                -webkit-transform: translateY(-15px) rotate(-3.6deg);
                        transform: translateY(-15px) rotate(-3.6deg);
            }
            60% {
                -webkit-transform: translateY(9px) rotate(2.4deg);
                        transform: translateY(9px) rotate(2.4deg);
            }
            75% {
                -webkit-transform: translateY(-6px) rotate(-1.2deg);
                        transform: translateY(-6px) rotate(-1.2deg);
            }
            }
      </style>
</head>
<body>
    <div class="signup-content">
        <div class="signup-left-content">
            <img src="../Images And Logos/BG Images/bg-plant6.jpg" alt="">
        </div>
        <div class="signup-right-content">
            <div class="logo-content">
                <div class="logo-leaf wobble-ver-left">
                    <img src="../Images And Logos/PlantNursery Logo/Logo.png" alt="">
                </div>
                <div class="logo-title">
                    <p>PLANT NURSERY</p>
                </div>
                <div class="logo-ellipse"></div>
            </div>
            <p class="registration-text">REGISTRATION</p>
            <div class="container">
                <div class="forms">
                    <div class="form signup">
                        <form action="" method="POST">
                            <div class="input-field">
                                <input type="text" placeholder="USERNAME" name="username"  required>
                                <i class="uil uil-user"></i>
                            </div>
                            <div class="input-field">
                                <input type="text" placeholder="EMAIL" name="email"  required>
                                <i class="uil uil-envelope icon"></i>
                            </div>
                            <div class="input-field">
                                <input type="password" class="password" placeholder="PASSWORD" name="password"  required>
                                <i class="uil uil-lock icon"></i>
                            </div>
                            <div class="input-field">
                                <input type="password" class="password" placeholder="CONFIRM PASSWORD" name="cpassword"  required>
                                <i class="uil uil-lock icon"></i>
                            </div>
                            <div class="input-field button">
                                <!-- <a href="SigninPage.php"> -->
                                    <!-- <input type="button" name="register" value="REGISTER NOW"> -->
                                    <button name="register" formnovalidate>REGISTER NOW</button>
                                <!-- </a> -->
                            </div>
                            
                        </form>
                        <div class="login-signup">
                            <span class="text">
                                Already a member? <a href="SigninPage.php" class="text login-link">Signin now</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
      <script>
        $('button').click(function(){
           $('.alert').addClass("show");
           $('.alert').removeClass("hide");
           $('.alert').addClass("showAlert");
           setTimeout(function(){
             $('.alert').removeClass("show");
             $('.alert').addClass("hide");
           },3000);
         });
         $('.close-btn').click(function(){
           $('.alert').removeClass("show");
           $('.alert').addClass("hide");
         });
      </script>
</body>
</html>