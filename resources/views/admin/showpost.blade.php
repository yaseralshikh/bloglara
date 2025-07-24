<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6 border-b">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">{{ $post->title }}</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">By: {{ $post->user->name }} | {{ $post->created_at->format('d M Y') }}</p>
                </div>
                <div class="px-4 py-5 sm:p-6">
                    <div class="text-gray-700 text-base mb-4">
                        {!! nl2br(e($post->content)) !!}
                    </div>

                    @if ($post->image)
                        <div class="mt-4">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="rounded-md max-w-lg border">
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
