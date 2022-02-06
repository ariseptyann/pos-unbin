<?= $this->extend('backend/layouts/main') ?>

<?= $this->section('style') ?>
<link rel="stylesheet" type="text/css" href="<?= base_url() . '/app-assets/vendors/css/forms/selects/select2.min.css'?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-sm-12 col-md-10">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Create Product</h4>
                <a class="heading-elements-toggle">
                    <i class="ft-align-justify font-medium-3"></i>
                </a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li>
                            <a data-action="collapse">
                                <i class="ft-minus"></i>
                            </a>
                        </li>
                        <li>
                            <a data-action="expand">
                                <i class="ft-maximize"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="card-body">
                    <form id="form-product" enctype="multipart/form-data" method="post">
                        <div class="form-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Category</label>
                                    <select class="select2 form-control" name="category_id" id="category">
                                        <option value="">Pilih Category</option>
                                        <?php foreach ($categorys as $category):?>
                                            <option value="<?= $category->category_id; ?>"><?= $category->name; ?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Sku</label>
                                    <input type="text" name="sku" class="form-control" placeholder="Sku">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Unit</label>
                                    <input type="text" name="unit" class="form-control" placeholder="Unit">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Image</label>
                                    <input type="file" name="image" multiple="true" class="form-control" accept="image/*">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Stok</label>
                                    <input type="number" name="stok" class="form-control" placeholder="Stok">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Price Buy</label>
                                    <input type="number" name="price_buy" class="form-control" placeholder="Price Buy">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Price Sell</label>
                                    <input type="number" name="price_sell" class="form-control" placeholder="Price Sell">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Discount</label>
                                    <input type="number" name="discount" class="form-control" placeholder="Discount">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" placeholder="Description"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="text-right">
                                <a class="btn btn-outline-warning ml-1" href="/backend/product/index"> 
                                    <i class="ft-arrow-left"></i> Back
                                </a>
                                <button type="submit" class="btn btn-outline-primary ml-1 saveBtn"> 
                                    <i class="ft-check"></i> Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script src="<?= base_url() . '/app-assets/vendors/js/forms/select/select2.full.min.js'?>"></script>
<script src="<?= base_url() . '/app-assets/js/scripts/forms/select/form-select2.min.js'?>"></script>
<script>

    $('#form-product').on('submit', function(e){
        e.preventDefault();
        $('.saveBtn').html('Uploading ...');
        $('.saveBtn').prop('disabled', true);

        $.ajax({
            url: "<?= base_url('backend/product/store');?>",
            type: 'POST',
            dataType: 'JSON',
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            success: function(res) {
                if (res.sukses == true) {
                    Swal.fire('Sukses','Data telah berhasil disimpan','success');
                    $("#form-product")[0].reset();
                    $('.saveBtn').html('Save');
                    $('.saveBtn').prop('disabled', false);
                    $("#category").select2("val", 0);
                }else{
                    Swal.fire('Gagal','Data gagal disimpan','error');
                }
            }
        });
    });
</script>
<?= $this->endSection() ?>