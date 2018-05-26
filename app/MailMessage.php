<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MailMessage extends Model
{
    //
  use SoftDeletes;
  protected $softDelete = true;

    public function messageuser()
    {
        return $this->belongsToMany(MessageUser::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

}
