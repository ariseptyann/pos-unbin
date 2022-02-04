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
                                            <option value="<?= $category->category_id; ?>" <?= ($category->category_id == $product->category_id) ? "selected = 'selected'" : "";?>><?= $category->name; ?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control name" placeholder="Name" value="<?= $product->name;?>">
                                    <input type="hidden" name="product_id" value="<?= $product->product_id;?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Sku</label>
                                    <input type="text" name="sku" class="form-control sku" placeholder="Sku" value="<?= $product->sku;?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Unit</label>
                                    <input type="text" name="unit" class="form-control unit" placeholder="Unit" value="<?= $product->unit;?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Image</label>
                                    <input type="file" name="image" multiple="true" class="form-control" accept="image/*">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Stok</label>
                                    <input type="number" name="stok" class="form-control stok" placeholder="Stok" value="<?= $product->stok;?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Price Buy</label>
                                    <input type="number" name="price_buy" class="form-control price_buy" placeholder="Price Buy" value="<?= $product->price_buy;?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Price Sell</label>
                                    <input type="number" name="price_sell" class="form-control price_sell" placeholder="Price Sell" value="<?= $product->price_sell;?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Discount</label>
                                    <input type="number" name="discount" class="form-control discount" placeholder="Discount" value="<?= $product->discount;?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control description" placeholder="Description"><?= $product->description;?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="text-right">
                                <a class="btn btn-outline-warning ml-1" href="/backend/product/index"> 
                                    <i class="ft-arrow-left"></i> Back
                                </a>
                                <button type="submit" class="btn btn-outline-primary ml-1 saveBtn"> 
                                    <i class="ft-check"></i> Update
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
            url: "<?= base_url('backend/product/update');?>",
            type: 'POST',
            dataType: 'JSON',
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            success: function(res) {
                if (res.sukses == true) {
                    Swal.fire('Sukses','Data telah berhasil di update','success');
                    $('.saveBtn').html('Save');
                    $('.saveBtn').prop('disabled', false);
                    $('.name').val(res.data.name);
                    $('.sku').val(res.data.sku);
                    $('.unit').val(res.data.unit);
                    $('.stok').val(res.data.stok);
                    $('.price_buy').val(res.data.price_buy);
                    $('.price_sell').val(res.data.price_sell);
                    $('.discount').val(res.data.discount);
                    $('.description').val(res.data.description);
                }else{
                    Swal.fire('Gagal','Data gagal di update','error');
                }
            }
        });
    });

</script>
<?= $this->endSection() ?>