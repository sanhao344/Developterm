<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

    public function favorites()
    {
        return $this->belongsToMany(Work::class, 'favorites', 'user_id', 'work_id')->withTimestamps();
    }

    public function favorite($workId)
    {
        $exist = $this->is_favorite($workId);

        if($exist){
            return false;
        }else{
            $this->favorites()->attach($workId);
            return true;
        }
    }

    public function unfavorite($workId)
    {
        $exist = $this->is_favorite($workId);

        if($exist){
            $this->favorites()->detach($workId);
            return true;
        }else{
            return false;
        }
    }

    public function is_favorite($workId)
    {
        return $this->favorites()->where('work_id',$workId)->exists();
    }
}
