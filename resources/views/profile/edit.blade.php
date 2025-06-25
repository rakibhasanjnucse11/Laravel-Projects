@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white dark:bg-gray-800 p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Complete Your CV</h2>

    {{-- Success message --}}
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PUT')

        <label class="block mb-2">
            Name
            <input type="text" name="name" value="{{ old('name', $user->name) }}"
                required
                class="w-full rounded border px-3 py-2 dark:bg-gray-700 dark:text-white @error('name') border-red-500 @enderror">
        </label>
        @error('name')
            <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
        @enderror

        <label class="block mb-2">
            Email
            <input type="email" name="email" value="{{ old('email', $user->email) }}"
                required
                class="w-full rounded border px-3 py-2 dark:bg-gray-700 dark:text-white @error('email') border-red-500 @enderror">
        </label>
        @error('email')
            <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
        @enderror

        <label class="block mb-2">
            Phone
            <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                class="w-full rounded border px-3 py-2 dark:bg-gray-700 dark:text-white @error('phone') border-red-500 @enderror">
        </label>
        @error('phone')
            <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
        @enderror

        <label class="block mb-2">
            Address
            <input type="text" name="address" value="{{ old('address', $user->address) }}"
                class="w-full rounded border px-3 py-2 dark:bg-gray-700 dark:text-white @error('address') border-red-500 @enderror">
        </label>
        @error('address')
            <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
        @enderror

        <label class="block mb-2">
            Bio
            <textarea name="bio" rows="3"
                class="w-full rounded border px-3 py-2 dark:bg-gray-700 dark:text-white @error('bio') border-red-500 @enderror">{{ old('bio', $user->bio) }}</textarea>
        </label>
        @error('bio')
            <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
        @enderror

        <label class="block mb-2">
            Education
            <textarea name="education" rows="3"
                class="w-full rounded border px-3 py-2 dark:bg-gray-700 dark:text-white @error('education') border-red-500 @enderror">{{ old('education', $user->education) }}</textarea>
        </label>
        @error('education')
            <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
        @enderror

        <label class="block mb-2">
            Experience
            <textarea name="experience" rows="3"
                class="w-full rounded border px-3 py-2 dark:bg-gray-700 dark:text-white @error('experience') border-red-500 @enderror">{{ old('experience', $user->experience) }}</textarea>
        </label>
        @error('experience')
            <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
        @enderror

        <label class="block mb-2">
            Skills
            <textarea name="skills" rows="3"
                class="w-full rounded border px-3 py-2 dark:bg-gray-700 dark:text-white @error('skills') border-red-500 @enderror">{{ old('skills', $user->skills) }}</textarea>
        </label>
        @error('skills')
            <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
        @enderror

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded w-full mt-4 hover:bg-blue-700">
            Save CV
        </button>
    </form>
</div>
@endsection
