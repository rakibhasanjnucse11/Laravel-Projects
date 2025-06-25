@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">Edit Project</h1>
    <form action="{{ route('projects.update', $project) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium">Title</label>
            <input type="text" name="title" id="title" value="{{ $project->title }}" required class="w-full rounded p-2 dark:bg-gray-700">
        </div>
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium">Description</label>
            <textarea name="description" id="description" rows="3" class="w-full rounded p-2 dark:bg-gray-700">{{ $project->description }}</textarea>
        </div>
        <div class="mb-4">
            <label for="technologies" class="block text-sm font-medium">Technologies</label>
            <input type="text" name="technologies" id="technologies" value="{{ $project->technologies }}" class="w-full rounded p-2 dark:bg-gray-700">
        </div>
        <div class="mb-4">
            <label for="project_url" class="block text-sm font-medium">Project URL</label>
            <input type="url" name="project_url" id="project_url" value="{{ $project->project_url }}" class="w-full rounded p-2 dark:bg-gray-700">
        </div>
        <div class="mb-4">
            <label for="screenshot" class="block text-sm font-medium">Screenshot</label>
            <input type="file" name="screenshot" id="screenshot" class="w-full">
            @if($project->screenshot)
                <img src="{{ asset('storage/'.$project->screenshot) }}" alt="Screenshot" class="mt-2 w-32 rounded">
            @endif
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update Project</button>
    </form>
</div>
@endsection
