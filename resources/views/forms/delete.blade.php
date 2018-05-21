@extends('layouts.master')
@section('content')

<main><br><br>
<div class="container">
	<div class="row">
			<a href="{{url('show/'.$user_id.'/'.$temp->id)}}" type="button" class="btn btn-unique">Back</a>
		</div>
	
	<div class="row">
		<h2 class="font-weight-bold text-danger">Are you sure you want to delete {{$temp->name}}</h2>
	</div><br>

{!! Form::open(['class'=>'form-horizontal', 'method'=>'delete', 'action'=>['FormController@destroy',  $user_id, $temp->name]]) !!}
	@foreach($temp_values as $val)

<div class="row">
	<div class="col-sm-6">
		<p class="font-weight-bold">{{$val->template_structure->label}}</p>
	</div>

	<div class="col-sm-6">
		<p class="">{{$val->value}}</p>
	</div>
</div>


@endforeach

			<div class="row">
        		<div class="col-md-6">
        			 <div class="text-center">
				        <button class="btn btn-unique" type="submit">Delete <i class="fa fa-delete ml-1"></i></button>
				    </div>
        		</div>
        	</div>
        	{!! Form::close() !!}
</div>
</main>
@stop