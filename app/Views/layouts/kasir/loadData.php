<?php

    $load = (!empty($_GET['load']) ? $_GET['load'] : null);
    if ($load == 'getProduct') {

        $db = \Config\Database::connect();
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

    <div class="col-md-3" style="cursor:pointer;">
        <figure class="card card-img-top border-grey border-lighten-2" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
            
            <?php if ($r->image != '') { ?>
                <img class="gallery-thumbnail card-img-top" src="<?= base_url() ?>/app-assets/images/gallery/<?= $r->image ?>" alt="Image of <?= $r->name ?>" />
            <?php } else { ?>
                <img class="gallery-thumbnail card-img-top" src="<?= base_url() ?>/app-assets/images/gallery/33.jpg" alt="Image of <?= $r->name ?>" />
            <?php } ?>

            <div class="card-body">
                <h4 class="card-title"><?= $r->name ?></h4>
                <p class="card-text"> <?= ($r->discount != NULL ? "<s class='text-danger'>8.000</s>" : '' ) ?> <?= $r->price_sell ?></p>
            </div>
        </figure>
    </div>

<?php
            }
        }
    }else {
        # code...
    }