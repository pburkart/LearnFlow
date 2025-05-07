@extends('layouts.app')

@section('content')
    <div class="dashboard-container">
        <!-- Hero Section -->
        <div class="hero-section">
            <h1 class="hero-title">Welcome to LearnFlow</h1>
            <p class="hero-subtitle">Embark on your learning journey with curated paths tailored to your goals.</p>
            @if (Auth::check())
                <a href="{{ route('learning-paths.show') }}" class="hero-button">
                    <span>Add Learning Path</span>
                    <svg class="hero-button-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </a>
            @endif
        </div>

        <!-- Enrolled Learning Paths -->
        <div class="paths-container">
            @if ($paths->isEmpty())
                <div class="empty-state">
                    <svg class="empty-state-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5s3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18s-3.332.477-4.5 1.253" />
                    </svg>
                    <p class="empty-state-text">You are not enrolled in any learning paths yet.</p>
                    <a href="{{ route('learning-paths.show') }}" class="empty-state-button">Explore Learning Paths</a>
                </div>
            @else
                <h2 class="section-title">Your Learning Paths</h2>
                <div class="paths-grid">
                    @foreach($paths as $path)
                        <div class="path-card" data-tilt data-tilt-max="3" data-tilt-speed="100" data-tilt-glare>
                            <div class="path-card-image">
                                @if ($path->image)
                                    <img src="{{ $path->image }}" alt="{{ $path->title }}" loading="lazy">
                                @else
                                    <img src="/storage/placeholder.jpg" alt="Placeholder" loading="lazy">
                                @endif
                            </div>
                            <div class="path-card-content">
                                <h3 class="path-card-title">{{ $path->title }}</h3>
                                <p class="path-card-description">{{ Str::limit($path->description, 100) }}</p>
                                <!-- Progress Bar -->
                                @php
                                    $totalQuizzes = $path->topics->flatMap->quizzes->count();
                                    $completedQuizzes = $path->topics
                                        ->flatMap(function ($topic) {
                                            return $topic->userQuizResults->where('is_correct', true);
                                        })
                                        ->unique('quiz_id')
                                        ->count();
                                    $progress = $totalQuizzes > 0 ? ($completedQuizzes / $totalQuizzes) * 100 : 0;
                                @endphp
                                <div class="progress-container">
                                    <div class="progress-bar" style="width: {{ $progress }}%;"></div>
                                </div>
                                <p class="progress-text">{{ $completedQuizzes }}/{{ $totalQuizzes }} Quizzes Completed</p>
                                <a href="{{ route('paths.show', $path->id) }}" class="path-card-button">Continue Learning</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <!-- Inline CSS -->
    <style>
        .dashboard-container {
            background-color: #1f2937;
            min-height: 100vh;
            padding: 40px 20px;
            font-family: 'Inter', sans-serif;
        }

        /* Hero Section */
        .hero-section {
            text-align: center;
            padding: 60px 20px;
            background: linear-gradient(135deg, #1f2937 0%, #374151 100%);
            border-radius: 16px;
            margin-bottom: 40px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.4);
        }

        .hero-title {
            color: #e5e7eb;
            font-size: 48px;
            font-weight: 800;
            margin-bottom: 16px;
            letter-spacing: -0.02em;
        }

        .hero-subtitle {
            color: #9ca3af;
            font-size: 20px;
            max-width: 600px;
            margin: 0 auto 24px;
        }

        .hero-button {
            display: inline-flex;
            align-items: center;
            background-color: #16a34a;
            color: #ffffff;
            padding: 12px 24px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .hero-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(22, 163, 74, 0.4);
        }

        .hero-button-icon {
            width: 20px;
            height: 20px;
            margin-left: 8px;
        }

        /* Paths Section */
        .paths-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-title {
            color: #e5e7eb;
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 24px;
            text-align: center;
        }

        .paths-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 24px;
        }

        .path-card {
            background-color: #374151;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        .path-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.5);
        }

        .path-card-image img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-bottom: 2px solid #16a34a;
        }

        .path-card-content {
            padding: 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .path-card-title {
            color: #e5e7eb;
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 12px;
        }

        .path-card-description {
            color: #9ca3af;
            font-size: 16px;
            margin-bottom: 16px;
            line-height: 1.5;
        }

        .progress-container {
            background-color: #4b5563;
            border-radius: 8px;
            height: 8px;
            overflow: hidden;
            margin-bottom: 12px;
        }

        .progress-bar {
            background: linear-gradient(90deg, #16a34a, #22c55e);
            height: 100%;
            transition: width 0.5s ease;
        }

        .progress-text {
            color: #e5e7eb;
            font-size: 14px;
            margin-bottom: 16px;
            text-align: center;
        }

        .path-card-button {
            display: inline-block;
            background-color: #2563eb;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            text-align: center;
            transition: background-color 0.2s ease, transform 0.2s ease;
        }

        .path-card-button:hover {
            background-color: #1d4ed8;
            transform: translateY(-2px);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 40px;
            background-color: #374151;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        .empty-state-icon {
            width: 64px;
            height: 64px;
            color: #9ca3af;
            margin-bottom: 16px;
        }

        .empty-state-text {
            color: #e5e7eb;
            font-size: 18px;
            margin-bottom: 24px;
        }

        .empty-state-button {
            display: inline-block;
            background-color: #16a34a;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.2s ease;
        }

        .empty-state-button:hover {
            background-color: #15803d;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 36px;
            }

            .hero-subtitle {
                font-size: 16px;
            }

            .paths-grid {
                grid-template-columns: 1fr;
            }

            .path-card-image img {
                height: 150px;
            }
        }
    </style>

    <!-- Vanilla Tilt for Card Animations -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.7.2/vanilla-tilt.min.js"></script>
@endsection