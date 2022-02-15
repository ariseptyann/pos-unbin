<?= $this->extend('backend/layouts/main') ?>

<?= $this->section('style') ?>
<link rel="stylesheet" type="text/css" href="<?= base_url() . '/app-assets/vendors/css/tables/datatable/datatables.min.css'?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">List Product</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <a class="btn btn-success btn-glow" href="/backend/product/create">Create</a>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="card-body card-dashboard">
                    <div class="table-responsive">
                    <table class="table table-striped table-bordered default-ordering">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Sku</th>
                                <th>Unit</th>
                                <th>Stok</th>
                                <th>Price Buy (Rp)</th>
                                <th>Price Sell (Rp)</th>
                                <th>Discount (%)</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $product):?>
                                <tr>
                                    <td><?= $product->name;?></td>
                                    <td><?= $product->sku;?></td>
                                    <td><?= $product->unit;?></td>
                                    <td><?= number_format($product->stok,0,',','.');?></td>
                                    <td><?= number_format($product->price_buy,0,',','.');?></td>
                                    <td><?= number_format($product->price_sell,0,',','.');?></td>
                                    <td><?= number_format($product->discount,0,',','.');?></td>
                                    <td><?= $product->description;?></td>
                                    <td>
                                        <a href="/backend/product/edit/<?= $product->product_id;?>" class="btn btn-info btn-sm btn-edit">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm btn-delete" data-id="<?= $product->product_id;?>">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script src="<?= base_url() . '/app-assets/vendors/js/tables/datatable/datatables.min.js'?>"></script>
<script src="<?= base_url() . '/app-assets/js/scripts/tables/datatables/datatable-basic.min.js'?>"></script>
<script>
    $('.btn-delete').on('click', function(e) {
        e.preventDefault();
        
        var id = $(this).data('id');
        Swal.fire({
            title: "Apa kamu yakin?",
            text: "Ingin menghapus data ini",
            type: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, hapus!"
        }).then(function (t) {
            if (t.value == true) {
                $.ajax({
                    url: "<?= base_url('backend/product/delete');?>",
                    type: "POST",
                    dataType: 'JSON',
                    data: {id:id},
                    success: function(res){
                        if (res.sukses == true) {
                            Swal.fire('Sukses','Data telah dihapus','success').then(()=>{
                                location.reload();
                            });
                        }else{
                            Swal.fire('Gagal','Data gagal dihapus','error');
                        }
                    }
                });
            }
        });
    })
</script>
<?= $this->endSection() ?>