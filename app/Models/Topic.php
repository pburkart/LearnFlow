<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description', 'path_id', 'image', 'resources', 'order'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'resources' => 'array',
    ];

    /**
     * Get the quizzes for the topic.
     */
    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

    /**
     * Get the tests for the topic.
     */
    public function tests()
    {
        return $this->hasMany(Test::class, 'topic_id');
    }

    /**
     * Get the user quiz results for the topic's quizzes.
     */
    public function userQuizResults()
    {
        return $this->hasManyThrough(
            UserQuizResult::class,
            Quiz::class,
            'topic_id', // Foreign key on Quiz
            'quiz_id',  // Foreign key on UserQuizResult
            'id',       // Local key on Topic
            'id'        // Local key on Quiz
        );
    }

    /**
     * Get the user's progress for the topic.
     */
    public function userProgress()
    {
        return $this->hasOne(UserProgress::class, 'topic_id')->where('user_id', auth()->id());
    }

    /**
     * Get the learning path that owns the topic.
     */
    public function learningPath()
    {
        return $this->belongsTo(LearningPath::class, 'path_id');
    }
}