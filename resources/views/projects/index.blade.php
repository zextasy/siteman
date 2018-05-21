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

  #tab{
    margin-top: 50px;
    margin-bottom: 50px;
  }
</style>

<div class="page_title ">
        <div class="container">

        <h1>Project</h1>
         <div class="pagenation">&nbsp;<a href="{{url('home')}}">Home</a>  <i>/</i>Projects</div>
         <br><br>
         <div class=" pull-right">
           <a class="btn btn-primary" href="{{url('projects/create')}}">
             New project
           </a>
        </div>

        </div>
     </div><br><br>

<div class="container-fluid" >
	<br><br><br>
	<div class="col-md-12">

	<div class="panel" id="tab">
		@if($projects->isEmpty())

		<div class="text-danger">No Projects Available</div>
		@else
		<table class="table table-hover table-responsive">
			 <thead class="bg-success">
			        <tr>
				<th style="line-height: 20px">S/N</th>
				<th style="line-height: 20px">Project Title</th>
				<th style="line-height: 20px">Tasks</th>
				<th style="line-height: 20px">Start Date</th>
				<th style="line-height: 20px">End Date</th>
				<th style="line-height: 20px">Created By</th>
		        <th style="line-height: 20px">Date Created</th>
				<th style="line-height: 20px">Action</th>
				 </tr>
			</thead>

			@foreach($projects as $project)

			<tbody>
				<tr>
					<td></td>
					<td>{{$project->project_name}}</td>
					<td>{{$project->tasks->count()}}</td>
					<td>{{$project->start_date}}</td>
					<td>{{$project->end_date}}</td>
					<td>{{$project->creator->name}}</td>
          <td>{{$project->created_at}}</td>
					<td>
						<div class="btn-group">
            <button type="button" class="btn btn-info btn-sm">Action</button>
            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
                <span class="sr-only">Toggle DropDown</span>
            </button>
                <ul class="dropdown-menu" role="menu" id="export-menu">

									<li><a href="{{url('projects/show/'.$project->id)}}"><i class="fa fa-eye fa-lg"> Show</i></a></li>
									<li><a href="{{url('projects/edit/'.$project->id)}}" ><i class="fa fa-edit fa-lg"> Edit </i></a></li>
									<li><a href="{{url('projects/delete/'.$project->id)}}" ><i class="fa fa-trash fa-lg"> Delete</i></a></li>
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
