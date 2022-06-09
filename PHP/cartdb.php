<?php
    $server1 = "localhost";
    $username1 = "root";
    $password1 = "";
    $dbname1 = "plantdb";

    $conn = mysqli_connect($server1, $username1, $password1, $dbname1);

    if(isset($_POST['checkout']) && !empty($_SESSION['cart'])){
        if(isset($_SESSION['itemdata']) && !empty($_SESSION['delivery']) && !empty($_SESSION['total'])){
            $name = $_SESSION['username'];
            $email1 = $_SESSION['email'];
            $itemid = $_SESSION['itemdata'];
            $price1 = $_SESSION['total'];
            $delivery1 = $_SESSION['delivery'];

            $sql1 = "insert into carttb(username,email,item_id,delivery,total_price) values('$name', '$email1', '$itemid', '$delivery1', '$price1')";

            $run = mysqli_query($conn, $sql1) or die("error in connection");
            if($run){
                echo "Values inserted successfully in the database";
            } else{
                echo "Values not inserted in the database";
            }
        }
    }
?>