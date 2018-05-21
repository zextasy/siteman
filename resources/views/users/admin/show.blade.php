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

        <h1>View Users</h1>
         <div class="pagenation">&nbsp;<a href="{{url('home')}}">Home</a>  <i>/</i>Users</div>
         <br><br>
         <div class=" pull-right">
           <a class="btn btn-primary" href="{{url('users/admin/')}}">
            All Users
           </a>
        </div>
        <div class=" pull-right">
          <a class="btn btn-primary" href="{{url('users/admin/')}}">
           Edit Users
          </a>
       </div>
       <div class=" pull-right">
         <a class="btn btn-primary" href="{{url('users/admin/')}}">
          Delete Users
         </a>
      </div>

        </div>
     </div>

<div class="container">
    <div class="col-md-offset-2 col-md-8">
      <div class="panel-body p25 bg-light">
        <div style="background-color: " class="text-center section-divider mt20 mb50">
        <span><h2>USER ACCOUNT DETAILS</h2></span>
        </div>
         @foreach($human as $user)
          <div class="row">
            <div class="col-md-4">
              <div class="fileinput text-center fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail img-circle">
                        <img src="{{url($user->profile_image)}}" alt="...">
                    </div>
                </div>
            </div>
            <div class="col-md-1">
            </div>
            <div class="col-md-6">
                <div class="form-group">
                  <div class="col-md-5">
                    <label for="" class="control-label">
                      Title
                    </label>
                  </div>
                  <div class="col-md-7">
                    <h5>{{$user->title}}</h5>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-5">
                    <label for="" class="control-label">
                      Name
                    </label>
                  </div>
                  <div class="col-md-7">
                    <h5>{{$user->name}}</h5>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-5">
                    <label for="" class="control-label">
                      Email
                    </label>
                  </div>
                  <div class="col-md-7">
                    <h5>{{$user->email}}</h5>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-5">
                    <label for="" class="control-label">
                      Phone Number
                    </label>
                  </div>
                  <div class="col-md-7">
                    <h5>{{$user->phone_number}}</h5>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-5">
                    <label for="" class="control-label">
                      Gender
                    </label>
                  </div>
                  <div class="col-md-7">
                    <h5>{{$user->gender}}</h5>
                  </div>
                </div>

               <!--  <div class="form-group">
                  <div class="col-md-5">
                    <label for="" class="control-label">
                      Nationality
                    </label>
                  </div>
                  <div class="col-md-7">
                    <h5>{{$user->country}}</h5>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-5">
                    <label for="" class="control-label">
                      Department
                    </label>
                  </div>
                  <div class="col-md-7">
                    <h5>{{$user->department}}</h5>
                  </div>
                </div> -->

            </div>
        </div>
        @endforeach
      </div>
    </div>
</div>




@stop
