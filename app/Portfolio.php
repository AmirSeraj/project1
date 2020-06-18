<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class portfolio extends Model
{
    //
    protected $fillable = [
        'name','description','link','image','tag'
    ];
}
