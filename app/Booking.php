<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{ 
    protected $guarded=[];
    
    public function getStatusAttribute($attribute){
        return $this->statusOptions()[$attribute];
    }
    
    public function statusOptions(){
        return [
            0=>'TBD',
            1=>'Rejected',
            2=>'accept',
            3=>'In-Progress',
            4=>'Done',
        ]; 
    }
   

    public function User(){
        return $this->belongsTo(User::class);
    }
}
