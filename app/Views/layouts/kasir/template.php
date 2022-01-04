<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  
<!-- Mirrored from pixinvent.com/bootstrap-admin-template/robust/html/ltr/vertical-menu-template/layout-1-column.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Dec 2020 06:57:14 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template.">
    <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>POS Unbin</title>
    <link rel="apple-touch-icon" href="<?= base_url() ?>/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="https://pixinvent.com/bootstrap-admin-template/robust/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CMuli:300,400,500,700" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/app-assets/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/app-assets/vendors/css/forms/icheck/custom.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/app-assets/vendors/css/ui/prism.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/app-assets/css/app.min.css">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/app-assets/css/core/menu/menu-types/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/app-assets/css/core/colors/palette-gradient.min.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/app-assets/css/style.css">
    <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-menu 1-column   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="1-column">

    <!-- fixed-top-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-dark navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav flex-row">
            <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
            <li class="nav-item">
                <a class="navbar-brand" href="<?= site_url('kasir') ?>">
                    <img class="brand-logo" alt="robust admin logo" src="<?= base_url() ?>/app-assets/images/logo/logo-light-sm.png">
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
                  <input class="input" type="text" placeholder="Pencarian Produk...">
                </div>
              </li>
            </ul>
            <ul class="nav navbar-nav float-right">         
              <li class="dropdown dropdown-user nav-item">
                  <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                    <span class="avatar avatar-online"><img src="<?= base_url() ?>/app-assets/images/portrait/small/avatar-s-1.png" alt="avatar">
                        <i></i>
                    </span>
                    <span class="user-name">John Doe</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="login-with-bg-image.html"><i class="ft-power"></i> Logout</a>
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
                            <h6>1 Item</h6>
                        </div>
                        <form action="#" class="category-content">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="No Order">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Customer">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                
                                <?php for ($i=0; $i < 3; $i++) { ?>
                                <div class="row mb-1">
                                    <div class="col-md-8">Tango Wafer Waffle Cranch Chox 130G</div>
                                    <div class="col-md-4">
                                        7.500 
                                        <center><button class="btn btn-danger btn-sm"><i class="ft-trash-2"></i></button></center>
                                    </div>
                                </div>
                                <fieldset>
                                    <div class="input-group">
                                        <input type="text" class="touchspin-color text-center" value="55" data-bts-button-down-class="btn btn-info" data-bts-button-up-class="btn btn-info"/>
                                    </div>
                                </fieldset>
                                <hr>
                                <?php } ?>

                                <div class="row font-weight-bold">
                                    <div class="col-md-6">Total</div>
                                    <div class="col-md-6 text-right">7.500</div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <button type="reset" class="btn btn-warning btn-block">Reset</button>
                                </div>
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary btn-block">Bayar</button>
                                </div>
                            </div>
                        </form>
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
                            <div class="row">
                            <?php for ($i=0; $i < 8; $i++) { ?>
                                <div class="col-md-3" style="cursor:pointer;">
                                    <figure class="card card-img-top border-grey border-lighten-2" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                        <img class="gallery-thumbnail card-img-top" src="<?= base_url() ?>/app-assets/images/gallery/2.jpg" alt="Image description" />
                                        <div class="card-body">
                                            <h4 class="card-title">Tango Wafer Waffle Cranch Chox 130G</h4>
                                            <p class="card-text"><s class="text-danger">8.000</s> 7.500</p>
                                        </div>
                                    </figure>
                                </div>
                            <?php } ?>
                            </div>
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
    <script src="<?= base_url() ?>/app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN ROBUST JS-->
    <script src="<?= base_url() ?>/app-assets/js/core/app-menu.min.js"></script>
    <script src="<?= base_url() ?>/app-assets/js/core/app.min.js"></script>
    <script src="<?= base_url() ?>/app-assets/js/scripts/customizer.min.js"></script>
    <!-- END ROBUST JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="<?= base_url() ?>/app-assets/js/scripts/forms/input-groups.min.js"></script>
    <!-- END PAGE LEVEL JS-->
</body>

<!-- Mirrored from pixinvent.com/bootstrap-admin-template/robust/html/ltr/vertical-menu-template/layout-1-column.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Dec 2020 06:57:15 GMT -->
</html>