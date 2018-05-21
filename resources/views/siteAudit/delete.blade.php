@extends('layouts.master')

@section('navbar')
 @include('shared.navbar', ['active' => strtolower($active_page ?? 'home') ])

@stop

@section('contents')

 <div class="page_title ">
        <div class="container">
        <div class="title"><h1> delete {{$value->form->name}}</h1></div>
        
         <div class="pagenation">&nbsp;<a href="{{url('home')}}">Home</a>  <i>/</i>{{$value->template->name}}</div>
          <div class="col-md-12 col-sm-6">
           
          </div>
       
        </div>
     </div>

<div class=" section-paddingprimary">
  <br><br><br><br><br><br><br><br><br>

<div class="text-center col-sm-offset-1 col-md-10">
  <div class="errormes">
            <div class="message-box-wrap">
                <i class="fa fa-exclamation-circle fa-lg text-capitalize"></i> Are you sure you want to delete this site information?</div>
         </div><br>
</div>

  {!! Form::open(['class' => 'form-horizontal', 'method'=>'delete', 'action'=>['SiteAuditController@destroy', $value->id]]) !!}
        <div class="container">

         
         
@if(!$value->sub_header_id)
        <div class="row">

        
       <div class="col-md-6 col-sm-6">
        
        <br />

        <br />
         <div class="row">
          <div class="row font-italic">
            <span class="font-italic">Site Id</span>
          </div>
          
          <div class="text-uppercase">
            <b>{{$value->site_id}}</b>
          </div><br>
        </div>
        <div class="cforms">
           
         @php
              $halved = array_chunk($strucs, ceil(count($strucs)/2)); 

          @endphp

    @foreach($halved[0] as $key => $val)
    

      @include('shared.showForm')
        
    @endforeach

  

             <div class="clearfix"></div>
           

      </div>
      </div>

      <div class="col-md-6 col-sm-6">
        <div class="cforms"><br><br>
          
          @foreach(array_slice($strucs, count($halved[0]), count($strucs), true) as $key => $val)
            

              @include('shared.showForm')
   
              
          @endforeach

        </div>
        
      </div>

      
  </div>

  @else


  <div class="row">

    <div class="section-paddingprimary">
        <div class="container">
          @include('flash::message')
    
      <ul class="tabs3">
        @foreach($arr_strucs as $strucs)

        
            <li style=""><a href="#example-3-tab-{{$strucs->id}}" target="_self">{{$strucs->sub_header->name}}</a></li>
        @endforeach
        </ul>
         
        <div class="tabs-content3 two">

       {{--  @foreach($arr_strucs as $akey => $strucs)
         @php $val = $sub_values[$akey] @endphp --}}
         @foreach($sub_values as $akey => $val)
         @php $strucs = $arr_strucs[$akey] @endphp
       
        
        

        
        <div id="example-3-tab-{{$strucs->id}}" class="tabs-panel3">

          @php
              $sub_strucs = json_decode($strucs->struc);

              $halved = array_chunk($sub_strucs, ceil(count($sub_strucs)/2));

              $values = json_decode($val->form_values);
        
           

          @endphp

          @if(count($sub_strucs) < 2)
          
           
            <div class="col-md-6 col-sm-6">
                <div class="cforms"><br><br>

                  
          <div class="row">
          <div class="row font-italic">
            <span class="font-italic">Site Id</span>
          </div>
          
          <div class="text-uppercase">
            <b>{{$val->site_id}}</b>
          </div><br>
        </div>

                    
                  
                     @foreach($sub_strucs as $key => $val)
                    
                      
                        @include('shared.showForm')
                          
                      @endforeach


            </div>
           </div>

           <br>
       
           
          @else

         
        
            <div class="col-md-6 col-sm-6">
                <div class="cforms"><br><br>

              
                  <div class="row">
                      <div class="row font-italic">
                        <span class="font-italic">Site Id</span>
                      </div>
                      
                      <div class="text-uppercase">
                        <b>{{$val->site_id}}</b>
                      </div><br>
                    </div>
                       {{--@foreach($halved[0] as $val)
                                          
                                                                      @include('shared.form')
                                          
                       @endforeach--}}


                    @foreach($sub_strucs as $key => $val)
    

                          @include('shared.showForm')
                            
                        @endforeach
                    

            </div>
           </div>

           <div class="col-md-6 col-sm-6">
                <div class="cforms"><br><br>
                 
                     {{--@foreach($halved[1] as $val)

                            @include('shared.form')

                    @endforeach                    
            @foreach(array_slice($strucs, count($halved[0]), count($strucs), true) as $key => $val)
            

              @include('shared.showForm')
   
              
          @endforeach--}}


            </div>
           </div>

           <br>
       
          
           @endif

           

        </div><!-- end tab 1 -->
 
         @endforeach
       
        
        </div><!-- end all tabs -->
      </div>
    </div>
  </div>

  @endif
  <div class="row text-center">
    
            <button type="submit" class="but_check"><i class="fa fa-trash fa-lg"></i>&nbsp; Delete</button>
            <a href="{{url('form/audit/'.$value->form->name)}}" class="but_question_mark"><i class="fa fa-times fa-lg"></i>&nbsp; Exit</a>
  </div>

  
</div>
{!! Form::close() !!}

</div>
@stop

