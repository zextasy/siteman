<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Template;
use App\TemplateStructure;
use App\ValueType;
use App\Option;
use App\Form;
use App\SubHeader;
use App\Structures;

use Illuminate\Support\Facades\Gate;

class TemplateController extends Controller
{
      // constructor
        public function __construct()
    {
        // add authentication
         $this->middleware('auth');
    }
    public function home()
    {

        return view('welcome');
    }

    public function index()
    {
      //dd('hello');
      $active_page = 'template';
      $templates = Template::with('structures')->get();

      return view('template.index', compact('templates', 'active_page'));
    }

    public function form_index($name)
    {
      $temp = Template::with('forms')->where('name', $name)->first();
      $forms = Form::where('template_id', $temp->id)->get();
    //dd($temp->forms);
      return view('template.form', compact('forms', 'temp'));
    }

    public function create($temp = null, $form = null, $sub_form = null)
    {
      //dd($form);
       $active_page = 'template';
       $types = ValueType::all();
       return view('template.create', compact('types', 'temp', 'sub_form', 'form', 'active_page'));
    }
    public function store(Request $request, $temp = null, $form = null, $sub_form = null)
    {

      //for active page
      $active_page = 'template';
      //keep track the form if their is already existing one
      $form = $request->form_name;
      $form_id = $request->form_id;
      //keep track of the struc if their is already existing one
      $struc = $request->struc;
      //keep track of the template if is already existing..
      $temp = $request->temp_id;
      //keep track of the subheader if is existing
      $sub_form = $request->sub_header;

      $types = ValueType::all();
     if($temp == null && $struc == null && $form == null){

        $template = new Template();
        $template->name = $request->get('temp_name');
        $template->project_id = 2;
        $template->save();
        $temp = $template->id;
        flash('Template created successfully')->success();
      }

      else if($form != null)
      {
        //dd($request->form_name);

        $form = new Form();
        $form->name = $request->form_name;
        $form->slug = str_slug($request->form_name);
        $form->template_id = $temp;
        $form->save();

        $form = $form->id;
       flash('Form created successfully')->success();
      }

      else
      {
        if($request->sub_header != null)
        {
          $sub_header = new SubHeader();
          $sub_header->name = $request->sub_header;
          $sub_header->slug = str_slug($request->sub_header);
          $sub_header->form_id = $form_id;
          $sub_header->save();
        }

        $strucs = [];

        $forme = Form::where('id', $form_id)->first();
        $form = $forme->id;


        for($i=0; $i < count($request->get('name')); $i++){


          $final_option[$i] = [];

           // if($request->get('value_type_id')[$i] == 4)
           // {
               for($j=0; $j < count($request->get('options'.''.$i)); $j++)
               {
                  $option = $request->get('options'.''.$i)[$j];
                  array_push($final_option[$i], $option);
               }
          //}

            $data = ["name"=>str_slug($request->get('name')[$i]), "label"=>$request->get('name')[$i], "value_type_id"=>$request->get('value_type_id')[$i], "required"=>$request->required[$i], "options"=>$final_option[$i]];
            array_push($strucs, $data);
         }
            $struc = new Structures();
            $struc->template_id = $forme->template_id;
            $struc->form_id = $forme->id;
            if($request->sub_header != null){
            $struc->sub_header_id = $sub_header->id;
          }
            $struc->struc = json_encode($strucs);
            $struc->save();
            $sub_form = $struc->form_id;
            $temp = $struc->template_id;
            flash('Attribute of the form created successfully')->success();
           // dd($struc);
      }

        return view('template.create', compact('temp', 'types', 'form', 'sub_form', 'active_page'));
    }

    public function edit($name)
    {
      $active_page = 'template';
      $temp = Template::where('name', $name)->first();
      return view('template.edit', compact('temp', 'active_page'));
    }

    public function update(Request $request, $name)
    {
      $temp = Template::where('name', $name)->first();
      $temp->name = $request->get('temp_name');
      $temp->save();
       flash('Template Updated successfully')->success();
      return redirect('template');
    }

    public function delete($name)
    {
      $active_page = 'template';
      $temp = Template::where('name', $name)->first();
      return view('template.delete', compact('temp', 'active_page'));
    }

    public function destroy($name)
    {
      $temp = Template::where('name', $name)->first();
      $temp->delete();
      flash('Template deleted successfully')->success();
      return redirect('template');
    }

    public function show($name)
    {
      $active_page = 'template';
      $temp = Template::where('name', $name)->first();
      $forms = Form::where('template_id', $temp->id)->get();
     // dd($forms);
      return view('template.show', compact('temp', 'forms', 'active_page'));
    }
}
