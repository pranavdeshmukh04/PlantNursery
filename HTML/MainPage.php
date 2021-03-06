<?php 
    session_start();
    require_once('../PHP/createDB.php');
    require_once('../PHP/component.php');
    $database = new createDB("Plantdb", "Planttb");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plant Nursery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="../CSS/MainPage.css">
    <link rel="icon" href="../Images And Logos/PlantNursery Logo/favicon.png">
    <style>
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
        .shopnow-container-content{
            position: absolute;
            left: 340px;
            top: 40px;
            width: 1150px;
            height: 360px;
        }
        div.shop-items{
            display: grid;
            width: 50vw;
            height: 50vh;
            grid-template-columns: repeat(4, 1fr);
            grid-template-rows: repeat(4, 1fr);
            width: 120px;
            height: 120px;
            grid-gap: 10px;
        }
        .shop-item{
            width: 280px;
            height: 320px;
            background-color: #ffcdcf;
            border-radius: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            font-family: 'Arvo';
            font-style: normal;
            font-weight: 700;
            font-size: 17px;
            line-height: 25px;
            color: #000000;
        }
        .shop-item-price{
            color: #077B8A;
        }
        .shop-item:hover{
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.25);
            transition: all 0.6s ease;
            transform: translateY(-15px);
        }
        .shop-item-button{
            color: white;
            background-color:  #e86069;
            border: none;
            border-radius: .3em;
            font-weight: bold;
            margin-left: 10px;
            padding: 10px 40px;
            font-family: 'Arvo';
            font-style: normal;
            font-size: 15px;
            cursor: pointer;
        }
        .shop-item-button:hover{
            background-color:  #D72631;
        }
        .upperbody-shop-button{
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.5);
        }
        .upperbody-takingcare-button{
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.5);
        }
        .shop-button:hover{
            transition: all 0.6s ease;
            transform: translateY(-15px);
        }
        .takingcare-button:hover{
            transition: all 0.6s ease;
            transform: translateY(-15px);
        }

        .jello-horizontal:hover {
            -webkit-animation: jello-horizontal 0.9s both;
                    animation: jello-horizontal 0.9s both;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.5);
        }
        @-webkit-keyframes jello-horizontal {
            0% {
                -webkit-transform: scale3d(1, 1, 1);
                        transform: scale3d(1, 1, 1);
            }
            30% {
                -webkit-transform: scale3d(1.25, 0.75, 1);
                        transform: scale3d(1.25, 0.75, 1);
            }
            40% {
                -webkit-transform: scale3d(0.75, 1.25, 1);
                        transform: scale3d(0.75, 1.25, 1);
            }
            50% {
                -webkit-transform: scale3d(1.15, 0.85, 1);
                        transform: scale3d(1.15, 0.85, 1);
            }
            65% {
                -webkit-transform: scale3d(0.95, 1.05, 1);
                        transform: scale3d(0.95, 1.05, 1);
            }
            75% {
                -webkit-transform: scale3d(1.05, 0.95, 1);
                        transform: scale3d(1.05, 0.95, 1);
            }
            100% {
                -webkit-transform: scale3d(1, 1, 1);
                        transform: scale3d(1, 1, 1);
            }
            }
            @keyframes jello-horizontal {
            0% {
                -webkit-transform: scale3d(1, 1, 1);
                        transform: scale3d(1, 1, 1);
            }
            30% {
                -webkit-transform: scale3d(1.25, 0.75, 1);
                        transform: scale3d(1.25, 0.75, 1);
            }
            40% {
                -webkit-transform: scale3d(0.75, 1.25, 1);
                        transform: scale3d(0.75, 1.25, 1);
            }
            50% {
                -webkit-transform: scale3d(1.15, 0.85, 1);
                        transform: scale3d(1.15, 0.85, 1);
            }
            65% {
                -webkit-transform: scale3d(0.95, 1.05, 1);
                        transform: scale3d(0.95, 1.05, 1);
            }
            75% {
                -webkit-transform: scale3d(1.05, 0.95, 1);
                        transform: scale3d(1.05, 0.95, 1);
            }
            100% {
                -webkit-transform: scale3d(1, 1, 1);
                        transform: scale3d(1, 1, 1);
            }
            }
            .tilt-in-fwd-tr {
                -webkit-animation: tilt-in-fwd-tr 0.6s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
                        animation: tilt-in-fwd-tr 0.6s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
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

            .believe-tomorrow{
                color:#0000;
                background:
                    linear-gradient(-90deg,#077B8A 5px,#0000 0)       10px 0,
                    linear-gradient(black 0 0) 0 0;
                background-size:calc(var(--n)*1ch) 200%;
                -webkit-background-clip:padding-box,text;
                background-clip:padding-box,text;
                background-repeat:no-repeat;
                animation: 
                b .7s infinite steps(1),   
                t calc(var(--n)*.2s) steps(var(--n)) forwards;
            }

            @keyframes t{
                from {background-size:0 200%}
            }
            @keyframes b{
                50% {background-position:0 -100%,0 0}
            }
            .color-change-2x {
                -webkit-animation: color-change-2x 2s linear infinite alternate both;
                        animation: color-change-2x 2s linear infinite alternate both;
            }

            @-webkit-keyframes color-change-2x {
                0% {
                    background: #A2D5C6;
                }
                100% {
                    background: #077B8A;
                }
                }
                @keyframes color-change-2x {
                0% {
                    background: #A2D5C6;
                }
                100% {
                    background: #077B8A;
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
                    <a href="#bestselling-section"><p class="header-bestselling">BEST SELLING</p></a>
                    <a href="#faq-section"><p class="header-faq">FAQ</p></a>
                    <a href="#contacts-section"><p class="header-contact">CONTACT</p></a>
                </div>
            </div>
            <div class="upperbody-texts">
                <p class="home-garden">CREATE YOUR OWN HOME GARDEN</p>
                <p class="believe-tomorrow" style="--n:53">TO PLANT A GARDEN IS TO BELIEVE IN TOMORROW</p>
            </div>
            <div class="upperbody-plant-ellipse color-change-2x"></div>
            <img src="../Images And Logos/Plants/plant-2.png" alt="" class="plant-img">
            <div class="upperbody-sunlight jello-horizontal ">
                <p class="upperbody-sunlight-text1">SUNLIGHT</p>
                <p class="upperbody-sunlight-text2">4 to 5 hours</p>
                <img src="../Images And Logos/PlantNursery Logo/Sunlight.png" alt="" class="sunlight-logo">
            </div>
            <div class="upperbody-humidity jello-horizontal">
                <p class="upperbody-humidity-text1">HUMIDITY</p>
                <p class="upperbody-humidity-text2">86%</p>
                <img src="../Images And Logos/PlantNursery Logo/humidity.png" alt="" class="humidity-logo">
            </div>
            <div class="upperbody-watering jello-horizontal">
                <p class="upperbody-watering-text1">WATERING</p>
                <p class="upperbody-watering-text2">1 in 7 days</p>
                <img src="../Images And Logos/PlantNursery Logo/raindrop.png" alt="" class="raindrop-logo">
            </div>
            <div class="upperbody-buttons">
                <div class="shop-button">
                    <a href="ShopNowPage.php"><p class="upperbody-shop-text">SHOP NOW</p></a>
                    <a href="ShopNowPage.php"><button class="upperbody-shop-button" onclick=""></button></a>
                    <img src="../Images And Logos/PlantNursery Logo/shopbutton.png" alt="" class="upperbody-shop-icon">
                </div>
                
                <div class="takingcare-button">
                    <a href="ShopNowPage.php"><p class="upperbody-takingcare-text">TAKING CARE</p></a>
                    <a href="ShopNowPage.php#potsnacc-section"><button class="upperbody-takingcare-button"></button></a>
                    <img src="../Images And Logos/PlantNursery Logo/takingcarebutton.png" alt="" class="upperbody-takingcare-icon">
                </div>
                
            </div>
        </div>
        <div class="bestselling-content" id="bestselling-section">
            <p class="bestselling-text1">BEST SELLING</p>
            <p class="bestselling-text2">Discover the best selling plants</p>
            <div class="bestselling-headline"></div>
            <a href="ShopNowPage.php"></a>
            <div class="shopnow-container-content">
                <div class="shop-items">
                    <?php
                        $result = $database -> getData();
                        while($row = mysqli_fetch_assoc($result)){
                            if($row['Bestselling'] == 'Yes'){
                                plantcomponent($row['Item_Name'], $row['Item_Price'], $row['Item_Img'], $row['Item_ID'], $row['Bestselling'], $row['Item_Type']);
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="faq-content" id="faq-section">
            <div class="faq-header">
                <p class="faq-text">FREQUENTLY ASKED QUESTIONS</p>
            </div>
            <div class="faq-container">
                <div class="faq-container-question">
                    <button id="faq-button">
                        <span>When will I receive my order?</span>
                        <i class="fas fa-chevron-down d-arrow"></i>
                    </button>
                    <p>Generally, your order will be dispatched within 5 to 7 working days after your transaction has been confirmed. 
                        However, depending on the product the dispatch time may vary.
                        You will also be notified via email when the product(s) are shipped to you.</p>
                </div>
                <div class="faq-container-question">
                    <button id="faq-button">
                        <span>How can I make a change in my order or cancel it?</span>
                        <i class="fas fa-chevron-down d-arrow"></i>
                    </button>
                    <p>Order modification/cancellation in a domestic order, please give at least 24 hours notice before the requested delivery date. 
                        If your order has already been shipped or delivered, we won't be able to cancel it or make changes.If you need to make changes 
                        or cancel your order, email us at plantnursery@gmail.com</p>
                </div>
                <div class="faq-container-question">
                    <button id="faq-button">
                        <span>What is Return Policy?</span>
                        <i class="fas fa-chevron-down d-arrow"></i>
                    </button>
                    <p>No returns are allowed. However, in case if a wrong or a defective product has been sent, do let us know at the earliest.
                       You can write to us at plantnursery@gmail.com</p>
                </div>
                
            </div>  
            <img src="../Images And Logos/BG Images/faq-img2.png" alt="" class="faq-img1">
            <img src="../Images And Logos/BG Images/faq-img3.png" alt="" class="faq-img2">
            
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
                    <a href="#bestselling-section"><p class="contacts-button-bestselling">BEST SELLING</p></a>
                    <a href="#faq-section"><p class="contacts-button-faq">FAQ</p></a>
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
    </div>
    <script src="../Javascript/script.js"></script>
</body>
</html>