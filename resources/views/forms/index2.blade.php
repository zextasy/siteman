@extends('layouts.master')

@section('navbar')
 @include('shared.navbar', ['active' => strtolower($active_page ?? 'home') ])

@stop

@section('contents')

<div class="container"><br><br><br>
	@include('flash::message')

	<div class="row">
		<a href="{{url('siteAudit/'.$form->template->name)}}" class="but_question_mark"><i class="fa fa-arrow-left fa-lg"></i>&nbsp; Back</a>
		<a href="{{url('create/'.$form->template->id.'/'.$form->name)}}" class="but_woman"><i class="fa fa-pencil fa-lg"></i>&nbsp; Create</a>
	</div><br>

	<div class="row">
			<h2 class="font-weigth-bold">{{$form->name}}</h2>
		</div><br>

	<div class="row">
		@if($form->values->isEmpty())

			<div class="errormes">
            <div class="message-box-wrap">
                <i class="fa fa-exclamation-circle fa-lg text-capitalize"></i> No Submitted Form</div>
         </div><br><br>
         @else
		<table class="table">
			  <thead class="th-color">
			        <tr class="text-white" >
			      @foreach($template_structures as $info)
			      <th style="line-height: 30px">{{$info->label}}</th>
			      @endforeach
			    </tr>
			  </thead>
			  <tbody>
				
				@php $column_count = 0; @endphp

				@foreach($form->template_values as $value)
					
					@php $total_count = $form->template_structures->count(); @endphp

					@if($column_count == $total_count || $column_count == 0)
						<tr>
					@endif

						<td style="line-height: 30px">

							<a href="{{url('show/'.$value->user_id.'/'.$form->id)}}">{{$value->value}}</a>

						</td>

					@php $column_count ++; @endphp

					@if($column_count == $total_count)
						</tr>
					@endif

					
					
					@php if($column_count == $total_count) {$column_count = 0;}  @endphp

				@endforeach
				
			  </tbody>
			</table><br><br><br>
			
			@endif
	</div>
	
</div>

                                    

@endsection