@extends('layouts.master')

@section('title', 'Siteman | E-mail')

@section('navbar')
 @include('shared.navbar', ['active' => strtolower($active_page ?? 'E-mail') ])

@stop


@section('contents')
<style type="text/css">
	.btn-info{
		background-color: #4c0019;
		border-color: #4c0019;
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

<div class="page_title ">
        <div class="container">

        <h1>Email</h1>
         <div class="pagenation">&nbsp;<a href="{{url('home')}}">Home</a>  <i>/</i>Email</div>
         <br><br>
         <div class=" pull-right">
           <a class="btn btn-primary" href="{{url('mail/admins/')}}">
            Back
           </a>
        </div>
        </div>
     </div>


<div>

</div>

<div class="container">
  <div class="col-offset-3 col-md-6">
  <div class="row">
  <label class="control-label">Title</label>
    <div class="form-control">
      {{$message->title}}
    </div>
  </div>

  <div class="row">
  <label class="control-label">Sender</label>
    <div class="form-control">
    {{$message->sender->name}}
    </div>
  </div>

  <div class="row">
  <label class="control-label">Content</label>

      <textarea class="form-control">
    {{$message->body}}
  </textarea>
  </div>


</div>
</div>



@stop
