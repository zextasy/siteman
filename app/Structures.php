<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Structures extends Model
{
    public function template(){
       return $this->belongsTo(Template::class);
    }

    public function value_types()
    {
       return $this->belongsTo(ValueType::class);
    }


     public function values()
    {
        return $this->hasMany(Value::class);
    }

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function sub_header()
    {
        return $this->belongsTo(SubHeader::class);
    }
}
