<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TestQuestion extends Model
{
    use HasFactory;
	
	protected $fillable = [
		'test_id',
		'question',
		'options',
		'correct_answer',
	];
	
	protected $casts = [
		'options' => 'array',
	];
	
	public function test()
	{
		return $this->belongsTo(Test::class);
	}
}
