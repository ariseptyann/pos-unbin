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
    } else if ($load == 'getCustomer') {
        $term = (!empty($_REQUEST['term']) ? $_REQUEST['term'] : '');
        $builder = $db->query("SELECT * FROM `users` WHERE `status` = 3 AND `name` LIKE '%$term%' ORDER BY `name` ASC");
        $data = array();
		if (count($builder->getResult()) == 0) {
			$row['id'] = '0';
			$row['label'] = 'Tidak ada';
			array_push($data, $row);
		} else {
			foreach ($builder->getResult() as $tmp) :
				$row['id'] = $tmp->user_id;
				$row['label'] = $tmp->name;
				array_push($data, $row);
			endforeach;
		}
		echo json_encode($data);
        die();
    } else if ($load == 'getCart') {
        $cashierId = session()->get('user_id');
        $builder = $db->query("SELECT `c`.`product_id`, `p`.`name`, `c`.`qty`, `c`.`total`
            FROM `carts` AS `c` 
            JOIN `products` AS `p` ON `c`.`product_id` = `p`.`product_id` 
            WHERE `c`.`cashier_id` = '$cashierId'
            ORDER BY `c`.`cart_id` DESC
        ");
        if (empty($builder->getResult())) {
            echo 'Pesanan tidak ada';
        } else {
        
        foreach ($builder->getResult() as $key => $r) {
?>

    <div class="row mb-1">
        <input type="hidden" name="product_id" value="<?= $r->product_id ?>">
        <div class="col-md-8"><?= $r->name ?></div>
        <div class="col-md-4">
            <?= number_format($r->total,0,'','.'); ?>
            <center><button class="btn btn-danger btn-sm" onclick="deleteCart(<?= $r->product_id ?>)"><i class="ft-trash-2"></i></button></center>
        </div>
    </div>
    <fieldset>
        <div class="input-group">
            <input type="text" name="qty" class="touchspin-color text-center" value="<?= $r->qty ?>" data-bts-button-down-class="btn btn-info" data-bts-button-up-class="btn btn-info"/>
        </div>
    </fieldset>
    <hr>

    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css">
    <script src="<?= base_url() ?>/app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js"></script>
    <script src="<?= base_url() ?>/app-assets/js/scripts/forms/input-groups.min.js"></script>

<?php
        } }
    } else {
        # code...
    }