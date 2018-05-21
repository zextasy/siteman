<div class="row">
	<div class="cforms text-center">
           

           {!! Form::open(['class' => 'form-horizontal', 'method'=>'patch', 'action'=>['FormController@update', $form->slug]]) !!}
           	
            <div class="text-center" style="padding-left: 60px">
            <label class="input">
               <input type="text" name="form_name" class="form-control" placeholder="Your Form Name" value="{{$form->name}}">
             </label>
         </div> 
             <button type="submit" class="but_check"><i class="fa fa-check fa-lg"></i>&nbsp; Update</button>&nbsp;
             {!! Form::close() !!}

         </div>
           
</div>