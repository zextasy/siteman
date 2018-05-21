@extends('layouts.master')

@section('navbar')
 @include('shared.navbar', ['active' => strtolower($active_page ?? 'home') ])

@stop

@section('contents')

 <div class="page_title ">
        <div class="container">
        <div class="title"><h1>{{$tempt->name}}</h1></div>
        
         <div class="pagenation">&nbsp;<a href="{{url('home')}}">Home</a>  <i>/</i>Site Audit</div>
          <div class="col-md-12 col-sm-6">
           <a href="{{url('form/audit/'.$tempt->name)}}" class="but_question_mark"><i class="fa fa-arrow-left fa-lg"></i>&nbsp; Back</a>
          </div>
       
        </div>
     </div>

<div class=" section-paddingprimary">
        <div class="container">

         <br><br><br>

        <div class="row">

          

          {!! Form::open(['class' => 'form-horizontal', 'method'=>'post', 'action'=>'SiteAuditController@store']) !!}
       <div class="col-md-6 col-sm-6">
        
        <br />

        <br />
        <div class="cforms">
           
           	

           		<input type="hidden" name="template_id" value="{{$tempt->template->id}}">
        		<input type="hidden" name="form_id" value="{{$tempt->id}}">
        		
           		
          @php

              $form_count =0;
               $total_count = $template->count();
              $mid = $total_count/2;

          @endphp
       

       @for($i=0; $i<$mid; $i++)

           @php
              $temp = $template[$i];
           @endphp

              	@include('shared.form')

        @endfor

        

             <div class="clearfix"></div>
           

      </div>
      </div>

      <div class="col-md-6 col-sm-6">
        <div class="cforms"><br><br>
          @for($i=$mid; $i<$total_count; $i++)

           @php
              $temp = $template[$i];
           @endphp

               @include('shared.form')
            @endfor
        </div>
      	
      </div>

      
  </div>
  <div class="row text-center">
     <input type="hidden" name="token" value="FsWga4&@f6aw" />
            <button type="submit" class="but_check"><i class="fa fa-check fa-lg"></i>&nbsp; Submit</button>
  </div>

  {!! Form::close() !!}
</div>

</div>
@stop

