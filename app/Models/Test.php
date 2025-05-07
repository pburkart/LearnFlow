<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $table = 'tests';

    protected $fillable = [
        'topic_id',
        'title',
    ];

    /**
     * Get the topic that owns the test.
     */
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    /**
     * Get the questions for the test.
     */
    public function test_questions()
    {
        return $this->hasMany(TestQuestion::class, 'test_id');
    }
}