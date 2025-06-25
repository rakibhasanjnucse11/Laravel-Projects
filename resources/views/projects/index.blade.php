@extends('layouts.app')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($projects as $project)
        <div class="bg-white dark:bg-gray-800 p-4 rounded shadow">
            <h2 class="text-xl font-semibold">{{ $project->title }}</h2>
            <p class="text-sm">{{ $project->description }}</p>
            <a href="{{ $project->project_url }}" class="text-blue-600 dark:text-blue-400" target="_blank">View</a>
        </div>
    @endforeach
</div>
@endsection
