<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable=[
        'name','email','body','status'
    ];

    public function article(){
        return $this->belongsTo(Article::class);
    }

}
