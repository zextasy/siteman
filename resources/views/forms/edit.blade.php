@extends('layouts.master')

@section('content')

<main><br><br>

	
	
	<div class="container">

		<div class="row">
			<a href="{{url('show/'.$user_id.'/'.$temp->id)}}" type="button" class="btn btn-unique">Back</a>
		</div>
	<br>

		{!! Form::open(['class'=>'form-horizontal', 'method'=>'patch', 'action'=>['FormController@update',  $user_id, $temp->name]]) !!}
		<div class="row">
			<h2 class="font-weight-bold"> Edit {{$temp->name}}</h2>
		</div><br>
@foreach($temp_values as $val)

		@if($val->template_structure->value_type_id == 3)

            <div class="row">

            		<div class="col-md-6">
            			<div class="md-form">
            				<input type="hidden" name="temp[{{$temp->id}}]" value="{{$val->id}}">
            				<input type="hidden" name="temp_struc_id[]" value="{{$val->id}}">
						    <textarea type="text" id="form7" class="md-textarea" name="value[]">{{$val->value}}</textarea>
						    <label for="form7">{{$val->label}}</label>
						</div>
						             
            		</div>
            </div>

		 @elseif($val->template_structure->value_type_id == 4)

            	<div class="row">
					<div class="col-md-6">
            			
            			<div class="md-form">
            				<input type="hidden" name="temp[{{$val->id}}]" value="{{$val->id}}">
            				<input type="hidden" name="temp_struc_id[]" value="{{$val->id}}">
				            <select type="text"  id="option0" name="value[]" placeholder="Select" class="form-control">
				                
				                	<option>Select {{$val->template_structure->label}}</option>
				                @foreach($val->template_structure->options as $type)
				                    <option value="{{$type->name}}" @if(!strcmp($type->name, $val->value)) selected="" @endif>{{$type->name}}</option>
				                @endforeach
				            </select> 

				           
				        </div>
					   
             
            		</div>
            </div>

            @else

		<div class="row">
			<div class="col-md-6">
            			<div class="md-form">
            				<input type="hidden" name="temp[{{$val->id}}]" value="{{$val->id}}">
            				<input type="hidden" name="temp_struc_id[]" value="{{$val->id}}">
						    <input type="text" id="form1" class="form-control" name="value[]" value="{{$val->value}}">
						    <label for="form7">{{$val->template_structure->label}}</label>
						</div>
						             
            		</div>
		</div>
		@endif
@endforeach

<div class="row">
        		<div class="col-md-6">
        			 <div class="text-center">
				        <button class="btn btn-unique" type="submit">Update <i class="fa fa-paper-plane-o ml-1"></i></button>
				    </div>
        		</div>
        	</div>

        	{!! Form::close() !!}
	</div>
</main>

@endsection