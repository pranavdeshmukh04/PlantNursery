<?php
    include '../PHP/profileconfig.php';
    require_once('../PHP/component.php');
    session_start();
    
    if (!isset($_SESSION['username']) and !isset($_SESSION['email'])) {
        echo "<script>alert('Username session not set.')</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plant Nursery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="icon" href="../Images And Logos/PlantNursery Logo/favicon.png">
    <link rel="stylesheet" href="../CSS/ProfilePage.css">
    
    <style>
        .username-display{
            position: absolute;
            left: 220px;
            top: 118px;
            font-family: 'Arvo';
            font-style: normal;
            font-weight: 700;
            font-size: 20px;
            line-height: 37px;
            color: black;
        }
        .email-display{
            position: absolute;
            left: 160px;
            top: 168px;
            font-family: 'Arvo';
            font-style: normal;
            font-weight: 700;
            font-size: 20px;
            line-height: 37px;
            color: black;
        }
        .logout{
            position: absolute;
            left: 60px;
            top: 530px;
            font-family: 'Arvo';
            font-style: normal;
            font-weight: 700;
            font-size:24px;
            line-height: 37px;
            color: #077B8A;
            cursor: pointer;
        }
        .change-password-text{
            position: absolute;
            left: 58px;
            top: 285px;
            font-family: 'Arvo';
            font-style: normal;
            font-weight: 700;
            font-size: 28px;
            line-height: 37px;
            color: #077B8A;
        }
        .change-password{
            position: relative;
            top: -50px;
        }
        .oldpass-text{
            position: absolute;
            left: 60px;
            top: 340px;
            font-family: 'Arvo';
            font-style: normal;
            font-weight: 700;
            font-size: 22px;
            line-height: 37px;
            color: black;
        }
        .oldpass-input{
            position: absolute;
            left: 290px;
            top: 345px;
            width: 400px;
            height: 30px;
            border-radius: 15px;
            border-style: hidden;
            font-family: 'Arvo';
            font-style: normal;
            font-weight: 700;
            font-size: 13px;
            line-height: 37px;
            color: black;
        }

        .newpass-text{
            position: absolute;
            left: 60px;
            top: 400px;
            font-family: 'Arvo';
            font-style: normal;
            font-weight: 700;
            font-size: 22px;
            line-height: 37px;
            color: black;
        }
        .newpass-input{
            position: absolute;
            left: 290px;
            top: 405px;
            width: 400px;
            height: 30px;
            border-radius: 15px;
            border-style: hidden;
            font-family: 'Arvo';
            font-style: normal;
            font-weight: 700;
            font-size: 13px;
            line-height: 37px;
            color: black;
        }

        .cnewpass-text{
            position: absolute;
            left: 60px;
            top: 460px;
            font-family: 'Arvo';
            font-style: normal;
            font-weight: 700;
            font-size: 22px;
            line-height: 37px;
            color: black;
        }
        .cnewpass-input{
            position: absolute;
            left: 400px;
            top: 465px;
            width: 400px;
            height: 30px;
            border-radius: 15px;
            border-style: hidden;
            font-family: 'Arvo';
            font-style: normal;
            font-weight: 700;
            font-size: 13px;
            line-height: 37px;
            color: black;
        }
        .password-btn{
            position: absolute;
            left: 50px;
            top: 520px;
            color: white;
            background-color:  #e86069;
            border: none;
            border-radius: .3em;
            font-weight: bold;
            margin-left: 10px;
            padding: 10px 40px;
            font-family: 'Arvo';
            font-style: normal;
            font-size: 20px;
            cursor: pointer;
        }
        .password-btn:hover{
            background-color:  #D72631;
        }
        .count_ellipse{
            position: absolute;
            top: 30px;
            background: #077B8A;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            text-align: center;
            font-size: 16px;
            color: #d5eae4;
            text-align: center;
            background: #077B8A;
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 400;
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
    <div class="mainpage">
        <div class="upperbody-content" id="upperbody-section">
            <div class="upperbody-rectangle"></div>
            <div class="logo-content">
                <div class="logo-leaf wobble-ver-left">
                    <img src="../Images And Logos/PlantNursery Logo/Logo.png" alt="">
                </div>
                <div class="logo-title">
                    <a href="MainPage.php"><p>PLANT NURSERY</p></a>
                </div>
                <div class="logo-ellipse"></div>
            </div>
            <div class="header-content">
                <div class="upperbody-headline"></div>
                <div class="logo-cart">
                    <a href="CartPage.php">
                        <img src="../Images And Logos/PlantNursery Logo/Cart.png" alt="">
                        <?php
                            if (isset($_SESSION['cart'])){
                                $count = count($_SESSION['cart']);
                                echo "<div id=\"cart_count\" class=\"count_ellipse\">$count</div>";
                            }else{
                                echo "<div id=\"cart_count\" class=\"count_ellipse\">0</div>";
                            }
                        ?>
                    </a>
                </div>
                <div class="logo-profile">
                    <a href="ProfilePage.php"><img src="../Images And Logos/PlantNursery Logo/User Profile.png" alt=""></a>
                </div>
                <div class="header-texts">
                    <a href="ShopNowPage.php"><p class="header-plants">PLANTS</p></a>
                    <a href="ShopNowPage.php#potsnacc-section"><p class="header-pots">POTS AND ACC.</p></a>
                    <a href="MainPage.php#bestselling-section"><p class="header-bestselling">BEST SELLING</p></a>
                    <a href="MainPage.php#faq-section"><p class="header-faq">FAQ</p></a>
                    <a href="#contacts-section"><p class="header-contact">CONTACT</p></a>
                </div>
            </div>
        </div>
    </div>
    <div class="profile-content">
    
       <div class="profile-text">PROFILE</div> 
       <div class="profile-headline"></div>
       <div class="username-text">USERNAME : </div>
       <div class="username-display"><?php echo $_SESSION['username']; ?></div>
       <div class="email-text">EMAIL : </div>
       <div class="email-display"><?php echo $_SESSION['email']; ?></div>
       <!-- <div class="address-text">ADDRESS : </div>

       <div class="address" id="add">
           <div class="add-address-text">ADD ADDRESS : </div>
           <textarea type="text" class="address-input" name="address"></textarea>
           <button id="add-btn" name="address-btn" class="address-btn">ADD</button>
       </div> -->

       <div class="change-password">
           <div class="change-password-text">CHANGE PASSWORD</div>
           <div class="oldpassword">
                <div class="oldpass-text">OLD PASSWORD : </div>
                <input type="text" class="oldpass-input" name="oldpass">
           </div>
           <div class="newpassword">
                <div class="newpass-text">NEW PASSWORD : </div>
                <input type="text" class="newpass-input" name="newpass">
           </div>
           <div class="cnewpassword">
                <div class="cnewpass-text">CONFIRM NEW PASSWORD : </div>
                <input type="text" class="cnewpass-input" name="newpass">
           </div>
           <button name="password-btn" class="password-btn">UPDATE</button>
       </div>
       
       <a href="../PHP/logout.php"><div class="logout"><i class="fas fa-chevron-left d-arrow"></i> &nbsp;LOGOUT</div></a>
    </div>
    <div class="contacts-content" id="contacts-section">
        <div class="contacts-logo-content">
            <div class="contacts-logo-leaf">
                <img src="../Images And Logos/PlantNursery Logo/Logo.png" alt="">
            </div>
            <div class="contacts-logo-title">
                <a href="MainPage.php"><p>PLANT NURSERY</p></a>
            </div>
            <div class="contacts-logo-ellipse"></div>
        </div>
        <div class="contacts-contactus">
            <p class="contacts-contactus-text">CONTACT US</p>
            <p class="contacts-contactus-address-text">VIT-AP University, Amaravati, Andhra Pradesh - 522237 </p>
            <div class="contacts-contactus-address-icon">
                <img src="../Images And Logos/PlantNursery Logo/addressicon.png" alt="">
            </div>
            <p class="contacts-contactus-email-text">plantnursery@vitap.ac.in</p>
            <div class="contacts-contactus-email-icon">
                <img src="../Images And Logos/PlantNursery Logo/emailicon.png" alt="">
            </div>
            <div class="contacts-button-texts">
                <a href="#upperbody-section"><p class="contacts-button-home">HOME</p></a>
                <a href="ShopNowPage.php"><p class="contacts-button-plants">PLANTS</p></a>
                <a href="ShopNowPage.php#potsnacc-section"><p class="contacts-button-pots">POTS AND ACC.</p></a>
                <a href="MainPage.php#bestselling-section"><p class="contacts-button-bestselling">BEST SELLING</p></a>
                <a href="MainPage.php#faq-section"><p class="contacts-button-faq">FAQ</p></a>
            </div>
            <div class="contacts-ask">
                <p class="contacts-ask-text">ASK QUESTIONS</p>
                <input type="text" name="questions" class="contacts-ask-textbox" placeholder="   QUESTION">
                <button class="contacts-ask-button">
                    <p class="contacts-ask-button-text">SUBMIT</p>
                </button>
            </div>
        </div>
    </div>
</body>
</html>