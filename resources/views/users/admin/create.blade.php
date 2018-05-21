@extends('layouts.master')

@section('title')

@section('navbar')
 @include('shared.navbar', ['active' => strtolower($active_page ?? 'Users') ])

@stop

@section('contents')

<style type="text/css">
	.btn-info{
		background-color: #4c0019;
		border-color: #4c0019;
	}

	.btn-primary{
		background-color: #ff8100;
		border-color: #ff8100;

	}

	.btn-primary.active, .btn-primary.focus, .btn-primary:active, .btn-primary:focus, .btn-primary:hover, .open>.dropdown-toggle.btn-primary{
		background-color: #081c22;
		border-color: #081c22;
	}

	.btn-info.active, .btn-info.focus, .btn-info:active, .btn-info:focus, .btn-info:hover, .open>.dropdown-toggle.btn-info{
		background-color: #081c22;
		border-color: #081c22;
	}
</style>

<div class="page_title ">
        <div class="container">

        <h1>Users</h1>
         <div class="pagenation">&nbsp;<a href="{{url('home')}}">Home</a>  <i>/</i>Users</div>
         <br><br>
         <div class=" pull-right">
           <a class="btn btn-primary" href="{{url('users/admin/')}}">
            All Users
           </a>
        </div>

        </div>
     </div>


<div class="container">
  <dvi class="col-md-offset-2 col-md-8">
     <div id="main" class="animated fadeIn">

     <section id="content_wrapper">

     <!-- <div id="canvas-wrapper">
     <canvas id="demo-canvas"></canvas>
     </div> -->

     <section id="content" class="">
     <div class="admin-form theme-info mw700" style="margin-top: 3%;" id="login1">
     <!-- <div class="row mb15 table-layout">
     <div class="col-xs-6 text-right va-b pr5">
         <div class="login-links fs15">
         <a href="{{url('login')}}" class="" title="Sign In">Sign In</a>
         <span class="text-white"> | </span>
         <a href="{{url('register')}}" class="active" title="Register">Register</a>
         </div>
         </div>
     </div> -->
     <div class="panel panel-info mt10 br-n">

      {!! Form::open(['class'=>'form-horizontal', 'method'=>'post', 'action'=>'UsersController@store', 'files' => true ]) !!}


     <div class="panel-body p25 bg-light">
     <div style="background-color: " class="text-center section-divider mt20 mb50">
     <span><h2>SET UP USER ACCOUNT</h2></span>
     </div>

     <div class="row">
     <div class="col-md-12">

      <div class="row">
        <div class='col-md-offset-1 col-md-4' style="width:40%;">
           <div class="fileinput text-center fileinput-new" data-provides="fileinput">
                <label class="control-label">Upload Image</label>
                 <div>
                     <span class="btn btn-round btn-primary btn-sm">
                         <input type="file" id="profile_image" name="profile_image">
                     </span>
                      </div>
             </div>
        </div>


            <div class='col-md-offset-1 col-md-4' style="width:40%;">
               <div class="form-group is-empty form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label class="control-label">Title</label>
                    <select type="text" id="title" class="form-control"  placeholder="" name="title" value="{{ old('title') }}" required>
                          <option value="" selected>Select Title</option>
                          <option value="Mr">Mr</option>
                          <option value="Mrs">Mrs</option>
                          <option value="Miss">Miss</option>
                          <option value="Engr">Engr</option>
                    </select>
                    @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                    @endif
                    <span class=""></span></div>
            </div>
          </div>

          <div class="row">
            <div class='col-md-offset-1 col-md-4' style="width:40%;">
                <div class="form-group is-empty form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  <label class="control-label">Name</label>
                  <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                  @if ($errors->has('name'))
                  <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
                  @endif
                  <span class="gui-input"></span>
                </div>
            </div>

          <div class='col-md-offset-1 col-md-4' style="width:40%;">
             <div class="form-group is-empty form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label class="control-label">Email</label>
                  <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                  @if ($errors->has('email'))
                  <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
                  @endif
                  <span class="gui-input"></span></div>
          </div>
        </div>

        <div class="row">
          <div class='col-md-offset-1 col-md-4' style="width:40%;">
               <div class="form-group is-empty form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label class="control-label">Password</label>
                    <input type="password" name="password" class="form-control" value="{{ old('password') }}" required>
                    @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                    <span class="gui-input"></span></div>
          </div>

          <div class='col-md-offset-1 col-md-4' style="width:40%;">
           <div class="form-group">
                <label class="control-label">Confirm Password</label>
                <input type="password" name="confirmPassword" class="form-control" value="{{ old('confirmPassword') }}" required>
                <span class="gui-input"></span></div>
          </div>
        </div>

        <div class="row" >
          <div class='col-md-offset-1 col-md-4' style="width:40%;">
             <div class="form-group is-empty form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                  <label class="control-label">Phone Number</label>
                  <input type="number" name="phone_number" class="form-control" value="{{ old('phone_number') }}" required>
                  @if ($errors->has('phone_number'))
                  <span class="help-block">
                      <strong>{{ $errors->first('phone_number') }}</strong>
                  </span>
                  @endif
                  <span class="gui-input"></span></div>
          </div>

        <div class='col-md-offset-1 col-md-4' style="width:40%;">
         <div class="form-group is-empty form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
              <label class="control-label">Gender</label>
              <select type="text" id="gender" class="form-control"  placeholder="" name="gender" value="{{ old('gender') }}" required>
                    <option value="" selected>Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
              </select>
              @if ($errors->has('gender'))
              <span class="help-block">
                  <strong>{{ $errors->first('gender') }}</strong>
              </span>
              @endif
              <span class="gui-input"></span></div>
          </div>
        </div>

     </div>

     <div class="panel-footer clearfix">
     <button type="submit" class="btn btn-round btn-info">Create Account</button>
     </div>
     </div></div>

{!! Form::close() !!}
     </div>
     </div>
     </section>

     </section>

   </div>
 </div>


@stop

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
