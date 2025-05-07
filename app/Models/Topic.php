<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = [
        'path_id',
        'title',
        'description',
        'resources',
        'order',
		'image',
    ];

    protected $casts = [
        'resources' => 'array', // Treat resources as JSON array
    ];

    public function learningPath()
    {
        return $this->belongsTo(LearningPath::class, 'path_id');
    }

    public function userProgress()
    {
        return $this->hasOne(UserProgress::class, 'topic_id')->where('user_id', auth()->id());
    }
}