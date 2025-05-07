<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

use App\Models\UserQuizResult;

class QuizController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'topic_id' => 'required|exists:topics,id',
                'question' => 'required|string|max:255',
                'options' => 'required|array|size:4',
                'options.*' => 'required|string|max:255',
                'correct_answer' => 'required|integer|min:0|max:3',
            ]);

            Log::info('Quiz store attempt', $validated);
            Quiz::create($validated);
            return redirect()->route('admin.topics.edit', $request->topic_id)->with('success', 'Quiz created successfully.');
        } catch (\Exception $e) {
            Log::error('Quiz store failed: ' . $e->getMessage(), ['data' => $request->all()]);
            return redirect()->route('admin.topics.edit', $request->topic_id)->with('error', 'Failed to create quiz: ' . $e->getMessage());
        }
    }

    public function update(Request $request, Quiz $quiz)
    {
        try {
            $validated = $request->validate([
                'topic_id' => 'required|exists:topics,id',
                'question' => 'required|string|max:255',
                'options' => 'required|array|size:4',
                'options.*' => 'required|string|max:255',
                'correct_answer' => 'required|integer|min:0|max:3',
            ]);

            Log::info('Quiz update attempt', ['quiz_id' => $quiz->id, 'data' => $validated]);
            $quiz->update($validated);
            return redirect()->route('admin.topics.edit', $quiz->topic_id)->with('success', 'Quiz updated successfully.');
        } catch (\Exception $e) {
            Log::error('Quiz update failed: ' . $e->getMessage(), ['quiz_id' => $quiz->id, 'data' => $request->all()]);
            return redirect()->route('admin.topics.edit', $quiz->topic_id)->with('error', 'Failed to update quiz: ' . $e->getMessage());
        }
    }

    public function destroy(Quiz $quiz)
    {
        try {
            $topic_id = $quiz->topic_id;
            $quiz->delete();
            return redirect()->route('admin.topics.edit', $topic_id)->with('success', 'Quiz deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Quiz delete failed: ' . $e->getMessage(), ['quiz_id' => $quiz->id]);
            return redirect()->route('admin.topics.edit', $quiz->topic_id)->with('error', 'Failed to delete quiz: ' . $e->getMessage());
        }
    }
	
	public function show(Topic $topic)
    {
        $topic->load(['learningPath', 'quizzes', 'userQuizResults']);
        return view('topics.show', compact('topic'));
    }
	
	public function submit(Request $request, Quiz $quiz)
    {
        $request->validate([
            'answer' => 'required|integer|in:0,1,2,3',
        ]);

        $user = Auth::user();
        $isCorrect = $request->answer == $quiz->correct_answer;

        UserQuizResult::updateOrCreate(
            ['user_id' => $user->id, 'quiz_id' => $quiz->id],
            ['answer' => $request->answer, 'is_correct' => $isCorrect]
        );

        return redirect()->back()->with('success', 'Quiz answer submitted!');
    }
}