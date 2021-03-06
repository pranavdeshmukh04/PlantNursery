<?php
    include '../PHP/profileconfig.php';
    require_once('../PHP/component.php');
    session_start();
    error_reporting(0);
    if(isset($_SESSION['username']) and isset($_SESSION['email'])) {
        header("Location: ProfilePage.php");
    }

    if(isset($_POST['login'])){
        $email = $_POST['email'];
	    $password = md5($_POST['password']);
        $sql = "SELECT * FROM profiletb WHERE EMAIL='$email' AND PASSWORD='$password'";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['USERNAME'];
            $_SESSION['email'] = $row['EMAIL'];
            header("Location: ProfilePage.php");
        } else {
            echo "<script>alert('Email or Password is Incorrect.')</script>";
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
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="icon" href="../Images And Logos/PlantNursery Logo/favicon.png">
    <link rel="stylesheet" href="../CSS/SigninPage.css">
    <style>
        .form .button button{
            border: none;
            color: #fff;
            font-size: 17px;
            font-family: 'Arvo';
            font-style: normal;
            font-weight: 500;
            letter-spacing: 1px;
            border-radius: 6px;
            background-color:#077B8A;
            cursor: pointer;
            transition: all 0.3s ease;
            position: absolute;
            left: 40px;
        }

        .button button:hover{
            background-color: #064b54;
        }
        .input-field button{
            position: absolute;
            height: 100%;
            width: 100%;
            padding: 0 35px;
            border: none;
            outline: none;
            font-size: 16px;
            font-family: 'Arvo';
            font-style: normal;
            border-bottom: 3px solid #ccc;
            border-top: 2px solid transparent;
            transition: all 0.2s ease;
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
    <div class="signin-content">
        <div class="signin-left-content">
            <img src="../Images And Logos/BG Images/bg-plant5.jpg" alt="">
        </div>
        <div class="signin-right-content">
            <div class="logo-content">
                <div class="logo-leaf wobble-ver-left">
                    <img src="../Images And Logos/PlantNursery Logo/Logo.png" alt="">
                </div>
                <div class="logo-title">
                    <p>PLANT NURSERY</p>
                </div>
                <div class="logo-ellipse"></div>
            </div>
            <p class="registration-text">LOGIN</p>
            <div class="container">
                <div class="forms">
                    <div class="form signin">
                        <form action="" method="POST">
                            <div class="input-field">
                                <input type="text" placeholder="EMAIL" name="email" value="<?php echo $email; ?>" required>
                                <i class="uil uil-envelope icon"></i>
                            </div>
                            <div class="input-field">
                                <input type="password" class="password" placeholder="PASSWORD" name="password" value="<?php echo $_POST['password']; ?>" required>
                                <i class="uil uil-lock icon"></i>
                            </div>
                            <div class="input-field button">
                                <!-- <a href="MainPage.php"> -->
                                    <!-- <input type="button" value="LOGIN NOW"> -->
                                    <button name="login" formnovalidate>LOGIN NOW</button>
                                <!-- </a> -->
                            </div>
                        </form>
                        <div class="login-signin">
                            <span class="text">
                                Not a member? <a href="SignupPage.php" class="text login-link">Signup now</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>