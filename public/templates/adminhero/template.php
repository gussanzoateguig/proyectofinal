<!DOCTYPE html>
<html lang="es-ES">
  <head>
    <!-- Web config-->

    <!-- TABLE OF CONTENTS.
    Use search to find needed section.
    ===================================================================
    | 01. #CSS               | All CSS links and file paths           |
    | 02. #FAVICONS          | Favicon icon, app icons                |
    | 03. #BODY              | Body tag                               |
    | 04. #SIDEMENU          | Dashboard panel & left navigation      |
    | 05. #MAIN              | Dashboard right wrapper                |
    | 06. #VIEW              | Dashboard right wrapper inner wrapper  |
    | 07. #TOP               | Top header navigation                  |
    | 08. #TOP NAV           | Top header right navigation            |
    | 09. #RIGHT BLOCK       | Right slide panel                      |
    | 10. #PAGE HEADER       | Page top                               |
    | 11. #LAYOUT            | Basic left right coloums               |
    | 12. #PLUGINS           | All scripts and plugins                |
    |                        |                                        |
    |                        |                                        |
    ===================================================================

    -->


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminHero</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


    <!-- lib-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic">
    <!--
    link(rel='stylesheet' href='assets/stylesheets/ionicons.css')
    link(rel='stylesheet' href='assets/stylesheets/font-awesome.css')
    link(rel='stylesheet' href='assets/stylesheets/weather-icons.min.css')
    link(rel='stylesheet' href='assets/stylesheets/animate.css')
    link(rel='stylesheet' href='assets/stylesheets/glyphicon.css')

    -->

    <!--
    plugin
    link(rel='stylesheet' href='assets/stylesheets/plugin/bootstrap-table.css')
    link(rel='stylesheet' href='assets/stylesheets/plugin/nifty-modal.css')
    link(rel='stylesheet' href='assets/stylesheets/plugin/jquery.bootstrap-touchspin.css')
    link(rel='stylesheet' href='assets/stylesheets/plugin/select2.css')
    link(rel='stylesheet' href='assets/stylesheets/plugin/multi-select.css')
    link(rel='stylesheet' href='assets/stylesheets/plugin/ladda.min.css')
    link(rel='stylesheet' href='assets/stylesheets/plugin/daterangepicker.css')
    link(rel='stylesheet' href='assets/stylesheets/plugin/jquery.timepicker.css')
    link(rel="stylesheet" href="assets/stylesheets/plugin/jqvmap.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/bootstrap-submenu.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/code.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/jquery.dataTables.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/dataTables.bootstrap.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/jquery.gridster.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/summernote.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/bootstrap-markdown.min.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/bootstrap-select.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/asColorPicker.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/bootstrap-datepicker.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/jquery-labelauty.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/owl.carousel.min.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/owl.theme.default.min.css")

    -->

    <!-- QUILL -->
    <!-- Theme included stylesheets -->
    <link href="../../../public/templates/adminhero/assets/scripts/plugins/quill/quill.core.css" rel="stylesheet">
    <link href="../../../public/templates/adminhero/assets/scripts/plugins/quill/quill.snow.css" rel="stylesheet">
    <link href="../../../public/templates/adminhero/assets/scripts/plugins/quill/quill.bubble.css" rel="stylesheet">

    <!-- Theme-->
    <!-- Concat all lib & plugins css-->
    <link id="mainstyle" rel="stylesheet" href="../../../public/templates/adminhero/assets/stylesheets/theme-libs-plugins.css">
    <link id="mainstyle" rel="stylesheet" href="../../../public/templates/adminhero/assets/stylesheets/skin.css">

    <!-- Demo only-->
    <link id="mainstyle" rel="stylesheet" href="../../../public/templates/adminhero/assets/stylesheets/demo.css">

    <!-- This page only-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries--><!--[if lt IE 9]>
    <script src="assets/scripts/lib/html5shiv.js"></script>
    <script src="assets/scripts/lib/respond.js"></script><![endif]-->
    <script src="../../../public/templates/adminhero/assets/scripts/lib/modernizr-custom.js"></script>
    <script src="../../../public/templates/adminhero/assets/scripts/lib/respond.js"></script>
    <!-- Possible Classes
    ** Gradient style:
    * orchid
    * cadetblue
    * joomla
    * influenza
    * moss
    * mirage
    * stellar
    * servquick

    ** Flat style:
    * f-dark
    * f-dark-blue
    * f-blue
    * f-green

    ** Layout control
    * minibar
    * layout-drawer (changed the var on top)

    e.g
    <body class="moss layout-drawer">
    -->
    
  </head>

  <body class="orchid  ">

    <!-- #SIDEMENU-->
    <div class="mainmenu-block">
      <!-- SITE MAINMENU-->
      <nav class="menu-block">
        <ul class="nav">
          <li class="nav-item mainmenu-user-profile"><a href="user-profile.html">
              <div class="circle-box"><img src="../../../public/templates/adminhero/assets/images/face/1.jpg" alt="">
                <div class="dot dot-success"></div>
              </div>
              <div class="menu-block-label"><b><?php echo $_SESSION['sUsuario_nombre']; ?></b><br>Conectado</div></a></li>
        </ul>
        <?php
          if (!is_null($sidebar)) {
            echo '
              <ul class="nav">
            ';
              foreach ($sidebar as $modulo) {
                echo '
                <li class="menu-block-has-sub nav-item">
                  <a class="nav-link">
                    <i class="'.$modulo['data']->sModulo_icono.'"></i>
                    <div class="menu-block-label">
                      '.$modulo['data']->sModulo_nombre.'
                    </div>
                  </a>
                  <ul class="nav menu-block-sub">
                ';

                foreach ($modulo['menus'] as $menu) {
                  echo '
                    <li class="nav-item">
                      <a class="nav-link" href="http://'.$_SERVER['HTTP_HOST'].'/'.$menu->sMenu_url.'">
                        '.$menu->sMenu_nombre.'
                      </a>
                    </li>
                  ';
                }

                echo '
                  </ul>
                </li>
                ';
              }
            echo '
              </ul>
            ';
          }
        ?>
        <!-- END SITE MAINMENU-->
      </nav>
    </div>

    <!-- #MAIN-->
    <div class="main-wrapper">

      <!-- VIEW WRAPPER-->
      <div class="view-wrapper">
        <!-- TOP WRAPPER-->
        <div class="topbar-wrapper">

          <!-- NAV FOR MOBILE-->
          <div class="topbar-wrapper-mobile-nav"><a class="topbar-togger js-minibar-toggler" href="#"><i class="icon ion-ios-arrow-back hidden-md-down"></i><i class="icon ion-navicon-round hidden-lg-up"></i></a><a class="topbar-togger pull-xs-right hidden-lg-up js-nav-toggler" href="#"><i class="icon ion-android-person"></i></a>

            <!-- ADD YOUR LOGO HEREText logo: a.topbar-wrapper-logo(href="#") AdminHero
            --><a class="topbar-wrapper-logo demo-logo" href="index.html">AdminHero</a>
          </div>
          <!-- END NAV FOR MOBILE-->

          <!-- SEARCH-->
          <div class="topbar-wrapper-search">
            <form>
              <input class="form-control" type="search" placeholder="Search"><a class="topbar-togger topbar-togger-search js-close-search" href="#"><i class="icon ion-close"></i></a>
            </form>
          </div>
          <!-- END SEARCH-->

          <!-- TOP RIGHT MENU-->
          <ul class="nav navbar-nav topbar-wrapper-nav">
            <li class="nav-item"><a class="nav-link js-search-togger" href="#"><i class="icon ion-ios-search-strong"></i></a></li>

            <li class="nav-item dropdown"><a class="nav-link" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="icon fa fa-columns"></i><span class="badge badge-success status">4</span></a>

              <!-- #RIGHT BLOCK-->
              <!--
              RIGHT PANEL
              * same dropdown-menu markup, add '.dropdown-menu-side'
              -->
              <div class="dropdown-menu dropdown-menu-side">
                <ul class="nav nav-tabs nav-justified">
                  <li class="nav-item"><a class="nav-link active" data-target="#demoright-1" aria-controls="demoright-1" role="tab" data-toggle="tab"><i class="ion-help-buoy icon"></i></a></li>
                  <li class="nav-item"><a class="nav-link" data-target="#demoright-2" aria-controls="demoright-2" role="tab" data-toggle="tab"><i class="ion-quote icon"></i></a></li>
                  <li class="nav-item"><a class="nav-link" data-target="#demoright-3" aria-controls="demoright-3" role="tab" data-toggle="tab"><i class="ion-gear-b icon"></i></a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active fade in" role="tabpanel" id="demoright-1"><a class="dropdown-item media circle-box" href="#">
                      <div class="media-left media-middle"><img class="media-object circle-object" src="../../../public/templates/adminhero/assets/images/face/2.jpg" alt=""></div>
                      <div class="media-body">
                        <div class="media-heading">Ryan Sears</div>
                        <p class="text-muted small">Rome; Hard there to deeply verbal page goals a accept into it pri</p>
                      </div></a><a class="dropdown-item media circle-box" href="#">
                      <div class="media-left media-middle">
                        <div class="media-object circle-object bg-info"><i class="ion-calendar"></i></div>
                      </div>
                      <div class="media-body">
                        <div class="media-heading">Event remind.</div>
                        <p class="text-muted small">10 min ago</p>
                      </div></a><a class="dropdown-item media circle-box" href="#">
                      <div class="media-left media-middle">
                        <div class="media-object circle-object bg-success">40%</div>
                      </div>
                      <div class="media-body">
                        <div class="media-heading">Event remind.</div>
                        <div class="progress">
                          <progress class="progress progress-danger loader" value="46" max="100"></progress>
                        </div>
                        <p class="text-muted small">10 min ago</p>
                      </div></a><a class="dropdown-item media circle-box" href="#">
                      <div class="media-left media-middle">
                        <div class="media-object circle-object bg-danger">2d</div>
                      </div>
                      <div class="media-body">
                        <div class="media-heading">Project deadline.</div>
                        <div class="progress">
                          <progress class="progress progress-success loader" value="80" max="100"></progress>
                        </div>
                        <p class="text-muted small">80% completion</p>
                      </div></a><a class="dropdown-item media circle-box" href="#">
                      <div class="media-left media-middle"><img class="media-object circle-object" src="../../../public/templates/adminhero/assets/images/face/1.jpg" alt=""></div>
                      <div class="media-body">
                        <div class="media-heading">Judith Sullivan</div>
                        <p class="text-muted small">Option wouldn't small hardly of and more believe The fundamentals</p>
                      </div></a><a class="dropdown-item media circle-box" href="#">
                      <div class="media-left media-middle"><img class="media-object circle-object" src="../../../public/templates/adminhero/assets/images/face/2.jpg" alt=""></div>
                      <div class="media-body">
                        <div class="media-heading">Judith Sullivan</div>
                        <p class="text-muted small">Option wouldn't small hardly of and more believe The fundamentals</p>
                      </div></a><a class="dropdown-item media circle-box" href="#">
                      <div class="media-left media-middle"><img class="media-object circle-object" src="../../../public/templates/adminhero/assets/images/face/3.jpg" alt=""></div>
                      <div class="media-body">
                        <div class="media-heading">Judith Sullivan</div>
                        <p class="text-muted small">Option wouldn't small hardly of and more believe The fundamentals</p>
                      </div></a><a class="dropdown-item media circle-box" href="#">
                      <div class="media-left media-middle"><img class="media-object circle-object" src="../../../public/templates/adminhero/assets/images/face/4.jpg" alt=""></div>
                      <div class="media-body">
                        <div class="media-heading">Judith Sullivan</div>
                        <p class="text-muted small">Option wouldn't small hardly of and more believe The fundamentals</p>
                      </div></a><a class="dropdown-item media circle-box" href="#">
                      <div class="media-left media-middle"><img class="media-object circle-object" src="../../../public/templates/adminhero/assets/images/face/1.jpg" alt=""></div>
                      <div class="media-body">
                        <div class="media-heading">Judith Sullivan</div>
                        <p class="text-muted small">Option wouldn't small hardly of and more believe The fundamentals</p>
                      </div></a><a class="dropdown-item media circle-box" href="#">
                      <div class="media-left media-middle"><img class="media-object circle-object" src="../../../public/templates/adminhero/assets/images/face/2.jpg" alt=""></div>
                      <div class="media-body">
                        <div class="media-heading">Judith Sullivan</div>
                        <p class="text-muted small">Option wouldn't small hardly of and more believe The fundamentals</p>
                      </div></a><a class="dropdown-item media circle-box" href="#">
                      <div class="media-left media-middle"><img class="media-object circle-object" src="../../../public/templates/adminhero/assets/images/face/3.jpg" alt=""></div>
                      <div class="media-body">
                        <div class="media-heading">Judith Sullivan</div>
                        <p class="text-muted small">Option wouldn't small hardly of and more believe The fundamentals</p>
                      </div></a><a class="dropdown-item media circle-box" href="#">
                      <div class="media-left media-middle"><img class="media-object circle-object" src="../../../public/templates/adminhero/assets/images/face/4.jpg" alt=""></div>
                      <div class="media-body">
                        <div class="media-heading">Judith Sullivan</div>
                        <p class="text-muted small">Option wouldn't small hardly of and more believe The fundamentals</p>
                      </div></a><a class="dropdown-item media circle-box" href="#">
                      <div class="media-left media-middle"><img class="media-object circle-object" src="../../../public/templates/adminhero/assets/images/face/1.jpg" alt=""></div>
                      <div class="media-body">
                        <div class="media-heading">Judith Sullivan</div>
                        <p class="text-muted small">Option wouldn't small hardly of and more believe The fundamentals</p>
                      </div></a><a class="dropdown-item media circle-box" href="#">
                      <div class="media-left media-middle"><img class="media-object circle-object" src="../../../public/templates/adminhero/assets/images/face/2.jpg" alt=""></div>
                      <div class="media-body">
                        <div class="media-heading">Judith Sullivan</div>
                        <p class="text-muted small">Option wouldn't small hardly of and more believe The fundamentals</p>
                      </div></a><a class="dropdown-item media circle-box" href="#">
                      <div class="media-left media-middle"><img class="media-object circle-object" src="../../../public/templates/adminhero/assets/images/face/3.jpg" alt=""></div>
                      <div class="media-body">
                        <div class="media-heading">Judith Sullivan</div>
                        <p class="text-muted small">Option wouldn't small hardly of and more believe The fundamentals</p>
                      </div></a><a class="dropdown-item media circle-box" href="#">
                      <div class="media-left media-middle"><img class="media-object circle-object" src="../../../public/templates/adminhero/assets/images/face/4.jpg" alt=""></div>
                      <div class="media-body">
                        <div class="media-heading">Judith Sullivan</div>
                        <p class="text-muted small">Option wouldn't small hardly of and more believe The fundamentals</p>
                      </div></a><a class="dropdown-item media circle-box" href="#">
                      <div class="media-left media-middle"><img class="media-object circle-object" src="../../../public/templates/adminhero/assets/images/face/1.jpg" alt=""></div>
                      <div class="media-body">
                        <div class="media-heading">Judith Sullivan</div>
                        <p class="text-muted small">Option wouldn't small hardly of and more believe The fundamentals</p>
                      </div></a><a class="dropdown-item media circle-box" href="#">
                      <div class="media-left media-middle"><img class="media-object circle-object" src="../../../public/templates/adminhero/assets/images/face/2.jpg" alt=""></div>
                      <div class="media-body">
                        <div class="media-heading">Judith Sullivan</div>
                        <p class="text-muted small">Option wouldn't small hardly of and more believe The fundamentals</p>
                      </div></a><a class="dropdown-item media circle-box" href="#">
                      <div class="media-left media-middle"><img class="media-object circle-object" src="../../../public/templates/adminhero/assets/images/face/3.jpg" alt=""></div>
                      <div class="media-body">
                        <div class="media-heading">Judith Sullivan</div>
                        <p class="text-muted small">Option wouldn't small hardly of and more believe The fundamentals</p>
                      </div></a><a class="dropdown-item media circle-box" href="#">
                      <div class="media-left media-middle"><img class="media-object circle-object" src="../../../public/templates/adminhero/assets/images/face/4.jpg" alt=""></div>
                      <div class="media-body">
                        <div class="media-heading">Judith Sullivan</div>
                        <p class="text-muted small">Option wouldn't small hardly of and more believe The fundamentals</p>
                      </div></a>
                  </div>
                  <div class="tab-pane p-a-1 fade" role="tabpanel" id="demoright-2"></div>
                  <div class="tab-pane p-a-1 fade" role="tabpanel" id="demoright-3"></div>
                </div>
              </div>
              <!-- END RIGHt PANEL-->
            </li>

            <li class="nav-item dropdown"><a class="nav-link" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="icon ion-android-notifications-none"></i><span class="badge badge-danger status">9+</span></a>
              <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header">Notifications (5)</div>
                <div class="dropdown-menu-inner"><a class="dropdown-item media circle-box" href="#">
                    <div class="media-left media-middle"><img class="media-object circle-object" src="../../../public/templates/adminhero/assets/images/face/2.jpg" alt=""></div>
                    <div class="media-body">
                      <div class="media-heading">Ryan Sears</div>
                      <p class="text-muted small">Pink do well together specially name if design postage briefs big into in her working</p>
                    </div></a><a class="dropdown-item media circle-box" href="#">
                    <div class="media-left media-middle">
                      <div class="media-object circle-object bg-danger"><i class="fa fa-bug"></i></div>
                    </div>
                    <div class="media-body">
                      <div class="media-heading">Server Error</div>
                      <p class="text-muted small">3 minutes ago</p>
                    </div></a><a class="dropdown-item media circle-box" href="#">
                    <div class="media-left media-middle">
                      <div class="media-object circle-object bg-success"><i class="fa fa-check"></i></div>
                    </div>
                    <div class="media-body">
                      <div class="media-heading">Server Error Reports</div>
                      <p class="text-muted small">3 minutes ago</p>
                    </div></a><a class="dropdown-item media circle-box" href="#">
                    <div class="media-left media-middle"><img class="media-object circle-object" src="../../../public/templates/adminhero/assets/images/face/1.jpg" alt=""></div>
                    <div class="media-body">
                      <div class="media-heading">Judith Sullivan</div>
                      <p class="text-muted small">Option wouldn't small hardly of and more believe The fundamentals</p>
                    </div></a><a class="dropdown-item media circle-box" href="#">
                    <div class="media-left media-middle"><img class="media-object circle-object" src="../../../public/templates/adminhero/assets/images/face/2.jpg" alt=""></div>
                    <div class="media-body">
                      <div class="media-heading">Judith Sullivan</div>
                      <p class="text-muted small">Option wouldn't small hardly of and more believe The fundamentals</p>
                    </div></a><a class="dropdown-item media circle-box" href="#">
                    <div class="media-left media-middle"><img class="media-object circle-object" src="../../../public/templates/adminhero/assets/images/face/3.jpg" alt=""></div>
                    <div class="media-body">
                      <div class="media-heading">Judith Sullivan</div>
                      <p class="text-muted small">Option wouldn't small hardly of and more believe The fundamentals</p>
                    </div></a><a class="dropdown-item media circle-box" href="#">
                    <div class="media-left media-middle"><img class="media-object circle-object" src="../../../public/templates/adminhero/assets/images/face/4.jpg" alt=""></div>
                    <div class="media-body">
                      <div class="media-heading">Judith Sullivan</div>
                      <p class="text-muted small">Option wouldn't small hardly of and more believe The fundamentals</p>
                    </div></a>
                </div><a class="dropdown-item" href="#">
                  <div class="text-xs-center"><i class="ion-more"></i></div></a>
              </div>
            </li>
            <li class="nav-item dropdown"><a class="nav-link" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="icon ion-paintbucket"></i></a>
              <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg">
                <div class="js-color-switcher demo-color-switcher">
                  <div class="dropdown-header">Flat</div>
                  <div class="list-inline"><a class="list-inline-item" href="#" data-color="f-dark">
                      <div class="demo-skin-grid f-dark"></div></a><a class="list-inline-item" href="#" data-color="f-dark-blue">
                      <div class="demo-skin-grid f-dark-blue"></div></a><a class="list-inline-item" href="#" data-color="f-blue">
                      <div class="demo-skin-grid f-blue"></div></a><a class="list-inline-item" href="#" data-color="f-green">
                      <div class="demo-skin-grid f-green"></div></a><a class="list-inline-item" href="#" data-color="f-deep-taupe">
                      <div class="demo-skin-grid f-deep-taupe"></div></a>
                  </div>
                  <div class="dropdown-header">Gradient</div>
                  <div class="list-inline"><a class="list-inline-item" href="#" data-color="orchid">
                      <div class="demo-skin-grid orchid"></div></a><a class="list-inline-item" href="#" data-color="cadetblue">
                      <div class="demo-skin-grid cadetblue"></div></a><a class="list-inline-item" href="#" data-color="joomla">
                      <div class="demo-skin-grid joomla"></div></a><a class="list-inline-item" href="#" data-color="influenza">
                      <div class="demo-skin-grid influenza"></div></a><a class="list-inline-item" href="#" data-color="moss">
                      <div class="demo-skin-grid moss"></div></a><a class="list-inline-item" href="#" data-color="mirage">
                      <div class="demo-skin-grid mirage"></div></a><a class="list-inline-item" href="#" data-color="stellar">
                      <div class="demo-skin-grid stellar"></div></a><a class="list-inline-item" href="#" data-color="servquick">
                      <div class="demo-skin-grid servquick"></div></a>
                  </div>
                </div>
              </div>
            </li>
            <li class="nav-item"><a class="nav-link" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/usuario/logout/"><i class="icon ion-android-exit"></i></a></li>
            <li class="nav-item"><a class="nav-link close-mobile-nav js-close-mobile-nav" href="#"><i class="icon ion-close"></i></a></li>
            <!-- END TOP RIGHT MENU-->
          </ul>
        </div>
        <!--END TOP WRAPPER-->


        <!-- PAGE CONTENT HERE-->
        <!-- #PAGE HEADER-->
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>
          <li class="active">Basic Layout</li>
        </ol>

        <!-- #LAYOUT-->
        <?php echo $contenido; ?>
        <!-- END PAGE CONTENT-->

      </div>
      <!-- END VIEW WAPPER-->

    </div>
    <!-- END MAIN WRAPPER-->

    <?php echo $addons; ?>

    <!-- WEB PERLOAD-->
    <div id="preload">
      <ul class="loading">
        <li></li>
        <li></li>
        <li></li>
      </ul>
    </div>



    <!-- Lib-->
    <script src="../../../public/templates/adminhero/assets/scripts/lib/jquery-1.11.3.min.js"></script>
    <script src="../../../public/templates/adminhero/assets/scripts/lib/jquery-ui.js"></script>
    <script src="../../../public/templates/adminhero/assets/scripts/lib/tether.min.js"></script>

    <!-- Bootstrap js-->
    <!-- script(src="assets/bootstrap/js/bootstrap.min.js")-->

    <!-- Cookie js-->
    <!-- script(src="assets/scripts/plugins/js.cookie.js")-->

    <!-- Moment: Full featured date library for parsing, validating, manipulating, and formatting dates.-->
    <!-- script(src="assets/scripts/plugins/moment.min.js")-->

    <!-- Fastclick: Polyfill to remove click delays on browsers with touch UIs.-->
    <!-- script(src="assets/scripts/plugins/fastclick.js")-->

    <!-- Masonry: Grid layout library.-->
    <!-- script(src="assets/scripts/plugins/masonry.pkgd.min.js")-->

    <!-- Peity: is a simple jQuery plugin that converts an element's content into a simple <svg>.-->
    <!-- script(src="assets/scripts/plugins/jquery.peity.min.js")-->

    <!-- imagesloaded: Detect when images have been loaded.-->
    <!-- script(src="assets/scripts/plugins/imagesloaded.pkgd.js")-->

    <!-- MatchHeight: A responsive equal heights-->
    <!-- script(src="assets/scripts/plugins/jquery.matchHeight.js")-->

    <!-- Select2: JQuery based replacement for select boxes-->
    <!-- script(src="assets/scripts/plugins/select2.full.min.js")-->

    <!-- jQuery multiselect: jQuery plugin which is a drop-in replacement for the standard <select> element-->
    <!-- script(src="assets/scripts/plugins/jquery.multi-select.js")-->

    <!-- Bootstrap-tagsinput: jQuery tags input plugin based on Twitter Bootstrap.-->
    <!-- script(src="assets/scripts/plugins/bootstrap-tagsinput.js")-->

    <!-- Bootstrap-maxlength: Display the maximum lenght of the field-->
    <!-- script(src="assets/scripts/plugins/bootstrap-maxlength.min.js")-->

    <!-- Chartjs: Simple HTML5 Charts using the canvas element-->
    <!-- script(src="assets/scripts/plugins/Chart.min.js")-->
    <!-- script(src="assets/scripts/plugins/Chart.config.js")-->

    <!-- Bootstrap-touchspin: A mobile and touch friendly input spinner component for Bootstrap 3.-->
    <!-- script(src="assets/scripts/plugins/jquery.bootstrap-touchspin.min.js")-->

    <!-- Date Range Picker: A JavaScript component for choosing date ranges.-->
    <!-- script(src="assets/scripts/plugins/daterangepicker.js")-->

    <!-- jquery.timepicker: A lightweight, customizable javascript timepicker plugin.-->
    <!-- script(src="assets/scripts/plugins/jquery.timepicker.js")-->

    <!-- Bootstrap-submenu-->
    <!-- script(src="assets/scripts/plugins/bootstrap-submenu.js")-->

    <!-- Prismjs: Code syntax highlighting library-->
    <!-- script(src="assets/scripts/plugins/prism.js")-->

    <!-- bootstrap-table: An extended Bootstrap table-->
    <!-- script(src="assets/scripts/plugins/bootstrap-table.min.js")-->

    <!-- Grid layout-->
    <!-- script(src="assets/scripts/plugins/jquery.gridster.js")-->

    <!-- super simple slider-->
    <!-- script(src="assets/scripts/plugins/sss.min.js")-->

    <!-- Easy-pie-chart: Lightweight  pie charts-->
    <!-- script(src="assets/scripts/plugins/jquery.easypiechart.min.js")-->

    <!-- Summernote: Lightweight html5 editor-->
    <!-- script(src="assets/scripts/plugins/summernote.min.js")-->

    <!-- Bootstrap plugin for markdown editing-->
    <!-- script(src="assets/scripts/plugins/behave.js")-->
    <!-- script(src="assets/scripts/plugins/markdown.js")-->
    <!-- script(src="assets/scripts/plugins/to_markdown.js")-->
    <!-- script(src="assets/scripts/plugins/bootstrap-markdown.js")-->

    <!-- DataTables: It is a highly flexible HTML table.-->
    <!-- script(src="assets/scripts/plugins/jquery.dataTables.min.js")-->
    <!-- script(src="assets/scripts/plugins/dataTables.bootstrap.js")-->

    <!-- Ladda: Buttons with built-in loading indicators.-->
    <!-- script(src="assets/scripts/plugins/spin.min.js")-->
    <!-- script(src="assets/scripts/plugins/ladda.min.js")-->

    <!-- Counterup: Counts up to a targeted number when the number becomes visible.-->
    <!-- script(src="assets/scripts/plugins/waypoints.min.js")-->
    <!-- script(src="assets/scripts/plugins/jquery.counterup.min.js")-->

    <!-- Bootstrap-select: Bootstrap's dropdown.js to style and bring additional functionality to normal select boxes.-->
    <!-- script(src="assets/scripts/plugins/bootstrap-select.js")-->

    <!-- Bootstrap-select: Bootstrap's dropdown.js to style and bring additional functionality to normal select boxes.-->
    <!-- script(src="assets/scripts/plugins/bootstrap-datepicker.js")-->

    <!-- jQuery asColorPicker-->
    <!-- script(src="assets/scripts/plugins/jquery-asColor.js")-->
    <!-- script(src="assets/scripts/plugins/jquery-asGradient.js")-->
    <!-- script(src="assets/scripts/plugins/jquery-asColorPicker.js")-->

    <!-- Labelauty jQuery Plugin: checkboxes and radio buttons-->
    <!-- script(src="assets/scripts/plugins/jquery-labelauty.js")-->

    <!-- Simple upload ui-->
    <!-- script(src="assets/scripts/plugins/upload.js")-->

    <!-- parsleyjs: the ultimate JavaScript form validation library-->
    <!-- script(src="assets/scripts/plugins/parsley.min.js")-->

    <!-- Owl Carousel 2: Touch enabled jQuery plugin that lets you create a beautiful responsive carousel slider.-->
    <!-- script(src="assets/scripts/plugins/owl.carousel.js")-->

    <!-- QUILL -->
    <script src="../../../public/templates/adminhero/assets/scripts/plugins/quill/quill.core.js"></script>
    <script src="../../../public/templates/adminhero/assets/scripts/plugins/quill/quill.js"></script>
    <script src="../../../public/templates/adminhero/assets/scripts/plugins/quill/quill.min.js"></script>

    <!-- NOTIFY -->
    <script src="../../../public/templates/adminhero/assets/scripts/plugins/notify.js"></script>

    <!-- Theme js-->
    <!-- Concat all plugins js-->
    <script src="../../../public/templates/adminhero/assets/scripts/theme/theme-plugins.js"></script>
    <script src="../../../public/templates/adminhero/assets/scripts/theme/main.js"></script>
    <!-- Below js just for this demo only-->
    <script src="../../../public/templates/adminhero/assets/scripts/demo/demo-skin.js"></script>
    <script src="../../../public/templates/adminhero/assets/scripts/demo/bar-chart-menublock.js"></script>

    <!-- Below js just for this page only-->
    <?php echo $footer; ?>
  </body>
</html>
