<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    public $timestamps = false;

    public function alumno(){
    	return $this->belongsTo('App\Alumno');
    }

    public function curso(){
    	return $this->belongsTo('App\Curso');
    }
}
