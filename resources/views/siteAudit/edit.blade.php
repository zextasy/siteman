@extends('layouts.master')

@section('navbar')
 @include('shared.navbar', ['active' => strtolower($active_page ?? 'home') ])

@stop

@section('contents')

 <div class="page_title ">
        <div class="container">
        <div class="title"><h1>Edit {{$value->form->name}}</h1></div>
        
         <div class="pagenation">&nbsp;<a href="{{url('home')}}">Home</a>  <i>/</i>{{$value->template->name}}</div>
          <div class="col-md-12 col-sm-6">
           
          </div>
       
        </div>
     </div>

@if(!Empty($strucs))
<div class=" section-paddingprimary">
        <div class="container">

         <br><br><br>

        <div class="row">

          

          {!! Form::open(['class' => 'form-horizontal', 'method'=>'patch', 'action'=>['SiteAuditController@update', $value->id]]) !!}
       <div class="col-md-6 col-sm-6">
        
        <br />

        <br />
        <div class="cforms">
          <input type="text" name="site_id" placeholder="Type in Site Id" value="{{$value->site_id}}">
           
     @php
              $halved = array_chunk($strucs, ceil(count($strucs)/2));
              

          @endphp

    @foreach($halved[0] as $key => $val)
    

      @include('shared.editForm')
        
    @endforeach

  

             <div class="clearfix"></div>
           

      </div>
      </div>

      <div class="col-md-6 col-sm-6">
        <div class="cforms"><br><br>
           @foreach(array_slice($strucs, count($halved[0]), count($strucs), true) as $key => $val)
    

            @include('shared.editForm')
              
          @endforeach
        </div>
      	
      </div>

      
  </div>
  <div class="row text-center">
    
            <button type="submit" class="but_check"><i class="fa fa-check fa-lg"></i>&nbsp; Update</button>
            <a href="{{url('form/audit/'.$value->form->name)}}" class="but_question_mark"><i class="fa fa-times fa-lg"></i>&nbsp; Exit</a>
  </div>

  {!! Form::close() !!}
</div>
</div>
  @else

      <div class="row"><br><br><br>

    <div class="section-paddingprimary">
        <div class="container"><br><br><br><br><br><br><br><br><br>
          @include('flash::message')
    
      <ul class="tabs3">
        @foreach($arr_strucs as $strucs)
        
            <li><a href="#example-3-tab-{{$strucs->id}}" target="_self">{{$strucs->sub_header->name}}</a></li>
        @endforeach
        </ul>
         
        <div class="tabs-content3 two">

        @foreach($sub_values as $akey => $val)
        @php $strucs = $arr_strucs[$akey] @endphp
        
           
        
        <div id="example-3-tab-{{$strucs->id}}" class="tabs-panel3">

          @php
              
              $sub_strucs = json_decode($strucs->struc);

              $halved = array_chunk($sub_strucs, ceil(count($sub_strucs)/2));

              $values = json_decode($val->form_values);



          @endphp

          @if(count($sub_strucs) < 2)
           {!! Form::open(['class' => 'form-horizontal', 'method'=>'patch', 'action'=>['SiteAuditController@update', $value->id]]) !!}
            
            <div class="col-md-6 col-sm-6">
                <div class="cforms"><br><br>

                  <input type="text" name="site_id" placeholder="Type in Site Id" value="{{$value->site_id}}">
                  <input type="hidden" name="value_id" value="{{$val->id}}">
                     
                      @foreach($sub_strucs as $key => $val)

                            @include('shared.editForm')

                    @endforeach
                    

            </div>
           </div>

           <br>
        <div class="row text-center">
            <button type="submit" class="but_check"><i class="fa fa-check fa-lg"></i>&nbsp; Update </button>
       </div>
           {!! Form::close() !!}
          @else

         {!! Form::open(['class' => 'form-horizontal', 'method'=>'patch', 'action'=>['SiteAuditController@update', $value->id]]) !!}
          
            <div class="col-md-6 col-sm-6">
                <div class="cforms"><br><br>

                  <input type="text" name="site_id" placeholder="Type in Site Id" value="{{$value->site_id}}">
                  <input type="hidden" name="value_id" value="{{$val->id}}">s

                     {{--@foreach($halved[0] as $val)--}}
                      @foreach($halved[0] as $key => $val)

                            @include('shared.editForm')

                    @endforeach
                    

            </div>
           </div>

           <div class="col-md-6 col-sm-6">
                <div class="cforms"><br><br>
                 

                     @foreach($halved[1] as $val)

                            @include('shared.editForm')

                    @endforeach 
                    

            </div>
           </div>

           <br>
        <div class="row text-center">
            <input type="hidden" name="token" value="FsWga4&@f6aw" />
            <button type="submit" class="but_check"><i class="fa fa-check fa-lg"></i>&nbsp; Update </button>
       </div>
           {!! Form::close() !!}
           @endif
 
</div>

@endforeach

</div>

</div>
</div>
</div>

 @endif

@stop

