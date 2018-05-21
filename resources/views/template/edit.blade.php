@extends('layouts.master')

@section('navbar')
 @include('shared.navbar', ['active' => strtolower($active_page ?? 'home') ])

@stop

@section('contents')

 <div class="page_title ">
        <div class="container">
        
        <h1>Edit {{$temp->name}}</h1>
         <div class="pagenation">&nbsp;<a href="index.html">Home</a>  <i>/</i>template</div>
       
        </div>
     </div>

     <div class=" section-paddingprimary">
        <div class="container">
          <div class="clearfix"></div><br><br>
          
        <div class="row">
       <div class="col-md-12 col-sm-6">
       
        <br />
        <br />
        <div class="cforms">
           <div id="form_status"></div>

           {!! Form::open(['class' => 'form-horizontal', 'method'=>'patch', 'action'=>['TemplateController@update', $temp->name]]) !!}
           <div>
            <label class="label">Name <em>*</em></label>
            <label class="input">
               <input type="text" name="temp_name"  value="{{$temp->name}}" class="form-control">
             </label>
         </div>

          <div class="text-center">

            <button type="submit" class="but_check"><i class="fa fa-check fa-lg"></i>&nbsp; Update</button>&nbsp;
            <a href="{{url('template')}}" class="but_question_mark"><i class="fa fa-times fa-lg"></i>&nbsp; Exit</a>
        </div>
        {!! Form::close() !!}

         <br><br>
     </div>
 </div>
</div>
</div>
</div>
@stop