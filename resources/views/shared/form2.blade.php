


        @if($temp->value_type_id == 3)

            
            				<input type="hidden" name="temp[{{$temp->id}}]" value="{{$temp->id}}" >
            				<input type="hidden" name="temp_struc_id[]" value="{{$temp->id}}">
            				<label class="label">{{$temp->label}} <em>*</em></label>
            				<label class="textarea">
				               <textarea rows="5" name="value[]" id="form7"></textarea>
				             </label><br>

			 @elseif($temp->value_type_id == 4)

           
            				<input type="hidden" name="temp[{{$temp->id}}]" value="{{$temp->id}}">
            				<input type="hidden" name="temp_struc_id[]" value="{{$temp->id}}">
            
            				<label class="input">
				            <select type="text"  id="option0" name="value[]" placeholder="Select">
				                
				                	<option>Select - {{$temp->label}}</option>
				                @foreach($temp->options as $type)
				                    <option value="{{$type->name}}">{{$type->name}}</option>
				                @endforeach
				            </select>
				            </label><br>

			 @elseif($temp->value_type_id == 5)

                            <input type="hidden" name="temp[{{$temp->id}}]" value="{{$temp->id}}">
                            <input type="hidden" name="temp_struc_id[]" value="{{$temp->id}}">
                            <select type="text"  id="option0" name="value[]" placeholder="Select" class="form-control">
                                
                                    <option>Select - {{$temp->label}}</option>
                                @foreach($temp->options as $type)
                                    <option value="{{$type->name}}">{{$type->name}}</option>
                                @endforeach
                            </select>    
         
                    
                            <input type="hidden" name="temp[{{$temp->id}}]" value="{{$temp->id}}">
                            <input type="hidden" name="temp_struc_id[]" value="{{$temp->id}}">
                            <label class="label">Comment @if($temp->required == 1)<em>*</em>@endif</label>
                            <label class="input">
				               <input type="text" id="name" name="condition_val[]" @if($temp->required == 1) required @endif>
				             </label>
                            
               @elseif($temp->value_type_id == 6)

                                <input type="hidden" name="temp[{{$temp->id}}]" value="{{$temp->id}}">
                                <input type="hidden" name="temp_struc_id[]" value="{{$temp->id}}">
                                <label class="label">{{$temp->label}} @if($temp->required == 1)<em>*</em>@endif</label>
                               <label class="input">
				               <input type="text" id="name" name="value[]" @if($temp->required == 1) required @endif>
				             	</label>
                                
                                <input type="hidden" name="temp[{{$temp->id}}]" value="{{$temp->id}}">
                                <input type="hidden" name="temp_struc_id[]" value="{{$temp->id}}">
                                <select type="text"  id="option0" name="value[]" placeholder="Select" class="form-control">
                                    
                                        <option>Select - {{$temp->label}}</option>
                                    @foreach($temp->options as $type)
                                        <option value="{{$type->name}}">{{$type->name}}</option>
                                    @endforeach
                                </select>    
                
                 @elseif($temp->value_type_id == 7)

            
                                
                                
                                    <input type="hidden" name="temp[{{$temp->id}}]" value="{{$temp->id}}">
                                    <input type="hidden" name="temp_struc_id[]" value="{{$temp->id}}">
                                   <label class="label">Upload Picture for {{$temp->label}} @if($temp->required == 1)<em>*</em>@endif</label>
                                     <label class="file">
						               <input type="file" name="name" id="value[]" @if($temp->required == 1) required @endif>
						             </label>
   
            @else

            				<input type="hidden" name="temp[{{$temp->id}}]" value="{{$temp->id}}">
            				<input type="hidden" name="temp_struc_id[]" value="{{$temp->id}}">
            				<label class="label">{{$temp->label}} @if($temp->required == 1)<em>*</em>@endif</label>
				           	<label class="input">
				               <input type="text" name="value[]" id="name" @if($temp->required == 1) required @endif>
				             </label>
						  
           
            @endif 