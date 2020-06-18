<?php

namespace App\frontmodels;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable=['title','description','status','user_id','image'];

    protected $attributes=[
        'hit' => 1,
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
