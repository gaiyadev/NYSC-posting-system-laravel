<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SenateList extends Model
{
    //


    //mutator
    public function setFnameAttribute($value) {
        $this->attributes['fname'] = ucfirst($value);
    }
    public function setMnameAttribute($value) {
        $this->attributes['mname'] = ucfirst($value);
    }
    public function setLnameAttribute($value) {
        $this->attributes['lname'] = strtoupper($value);
    }
    
    public function setSchoolAttribute($value) {
        $this->attributes['school'] = ucfirst($value);
    }
    public function setCourseAttribute($value) {
        $this->attributes['course'] = ucfirst($value);
    }

    //accessor
    public function getLnameAttribute($value) {
	return strtoupper($value);
     }

public function admin () {
        return $this->belongsTo('App\Admin');
    }
}
