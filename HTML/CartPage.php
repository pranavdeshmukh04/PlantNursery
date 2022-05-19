<?php
        session_start();

        require_once('../PHP/createDB.php');
        require_once('../PHP/component.php');
        require_once('../PHP/cartdb.php');
        $database = new createDB("Plantdb", "Planttb");

        if (isset($_POST['remove']) && !empty($_SESSION['cart'])){
            if ($_GET['action'] == 'remove'){
                foreach ($_SESSION['cart'] as $key => $value){
                    if($value["plant_id"] == $_GET['Item_ID']){
                        unset($_SESSION['cart'][$key]);
                        $_SESSION['msg1'] = "Product removed from the cart";
                        // echo "<script>
                        //         alert('Product removed from the cart');
                        //         </script>";
                        // echo "<script>
                        //             swal({
                        //                 title: 'Cart is empty',
                        //                 text: 'Please add items in the cart!';
                        //                 icon: 'success',
                        //             });
                        //     </script>";
                        echo "<script>window.location = 'CartPage.php'</script>";
                    }
                }
            }
        }
        if(isset($_POST['checkout']) && !empty($_SESSION['cart'])){
            $_SESSION['item'] = $_SESSION['cart'];
            $items = array_column($_SESSION['item'], 'plant_id');
            if(isset($_SESSION['item'])){
                $item_data = "";
                foreach($items as $key => $value){
                    $item_data = $item_data." ".$items[$key];
                }    
            }

            $_SESSION['itemdata'] = $item_data;
            
            foreach ($_SESSION['cart'] as $key => $value){
                $_SESSION['msg2'] = "Thankyou for shopping!";
                unset($_SESSION['cart'][$key]);
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="icon" href="../Images And Logos/PlantNursery Logo/favicon.png">
    <link rel="stylesheet" href="../CSS/CartPage.css">
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
        .cart-header{
            color: #077B8A;
        }
        .cart-column {
            display: flex;
            align-items: center;
            border-bottom: 2px solid rgba(7, 123, 138, 0.4);
            margin-right: 1.5em;
            padding-bottom: 10px;
            padding-right: 50px;
            margin-top: 10px;

        }
        .cart-row {
            display: flex;
        }

        .cart-item {
            width: 40%;
        }

        .cart-price {
            width: 20%;
        }

        .cart-quantity {
            width: 40%;
        }
        .empty-cart{
            display: flex;
            justify-content: center;
            text-align: center;
            margin-top: 20px;
        }
        .btn-delivery{
            position: absolute;
            left: 300px;
            top: 15px; 
            color: white;
            background-color:  #e86069;
            border: none;
            border-radius: .3em;
            font-weight: bold;
            padding: 10px 20px;
            font-family: 'Arvo';
            font-style: normal;
            font-size: 15px;
            cursor: pointer;
        }
        .btn-delivery:hover {
            background-color:  #D72631;
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
                            $count = 0;
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
    <div class="cart-content">
        <div class="cart-content-left">
            <p class="shoppingcart-text">SHOPPING CART</p>
                <?php
                    $count = 0;
                    if (isset($_SESSION['cart'])){
                         $count = count($_SESSION['cart']);
                        echo "<div id=\"cart_count\" ><p class=\"no-of-items-text\">$count Items</p></div>";
                    }else{
                        echo "<div id=\"cart_count\" ><p class=\"no-of-items-text\">0 Items</p></div>";
                    }
                ?>
            <div class="shoppingcart-headline"></div>
            <div class="cart-container">
                <div class="cart-row">
                    <span class="cart-item cart-header cart-column">PLANT</span>
                    <span class="cart-price cart-header cart-column">PRICE</span>
                    <span class="cart-quantity cart-header cart-column">REMOVE</span>
                </div>
                <div class="cart-items">
                    <?php
                        $amount = 0;
                        $total_cost = 0;
                        if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
                            $plant_id = array_column($_SESSION['cart'], 'plant_id');
                            $result = $database -> getData();

                            while($row = mysqli_fetch_assoc($result)){
                                foreach($plant_id as $id){
                                    if($row['Item_ID'] == $id){
                                        cartcomponent($row['Item_Img'], $row['Item_Name'], $row['Item_Price'], $row['Item_ID']);
                                        $amount = $amount + (int)$row['Item_Price'];
                                    }
                                }
                            }
                        } else{
                            echo "<div class=\"empty-cart\">CART IS EMPTY</div>";
                        }
                        
                    ?>
                </div>
            </div>
        </div>
        <div class="cart-content-right">
            <p class="ordersummary-text">ORDER SUMMARY</p>
            <div class="ordersummary-headline1"></div>
                <?php
                    $count = 0;
                    if (isset($_SESSION['cart'])){
                         $count = count($_SESSION['cart']);
                        echo "<div id=\"cart_count\" ><span class=\"item-no-text\">ITEMS $count</span></div>";
                    }else{
                        echo "<div id=\"cart_count\" ><span class=\"item-no-text\">ITEMS 0</span></div>";
                    }
                ?>
            <div class="cart-total">
                <span class="cart-total-price"><?php echo "Rs. ".$amount?></span>
            </div>
            <div class="shipping-content">
                <span class="shipping-text">SHIPPING</span>
                <div class="shipping-radiobtn">
                    <form id="delivery" method="post">
                        <input type="radio" name="del" id="standard" class="radiobtn-input" value="200"> &nbsp; Standard Delivery : Rs.200
                        <br>
                        <input type="radio" name="del" id="fast" class="radiobtn-input" value="350"> &nbsp; Fast Delivery : Rs.350
                        <input type="submit" value="SELECT" class="btn-delivery">
                    </form>
                </div>
                <?php
                    $standardDelivery = 0;
                    $fastDelivery = 0;
                    if(isset($_POST['del'])){ 
                        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
                            if($_POST['del'] == '200'){
                                echo "<script>
                                    swal({
                                        title: 'Standard Delivery Selected!',
                                        icon: 'success',
                                    });
                                </script>";
                                $_SESSION['delivery'] = "Standard";
                                $total_cost = 200;
                            } else if($_POST['del'] == '350'){
                                echo "<script>
                                    swal({
                                        title: 'Fast Delivery Selected!',
                                        icon: 'success',
                                    });
                                </script>";
                                $_SESSION['delivery'] = "Fast";
                                $total_cost = 350;  
                            }
                        }
                        else{
                            echo "<script>
                                    swal({
                                        title: 'Cart is Empty',
                                        text: 'Please add items in the cart',
                                        icon: 'warning',
                                    });
                                </script>";
                        }
                    }
                ?>  
            </div>
            <div class="promocode-content">
                <span class="promocode-text">PROMOCODE</span>
                
                <form action="" method="POST">
                    <input type="text" name="promocodeinput" id="" placeholder="ENTER CODE HERE" class="promocode-box">
                    <button class="btn-promocode" name="promocode">APPLY</button>
                </form>
            </div>
            <?php
                if(isset($_POST['promocode'])){
                    if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
                        $promocode = $_POST['promocodeinput'];
                        if(!empty($promocode)){
                            echo "<script>
                                    swal({
                                       title: '$promocode',
                                       text: 'Promocode succesfully added!',
                                        icon: 'success',
                                    });
                                </script>";
                        }else{
                            echo "<script>
                                    swal({
                                        title: 'Input box is Empty',
                                        text: 'Please enter the promocode',
                                        icon: 'warning',
                                    });
                                </script>";
                        }
                    } else{
                        echo "<script>
                                    swal({
                                        title: 'Cart is Empty',
                                        text: 'Please add items in the cart',
                                        icon: 'warning',
                                    });
                                </script>";
                    }
                }
            ?>
            <div class="ordersummary-headline2"></div>
            <span class="total-cost-text">TOTAL COST</span>
            <div class="total-cost">
                <span class="total-cost-price">
                    <?php
                        if($amount == 0){
                            $total_cost = 0;
                        } else{
                            $total_cost = $total_cost + $amount;
                        }
                        $_SESSION['total'] = $total_cost;
                        echo "Rs. ".$total_cost;
                    ?>
                </span>
            </div>
            <form action="" method="POST">
                <button class="btn-checkout" name="checkout">CHECKOUT</button>
            </form>
            <?php
                if(isset($_POST['checkout'])){
                    if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
                        echo "<script>
                                    swal({
                                        title: 'Thankyou for shopping!',
                                        icon: 'success',
                                    });
                                </script>";
                    } else{
                        echo "<script>
                                    swal({
                                        title: 'Cart is Empty',
                                        text: 'Please add items in the cart',
                                        icon: 'warning',
                                    });
                                </script>";
                    }
                }
            ?>
            <div class="continue-shopping">
                <a href="ShopNowPage.php"><p class="continue-shopping-text"><i class="fas fa-chevron-left d-arrow"></i> &nbsp; Continue Shopping</p></a>
            </div>
        </div>
                <?php
                    if(isset($_SESSION['msg1']) && $_SESSION['msg1'] != '' && !empty($_SESSION['cart'])){
                        if(isset($_POST['remove'])){
                            ?>
                                <script>
                                    swal({
                                            title: "<?php echo $_SESSION['msg1']; ?>",
                                            icon: 'warning',
                                        });
                                </script>
                            <?php
                        }
                    }
                    if(isset($_POST['checkout'])){
                        if(isset($_SESSION['msg2']) && $_SESSION['msg2'] != ''){
                            ?>
                            <script>
                                swal({
                                        title: "<?php echo $_SESSION['msg2']; ?>",
                                        icon: 'success',
                                    });
                            </script>
                            <?php
                        }
                    }
                ?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <!-- <script>
        $('#btn-remove').on('click', function(){
             Swal.fire({
                title: 'Product removed from the cart!',
                type: 'warning',
             })   
        })
    </script> -->
</body>
</html>