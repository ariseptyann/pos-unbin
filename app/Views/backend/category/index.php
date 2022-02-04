<?= $this->extend('backend/layouts/main') ?>

<?= $this->section('style') ?>
<link rel="stylesheet" type="text/css" href="<?= base_url() . '/app-assets/vendors/css/tables/datatable/datatables.min.css'?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">List Category</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <a class="btn btn-success btn-glow" href="/backend/category/create">Create</a>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="card-body card-dashboard">
                    <table class="table table-striped table-bordered default-ordering">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($categorys as $category):?>
                                <tr>
                                    <td><?= $category->name;?></td>
                                    <td>
                                        <a href="/backend/category/edit/<?= $category->category_id;?>" class="btn btn-info btn-sm btn-edit">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm btn-delete" data-id="<?= $category->category_id;?>">Delete</a>
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
                    url: "<?= base_url('backend/category/delete');?>",
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