@extends('layouts.app')

@section('content')
    <div style="display: flex; justify-content: center; align-items: flex-start; background-color: #1f2937; padding: 24px;">
        <div style="background-color: #374151; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3); border-radius: 8px; padding: 32px; width: 100%; max-width: 640px;">
            <!-- Display success or info message -->
            @if (session('success'))
                <p style="color: #16a34a; text-align: center; margin-bottom: 16px;">{{ session('success') }}</p>
            @endif
            @if (session('info'))
                <p style="color: #60a5fa; text-align: center; margin-bottom: 16px;">{{ session('info') }}</p>
            @endif
            @if (session('error'))
                <p style="color: #f87171; text-align: center; margin-bottom: 16px;">{{ session('error') }}</p>
            @endif

            <div style="display: flex; margin-bottom: 16px;">
                <div style="flex: 1;">
                    <h1 style="font-size: 30px; font-weight: bold; color: #e5e7eb; margin-bottom: 8px;">{{ $test->title }}</h1>
                </div>
            </div>

            <!-- Tabbed Interface -->
            <div style="margin-bottom: 16px;">
                <!-- Test Questions Tab -->
                <div id="test-questions">
                    <p style="color: #e5e7eb; margin-bottom: 8px;"><strong>Test Questions:</strong></p>
                    @if ($test->test_questions->isEmpty())
                        <p style="color: #e5e7eb;">No test questions available yet.</p>
                    @else
                        <p style="color: #e5e7eb; margin-bottom: 8px;">
                            {{ ($test->testResults ? $test->testResults->where('is_correct', true)->count() : 0) }}/{{ $test->test_questions->count() }} completed
                        </p>
                        @foreach ($test->test_questions as $question)
                            <div style="background-color: #4b5563; padding: 16px; border-radius: 8px; margin-bottom: 16px;">
                                <p style="color: #e5e7eb; font-weight: 500; margin-bottom: 8px;">{{ $question->question }}</p>
                                <form action="{{ route('quizzes.submit', $question) }}?tab=quizzes" method="POST">
                                    @csrf
                                    @php
                                        $userResult = $test->testResults ? $test->testResults->where('test_question_id', $question->id)->first() : null;
                                        $isCompleted = $userResult && $userResult->is_correct;
                                    @endphp
                                    @foreach ($test_question->options as $index => $option)
                                        <div style="margin-bottom: 8px;">
                                            <label style="color: #e5e7eb;">
                                                <input type="radio" name="answer" value="{{ $index }}"
                                                    {{ $userResult && $userResult->answer == $index ? 'checked' : '' }}
                                                    {{ $isCompleted ? 'disabled' : '' }} required>
                                                {{ $option }}
                                            </label>
                                        </div>
                                    @endforeach
                                    @if (!$isCompleted)
                                        <button type="submit" style="background-color: #16a34a; color: #ffffff; padding: 8px 16px; border-radius: 4px; border: none; cursor: pointer;">Submit Answer</button>
                                    @endif
                                </form>
                                @if ($isCompleted)
                                    <p style="color: #16a34a; margin-top: 8px;">Correctly Completed</p>
                                @elseif ($userResult)
                                    <p style="color: #f87171; margin-top: 8px;">Incorrect Answer Submitted</p>
                                @endif
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div style="text-align: center;">
                <a href="{{ route('paths.show', $topic->learningPath->id) }}" style="display: inline-block; background-color: #6b7280; color: #ffffff; padding: 8px 16px; border-radius: 4px; text-decoration: none;">Back to Learning Path</a>
            </div>
        </div>
    </div>
@endsection