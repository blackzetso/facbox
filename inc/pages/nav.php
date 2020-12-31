    <?php if(!isset($func)){ include 'inc/App/function.php'; } ?>
    <div class="nav nav-mobil  d-flex ">
        <div class="container d-flex align-items-center justify-content-center">
            <ul class="links d-flex align-items-center">
                <li><a href="index.php"   class="<?php if (strpos($_SERVER['PHP_SELF'], 'index.php') !== false) { echo 'active'; } ?>"><i class="fas fa-home icon"></i></a></li>
                <li><a href="acount.php"  class="<?php if (strpos($_SERVER['PHP_SELF'], 'acount.php') !== false) { echo 'active'; } ?>"><i class="fas fa-user icon"></i></a></li>
                <li><a href="order.php"   class="<?php if (strpos($_SERVER['PHP_SELF'], 'order.php') !== false) { echo 'active'; } ?>"><i class="fas fa-address-book icon"></i></a></li>
                <li><a href="contact.php" class="<?php if (strpos($_SERVER['PHP_SELF'], 'contact.php') !== false) { echo 'active'; } ?>"><i class="fas fa-paper-plane icon"></i></a></li>
                <?php echo account(); ?>
            </ul>
        </div>
    </div>