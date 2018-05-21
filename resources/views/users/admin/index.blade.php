@extends('layouts.master')

@section('title')

@section('navbar')
 @include('shared.navbar', ['active' => strtolower($active_page ?? 'Users') ])
<div >
        <p>Users</p>
         <div class="pagenation">&nbsp;<a href="{{url('home')}}">Home</a>  <i>/</i>Users</div>
         <br><br>
     </div>
@stop

@section('contents')

<style type="text/css">
	.btn-info{
		background-color: #4c0019;
		border-color: #4c0019;
	}

    .hum{
        margin-top: 50px;

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
     <div class="container-fluid">
         <div class=" pull-right">
           <a class="btn btn-primary" href="{{url('users/admin/create')}}">
            New User
           </a>
        </div>
     	<br><br><br>
     	<div class="col-md-12 hum">

     	<div class="panel">
     		@if($human->isEmpty())

     		<div class="text-danger">No User Available</div>
     		@else
     		<table class="table table-hover">
     			 <thead  class="bg-success">
     			        <tr>
     				<th style="line-height: 20px">S/N</th>
     				<th style="line-height: 20px">Name</th>
     				<th style="line-height: 20px">Email Address</th>
     				<th style="line-height: 20px">Phone Number</th>

     				<th style="line-height: 20px">Action</th>
     				 </tr>
     			</thead>

     			@foreach($human as $user)

     			<tbody>
     				<tr>
     					<td>{{$loop->iteration}}</td>
     					<td>{{$user->name}}</td>
     					<td>{{$user->email}}</td>
     					<td>{{$user->phone_number}}</td>

     					<td>
     						<div class="btn-group">
                 <button type="button" class="btn btn-info btn-sm">Action</button>
                 <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                     <span class="caret"></span>
                     <span class="sr-only">Toggle DropDown</span>
                 </button>
                     <ul class="dropdown-menu" role="menu" id="export-menu">

     									<li><a href="{{url('users/admin/show/'.$user->id)}}"><i class="fa fa-eye fa-lg"> Show</i></a></li>
     									<li><a href="{{url('users/admin/edit/'.$user->id)}}" ><i class="fa fa-edit fa-lg"> Edit </i></a></li>
     									<li><a href="{{url('users/admin/delete/'.$user->id)}}" ><i class="fa fa-trash fa-lg"> Delete</i></a></li>
     									<li><a href="{{url('#')}}" ><i class="fa fa-excel-o fa-lg"> Export</i></a></li>

                     </ul>

                </div>

     					</td>

     				</tr>
     			</tbody>


     			@endforeach
     		</table>
     		@endif
     	</div>
     	</div>
     </div>



@stop
