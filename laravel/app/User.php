<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function followers()
      {
          return $this->belongsToMany('App\User', 'follows', 'followee_id', 'follower_id')->withTimestamps();
      }


 public function isFollowedBy(User $user) :bool {
     return $user  ? (bool)$this->followers->where('id',$user->id)->count()  :  false;
 }



public function followings()
{
    return $this->belongsToMany('App\User', 'follows', 'follower_id', 'followee_id')->withTimestamps();
}


public function getCountFollowersAttribute() {
    return $this->followers->count();
}

public function getCountFollowingsAttribute() {
    return $this->followings->count();
}

public function articles() {
    return $this->hasMany('App\Article');
}

public function likes() {
    return $this->belongsToMany('App\Article','likes')->withTimestamps();
}

}
