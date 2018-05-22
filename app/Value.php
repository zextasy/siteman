<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
   public function template()
    {
    	return $this->belongsTo(Template::class);
    }

     public function form()
    {
    	return $this->belongsTo(Form::class);
    }

    public function structure()
    {
    	return $this->belongsTo(Structures::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function task()
    {
        return $this->belongsTo(Task::class, 'site_id');
    }

    public function showStatus()
    {
          if($this->status == 1){
            echo '<span class="label label-success">Approved</span>';
          }
          elseif($this->status == 2){
            echo'<span class="label label-danger">Rejected</span>';
          }
          elseif($this->status == 3){
            echo'<span class="label label-success">Completed</span>';
          }          
          else{
            echo '<span class="label label-warning">Pending</span>';  
          }
    }
}
