@extends('layouts.master')

@section('title')

@section('contents')

<div class="page_title ">
        <div class="container">
        
        <h1>Delete Project</h1> 
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
<div class="col-md-offset-1 col-md-10">
 {!! Form::open(['class'=>'form-horizontal', 'method'=>'delete', 'action'=>['ProjectsController@destroy', $projects->id]]) !!}
 	<div class="box">
   		
        <div class="box-body">


        	<div><h3 align="center">{{$projects->project_name}}</h3></div>
        		<div class="row">

            <div class="col-md-6 col-sm-6">
              <div class="form-group">
                <div class="col-md-5">
                  <label for="" class="control-label">
                    Project description
                  </label>
                </div>
                <div class="col-md-7">
                  <h5>{{$projects->project_description}}</h5>
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
                  <h5>{{$projects->start_date}}</h5>
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
                  <h5>{{$projects->end_date}}</h5>
                </div>
              </div>
            </div>
          </div>

    <div class="form-group">
            <div class="col-md-4">
              <label for="" class="control-label">
                &nbsp;
              </label>
            </div>
            <div class="col-md-8">
              <button type="submit" class="btn btn-danger pull-right">
                <i class="fa fa-trash"></i> Delete
              </button>
            </div>
          </div>
	</div>

</div>

{!! Form::close() !!}
</div>
</div>
@stop