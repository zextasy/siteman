@extends('layouts.master')

@section('title')

@section('navbar')
 @include('shared.navbar', ['active' => strtolower($active_page ?? 'Project') ])

@stop

@section('contents')

<div class="page_title ">
        <div class="container">
          @foreach($projects as $project)
        
       <div><h1 align="center">{{$project->project_name}}</h1></div>
         <div class="pagenation">&nbsp;<a href="{{url('home')}}">Home</a>  <i>/</i>Projects</div>
         <br><br>
         <div class=" pull-right">
           <a class="btn btn-primary" href="{{url('projects/')}}">
            Project List
           </a>
        </div>
       
        </div>
     </div>

<div class="col-md-offset-1 col-md-10">
 	<div class="box">
        <div class="box-body">
        		<div class="row">

            <div class="col-md-6 col-sm-6">
              <div class="form-group">
                <div class="col-md-5">
                  <label for="" class="control-label">
                    Project description
                  </label>
                </div>
                <div class="col-md-7">
                  <h5>{{$project->project_description}}</h5>
                </div>
              </div>
            </div>
        </div>

        	<div class="row">
            <div class="col-md-6 col-sm-6">
              <div class="form-group">
                <div class="col-md-5">
                  <label for="" class="control-label">
                    Project Start Date
                  </label>
                </div>
                <div class="col-md-7">
                  <h5>{{$project->start_date}}</h5>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 col-sm-6">
              <div class="form-group">
                <div class="col-md-5">
                  <label for="" class="control-label">
                    Project End Date
                  </label>
                </div>
                <div class="col-md-7">
                  <h5>{{$project->end_date}}</h5>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 col-sm-6">
              <div class="form-group">
                <div class="col-md-5">
                  <label for="" class="control-label">
                    No of tasks
                  </label>
                </div>
                <div class="col-md-7">
                  <h5>{{$project->tasks->count()}}</h5>
                </div>
              </div>
            </div>
          </div>          
          	@endforeach
		</div>
	</div>
</div>
<div class="col-md-offset-1 col-md-10">
          <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ $project->tasks->count() > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;">{{-- <input type="checkbox" id="select-all" /> --}}</th>
                        <th>Task Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Assigned to</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if ($project->tasks->count() > 0)
                        @foreach ($project->tasks as $task)
                            <tr data-entry-id="{{ $task->id }}">
                                <td></td>
                                <td>{{ $task->task_name }}</td>
                                <td>{{ $task->task_description }}</td>
                               <td>{{$task->showApproval()}}</td>
                               <td>{{$task->assignedTo->name}}</td>
                                <td><a href="{{url('tasks/show/'.$task->id)}}"><i class="fa fa-eye fa-lg"> View</i></a></td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">No entries in table</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
{{-- {{$project->tasks}} --}}
</div>
@stop