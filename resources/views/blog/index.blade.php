<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">All Articles</h2>
    </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="py-12 bg-white">
                            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach ($posts as $post)
                                    <div class="bg-white rounded-md shadow-sm overflow-hidden">
                                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-64 object-cover rounded-t-md">
                                        <div class="p-4">
                                            <p class="text-sm text-gray-500">{{ $post->created_at->format('M d, Y') }} · {{ Str::wordCount($post->content) / 200 }} min read</p>
                                            <h2 class="font-semibold text-lg mt-2">{{ $post->title }}</h2>
                                            <p class="text-gray-600">{{ Str::limit($post->content, 100) }}</p>
                                            <a href="{{ route('blog.show', $post->slug) }}" class="text-indigo-600 text-sm mt-2 inline-block">Read More →</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="mt-8">
                                {{ $posts->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</x-app-layout>
