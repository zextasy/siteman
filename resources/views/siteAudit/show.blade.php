@extends('layouts.master')

@section('navbar')
 @include('shared.navbar', ['active' => strtolower($active_page ?? 'home') ])

@stop

@section('contents')

 <div class="page_title ">
        <div class="container">
        <div class="title"><h1> {{$value->form->name}}</h1></div>
        
         <div class="pagenation">&nbsp;<a href="{{url('home')}}">Home</a>  <i>/</i>{{$value->template->name}}</div>
          <div class="col-md-12 col-sm-6">
           
          </div>
       
        </div>
     </div>

<div class=" section-paddingprimary">
        <div class="container">

         <br><br><br>
@if(!$value->sub_header_id)
        <div class="row">
         
            @php
              $halved = array_chunk($strucs, ceil(count($strucs)/2)); 

          @endphp
@if(count($strucs) < 2)

 
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
           
       
    @foreach($strucs as $key => $val)
    

      @include('shared.showForm')
        
    @endforeach

      </div>
      </div>

@else

          

        
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
           
       
    @foreach($halved[0] as $key => $val)
    

      @include('shared.showForm')
        
    @endforeach

      </div>
      </div>

      <div class="col-md-6 col-sm-6">
        <div class="cforms"><br><br>
          
          @foreach(array_slice($strucs, count($halved[0]), count($strucs), true) as $key => $val)
            

              @include('shared.showForm')
   
              
          @endforeach

        </div>
      	
      </div>
@endif
      
  </div>
  @else


  <div class="row"><br><br><br>

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
    
           
            <a href="{{url('form/audit/'.$value->form->name)}}" class="but_question_mark"><i class="fa fa-times fa-lg"></i>&nbsp; Exit</a>
  </div>

  
</div>

</div>

@stop

