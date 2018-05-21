@extends('layouts.master')

@section('navbar')
 @include('shared.navbar', ['active' => strtolower($active_page ?? 'home') ])

@stop

@section('contents')

	<div class="feature_section3">
    <div class="container">
    <div class="row col-centered">
    <div class="col-md-12">


        <div class="col-md-12 col-centered">
        <div class="col-md-3 col-sm-6">
        	<a href="{{url('template/create')}}">
        <div class="box">
            <div class="circle"><i class="fa  fa-pencil"></i></div>
            <h4 class="nocaps text-color-2">Create Template</h4>
          </div></a>
      </div>

        <div class=" col-md-3 col-sm-6">
        <div class="box">
            <div class="circle"><i class="fa  fa-paperclip"></i></div>
            <h4 class="nocaps text-color-2">Sample Audit</h4>
          </div></div>

        <div class=" col-md-3 col-sm-6">
        <div class="box">
            <div class="circle"><i class="fa fa-edit"></i></div>
            <h4 class="nocaps text-color-2">Sample tower mapping maintenance </h4>
          </div></div>

        <div class=" col-md-3 col-sm-6">
        <div class="box">
            <div class="circle"><i class="fa  fa-tachometer"></i></div>
            <h4 class="nocaps text-color-2">Dashboard</h4>
          </div></div>

      </div>

      <div class="col-md-12 col-centered">
        <div class="col-md-3 col-sm-6">
        <div class="box">
            <div class="circle"><i class="fa  fa-bug"></i></div>
            <h4 class="nocaps text-color-2">Approved Report</h4>
          </div></div>

        <div class=" col-md-3 col-sm-6">
        <div class="box">
            <div class="circle"><i class="fa  fa-bug"></i></div>
            <h4 class="nocaps text-color-2">Rejected Report</h4>
          </div></div>

        <div class=" col-md-3 col-sm-6">
        <div class="box">
            <div class="circle"><i class="fa fa-edit"></i></div>
            <h4 class="nocaps text-color-2">Sample tower mapping maintenance </h4>
          </div></div>

        <div class=" col-md-3 col-sm-6">
          <a href="{{url('users/admin/')}}">
        <div class="box">
            <div class="circle"><i class="fa  fa-user"></i></div>
            <h4 class="nocaps text-color-2">Users</h4>
          </div></div>

      </div>

  </div></div>
  </div>
  <!-- end section -->
  <div class="clearfix"></div>






  <!-- end parallax section 6 -->
  <div class="clearfix"></div>


<div class="clearfix"></div>

@endsection