<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubHeader extends Model
{
    public function form()
    {
    	return $this->belongsTo(Form::class);
    }

    public function structure()
    {
      return $this->hasOne(Structures::class);
    }
}
