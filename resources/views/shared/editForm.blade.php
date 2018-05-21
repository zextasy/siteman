


        @if($val->value_type_id == 3)
                            <input type="hidden" name="value_type_id[]" value="{{$val->value_type_id}}">
                            <input type="hidden" name="struc_name[]" value="{{$val->label}}">
                            <label class="label">{{$val->label}} <em>*</em></label>
                            <label class="textarea">
                               <textarea rows="5" name="value[]" id="form7">{{$values[$key]->value}}</textarea>
                             </label><br>

             @elseif($val->value_type_id == 4)
                             <input type="hidden" name="value_type_id[]" value="{{$val->value_type_id}}">
                            <input type="hidden" name="struc_name[]" value="{{$val->label}}">
                            <label class="label">{{$val->label}} <em>*</em></label>
                            <label class="input">
                            <select type="text"  id="option0" name="value[]" placeholder="Select">
                                
                                    <option>Select - {{$val->label}}</option>
                                @foreach($val->options as $type)
                                    <option value="{{$type}}" @if(!strcmp($type, $values[$key]->value)) selected="" @endif>{{$type}}</option>
                                @endforeach
                            </select>
                            </label><br>

             @elseif($val->value_type_id == 5)
                            <input type="hidden" name="value_type_id[]" value="{{$val->value_type_id}}">
                            <input type="hidden" name="struc_name[]" value="{{$val->label}}">
                            <label class="label">{{$val->label}} <em>*</em></label>
                            <select type="text"  id="option0" name="value[]" placeholder="Select" class="form-control">
                                
                                    <option>Select - {{$val->label}}</option>
                                @foreach($val->options as $type)
                                    <option value="{{$type}}" @if(!strcmp($type, $values[$key]->value)) selected="" @endif>{{$type}}</option>
                                @endforeach
                            </select>    
         
                            
                            <label class="label">Comment <em>*</em></label>
                            <label class="input">
                               <input type="text" id="name" name="comment" value="{{$values[$key]->comment}}" required>
                             </label>
                            
               @elseif($val->value_type_id == 6)
                                <input type="hidden" name="value_type_id[]" value="{{$val->value_type_id}}">
                                <input type="hidden" name="struc_name[]" value="{{$val->label}}">
                                <label class="label">{{$val->label}} <em>*</em></label>
                               <label class="input">
                               <input type="text" id="name" name="value[]" value="{{$values[$key]->value}}" required>
                                </label>
                                
                                
                                <input type="hidden" name="struc_name[]" value="{{$val->label}}">
                                <label class="label">option for {{$val->label}} <em>*</em></label>
                                <select type="text"  id="option0" name="option" placeholder="Select" class="form-control">
                                    
                                        <option>Select - {{$val->label}}</option>
                                    @foreach($val->options as $type)
                                        <option value="{{$type}}" @if(!strcmp($type, $values[$key]->option)) selected="" @endif>{{$type}}</option>
                                    @endforeach
                                </select>    
                
                 @elseif($val->value_type_id == 7)

            
                                 <input type="hidden" name="value_type_id[]" value="{{$val->value_type_id}}">
                                 <input type="hidden" name="struc_name[]" value="{{$val->label}}">
                                   <label class="label">Upload Picture for {{$val->label}} <em>*</em></label>
                                     <label class="file">
                                       <input type="file" name="name" id="value[]" value="{{$values[$key]->value}}" required>
                                     </label>
   
            @else
                         <input type="hidden" name="value_type_id[]" value="{{$val->value_type_id}}">
                         <input type="hidden" name="struc_name[]" value="{{$val->label}}">
                            <label class="label">{{$val->label}} <em>*</em></label>
                            <label class="input">
                               <input type="text" name="value[]" id="name" value="{{$values[$key]->value}}" required>
                             </label>
                          
           
            @endif 

