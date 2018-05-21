@extends('layouts.master')

@section('navbar')
 @include('shared.navbar', ['active' => strtolower($active_page ?? 'home') ])

@stop

@section('contents')

<main><br><br><br>
	<div class="container">
		@include('flash::message')
		<div class="row">
			<div class="">
			<a href="{{url('template/'.$form->template->name)}}" class="but_question_mark"><i class="fa fa-arrow-left fa-lg"></i>&nbsp; Back</a>
			<a href="{{url('template/create/'.$form->template_id.'/'.$form->id)}}" class="but_woman"><i class="fa fa-pencil fa-lg"></i>&nbsp; Create New Attribute</a>
			</div>
		</div> <br>


		<div class="row">
			<h2 class="font-weigth-bold">List of <b class="text-capitalize">{{$form->name}}</b> Form Attributes</h2>
		</div><br>
		
		<div class="row">
			<table class="table">

			    <!--Table head-->
			    <thead class="th-color">
			        <tr class="text-white" >
			            <th style="line-height: 30px"" >#</th>
			            <th style="line-height: 30px">Name</th>
			            <th style="line-height: 30px">Value Type</th>
			            <th style="line-height: 30px">Required?</th>
			            <th style="line-height: 30px">Action</th>
			            
			        </tr>
			    </thead>
			    <!--Table head-->

			    <!--Table body-->
			    <tbody>
			    	@foreach($form->structures as $form_attr)
			    	

			    	@foreach(json_decode($form_attr->struc) as $val)


			    	
			        <tr>
			            <th scope="row" style="line-height: 30px">{{$loop->iteration}}</th>
			            <td style="line-height: 30px">{{$val->label}}</td>
			            <td style="line-height: 30px">{{$val->value_type_id}}</td>
			            <td style="line-height: 30px">@if($val->required == 1) Required @else Optional @endif</td>
			            <td style="line-height: 30px">
			            	<a data-toggle="modal" data-target="#siteModal" onclick="edit_attr('Edit Form Attribute', 'form/attr/edit', '{{$form_attr->id}}', '{{$val->name}}')" class="but_woman"><i class="fa fa-edit fa-lg"></i></a>
			            	<a data-toggle="modal" data-target="#siteModal" onclick="edit_attr('Delete Form Attribute', 'form/attr/delete', '{{$form_attr->id}}', '{{$val->name}}')" class="but_bookmark"><i class="fa fa-trash fa-lg"></i></a>
			            	<a data-toggle="modal" data-target="#siteModal" onclick="edit_attr('Move Form Attribute', 'form/attr/move', '{{$form_attr->id}}', '{{$val->name}}')" class="but_chat"><i class="fa fa-arrows fa-lg"></i></a>
			            	
			            </td>
			            
			        </tr>
			          @endforeach
			        @endforeach
			       
			    </tbody>
			    <!--Table body-->
			</table>
			<!--Table-->
                                    
                         
		</div>
	</div>
</main><br><br><br>

@stop