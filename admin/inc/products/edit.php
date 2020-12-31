<?php 
    include '../../../connect.php';
    include '../../../inc/App/function.php';

    if($_SERVER['REQUEST_METHOD'] == "POST"){
    $id  = $_POST['id'];
    $name = $_POST['name'];
    $unit = $_POST['unit'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];
    $decimal  = $_POST['decimal'];
    $Availability = $_POST['Availability'];
    $category = $_POST['category'];
    $subCat = $_POST['subCat']; 
    
    $stmt = $con->prepare("UPDATE products 
                                    SET 
                                name = ? ,
                                unite = ?,
                                price = ?,
                                discount = ?,
                                Decimal_number = ?,
                                Availability = ?,
                                category = ?,
                                subcategory = ? 
                                    WHERE id = ? ");
    $stmt->execute([$name,$unit,$price,$discount,$decimal,$Availability,$category,$subCat,$id]);
    if($stmt){
        echo successMessage('تم تعديل بيانات المنتج بنجاح');
    }
 }