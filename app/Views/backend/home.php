<?= $this->extend('backend/layouts/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <?php if(session()->getFlashdata('success')):?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong><?= session()->getFlashdata('success') ?></strong>
            </div>
        <?php endif;?>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Product Terlaris</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="card-body">
                    <div id="basic-column" class="height-400 echart-container"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script src="<?= base_url() . '/app-assets/vendors/js/ui/jquery.sticky.js'?>"></script>
<script src="<?= base_url() . '/app-assets/vendors/js/charts/jquery.sparkline.min.js'?>"></script>
<script src="<?= base_url() . '/app-assets/vendors/js/charts/echarts/echarts.js'?>"></script>

<script src="<?= base_url() . '/app-assets/js/scripts/charts/echarts/bar-column/basic-bar.min.js'?>"></script>
<script src="<?= base_url() . '/app-assets/js/scripts/charts/echarts/bar-column/basic-column.js'?>"></script>
<?= $this->endSection() ?>