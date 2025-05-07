@extends('layouts.app')

@section('content')
    <div style="display: flex; justify-content: center; align-items: flex-start; background-color: #1f2937; padding: 24px;">
        <div style="background-color: #374151; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3); border-radius: 8px; padding: 32px; width: 100%; max-width: 640px;">
            <h1 style="font-size: 30px; font-weight: bold; color: #e5e7eb; margin-bottom: 24px; text-align: center;">Edit Topic</h1>

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

            <!-- Tabbed Interface -->
            <div style="margin-bottom: 16px;">
                <!-- Tab Navigation -->
                <div style="border-bottom: 1px solid #4b5563; margin-bottom: 16px;">
                    <button class="tab-button active" onclick="openTab(event, 'details')" style="background: none; border: none; padding: 12px 24px; color: #9ca3af; font-weight: 500; cursor: pointer;">Details</button>
                    <button class="tab-button" onclick="openTab(event, 'quizzes')" style="background: none; border: none; padding: 12px 24px; color: #9ca3af; font-weight: 500; cursor: pointer;">Quizzes</button>
                    <button class="tab-button" onclick="openTab(event, 'tests')" style="background: none; border: none; padding: 12px 24px; color: #9ca3af; font-weight: 500; cursor: pointer;">Tests</button>
                </div>

                <!-- Tab Content -->
                <!-- Details Tab -->
                <div id="details" class="tab-content" style="display: block;">
                    <!-- Topic Update Form -->
                    <form action="{{ route('admin.topics.update', $topic) }}" method="POST" enctype="multipart/form-data" id="topic-form">
                        @csrf
                        @method('PUT')

                        <div style="display: flex; margin-bottom: 16px;">
                            <div style="flex: 0 0 150px; margin-right: 16px;">
                                @if ($topic->image)
                                    <img src="{{ $topic->image }}" alt="{{ $topic->title }}" style="width: 150px; height: 150px; object-fit: cover; border-radius: 8px;">
                                @else
                                    <img src="/storage/placeholder.jpg" alt="Placeholder" style="width: 150px; height: 150px; object-fit: cover; border-radius: 8px;">
                                @endif
                            </div>
                            <div style="flex: 1;">
                                <div style="margin-bottom: 16px;">
                                    <label for="title" style="display: block; color: #e5e7eb; margin-bottom: 8px;">Title</label>
                                    <input type="text" name="title" id="title" value="{{ old('title', $topic->title) }}" style="width: 100%; border: 1px solid #4b5563; background-color: #4b5563; color: #e5e7eb; border-radius: 4px; padding: 8px 12px; font-size: 16px;">
                                    @error('title')
                                        <p style="color: #f87171; font-size: 14px; margin-top: 4px;">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div style="margin-bottom: 16px;">
                                    <label for="path_id" style="display: block; color: #e5e7eb; margin-bottom: 8px;">Learning Path</label>
                                    <select name="path_id" id="path_id" style="width: 100%; border: 1px solid #4b5563; background-color: #4b5563; color: #e5e7eb; border-radius: 4px; padding: 8px 12px; font-size: 16px;">
                                        @foreach ($learningPaths as $path)
                                            <option value="{{ $path->id }}" {{ $topic->path_id == $path->id ? 'selected' : '' }}>{{ $path->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('path_id')
                                        <p style="color: #f87171; font-size: 14px; margin-top: 4px;">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div style="margin-bottom: 16px;">
                            <label for="image" style="display: block; color: #e5e7eb; margin-bottom: 8px;">Topic Image</label>
                            <input type="file" name="image" id="image" style="width: 100%; color: #e5e7eb;">
                            @error('image')
                                <p style="color: #f87171; font-size: 14px; margin-top: 4px;">{{ $message }}</p>
                            @enderror
                        </div>

                        <div style="margin-bottom: 16px;">
                            <label for="description" style="display: block; color: #e5e7eb; margin-bottom: 8px;">Description</label>
                            <textarea name="description" id="description" style="width: 100%; border: 1px solid #4b5563; background-color: #4b5563; color: #e5e7eb; border-radius: 4px; padding: 8px 12px; font-size: 16px; height: 128px; resize: vertical;">{{ old('description', $topic->description) }}</textarea>
                            @error('description')
                                <p style="color: #f87171; font-size: 14px; margin-top: 4px;">{{ $message }}</p>
                            @enderror
                        </div>

                        <div style="margin-bottom: 16px;">
                            <label style="display: block; color: #e5e7eb; margin-bottom: 8px;">Resources (YouTube URLs)</label>
                            <div id="resources-container">
                                @if ($topic->resources && is_array($topic->resources))
                                    @forelse ($topic->resources as $resource)
                                        <div style="display: flex; margin-bottom: 8px;">
                                            <input type="url" name="resources[]" style="width: 100%; border: 1px solid #4b5563; background-color: #4b5563; color: #e5e7eb; border-radius: 4px; padding: 8px 12px; font-size: 16px;" value="{{ $resource }}" placeholder="https://www.youtube.com/watch?v=...">
                                            <button type="button" class="remove-resource" style="background-color: #dc2626; color: #ffffff; padding: 4px 12px; border-radius: 4px; margin-left: 8px; border: none; cursor: pointer;">Remove</button>
                                        </div>
                                    @empty
                                        <input type="url" name="resources[]" style="width: 100%; border: 1px solid #4b5563; background-color: #4b5563; color: #e5e7eb; border-radius: 4px; padding: 8px 12px; font-size: 16px; margin-bottom: 8px;" placeholder="https://www.youtube.com/watch?v=...">
                                    @endforelse
                                @else
                                    <input type="url" name="resources[]" style="width: 100%; border: 1px solid #4b5563; background-color: #4b5563; color: #e5e7eb; border-radius: 4px; padding: 8px 12px; font-size: 16px; margin-bottom: 8px;" placeholder="https://www.youtube.com/watch?v=...">
                                @endif
                            </div>
                            <button type="button" id="add-resource" style="background-color: #16a34a; color: #ffffff; padding: 4px 12px; border-radius: 4px; border: none; cursor: pointer;">Add Resource</button>
                        </div>

                        <div style="margin-bottom: 16px;">
                            <label for="order" style="display: block; color: #e5e7eb; margin-bottom: 8px;">Order</label>
                            <input type="number" name="order" id="order" value="{{ old('order', $topic->order) }}" min="1" style="width: 100%; border: 1px solid #4b5563; background-color: #4b5563; color: #e5e7eb; border-radius: 4px; padding: 8px 12px; font-size: 16px;">
                            @error('order')
                                <p style="color: #f87171; font-size: 14px; margin-top: 4px;">{{ $message }}</p>
                            @enderror
                        </div>

                        <div style="text-align: center; margin-bottom: 16px;">
                            <a href="{{ route('admin.topics.index') }}" style="background-color: #6b7280; color: #ffffff; padding: 8px 16px; border-radius: 4px; text-decoration: none; margin-right: 8px;">Back</a>
                            <button type="submit" style="background-color: #2563eb; color: #ffffff; padding: 8px 16px; border-radius: 4px; border: none; cursor: pointer;">Update Topic</button>
                        </div>
                    </form>
                </div>

                <!-- Quizzes Tab -->
                <div id="quizzes" class="tab-content" style="display: none;">
                    <!-- Quiz Management Section -->
                    <div style="margin-bottom: 16px;">
                        <h2 style="font-size: 20px; font-weight: bold; color: #e5e7eb; margin-bottom: 16px;">Manage Quizzes</h2>

                        <!-- Quiz List -->
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
                                    @forelse ($topic->quizzes as $quiz)
                                        <tr style="border-bottom: 1px solid #4b5563;">
                                            <td style="padding: 8px;">{{ $quiz->question }}</td>
                                            <td style="padding: 8px;">{{ $quiz->options[$quiz->correct_answer] }}</td>
                                            <td style="padding: 8px;">
                                                <button type="button" class="edit-quiz" data-quiz='{{ json_encode($quiz) }}' style="background-color: #2563eb; color: #ffffff; padding: 4px 12px; border-radius: 4px; border: none; cursor: pointer; margin-right: 8px;">Edit</button>
                                                <form action="{{ route('admin.quizzes.destroy', $quiz) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" style="background-color: #dc2626; color: #ffffff; padding: 4px 12px; border-radius: 4px; border: none; cursor: pointer;" onclick="return confirm('Are you sure you want to delete this quiz?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" style="padding: 8px; text-align: center;">No quizzes available.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Quiz Form -->
                        <div id="quiz-form-container" style="display: none; background-color: #4b5563; padding: 16px; border-radius: 4px; margin-bottom: 16px;">
                            <h3 style="font-size: 18px; color: #e5e7eb; margin-bottom: 16px;" id="quiz-form-title">Add New Quiz</h3>
                            <form id="quiz-form" action="{{ route('admin.quizzes.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="topic_id" value="{{ $topic->id }}">
                                <input type="hidden" name="quiz_id" id="quiz_id">
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
                                    <button type="button" id="cancel-quiz" style="background-color: #6b7280; color: #ffffff; padding: 4px 12px; border-radius: 4px; border: none; cursor: pointer; margin-right: 8px;">Cancel</button>
                                    <button type="submit" id="save-quiz" style="background-color: #16a34a; color: #ffffff; padding: 4px 12px; border-radius: 4px; border: none; cursor: pointer;">Save Quiz</button>
                                </div>
                            </form>
                        </div>
                        <button type="button" id="add-quiz" style="background-color: #16a34a; color: #ffffff; padding: 4px 12px; border-radius: 4px; border: none; cursor: pointer;">Add Quiz</button>
                    </div>
                </div>

                <!-- Tests Tab -->
                <div id="tests" class="tab-content" style="display: none;">
                    <!-- Test Management Section -->
                    <div style="margin-bottom: 16px;">
                        <h2 style="font-size: 20px; font-weight: bold; color: #e5e7eb; margin-bottom: 16px;">Manage Tests</h2>

                        <!-- Test List -->
                        <div style="margin-bottom: 16px;">
                            <table style="width: 100%; border-collapse: collapse; color: #e5e7eb;">
                                <thead>
                                    <tr style="background-color: #4b5563;">
                                        <th style="padding: 8px; text-align: left;">Title</th>
                                        <th style="padding: 8px; text-align: left;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($topic->tests as $test)
                                        <tr style="border-bottom: 1px solid #4b5563;">
                                            <td style="padding: 8px;">{{ $test->title }}</td>
                                            <td style="padding: 8px;">
                                                <button type="button" class="edit-test" data-test='{{ json_encode($test) }}' style="background-color: #2563eb; color: #ffffff; padding: 4px 12px; border-radius: 4px; border: none; cursor: pointer; margin-right: 8px;">Edit</button>
                                                <form action="{{ route('admin.tests.destroy', $test) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" style="background-color: #dc2626; color: #ffffff; padding: 4px 12px; border-radius: 4px; border: none; cursor: pointer;" onclick="return confirm('Are you sure you want to delete this test?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2" style="padding: 8px; text-align: center;">No tests available.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Test Form -->
                        <div id="test-form-container" style="display: none; background-color: #4b5563; padding: 16px; border-radius: 4px; margin-bottom: 16px;">
                            <h3 style="font-size: 18px; color: #e5e7eb; margin-bottom: 16px;" id="test-form-title">Add New Test</h3>
                            <form id="test-form" action="{{ route('admin.tests.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="topic_id" value="{{ $topic->id }}">
                                <input type="hidden" name="test_id" id="test_id">
                                <input type="hidden" name="_method" id="test-form-method" value="POST">
                                <div style="margin-bottom: 16px;">
                                    <label for="test_title" style="display: block; color: #e5e7eb; margin-bottom: 8px;">Test Title</label>
                                    <input type="text" name="title" id="test_title" style="width: 100%; border: 1px solid #4b5563; background-color: #374151; color: #e5e7eb; border-radius: 4px; padding: 8px 12px; font-size: 16px;">
                                    @error('title')
                                        <p style="color: #f87171; font-size: 14px; margin-top: 4px;">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div style="text-align: right;">
                                    <button type="button" id="cancel-test" style="background-color: #6b7280; color: #ffffff; padding: 4px 12px; border-radius: 4px; border: none; cursor: pointer; margin-right: 8px;">Cancel</button>
                                    <button type="submit" id="save-test" style="background-color: #16a34a; color: #ffffff; padding: 4px 12px; border-radius: 4px; border: none; cursor: pointer;">Save Test</button>
                                </div>
                            </form>
                        </div>
                        <button type="button" id="add-test" style="background-color: #16a34a; color: #ffffff; padding: 4px 12px; border-radius: 4px; border: none; cursor: pointer;">Add Test</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Tab Switching
        function openTab(evt, tabName) {
            console.log('openTab called with tab:', tabName);
            var tabContents = document.getElementsByClassName("tab-content");
            for (var i = 0; i < tabContents.length; i++) {
                tabContents[i].style.display = "none";
            }

            var tabButtons = document.getElementsByClassName("tab-button");
            for (var i = 0; i < tabButtons.length; i++) {
                tabButtons[i].classList.remove("active");
            }

            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.classList.add("active");
        }

        // Resource Management
        document.getElementById('add-resource').addEventListener('click', function () {
            const container = document.getElementById('resources-container');
            const input = document.createElement('div');
            input.style.display = 'flex';
            input.style.marginBottom = '8px';
            input.innerHTML = `
                <input type="url" name="resources[]" style="width: 100%; border: 1px solid #4b5563; background-color: #4b5563; color: #e5e7eb; border-radius: 4px; padding: 8px 12px; font-size: 16px;" placeholder="https://www.youtube.com/watch?v=...">
                <button type="button" class="remove-resource" style="background-color: #dc2626; color: #ffffff; padding: 4px 12px; border-radius: 4px; margin-left: 8px; border: none; cursor: pointer;">Remove</button>
            `;
            container.appendChild(input);
        });

        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-resource')) {
                e.target.parentElement.remove();
            }
        });

        // Quiz Management
        const quizFormContainer = document.getElementById('quiz-form-container');
        const quizForm = document.getElementById('quiz-form');
        const quizFormTitle = document.getElementById('quiz-form-title');
        const addQuizButton = document.getElementById('add-quiz');
        const cancelQuizButton = document.getElementById('cancel-quiz');
        const formMethod = document.getElementById('form-method');
        const saveQuizButton = document.getElementById('save-quiz');

        // Show form to add new quiz
        addQuizButton.addEventListener('click', function () {
            quizFormContainer.style.display = 'block';
            quizFormTitle.textContent = 'Add New Quiz';
            quizForm.action = "{{ route('admin.quizzes.store') }}";
            quizForm.method = 'POST';
            formMethod.value = 'POST';
            quizForm.reset();
            document.getElementById('quiz_id').value = '';
            document.getElementById('question').value = '';
            for (let i = 0; i < 4; i++) {
                document.getElementById(`option_${i}`).value = '';
            }
            document.getElementById('correct_answer').value = '0';
            console.log('Add Quiz - Action:', quizForm.action, 'Method:', quizForm.method, 'FormMethod:', formMethod.value);
        });

        // Cancel quiz form
        cancelQuizButton.addEventListener('click', function () {
            quizFormContainer.style.display = 'none';
            quizForm.reset();
            quizForm.action = "{{ route('admin.quizzes.store') }}";
            quizForm.method = 'POST';
            formMethod.value = 'POST';
        });

        // Edit quiz
        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('edit-quiz')) {
                const quiz = JSON.parse(e.target.getAttribute('data-quiz'));
                quizFormContainer.style.display = 'block';
                quizFormTitle.textContent = 'Edit Quiz';
                quizForm.action = "{{ route('admin.quizzes.update', ':quiz') }}".replace(':quiz', quiz.id);
                quizForm.method = 'POST';
                formMethod.value = 'PUT';
                document.getElementById('quiz_id').value = quiz.id;
                document.getElementById('question').value = quiz.question;
                const options = quiz.options;
                for (let i = 0; i < 4; i++) {
                    document.getElementById(`option_${i}`).value = options[i] || '';
                }
                document.getElementById('correct_answer').value = quiz.correct_answer;
                console.log('Edit Quiz - Action:', quizForm.action, 'Method:', quizForm.method, 'FormMethod:', formMethod.value);
            }
        });

        // Ensure proper quiz form submission
        quizForm.addEventListener('submit', function (e) {
            e.preventDefault();
            e.stopPropagation();
            console.log('Submitting Quiz Form - Action:', quizForm.action, 'Method:', quizForm.method, 'FormMethod:', formMethod.value);
            quizForm.method = 'POST';
            quizForm.submit();
        });

        // Test Management
        const testFormContainer = document.getElementById('test-form-container');
        const testForm = document.getElementById('test-form');
        const testFormTitle = document.getElementById('test-form-title');
        const addTestButton = document.getElementById('add-test');
        const cancelTestButton = document.getElementById('cancel-test');
        const testFormMethod = document.getElementById('test-form-method');
        const saveTestButton = document.getElementById('save-test');

        // Show form to add new test
        addTestButton.addEventListener('click', function () {
            testFormContainer.style.display = 'block';
            testFormTitle.textContent = 'Add New Test';
            testForm.action = "{{ route('admin.tests.store') }}";
            testForm.method = 'POST';
            testFormMethod.value = 'POST';
            testForm.reset();
            document.getElementById('test_id').value = '';
            document.getElementById('test_title').value = '';
            console.log('Add Test - Action:', testForm.action, 'Method:', testForm.method, 'FormMethod:', testFormMethod.value);
        });

        // Cancel test form
        cancelTestButton.addEventListener('click', function () {
            testFormContainer.style.display = 'none';
            testForm.reset();
            testForm.action = "{{ route('admin.tests.store') }}";
            testForm.method = 'POST';
            testFormMethod.value = 'POST';
        });

        // Edit test
        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('edit-test')) {
                const test = JSON.parse(e.target.getAttribute('data-test'));
                testFormContainer.style.display = 'block';
                testFormTitle.textContent = 'Edit Test';
                testForm.action = "{{ route('admin.tests.update', ':test') }}".replace(':test', test.id);
                testForm.method = 'POST';
                testFormMethod.value = 'PUT';
                document.getElementById('test_id').value = test.id;
                document.getElementById('test_title').value = test.title;
                console.log('Edit Test - Action:', testForm.action, 'Method:', testForm.method, 'FormMethod:', testFormMethod.value);
            }
        });

        // Ensure proper test form submission
        testForm.addEventListener('submit', function (e) {
            e.preventDefault();
            e.stopPropagation();
            console.log('Submitting Test Form - Action:', testForm.action, 'Method:', testForm.method, 'FormMethod:', testFormMethod.value);
            testForm.method = 'POST';
            testForm.submit();
        });
    </script>
@endsection

@push('styles')
    <style>
        .tab-button {
            transition: all 0.3s ease;
        }
        .tab-button.active {
            background-color: #4b5563;
            color: #60a5fa;
            border-bottom: 3px solid #60a5fa;
            font-weight: 700;
            border-radius: 4px 4px 0 0;
        }
    </style>
@endpush