<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/order.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cairo&display=swap">
    <title>طلباتي</title>
</head>
<body>
    <nav>
        <div class="title">
            <h4>طلباتي</h4>
        </div>
        <div class="icon">
            <a href="index.php"><i class="fas fa-chevron-left"></i></a>
        </div>
    </nav>
    <?php 
        session_start();
        include 'connect.php';
        include 'inc/pages/nav.php';
        $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;
        $stmt = $con->prepare("SELECT * FROM order_items WHERE order_id = ? ORDER BY ID DESC");
        $stmt->execute([$id]);
        $rows = $stmt->fetchAll(); ?> 
    <section class="requests">
        <?php foreach($rows as $row){ 
            $stmt = $con->prepare("SELECT * FROM products WHERE id = ?");
            $stmt->execute([$row['item_id']]);
            $info = $stmt->fetch();  ?>
            <div class="requests-item">
                <div class="img-requests">
                    <img style="max-height: 60px;" src="img/products/<?php echo $info['img']; ?>" alt="">
                </div>
                <div class="info-requests rows">
                    <div class="name-requests title">  المنتج</div>
                    <div class="name prag"><?php echo $info['name']; ?></div>
                </div>
                <div class="salary-requests rows">
                    <div class="salary-requests title"> السعر  </div>
                    <div class="salary prag"><span class="num-salary"><?php echo $info['price']; ?></span><span>ج</span></div>
                </div> 
                <div class="number-requests rows">
                    <div class="number-title title">#id</div>
                    <div class="number-value prag"><?php echo $info['id']; ?></div>
                </div>
            </div>
        <?php } ?>
    </section>

    <script src="./js/main.js"></script>
    <script src="./js/all.min.js"></script>
</body>
</html>