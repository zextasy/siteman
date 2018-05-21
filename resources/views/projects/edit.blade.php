@extends('layouts.master')

@section('title')

@section('navbar')
 @include('shared.navbar', ['active' => strtolower($active_page ?? 'Project') ])

@stop

@section('contents')

<div class="page_title ">
        <div class="container">
        
        <h1>Edit Project</h1> 
         <div class="pagenation">&nbsp;<a href="{{url('home')}}">Home</a>  <i>/</i>Projects</div>
         <br><br>
         <div class=" pull-right">
           <a class="btn btn-primary" href="{{url('projects/')}}">
            Project List
           </a>
        </div>
       
        </div>
     </div>

<div class="container">
<div class="col-md-8 col-md-offset-2">
	{!! Form::open(['class'=>'form-horizontal', 'method'=>'patch', 'action'=>['ProjectsController@update', $projects->id]]) !!}

	<div class="panel">

		<div class="panel-body">
	  		<div class="form-group">
	    		<label for="inputStandard" class="col-lg-3 control-label">Project Title</label>
	    		
	    		<div class="col-lg-8">
	    			<div class="bs-component">
					<input type="text" id="inputStandard" name="project_name" class="form-control" value="{{$projects->project_name}}">
					</div>
	    		</div>
	  		</div>

	  		<div class="form-group">
	    		<label for="inputStandard" class="col-lg-3 control-label">Project Description</label>
	    		
	    		<div class="col-lg-8">
	    			<div class="bs-component">
					<textarea class="form-control textarea-grow" name="project_description" id="textArea1" rows="4">{{$projects->project_description}}</textarea>
					</div>
	    		</div>
	  		</div>

	  		<div class="form-group">
	    		<label for="inputStandard" class="col-lg-3 control-label">Project Start Date</label>
	    		
	    		<div class="col-lg-8">
	    			<div class="bs-component">
					<input type="date" id="inputStandard" name="start_date" class="form-control" value="{{$projects->start_date}}">
					</div>
	    		</div>
	  		</div>
	  		<br>

	  		<div class="form-group">
	    		<label for="inputStandard" class="col-lg-3 control-label">Project End Date</label>
	    		
	    		<div class="col-lg-8">
	    			<div class="bs-component">
					<input type="date" id="inputStandard" name="end_date" class="form-control" value="{{$projects->end_date}}">
					</div>
	    		</div>
	  		</div>

	  		<div class="form-group pull-right">
				<div class="col-md-6">
					<button type="submit" class="btn btn-success">Update</button>
				</div>
			</div>
	  	</div>



	</div>

		{!! form::close() !!}

</div>
</div>
@stop