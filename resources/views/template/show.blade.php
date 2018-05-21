@extends('layouts.master')

@section('navbar')
 @include('shared.navbar', ['active' => strtolower($active_page ?? 'home') ])

@stop

@section('contents')

<main><br><br><br>
	<div class="container">
		<div class="row">
			@include('flash::message')
			<div class="">

			
			<a href="{{url('template')}}" class="but_question_mark"><i class="fa fa-arrow-left fa-lg"></i>&nbsp; Back</a>
			<a href="{{url('/template/create/'.$temp->id)}}" class="but_woman"><i class="fa fa-pencil fa-lg"></i>&nbsp; Create New Form</a>
			</div>
		</div> <br>
		<div class="row">
			<h2 class="font-weigth-bold">List of <b class="text-capitalize">{{$temp->name}}</b> Forms</h2>
		</div><br>
		
		<div class="row">
			<table class="table">

			    <!--Table head-->
			    <thead class="th-color">
			        <tr class="text-white" >
			            <th style="line-height: 30px"" >#</th>
			            <th style="line-height: 30px">Name</th>
			            <th style="line-height: 30px">Actions</th>
			            
			        </tr>
			    </thead>
			    <!--Table head-->

			    <!--Table body-->
			    <tbody>
			    	@foreach($forms as $form)
			        <tr>
			            <th scope="row" style="line-height: 30px">{{$loop->iteration}}</th>
			            <td style="line-height: 30px">{{$form->name}}</td>
			            <td style="line-height: 30px">
			            	<a href="{{url('form/'.$form->slug)}}" class="but_chat"><i class="fa fa-eye fa-lg"></i></a>
			            	<a data-toggle="modal" data-target="#siteModal" onclick="edit('Edit Form', 'form/edit', '{{$form->slug}}')" class="but_woman"><i class="fa fa-edit fa-lg"></i></a>
			            	<a data-toggle="modal" data-target="#siteModal" onclick="del('Delete Form', 'form/delete', '{{$form->slug}}')" class="but_bookmark"><i class="fa fa-trash fa-lg"></i></a>
			            	
			            </td>
			            
			        </tr>
			        @endforeach
			       
			    </tbody>
			    <!--Table body-->
			</table>
			<!--Table-->
                                    
                         
		</div>
	</div>
</main><br><br><br>
@stop