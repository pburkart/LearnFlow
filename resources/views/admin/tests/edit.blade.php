@extends('layouts.app')

@section('content')
    <div style="display: flex; justify-content: center; align-items: flex-start; background-color: #1f2937; padding: 24px;">
        <div style="background-color: #374151; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3); border-radius: 8px; padding: 32px; width: 100%; max-width: 640px;">
            <h1 style="font-size: 30px; font-weight: bold; color: #e5e7eb; margin-bottom: 24px; text-align: center;">Edit Test</h1>

            @if (session('success'))
                <div style="color: #16a34a; margin-bottom: 16px; text-align: center;">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div style="color: #f87171; margin-bottom: 16px; text-align: center;">
                    {{ session('error') }}
                </div>
            @endif
            @if ($errors->any())
                <div style="color: #f87171; margin-bottom: 16px; text-align: center;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Test Update Form -->
            <form action="{{ route('admin.tests.update', $test) }}" method="POST" enctype="multipart/form-data" id="test-form">
                @csrf
                @method('PUT')

                <div style="display: flex; margin-bottom: 16px;">
                    <div style="flex: 1;">
                        <div style="margin-bottom: 16px;">
                            <label for="title" style="display: block; color: #e5e7eb; margin-bottom: 8px;">Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $test->title) }}" style="width: 100%; border: 1px solid #4b5563; background-color: #4b5563; color: #e5e7eb; border-radius: 4px; padding: 8px 12px; font-size: 16px;">
                            @error('title')
                                <p style="color: #f87171; font-size: 14px; margin-top: 4px;">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div style="text-align: center; margin-bottom: 16px;">
                    <a href="{{ route('admin.topics.index') }}" style="background-color: #6b7280; color: #ffffff; padding: 8px 16px; border-radius: 4px; text-decoration: none; margin-right: 8px;">Back</a>
                    <button type="submit" style="background-color: #2563eb; color: #ffffff; padding: 8px 16px; border-radius: 4px; border: none; cursor: pointer;">Update Test</button>
                </div>
            </form>

            <!-- Test Question Management Section -->
            <div style="margin-bottom: 16px;">
                <h2 style="font-size: 20px; font-weight: bold; color: #e5e7eb; margin-bottom: 16px;">Manage Questions</h2>

                <!-- Test Question List -->
                <div style="margin-bottom: 16px;">
                    <table style="width: 100%; border-collapse: collapse; color: #e5e7eb;">
                        <thead>
                            <tr style="background-color: #4b5563;">
                                <th style="padding: 8px; text-align: left;">Question</th>
                                <th style="padding: 8px; text-align: left;">Correct Answer</th>
                                <th style="padding: 8px; text-align: left;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($test->test_questions && $test->test_questions->count() > 0)
                                @foreach ($test->test_questions as $question)
                                    <tr style="border-bottom: 1px solid #4b5563;">
                                        <td style="padding: 8px;">{{ $question->question }}</td>
                                        <td style="padding: 8px;">{{ $question->options[$question->correct_answer] ?? 'N/A' }}</td>
                                        <td style="padding: 8px;">
                                            <button type="button" class="edit-question" data-question='{{ json_encode($question) }}' style="background-color: #2563eb; color: #ffffff; padding: 4px 12px; border-radius: 4px; border: none; cursor: pointer; margin-right: 8px;">Edit</button>
                                            <form action="{{ route('admin.test_questions.destroy', [$test, $question]) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" style="background-color: #dc2626; color: #ffffff; padding: 4px 12px; border-radius: 4px; border: none; cursor: pointer;" onclick="return confirm('Are you sure you want to delete this question?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3" style="padding: 8px; text-align: center;">No questions available.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <!-- Test Question Form -->
                <div id="test-question-form-container" style="display: none; background-color: #4b5563; padding: 16px; border-radius: 4px; margin-bottom: 16px;">
                    <h3 style="font-size: 18px; color: #e5e7eb; margin-bottom: 16px;" id="test-question-form-title">Add New Question</h3>
                    <form id="test-question-form" action="{{ route('admin.test_questions.store', $test) }}" method="POST">
                        @csrf
                        <input type="hidden" name="test_id" value="{{ $test->id }}">
                        <input type="hidden" name="test_question_id" id="test_question_id">
                        <input type="hidden" name="_method" id="form-method" value="POST">
                        <div style="margin-bottom: 16px;">
                            <label for="question" style="display: block; color: #e5e7eb; margin-bottom: 8px;">Question</label>
                            <input type="text" name="question" id="question" style="width: 100%; border: 1px solid #4b5563; background-color: #374151; color: #e5e7eb; border-radius: 4px; padding: 8px 12px; font-size: 16px;">
                            @error('question')
                                <p style="color: #f87171; font-size: 14px; margin-top: 4px;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div style="margin-bottom: 16px;">
                            <label style="display: block; color: #e5e7eb; margin-bottom: 8px;">Options</label>
                            <input type="text" name="options[]" id="option_0" style="width: 100%; border: 1px solid #4b5563; background-color: #374151; color: #e5e7eb; border-radius: 4px; padding: 8px 12px; font-size: 16px; margin-bottom: 8px;" placeholder="Option 1">
                            <input type="text" name="options[]" id="option_1" style="width: 100%; border: 1px solid #4b5563; background-color: #374151; color: #e5e7eb; border-radius: 4px; padding: 8px 12px; font-size: 16px; margin-bottom: 8px;" placeholder="Option 2">
                            <input type="text" name="options[]" id="option_2" style="width: 100%; border: 1px solid #4b5563; background-color: #374151; color: #e5e7eb; border-radius: 4px; padding: 8px 12px; font-size: 16px; margin-bottom: 8px;" placeholder="Option 3">
                            <input type="text" name="options[]" id="option_3" style="width: 100%; border: 1px solid #4b5563; background-color: #374151; color: #e5e7eb; border-radius: 4px; padding: 8px 12px; font-size: 16px; margin-bottom: 8px;" placeholder="Option 4">
                            @error('options')
                                <p style="color: #f87171; font-size: 14px; margin-top: 4px;">{{ $message }}</p>
                            @endif
                            @error('options.*')
                                <p style="color: #f87171; font-size: 14px; margin-top: 4px;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div style="margin-bottom: 16px;">
                            <label for="correct_answer" style="display: block; color: #e5e7eb; margin-bottom: 8px;">Correct Answer</label>
                            <select name="correct_answer" id="correct_answer" style="width: 100%; border: 1px solid #4b5563; background-color: #374151; color: #e5e7eb; border-radius: 4px; padding: 8px 12px; font-size: 16px;">
                                <option value="0">Option 1</option>
                                <option value="1">Option 2</option>
                                <option value="2">Option 3</option>
                                <option value="3">Option 4</option>
                            </select>
                            @error('correct_answer')
                                <p style="color: #f87171; font-size: 14px; margin-top: 4px;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div style="text-align: right;">
                            <button type="button" id="cancel-test-question" style="background-color: #6b7280; color: #ffffff; padding: 4px 12px; border-radius: 4px; border: none; cursor: pointer; margin-right: 8px;">Cancel</button>
                            <button type="submit" id="save-test-question" style="background-color: #16a34a; color: #ffffff; padding: 4px 12px; border-radius: 4px; border: none; cursor: pointer;">Save Question</button>
                        </div>
                    </form>
                </div>
                <button type="button" id="add-test-question" style="background-color: #16a34a; color: #ffffff; padding: 4px 12px; border-radius: 4px; border: none; cursor: pointer;">Add Question</button>
            </div>
        </div>
    </div>

    <script>
        // Test Question Management
        const testQuestionFormContainer = document.getElementById('test-question-form-container');
        const testQuestionForm = document.getElementById('test-question-form');
        const testQuestionFormTitle = document.getElementById('test-question-form-title');
        const addTestQuestionButton = document.getElementById('add-test-question');
        const cancelTestQuestionButton = document.getElementById('cancel-test-question');
        const formMethod = document.getElementById('form-method');
        const saveTestQuestionButton = document.getElementById('save-test-question');

        // Show form to add new test question
        addTestQuestionButton.addEventListener('click', function () {
            testQuestionFormContainer.style.display = 'block';
            testQuestionFormTitle.textContent = 'Add New Question';
            testQuestionForm.action = "{{ route('admin.test_questions.store', $test) }}";
            testQuestionForm.method = 'POST';
            formMethod.value = 'POST';
            testQuestionForm.reset();
            document.getElementById('test_question_id').value = '';
            document.getElementById('question').value = '';
            for (let i = 0; i < 4; i++) {
                document.getElementById(`option_${i}`).value = '';
            }
            document.getElementById('correct_answer').value = '0';
            console.log('Add Question - Action:', testQuestionForm.action, 'Method:', testQuestionForm.method, 'FormMethod:', formMethod.value);
        });

        // Cancel test question form
        cancelTestQuestionButton.addEventListener('click', function () {
            testQuestionFormContainer.style.display = 'none';
            testQuestionForm.reset();
            testQuestionForm.action = "{{ route('admin.test_questions.store', $test) }}";
            testQuestionForm.method = 'POST';
            formMethod.value = 'POST';
        });

        // Edit test question
        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('edit-question')) {
                const question = JSON.parse(e.target.getAttribute('data-question'));
                testQuestionFormContainer.style.display = 'block';
                testQuestionFormTitle.textContent = 'Edit Question';
                testQuestionForm.action = "{{ route('admin.test_questions.update', [$test, ':question']) }}".replace(':question', question.id);
                testQuestionForm.method = 'POST';
                formMethod.value = 'PUT';
                document.getElementById('test_question_id').value = question.id;
                document.getElementById('question').value = question.question;
                const options = question.options;
                for (let i = 0; i < 4; i++) {
                    document.getElementById(`option_${i}`).value = options[i] || '';
                }
                document.getElementById('correct_answer').value = question.correct_answer;
                console.log('Edit Question - Action:', testQuestionForm.action, 'Method:', testQuestionForm.method, 'FormMethod:', formMethod.value);
            }
        });

        // Ensure proper form submission
        testQuestionForm.addEventListener('submit', function (e) {
            e.preventDefault();
            console.log('Submitting Question Form - Action:', testQuestionForm.action, 'Method:', testQuestionForm.method, 'FormMethod:', formMethod.value);
            testQuestionForm.method = 'POST';
            testQuestionForm.submit();
        });
    </script>
@endsection