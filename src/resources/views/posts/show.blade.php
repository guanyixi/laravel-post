<x-app-layout>

    <x-slot name="header"></x-slot>

    <div class="h-full flex items-center py-4">
        <div class="bg-white container mx-auto rounded-lg lg:py-16">
            <div class="lg:px-16 lg:flex">
                <div class="lg:pr-16 lg:w-2/5">
                    <img class="rounded-lg" src="{{$post->featured_image}}" alt="">
                </div>
                <div class="px-8 py-12 lg:p-0 lg:w-3/5">

                    <div class="flex items-center justify-between mb-5">
                        <div class="text-sm text-gray-600">{{date_format(date_create($post->published_at),"M j, Y")}}</div>
                        <a class="inline-block mr-4 rounded-lg py-1 px-3 bg-gray-700 text-white text-xs font-semibold" href="/?category={{$post->category->slug}}">{{$post->category->name}}</a>
                    </div>

                    <h1>{{$post->title}}</h1>

                    <a class="flex items-center mb-4" href="/?author={{$post->author->name}}">
                        <img width="38" height="38" class="rounded-full hover:shadow mr-3" src="{{$post->author->avatar}}" alt="{{$post->author->first_name}} {{$post->author->last_name}}">
                        <span class="text-sm">{{$post->author->first_name}} {{$post->author->last_name}}</span>
                    </a>

                    <div>{!!$post->body!!}</div>

                    @auth
                    <form method="POST" action="/post/{{$post->slug}}/comments" class="mt-8">
                        @csrf
                        <header class="flex items-center">
                            <img src="{{Auth::user()->avatar}}" alt="" class="w-12 h-12 rounded-full">
                            <h2 class="ml-4 mb-0">Leave a comment</h2>
                        </header>

                        <div class="mt-4">
                            <textarea name="body" id="" rows="6" class="w-full text-sm focus:ourline-none focus:rignt border border-gray-200 rounded-lg" placeholder="Something important to say" required></textarea>
                            @error('body')
                            <span class="text-sm text-tertiary-600">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="flex justify-end mt-2">
                            <x-button-submit-gray>
                                Submit
                            </x-button-submit-gray>
                        </div>

                    </form>
                        
                    @else
                        
                    <a href="/login">Login</a> to leave a comment

                    @endauth


                    @if(count($post->comments) === 0)
                    <p>0 comment</p>
                    @else
                    <section class="mt-8">
                        <h2>Comments:</h2>
                        @foreach($post->comments as $comment)
                            <x-post-comment :comment="$comment"></x-post-comment>
                        @endforeach
                    </section>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>