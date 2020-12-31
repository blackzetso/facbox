<?php 
    include '../../../connect.php';
    include '../../../inc/App/function.php';

    $name = $_POST['name'];
    $unit = $_POST['unit'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];
    $decimal  = $_POST['decimal'];
    $Availability = $_POST['Availability'];
    $category = $_POST['category'];
    $subCat = $_POST['subCat'];
    $short_desc = 'empty';
    $description = 'empty';

    $iname  =  $_FILES['img']['name'];
    $type   =  $_FILES['img']['type'];
    $tmp    =  $_FILES['img']['tmp_name'];
    $size   =  $_FILES['img']['size']; 

    $allowed =  array("jpg","jpeg","png","gif","webp"); 

    $explode  = explode('.',$iname);
    $filetype = strtolower(end($explode));

    $formError = array();

    if(!$iname){
      $formError[]  =  'يجب اضافة صورة';
    } 
    if(strlen($iname) > 1){ 
        if(!in_array($filetype,$allowed)){ 
          $formError[]  =  'انت تحاول رفع ملف غير مدعوم';  
        } 
    }
        if(empty($formError)){ 
            $multiimge = explode('.', $iname);
            $Extension = strtolower(end($multiimge));

            $neName   = rand(0,10000000) .'.' . $Extension;
            move_uploaded_file($tmp ,'../../../img/products/' . $neName);
            
            $stmt = $con->prepare("INSERT INTO `products` ( `name`, `img`, `description`, `short_desc`, `price`, `unite`, `Decimal_number`, `discount`,`Availability`, `category`, `subcategory`) 
                                                    VALUES 
                                                          (?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->execute([$name,$neName,$description,$short_desc,$price,$unit,$decimal,$discount,$Availability,$category,$subCat]);

        if($stmt){
            echo successMessage('تم إضافة منتج جديد');
        }
    }else{
        foreach($formError as $error){
            echo errorMessage($error);
        }
    }
     