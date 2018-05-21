@extends('layouts.master')

@section('title','Siteman | Projects')

@section('navbar')
 @include('shared.navbar', ['active' => strtolower($active_page ?? 'Project') ])

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

        <h1>Mail</h1>
         <div class="pagenation">&nbsp;<a href="{{url('home')}}">Home</a>  <i>/</i>Mail</div>
         <br><br>
         <div class=" pull-right">

        </div>

        </div>
     </div>

<div class="container">
	<br><br><br>
	<div class="col-md-8 col-md-offset-2">

{!! Form::open(['class' =>'form-horizontal', 'method'=>'post', 'action'=>'AdminsController@sendMail']) !!}
<style>
  select#xyz{
    border:none!important;
    outline: 0px;
  }
</style>

<hr>
<div class="form-group">
    <div class="col-md-2">
      <label for="" class="control-label">To</label>
    </div>

    <div class="col-md-10">
      <select id="" name="recipient" class="form-group" >
        @foreach($users as $user)
          <option value="{{$user->id}}">{{$user->name}}</option>
          @endforeach
      </select>
    </div>

</div>

<div class="form-group">
    <input type="text" name="title" id="title" class="form-control" placeholder="Subject">
</div>

<div class="form-group">
    <textarea type="text" name="body" id="body" class="form-control" placeholder="Write message..." rows="9"></textarea>
</div>

<div class="col-md-6">
  <button class="btn btn-primary btn-lg">Send</button>
</div>


{!! Form::close() !!}

</div>
</div>

@stop
