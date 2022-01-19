<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Aplikasi POS Web Base Unbin.">
    <meta name="keywords" content="aplikasi pos, unbin, web base, aplikasi pos web base unbin">
    <meta name="author" content="POS Unbin">
    <title>POS Unbin</title>
    <link rel="apple-touch-icon" href="<?= base_url() ?>/app-assets/images/logo/logo-light-sm.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>/app-assets/images/logo/logo-light-sm.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CMuli:300,400,500,700" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/app-assets/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/app-assets/vendors/css/forms/icheck/custom.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/app-assets/vendors/css/ui/prism.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/app-assets/vendors/css/extensions/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/app-assets/vendors/css/ui/jquery-ui.min.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/app-assets/css/app.min.css">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/app-assets/css/core/menu/menu-types/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/app-assets/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/app-assets/fonts/feather/style.min.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/app-assets/css/style.css">
    <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-menu 1-column   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="1-column">

  <audio id="audio" src="<?php echo base_url() ?>/app-assets/beep.wav" autostart="false"></audio>

  <!-- Modal Login -->
	<div class="modal fade text-left" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalLabelLogin" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h3 class="modal-title" id="modalLabelLogin">Silakan Login</h3>
		  </div>

		  <form action="<?= site_url('kasir/login') ?>" method="post">
        <?= csrf_field(); ?>
        <div class="modal-body">
          <label>Username: </label>
          <div class="form-group position-relative has-icon-left">
            <input type="text" placeholder="Username" class="form-control" name="username" required>
            <div class="form-control-position">
              <i class="ft-mail font-medium-5 line-height-1 text-muted icon-align"></i>
            </div>
          </div>
          <label>Password: </label>
          <div class="form-group position-relative has-icon-left">
            <input type="password" placeholder="Password" class="form-control" name="password" required>
            <div class="form-control-position">
              <i class="ft-lock font-large-1 line-height-1 text-muted icon-align"></i>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-outline-primary btn-lg">Login</button>
        </div>
		  </form>

		</div>
	  </div>
	</div>
  <!-- /Modal Login -->

    <!-- fixed-top-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-dark navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav flex-row">
            <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
            <li class="nav-item">
                <a class="navbar-brand" href="<?= site_url('kasir') ?>">
                    <img class="brand-logo" alt="POS Unbin" src="<?= base_url() ?>/app-assets/images/logo/logo-light-sm.png">
                    <h3 class="brand-text">POS Unbin</h3>
                </a>
            </li>
            <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content">
          <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left">
              <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
              <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i class="ficon ft-search"></i></a>
                <div class="search-input">
                  <input class="input" type="text" placeholder="Pencarian Produk..." name="pencarian">
                </div>
              </li>
            </ul>
            <ul class="nav navbar-nav float-right">         
              <li class="dropdown dropdown-user nav-item">
                  <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                    <span class="avatar avatar-online"><img src="<?= base_url() ?>/app-assets/images/portrait/small/avatar-s-default.png" alt="<?= session()->get('name'); ?>">
                        <i></i>
                    </span>
                    <span class="user-name"><?= session()->get('name'); ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="/kasir/logout"><i class="ft-power"></i> Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <div class="app-content content">

      <div class="sidebar-right">
        <div class="sidebar">
            <div class="sidebar-content card d-none d-lg-block">
                <div class="card-body">
                    <!-- Form sample -->
                    <div class="sidebar-category">
                        <div class="category-title pb-1">
                            <h6 class="cartTotalItem">0 Item</h6>
                        </div>
                        <!-- <form action="#" class="category-content"> -->

                            <!-- BEGIN CUSTOMER  -->
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="No Order" id="no_order">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="hidden" id="cashier_id" value="<?= session()->get('user_id') ?>" readonly>
                                        <input type="hidden" id="customer_id" readonly>
                                        <input type="text" class="form-control" placeholder="Customer" id="customer">
                                    </div>
                                </div>
                            </div>
                            <!-- END CUSTOMER  -->

                            <!-- BEGIN ITEM CART  -->
                            <div class="form-group">
                              <div class="cart"> </div>
                              <div class="row font-weight-bold">
                                  <div class="col-md-6">Total</div>
                                  <div class="col-md-6 text-right cartTotalPrice">0</div>
                              </div>
                            </div>
                            <!-- END ITEM CART  -->

                            <div class="row">
                                <div class="col-6">
                                  <button type="reset" class="btn btn-warning btn-block">Reset</button>
                                </div>
                                <div class="col-6">
                                    
                                  <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#iconForm">Bayar</button>

                                  <!-- Modal Pembayaran -->
                                  <div class="modal fade text-left" id="iconForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                      <h3 class="modal-title" id="myModalLabel34">Pembayaran</h3>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                      </div>
                                      <div class="modal-body">
                                        <div class="row">

                                          <div class="col-md-4"> Total </div>
                                          <div class="col-md-8">
                                            <div class="form-group position-relative has-icon-left">
                                              <input type="text" placeholder="Total" class="form-control" value="15.000" readonly="readonly">
                                              <div class="form-control-position">
                                                <i class="ft-file font-medium-5 line-height-1 text-muted icon-align"></i>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="col-md-4"> Diskon </div>
                                          <div class="col-md-8">
                                            <div class="form-group position-relative has-icon-left">
                                              <input type="text" placeholder="Diskon" class="form-control" value="0">
                                              <div class="form-control-position">
                                                <i class="ft-file-minus font-medium-5 line-height-1 text-muted icon-align"></i>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="col-md-4"> Sub Total </div>
                                          <div class="col-md-8">
                                            <div class="form-group position-relative has-icon-left">
                                              <input type="text" placeholder="Sub Total" class="form-control" value="15.000" readonly="readonly">
                                              <div class="form-control-position">
                                                <i class="ft-file-text font-medium-5 line-height-1 text-muted icon-align"></i>
                                              </div>
                                            </div>
                                          </div>

                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="Kembali">
                                        <input type="submit" class="btn btn-outline-primary btn-lg" value="Bayar">
                                      </div>

                                    </div>
                                    </div>
                                  </div>
                                  <!-- /Modal Pembayaran -->

                                </div>
                            </div>
                        <!-- </form> -->
                    </div>
                    <!-- /form sample -->
                </div>
            </div>
        </div>
      </div>

      <div class="content-left">
        <div class="content-wrapper">
          <div class="content-body">
            <section id="description">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row" id="getProduct"> </div>
                        </div>
                    </div> 
                </div>
            </section>
          </div>
        </div>
      </div>

    </div>
   
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <footer class="footer footer-static footer-light navbar-border">
      <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright  &copy; <?= date('Y') ?> </span><span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">All rights reserved.</span></p>
    </footer>

    <!-- BEGIN VENDOR JS-->
    <script src="<?= base_url() ?>/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="<?= base_url() ?>/app-assets/vendors/js/ui/prism.min.js"></script>
    <script src="<?= base_url() ?>/app-assets/vendors/js/extensions/sweetalert.min.js"></script>
    <script src="<?= base_url() ?>/app-assets/js/core/libraries/jquery_ui/jquery-ui.min.js"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN ROBUST JS-->
    <script src="<?= base_url() ?>/app-assets/js/core/app-menu.min.js"></script>
    <script src="<?= base_url() ?>/app-assets/js/core/app.min.js"></script>
    <script src="<?= base_url() ?>/app-assets/js/scripts/customizer.min.js"></script>
    <!-- END ROBUST JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="<?= base_url() ?>/app-assets/js/scripts/extensions/sweet-alerts.min.js"></script>
    <!-- END PAGE LEVEL JS-->

    <?= include('scriptJS.php') ?>

</body>

</html>