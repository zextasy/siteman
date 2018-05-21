<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Template;
use App\TemplateStructure;
use App\ValueType;
use App\Option;
use App\Form;
use App\SubHeader;
use App\Value;
use App\Task;
use App\User;
use App\Structures;

use Illuminate\Support\Facades\Gate;

class SiteAuditController extends Controller
{
        // constructor
        public function __construct()
    {
        // add authentication
         $this->middleware('auth');
    }
    public function index($name)
    {

    	$active_page = 'site_audit';
    	$temp = Template::with(['forms'])->where('name', $name)->first();
    	return view('siteAudit.index', compact('temp', 'active_page'));
    }

    public function form_index($name)
    {

    	$active_page = 'site_audit';
    	$form = Form::with(['structures', 'values', 'template'])->where('name', $name)->first();
        $strucs = Structures::where('form_id', $form->id)->get();
    	$template_values = Value::with('user')->where(['form_id' => $form->id])->get();

        $struc = $form->structures->first();

        $struc_datas = array_slice(json_decode($struc->struc), 0, 4, true);

    	return view('forms.index', compact('form', 'template_structures', 'template_values', 'active_page', 'struc_datas', 'template_values'));
    }

     public function create2($temp_id, $form_name)
    {
    	//dd('hello');
		$active_page = 'site_audit';
    $tempt = Form::with('structures', 'sub_headers')->where('name', $form_name)->first();
    $template = TemplateStructure::with(['options', 'template'])->where('form_id', $tempt->id)->get();
    $options = Option::all();
    //dd($tempt->template->id);
    return view('forms.create', compact('template', 'options', 'tempt', 'temp_id', 'active_page'));
    }

    public function create($temp_id, $form_name){

        $active_page = 'site_audit';
        $strucs = "";
        // $tasks = Task::where('assigned_to', \Auth::user()->id)->get();// 
        $tasks = \Auth::user()->assignedTasks();
        $form = Form::where('name', $form_name)->first();
        $count_struc = Structures::with('sub_header')->where('form_id', $form->id)->count();
        if($count_struc <= 1)
        {
            $struc = Structures::where('form_id', $form->id)->first();
            $strucs =json_decode($struc->struc);

        }
        else{
            $struc_subs = Structures::with('sub_header')->where('form_id', $form->id)->get();
            //dd($struc);
        }

       // dd($strucs);


         return view('forms.create', compact('strucs', 'temp_id', 'active_page', 'form', 'struc_subs','tasks'));
    }


    public function store2(Request $request)
    {

    	for($i = 0; $i < count($request->get('temp')); $i++){
    		//dd($request->get('temp_struc_id'));

    	$temp_value = new TemplateValue();
    	$temp_value->value = $request->get('value')[$i];
    	//dd($request->get('template_id'));
    	$temp_value->template_id = $request->get('template_id');
    	$temp_value->template_structure_id = $request->get('temp_struc_id')[$i];
        $temp_value->user_id = \Auth::user()->id;
        $temp_value->form_id = $request->get('form_id');
    	$temp_value->save();
			}

	   $form = Form::where('id', $request->get('form_id'))->first();


   		return redirect('form/audit/'.$form->name);
    }

    public function store(Request $request)
    {
        // dd($request);
        $value_data = [];
        $imgcounter = 0;



        for($i = 0; $i < count($request->get('value_type_id')); $i++)
        {
            if($request->get('value_type_id')[$i] == 5)
            {
                $data = ["value" => $request->get('value')[$i], "comment" => $request->get('comment'), "value_type_id" => $request->get('value_type_id')[$i]];
                array_push($value_data, $data);

            }

            else if($request->get('value_type_id')[$i] == 6)
            {
                $data = ["value" => $request->get('value')[$i], "option" => $request->get('option'), "value_type_id" => $request->get('value_type_id')[$i]];
                array_push($value_data, $data);

            }

            else if($request->get('value_type_id')[$i] == 7)
            {
                
                if(isset($request->file('value')[$imgcounter])) {
                $image = $request->file('value')[$imgcounter];
                // dd($request->file('value'));
                $imageName = 'SiteMan' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path() . '/SiteAudit/images/', $imageName);
                $picture = 'SiteAudit/images/' . $imageName;
                $data = ["value" => $picture, "value_type_id" => 7];
                array_push($value_data, $data);
                $imgcounter++;
             // dd($picture);
                // $img = Image::make('foo.jpg')->resize(300, 200);
            }
            }


            else{
            $data = ["value" => $request->get('value')[$i], "value_type_id" => $request->get('value_type_id')[$i]];
            array_push($value_data, $data);}
        }



        $value = new Value();
        //dd($request->sub_header);
        $value->template_id = $request->get('template_id');
        $value->form_id = $request->get('form_id');
        $value->user_id = \Auth::user()->id;
        $value->sub_header_id = $request->sub_header;
        $value->form_values = json_encode($value_data);
        $value->site_id = $request->get('site_id');
        //dd($value);
        $value->save();

        $form = Form::with('template')->where('id', $value->form_id)->first();




 if($request->sub_header){
    $sub_header = SubHeader::where('id', $request->sub_header)->first();
     flash($sub_header->name.' Form Successfully Submited!!!')->success();
        return redirect('create/'.$form->template->id.'/'.$form->name);
    }

else{
     flash('Successfully Submited!!!')->success();
    return redirect('form/audit/'.$form->name);
}

    }

    function edit($name, $id)
    {

        //get the value you want to edit
        $value = Value::with(['form'])->where('id', $id)->first();
        if($value->sub_header_id)
        {
            $value_subs = Value::with('form')->where(['form_id' => $value->form_id, 'site_id' => $value->site_id, 'template_id' => $value->template_id])->get();

            $arr_strucs = [];
            $sub_values = [];

            for($i=0; $i < $value_subs->count(); $i++) {

                $val = $value_subs[$i];
               // dd([$val->form_id, $val->sub_header_id]);

                $struc = Structures::where(['sub_header_id' => $val->sub_header_id, 'form_id' => $val->form_id])->first();
                array_push($arr_strucs, $struc);
                array_push($sub_values, $val);
            }
            //dd([$arr_strucs, $sub_values]);
        }

        else{
        $values = json_decode($value->form_values);

        $struc = Structures::where('form_id', $value->form->id)->first();
        $strucs =json_decode($struc->struc);
        }
       // dd([$strucs, $values]);

        return view('siteAudit.edit', compact('value', 'values', 'strucs', 'arr_strucs', 'sub_values'));
    }

    function update(Request $request, $id)
    {
        $value_data = [];
        for($i = 0; $i < count($request->get('value_type_id')); $i++)
        {
            if($request->get('value_type_id')[$i] == 5)
            {
                $data = ["value" => $request->get('value')[$i], "comment" => $request->get('comment'), "value_type_id" => $request->get('value_type_id')[$i]];

                array_push($value_data, $data);

            }

            else if($request->get('value_type_id')[$i] == 6)
            {
                $data = ["value" => $request->get('value')[$i], "option" => $request->get('option'), "value_type_id" => $request->get('value_type_id')[$i]];
                array_push($value_data, $data);

            }

            else{
            $data = ["value" => $request->get('value')[$i], "value_type_id" => $request->get('value_type_id')[$i]];
            array_push($value_data, $data);}
        }

        if($request->value_id){
            $id = $request->value_id;
            $value = Value::where('id', $id)->first();
        }

        else{
           $value = Value::where('id', $id)->first();
        }

        //$value->updated_by = \Auth::user()->id;
        $value->form_values = json_encode($value_data);
        $value->site_id = $request->site_id;
        $value->save();

        $form = Form::where('id', $value->form_id)->first();
        flash('Successfully Updated')->success();

        return redirect('form/audit/'.$form->name);
    }

    public function fetch($name, $id, $view)
    {
        //get the value you want to edit
        $value = Value::with(['form'])->where('id', $id)->first();
        if($value->sub_header_id){
            $value_subs = Value::with('form')->where(['form_id' => $value->form_id, 'site_id' => $value->site_id, 'user_id' => $value->user_id])->get();


            $arr_strucs = [];
            $sub_values = [];

            for($i=0; $i < $value_subs->count(); $i++) {

                $val = $value_subs[$i];
               // dd([$val->form_id, $val->sub_header_id]);

                $struc = Structures::where(['sub_header_id' => $val->sub_header_id, 'form_id' => $val->form_id])->first();
                array_push($arr_strucs, $struc);
                array_push($sub_values, $val);
            }
           // dd($arr_strucs);

        }

        else{

        $values = json_decode($value->form_values);

        $struc = Structures::where('form_id', $value->form->id)->first();
        $strucs =json_decode($struc->struc);
        }
       // dd([$strucs, $values]);

        return view($view, compact('value', 'values', 'strucs', 'value_subs', 'arr_strucs', 'sub_values'));
    }

    public function show($name, $id)
    {
        $view = 'siteAudit.show';
        return $this->fetch($name, $id, $view);
    }

     public function delete($name, $id)
    {
        $view = 'siteAudit.delete';
        return $this->fetch($name, $id, $view);

    }

    public function destroy($id)
    {
        $value = Value::findOrFail($id);

        if($value->sub_header_id){
            $value_subs = Value::with('form')->where(['form_id' => $value->form_id, 'site_id' => $value->site_id, 'user_id' => $value->user_id])->get();


            for($i=0; $i < $value_subs->count(); $i++) {

                $val = $value_subs[$i];
                $val->delete();

            }


        }

        else{

         $value->delete();
        }



        $form = Form::where('id', $value->form_id)->first();
        flash('Successfully Deleted')->success();
        return redirect('form/audit/'.$form->name);

    }


}
