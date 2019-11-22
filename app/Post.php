<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = ['title', 'body', 'user_id', 'slug'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function setSlugAttribute()
    {
        return Str::slug($this->title);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
