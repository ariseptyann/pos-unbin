<?= $this->extend('backend/layouts/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-sm-12 col-md-10">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Store</h4>
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
                    <form id="form-store" enctype="multipart/form-data" method="post">
                        <div class="form-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control name" placeholder="Name" value="<?= $store->name; ?>">
                                    <input type="hidden" name="store_id" value="<?= $store->store_id; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>About</label>
                                    <input type="text" name="about" class="form-control about" placeholder="About" value="<?= $store->about; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Logo</label>
                                    <input type="file" name="logo" multiple="true" id="finput" onchange="onFileUpload(this);" class="form-control" accept="image/*">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Address</label>
                                    <textarea name="address" class="form-control address" placeholder="Address"><?= $store->address; ?></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Preview</label>
                                    <img class="form-control" id="ajaxImgUpload" alt="Preview Image" src="<?= base_url() . '/uploads/store/' . $store->logo ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="text-right">
                                <a class="btn btn-outline-warning ml-1" href="/backend/store/index"> 
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
    <script>
        function onFileUpload(input, id) {
            id = id || '#ajaxImgUpload';
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(id).attr('src', e.target.result).width(300)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(document).ready(function(){
            $(".name").focus();

            $('#form-store').on('submit', function(e){
                e.preventDefault();
                $('.saveBtn').html('Uploading ...');
                $('.saveBtn').prop('disabled', true);

                $.ajax({
                    url: "<?= base_url('backend/store/update');?>",
                    type: 'POST',
                    dataType: 'JSON',
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function(res) {
                        if (res.sukses == true) {
                            Swal.fire('Sukses','Data telah berhasil di update','success');
                            // $("#form-store")[0].reset();
                            // $('#ajaxImgUpload').attr('src', 'https://via.placeholder.com/300');
                            $('.saveBtn').html('Update');
                            $('.saveBtn').prop('disabled', false);
                            $('.name').val(res.data.name);
                            $('.about').val(res.data.about);
                            $('.address').val(res.data.address);
                            var logo = "<?= base_url('/uploads/store')?>";
                            $('#ajaxImgUpload').attr("src", logo + '/' + res.data.logo)
                        }else{
                            Swal.fire('Gagal','Data gagal di update','error');
                        }
                    }
                });
            });
        });
    </script>
<?= $this->endSection() ?>