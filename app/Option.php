<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    public function template_structure()
    {
        return $this->belongsTo(TemplateStructure::class);
    }
}
