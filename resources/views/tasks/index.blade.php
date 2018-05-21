@extends('layouts.master')

@section('title')

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

        <h1>Tasks</h1>
         <div class="pagenation">&nbsp;<a href="{{url('home')}}">Home</a>  <i>/</i>Tasks</div>
         <br><br>

        @if(Gate::check('create_task'))
             <div class=" pull-right">
	           <a class="btn btn-primary" href="{{url('tasks/create')}}">
             New Task
           </a>
        </div>
        @endif


        </div>
     </div>

<div class="container-fluid">
	<br><br><br>
	<div class="card col-md-12">
		<div>
			<h2 align="center"> </h2>
		</div>

	<div class="panel">
		@if($tasks->isEmpty() )

		<div class="text-danger">No task Available</div>
		@else
		<table class="table table-hover table-bordered">
			<thead class="bg-success">
				<th style="line-height: 20px">S/N</th>

				<th style="line-height: 20px">Task Name</th>
				<th style="line-height: 20px">Assigned By</th>
				<th style="line-height: 20px">Assigned To</th>
				<th style="line-height: 20px">Status</th>
        <th style="line-height: 20px">Timeline</th>
        <th style="line-height: 20px">Date Created</th>
				<th style="line-height: 20px">Action</th>
			</thead>

			@foreach($tasks as $task)

			<tbody>
				<tr>
					<td>{{$loop->iteration}}</td>

					<td>{{$task->task_name}}</td>
					<td>{{$task->assignedBy->name}}</td>
          @if($task->re_assign_to !== null)
                       <td>{{$task->reAssignedTo->name}}</td>
                       @else
                       <td>{{$task->assignedTo->name}}</td>
                       @endif
                       <td>{{$task->showApproval()}}</td>
                       <td>
                           @php

                            $now = new DateTime();
                            $end_date = new DateTime("$task->end_date");

                           @endphp

                           @if($end_date < $now)
                           <span class="label label-warning">OverDue</span>
                           @else
                           <span class="label label-success">In Progress</span>
                           @endif
                        </td>
                        <td>{{ date('M j, Y', strtotime($task->created_at))}}</td>

					<td>
						<div class="btn-group">
						<button type="button" class="btn btn-info btn-sm">Action</button>
						<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
								<span class="caret"></span>
								<span class="sr-only">Toggle DropDown</span>
						</button>
								<ul class="dropdown-menu" role="menu" id="export-menu">

									<li><a href="{{url('tasks/show/'.$task->id)}}"><i class="fa fa-eye fa-lg"> View</i></a></li>
									@if(Gate::check('edit_task'))
									<li><a href="{{url('tasks/edit/'.$task->id)}}" ><i class="fa fa-edit fa-lg"> Edit </i></a></li>
									@endif
									@if(Gate::check('delete_task'))
									<li><a href="{{url('tasks/delete/'.$task->id)}}" ><i class="fa fa-trash fa-lg"> Delete</i></a></li>
									@endif
									@if(Gate::check('approve_task'))
					                  <li><a href="{{url('tasks/approve/'.$task->id)}}"><i class="fa fa-check-square-o">Approve</i></a></li>
				                  	@endif
									<li><a href="{{url('#')}}" ><i class="fa fa-excel-o fa-lg"> Export</i></a></li>

								</ul>

					 </div>
					</td>

				</tr>
			</tbody>


			@endforeach
		</table>
		@endif
	</div>
	</div>
</div>

@stop
