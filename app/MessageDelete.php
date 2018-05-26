<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MessageDelete extends Model
{
    //
  use SoftDeletes;
  protected $softDelete = true;

    public function message()
    {
        return $this->belongsToMany(MailMessage::class);
    }
}
