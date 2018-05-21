@extends('layouts.master')

@section('title', 'Siteman | Projects')

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
        
        <h1>Create New Project</h1> 
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
	{!! Form::open(['class'=>'form-horizontal', 'method'=>'post', 'action'=>'ProjectsController@store']) !!}

	<div class="panel">

		<div class="panel-body">
	  		<div class="form-group">
	    		<label for="inputStandard" class="col-lg-3 control-label">Project Title</label>
	    		
	    		<div class="col-lg-8">
	    			<div class="bs-component">
					<input type="text" id="inputStandard" name="project_name" class="form-control" placeholder="Type Here...">
					</div>
	    		</div>
	  		</div>

	  		<div class="form-group">
	    		<label for="inputStandard" class="col-lg-3 control-label">Project Description</label>
	    		
	    		<div class="col-lg-8">
	    			<div class="bs-component">
					<textarea class="form-control textarea-grow" name="project_description" id="textArea1" rows="4"></textarea>
					</div>
	    		</div>
	  		</div>

	  		<div class="form-group">
	    		<label for="inputStandard" class="col-lg-3 control-label">Project Start Date</label>
	    		
	    		<div class="col-lg-8">
	    			<div class="bs-component">
					<input type="date" id="inputStandard" name="start_date" class="form-control" placeholder="Type Here...">
					</div>
	    		</div>
	  		</div>
	  		<br>

	  		<div class="form-group">
	    		<label for="inputStandard" class="col-lg-3 control-label">Project End Date</label>
	    		
	    		<div class="col-lg-8">
	    			<div class="bs-component">
					<input type="date" id="inputStandard" name="end_date" class="form-control" placeholder="Type Here...">
					</div>
	    		</div>
	  		</div>

	  		<div class="form-group pull-right">
				<div class="col-md-6">
					<button type="submit" class="btn btn-success">Save</button>
				</div>
			</div>
	  	</div>



	</div>

		{!! form::close() !!}

</div>
</div>
@stop