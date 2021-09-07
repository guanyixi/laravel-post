@props(['comment'])

{{-- First level comment --}}
@if(!$comment->parent_id)
<div class="rounded-lg border border-gray-100 mb-4 bg-light p-6" id="comment-{{$comment->id}}">
    <a href="/?author={{$comment->author->name}}" class="flex items-center mb-3">
        <img class="w-10 h-10 rounded-full mr-2" src="{{$comment->author->avatar}}" alt="">
        <strong>{{$comment->author->first_name . ' ' . $comment->author->last_name}}</strong>
    </a>
    <div>{{$comment->text}}</div>
</div>
@endif

{{-- Second level comment --}}
@if(count($comment->comments))
    @foreach($comment->comments as $secondaryComment)
        <div class="rounded-lg border border-gray-100 mb-4 bg-light p-6 ml-12">
            <a href="/?author={{$secondaryComment->author->name}}" class="flex items-center mb-3">
                <img class="w-10 h-10 rounded-full mr-2" src="{{$secondaryComment->author->avatar}}" alt="">
                <strong>{{$secondaryComment->author->first_name . ' ' . $secondaryComment->author->last_name}}</strong>
            </a>
            <div>{{$secondaryComment->text}}</div>
        </div>
    @endforeach
@endif