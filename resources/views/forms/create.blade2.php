@extends('layouts.master')

@section('navbar')
 @include('shared.navbar', ['active' => strtolower($active_page ?? 'home') ])

@stop

@section('contents')
<br><br>
	<main>
       <div class="container">
        <div class="row">
            <a href="{{url('template')}}" class="but_question_mark"><i class="fa fa-arroe-left fa-lg"></i>&nbsp; Back</a>
        </div><br>

       	<div class="row">
       		<p class="h5 text-center mb-4">{{$tempt->name}}</p>
       		
       	</div> 

       	{!! Form::open(['class' => 'form-horizontal', 'method'=>'post', 'action'=>'SiteAuditController@store']) !!}

       	<input type="hidden" name="template_id" value="{{$tempt->id}}">
        <input type="hidden" name="form_id" value="{{$tempt->id}}">

        {{--@if(!$tempt->sub_headers->isEmpty())

            <ul class="nav nav-tabs nav-justified unique" role="tablist">
                @foreach($tempt->sub_headers as $value)
   
                 @if($loop->first)
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab " href="#{{$value->slug}}" role="tab">{{$value->name}}</a>
                    </li>
                 @else
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab " href="#{{$value->slug}}" role="tab">{{$value->name}}</a>
                    </li>
                                @endif
                @endforeach
    
</ul>

<!-- Tab panels -->
<div class="tab-content">
    @foreach($tempt->sub_headers as $value)

     @php
        $template = $template->where('sub_header_id', $value->id);

    @endphp
   
    <!--Panel 1-->
    @if($loop->first)
    <div class="tab-panel fade in show active" id="{{$value->slug}}" role="tabpanel">
    @else
    <div class="tab-panel fade" id="{{$value->slug}}" role="tabpanel">
    @endif
        <br>

@foreach($template as $temp)
         @if($temp->value_type_id == 3)

            <div class="row">
                <div class="col-md-12">

                    <div class="col-md-6">
                        <div class="md-form">
                            <input type="hidden" name="temp[{{$temp->id}}]" value="{{$temp->id}}">
                            <input type="hidden" name="temp_struc_id[]" value="{{$temp->id}}">
                            <textarea type="text" id="form7" class="md-textarea" name="value[]"></textarea>
                            <label for="form7">{{$temp->label}}</label>
                        </div>
                                     
                    </div>
                </div>
            </div>

            @elseif($temp->value_type_id == 4)

           

                <div class="row">
                <div class="col-md-12">

                    <div class="col-md-6">
                        
                        <div class="md-form">
                            <input type="hidden" name="temp[{{$temp->id}}]" value="{{$temp->id}}">
                            <input type="hidden" name="temp_struc_id[]" value="{{$temp->id}}">
                            <select type="text"  id="option0" name="value[]" placeholder="Select" class="form-control">
                                
                                    <option>Select {{$temp->label}}</option>
                                @foreach($temp->options as $type)
                                    <option value="{{$type->name}}">{{$type->name}}</option>
                                @endforeach
                            </select>    
                        </div>

                        
                               
                       
             
                    </div>
                </div>
            </div>
            @elseif($temp->value_type_id == 5)

                <div class="row">
                
                    <div class="col-md-6">
                        
                        <div class="md-form">
                            <input type="hidden" name="temp[{{$temp->id}}]" value="{{$temp->id}}">
                            <input type="hidden" name="temp_struc_id[]" value="{{$temp->id}}">
                            <select type="text"  id="option0" name="value[]" placeholder="Select" class="form-control">
                                
                                    <option>Select {{$temp->label}}</option>
                                @foreach($temp->options as $type)
                                    <option value="{{$type->name}}">{{$type->name}}</option>
                                @endforeach
                            </select>    
                        </div>
                       
             
                    </div>

                    <div class="col-md-6">
                        <div class="md-form">
                            <input type="hidden" name="temp[{{$temp->id}}]" value="{{$temp->id}}">
                            <input type="hidden" name="temp_struc_id[]" value="{{$temp->id}}">
                            <input type="text" id="form1" class="form-control" name="condition_val[]">
                            <label for="form7">Comment</label>
                        </div>
                    </div>

               
            </div>

            @elseif($temp->value_type_id == 6)

                <div class="row">
                    

                        <div class="col-md-6">
                            <div class="md-form">
                                <input type="hidden" name="temp[{{$temp->id}}]" value="{{$temp->id}}">
                                <input type="hidden" name="temp_struc_id[]" value="{{$temp->id}}">
                                <input type="text" id="form1" class="form-control" name="value[]">
                                <label for="form1" class="">{{$temp->label}}</label>
                            </div>
                 
                        </div>

                        <div class="col-md-6">
                            <div class="md-form">
                                <input type="hidden" name="temp[{{$temp->id}}]" value="{{$temp->id}}">
                                <input type="hidden" name="temp_struc_id[]" value="{{$temp->id}}">
                                <select type="text"  id="option0" name="value[]" placeholder="Select" class="form-control">
                                    
                                        <option>Select {{$temp->label}}</option>
                                    @foreach($temp->options as $type)
                                        <option value="{{$type->name}}">{{$type->name}}</option>
                                    @endforeach
                                </select>    
                            </div>
                        </div>
                   
                </div>

            @elseif($temp->value_type_id == 7)

            <div class="row">
                <div class="col-md-12">

                    <div class="col-md-6">

                       
                            <div class="file-field">
                                <h2>Upload Picture</h2>
                                <div class="btn btn-primary btn-sm">
                                    <span>Choose file</span>
                                    <input type="hidden" name="temp[{{$temp->id}}]" value="{{$temp->id}}">
                                    <input type="hidden" name="temp_struc_id[]" value="{{$temp->id}}">
                                    <input type="file" name="value[]">
                                </div>
                                
                            </div>
                       
             
                    </div>
                </div>
            </div>

            @else

                <div class="row">
                <div class="col-md-12">

                    <div class="col-md-6">
                        <div class="md-form">
                            <input type="hidden" name="temp[{{$temp->id}}]" value="{{$temp->id}}">
                            <input type="hidden" name="temp_struc_id[]" value="{{$temp->id}}">
                            <input type="text" id="form1" class="form-control" name="value[]">
                            <label for="form1" class="">{{$temp->label}}</label>
                        </div>
             
                    </div>
                </div>
            </div>

            @endif
            @endforeach

    </div>
   
    <!--/.Panel 1-->
    @endforeach

   

</div>

                            
                            
        @else--}}
       	@foreach($template as $temp)
       		
            
           @if($temp->value_type_id == 3)

            <div class="row">
            	<div class="col-md-12">

            		<div class="col-md-6">
            			<div class="md-form">
            				<input type="hidden" name="temp[{{$temp->id}}]" value="{{$temp->id}}">
            				<input type="hidden" name="temp_struc_id[]" value="{{$temp->id}}">
						    <textarea type="text" id="form7" class="md-textarea" name="value[]"></textarea>
						    <label for="form7">{{$temp->label}}</label>
						</div>
						             
            		</div>
            	</div>
            </div>

            @elseif($temp->value_type_id == 4)

           

            	<div class="row">
            	<div class="col-md-12">

            		<div class="col-md-6">
            			
            			<div class="md-form">
            				<input type="hidden" name="temp[{{$temp->id}}]" value="{{$temp->id}}">
            				<input type="hidden" name="temp_struc_id[]" value="{{$temp->id}}">
				            <select type="text"  id="option0" name="value[]" placeholder="Select" class="form-control">
				                
				                	<option>Select {{$temp->label}}</option>
				                @foreach($temp->options as $type)
				                    <option value="{{$type->name}}">{{$type->name}}</option>
				                @endforeach
				            </select>    
				        </div>

                        
                               
					   
             
            		</div>
            	</div>
            </div>
            @elseif($temp->value_type_id == 5)

                <div class="row">
                
                    <div class="col-md-6">
                        
                        <div class="md-form">
                            <input type="hidden" name="temp[{{$temp->id}}]" value="{{$temp->id}}">
                            <input type="hidden" name="temp_struc_id[]" value="{{$temp->id}}">
                            <select type="text"  id="option0" name="value[]" placeholder="Select" class="form-control">
                                
                                    <option>Select {{$temp->label}}</option>
                                @foreach($temp->options as $type)
                                    <option value="{{$type->name}}">{{$type->name}}</option>
                                @endforeach
                            </select>    
                        </div>
                       
             
                    </div>

                    <div class="col-md-6">
                        <div class="md-form">
                            <input type="hidden" name="temp[{{$temp->id}}]" value="{{$temp->id}}">
                            <input type="hidden" name="temp_struc_id[]" value="{{$temp->id}}">
                            <input type="text" id="form1" class="form-control" name="condition_val[]">
                            <label for="form7">Comment</label>
                        </div>
                    </div>

               
            </div>

            @elseif($temp->value_type_id == 6)

                <div class="row">
                    

                        <div class="col-md-6">
                            <div class="md-form">
                                <input type="hidden" name="temp[{{$temp->id}}]" value="{{$temp->id}}">
                                <input type="hidden" name="temp_struc_id[]" value="{{$temp->id}}">
                                <input type="text" id="form1" class="form-control" name="value[]">
                                <label for="form1" class="">{{$temp->label}}</label>
                            </div>
                 
                        </div>

                        <div class="col-md-6">
                            <div class="md-form">
                                <input type="hidden" name="temp[{{$temp->id}}]" value="{{$temp->id}}">
                                <input type="hidden" name="temp_struc_id[]" value="{{$temp->id}}">
                                <select type="text"  id="option0" name="value[]" placeholder="Select" class="form-control">
                                    
                                        <option>Select {{$temp->label}}</option>
                                    @foreach($temp->options as $type)
                                        <option value="{{$type->name}}">{{$type->name}}</option>
                                    @endforeach
                                </select>    
                            </div>
                        </div>
                   
                </div>

            @elseif($temp->value_type_id == 7)

            <div class="row">
                <div class="col-md-12">

                    <div class="col-md-6">

                       
                            <div class="file-field">
                                <h2>Upload Picture</h2>
                                <div class="btn btn-primary btn-sm">
                                    <span>Choose file</span>
                                    <input type="hidden" name="temp[{{$temp->id}}]" value="{{$temp->id}}">
                                    <input type="hidden" name="temp_struc_id[]" value="{{$temp->id}}">
                                    <input type="file" name="value[]">
                                </div>
                                
                            </div>
                       
             
                    </div>
                </div>
            </div>

            @else

            	<div class="row">
            	<div class="col-md-12">

            		<div class="col-md-6">
            			<div class="md-form">
            				<input type="hidden" name="temp[{{$temp->id}}]" value="{{$temp->id}}">
            				<input type="hidden" name="temp_struc_id[]" value="{{$temp->id}}">
						    <input type="text" id="form1" class="form-control" name="value[]">
						    <label for="form1" class="">{{$temp->label}}</label>
						</div>
             
            		</div>
            	</div>
            </div>

            @endif
        	@endforeach
           {{-- @endif--}} 
<br>
        	<div class="row">
        		<div class="col-md-6">
        			 <div class="text-center">
				        <button class="btn btn-unique" type="submit">Submit <i class="fa fa-paper-plane-o ml-1"></i></button>
				    </div>
        		</div>
        	</div>

        	{!! Form::close() !!}
        </div>
        
    </main>

<script>
$('#myTab a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
}) 
</script>
@stop