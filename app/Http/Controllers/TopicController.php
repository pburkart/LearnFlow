<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\LearningPath;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class TopicController extends Controller
{
    public function index()
    {
        Log::info('Index method called');
        $topics = Topic::with('learningPath')->orderBy('order')->get();
        return view('admin.topics.index', compact('topics'));
    }

    public function create()
    {
        Log::info('Create method called');
        $learningPaths = LearningPath::all();
        return view('admin.topics.create', compact('learningPaths'));
    }

    public function store(Request $request)
    {
        Log::info('Store method called', $request->all());
        $validated = $request->validate([
            'path_id' => 'required|exists:learning_paths,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'resources' => 'nullable|array',
            'resources.*' => 'nullable|url',
            'order' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('topic_images', 'public');
            $validated['image'] = '/storage/' . $path;
            Log::info('Image stored at: ' . $validated['image']);
        }

        $topic = Topic::create([
            'path_id' => $validated['path_id'],
            'title' => $validated['title'],
            'description' => $validated['description'],
            'resources' => $validated['resources'] ?? [],
            'order' => $validated['order'],
            'image' => $validated['image'] ?? null,
        ]);

        Log::info('Topic created, redirecting to index');
        return redirect()->route('admin.topics.index')->with('success', 'Topic created.');
    }

    public function show(Topic $topic)
    {
        Log::info('Show method called for topic ID: ' . $topic->id);
        $topic->load(['learningPath', 'quizzes', 'userQuizResults', 'tests.test_questions']);
        Log::info('Topic loaded', [
            'topic_id' => $topic->id,
            'tests_count' => $topic->tests->count(),
            'test_questions_count' => $topic->tests->pluck('test_questions')->flatten()->count(),
        ]);
        return view('topics.show', compact('topic'));
    }

    public function edit(Topic $topic)
    {
        Log::info('Edit method called for topic ID: ' . $topic->id);
        $learningPaths = LearningPath::all();
        return view('admin.topics.edit', compact('topic', 'learningPaths'));
    }

    public function update(Request $request, Topic $topic)
    {
        Log::info('Update method called for topic ID: ' . $topic->id);
        Log::info('Request method: ' . $request->method());
        Log::info('Request data: ', $request->all());

        $validated = $request->validate([
            'path_id' => 'required|exists:learning_paths,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'resources' => 'nullable|array',
            'resources.*' => 'nullable|url',
            'order' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        Log::info('Validation passed', $validated);

        try {
            if ($request->hasFile('image')) {
                if ($topic->image && str_starts_with($topic->image, '/storage/')) {
                    Log::info('Deleting old image: ' . $topic->image);
                    Storage::delete(str_replace('/storage/', 'public/', $topic->image));
                }
                $path = $request->file('image')->store('topic_images', 'public');
                $validated['image'] = '/storage/' . $path;
                Log::info('New image stored at: ' . $validated['image']);
            }

            $topic->update([
                'path_id' => $validated['path_id'],
                'title' => $validated['title'],
                'description' => $validated['description'],
                'resources' => $validated['resources'] ?? [],
                'order' => $validated['order'],
                'image' => $validated['image'] ?? $topic->image,
            ]);

            Log::info('Topic updated successfully', $topic->toArray());
            Log::info('Redirecting to show page');

            return redirect()->route('topics.show', $topic)->with('success', 'Topic updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating topic: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Failed to update topic.']);
        }
    }

    public function destroy(Topic $topic)
    {
        Log::info('Destroy method called for topic ID: ' . $topic->id);
        if ($topic->image && str_starts_with($topic->image, '/storage/')) {
            Log::info('Deleting image: ' . $topic->image);
            Storage::delete(str_replace('/storage/', 'public/', $topic->image));
        }
        $topic->delete();
        return redirect()->route('admin.topics.index')->with('success', 'Topic deleted.');
    }

    public function markComplete(Request $request, $id)
    {
        Log::info('MarkComplete method called for topic ID: ' . $id);
        // Existing logic for topic completion
        return redirect()->back();
    }
}