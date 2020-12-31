<?php 
    
    function login_link(){
        if(isset($_SESSION['id'])){
            $link = '<li><a href="account.php"> الحساب </a> </li>';
        }else{
            $link = '<li><a href="login.php"> الدخول </a> </li>';
        } 
        return $link;
    }
    
    // Get User Data
    function user($id,$column){
        global $con;
        
        $stmt = $con->prepare("SELECT * FROM `users` WHERE id = '$id' ");
        $stmt->execute();
        $row = $stmt->fetch();
        
        return $row[$column];
    }

    // Get Row Count Function
    function getRowCount($table,$column,$value) {
        
        global $con;
        
        $stmt = $con->prepare("SELECT id FROM `$table` WHERE $column = '$value' ");
        $stmt->execute();
        $count = $stmt->rowCount();
        
        return $count;
    } 

    function getAllRowCount($table) {
        
        global $con;
        
        $stmt = $con->prepare("SELECT id FROM `$table`");
        $stmt->execute();
        $count = $stmt->rowCount();
        
        return $count;
    }
    // Get Row Count Function
    function getColumn($select,$table,$column,$value) {
        
        global $con;
        
        $stmt = $con->prepare("SELECT $select FROM `$table` WHERE $column = '$value' ");
        $stmt->execute();
        $row = $stmt->fetch();
        
        return $row[$select];
    }

    // Error Message Function
    function errorMessage($content){
        $msg = '<div class="alert alert-danger text-center" >'.$content.'</div>';
        return $msg;
    }
    
    // Success Message Function
    function successMessage($content){
        $msg = '<div class="alert alert-success text-center" >'.$content.'</div>';
        return $msg;
    }
    
    // Js Redirect To Url Finction 
    function redirect($url){
        echo "<script>document.location.href='".$url."'</script>";
    }
    // discount 
    function discount ($price,$discount){
        $result = $price - $discount;
        return $result;
    }

    //logout nav link 

    function account(){
        if(isset($_SESSION['id'])){
            $link = '<li><a href="logout.php"><i class="fas fa-sign-out-alt icon"></i></a></li>';
        } else {
            $link = '<li><a href="login.php"><i style="font-size: 28px;" class="fas fa-sign-in-alt"></i></a></li>';
        }
        
        return $link;
    }
    // Go to previos page
    function goBack(){
        if(isset($_SERVER['HTTP_REFERER'])){
            $url = $_SERVER['HTTP_REFERER'];
        }else{
            $url = '/';
        }
        return $url;
    }
    // badge
 