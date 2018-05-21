<html>

<head>

<link rel="stylesheet" type="text/css" href="{{url('admin/css/admin-forms.css')}}">

<link rel="stylesheet" type="text/css" href="{{url('admin/css/theme.css')}}">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" media="screen" href="{{url('dist/js/bootstrap/css/bootstrap.min.css')}}" type="text/css" />
</head>
<style type="text/css">
    body{
        background-image: "url('dist/images/slider/slider-1.jpg')";

    }
    .button, .btn-danger{
        background-color: #1cd0a9;
    }
</style>

<body class="external-page sb-l-c sb-r-c timeline-page"><br><br>
<div id="main" class="animated fadeIn">

<section id="content_wrapper">

<div id="canvas-wrapper">
<canvas id="demo-canvas"></canvas>
</div>

<section id="content">
<div class="admin-form theme-info" id="login1">
    <div class="row mb15 table-layout">
    <div class="col-xs-6 va-m pln">
    <a href="dashboard.html" title="Return to Dashboard">
    <img alt="image" src="{{url('admin/images/logo_white.png')}}" title="AdminDesigns Logo" class="img-responsive w150 hidden">
    </a>
    </div>
    <div class="col-xs-6 text-right va-b pr5">
    <div class="login-links fs15">
    <a href="{{url('login')}}" class="active" title="Sign In">Sign In</a>
    <span class="text-white"> | </span>
    <a href="{{url('register')}}" class="" title="Register">Register</a>
    </div>
    </div>
    </div>

<form class="form-horizontal" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
<div class="panel-menu pt25 bg-white">
<div class="section row mn">
<div class="col-sm-8">
Login To Your Account
</div>

</div>
</div>

<div class="panel-body bg-light p30">
<div class="row">
<div class="col-sm-12 pr30">

<div class="section{{ $errors->has('email') ? ' has-error' : '' }}">
<label for="email" class="field-label text-muted fs18 mb10">Email</label>
<label for="email" class="field prepend-icon">
<input type="text" name="email" id="email" class="gui-input" placeholder="Enter email" value="{{ old('email') }}" required autofocus>
<label for="email" class="field-icon">
<i class="fa fa-email"></i>
</label>
</label>
                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
</div>

<div class="section{{ $errors->has('password') ? ' has-error' : '' }}">
<label for="username" class="field-label text-muted fs18 mb10">Password</label>
<label for="password" class="field prepend-icon">
<input type="password" name="password" id="password" class="gui-input" placeholder="Enter password" required="">
<label for="password" class="field-icon">

</label>
</label>
            @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
 </div>

</div>

</div>
</div>

<div class="panel-footer clearfix p10 ph15">
<button type="submit" class="button btn-danger mr10 pull-right" style="background-color: #1cd0a9;">Sign In</button>
<label class="switch ib switch-warning pull-left input-align mt10">
<input type="checkbox" name="remember" id="remember" checked >
<label for="remember" data-on="YES" data-off="NO"></label>
<span>Remember me</span>
</label>
</div>

</form>
</div>
</section>

</section>

</div>
</body>

</body>

<script src="{{url('admin/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{url('admin/js/jquery-ui.min.js')}}"></script>


<script src="{{url('admin/js/canvasbg.js')}}"></script>

<script src="{{url('admin/js/utility.js')}}"></script>
<script src="{{url('admin/js/demo.js')}}"></script>
<script src="{{url('admin/js/main.js')}}"></script>
<script src="{{url('dist/js/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script> 
<script type="text/javascript" src="{{url('dist/js/universal/jquery.js')}}"></script> 

<script type="text/javascript">
    domready(function() {

        // Init Demo JS
        Demo.init();

        // Init Theme Core
        Core.init();

        // Init CanvasBG and pass target starting location
        CanvasBG.init({
            Loc: {
                x: window.innerWidth / 2,
                y: window.innerHeight / 3.3
            },
        });

    });
    </script>
</html>
