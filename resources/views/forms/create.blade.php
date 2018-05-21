@extends('layouts.master')

@section('navbar')
 @include('shared.navbar', ['active' => strtolower($active_page ?? 'home') ])

@stop

@section('contents')

 <div class="page_title ">
        <div class="container">
        <div class="title"><h1>{{$form->name}}</h1></div>
        
         <div class="pagenation">&nbsp;<a href="{{url('home')}}">Home</a>  <i>/</i>Site Audit</div>
          <div class="col-md-12 col-sm-6">
           <a href="{{url('form/audit/'.$form->name)}}" class="but_question_mark"><i class="fa fa-arrow-left fa-lg"></i>&nbsp; Back</a>
          </div>
       
        </div>
     </div>

<div class=" section-paddingprimary">
        <div class="container">

         <br><br><br>
 
 @if(!Empty($strucs))
 {!! Form::open(['class' => 'form-horizontal', 'method'=>'post', 'action'=>'SiteAuditController@store', 'files' => true]) !!}
        <div class="row">

       <div class="col-md-6 col-sm-6">
        
        <br />

        <br />
        <div class="cforms">
            <input type="hidden" name="template_id" value="{{$form->template->id}}">
            <input type="hidden" name="form_id" value="{{$form->id}}">
        <div class="form-group">
          <div class="col-lg-8">
            <div class="bs-component">
          <select type="text" id="" name="site_id" class="form-control select2" placeholder="">
            <option selected>Select Task</option>
            @foreach($tasks as $task)
            <option value="{{$task->id}}">{{$task->task_name}}</option>
            @endforeach
          </select>
          </div>
          </div>
        </div>           


            {{-- <input type="text" name="site_id" placeholder="Type in Site Id" required=""> --}}
  
         @php
              $halved = array_chunk($strucs, ceil(count($strucs)/2));
              

          @endphp
       
      <!-- Helps to divide the form into 2-->

       @foreach($halved[0] as $val)
       @if(isset($val))
                @include('shared.form')
        @endif
        @endforeach


             <div class="clearfix"></div>
           

      </div>
      </div>

      <div class="col-md-6 col-sm-6">
        <div class="cforms"><br><br>
         @foreach($halved[1] as $val)
         @if(isset($val))
                @include('shared.form')
        @endif
        @endforeach
        </div>
      	
      </div>

       <div class="row text-center">
            <input type="hidden" name="token" value="FsWga4&@f6aw" />
            <button type="submit" class="but_check"><i class="fa fa-check fa-lg"></i>&nbsp; Save </button>
       </div>

      
  </div>
  {!! Form::close() !!}
  @else
          

  <div class="row"><br><br><br>

    <div class="section-paddingprimary">
        <div class="container">
          @include('flash::message')
    
      <ul class="tabs3">
        @foreach($struc_subs as $strucs)
          @if(isset($strucs->sub_header->name))
            <li><a href="#example-3-tab-{{$strucs->id}}" target="_self">{{$strucs->sub_header->name}}</a></li>
            @endif
        @endforeach
        </ul>
         
        <div class="tabs-content3 two">

        @foreach($struc_subs as $strucs)

        
           
        
        <div id="example-3-tab-{{$strucs->id}}" class="tabs-panel3">

          @php
              $sub_strucs = json_decode($strucs->struc);
              $halved = array_chunk($sub_strucs, ceil(count($sub_strucs)/2));

          @endphp

          @if(count($sub_strucs) < 2)
           {!! Form::open(['class' => 'form-horizontal', 'method'=>'post', 'action'=>'SiteAuditController@store', 'files' => true]) !!}
            <input type="hidden" name="template_id" value="{{$form->template->id}}">
            <input type="hidden" name="form_id" value="{{$form->id}}">

            <div class="col-md-6 col-sm-6">
                <div class="cforms"><br><br>
                @if(isset($strucs->sub_header->id))
                  <input type="hidden" name="sub_header" value="{{$strucs->sub_header->id}}">
                   <input type="text" name="site_id" placeholder="Type in Site Id" required="">
               @endif
                     @foreach($sub_strucs as $val)

                            @include('shared.form')

                    @endforeach
                    

            </div>
           </div>

           <br>
        <div class="row text-center">
            <input type="hidden" name="token" value="FsWga4&@f6aw" />
            <button type="submit" class="but_check"><i class="fa fa-check fa-lg"></i>&nbsp; Save </button>
       </div>
           {!! Form::close() !!}
          @else

          {!! Form::open(['class' => 'form-horizontal', 'method'=>'post', 'action'=>'SiteAuditController@store', 'files' => true]) !!}
           <input type="hidden" name="template_id" value="{{$form->template->id}}">
            <input type="hidden" name="form_id" value="{{$form->id}}">
        
            <div class="col-md-6 col-sm-6">
                <div class="cforms"><br><br>

                  <input type="hidden" name="sub_header" value="{{$strucs->sub_header->id}}">
                  <input type="text" name="site_id" placeholder="Type in Site Id" required="">

                     @foreach($halved[0] as $val)
                      @if(isset($val))
                            @include('shared.form')
                      @endif
                    @endforeach
                    

            </div>
           </div>

           <div class="col-md-6 col-sm-6">
                <div class="cforms"><br><br>
                 
                     @foreach($halved[1] as $val)
                      @if(isset($val))
                            @include('shared.form')
                      @endif
                    @endforeach
                    

            </div>
           </div>

           <br>
        <div class="row text-center">
            <input type="hidden" name="token" value="FsWga4&@f6aw" />
            <button type="submit" class="but_check"><i class="fa fa-check fa-lg"></i>&nbsp; Save </button>
       </div>
           {!! Form::close() !!}
           @endif

           

        </div><!-- end tab 1 -->
 
         @endforeach
        
        
        </div><!-- end all tabs -->
      </div>
    </div>
  </div>
  @endif
  

 
</div>

</div>
@stop

