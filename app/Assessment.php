<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    //
    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'condition'=>'required',
        'model_year' => 'required',
        'brand'=>'required'
    );
    
}
