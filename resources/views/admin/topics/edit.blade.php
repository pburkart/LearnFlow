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
                                    <td colspan="4" style="padding: 8px; text-align: center;">No quizzes available.</td>
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
    </div>

    <script>
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

        // Ensure proper form submission
        quizForm.addEventListener('submit', function (e) {
            e.preventDefault(); // Prevent default to control submission
            e.stopPropagation();
            console.log('Submitting Quiz Form - Action:', quizForm.action, 'Method:', quizForm.method, 'FormMethod:', formMethod.value);
            // Ensure method is POST (PUT is spoofed via _method)
            quizForm.method = 'POST';
            quizForm.submit(); // Programmatically submit the form
        });
    </script>
@endsection