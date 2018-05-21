<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Template;
use App\ValueType;
use App\Option;
use App\Form;
use App\SubHeader;
use App\Value;
use App\Structures;
use Excel;

use Illuminate\Support\Facades\Gate;

class ReportController extends Controller
{
	public function __construct()
	{
	   //ini_set('max_execution_time', 180);
      //ini_set('post_max_size', '10M');
	}
    public function index()
    {
        $active_page = 'reports';

        $form = Form::with(['structures', 'values', 'template'])->first();
        $strucs = Structures::where('form_id', $form->id)->first();
        $template_values = Value::with('user')->where(['form_id' => $form->id])->first();

        $struc = $form->structures->first();

        $struc_datas = array_slice(json_decode($struc->struc), 0, 4, true);

        return view('reports.index', compact('form', 'template_structures', 'template_values', 'active_page', 'struc_datas', 'template_values'));
    }

    public function export()
    {
//     	$name = 'TELEMETRY INFORMATION';
//     	$active_page = 'site_audit';
//     	$form = Form::with(['structures', 'values', 'template'])->where('name', $name)->first();
//     	//dd($form);
//         $strucs = Structures::where('form_id', $form->id)->get();
//     	$template_values = Value::with('user')->where(['form_id' => $form->id])->get();

//         $struc = $form->structures->first();

//         $struc_datas = array_slice(json_decode($struc->struc), 0, 4, true);

//     	Excel::create('New file', function($excel) use($form, $template_values, $active_page, $struc_datas){


//     	$excel->sheet('New sheet', function($sheet) use($form, $template_values, $active_page, $struc_datas){

//         //$sheet->loadView('forms.index', with([]));
//         $sheet->loadView('forms.index', with(['form' => $form, 'template_values' => $template_values, 'active_page' => $active_page, 'struc_datas' => $struc_datas]));

//     })->export('xls');

// });
    	//dd('hello export...');

    	Excel::create('New file', function($excel) {

    $excel->sheet('New sheet', function($sheet) {

        $sheet->loadView('reports.index');

    })->export('xls');

});
    }
}
