<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ValueType extends Model
{
  public  function template_structures()
   {
       return $this->hasMany(TemplateStructure::class);
   }
}
