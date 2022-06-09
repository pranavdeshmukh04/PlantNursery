<?php
function plantcomponent($Item_Name, $Item_Price, $Item_Img, $Item_ID, $Bestselling, $Item_Type){
    $plant = "
        <div class=\"shop-item\">
            <form action=\"ShopNowPage.php\" method=\"post\">
                <img class=\"shop-item-image\" src=\"$Item_Img\" width=\"150\" height=\"200\" alt=\"\"><br>
                <span class=\"shop-item-title\">$Item_Name</span>
                <div class=\"shop-item-details\">
                    <span class=\"shop-item-price\">Rs. $Item_Price</span><br>
                    <button class=\"btn shop-item-button\" name=\"extra\" id=\"btn-add\">ADD TO CART</button>
                    <input type='hidden' name='plant_id' value='$Item_ID'>
                    <input type='hidden' name='bestselling' value='$Bestselling'>
                    <input type='hidden' value='$Item_Type'>
                </div>
            </form>
        </div>
    ";
    echo $plant;
}
function potsnacccomponent($Item_Name, $Item_Price, $Item_Img, $Item_ID, $Bestselling, $Item_Type){
    $plant = "
        <div class=\"shop-item\">
            <form action=\"ShopNowPage.php\" method=\"post\">
                <img class=\"shop-item-image\" src=\"$Item_Img\" width=\"160\" height=\"150\" alt=\"\"><br>
                <span class=\"shop-item-title\">$Item_Name</span>
                <div class=\"shop-item-details\">
                    <span class=\"shop-item-price\">Rs. $Item_Price</span><br>
                    <button class=\"btn shop-item-button\" name=\"extra\" id=\"btn-add\">ADD TO CART</button>
                    <input type='hidden' name='plant_id' value='$Item_ID'>
                    <input type='hidden' name='bestselling' value='$Bestselling'>
                    <input type='hidden' value='$Item_Type'>
                </div>
            </form>
        </div>
    ";
    echo $plant;
}


function bestsellingcomponent($Plant_Name, $Plant_Price, $Plant_Img, $Plant_ID, $Bestselling){
    $plant = "
        <div class=\"shop-item\">
            <form action=\"ShopNowPage.php\" method=\"post\">
                <img class=\"shop-item-image\" src=\"$Plant_Img\" width=\"150\" height=\"200\" alt=\"\"><br>
                <span class=\"shop-item-title\">$Plant_Name</span>
                <div class=\"shop-item-details\">
                    <span class=\"shop-item-price\">Rs. $Plant_Price</span><br>
                    <button class=\"btn shop-item-button\" name=\"extra\" id=\"btn-add\">ADD TO CART</button>
                    <input type='hidden' name='plant_id' value='$Plant_ID'>
                    <input type='hidden' name='bestselling' value='$Bestselling'>
                </div>
            </form>
        </div>
    ";
    echo $plant;
}

function cartcomponent($Plant_Img, $Plant_Name, $Plant_Price, $Plant_ID){
    $plant = "
        <form action=\"CartPage.php?action=remove&Item_ID=$Plant_ID\" method=\"post\">
            <div class=\"cart-row\">
                <div class=\"cart-item cart-column\">
                    <img src=\"$Plant_Img\" width=\"100\" height=\"130\"alt=\"\" class=\"cart-item-image\">
                    <span class=\"cart-item-title\">$Plant_Name</span>
                </div>
                <span class=\"cart-price cart-column\">Rs. $Plant_Price</span>
                <div class=\"cart-quantity cart-column\">
                    <button id=\"btn-remove\" class=\"btn btn-danger\" name=\"remove\">REMOVE</button>
                </div>
            </div>
        </form>
    ";
    echo $plant;
}
// <input class=\"cart-quantity-input\" type=\"number\" value=\"1\" name=\"quantityinput\">
function notificationcomponent($msg){
    $msg = "
        <div class=\"alert hide\">
            <span class=\"msg\">$msg</span>
            <div class=\"close-btn\">
                <span class=\"fas fa-times\"></span>
            </div>
        </div>
    ";
    echo $msg;
}
/*IGNORE*/
/*ALL PLANT COMPONENTS*/
// function component1($Plant_Name, $Plant_Price, $Plant_Img, $Plant_ID){
//     $plant = "
//     <form action=\"ShopNowPage.php\" method=\"post\">
//         <div class=\"shop-item plant1\">
//                 <img class=\"shop-item-image\" src=\"$Plant_Img\" width=\"150\" height=\"200\" alt=\"\"><br>
//                 <span class=\"shop-item-title\">$Plant_Name</span>
//                 <div class=\"shop-item-details\">
//                     <span class=\"shop-item-price\">Rs.  $Plant_Price</span><br>
//                     <button class=\"btn shop-item-button\" type=\"button\" name=\"add\">ADD TO CART</button>
//                     <input type='hidden' name='plant_id' value='$Plant_ID'>
//                 </div>
//         </div>
//     </form>
//     ";
//     echo $plant;
// }

// function component2($Plant_Name, $Plant_Price, $Plant_Img, $Plant_ID){
//     $plant = "
//         <div class=\"shop-item plant2\">
//             <form action=\"ShopNowPage.php\" method=\"post\">
//                 <img class=\"shop-item-image\" src=\"$Plant_Img\" width=\"150\" height=\"200\" alt=\"\"><br>
//                 <span class=\"shop-item-title\">$Plant_Name</span>
//                 <div class=\"shop-item-details\">
//                     <span class=\"shop-item-price\">Rs. $Plant_Price</span><br>
//                     <button class=\"btn shop-item-button\" type=\"button\" name=\"add\">ADD TO CART</button>
//                     <input type='hidden' name='plant_id' value='$Plant_ID'>
//                 </div>
//             </form>
//         </div>
//     ";
//     echo $plant;
// }
// function component3($Plant_Name, $Plant_Price, $Plant_Img, $Plant_ID){
//     $plant = "
//         <div class=\"shop-item plant3\">
//             <form action=\"ShopNowPage.php\" method=\"post\">
//                 <img class=\"shop-item-image\" src=\"$Plant_Img\" width=\"150\" height=\"200\" alt=\"\"><br>
//                 <span class=\"shop-item-title\">$Plant_Name</span>
//                 <div class=\"shop-item-details\">
//                     <span class=\"shop-item-price\">Rs. $Plant_Price</span><br>
//                     <button class=\"btn shop-item-button\" type=\"button\" name=\"add\">ADD TO CART</button>
//                     <input type='hidden' name='plant_id' value='$Plant_ID'>
//                 </div>
//             </form>
//         </div>
//     ";
//     echo $plant;
// }
// function component4($Plant_Name, $Plant_Price, $Plant_Img, $Plant_ID){
//     $plant = "
//     <div class=\"shop-item plant4\">
//                 <img class=\"shop-item-image\" src=\"$Plant_Img\" width=\"150\" height=\"200\" alt=\"\"><br>
//                 <span class=\"shop-item-title\">$Plant_Name</span>
//                 <div class=\"shop-item-details\">
//                     <span class=\"shop-item-price\">Rs. $Plant_Price</span><br>
//                     <button class=\"btn shop-item-button\" type=\"button\" name=\"add\">ADD TO CART</button>
//                     <input type='hidden' name='plant_id' value='$Plant_ID'>
//                 </div>
//             </div>
//     ";
//     echo $plant;
// }
// function component5($Plant_Name, $Plant_Price, $Plant_Img, $Plant_ID){
//     $plant = "
//         <div class=\"shop-item plant5\">
//             <form action=\"ShopNowPage.php\" method=\"post\">
//                 <img class=\"shop-item-image\" src=\"$Plant_Img\" width=\"150\" height=\"200\" alt=\"\"><br>
//                 <span class=\"shop-item-title\">$Plant_Name</span>
//                 <div class=\"shop-item-details\">
//                     <span class=\"shop-item-price\">Rs. $Plant_Price</span><br>
//                     <button class=\"btn shop-item-button\" type=\"button\" name=\"add\">ADD TO CART</button>
//                     <input type='hidden' name='plant_id' value='$Plant_ID'>
//                 </div>
//             </form>
//         </div>
//     ";
//     echo $plant;
// }
// function component6($Plant_Name, $Plant_Price, $Plant_Img, $Plant_ID){
//     $plant = "
//         <div class=\"shop-item plant6\">
//             <form action=\"ShopNowPage.php\" method=\"post\">           
//                 <img class=\"shop-item-image\" src=\"$Plant_Img\" width=\"150\" height=\"200\" alt=\"\"><br>
//                 <span class=\"shop-item-title\">$Plant_Name</span>
//                 <div class=\"shop-item-details\">
//                     <span class=\"shop-item-price\">Rs. $Plant_Price</span><br>
//                     <button class=\"btn shop-item-button\" type=\"button\" name=\"add\">ADD TO CART</button>
//                     <input type='hidden' name='plant_id' value='$Plant_ID'>
//                 </div>
//             </form>
//         </div>
//     ";
//     echo $plant;
// }
// function component7($Plant_Name, $Plant_Price, $Plant_Img, $Plant_ID){
//     $plant = "
//         <div class=\"shop-item plant7\">
//             <form action=\"ShopNowPage.php\" method=\"post\">
//                 <img class=\"shop-item-image\" src=\"$Plant_Img\" width=\"150\" height=\"200\" alt=\"\"><br>
//                 <span class=\"shop-item-title\">$Plant_Name</span>
//                 <div class=\"shop-item-details\">
//                     <span class=\"shop-item-price\">Rs. $Plant_Price</span><br>
//                     <button class=\"btn shop-item-button\" type=\"button\" name=\"add\">ADD TO CART</button>
//                     <input type='hidden' name='plant_id' value='$Plant_ID'>
//                 </div>
//             </form>
//         </div>
//     ";
//     echo $plant;
// }
// function component8($Plant_Name, $Plant_Price, $Plant_Img, $Plant_ID){
//     $plant = "
//         <div class=\"shop-item plant8\">
//             <form action=\"ShopNowPage.php\" method=\"post\">      
//                 <img class=\"shop-item-image\" src=\"$Plant_Img\" width=\"150\" height=\"200\" alt=\"\"><br>
//                 <span class=\"shop-item-title\">$Plant_Name</span>
//                 <div class=\"shop-item-details\">
//                     <span class=\"shop-item-price\">Rs. $Plant_Price</span><br>
//                     <button class=\"btn shop-item-button\" type=\"button\" name=\"add\">ADD TO CART</button>
//                     <input type='hidden' name='plant_id' value='$Plant_ID'>
//                 </div>
//             </form>
//         </div>
//     ";
//     echo $plant;
// }
// function component9($Plant_Name, $Plant_Price, $Plant_Img, $Plant_ID){
//     $plant = "
//         <div class=\"shop-item plant9\">
//             <form action=\"ShopNowPage.php\" method=\"post\">
//                 <img class=\"shop-item-image\" src=\"$Plant_Img\" width=\"150\" height=\"200\" alt=\"\"><br>
//                 <span class=\"shop-item-title\">$Plant_Name</span>
//                 <div class=\"shop-item-details\">
//                     <span class=\"shop-item-price\">Rs. $Plant_Price</span><br>
//                     <button class=\"btn shop-item-button\" type=\"button\" name=\"add\">ADD TO CART</button>
//                     <input type='hidden' name='plant_id' value='$Plant_ID'>
//                 </div>
//             </form>
//         </div>
//     ";
//     echo $plant;
// }
// function component10($Plant_Name, $Plant_Price, $Plant_Img, $Plant_ID){
//     $plant = "
//         <div class=\"shop-item plant10\">
//             <form action=\"ShopNowPage.php\" method=\"post\">
//                 <img class=\"shop-item-image\" src=\"$Plant_Img\" width=\"150\" height=\"200\" alt=\"\"><br>
//                 <span class=\"shop-item-title\">$Plant_Name</span>
//                 <div class=\"shop-item-details\">
//                     <span class=\"shop-item-price\">Rs. $Plant_Price</span><br>
//                     <button class=\"btn shop-item-button\" type=\"button\" name=\"add\">ADD TO CART</button>
//                     <input type='hidden' name='plant_id' value='$Plant_ID'>
//                 </div>
//             </form>
//         </div>
//     ";
//     echo $plant;
// }
// function component11($Plant_Name, $Plant_Price, $Plant_Img, $Plant_ID){
//     $plant = "
//         <div class=\"shop-item plant11\">
//             <form action=\"ShopNowPage.php\" method=\"post\">
//                 <img class=\"shop-item-image\" src=\"$Plant_Img\" width=\"150\" height=\"200\" alt=\"\"><br>
//                 <span class=\"shop-item-title\">$Plant_Name</span>
//                 <div class=\"shop-item-details\">
//                     <span class=\"shop-item-price\">Rs. $Plant_Price</span><br>
//                     <button class=\"btn shop-item-button\" type=\"button\" name=\"add\">ADD TO CART</button>
//                     <input type='hidden' name='plant_id' value='$Plant_ID'>
//                 </div>
//             </form>
//         </div>
//     ";
//     echo $plant;
// }
// function component12($Plant_Name, $Plant_Price, $Plant_Img, $Plant_ID){
//     $plant = "
//         <div class=\"shop-item plant12\">
//             <form action=\"ShopNowPage.php\" method=\"post\">
//                 <img class=\"shop-item-image\" src=\"$Plant_Img\" width=\"150\" height=\"200\" alt=\"\"><br>
//                 <span class=\"shop-item-title\">$Plant_Name</span>
//                 <div class=\"shop-item-details\">
//                     <span class=\"shop-item-price\">Rs. $Plant_Price</span><br>
//                     <button class=\"btn shop-item-button\" type=\"button\" name=\"add\">ADD TO CART</button>
//                     <input type='hidden' name='plant_id' value='$Plant_ID'>
//                 </div>
//             </form>
//         </div>
//     ";
//     echo $plant;
// }
// ?>