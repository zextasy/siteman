<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemplateValue extends Model
{
    public function template()
    {
    	return $this->belongsTo(Template::class);
    }

     public function form()
    {
    	return $this->belongsTo(Form::class);
    }

    public function template_structure()
    {
    	return $this->belongsTo(TemplateStructure::class);
    }
}
