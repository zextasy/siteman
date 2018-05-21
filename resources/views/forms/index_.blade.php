@extends('layouts.master')

@section('navbar')
 @include('shared.navbar', ['active' => strtolower($active_page ?? 'home') ])

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

<div class="container"><br><br><br>
	@include('flash::message')

	<div class="row">
		<a href="{{url('site_audit/'.$form->template->name)}}" class="but_question_mark"><i class="fa fa-arrow-left fa-lg"></i>&nbsp; Back</a>
		<a href="{{url('create/'.$form->template->id.'/'.$form->name)}}" class="but_woman"><i class="fa fa-pencil fa-lg"></i>&nbsp; Create</a>
		<a href="{{url('export')}}" class="but_chat"><i class="fa fa-file-excel-o fa-lg"></i>&nbsp; Export</a>
	</div><br>

	<div class="row">
			<h2 class="font-weigth-bold">{{$form->name}}</h2>
		</div><br>

	<div class="row">
		<!-- to check whether there are submitted form -->
		@if($form->values->isEmpty())

			<div class="errormes">
            <div class="message-box-wrap">
                <i class="fa fa-exclamation-circle fa-lg text-capitalize"></i> No Submitted Form</div>
         </div><br><br>

         <!-- submitted forms -->
         @else
		<table class="table">
			  <thead class="th-color">
			        <tr class="text-white" >
			      <th style="line-height: 20px">Name</th>
			      <th style="line-height: 20px">Site Id</th>

			      <!-- Getting the form sturctures  -->
			      @foreach($struc_datas as $info)
			      <th style="line-height: 20px">{{$info->label}}</th>
			      @endforeach
			      <th style="line-height: 20px">Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	
			  		@php $key = []; @endphp
			  		<!-- Getting the values of the form -->
					@foreach ($template_values as $keys) 

					<!-- Check where the submitted form has sub_header  -->
					@if($keys->sub_header_id)


					
					@php
					
					/* if (!empty($key)) {
					break;
					 } */

					
					for($i = 0; $i < $template_values->count(); $i++){

					$val = $template_values[$i];
					if($val->sub_header_id != null){
					
					array_push($key, $val);
					break;

					}

					}
					
					

					  @endphp
					 

					<tr>
								<td style="line-height: 20px; width: 10%">
			            			{{$keys->user->name}}
								</td>
								<td style="line-height: 20px; width: 10%">
									@if($keys->site_id == null)
									N/A
									@else
			            			{{$keys->site_id}}
			            			@endif
								</td>
						@foreach(array_slice(json_decode($keys->form_values), 0, 4, true) as $val)
			            
			            
			            		<td style="line-height: 20px">
			            			 {{$val->value}}
								</td>
			            @endforeach
			           
			            <td style="line-height: 20px; width: 10%">
			            
			<div class="btn-group">
            <button type="button" class="btn btn-info btn-sm">Action</button>
            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
                <span class="sr-only">Toggle DropDown</span>
            </button>
                <ul class="dropdown-menu" role="menu" id="export-menu">
									
									<li><a href="{{url('siteAudit/'.$keys->form->slug.'/show/'.$keys->id)}}"><i class="fa fa-eye fa-lg"> Show</i></a></li>
									<li><a href="{{url('siteAudit/'.$form->slug.'/edit/'.$keys->id)}}" ><i class="fa fa-edit fa-lg"> Edit </i></a></li>
									<li><a href="{{url('siteAudit/'.$form->slug.'/delete/'.$keys->id)}}" ><i class="fa fa-trash fa-lg"> Delete</i></a></li>
									<li><a href="{{url('siteAudit/'.$form->slug.'/edit/'.$keys->id)}}" ><i class="fa fa-excel-o fa-lg"> Export</i></a></li>
										
                </ul>
            
           </div>
			            	
			            </td>
			           </tr>
					@elseif(!$keys->sub_header_id)
					
					<tr>
								<td style="line-height: 20px; width: 10%">
			            			{{$keys->user->name}}
								</td>
								<td style="line-height: 20px; width: 10%">
									@if($keys->site_id == null)
									N/A
									@else
			            			{{$keys->site_id}}
			            			@endif
								</td>
						@foreach(array_slice(json_decode($keys->form_values), 0, 4, true) as $val)
			            
			            
			            		<td style="line-height: 20px">
			            			{{$val->value}}
								</td>
			            @endforeach
			           
			            <td style="line-height: 20px; width: 10%">
			            
			            	<div class="btn-group">
            <button type="button" class="btn btn-info btn-sm">Action</button>
            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
                <span class="sr-only">Toggle DropDown</span>
            </button>
                <ul class="dropdown-menu" role="menu" id="export-menu">
									
									<li><a href="{{url('siteAudit/'.$keys->form->slug.'/show/'.$keys->id)}}"><i class="fa fa-eye fa-lg"> Show</i></a></li>
									<li><a href="{{url('siteAudit/'.$form->slug.'/edit/'.$keys->id)}}" ><i class="fa fa-edit fa-lg"> Edit </i></a></li>
									<li><a href="{{url('siteAudit/'.$form->slug.'/delete/'.$keys->id)}}" ><i class="fa fa-trash fa-lg"> Delete</i></a></li>
									<li><a href="{{url('siteAudit/'.$form->slug.'/delete/'.$keys->id)}}" ><i class="fa fa-excel-o fa-lg"> Export</i></a></li>
										
                </ul>
            
           </div>
			            	{{--<a href="{{url($keys->form->slug.'/show/'.$keys->id)}}" class="but_chat"><i class="fa fa-eye fa-lg"></i></a>
			            	<a href="{{url($form->slug.'/edit/'.$keys->id)}}" class="but_woman"><i class="fa fa-edit fa-lg"></i></a>
			            	<a href="{{url($form->slug.'/delete/'.$keys->id)}}" class="but_bookmark"><i class="fa fa-trash fa-lg"></i></a>--}}
			            </td>
			           </tr>
			           @endif
			        @endforeach
							
									
					

						

						

			  </tbody>
			</table><br><br><br>
			
			@endif
	</div>
	
</div>

                                    

@endsection