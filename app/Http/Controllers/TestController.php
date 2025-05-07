<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Test;
use App\Models\TestResult;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function store(Request $request)
    {
		try {
            $validated = $request->validate([
                'topic_id' => 'required|exists:topics,id',
                'title' => 'required|string|max:255',
            ]);

            \Log::info('Test store attempt', $validated);
            Test::create($validated);
            return redirect()->route('admin.tests.edit', $request->topic_id)->with('success', 'Test created successfully.');
        } catch (\Exception $e) {
            \Log::error('Test store failed: ' . $e->getMessage(), ['data' => $request->all()]);
            return redirect()->route('admin.tests.edit', $request->topic_id)->with('error', 'Failed to create test: ' . $e->getMessage());
        }
	}
	
	public function submit(Request $request, Test $test)
    {
        // Validate the submitted answers
        $request->validate([
            'answers' => 'required|array',
            'answers.*' => 'required|integer|in:0,1,2,3',
        ]);

        // Get the authenticated user
        $user = Auth::user();
        if (!$user) {
            return redirect()->back()->with('error', 'You must be logged in to submit a test.')->withQuery(['tab' => 'tests']);
        }

        // Process each answer
        try {
            DB::beginTransaction();

            foreach ($request->answers as $testQuestionId => $answer) {
                // Find the test question
                $testQuestion = $test->test_questions()->findOrFail($testQuestionId);

                // Check if the answer is correct
                $isCorrect = $answer == $testQuestion->correct_answer;

                // Store or update the user's test result
                TestResult::updateOrCreate(
                    [
                        'user_id' => $user->id,
                        'test_question_id' => $testQuestionId,
                    ],
                    [
                        'answer' => $answer,
                        'is_correct' => $isCorrect,
                    ]
                );

                \Log::debug('Test submission', [
                    'user_id' => $user->id,
                    'test_id' => $test->id,
                    'test_question_id' => $testQuestionId,
                    'answer' => $answer,
                    'is_correct' => $isCorrect,
                ]);
            }

            DB::commit();

            // Calculate completion status (optional feedback)
            $totalQuestions = $test->test_questions->count();
            $correctCount = TestResult::where('user_id', $user->id)
                ->whereIn('test_question_id', $test->test_questions->pluck('id'))
                ->where('is_correct', true)
                ->count();
            $successMessage = "Test submitted successfully! $correctCount/$totalQuestions correct.";

            return redirect()->back()->with('success', $successMessage)->withQuery(['tab' => 'tests']);
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Test submission failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to submit test. Please try again.')->withQuery(['tab' => 'tests']);
        }
    }
	
	public function update(Request $request, Test $test)
    {
		try {
            $validated = $request->validate([
                'topic_id' => 'required|exists:topics,id',
                'title' => 'required|string|max:255',
            ]);

            \Log::info('Test update attempt', ['test_id' => $test->id, 'data' => $validated]);
            $test->update($validated);
            return redirect()->route('admin.tests.edit', $test->topic_id)->with('success', 'Test updated successfully.');
        } catch (\Exception $e) {
            \Log::error('Test update failed: ' . $e->getMessage(), ['test_id' => $test->id, 'data' => $request->all()]);
            return redirect()->route('admin.tests.edit', $test->topic_id)->with('error', 'Failed to update test: ' . $e->getMessage());
        }
	}
	
	public function edit(Test $test)
    {
        \Log::info('Edit method called for test ID: ' . $test->id);
        $topics = Topic::all();
        return view('admin.tests.edit', compact('test', 'topics'));
    }
	
	public function destroy(Test $test)
    {
        try {
            DB::beginTransaction();

            // Delete related test questions
            $test->test_questions()->delete();

            // Delete the test
            $test->delete();

            DB::commit();

            return redirect()->back()->with('success', 'Test deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Failed to delete test: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to delete test: ' . $e->getMessage());
        }
    }
	
	public function show(Test $test)
    {
		$test->load(['topic', 'tests', 'testResults']);
        return view('tests.show', compact('test'));
	}
	
	public function index()
    {
        \Log::info('Index method called');
        $tests = Test::with('topic')->orderBy('order')->get();
        return view('admin.tests.index', compact('tests'));
    }
	
	public function create()
    {
        \Log::info('Create method called');
        $topics = Topic::all();
        return view('admin.tests.create', compact('topics'));
    }
}
