<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $profile->name }}'s Portfolio</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 text-gray-800">
    <header class="bg-blue-600 text-white py-6 text-center">
        <h1 class="text-4xl font-bold">{{ $profile->name }}</h1>
        <p>{{ $profile->bio }}</p>
    </header>
    <main class="max-w-4xl mx-auto p-8">
        <h2 class="text-2xl font-semibold mb-4">Projects</h2>
        @foreach ($projects as $project)
            <div class="mb-6">
                <h3 class="text-xl font-bold">{{ $project->title }}</h3>
                <p>{{ $project->description }}</p>
                <p><strong>Technologies:</strong> {{ $project->technologies }}</p>
                <a href="{{ $project->url }}" class="text-blue-500 hover:underline">View Project</a>
            </div>
        @endforeach
    </main>
</body>
</html>
