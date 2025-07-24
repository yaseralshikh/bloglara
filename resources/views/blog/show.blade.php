<x-app-layout>
    <div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="mb-4">
            <img
                src="{{ asset('storage/' . $post->image) }}"
                alt="{{ $post->title }}"
                class="h-20 object-cover rounded-md"
            />
        </div>

        <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $post->title }}</h1>
        <p class="text-sm text-gray-500 mb-6">{{ $post->created_at->format('F d, Y') }}</p>

        <div class="prose max-w-none">
            {!! nl2br(e($post->content)) !!}
        </div>
    </div>
</x-app-layout>