@extends('layouts.master')

@section('navbar')
 @include('shared.navbar', ['active' => strtolower($active_page ?? 'home') ])

@stop

@section('contents')
 <div class="page_title ">
        <div class="container">
        
        <h1>{{$temp->name}} Forms</h1>
         <div class="pagenation">&nbsp;<a href="{{url('home')}}">Home</a>  <i>/</i>Site Audit</div>
       
        </div>
     </div>

     

<div class="section-paddingprimary">
  <div class="container">
    <div class="row">
    
      <div class="col-md-6 col-sm-6 col-xs-12 slide-controls-primary ">
        <div class="accordion_example">
          {{--<h3 class="uppercase text-color-2">{{$temp->name}}</h3>--}}
          <div class="clearfix margin-bottom-2"></div>
          @foreach($temp->forms as $form)
          <div class="accordion_in style1">
            <div class="acc_head"><a href="{{url('form/audit/'.$form->name)}}">{{$form->name}}</a></div>
          </div>
          @endforeach
         
        </div>
        <!-- Accordion end --> 
        
      </div>
      </div>
  </div>
</div>


@stop