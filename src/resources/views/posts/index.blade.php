<x-app-layout>

    <x-slot name="header">
        <h1 class="mb-0 text-white">
            @if(!$_SERVER['QUERY_STRING'])
            Welcome to theHub!
            @endif
        </h1>
    </x-slot>

    <div class="container mx-auto">
        @if(!$posts->count())

            {{-- No posts --}}
            <p class="text-white text-center">No posts were found.</p>

        @else
        
        {{-- Has posts --}}
        @if(!$_SERVER['QUERY_STRING'])

                {{-- No filters --}}
                <x-post-featured-card :post="$posts[0]"></x-post-featured-card>

                @if($posts->count() > 1)
                <div class="flex flex-wrap">
                    @foreach($posts->skip(1) as $post)
                    <x-post-card :post="$post" class="md:w-1/2 lg:w-1/3 {{$loop->iteration > 3 ? 'xl:w-1/4' : ''}}"></x-post-card>
                    @endforeach
                </div>
                @endif

        @else

                {{-- Has filters --}}
                <div class="flex flex-wrap">
                    @foreach($posts as $post)
                    <x-post-card :post="$post" class="md:w-1/2 lg:w-1/3 xl:w-1/4"></x-post-card>
                    @endforeach
                </div>

        @endif

        {{$posts->links()}}


        @endif
    </div>


</x-app-layout>