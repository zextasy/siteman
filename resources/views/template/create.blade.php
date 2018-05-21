@extends('layouts.master')

@section('navbar')
 @include('shared.navbar', ['active' => strtolower($active_page ?? 'home') ])

@stop

@section('contents')

    <div class="page_title ">
        <div class="container">
        @if($temp == null && $sub_form == null)

        <h1>Create Template</h1>
        <div class="pagenation">&nbsp;<a href="index.html">Home</a>  <i>/</i>Template</div>
         @elseif($form == null && $sub_form == null)

         <h1>Create Form</h1>
        <div class="pagenation">&nbsp;<a href="index.html">Home</a>  <i>/</i>Form</div>

        @else


        <h1>Create Attributes Of the Form</h1>
         <div class="pagenation">&nbsp;<a href="index.html">Home</a>  <i>/</i>Form</div>
        @endif
        </div>
     </div><!-- end page title -->


        
       


<div class=" section-paddingprimary">
        <div class="container">
          <div class="clearfix"></div><br><br>
          @include('flash::message')
          <div class="row">
             
                @if($sub_form != null)
                  
                  <a  href="{{url('/template/create')}}" class="but_question_mark"><i class="fa fa-pencil fa-lg"></i>&nbsp;Create New Template </a>&nbsp;
                  <a  href="{{url('/template/create/'.$temp)}}" class="but_woman"><i class="fa fa-pencil fa-lg"></i>&nbsp;Create New Form </a>
                  @endif
          </div>
        <div class="row">
       <div class="col-md-12 col-sm-6">
       
        <br />
        <br />
        <div class="cforms">
           <div id="form_status"></div>

           {!! Form::open(['class' => 'form-horizontal', 'method'=>'post', 'action'=>'TemplateController@store']) !!}
           	 @if($temp == null && $sub_form == null)
           	 <div>
            <label class="label">Name <em>*</em></label>
            <label class="input">
               <input type="text" name="temp_name" class="form-control" placeholder="Your Template Name">
             </label>
         </div><br><br>
             @elseif($form == null && $sub_form == null)
            <div class="clearfix"></div>
            <label class="label">Form Name <em>*</em></label>
            <label class="input">
            	<input type="hidden" name="temp_id" value="{{$temp}}">
               <input type="text" name="form_name" class="form-control" placeholder="Your Form Name">
             </label>
           @else
          
     <div class="md-form">
        If there any sub-header <span class="text-danger font-weight-bold" onclick="add_sub_header()">click here</span> to add sub-header.
        
    </div>

     <div class="md-form" id="sub_header" style="display: none"><br>
        <input type="hidden" name="form_id" value="{{$form}}">
        <input type="text" name="sub_header" class="form-control" placeholder="Your Sub-Header Name">
        
    </div>

    <table class="table" id="add_new_row">
    @php
        $num = 1;
         @endphp
  <thead>
    <tr>
      <th>Name</th>
      <th>Required?</th>
      <th>Type</th>
      <th></th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <td width="30%">
        <div class="md-form">
            <input type="hidden" name="struc" value="0">
            <input type="text" name="name[]" class="form-control" placeholder="Name">
        </div>
        </td>
        <td width="10%">
            <div class="md-form">
            <select type="text"  id="name" name="required[]" class="form-control">
                    <option value="0">Optional</option> 
                    <option value="1">Required</option> 
            </select>    
        </div>
            
        </td>
      <td width="25%">
      <div class="md-form">
            <select type="text"  id="option0" name="value_type_id[]" onchange="flip_device(0)" class="form-control">
                @foreach($types as $type)
                    <option value="{{$type->id}}">{{$type->name}}</option>
                @endforeach
            </select>    
        </div>
        </td>
      <td width="35%">
        <div class="md-form" id="option_div0">
            </div>
      </td>
    </tr>
    
  </tbody>
</table>
                   


     <div class="float-right">
        <a class="btn btn-info" onclick="add_row()">Add Row</a>
    </div><br>

   
          @endif
            
           <br> 
           <div class="text-center">

            <button type="submit" class="but_check"><i class="fa fa-check fa-lg"></i>&nbsp; Save</button>&nbsp;
            <a href="{{url('template')}}" class="but_question_mark"><i class="fa fa-times fa-lg"></i>&nbsp; Exit</a>
        </div>
         {!! Form::close() !!}
         </div>
                <div class="clearfix margin-bottom2"></div>

      </div>
   
     </div>
        </div>
        </div>
        <div class="clearfix"></div>

        {{--<script type="text/javascript" src="{{url('js/jquery-3.2.1.min.js?ver=1.2')}}"></script>--}}
        


    <script>
    COUNTER = 1;
    num = 0; 
    types = new Array();
        <?php foreach($types as $type){ ?>
                types["<?php echo $type->id ?>"] = "<?php echo $type->name ?>";
        <?php } ?>
        options = "";
        for (var k in types){
				if (types.hasOwnProperty(k)) {
					options += '<option value="'+k+'">'+types[k]+'</option>';
				}
		}
   
    function add_row()
    {
        //alert('hello');
        
        
        num++; 
        COUNTER++;
        console.log(num);
        
        
        var table = document.getElementById("add_new_row");

		var row =table.insertRow(-1);
		var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
		cell1.innerHTML = `<div class="md-form">
                            <input type="text" name="name[]" class="form-control" placeholder="Name">
                        </div>`;
        cell2.innerHTML = `<div class="md-form">
                                <select type="text"  id="name" name="required[]" class="form-control">
                                        <option value="0">Optional</option> 
                                        <option value="1">Required</option> 
                                </select>    
                            </div>`;
		cell3.innerHTML = `<div class="md-form">
                                <select type="text"  id="option`+num+`" name="value_type_id[]" onchange="flip_device(`+num+`)" class="form-control">    
                                    ` +options+`
                                </select>    
                            </div>`;
        cell4.innerHTML = `<div class="col-md-4">
                                <div class="md-form" id="option_div`+num+`">
                                </div>
                            </div>`;


    }

     function flip_device(id){
       // alert('hello');
        var option = document.getElementById('option'+id).value;
        var div = document.getElementById('option_div'+id);
        if(option == 4)
        {
            div.innerHTML = `<select name="options`+id+`[]" id="tags" class="form-control tags" placeholder="type in your options" style="width:300px;" multiple></select>`;
            $('.tags').select2({
                tags:true
            });  
        }
        else if(option == 5)
        {
           div.innerHTML = `<select name="options`+id+`[]" id="tags" class="form-control tags" placeholder="type in your options" style="width:300px;" multiple></select>`;
            $('.tags').select2({
                tags:true
            });   
        }
        else if(option == 6)
        {
          div.innerHTML = `<select name="options`+id+`[]" id="tags" class="form-control tags" placeholder="type in your options" style="width:300px;" multiple></select>`;
            $('.tags').select2({
                tags:true
            });  
        }

        else{
            div.innerHTML = "";
        }


    
        console.log(option);
    }

    function add_sub_header()
    {
        var subHeader = document.getElementById('sub_header');
        subHeader.style.display = "block";
    }

    function delete_row(row, table) 
    {
        var i = row.parentNode.parentNode.rowIndex;
        document.getElementById(table).deleteRow(i);
        
    }
</script>
@stop