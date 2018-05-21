<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Template;
//use App\TemplateStructure;
use App\ValueType;
use App\Option;
use App\Form;
use App\SubHeader;

use Illuminate\Support\Facades\Gate;

class FormController extends Controller
{
      // constructor
        public function __construct()
    {
        // add authentication
         $this->middleware('auth');
    }
    public function edit($name)
    {
      $active_page = 'template';
      $form = Form::where('slug', $name)->first();
      return view('form.edit', compact('form', 'active_page'));
    }

    public function update(Request $request, $name)
    {
      $form = Form::with('template')->where('slug', $name)->first();
      $form->name = $request->get('form_name');
      $form->save(); 

      flash('Form Updated successfully')->success(); 

      return redirect('template/'.$form->template->name);
    }

    public function delete($name)
    {
      $active_page = 'template';
      $form = Form::where('slug', $name)->first();
      return view('form.delete', compact('form', 'active_page'));
    }

    public function destroy($name)
    {
      $form = Form::with('template')->where('slug', $name)->first();
      $form->delete();

      flash('Form Deleted successfully')->success(); 
      return redirect('template/'.$form->template->name);
    }

    public function show($name)
    {
      $valueTypes = ValueType::all();
      $active_page = 'template';
      $form = form::with(['sub_headers', 'structures'])->where('slug', $name)->first();
     
      return view('form.show', compact('temp', 'form', 'active_page', 'valueTypes'));
    }
}
