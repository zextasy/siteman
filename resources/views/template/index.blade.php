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
			
			<a href="{{url('template/create')}}" class="but_woman"><i class="fa fa-pencil fa-lg"></i>&nbsp; Create New Template</a>
			</div>
		</div> <br>
		<div class="row">
			<h2 class="font-weigth-bold">List of Templates</h2>
		</div><br>
		
		<div class="row">
			<table class="table">

			    <!--Table head-->
			    <thead class="th-color">
			        <tr class="text-white" >
			            <th style="line-height: 30px" >#</th>
			            <th style="line-height: 30px">Name</th>
			            <th style="line-height: 30px">Action</th>
			            
			        </tr>
			    </thead>
			    <!--Table head-->

			    <!--Table body-->
			    <tbody>
			    	@foreach($templates as $temp)
			        <tr>
			            <th scope="row" style="line-height: 30px">{{$loop->iteration}}</th>
			            <td style="line-height: 30px">{{$temp->name}}</td>
			            <td style="line-height: 30px">
			            	<a href="{{url('template/'.$temp->name)}}" class="but_chat"><i class="fa fa-eye fa-lg"></i></a>
			            	<a href="{{url('template/edit/'.$temp->name)}}" class="but_woman"><i class="fa fa-edit fa-lg"></i></a>
			            	<a href="{{url('template/delete/'.$temp->name)}}" class="but_bookmark"><i class="fa fa-trash fa-lg"></i></a>
			            	
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