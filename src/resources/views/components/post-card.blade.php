@props(['post'])

<div {{$attributes->merge(['class'=>'p-4'])}}>
    <div class="h-full shadow hover:shadow-lg rounded-lg overflow-hidden bg-white relative">
        <div class="absolute -top-0.5 left-0 w-full text-right">
            <a class="inline-block mr-4 rounded-b-lg py-1 px-3 bg-primary-300 hover:bg-primary-400 text-white hover:text-white text-xs font-semibold" href="/?category={{$post->category->slug}}">{{$post->category->name}}</a>
        </div>
        <a href="/post/{{$post->slug}}">
            <img src="{{$post->featured_image}}" alt="">
        </a>
        <div class="px-8 pt-6 pb-8 relative">
            <div class="mb-2 text-sm text-gray-600">{{date_format(date_create($post->published_at),"M j, Y")}}</div>
            <h2><a class="text-primary-500" href="/post/{{$post->slug}}">{{$post->title}}</a></h2>
            <a class="flex items-center" href="/?author={{$post->author->name}}">
                <img width="38" height="38" class="rounded-full hover:shadow mr-3" src="{{$post->author->avatar}}" alt="{{$post->author->first_name}} {{$post->author->last_name}}">
                <span class="text-sm">{{$post->author->first_name}} {{$post->author->last_name}}</span>
            </a>
        </div>
    </div>
</div>