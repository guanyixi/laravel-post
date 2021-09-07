@props(['post'])

<div class="p-4">
    <div class="h-full shadow hover:shadow-lg rounded-lg overflow-hidden bg-white flex">
        <a style="flex:0 0 50%" href="/post/{{$post->slug}}">
            <img class="w-full" src="{{$post->featured_image}}" alt="">
        </a>
        <div class="px-12 py-4 flex-grow flex items-center">
            <div class="w-full">
                <div class="flex items-center justify-between mb-4">
                    <div class="text-sm text-gray-600">{{date_format(date_create($post->published_at),"M j, Y")}}</div>
                    <a class="inline-block mr-4 rounded-lg py-1 px-3 bg-primary-300 hover:bg-primary-400 text-white hover:text-white text-xs font-semibold" href="/?category={{$post->category->slug}}">{{$post->category->name}}</a>
                </div>
                <h1><a class="text-primary-500" href="/post/{{$post->slug}}">{{$post->title}}</a></h1>
                <a class="flex items-center" href="/?author={{$post->author->name}}">
                    <img width="38" height="38" class="rounded-full hover:shadow mr-3" src="{{$post->author->avatar}}" alt="{{$post->author->first_name}} {{$post->author->last_name}}">
                    <span class="text-sm">{{$post->author->first_name}} {{$post->author->last_name}}</span>
                </a>
                <p class="mt-8">{{$post->excerpt}}.. <a class="italic" href="/post/{{$post->slug}}">read more >></a></p>
            </div>
        </div>
    </div>
</div>