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
                <div style="flex: 0 0 150px; margin-right: 16px;">
                    @if ($topic->image)
                        <img src="{{ $topic->image }}" alt="{{ $topic->title }}" style="width: 150px; height: 150px; object-fit: cover; border-radius: 8px;">
                    @else
                        <img src="/storage/placeholder.jpg" alt="Placeholder" style="width: 150px; height: 150px; object-fit: cover; border-radius: 8px;">
                    @endif
                </div>
                <div style="flex: 1;">
                    <h1 style="font-size: 30px; font-weight: bold; color: #e5e7eb; margin-bottom: 8px;">{{ $topic->title }}</h1>
                    <p style="color: #e5e7eb;"><strong>Learning Path:</strong> {{ $topic->learningPath->title }}</p>
                </div>
            </div>

            <div style="margin-bottom: 16px;">
                <p style="color: #e5e7eb;"><strong>Description:</strong> {{ $topic->description }}</p>
            </div>

            <!-- Tabbed Interface -->
            <div style="margin-bottom: 16px;">
                <!-- Tab Navigation -->
                <div style="border-bottom: 1px solid #4b5563; margin-bottom: 16px;">
                    <button class="tab-button active" onclick="openTab(event, 'resources')" style="background: none; border: none; padding: 12px 24px; color: #9ca3af; font-weight: 500; cursor: pointer;">Resources</button>
                    <button class="tab-button" onclick="openTab(event, 'quizzes')" style="background: none; border: none; padding: 12px 24px; color: #9ca3af; font-weight: 500; cursor: pointer;">Quizzes</button>
                    <button class="tab-button" onclick="openTab(event, 'tests')" style="background: none; border: none; padding: 12px 24px; color: #9ca3af; font-weight: 500; cursor: pointer;">Tests</button>
                </div>

                <!-- Tab Content -->
                <!-- Resources Tab -->
                <div id="resources" class="tab-content" style="display: block;">
                    @if ($topic->resources && count($topic->resources) > 0)
                        @foreach ($topic->resources as $resource)
                            @php
                                $videoId = '';
                                if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]+)/', $resource, $matches)) {
                                    $videoId = $matches[1];
                                }
                            @endphp
                            @if ($videoId)
                                <div style="margin-bottom: 16px;">
                                    <iframe width="100%" height="360" src="https://www.youtube.com/embed/{{ $videoId }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            @else
                                <p style="color: #e5e7eb;">Invalid YouTube URL: {{ $resource }}</p>
                            @endif
                        @endforeach
                    @else
                        <p style="color: #e5e7eb;">No resources available.</p>
                    @endif
                </div>

                <!-- Quizzes Tab -->
                <div id="quizzes" class="tab-content" style="display: none;">
                    <p style="color: #e5e7eb; margin-bottom: 8px;"><strong>Quizzes:</strong></p>
                    @if ($topic->quizzes->isEmpty())
                        <p style="color: #e5e7eb;">No quizzes available yet.</p>
                    @else
                        <p style="color: #e5e7eb; margin-bottom: 8px;">
                            {{ ($topic->userQuizResults ? $topic->userQuizResults->where('is_correct', true)->count() : 0) }}/{{ $topic->quizzes->count() }} completed
                        </p>
                        @foreach ($topic->quizzes as $quiz)
                            <div style="background-color: #4b5563; padding: 16px; border-radius: 8px; margin-bottom: 16px;">
                                <p style="color: #e5e7eb; font-weight: 500; margin-bottom: 8px;">{{ $quiz->question }}</p>
                                <form action="{{ route('quizzes.submit', $quiz) }}?tab=quizzes" method="POST">
                                    @csrf
                                    @php
                                        $userResult = $topic->userQuizResults ? $topic->userQuizResults->where('quiz_id', $quiz->id)->first() : null;
                                        $isCompleted = $userResult && $userResult->is_correct;
                                    @endphp
                                    @foreach ($quiz->options as $index => $option)
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

                <!-- Tests Tab -->
                <div id="tests" class="tab-content" style="display: none;">
                    <p style="color: #e5e7eb; margin-bottom: 8px;"><strong>Tests:</strong></p>
                    <p style="color: #e5e7eb;">No tests available yet.</p>
                </div>
            </div>

            <div style="text-align: center;">
                <a href="{{ route('paths.show', $topic->learningPath->id) }}" style="display: inline-block; background-color: #6b7280; color: #ffffff; padding: 8px 16px; border-radius: 4px; text-decoration: none;">Back to Learning Path</a>
            </div>
        </div>
    </div>

    <!-- JavaScript for Tab Switching -->
    <script>
        function openTab(evt, tabName) {
            // Hide all tab content
            var tabContents = document.getElementsByClassName("tab-content");
            for (var i = 0; i < tabContents.length; i++) {
                tabContents[i].style.display = "none";
            }

            // Remove active class from all tab buttons
            var tabButtons = document.getElementsByClassName("tab-button");
            for (var i = 0; i < tabButtons.length; i++) {
                tabButtons[i].classList.remove("active");
            }

            // Show the selected tab content and mark the button as active
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.classList.add("active");
        }

        // Check URL for tab parameter and open the specified tab
        document.addEventListener('DOMContentLoaded', function () {
            const urlParams = new URLSearchParams(window.location.search);
            const tab = urlParams.get('tab');
            if (tab) {
                const tabButton = document.querySelector(`.tab-button[onclick="openTab(event, '${tab}')"]`);
                if (tabButton) {
                    tabButton.click();
                }
            }
        });
    </script>

    <!-- Inline CSS for Active Tab Styling -->
    <style>
        .tab-button {
            transition: all 0.3s ease !important;
        }
        .tab-button.active {
            background-color: #4b5563 !important;
            color: #60a5fa !important;
            border-bottom: 3px solid #60a5fa !important;
            font-weight: 700 !important;
            border-radius: 4px 4px 0 0 !important;
        }
    </style>
@endsection