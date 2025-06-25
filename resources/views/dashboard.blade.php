@extends('layouts.app')

@section('content')
<div class="container mx-auto py-12 px-6">
    <section class="text-center mb-12">
        <h1 class="text-4xl font-bold mb-4">
            {{ auth()->user()->name }}'s Dashboard!
        </h1>
    </section>

    <section class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="rounded-lg shadow-md p-6 transition-colors duration-300 bg-white dark:bg-gray-800 hover:shadow-lg">
            <h3 class="text-xl font-bold mb-2">
                <a href="{{ route('projects.index') }}" class="text-blue-600 hover:underline">
                    📁 Manage Projects
                </a>
            </h3>
            <p class="text-sm text-gray-600 dark:text-gray-300">Add, edit, or remove your projects.</p>
        </div>

        <div class="rounded-lg shadow-md p-6 transition-colors duration-300 bg-white dark:bg-gray-800 hover:shadow-lg">
            <h3 class="text-xl font-bold mb-2">
                <a href="{{ route('profile.edit') }}" class="text-blue-600 hover:underline">
                    📝 Edit Profile
                </a>
            </h3>
            <p class="text-sm text-gray-600 dark:text-gray-300">Update your CV and personal details.</p>
        </div>

        <div class="rounded-lg shadow-md p-6 transition-colors duration-300 bg-white dark:bg-gray-800 hover:shadow-lg">
            <h3 class="text-xl font-bold mb-2">
                <a href="{{ route('portfolio.show', auth()->user()->name) }}" class="text-blue-600 hover:underline">
                    🌐 View My Portfolio
                </a>
            </h3>
            <p class="text-sm text-gray-600 dark:text-gray-300">See your public portfolio.</p>
        </div>
    </section>

    <section class="mt-12 rounded-lg shadow-md p-6 transition-colors duration-300 bg-white dark:bg-gray-800">
        <h2 class="text-2xl font-bold mb-4">🔍 Quick Summary</h2>
        <ul class="list-disc pl-6 space-y-2">
            <li><strong>Projects:</strong> {{ auth()->user()->projects->count() }}</li>
            <li><strong>Email:</strong> {{ auth()->user()->email }}</li>
        </ul>
    </section>
</div>
@endsection
