@extends('layouts.master')

@section('title')

@section('navbar')
 @include('shared.navbar', ['active' => strtolower($active_page ?? 'Tasks') ])

@stop

@section('contents')

<style type="text/css">
  #design_container{
  border: 5px solid orange;
  margin: 250px 200px 0px 200px;

  padding-right: 50px;
  padding-left: 200px;
  padding-bottom: : 100px;

  }

.card-des{
  background-color: #081c22;
       padding:20px 80px 20px 40px;
       border-radius:40%;
       color:azure;
       font-size:20px;
       text-align: center;
       margin: 5px;
}
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
  #counter{
    margin: 20px 0px 50px 200px;


  }
</style>

<div class="page_title ">
        <div class="container">

        <h1>Delete Tasks</h1>
         <div class="pagenation">&nbsp;<a href="{{url('home')}}">Home</a>  <i>/</i>Tasks</div>
         <br><br>
         <div class=" pull-right">
           <a class="btn btn-primary" href="{{url('tasks/')}}">
             All Task
           </a>
        </div>

        </div>
     </div>

     <div>

     </div><br><br>

<div class="container" id="design_container">
  <div class="col-md-offset-2 col-md-8">
    {!! Form::open(['class'=>'form-horizontal', 'method'=>'delete', 'action'=>['TasksController@destroy',  $tasks->id]]) !!}

  <div class="col-md-5" >
    <label for="" class="control-label">
      Project Name
    </label></div>
    <div class="col-md-7">
    <h5 class=""> {{$tasks->project->project_name}}</h5></div>

   <div class="taskdesign">
      <div class="col-md-5">
        <label for="" class="control-label">
          Task Title
        </label>
      </div>
      <div class="col-md-7">
        <h5>{{$tasks->task_name}}</h5>
      </div>
    </div>


      <div class="col-md-5">
        <label for="" class="control-label">
          Task Description
        </label>
      </div>
      <div class="col-md-7">
        <h5>{{$tasks->task_description}}</h5>
      </div>



      <div class="col-md-5">
        <label for="" class="control-label">
            Start Date
        </label>
      </div>
      <div class="col-md-7">
        <h5>{{date('d F, Y', strtotime($tasks->start_date))}}</h5>
      </div>


      <div class="col-md-5">
        <label for="" class="control-label">
            End Date
        </label>
      </div>
      <div class="col-md-7">
        <h5>{{date('d F, Y', strtotime($tasks->end_date))}}</h5>
      </div>


      <div class="col-md-5">
        <label for="" class="control-label">
          Assigned To
        </label>
      </div>
      <div class="col-md-7">
        <h5>{{$tasks->assignedTo->name}}</h5>
      </div>


      <div class="col-md-5">
        <label for="" class="control-label">
          Assigned By
        </label>
      </div>
      <div class="col-md-7">
        <h5>{{$tasks->assignedBy->name}}</h5>
      </div>

    <div class="form-group pull-right">
    <div class="col-md-6">
      <button type="submit" class="btn btn-danger">Delete</button>
    </div>
  </div>

    {!! Form::close() !!}

  </div>
</div>

@stop
