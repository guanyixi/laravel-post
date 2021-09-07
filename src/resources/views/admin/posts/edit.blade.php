<x-app-layout>

    <x-slot name="header">
        <h1 class="text-white mb-0">Edit Post</h1>
    </x-slot>

    <div class="h-full flex items-center py-4">
        <div class="bg-white w-full container mx-auto md:flex rounded-lg lg:py-16 px-6 lg:px-12">

            <x-dashboard-nav/>

            <main class="flex-1">
                <div class="max-w-4xl mx-auto" >
                    <div class="flex justify-end mb-4">
                        <x-button-link-gray href="/post/{{$post->slug}}">View Post</x-button-link-gray>
                    </div>
                    <form class="border border-gray-200 p-8 rounded-lg" method="POST" action="/dashboard/post/{{$post->id}}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <x-form.input name="title" :value="old('title', $post->title)"/>
                        <x-form.input name="slug" :value="old('slug', $post->slug)"/>
                        <x-form.input name="featured_image" type="file" :value="old('featured_image', $post->featured_image)"/>
                        <img width="200" class="rounded-lg -mt-2 mb-6" src="{{$post->featured_image}}" alt="">
                        <x-form.textarea name="excerpt" row="3">{{old('excerpt', $post->excerpt)}}</x-form.textarea>
                        <x-form.textarea name="body" row="6">{{old('body', $post->body)}}</x-form.textarea>
        
                        <x-form.field>
                            <x-form.label name="category"/>
                            <select class="border border-gray-400 p-2 rounded" name="category_id" id="category">
                                @foreach(\App\Models\Category::all() as $category)
                                <option value="{{$category->id}}" {{old('category_id', $post->category_id) == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                            <x-form.error name="category"/>
                        </x-form.field>
        
                        <x-form.field>
                            <x-button-submit-gray>Update</x-button-submit-gray>
                        </x-form.field>
                    </form>
                </div>
            </main>
            
        </div>
    </div>
</x-app-layout>