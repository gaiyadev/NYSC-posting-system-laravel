<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class PcmRegistration extends Model
{
    //table name
    protected $table = 'pcm_registrations';
    //id
    public $primaryKey = 'id';
    //timestamp
    public $timestamps = true;

    
//mutator
     public function setFnameAttribute($value) {
        $this->attributes['fname'] = ucfirst($value);
    }
    public function setMnameAttribute($value) {
        $this->attributes['mname'] = ucfirst($value);
    }
    public function setLnameAttribute($value) {
        $this->attributes['lname'] = ucfirst($value);
    }
    public function setAddressAttribute($value) {
        $this->attributes['address'] = ucfirst($value);
    }
    public function setSchoolAttribute($value) {
        $this->attributes['school'] = ucfirst($value);
    }
    public function setCourseAttribute($value) {
        $this->attributes['course'] = ucfirst($value);
    }

    //accessor
    public function getLnameAttribute($value) {
	return    strtoupper($value);
     }

     //relationship method naming must be single

     public function user () {
    	return $this->belongsTo('App\User');
    }
}
