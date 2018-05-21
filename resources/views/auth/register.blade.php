

<html>

<head>

<link rel="stylesheet" type="text/css" href="{{url('admin/css/admin-forms.css')}}">

<link rel="stylesheet" type="text/css" href="{{url('admin/css/theme.css')}}">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" media="screen" href="{{url('dist/js/bootstrap/css/bootstrap.min.css')}}" type="text/css" />
</head>

<body class="external-page sb-l-c sb-r-c timeline-page"><br><br>
<div id="main" class="animated fadeIn">

<section id="content_wrapper">

<div id="canvas-wrapper">
<canvas id="demo-canvas"></canvas>
</div>

<section id="content" class="">
<div class="admin-form theme-info mw700" style="margin-top: 3%;" id="login1">
<div class="row mb15 table-layout">
<div class="col-xs-6 text-right va-b pr5">
    <div class="login-links fs15">
    <a href="{{url('login')}}" class="" title="Sign In">Sign In</a>
    <span class="text-white"> | </span>
    <a href="{{url('register')}}" class="active" title="Register">Register</a>
    </div>
    </div>
</div>
<div class="panel panel-info mt10 br-n">

<form class="form-horizontal" method="POST" action="{{ route('register') }}">
    {{ csrf_field() }}
<div class="panel-body p25 bg-light">
<div class="section-divider mt10 mb40">
<span>Set up your account</span>
</div>

<div class="section{{ $errors->has('name') ? ' has-error' : '' }}">
<label for="firstname" class="field prepend-icon">
<input type="text" name="name" id="name" class="gui-input" placeholder="Your name" value="{{ old('name') }}" required autofocus>
<label for="firstname" class="field-icon">
</label>
</label>
                        @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
</div>

<div class="section{{ $errors->has('email') ? ' has-error' : '' }}">
<label for="email" class="field prepend-icon">
<input type="email" id="email" class="gui-input"  placeholder="Your email" name="email" value="{{ old('email') }}" required>
<label for="email" class="field-icon">

</label>
</label>
@if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
</div>


<div class="section{{ $errors->has('password') ? ' has-error' : '' }}">
<label for="password" class="field prepend-icon">
<input type="password" name="password" id="password" class="gui-input" placeholder="Create a password" required>
<label for="password" class="field-icon">

</label>
</label>
@if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
</div>

 <div class="section">
<label for="confirmPassword" class="field prepend-icon">
<input type="password" name="password_confirmation" id="password_confirmation" class="gui-input" placeholder="Retype your password">
<label for="confirmPassword" class="field-icon">

</label>
</label>
</div>



</div>

<div class="panel-footer clearfix">
<button type="submit" class="button btn-primary pull-right">Create Account</button>
</div>

</form>
</div>
</div>
</section>

</section>


          
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




{{--
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

            <div class="form-block equal-height-column">
                <div class="box-Registration">
                    
                    <h2 class="margin-bottom-3 text-center text-color-2">Create new account</h2>

                    <div class="input-group margin-bottom-2{{ $errors->has('name') ? ' has-error' : '' }}">
                        <span class="input-group-addon rounded-left"><i class="icon-pencil  text-greendark"></i></span>
                        <input type="text" id="name" class="form-control rounded-right" placeholder="Your name" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                    </div>

                    
                    <div class="input-group margin-bottom-2{{ $errors->has('email') ? ' has-error' : '' }}">
                        <span class="input-group-addon rounded-left"><i class="icon-envelope  text-greendark"></i></span>
                        <input type="email" id="email" class="form-control rounded-right" placeholder="Your email" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                    </div>

                    <div class="input-group margin-bottom-3{{ $errors->has('password') ? ' has-error' : '' }}">
                        <span class="input-group-addon rounded-left"><i class="icon-lock  text-greendark"></i></span>
                        <input type="password" id="password" class="form-control rounded-right" placeholder="Password" name="password" required>
                        @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                    </div>

                    <div class="input-group margin-bottom-3">
                        <span class="input-group-addon rounded-left"><i class="icon-lock  text-greendark"></i></span>
                        <input type="password" id="password_confirmation" class="form-control rounded-right" placeholder="Confirm Password" name="password_confirmation" required>
                    </div>

                    <div class="checkbox margin-bottom3">
                        <label>
                            <input type="checkbox"> I agree to terms &amp; conditions
                        </label> 

                        <label>
                            <input type="checkbox"> Subscribe to our newsletter
                        </label>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-greendark">Create new</button>
                </div>
            </div>
        </div>
    </form>




  
        </div>
    </div>
</div>
--}}
