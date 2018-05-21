<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    public function structures()
    {
      return $this->hasMany(Structures::class);
    }

    public function Values()
    {
      return $this->hasMany(Value::class);
    }

    public function forms()
    {
    	return $this->hasMany(Form::class);
    }
}
