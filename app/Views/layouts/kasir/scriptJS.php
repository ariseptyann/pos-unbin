<script>
      
<?php if(is_null(session()->get('logged_in'))) { ?>
    $(window).on('load', function() {
        $('#modalLogin').modal({
          backdrop: 'static',
          keyboard: true, 
          show: true
        });
    });
<?php } ?>

<?php if (!empty(session()->getFlashdata('error'))) { ?>
    swal("Login gagal!", "<?= session()->getFlashdata('error') ?>", "error");
<?php } ?>

$(function() {
    
    var getProduct = "<?= site_url('kasir/loadData?load=getProduct') ?>";
    $('#getProduct').load(getProduct);

    $('input:text[name=pencarian]').keyup(function(e) {
      var search = $('input:text[name=pencarian]').val();
      $.get(getProduct, {
        search: search
      }, function(data) {
        $("#getProduct").html(data).show();
      });
    });

});

</script>