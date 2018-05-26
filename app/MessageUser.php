<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MessageUser extends Model
{
    //
  public function message()
    {
        return $this->belongsToMany(MailMessage::class);
    }
}
