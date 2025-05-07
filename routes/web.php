<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LearningPathController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TestQuestionController;

// Unpriviledged Routes
Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
Route::get('/profile', [HomeController::class, 'profile'])->name('user.profile');

// Unpriviledged Topic Routes 
Route::get('/topics/{topic}', [TopicController::class, 'show'])->name('topics.show');
Route::post('/topics/{id}/complete', [TopicController::class, 'markComplete'])->name('topic.complete');

// Unpriviledged Quiz Routes
Route::post('quizzes/{quiz}/submit', [QuizController::class, 'submit'])->name('quizzes.submit');

// Unpriviledged Test Routes
Route::post('tests/{test}/submit', [TestController::class, 'submit']) -> name('tests.submit');

// Unpriviledged Learning Path Routes 
Route::get('/learning-paths', [LearningPathController::class, 'list'])->name('learning-paths.show');
Route::get('/paths/{id}', [LearningPathController::class, 'show'])->name('paths.show');
Route::post('/enroll/{learning_path}', [LearningPathController::class, 'enroll'])->name('enroll');

Route::post('/paths/{path}/comment', [LearningPathController::class, 'comment'])->name('paths.comment');

// Unpriviledged User Routes
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');

// Profile Edit
Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');
    Route::put('/profile', [UserController::class, 'updateProfile'])->name('profile.update');
});

// Admin Routes
Route::get('/admin', function () {
    return view('admin.panel');
})->name('admin.panel');

Route::prefix('admin')->name('admin.')->group(function () {
    // Learning Path CRUD Routes
    Route::get('/learning-paths', [LearningPathController::class, 'index'])->name('learning-paths.index');
    Route::get('/learning-paths/create', [LearningPathController::class, 'create'])->name('learning-paths.create');
    Route::post('/learning-paths', [LearningPathController::class, 'store'])->name('learning-paths.store');
    Route::get('/learning-paths/{learning_path}/edit', [LearningPathController::class, 'edit'])->name('learning-paths.edit');
    Route::put('/learning-paths/{learning_path}', [LearningPathController::class, 'update'])->name('learning-paths.update');
    Route::delete('/learning-paths/{learning_path}', [LearningPathController::class, 'destroy'])->name('learning-paths.destroy');

    // Topic CRUD Routes
    Route::get('/topics', [TopicController::class, 'index'])->name('topics.index');
    Route::get('/topics/create', [TopicController::class, 'create'])->name('topics.create');
    Route::post('/topics', [TopicController::class, 'store'])->name('topics.store');
    Route::get('/topics/{topic}/edit', [TopicController::class, 'edit'])->name('topics.edit');
    Route::put('/topics/{topic}', [TopicController::class, 'update'])->name('topics.update'); 
    Route::delete('/topics/{topic}', [TopicController::class, 'destroy'])->name('topics.destroy');
	
	// Quiz CRUD Routes
	Route::post('/quizzes', [QuizController::class, 'store']) -> name('quizzes.store');
	Route::put('/quizzes/{quiz}', [QuizController::class, 'update']) -> name('quizzes.update');
	Route::delete('/quizzes/{quiz}', [QuizController::class, 'destroy']) -> name('quizzes.destroy');
	
	// Test CRUD Routes
	Route::get('/tests', [TestController::class, 'index']) -> name('tests.index');
	Route::get('/tests/create', [TestController::class, 'create']) -> name('tests.create');
	Route::post('/tests', [TestController::class, 'store']) -> name('tests.store');
	Route::get('/tests/{test}/edit', [TestController::class, 'edit']) -> name('tests.edit');
	Route::put('/tests/{test}', [TestController::class, 'update']) -> name('tests.update');
	Route::delete('/tests/{test}', [TestController::class, 'destroy']) -> name('tests.destroy');
	
	// Test Question CRUD Routes
	Route::post('/tests/{test}/questions', [TestQuestionController::class, 'store']) -> name('test_questions.store');
	Route::put('/tests/{test}/questions/{question}', [TestQuestionController::class, 'update']) -> name('test_questions.update');
	Route::delete('/tests/{test}/questions/{question}', [TestQuestionController::class, 'destroy']) -> name('test_questions.destroy');
	
	// Users CRUD Routes
	Route::get('/users', [UserController::class, 'index'])->name('users.index');
	Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
	Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
	
});

// Home Page
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');