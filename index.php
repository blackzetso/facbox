<?php 
      
      include 'init.php'; 
      $stmt = $con->prepare("SELECT * FROM  categories ORDER BY id ASC");
      $stmt->execute();
      $rows = $stmt->fetchAll(); ?>


    <div class="serch">
        <form id="search">
            <div class="container">
                <div class="row">
                    <input type="search" name="search" id="myInput" class="col-12" placeholder="ادخل المنتج الذي تريد البحث">
                </div>
            </div>
        </form>
    </div>

    <section class="product">
        <div class="container">
            <div class="row" id="result" >
                <?php foreach($rows as $row){ ?>
                <div class=" col-6  p-0">
                    <div class="item">
                        <a href="subcategory.php?id=<?php echo $row['id']; ?>">
                            <div class="photo">
                                <img height="350px" class="lazy" src="img/categories/<?php echo $row['img']; ?>" alt="">
                            </div>
                           <div class="name">
                                <span> <?php  mb_internal_encoding("UTF-8"); echo mb_substr($row['name'],0,25); ?> </span>
                           </div>
                        </a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php include $App . 'footer.php'; ?>