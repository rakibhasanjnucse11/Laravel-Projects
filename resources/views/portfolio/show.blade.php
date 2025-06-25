@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
        <h1 class="text-2xl font-bold">{{ $user->name }}'s Portfolio</h1>
        <p class="mt-2 text-gray-700 dark:text-gray-300">{{ $profile->bio ?? 'No bio available.' }}</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-6">
            @foreach($projects as $project)
                <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded shadow">
                    <h2 class="font-semibold">{{ $project->title }}</h2>
                    <p class="text-sm">{{ $project->description }}</p>
                    @if($project->project_url)
                        <a href="{{ $project->project_url }}" target="_blank" class="text-blue-600 dark:text-blue-400 underline">Visit Project</a>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
