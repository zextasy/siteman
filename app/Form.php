<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    public function template()
    {
    	return $this->belongsTo(Template::class);
    }

    public function sub_headers()
    {
    	return $this->hasMany(SubHeader::class);
    }

    public function structures()
    {
    	return $this->hasMany(Structures::class);
    }

    public function values()
    {
        return $this->hasMany(Value::class);
    }

}
