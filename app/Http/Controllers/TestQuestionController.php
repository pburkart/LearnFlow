<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Topic;
use App\Models\TestQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

use App\Models\TestResult;

class TestQuestionController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'test_id' => 'required|exists:tests,id',
                'question' => 'required|string|max:255',
                'options' => 'required|array|size:4',
                'options.*' => 'required|string|max:255',
                'correct_answer' => 'required|integer|min:0|max:3',
            ]);

            Log::info('Test Question store attempt', $validated);
            TestQuestion::create($validated);
            return redirect()->route('admin.tests.edit', $request->test_id)->with('success', 'Test Question created successfully.');
        } catch (\Exception $e) {
            Log::error('Test question store failed: ' . $e->getMessage(), ['data' => $request->all()]);
            return redirect()->route('admin.tests.edit', $request->test_id)->with('error', 'Failed to create test question: ' . $e->getMessage());
        }
    }

    public function update(Request $request, TestQuestion $testQuestion)
    {
        try {
            $validated = $request->validate([
                'test_id' => 'required|exists:tests,id',
                'question' => 'required|string|max:255',
                'options' => 'required|array|size:4',
                'options.*' => 'required|string|max:255',
                'correct_answer' => 'required|integer|min:0|max:3',
            ]);

            Log::info('Test Question update attempt', ['test_question_id' => $testQuestion->id, 'data' => $validated]);
            $testQuestion->update($validated);
            return redirect()->route('admin.tests.edit', $testQuestion->test_id)->with('success', 'Test question updated successfully.');
        } catch (\Exception $e) {
            Log::error('Test Question update failed: ' . $e->getMessage(), ['test_question_id' => $testQuestion->id, 'data' => $request->all()]);
            return redirect()->route('admin.tests.edit', $testQuestion->test_id)->with('error', 'Failed to update test question: ' . $e->getMessage());
        }
    }

    public function destroy(TestQuestion $testQuestion)
    {
        try {
            $test_id = $test_question->test_id;
            $testQuestion->delete();
            return redirect()->route('admin.tests.edit', $test_id)->with('success', 'Test question deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Test question delete failed: ' . $e->getMessage(), ['test_question_id' => $testQuestion->id]);
            return redirect()->route('admin.tests.edit', $testQuestion->test_id)->with('error', 'Failed to delete test question: ' . $e->getMessage());
        }
    }
	
	public function show(Test $test)
    {
        $test->load(['topic', 'tests', 'testResults']);
        return view('tests.show', compact('test'));
    }
	
	public function submit(Request $request, TestQuestion $testQuestion)
    {
        $request->validate([
            'answer' => 'required|integer|in:0,1,2,3',
        ]);

        $user = Auth::user();
        $isCorrect = $request->answer == $testQuestion->correct_answer;

        testResult::updateOrCreate(
            ['user_id' => $user->id, 'test_question_id' => $testQuestion->id],
            ['answer' => $request->answer, 'is_correct' => $isCorrect]
        );

        return redirect()->back()->with('success', 'Test Question answer submitted!');
    }
}