<?= $this->extend('backend/layouts/main') ?>

<?= $this->section('style') ?>
<link rel="stylesheet" type="text/css" href="<?= base_url() . '/app-assets/vendors/css/forms/selects/select2.min.css'?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-sm-12 col-md-10">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Create Category</h4>
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
                    <form id="form-category">
                        <div class="form-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Parent</label>
                                    <select class="select2 form-control" name="parent_id" id="parent">
                                        <option value="">Pilih Category</option>
                                        <?php foreach ($parents as $parent):?>
                                            <option value="<?= $parent->category_id; ?>"><?= $parent->name; ?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control name" placeholder="Name">
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="text-right">
                                <a class="btn btn-outline-warning ml-1" href="/backend/category/index"> 
                                    <i class="ft-arrow-left"></i> Back
                                </a>
                                <button type="button" class="btn btn-outline-primary ml-1" onclick="proses()"> 
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
    $(document).ready(function(){
        $(".name").focus();
    });

    function proses() {
        $.ajax({
            url: "<?= base_url('backend/category/store');?>",
            type: 'POST',
            dataType: 'JSON',
            data: $('#form-category').serialize(),
            success: function(res) {
                if (res.sukses == true) {
                    Swal.fire('Sukses','Data telah berhasil disimpan','success');
                    $("#form-category")[0].reset();
                    $("#parent").select2("val", 0);
                }else{
                    Swal.fire('Gagal','Data gagal disimpan','error');
                }
            }
        });
    }
</script>
<?= $this->endSection() ?>