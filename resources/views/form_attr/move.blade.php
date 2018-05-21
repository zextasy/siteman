<div class="row">
	<div class="cforms text-center">
           
 {!! Form::open(['class' => 'form-horizontal', 'method'=>'post', 'action'=>['FormAttributeController@update_index', $struc->id], 'onsubmit' => 'return check()']) !!} 

           {{--<form method="Post" action="/attr/move/{{$struc->id}}" onsubmit="return check(document.getElementById('direction').value)">
            {{csrf_method('post')}} --}}
            <div class="alert alert-dismissible alert-warning" style="display: none" id="display_error">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <h4 class="alert-heading">Warning!</h4>
                  <p class="mb-0" id="error_message"> </p>
            </div>

           
           
            <input type="hidden" name="number" value="{{$index_no}}" >
            <div class="text-center" style="padding-left: 60px">
            <label class="label">{{$attr_val->label}}</label><br>

             
            <label class="input">
               <input type="number" id="steps" name="steps" onkeydown="clearError()" class="form-control" placeholder="Type in the position you want to move to" required="">
             </label>

             



         </div> 
             <button type="submit" class="but_check" name="direction" value="up"><i class="fa fa-arrows fa-lg"></i>&nbsp; Move</button>&nbsp;
             

             <input type="hidden" id="direction">
             {!! Form::close() !!}
         </div>
           
</div>

<script type="text/javascript">
    function check(){
        var no_index = {{(count($index))}};
        var position = document.getElementById('steps').value;
        var display_error = document.getElementById('display_error');

        if(position > no_index){
            display_error.style.display = "";
            document.getElementById('error_message').innerHTML = "You can not move to this position";       
            return false;
        }

        else if(position == 0){
            display_error.style.display = "";
            document.getElementById('error_message').innerHTML = "You can not move to this position";       
            return false;
        }
       else{
        return true;
       }
        
        
    }

    function clearError()
    {
        display_error.style.display = "none";
        document.getElementById('error_message').innerHTML = "";
    }

   
</script>

