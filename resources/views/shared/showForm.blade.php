@if(isset($values[$key]))	
	@if($values[$key]->value_type_id != 7)
	<div class="row">
		<div class="row font-italic">
			<span class="font-italic">{{$val->label}}</span>
		</div>
		
		<div class="text-uppercase">
			
			<b>{{$values[$key]->value}}</b>

			
		</div><br>
	</div>
	@endif
	@if($values[$key]->value_type_id == 7)

	<div class="row">
		<div class="row font-italic">
			<span class="font-italic">{{$val->label}}</span>
		</div>
		
		<div class="text-uppercase">
			<img src="{{url($values[$key]->value)}}" alt="site image">
		</div><br>
	</div>
	@endif
	@if($values[$key]->value_type_id == 6)

	<div class="row">
		<div class="row font-italic">
			<span class="font-italic">Option on {{$val->label}}</span>
		</div>
		
		<div class="text-uppercase">

			<b>{{$values[$key]->option}}</b>
			
		</div><br>
	</div>
	@endif
	@if($values[$key]->value_type_id == 5)

	<div class="row">
		<div class="row font-italic">
			<span class="font-italic">Comment on {{$val->label}}</span>
		</div>
		
		<div class="text-uppercase">

			<b>{{$values[$key]->comment}}</b>
			
		</div><br>
	</div>
	@endif
@endif