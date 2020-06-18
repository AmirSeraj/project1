<?php

namespace App\frontmodels;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function articles()
    {
        $this->belongsToMany(Article::class);
    }
}
