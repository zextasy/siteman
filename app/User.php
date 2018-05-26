<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use GeniusTS\Roles\Traits\HasRoleAndPermission;
// use GeniusTS\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;
use Spatie\Permission\Traits\HasRoles;
use Hash;
use App\Notifications\MailNotification;

class User extends Authenticatable
//class User extends Model implements AuthenticatableContract, CanResetPasswordContract, HasRoleAndPermissionContract
{
    use Notifiable;
  //  use Authenticatable, CanResetPassword, HasRoleAndPermission;
   use HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','title',
            'gender'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function values()
    {
        return $this->hasMany(Value::class);
    }

    public function message(){
      return $this->hasMany(Message::class);
    }

    /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        if ($input)
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }


    public function role()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }
    public function assignedTasks()
    {
      // return $this->hasMany(Task::class, 'id', 'assigned_to');
      return Task::where('assigned_to', $this->id)->get();//
    }

    public function mailmessages()
    {
        return $this->belongsToMany(MailMessage::class);
    }


}
