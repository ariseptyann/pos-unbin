<?= $this->extend('backend/layouts/main') ?>

<?= $this->section('style') ?>
<link rel="stylesheet" type="text/css" href="<?= base_url() . '/app-assets/vendors/css/tables/datatable/datatables.min.css'?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section id="description" class="card">
    <div class="card-header">
        <h4 class="card-title">Report</h4>
        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="card-content">
        <div class="card-body">
            <form id="form-report" action="<?= base_url('backend/report/index'); ?>" method="post">
                <?= csrf_field(); ?>
                <div class="form-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="card-title">Start Date</label>
                            <input type="date" class="form-control" name="start_date">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="card-title">Finis Date</label>
                            <input type="date" class="form-control" name="finish_date">
                        </div>
                        <div class="form-group col-md-4">
                            <button type="submit" class="btn btn-outline-primary mt-4"> 
                               Submit
                            </button>
                        </div>  
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<section class="card">
    <div class="card-content">
        <div class="card-body">
            <?php if (!empty($report)):?>
                <table class="table table-striped table-bordered default-ordering">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>No Transaction</th>
                            <th>Product</th>
                            <th>Discount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($report as $val):?>
                            <tr>
                                <td><?= $val->username;?></td>
                                <td><?= $val->no_transaction;?></td>
                                <td><?= $val->prodname;?></td>
                                <td><?= $val->discount;?></td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            <?php endif;?>
        </div>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script src="<?= base_url() . '/app-assets/vendors/js/tables/datatable/datatables.min.js'?>"></script>
<script src="<?= base_url() . '/app-assets/js/scripts/tables/datatables/datatable-basic.min.js'?>"></script>
<?= $this->endSection() ?>