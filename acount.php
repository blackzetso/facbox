<?php session_start();
      include 'connect.php'; 
      if(isset($_SESSION['id'])){
          $stmt = $con->prepare("SELECT * FROM users WHERE id = ?");
          $stmt->execute([$_SESSION['id']]);
          $row = $stmt->fetch();
      }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="./css/acount.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cairo&display=swap">
    <title>تواصل معى</title>
</head>
<body>
    <nav>
        <div class="title">
            <h4>ملف المستخدم</h4>
        </div>
        <div class="icon">
            <a href="./index.php"><i class="fas fa-chevron-left"></i></a>
        </div>
    </nav>
    
    <?php include 'inc/pages/nav.php' ?>
    
    <section class="forms">
        <form action="">
            <div class="item user">
                <input type="text" value="<?php if(isset($_SESSION['id'])){ echo $row['full_name']; } ?>" required> <label for="">الاسم كاملا</label>
            </div>
            <div class="item email">
                <input type="email" value="<?php if(isset($_SESSION['id'])){ echo $row['email']; } ?>" required> <label for="">البريد الالكتروني @</label>
            </div>
            <div class="item phone-number">
                <input type="text" value="<?php if(isset($_SESSION['id'])){ echo $row['phone_number']; } ?>" required> <label for="">رقم الموبيل</label>
            </div>
            <div class="btn-save">
                <input type="submit"  class="save" value="تغير">
                
                <input type="submit"  class="cncel" value="الغاء">
            </div>
        </form>
    </section>


    <script src="../js/all.min.js"></script>
</body>
</html>