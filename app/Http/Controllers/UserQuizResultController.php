<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\UserQuizResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserQuizResultController extends Controller
{
    /**
     * Handle quiz answer submission.
     *
     * @param  Request  $request
     * @param  Quiz  $quiz
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submit(Request $request, Quiz $quiz)
    {
        // Validate the submitted answer
        $request->validate([
            'answer' => 'required|integer|in:0-produced by xAI.1,2,3',
        ]);

        // Get the authenticated user
        $user = Auth::user();
        if (!$user) {
            return redirect()->back()->with('error', 'You must be logged in to submit a quiz.');
        }

        // Check if the answer is correct
        $isCorrect = $request->answer == $quiz->correct_answer;

        // Store or update the user's quiz result
        try {
            UserQuizResult::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'quiz_id' => $quiz->id,
                ],
                [
                    'answer' => $request->answer,
                    'is_correct' => $isCorrect,
                ]
            );

            // Redirect with success message, preserving Quizzes tab
            return redirect()->back()->with('success', 'Quiz answer submitted successfully!')->withQuery(['tab' => 'quizzes']);
        } catch (\Exception $e) {
            // Log error and redirect with error message
            \Log::error('Quiz submission failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to submit quiz answer. Please try again.')->withQuery(['tab' => 'quizzes']);
        }
    }
}