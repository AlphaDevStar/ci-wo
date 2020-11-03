<!DOCTYPE html>
<html lang="en">
<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Volgh –  Bootstrap 4 Responsive Application Admin panel Theme Ui Kit & Premium Dashboard Design Modern Flat HTML Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords" content="analytics dashboard, bootstrap 4 web app admin template, bootstrap admin panel, bootstrap admin template, bootstrap dashboard, bootstrap panel, Application dashboard design, dashboard design template, dashboard jquery clean html, dashboard template theme, dashboard responsive ui, html admin backend template ui kit, html flat dashboard template, it admin dashboard ui, premium modern html template">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= INCLUDE_DIR ?>/images/brand/favicon.ico" />

    <!-- TITLE -->
    <title>Wishkick</title>

    <!-- BOOTSTRAP CSS -->
    <link href="<?= INCLUDE_DIR ?>/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="<?= INCLUDE_DIR ?>/css/style.css" rel="stylesheet"/>
    <link href="<?= INCLUDE_DIR ?>/css/skin-modes.css" rel="stylesheet"/>
    <link href="<?= INCLUDE_DIR ?>/css-dark/dark-style.css" rel="stylesheet"/>

    <!-- SIDE-MENU CSS -->
    <link href="<?= INCLUDE_DIR ?>/plugins/sidemenu/sidemenu.css" rel="stylesheet">

    <!-- SINGLE-PAGE CSS -->
    <link href="<?= INCLUDE_DIR ?>/plugins/single-page/css/main.css" rel="stylesheet" type="text/css">

    <!--C3 CHARTS CSS -->
    <link href="<?= INCLUDE_DIR ?>/plugins/charts-c3/c3-chart.css" rel="stylesheet"/>

    <!-- CUSTOM SCROLL BAR CSS-->
    <link href="<?= INCLUDE_DIR ?>/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet"/>

    <!-- SIDEBAR CSS -->
    <link href="<?= INCLUDE_DIR ?>/plugins/sidebar/sidebar.css" rel="stylesheet">

    <!--SWEET ALERT CSS-->
    <link href="<?= INCLUDE_DIR ?>/plugins/sweet-alert/sweetalert.css" rel="stylesheet" />
    <!--- FONT-ICONS CSS -->
    <link href="<?= INCLUDE_DIR ?>/css/icons.css" rel="stylesheet"/>

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="<?= INCLUDE_DIR ?>/colors/color1.css" />

</head>
<body class="dark-mode">
<form action="" method="post" id="mainFrm" style="height: 100%;">
<div class="login-img">

    <!-- GLOABAL LOADER -->
    <div id="global-loader">
        <img src="<?= INCLUDE_DIR ?>/images/loader.svg" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOABAL LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="">
            <!-- CONTAINER OPEN -->
            <div class="col col-login mx-auto">
                <div class="text-center">
                    <img src="<?= INCLUDE_DIR ?>/images/brand/logo.png" class="header-brand-img" alt="">
                </div>
            </div>
            <div class="container-login100">
                <div class="wrap-login100 p-6">
                    <form class="login100-form validate-form">
								<span class="login100-form-title">
									Login
								</span>
                        <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                            <input class="input100" type="text" name="email" placeholder="Email" id="username">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
										<i class="zmdi zmdi-email" aria-hidden="true"></i>
									</span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate = "Password is required">
                            <input class="input100" type="password" name="pass" placeholder="Password" id="password">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
										<i class="zmdi zmdi-lock" aria-hidden="true"></i>
									</span>
                        </div>
                        <div class="text-right pt-1">
                            <p class="mb-0"><a href="forgot-password.html" class="text-primary ml-1"></a></p>
                        </div>
                        <div class="container-login100-form-btn">
                            <a class="login100-form-btn btn-primary"  onclick="tryLogin('username', 'password', '/login/tryLogin'); return false;">
                                Login
                            </a>
                        </div>
<!--                        <div class="text-center pt-3">-->
<!--                            <p class="text-dark mb-0">Not a member?<a href="register.html" class="text-primary ml-1">Sign UP now</a></p>-->
<!--                        </div>-->
<!--                        <div class=" flex-c-m text-center mt-3">-->
<!--                            <p>Or</p>-->
<!--                            <div class="social-icons">-->
<!--                                <ul>-->
<!--                                    <li><a class="btn  btn-social btn-block"><i class="fa fa-google-plus text-google-plus"></i> Sign up with Google</a></li>-->
<!--                                    <li><a class="btn  btn-social btn-block mt-2"><i class="fa fa-facebook text-facebook"></i> Sign in with Facebook</a></li>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                        </div>-->
                    </form>
                </div>
            </div>
            <!-- CONTAINER CLOSED -->
        </div>
    </div>
</div>
</form>
<script src="<?= INCLUDE_DIR ?>/js/jquery-3.4.1.min.js"></script>

<!-- BOOTSTRAP JS -->
<script src="<?= INCLUDE_DIR ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= INCLUDE_DIR ?>/plugins/bootstrap/js/popper.min.js"></script>

<!-- SPARKLINE JS -->
<script src="<?= INCLUDE_DIR ?>/js/jquery.sparkline.min.js"></script>

<!-- CHART-CIRCLE JS -->
<script src="<?= INCLUDE_DIR ?>/js/circle-progress.min.js"></script>

<!-- RATING STAR JS -->
<script src="<?= INCLUDE_DIR ?>/plugins/rating/jquery.rating-stars.js"></script>
<!-- C3 CHART JS -->
<script src="<?= INCLUDE_DIR ?>/plugins/charts-c3/d3.v5.min.js"></script>
<script src="<?= INCLUDE_DIR ?>/plugins/charts-c3/c3-chart.js"></script>

<!-- INPUT MASK JS -->
<script src="<?= INCLUDE_DIR ?>/plugins/input-mask/jquery.mask.min.js"></script>
<!-- SIDEBAR JS -->
<script src="<?= INCLUDE_DIR ?>/plugins/sidebar/sidebar.js"></script>

<!-- SIDE-MENU JS -->
<script src="<?= INCLUDE_DIR ?>/plugins/sidemenu/sidemenu.js"></script>
<!-- POPOVER JS -->
<script src="<?= INCLUDE_DIR ?>/js/popover.js"></script>
<!-- SWEET-ALERT JS -->
<script src="<?= INCLUDE_DIR ?>/plugins/sweet-alert/sweetalert.min.js"></script>
<script src="<?= INCLUDE_DIR ?>/js/sweet-alert.js"></script>

<!-- CUSTOM SCROLL BAR JS-->
<script src="<?= INCLUDE_DIR ?>/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

<!-- CUSTOM JS-->
<script src="<?= INCLUDE_DIR ?>/js/custom.js"></script>

<script src="<?=INCLUDE_DIR ?>/myjs/common.js"></script>
<script src="<?=INCLUDE_DIR ?>/myjs/message.js"></script>
<script src="<?=INCLUDE_DIR?>/myjs/ajax.js"></script>
<script src="<?=INCLUDE_DIR?>/myjs/md5.js"></script>

<script type="text/javascript">
    function ShowLoginDialog() {
        $("#myModal").modal();
    }
    function hideErrorNotice()
    {
        document.getElementById('error_div').className = "alert alert-danger display-hide";
        document.getElementById("error_div").style.display = "none";
    }

    function pageMove(url) {
        var obj = document.getElementById('mainFrm');
        obj.action = url;
        obj.submit();
    }

    function tryLogin(userId, pwd, url)
    {
        var postdata = {};
        postdata['userId'] = document.getElementById(userId).value;
        postdata['pwd'] = document.getElementById(pwd).value;
        if (postdata['userId'] == "" ) {
            showWarningDialog("Please input email");
        } else if (postdata['pwd'] == ""){
            showWarningDialog("Please input password");
        } else {
            sendAjax(url, postdata, function (data) {
                if (data != null) {
                    if (data == 0 || data == "0")
                    {
                        showWarningDialog("Email or Password is incorrect, Please try again.");
                    }
                    if (data == 1 || data == "1")
                    {
                        pageMove('/dashboard/index');
                        //document.location.href('/dashboard/index');
                    }
                    if (data == 2 || data == "2") {
                        showWarningDialog("You aren't admin for site manage");
                    }
                }
            }, 'json');
        }
    }

</script>

</body>
</html>