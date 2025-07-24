<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Welcome to LaraBlog</h2>
    </x-slot>

    <div class="bg-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">

            {{-- Hero --}}
            <section class="text-center">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Welcome to LaraBlog</h1>
                <p class="text-gray-600 max-w-2xl mx-auto mb-6">Discover amazing articles, tutorials, and insights about web development, Laravel, and modern PHP practices.</p>
                <a href="/blog" class="inline-block px-6 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Browse Articles</a>
            </section>

            {{-- Featured Posts --}}
            <section>
                <h2 class="text-2xl font-bold mb-6">Featured Posts</h2>
                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ([
                        [
                            'image' => 'https://via.placeholder.com/600x400?text=Laravel+Tips',
                            'title' => '10 Laravel Tips to Improve Your Code',
                            'date' => 'May 15, 2023',
                            'length' => '5 min read',
                            'excerpt' => 'Learn how to write cleaner, more efficient Laravel code with these practical tips...',
                            'url' => '/post/10-laravel-tips',
                        ],
                        [
                            'image' => 'https://via.placeholder.com/600x400?text=Eloquent',
                            'title' => 'Mastering Eloquent Relationships',
                            'date' => 'April 28, 2023',
                            'length' => '8 min read',
                            'excerpt' => 'A deep dive into Laravel\'s Eloquent ORM and how to effectively use relationships...',
                            'url' => '/post/mastering-eloquent',
                        ],
                        [
                            'image' => 'https://via.placeholder.com/600x400?text=Livewire',
                            'title' => 'Building Reactive UIs with Livewire',
                            'date' => 'April 10, 2023',
                            'length' => '6 min read',
                            'excerpt' => 'Create dynamic interfaces without writing JavaScript using Laravel Livewire...',
                            'url' => '/post/livewire-guide',
                        ]
                    ] as $post)
                        <div class="bg-gray-100 rounded overflow-hidden shadow hover:shadow-lg transition">
                            <img src="{{ $post['image'] }}" alt="{{ $post['title'] }}" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <div class="text-sm text-gray-500 mb-2 flex justify-between">
                                    <span>{{ $post['date'] }}</span>
                                    <span>{{ $post['length'] }}</span>
                                </div>
                                <h3 class="text-lg font-semibold mb-2">{{ $post['title'] }}</h3>
                                <p class="text-gray-600 text-sm">{{ $post['excerpt'] }}</p>
                                <a href="{{ $post['url'] }}" class="text-indigo-600 hover:underline text-sm mt-2 inline-block">Read More →</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>

            {{-- Categories --}}
            <section>
                <h2 class="text-2xl font-bold mb-4">Browse Categories</h2>
                <div class="flex flex-wrap gap-2">
                    @foreach (['Laravel', 'PHP', 'JavaScript', 'Vue.js', 'Tailwind CSS', 'Testing', 'Deployment', 'Performance'] as $category)
                        <a href="/category/{{ strtolower(str_replace(' ', '-', $category)) }}"
                           class="bg-indigo-100 text-indigo-700 px-4 py-1 rounded-full text-sm hover:bg-indigo-200">
                            {{ $category }}
                        </a>
                    @endforeach
                </div>
            </section>

            {{-- Newsletter --}}
            <section class="bg-indigo-50 p-6 rounded-lg text-center">
                <h3 class="text-xl font-semibold mb-2">Subscribe to our Newsletter</h3>
                <p class="text-gray-600 mb-4">Get the latest articles and news delivered to your inbox every week. No spam, ever.</p>
                <form class="flex justify-center gap-2 max-w-md mx-auto">
                    <input type="email" placeholder="Your email address"
                           class="w-full px-4 py-2 rounded border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-200">
                    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                        Subscribe
                    </button>
                </form>
            </section>

        </div>
    </div>
</x-app-layout>