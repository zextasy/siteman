<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Template;
use App\ValueType;
use App\Option;
use App\Form;
use App\SubHeader;
use App\Structures;

use Illuminate\Support\Facades\Gate;

class FormAttributeController extends Controller
{
      // constructor
        public function __construct()
    {
        // add authentication
         $this->middleware('auth');
    }

	public function __constructor(){
	}

	  public function fetch($attr_id, $name, $view)
    {
    	$types = ValueType::all();
  
      $active_page = 'template';
      $struc = Structures::where('id', $attr_id)->first();

	  $index = json_decode($struc->struc);

		for($i=0; $i < count($index); $i++){
			$attr = $index[$i];
			if($attr->name == $name)
			{
				$attr_val = $index[$i];
				$index_no = $i;
			}
	
		}
      

      return view($view, compact('struc', 'active_page', 'attr_val', 'types', 'index_no', 'index'));
    } 

    public function edit($attr_id, $name)
    {

    	return $this->fetch($attr_id, $name, 'form_attr.edit');

    }

    public function update(Request $request, $attr_id)
    {
    	$num = $request->get('number');
    	 $struc = Structures::with('form')->where('id', $attr_id)->first();
    	# dd($struc);

	 	 $index = json_decode($struc->struc);
	 	 #dd([$index, $index[$num]]);
	 	 #dd($request->get('attr_name'));
	 	 #$index[$num]->name = $request->get('attr_name');
	 	 #dd($index[$num]);

	 	  $final_option = [];

           
               for($j=0; $j < count($request->get('options')); $j++)
               {
                  $option = $request->get('options')[$j];
                  array_push($final_option, $option);
               }

               $index[$num]->name = str_slug($request->get('attr_name'));
               $index[$num]->label = $request->get('attr_name');
               $index[$num]->value_type_id = $request->get('value_type_id');
               $index[$num]->required = $request->required;
               $index[$num]->options = $final_option;


               $data = Structures::find($attr_id);
               $data->struc = json_encode($index);
               $data->save();

	 	 // $index[$num]->update([
	 	 // 					"name"=>str_slug($request->get('attr_name')), 
	 	 // 					"label"=>$request->get('attr_name'), 
	 	 // 					"value_type_id"=>$request->get('value_type_id'), 
	 	 // 					"required"=>$request->required, 
	 	 // 					"options"=>$final_option
	 	 // 				]);
     flash('Successfully Updated')->success();
	 	 return redirect('form/'.$struc->form->slug);
    	
    }

  public function delete($attr_id, $name)
    {

    	return $this->fetch($attr_id, $name, 'form_attr.delete');

    }

    public function destroy(Request $request, $attr_id)
    {
    	$num = $request->get('number');
    	 $struc = Structures::with('form')->where('id', $attr_id)->first();
    	# dd($struc);

	 	 $index = json_decode($struc->struc);
	 	 unset($index[$num]);
	 	 $data = Structures::find($attr_id);
         $data->struc = json_encode($index);
         $data->save();

	 	 flash('Successfully Deleted')->success();
     return redirect('form/'.$struc->form->slug);
    }

    public function move($attr_id, $name)
    {

      return $this->fetch($attr_id, $name, 'form_attr.move');

    }

    public function update_index(Request $request, $attr_id)
    {
      //dd($request->direction);
      $num = $request->get('number');
      $new_index = $request->steps - 1;
      $struc = Structures::where('id', $attr_id)->first();
      $arr = json_decode($struc->struc);

      $final_arr = $this->moveElement($arr, $num, $new_index);
      $data = Structures::find($attr_id);
      $data->struc = json_encode($final_arr);
      $data->save();

      flash('Successfully Moved to position '.$request->steps)->success();
     return redirect('form/'.$struc->form->slug);



    }

    public function moveElement($arr, $a, $b)
    {
      $out = array_splice($arr, $a, 1);

      $result = array_splice($arr, $b, 0, $out);
      return $arr;
    }
}
