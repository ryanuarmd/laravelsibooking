<?php

namespace App;

use App\Company;
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
        'name', 'username', 'password', 'company_id','image',
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
        'username_verified_at' => 'datetime',
    ];
  
    
    public function Booking(){
        return $this->hasMany(Booking::class)->orderBy('created_at','DESC');;
    }

    
    public function userImage(){ 
        //jika image ada maka gunakan, jika tidak maka pake yg default
        $imagePath = ($this->image) ? $this->image : 'user/noImage.png';
        return '/storage/' . $imagePath;
 
    }
}
