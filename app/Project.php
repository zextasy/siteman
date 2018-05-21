<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['name', 'description', 'start_date', 'end_date','created_by'];

    function tasks(){
    	return $this->hasMany(Task::class)->withTrashed();
    }

   public function creator()
    {
      return $this->belongsTo('App\User', 'created_by');
    }
}
