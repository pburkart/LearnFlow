<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserQuizResult extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'quiz_id', 'answer', 'is_correct'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'is_correct' => 'boolean',
    ];

    /**
     * Get the user that submitted the quiz result.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the quiz associated with the result.
     */
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}