<?php
    session_start();
    require_once('../PHP/createDB.php');
    require_once('../PHP/component.php');
    $database = new createDB("Plantdb", "Planttb");

    if(isset($_POST['extra'])){
        // print_r($_POST['plant_id']);
        if(isset($_SESSION['cart'])){
            $item_array_id = array_column($_SESSION['cart'],"plant_id");
            if(in_array($_POST['plant_id'], $item_array_id)){
                $_SESSION['msg'] = 'Product is already added in the cart';
                $_SESSION['code'] = 'warning';
                // echo "<script>alert('Product is already added in the cart')</script>";
                echo "<script>window.location = 'ShopNowPage.php'</script>";
            } else{
                $count = count($_SESSION['cart']);
                $item_array = array(
                    'plant_id' => $_POST['plant_id'],
                    'quantity' => 1
                );
                $_SESSION['cart'][$count] = $item_array;
                $_SESSION['msg'] = 'Product added in the cart';
                $_SESSION['code'] = 'success';
                // echo "<script>alert('Product added in the cart')</script>";
            }
        } else{
            $item_array = array(
                'plant_id' => $_POST['plant_id'],
                'quantity' => 1
            );

            $_SESSION['cart'][0] = $item_array;
            $_SESSION['msg'] = 'Product added in the cart';
            $_SESSION['code'] = 'success';
            // echo "<script>alert('Product added in the cart')</script>";
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
    <link rel="stylesheet" href="../CSS/ShowNowPage.css">
    <link rel="icon" href="../Images And Logos/PlantNursery Logo/favicon.png">
    <script src="../Javascript/shoppingcart.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
        .potsnacc-container{
            position: absolute;
            top: 120px;
            left: 90px;
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
            .swal-overlay{
                background-color: rgb(213, 234, 228, 0.7);
            }
            .swal-title, .swal-text{
                font-family: "Arvo";
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
                    <a href="ProfilePage.php">
                        <img src="../Images And Logos/PlantNursery Logo/User Profile.png" alt="">
                        
                    </a>
                </div>
                <div class="header-texts">
                    <a href="ShopNowPage.php"><p class="header-plants">PLANTS</p></a>
                    <a href="#potsnacc-section"><p class="header-pots">POTS AND ACC.</p></a>
                    <a href="MainPage.php#bestselling-section" href=""><p class="header-bestselling">BEST SELLING</p></a>
                    <a href="MainPage.php#faq-section"><p class="header-faq">FAQ</p></a>
                    <a href="#contacts-section"><p class="header-contact">CONTACT</p></a>
                </div>
            </div>
        <div class="shopnow-container-content">
          <div class="shop-items">
                <?php
                        $result = $database -> getData();
                        while($row = mysqli_fetch_assoc($result)){
                            if($row['Item_Type'] == 'Plant'){
                                plantcomponent($row['Item_Name'], $row['Item_Price'], $row['Item_Img'], $row['Item_ID'], $row['Bestselling'], $row['Item_Type']);
                            }
                        }
                ?>
          </div>
        </div>        
        </div>
        <div class="potsnacc-container-content" id="potsnacc-section">
          <p class="potsnacc-text">POTS AND ACCESSORIES</p>
          <div class="potsnacc-headline"></div>
          <div class="potsnacc-container">
            <div class="shop-items">
                <?php
                    $result = $database -> getData();
                        while($row = mysqli_fetch_assoc($result)){
                            if($row['Item_Type'] == 'Pot' || $row['Item_Type'] == 'Acc'){
                                potsnacccomponent($row['Item_Name'], $row['Item_Price'], $row['Item_Img'], $row['Item_ID'], $row['Bestselling'], $row['Item_Type']);
                            }
                    }
                ?>
            </div>
          </div>
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
                    <a href="MainPage.php#bestselling-section"><p class="contacts-button-potsnacc">BEST SELLING</p></a>
                    <a href="MainPage.php#faq-section"><p class="contacts-button-faq">FAQ</p></a>
                </div>
                <div class="contacts-ask">
                    <p class="contacts-ask-text">ASK QUESTIONS</p>
                    <input type="text" name="questions" class="contacts-ask-textbox" placeholder="   QUESTION">
                    <button class="contacts-ask-button">
                        <p class="contacts-ask-button-text">SUBMIT</p>
                    </button>
                </div>
                <?php
                    if(isset($_SESSION['msg']) && $_SESSION['msg'] != '' && !empty($_SESSION['cart'])){
                        ?>
                        <script>
                            swal({
                                    title: "<?php echo $_SESSION['msg']; ?>",
                                    icon: '<?php echo $_SESSION['code'];?>',
                                });
                            </script>
                        <?php
                    }
                ?>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        
        <!-- <script>
            setTimeout(function(){
                $('#btn-add').on('click', function(){
                    Swal.fire({
                        title: 'Product added to the cart!',
                        type: 'success',
                    })   
                })
            }, 5000);
        
        </script> -->
</body>
</html>