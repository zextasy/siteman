@extends('layouts.master')

@section('title', 'Siteman | Tasks')

@section('navbar')
 @include('shared.navbar', ['active' => strtolower($active_page ?? 'Tasks') ])

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

        <h1>Approve Tasks</h1>
         <div class="pagenation">&nbsp;<a href="{{url('home')}}">Home</a>  <i>/</i>Tasks</div>
         <br><br>
         <div class=" pull-right">
           <a class="btn btn-primary" href="{{url('tasks/')}}">
             All Tasks
           </a>
        </div>

        </div>
     </div>


<div class="container topDefault">
<div class="col-md-6 col-md-offset-2">



{!! Form::open(['method' => 'patch', 'class' => 'form-horizontal', 'action' => ['TasksController@update_approve', $tasks->id]])!!}


          <div class="card-header " ><h2 class="text-center" style="color:black;">Task for {{$tasks->project->project_name}}</h2></div>

    <div class="row">
        <div class="col-md-6">
          <label for="" class="control-label">
            Task Title
          </label>
        </div>
        <div class="col-md-6">
          <h4>{{$tasks->task_name}}</h4>
        </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <label for="" class="control-label">
        Task Description
      </label>
    </div>
    <div class="col-md-6">
      <h4>{{$tasks->task_description}}</h4>
    </div>
  </div>



@if($tasks->re_assign_to == null)
  <div class="row">

      <div class="col-md-6">
        <label for="" class="control-label">
          Assinged To
        </label>
      </div>
      <div class="col-md-6">
        <h4>{{$tasks->assignedTo->name}}</h4>
      </div>

  </div>
  @else
  <div class="row">
      <div class="col-md-6">
        <label for="" class="control-label">
          Assigned To
        </label>
      </div>
      <div class="col-md-6">
        <h4>{{$tasks->reAssignedTo->name}}</h4>
      </div>

  </div>

  @endif


  <div class="row">
    <div class="col-md-6">
      <label for="" class="control-label">
          Start Date
      </label>
    </div>
    <div class="col-md-6">
      <h5>{{date('d F, Y', strtotime($tasks->start_date))}}</h5>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <label for="" class="control-label">
          End Date
      </label>
    </div>
    <div class="col-md-6">
      <h5>{{date('d F, Y', strtotime($tasks->end_date))}}</h5>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-sm-6 col-sm-offset-3 footer text-center">
            <button class="btn btn-success btn-round" value="approve" name="approve">Approve</button>
            <button class="btn btn-danger btn-round" value="reject" name="approve">Reject</button>
            <a href="{{url('app/task')}}" class="btn btn-info btn-round">Cancel</a>

    </div>
  </div>


  <br>

  <br>

    {!! Form::close() !!}
          </div>

     </div>
    </div>
</div>
</div>

@stop

@section('script')
<script src=""></script>


@stop
