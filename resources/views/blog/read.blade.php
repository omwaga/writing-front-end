<x-app-layout>
    <style>
        .post img {
            border-radius: 2%;
            width: 100%;
            height: 400px !important;
        }

        @media screen and (max-width: 720px) {
            .post img {
                height: 200px !important;
            }
        }

        h1 {
            font-size: 2em;
            opacity: 0.9;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        h2 {
            font-size: 1.7em;
            opacity: 0.9;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        h3 {
            font-size: 1.5em;
            opacity: 0.9;
            margin-top: 15px;
            margin-bottom: 15px;
        }

        h4 {
            font-size: 1.3em;
            opacity: 0.9;
            margin-top: 15px;
            margin-bottom: 15px;
        }

        h5 {
            font-size: 1.1em;
            opacity: 0.9;
            margin-top: 15px;
            margin-bottom: 15px;
        }

        h6 {
            font-size: 0.9em;
            opacity: 0.9;
            margin-top: 15px;
            margin-bottom: 15px;
        }

        p {
            line-height: 23px;
            opacity: 0.9;
            letter-spacing: 0.4px;
            margin-top: 10px;
        }

        ul {
            margin-top: 10px;
            list-style-type: disc;
            padding-left: 40px;
        }

        footer ul {
            padding-left: 0px;
        }
    </style>
    <div class="pt-20 md:pt-32 pl-10 md:pl-32 pb-4 flex flex-row pr-5 md:pr-0 post">
        @foreach($post as $p)
            <?php
            $image = \App\Models\PostImage::where('slug', $p->slug)->orderBy('id', 'desc')->value('path');
            ?>
            <div class="mt-4 md:w-2/3">
                <span class="bg-blue-400 uppercase text-white font-bold px-8 rounded">{{ $p->category }}</span>
                <h1 class="mt-2 font-bold text-4xl text-black">{{ $p->title }}</h1>
                <span class="text-sm text-gray-500">Posted on {{ date('d, M Y', strtotime($p->updated_at)) }}</span>
                <img src="{{ 'https://admin.essayflame.com/storage/blog/' . $image }}"
                     alt="{{ $p->slug }}" class="mt-4"
                >
                <div class="mt-4"> {!! $p->content !!}</div>
            </div>
        @endforeach
        <div
            class="w-1/3 h-64 ml-8 mr-8 mt-1/6 sticky top-32 z-10 rounded-lg shadow-lg hover:shadow-2xl bg-gray-50 hidden md:block transition duration-300 bg-white p-4 "
            style="position: -webkit-sticky;">
            <h3 class="text-center border-b px-5 font-bold -mt-2">OUR PRICES</h3>
            <div class="mt-4 leading-loose">
                <p class="flex justify-between text-lg leading-loose"><span>Writing</span><span> $8 - $12 /page </span>
                </p>
                <p class="flex justify-between text-lg leading-loose"><span>Rewriting</span><span>$7 - $10 /page</span>
                </p>
                <p class="flex justify-between text-lg leading-loose"><span>Editing</span><span>$5 - $7 /page</span></p>
            </div>
            <div class="mb-4 mt-4 flex justify-center">
                <a href="{{ route('order-now') }}"
                   class="p-2 px-5 font-bold rounded-2xl text-white bg-green-400 hover:bg-gray-600 transitiion duration-300">Write
                    my paper</a>
            </div>
        </div>
    </div>
    <p class="pl-5 md:pl-32 pb-4 font-bold">Make an order and we will help you figure out how to ace that homework you
        have
        to
        submit.</p>
    <div class="flex justify-center pb-20 -ml-1/3">
        <a href="{{ route('order-now') }}"
           class="p-3 px-10 font-bold rounded-3xl shadow-lg text-white bg-green-400 hover:bg-gray-600 transitiion duration-300">Write
            my paper</a>
    </div>
    @include('includes.footer')
</x-app-layout>
