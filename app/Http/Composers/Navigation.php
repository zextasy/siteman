<?php namespace App\Http\Composers;
use Illuminate\View\View;
use App\Template;
use App\TemplateStructure;
use App\ValueType;
use App\Option;
use App\Form;
use App\SubHeader;

/**
 * User: BRYTA
 * Date: 30/06/2016
 * Time: 12:09
 */
class Navigation
{
  public function compose(View $view){
    //dd('hello..');

    $site_audits = Template::where('project_id', 2)->get();
    $tower_mappings = Template::where('project_id', 3)->get();
    $view->with(['site_audits'=>$site_audits, 'tower_mappings'=>$tower_mappings]);

    }
   
  // public function site_audit(View $view){
  //   $site_audits = Template::where('project_id', 2)->get();
    
  //   $view->with(['site_audits'=>$site_audits]);
  // }
  
   
}