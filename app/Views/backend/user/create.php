<?= $this->extend('backend/layouts/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-sm-12 col-md-10">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Create User</h4>
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
                    <form id="form-user">
                        <div class="form-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control name" placeholder="Name" autocomplete="off" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control" placeholder="Username" autocomplete="off" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="*******" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="text-right">
                                <a class="btn btn-outline-warning ml-1" href="/backend/user/index"> 
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
    <script>
        $(document).ready(function(){
            $(".name").focus();
        });

        function proses() {
            $.ajax({
                url: "<?= base_url('backend/user/store');?>",
                type: 'POST',
                dataType: 'JSON',
                data: $('#form-user').serialize(),
                success: function(res) {
                    if (res.sukses == true) {
                        Swal.fire('Sukses','Data telah berhasil disimpan','success');
                        $("#form-user")[0].reset();
                    }else{
                        Swal.fire('Gagal','Data gagal disimpan','error');
                    }
                }
            });
        }
    </script>
<?= $this->endSection() ?>