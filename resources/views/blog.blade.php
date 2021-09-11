<x-app-layout>
    <div class="px-6 pt-24 pb-24 md:p-32 mx-auto">
        <div class="flex flex-col md:flex-row flex-wrap space-x-10">
            @foreach($posts as $post)
                <div class="md:w-1/3">
                    <?php
                    $image = \App\Models\PostImage::where('slug', $post->slug)->orderBy('id', 'desc')->value('path');
                    ?>
                    <div class="bg-white rounded-xl p-4 shadow-lg hover:shadow-2xl transition duration-300 flex-1"
                         style="height: 100%">
                        <a href="{{ route('blog.read', ['slug' => $post->slug]) }}" class="flex flex-col w-full">
                            <img src="{{ 'https://admin.essayflame.com/storage/blog/' . $image }}"
                                 alt="{{ $post->slug }}"
                                 style="width: 100%; height: 200px">
                            <div
                                class="rounded-lg mt-4 mx-auto flex-1" style="width: 100%; height: 200px">
                                <span
                                    class="text-gray-400 text-sm ml-10">{{ $post->updated_at->diffForHumans() }}</span>
                                <h3 class="font-bold ml-10 mt-2 text-xl w-2/3">{{ $post->title }}</h3>
                                <div class="mt-3 ml-10 mt-4 flex flex-row space-x-2">
                                    <span class="lnr lnr-clock"></span> <span
                                        class="text-gray-400 -mt-1">16 min read</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
    @include('includes.footer')
</x-app-layout>
