<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Profile;

class Event extends Model
{
    protected $fillable=['name', 'description','lenguages','creator_id',];
    
    public function profiles(){
        return $this->belongsToMany('App\Profile'); 
    }
 //Aportes de David para mayor encapsulamiento:   
    public function profile()
    {
        return $this->belongsTo(Profile::class);      
    }

    public function owner()
    {
        $this->profile;
    }
}
