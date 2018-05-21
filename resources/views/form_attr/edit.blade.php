<div class="row">
	<div class="cforms text-center">
           

           {!! Form::open(['class' => 'form-horizontal', 'method'=>'patch', 'action'=>['FormAttributeController@update', $struc->id]]) !!}
           
            <input type="hidden" name="number" value="{{$index_no}}">
            <div class="text-center" style="padding-left: 60px">
            <label class="label">Name</label>
            <label class="input">
               <input type="text" name="attr_name" class="form-control" placeholder="Your Form Name" value="{{$attr_val->label}}">
             </label>

             <label class="input">
                <select type="text"  id="name" name="required" class="form-control">
                    <option value="0" @if($attr_val->required == 0) selected @endif>Optional</option> 
                    <option value="1" @if($attr_val->required == 1) selected @endif>Required</option> 
            </select> 
             </label>

             <label class="input">
                <select type="text"  id="option0" name="value_type_id" onchange="flip_device(0)" class="form-control">
                @foreach($types as $type)
                    <option value="{{$type->id}}" @if(!strcmp($type->id, $attr_val->value_type_id)) selected="" @endif>{{$type->name}}</option>
                @endforeach
            </select>  
             </label>

             <label class="input" id="option_div0">
                
             </label>

         </div> 
             <button type="submit" class="but_check"><i class="fa fa-check fa-lg"></i>&nbsp; Update</button>&nbsp;
             {!! Form::close() !!}

         </div>
           
</div>

<script type="text/javascript">
  function flip_device(id){
       // alert('hello');
        var option = document.getElementById('option'+id).value;
        var div = document.getElementById('option_div'+id);
        if(option == 4)
        {
            div.innerHTML = `<select name="options[]" id="tags" class="form-control tags" placeholder="type in your options" style="width:300px;" multiple></select>`;
            $('.tags').select2({
                tags:true
            });  
        }
        else if(option == 5)
        {
           div.innerHTML = `<select name="options[]" id="tags" class="form-control tags" placeholder="type in your options" style="width:300px;" multiple></select>`;
            $('.tags').select2({
                tags:true
            });   
        }
        else if(option == 6)
        {
          div.innerHTML = `<select name="options[]" id="tags" class="form-control tags" placeholder="type in your options" style="width:300px;" multiple></select>`;
            $('.tags').select2({
                tags:true
            });  
        }

        else{
            div.innerHTML = "";
        }


    
        console.log(option);
    }
</script>