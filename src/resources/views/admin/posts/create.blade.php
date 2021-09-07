<x-app-layout>

    <x-slot name="header"><h1 class="text-white mb-0">Add New Post</h1></x-slot>

    <div class="h-full flex items-center py-4">
        <div class="bg-white w-full container mx-auto md:flex rounded-lg lg:py-16 px-6 lg:px-12">

            <x-dashboard-nav/>

            <main class="flex-1">
                <form method="POST" class="max-w-4xl mx-auto border border-gray-200 p-8 rounded-lg" action="/dashboard/post" enctype="multipart/form-data">
                    @csrf
                    <x-form.input name="title"/>
                    <x-form.input name="slug"/>
                    <x-form.input name="featured_image" type="file"/>
                    <x-form.textarea name="excerpt" row="3"/>
                    <x-form.textarea name="body" row="6"/>
    
                    <x-form.field>
                        <x-form.label name="category"/>
                        <select class="border border-gray-400 p-2 rounded" name="category_id" id="category">
                            @foreach(\App\Models\Category::all() as $category)
                            <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                        <x-form.error name="category"/>
                    </x-form.field>
    
                    <x-form.field>
                        <x-button-submit-gray>Publish</x-button-submit-gray>
                    </x-form.field>
                </form>
            </main>
            
        </div>
    </div>
</x-app-layout>