@extends('layouts.master')

@section('content')

<br><br><br>

<main>
<div class="container">
	<div class="row">
		<a href="{{url('index/'.$temp->name)}}" type="button" class="btn btn-unique">Back</a>
		<a href="{{url('edit/'.$user_id.'/'.$temp->name)}}" type="button" class="btn btn-unique">Edit</a>
		<a href="{{url('delete/'.$user_id.'/'.$temp->name)}}" type="button" class="btn btn-danger">Delete</a>
	</div>
	<br>
<div class="row">
	<h2 class="text-center font-weight-bold">{{$temp->name}}</h2>
</div><br>

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
</div>
</main>

@endsection