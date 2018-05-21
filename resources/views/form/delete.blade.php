<div class="row">
	<div class="cforms text-center">
           

           {!! Form::open(['class' => 'form-horizontal', 'method'=>'delete', 'action'=>['FormController@destroy', $form->slug]]) !!}

           <div class="errormes">
            <div class="message-box-wrap">
                <i class="fa fa-exclamation-circle fa-lg text-capitalize"></i> Are you sure you want to delete this form?</div>
         </div><br><br>
           	
            <div class="text-center" style="padding-left: 60px">
            <label class="input">
               <input class="form-control" value="{{$form->name}}">
             </label>
         </div> 
             <button type="submit" class="but_check"><i class="fa fa-trash fa-lg"></i>&nbsp; Delete</button>&nbsp;

             {!! Form::close() !!}

         </div>
           
</div>