<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Article extends Model
{
    use Sluggable;
    //
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable=['title','description','status','user_id','image','slug'];

    protected $attributes=[
        'hit' => 1,
    ];

    public function sluggable()
    {
        return [
            'slug'=>[
                'source'=>''
            ]
        ];
    }

//    public function comments()
//    {
//        return $this->hasMany(Comment::class);
//    }

}
