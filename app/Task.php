<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Task extends Model
{
    //
     use SoftDeletes;
    protected $fillable = ['task_name', 'task_description', 'start_date', 'end_date','project_id'];

    public function project()
    {
    	return $this->belongsTo(Project::class);
    }

    public function assignedBy()
    {
      return $this->belongsTo('App\User', 'assigned_by');
    }

    public function assignedTo()
    {
      return $this->belongsTo('App\User', 'assigned_to');
    }

    public function reAssignTo()
    {
      return $this->belongsTo('App\User', 'assigned_to');
    }

        public function showApproval()
    {
          if($this->approval == 1){
            echo '<span class="label label-success">Approved</span>';
          }
          elseif($this->approval == 2){
            echo'<span class="label label-danger">Rejected</span>';
          }
          
          else{
            echo '<span class="label label-warning">Pending</span>';  
          }
          
    }
    public function reports()
    {
      return $this->hasMany(Value::class,'site_id', 'id');
    }
}
