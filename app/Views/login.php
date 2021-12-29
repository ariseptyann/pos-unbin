<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0, minimal-ui">
        <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template.">
        <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
        <meta name="author" content="PIXINVENT">
        <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
        <title>
            Login Duls
        </title>
        <!-- Icon -->
        <link rel="apple-touch-icon" href="<?= base_url() . '/app-assets/images/ico/apple-icon-120.png' ?>">
        <link rel="shortcut icon" type="image/x-icon" href="https://pixinvent.com/bootstrap-admin-template/robust/app-assets/images/ico/favicon.ico">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CMuli:300,400,500,700" rel="stylesheet">

        <!-- BEGIN VENDOR CSS-->
        <link rel="stylesheet" type="text/css" href="<?= base_url() . '/app-assets/css/vendors.min.css' ?>">
        <link rel="stylesheet" type="text/css" href="<?= base_url() . '/app-assets/vendors/css/forms/icheck/icheck.css' ?>">
        <link rel="stylesheet" type="text/css" href="<?= base_url() . '/app-assets/vendors/css/forms/icheck/custom.css' ?>">
        <link rel="stylesheet" type="text/css" href="<?= base_url() . '/app-assets/vendors/css/forms/selects/select2.min.css' ?>">

        <!-- BEGIN ROBUST CSS-->
        <link rel="stylesheet" type="text/css" href="<?= base_url() . '/app-assets/css/app.min.css' ?>">

        <!-- BEGIN Page Level CSS-->
        <link rel="stylesheet" type="text/css" href="<?= base_url() . '/app-assets/css/core/menu/menu-types/vertical-menu.min.css' ?>">
        <link rel="stylesheet" type="text/css" href="<?= base_url() . '/app-assets/css/core/colors/palette-gradient.min.css' ?>">
        <link rel="stylesheet" type="text/css" href="<?= base_url() . '/app-assets/css/pages/login-register.min.css' ?>">

        <!-- BEGIN Custom CSS-->
        <link rel="stylesheet" type="text/css" href="<?= base_url() . '/dashboard/css/style.css' ?>">
    </head>
    <body class="vertical-layout vertical-menu 1-column menu-expanded blank-page blank-page" data-open="click" data-menu="vertical-menu" data-col="1-column">
        <div class="app-content content">
            <div class="content-wrapper">
                <div class="content-header row"></div>
                <div class="content-body">
                    <section class="flexbox-container">
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <div class="col-md-4 col-10 box-shadow-2 p-0">
                                <div class="card border-grey border-lighten-3 m-0">
                                    <div class="card-header border-0">
                                        <div class="card-title text-center">
                                            <div class="p-1">
                                                <img src="<?= base_url() . '/dashboard/images/logo/logo-dark.png' ?>" alt="branding logo">
                                            </div>
                                        </div>
                                        <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                            <span>Login with Robust</span>
                                        </h6>
                                    </div>

                                    <div class="card-content">
                                        <div class="card-body">
                                            <form class="form-horizontal form-simple" action="#" novalidate>
                                                <fieldset class="form-group position-relative has-icon-left mb-0">
                                                    <input type="text" class="form-control form-control-lg input-lg" id="user-name" placeholder="Your Username" required>
                                                    <div class="form-control-position">
                                                        <i class="ft-user"></i>
                                                    </div>
                                                </fieldset>
                                                <fieldset class="form-group position-relative has-icon-left">
                                                    <input type="password" class="form-control form-control-lg input-lg" id="user-password" placeholder="Enter Password" required>
                                                    <div class="form-control-position">
                                                        <i class="ft-lock"></i>
                                                    </div>
                                                </fieldset>
                                                <div class="form-group row">
                                                    <div class="col-md-6 col-12 text-center text-md-left">
                                                        <fieldset>
                                                            <input type="checkbox" id="remember-me" class="chk-remember">
                                                            <label for="remember-me"> Remember Me</label>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-6 col-12 text-center text-md-right"><a href="#" class="card-link">Forgot Password?</a></div>
                                                </div>
                                                <button type="submit" class="btn btn-info btn-lg btn-block"><i class="ft-unlock"></i> Login</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="">
                                            <p class="float-sm-left text-center m-0"><a href="#" class="card-link">Recover password</a></p>
                                            <p class="float-sm-right text-center m-0">New to Moden Admin? <a href="#" class="card-link">Sign Up</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </div>

        <!-- BEGIN VENDOR JS-->
        <script src="<?= base_url() . '/app-assets/vendors/js/vendors.min.js' ?>"></script>
        <!-- BEGIN VENDOR JS-->
        <!-- BEGIN PAGE VENDOR JS-->
        <script src="<?= base_url() . '/app-assets/vendors/js/forms/icheck/icheck.min.js' ?>"></script>
        <script src="<?= base_url() . '/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js' ?>"></script>
        <script src="<?= base_url() . '/app-assets/vendors/js/forms/select/select2.full.min.js' ?>"></script>
        <!-- END PAGE VENDOR JS-->
        <!-- BEGIN ROBUST JS-->
        <script src="<?= base_url() . '/app-assets/js/core/app-menu.min.js' ?>"></script>
        <script src="<?= base_url() . '/app-assets/js/core/app.min.js' ?>"></script>
        <!-- END ROBUST JS-->
        <!-- BEGIN PAGE LEVEL JS-->
        <script src="<?= base_url() . '/app-assets/js/scripts/forms/form-login-register.min.js' ?>"></script>
        <script src="<?= base_url() . '/app-assets/js/scripts/forms/select/form-select2.min.js' ?>"></script>
        <!-- END PAGE LEVEL JS-->
    </body>
</html>
