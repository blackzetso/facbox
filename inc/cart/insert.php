<?php 
    session_start();
    include '../../connect.php'; 

    $user = $_SESSION['id'];
    $product = $_POST['id'];
    $name  = $_POST['name'];
    $price = $_POST['price'];
    $qty   = $_POST['qty'];
    $total = $price * $qty;
    
    $stmt = $con->prepare("SELECT id FROM cart WHERE user = ? AND product = ?");
    $stmt->execute([$user,$product]); 
    $Count = $stmt->rowCount();

    if($Count > 0){
        $stmt = $con->prepare("UPDATE cart SET price = ? , qty = ? , total = ? WHERE user = ? AND product = ? ");
        $stmt->execute([$price,$qty,$total,$user,$product]);
    }else{
        $stmt = $con->prepare("INSERT INTO `cart` ( `product`,`name`, `price`, `qty`, `total`, `user`) VALUES (?,?,?,?,?,?)");
        $stmt->execute([$product,$name,$price,$qty,$total,$user]); 
    }

    echo $Count;