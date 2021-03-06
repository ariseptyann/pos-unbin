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
    
    var getProduct = "<?= site_url('/home/loadData?load=getProduct') ?>";
    $('#getProduct').load(getProduct);

    $('input:text[name=pencarian]').keyup(function(e) {
      var search = $('input:text[name=pencarian]').val();
      $.get(getProduct, {
        search: search
      }, function(data) {
        $("#getProduct").html(data).show();
      });
    });

    $("#customer").autocomplete({
        source: function(request, response) {
            $.post("<?= site_url('/home/loadData?load=getCustomer') ?>", {
                term: request.term
            }, function(data) {
                response($.map(data, function(item) {
                    return {
                        label: item.label,
                        value: item.label,
                        id: item.id
                    }
                }))
            }, "json");
        },
        minLength: 1,
        dataType: "json",
        cache: false,
        select: function(event, ui) {
            event.preventDefault();
            $('#customer_id').val(ui.item.id);
            $('#customer').val(ui.item.label);
        },
    });

    if (performance.navigation.type == performance.navigation.TYPE_RELOAD) {
        deleteAllCart();
    }

    $('.iptPrice').mask('000.000.000.000.000', {reverse: true});

    $('#payment').submit(function() {
        $.post($('#payment').attr('action'), $('#payment').serialize(), function(data) {
            if (data.st == 0) {
                swal('',"Pesanan tidak ada!",'error');
            } else {
                swal({
                    title: "Transaksi berhasil.",
                    text: "",
                    icon: "success",
                    showCancelButton: false,
                    buttons: {
                        confirm: {
                            text: "Ok",
                            value: true,
                            visible: true,
                            className: "btn-primary",
                            closeModal: true
                        }
                    }
                }).then(isConfirm => {
                    if (isConfirm) {
                        location.reload();
                    }
                });
            }
        }, 'json');
        return false;
    });

});

function beep() {
    var sound = document.getElementById("audio");
    sound.play();
}

function formatPrice(price) {
  if (price === null) {
    return '0.00'; 
  } else {
    price = price.toString();
    var harga = price.split('.')[0];
    harga = new Intl.NumberFormat('id-ID').format(harga);
    return harga; 
  }
}

function handlePrice(price) {
  return price.toString().replaceAll('.','');
}

function countTotalPrice() {
    var total = $('#totalPrice').val();
    if (total == '') {
        total = 0; 
    }
    total = handlePrice(total);

    var diskon = $('#diskon').val();
    if (diskon == '') {
        diskon = 0; 
    }
    diskon = handlePrice(diskon);

    var subTotal = parseInt(total) - parseInt(diskon);
    if (subTotal < 1) {
        subTotal = 0; 
    }
    
    $('#subTotalPrice').val(formatPrice(subTotal));
}

function addCart(productId) {
    beep();
    if (productId != '') {

        var cashierId = $("#cashier_id").val();
        var customerId = $("#customer_id").val();
        var noOrder = $("#no_order").val();
        if (noOrder == '') {
 			swal('', "No Order wajib diisi!",'error');
 		} else {
            var csrfName = $("#token").attr('name');
            var csrfHash = $("#token").val();

            $.post('<?= site_url() ?>/home/addCart', {
                csrfName: csrfHash,
 				cashier_id: cashierId,
 				product_id: productId,
 				customer_id: customerId,
 				no_order: noOrder
 			}, function(e) {
                if (e.st == 0) {
                    swal('',"Produk tidak ada!",'error');
                }else if (e.st == 2) {
                    swal('',"No Order sudah ada!",'error');
                }else{
                    $("#no_order").attr('disabled', 'disabled');
                    $("#customer").attr('disabled', 'disabled');
                    $('.cart').load("<?= site_url('/home/loadData?load=getCart') ?>");
                    $('.cartTotalItem').html(e.totalItem+' Item');
                    $('.cartTotalPrice').html(e.totalPrice);
                    $('#totalPrice').val(e.totalPrice);
                    $('#subTotalPrice').val(e.totalPrice);
                    $("#cashier_id_pay").val(e.cashier_id);
                    $("#customer_id_pay").val(e.customer_id);
                    $("#no_order_pay").val(e.no_order);
                    $(".bayar").removeAttr('disabled');
                }
            }, 'json');
        }

    }else{
        swal('',"Produk tidak ada!",'error');
    }
}

function deleteCart(productId) {
    beep();
	swal({
	    title: "Apakah anda yakin?",
	    text: "",
	    icon: "warning",
	    showCancelButton: true,
	    buttons: {
            cancel: {
                text: "Batal",
                value: null,
                visible: true,
                className: "btn-danger",
                closeModal: true,
            },
            confirm: {
                text: "Ok",
                value: true,
                visible: true,
                className: "btn-primary",
                closeModal: true
            }
	    }
	}).then(isConfirm => {
	    if (isConfirm) {
            if (productId != '') {

                var cashierId = $("#cashier_id").val();
                var customerId = $("#customer_id").val();
                var noOrder = $("#no_order").val();
                $.post('<?= site_url() ?>/home/deleteCart', {
                    cashier_id: cashierId,
                    product_id: productId,
                    customer_id: customerId,
                    no_order: noOrder
                }, function(e) {
                    if (e.st == 0) {
                        swal('',"Produk tidak ada!",'error');
                    }else if (e.st == 2) {
                        swal('',"Pesanan tidak ada!",'error');
                    }else{
                        $('.cart').load("<?= site_url('/home/loadData?load=getCart') ?>");
                        $('.cartTotalItem').html(e.totalItem+' Item');
                        $('.cartTotalPrice').html(e.totalPrice);
                        $('#totalPrice').val(e.totalPrice);
                        $('#subTotalPrice').val(e.totalPrice);
                    }
                }, 'json');

            }else{
                swal('',"Produk tidak ada!",'error');
            }
	    }
	});
}

function resetCarts() {
    beep();
	swal({
	    title: "Apakah anda yakin?",
	    text: "",
	    icon: "warning",
	    showCancelButton: true,
	    buttons: {
            cancel: {
                text: "Batal",
                value: null,
                visible: true,
                className: "btn-danger",
                closeModal: true,
            },
            confirm: {
                text: "Ok",
                value: true,
                visible: true,
                className: "btn-primary",
                closeModal: true
            }
	    }
	}).then(isConfirm => {
	    if (isConfirm) {
            deleteAllCart();
            location.reload();
	    }
	});
}

function deleteAllCart() {
    beep();
    var cashierId = $("#cashier_id").val();
    $.post('<?= site_url() ?>/home/deleteAllCart', {
 		cashier_id: cashierId
 	}, function(e) {
        
    
    }, 'json');
}

</script>