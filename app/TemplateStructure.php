<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemplateStructure extends Model
{
    public function template(){
       return $this->belongsTo(Template::class);
    }

    public function value_types()
    {
       return $this->belongsTo(ValueType::class);
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }

     public function template_values()
    {
        return $this->hasMany(TemplateValue::class);
    }

    // public function form()
    // {
    //     return $this->belongsTo(Form::class);
    // }
}
