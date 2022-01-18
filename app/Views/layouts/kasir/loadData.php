<?php

    $load = (!empty($_GET['load']) ? $_GET['load'] : null);
    $db = \Config\Database::connect();

    if ($load == 'getProduct') {

        if (!empty($_REQUEST['search'])) {
            $key = $_REQUEST['search'];
            $builder = $db->query("SELECT * FROM `products` WHERE (`name` LIKE '%$key%' OR `sku` LIKE '%$key%') ORDER BY `product_id` DESC");
        }else{
            $builder = $db->query("SELECT * FROM `products` ORDER BY `product_id` DESC");
        }

        $query = $builder->getResult();
        if (count($query) == 0) {
            echo 'Tidak ada data';
        } else {
            foreach ($query as $key => $r) {

?>

    <div class="col-md-3" style="cursor:pointer;" onclick="addCart(<?= $r->product_id ?>)">
        <figure class="card card-img-top border-grey border-lighten-2" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
            
            <?php if ($r->image != '') { ?>
                <img class="gallery-thumbnail card-img-top" src="<?= base_url() ?>/app-assets/images/gallery/<?= $r->image ?>" alt="Image of <?= $r->name ?>" />
            <?php } else { ?>
                <img class="gallery-thumbnail card-img-top" src="<?= base_url() ?>/app-assets/images/gallery/33.jpg" alt="Image of <?= $r->name ?>" />
            <?php } ?>

            <div class="card-body">
                <h4 class="card-title"><?= $r->name ?></h4>
                <p class="card-text"> 
                    <?php
                        if ($r->discount != NULL) {
                            echo "<s class='text-danger'>".number_format($r->price_sell,0,'','.')."</s> ";
                            echo number_format($r->price_sell - $r->discount,0,'','.');
                        } else {
                            echo number_format($r->price_sell,0,'','.');
                        }
                    ?>
                </p>
            </div>
        </figure>
    </div>

<?php
            }
        }
    } else if ($load == 'getCart') {
        $productId = $_REQUEST['productId'];
        $builder = $db->query("SELECT * FROM `products` WHERE `product_id` = '$productId'");
        $r = $builder->getRow();
?>

    <div class="row mb-1">
        <input type="hidden" name="product_id" value="<?= $productId ?>">
        <div class="col-md-8"><?= $r->name ?></div>
        <div class="col-md-4">
            <?= number_format($r->price_sell,0,'','.'); ?>
            <center><button class="btn btn-danger btn-sm" onclick="deleteCart(<?= $productId ?>)"><i class="ft-trash-2"></i></button></center>
        </div>
    </div>
    <fieldset>
        <div class="input-group">
            <input type="text" name="qty" class="touchspin-color text-center" value="0" data-bts-button-down-class="btn btn-info" data-bts-button-up-class="btn btn-info"/>
        </div>
    </fieldset>
    <hr>

    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css">
    <script src="<?= base_url() ?>/app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js"></script>
    <script src="<?= base_url() ?>/app-assets/js/scripts/forms/input-groups.min.js"></script>

<?php
    } else {
        # code...
    }