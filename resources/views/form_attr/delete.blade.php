<div class="row">
	<div class="cforms text-center">
           

           {!! Form::open(['class' => 'form-horizontal', 'method'=>'delete', 'action'=>['FormAttributeController@destroy', $struc->id]]) !!}
           
            <input type="hidden" name="number" value="{{$index_no}}">

             <div class="errormes">
            <div class="message-box-wrap">
                <i class="fa fa-exclamation-circle fa-lg text-capitalize"></i> Are you sure you want to delete this form Attribute?</div>
         </div><br>
         
            <div class="text-center" style="padding-left: 60px">
            <label class="label">Name</label>
            <label class="label">
               <span><b> {{$attr_val->label}} </b></span>
             </label>

              <label class="label">Required?</label>
             <label class="label">
                <span><b> @if($attr_val->required == 0) No @else Yes @endif </b></span>
               
             </label>

             

         </div> 
             <button type="submit" class="but_check"><i class="fa fa-trash fa-lg"></i>&nbsp; Delete</button>&nbsp;

             {!! Form::close() !!}

         </div>
           
</div>

