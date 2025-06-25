@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-white dark:bg-gray-800 p-8 rounded shadow">
    <h1 class="text-3xl font-bold text-center text-blue-600">{{ $user->name }}'s CV</h1>
    <p class="text-center text-sm text-gray-600 dark:text-gray-400">{{ $user->email }} | {{ $user->phone }} | {{ $user->address }}</p>
    <hr class="my-4">

    <section class="mb-4">
        <h2 class="text-xl font-bold">Bio</h2>
        <p>{{ $user->bio }}</p>
    </section>

    <section class="mb-4">
        <h2 class="text-xl font-bold">Education</h2>
        <p>{{ $user->education }}</p>
    </section>

    <section class="mb-4">
        <h2 class="text-xl font-bold">Experience</h2>
        <p>{{ $user->experience }}</p>
    </section>

    <section>
        <h2 class="text-xl font-bold">Skills</h2>
        <p>{{ $user->skills }}</p>
    </section>

    <a href="{{ route('cv.download') }}" class="bg-green-600 text-white px-4 py-2 rounded mt-4 inline-block">Download as PDF</a>
</div>
@endsection
