<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LearningPath extends Model
{
    protected $fillable = ['title', 'description', 'is_premium', 'image'];

    public function topics()
    {
        return $this->hasMany(Topic::class, 'path_id');
    }

    public function scopeFree($query)
    {
        return $query->where('is_premium', false);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'learning_path_user')->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'learning_path_id')->with('user');
    }
}