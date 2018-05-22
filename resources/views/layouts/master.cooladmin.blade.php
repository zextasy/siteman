<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible"  content="IE=edge">
    <title>SiteMan | Molcom Multi-Concepts</title>
    <meta name="keywords" content="" />
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Title Page-->
    <title>Dashboard 3</title>

    <!-- Fontfaces CSS-->
    <link href="{{url('cooladmin/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{url('cooladmin/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('cooladmin/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('cooladmin/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{url('cooladmin/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{url('cooladmin/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('cooladmin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('cooladmin/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{url('cooladmin/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('cooladmin/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{url('cooladmin/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('cooladmin/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{url('cooladmin/css/theme.css')}}" rel="stylesheet" media="all">
    <!--Original Template's Styles -->
<!-- Favicon -->
<link rel="shortcut icon" href="#">


<!-- Google fonts  -->

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

<!-- Template's stylesheets -->
<link href="{{url('dist/css/style.css?ver=1.2')}}" rel="stylesheet" type="text/css">
<link href="{{url('dist/css/reset.css?ver=2.1')}}" rel="stylesheet" type="text/css">
<link href="{{url('dist/css/responsive-leyouts.css')}}" rel="stylesheet" type="text/css">
<link href="{{url('dist/css/fonts/et-line-font/et-line-font.css')}}" rel="stylesheet" type="text/css">
<link href="{{url('dist/css/fonts/font-awesome/css/font-awesome.css')}}" rel="stylesheet" type="text/css">
<link href="{{url('dist/css/fonts/Simple-Line-Icons-Webfont/simple-line-icons.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" media="screen" href="{{url('dist/js/bootstrap/css/bootstrap.min.css?ver63y48')}}" type="text/css" />
<link rel="stylesheet" href="{{url('dist/js/mainmenu/menu.css')}}" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{url('dist/js/revolution-slider/css/settings.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('dist/js/revolution-slider/css/layers.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('dist/js/revolution-slider/css/navigation.css')}}">
<!-- accordion -->
<link href="{{url('dist/js/accordion/css/smk-accordion.css')}}" rel="stylesheet">
<!-- tabs -->
<link href="{{url('dist/js/tabs/assets/css/responsive-tabs3.css')}}" rel="stylesheet" type="text/css">
<!-- animations -->
<link href="{{url('dist/js/animations/css/animations.min.css')}}" rel="stylesheet" type="text/css" media="all" />
<!-- progressbar -->
<link rel="stylesheet" href="{{url('dist/js/progressbar/ui.progress-bar.css')}}">
<!-- cubeportfolio -->
<link rel="stylesheet" href="{{url('dist/js/cubeportfolio/css/cubeportfolio.min.css')}}">
<!-- owl carousel -->
<link href="{{url('dist/js/carouselowl/owl.transitions.css')}}" rel="stylesheet" type="text/css">
<link href="{{url('dist/js/carouselowl/owl.carousel.css')}}" rel="stylesheet" type="text/css">
<!--Style Swicher-->
<link rel="stylesheet" href="{{url('dist/js/style-swicher/style-swicher.css')}}" type="text/css" />
<link rel="stylesheet" href="{{url('css/select2.min.css')}}" type="text/css" />
<!-- NProgress -->

<style type="text/css">
  .modal-dialog {
  margin-top: 0;
  margin-bottom: 0;
  height: 90vh;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.modal.fade .modal-dialog {
  transform: translate(0, -100%);
}

.modal.in .modal-dialog {
  transform: translate(0, 0);
}
</style>
@yield('styles')
</head>

<body class="animsition">
    <div class="page-wrapper">
      @yield('navbar')

        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">
            <!-- BREADCRUMB-->
{{--             <section class="au-breadcrumb2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="au-breadcrumb-content">
                                <div class="au-breadcrumb-left">
                                    <span class="au-breadcrumb-span">You are here:</span>
                                    <ul class="list-unstyled list-inline au-breadcrumb__list">
                                        <li class="list-inline-item active">
                                            <a href="#">Home</a>
                                        </li>
                                        <li class="list-inline-item seprate">
                                            <span>/</span>
                                        </li>
                                        <li class="list-inline-item">Dashboard</li>
                                    </ul>
                                </div>
                                <form class="au-form-icon--sm" action="" method="post">
                                    <input class="au-input--w300 au-input--style2" type="text" placeholder="Search for datas &amp; reports...">
                                    <button class="au-btn--submit2" type="submit">
                                        <i class="zmdi zmdi-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section> --}}
            <!-- END BREADCRUMB-->

            <!-- WELCOME-->
{{--             <section class="welcome p-t-10">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="title-4">Welcome back
                                <span>John!</span>
                            </h1>
                            <hr class="line-seprate">
                        </div>
                    </div>
                </div>
            </section> --}}
            <!-- END WELCOME-->
                <div class="row">
                <div class="col-md-12">

                    @if (Session::has('message'))
                        <div class="note note-info">
                            <p>{{ Session::get('message') }}</p>
                        </div>
                    @endif
                    @if ($errors->count() > 0)
                        <div class="note note-danger">
                            <ul class="list-unstyled">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @yield('content')

                </div>
            </div>
    @yield('contents')
            

            <!-- COPYRIGHT-->
            <section class="p-t-60 p-b-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © 2018 Molcom Multi-Concepts Limited All rights reserved.</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END COPYRIGHT-->
        </div>

    </div>
    @yield('extras')

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>
<!--Original Template's Scripts -->


<script type="text/javascript" src="{{url('dist/js/universal/jquery.js')}}"></script>
<script type="text/javascript" src="{{url('js/jquery-latest.min.js')}}"></script>
<script type="text/javascript" src="{{url('js/select2.min.js?ver=4.3')}}"></script>

<script src="{{url('dist/js/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>

<!-- script for select2 -->


<script src="{{url('dist/js/mainmenu/customeUI.js')}}"></script>
<script src="{{url('dist/js/mainmenu/jquery.sticky.js')}}"></script>
<script src="{{url('dist/js/scripts/functions.js')}}" type="text/javascript"></script>
<script src="{{url('dist/js/style-customizer/js/spectrum.html')}}"></script>
<script src="{{url('dist/js/less/less.min.html')}}" data-env="development"></script>
<script src="{{url('dist/js/accordion/js/smk-accordion.js')}}"></script>
<script src="{{url('dist/js/accordion/js/custom.js')}}"></script>
<script src="{{url('dist/js/tabs/assets/js/responsive-tabs.min.js')}}"></script>
<script src="{{url('dist/js/carouselowl/owl.carousel.js')}}"></script>
<script type="text/javascript" src="{{url('dist/js/universal/custom.js')}}"></script>
<script src="{{url('dist/js/aninum/jquery.animateNumber.min.js')}}"></script>
<script src="{{url('dist/js/animations/js/animations.min.js')}}" type="text/javascript"></script>
<script src="{{url('dist/js/scrolltotop/totop.js')}}" type="text/javascript"></script>


<script type="text/javascript" src="{{url('dist/js/cubeportfolio/jquery.cubeportfolio.min.js')}}"></script>
<script type="text/javascript" src="{{url('dist/js/cubeportfolio/main.js')}}"></script>
<script src="{{url('dist/js/progressbar/progress.js')}}" type="text/javascript" charset="utf-8"></script>
<script src="{{url('dist/js/style-swicher/style-swicher.js')}}"></script>
<script src="{{url('dist/js/style-swicher/custom.js')}}"></script>

<!-- REVOLUTION JS FILES -->
<script type="text/javascript" src="{{url('dist/js/revolution-slider/js/jquery.themepunch.tools.min.js?ver=1.2')}}"></script>
<script type="text/javascript" src="{{url('dist/js/revolution-slider/js/jquery.themepunch.revolution.min.js')}}"></script>
<!-- SLIDER REVOLUTION 5.0 EXTENSIONS
(Load Extensions only on Local File Systems !
The following part can be removed on Server for On Demand Loading) -->
<script type="text/javascript" src="{{url('dist/js/revolution-slider/js/extensions/revolution.extension.actions.min.js')}}"></script>
<script type="text/javascript" src="{{url('dist/js/revolution-slider/js/extensions/revolution.extension.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{url('dist/js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js')}}"></script><script type="text/javascript" src="{{url('dist/js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
<script type="text/javascript" src="{{url('dist/js/revolution-slider/js/extensions/revolution.extension.migration.min.js')}}"></script>
<script type="text/javascript" src="{{url('dist/js/revolution-slider/js/extensions/revolution.extension.navigation.min.js')}}"></script>
<script type="text/javascript" src="{{url('dist/js/revolution-slider/js/extensions/revolution.extension.parallax.min.js')}}"></script>
<script type="text/javascript" src="{{url('dist/js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
<script type="text/javascript" src="{{url('js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{url('dist/js/revolution-slider/js/extensions/revolution.extension.video.min.js')}}"></script>



<script type="text/javascript">
  var tpj=jQuery;
  var revapi4;
  tpj(document).ready(function() {
  if(tpj("#rev_slider").revolution == undefined){
  revslider_showDoubleJqueryError("#rev_slider");
  }else{
    revapi4 = tpj("#rev_slider").show().revolution({
    sliderType:"standard",
    jsFileLocation:"js/revolution-slider/js/",
    sliderLayout:"auto",
    dottedOverlay:"none",
    delay:9000,
    navigation: {
    keyboardNavigation:"off",
    keyboard_direction: "horizontal",
    mouseScrollNavigation:"off",
    onHoverStop:"off",
    arrows: {
    style:"erinyen",
    enable:true,
    hide_onmobile:true,
    hide_under:778,
    hide_onleave:true,
    hide_delay:200,
    hide_delay_mobile:1200,
    tmp:'',
    left: {
    h_align:"left",
    v_align:"center",
    h_offset:80,
    v_offset:0
    },
    right: {
    h_align:"right",
    v_align:"center",
    h_offset:80,
    v_offset:0
    }
    }
    ,
    touch:{
    touchenabled:"on",
    swipe_threshold: 75,
    swipe_min_touches: 1,
    swipe_direction: "horizontal",
    drag_block_vertical: false
  }
  ,



  },
    viewPort: {
    enable:true,
    outof:"pause",
    visible_area:"80%"
  },

  responsiveLevels:[1240,1024,778,480],
  gridwidth:[1240,1024,778,480],
   gridheight: [868,748, 748, 680],
  lazyType:"smart",
    parallax: {
    type:"mouse",
    origo:"slidercenter",
    speed:2000,
    levels:[2,3,4,5,6,7,12,16,10,50],
    },
  shadow:0,
  spinner:"off",
  stopLoop:"off",
  stopAfterLoops:-1,
  stopAtSlide:-1,
  shuffle:"off",
  autoHeight:"off",
  hideThumbsOnMobile:"off",
  hideSliderAtLimit:0,
  hideCaptionAtLimit:0,
  hideAllCaptionAtLilmit:0,
  disableProgressBar:"on",
  debugMode:false,
    fallbacks: {
    simplifyAll:"off",
    nextSlideOnWindowFocus:"off",
    disableFocusListener:false,
    }
  });
  }
  }); /*ready*/
</script>
<script type="text/javascript">
                var tpj = jQuery;

                var revapi280;
                tpj(document).ready(function() {
                    if (tpj("#rev_slider_280_1").revolution == undefined) {
                        revslider_showDoubleJqueryError("#rev_slider_280_1");
                    } else {
                        revapi280 = tpj("#rev_slider_280_1").show().revolution({
                            sliderType: "hero",
                            jsFileLocation: "../../revolution/js/",
                            sliderLayout: "auto",
                            dottedOverlay: "none",
                            delay: 9000,
                            navigation: {},
                            responsiveLevels: [1240, 1024, 778, 480],
                            visibilityLevels: [1240, 1024, 778, 480],
                            gridwidth: [1000, 1024, 778, 480],
                            gridheight: [520, 420, 420, 720],
                            lazyType: "none",
              parallax: {
                  type:"mouse+scroll",
                  origo:"slidercenter",
                  speed:2000,
                  levels:[1,2,3,20,25,30,35,40,45,50],
                  disable_onmobile:"on"
                },
                            shadow: 0,
                            spinner: "spinner2",
                            autoHeight: "off",
                            fullScreenAutoWidth: "off",
                            fullScreenAlignForce: "off",
                            fullScreenOffsetContainer: "",
                            fullScreenOffset: "60",
                            disableProgressBar: "on",
                            hideThumbsOnMobile: "off",
                            hideSliderAtLimit: 0,
                            hideCaptionAtLimit: 0,
                            hideAllCaptionAtLilmit: 0,
                            debugMode: false,
                            fallbacks: {
                                simplifyAll: "off",
                                disableFocusListener: false,
                            }
                        });
                    }
                }); /*ready*/
            </script>

            <script type="text/javascript">
                 $('.select2').select2({
            placeholder: "Type in your Options"
                });


              $('.tags').select2({
                tags:true
                  }) ;

            </script>
<script>
    $(window).load(function(){
      setTimeout(function(){

        $('.loader-live').fadeOut();
      },1000);
    })

  </script>


<script type="text/javascript">
   BASE = document.getElementById('base').value;
  function edit(title, url, name) {


      var modal_title = document.getElementById('modal-title');
      modal_title.innerHTML = title;
        var modal_body = document.getElementById('modal-body');


      modal_body.innerHTML = '<div class="text-info">Just a minute. Please, wait...</div>';
      $('#modal-body').load(BASE+'/'+url+'/'+name);
    }

    function del(title, url, name) {


      var modal_title = document.getElementById('modal-title');
      modal_title.innerHTML = title;
        var modal_body = document.getElementById('modal-body');


      modal_body.innerHTML = '<div class="text-info">Just a minute. Please, wait...</div>';
      $('#modal-body').load(BASE+'/'+url+'/'+name);
    }

    function edit_attr(title, url, attr_id, name) {

  //alert(BASE+'/'+url+'/'+attr_id+'/'+name);
      var modal_title = document.getElementById('modal-title');
      modal_title.innerHTML = title;
        var modal_body = document.getElementById('modal-body');


      modal_body.innerHTML = '<div class="text-info">Just a minute. Please, wait...</div>';
      $('#modal-body').load(BASE+'/'+url+'/'+attr_id+'/'+name);
    }
</script>

@include('shared.modal')
</body>

</html>
<!-- end document-->