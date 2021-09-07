<div class="px-4 lg:px-12 justify-center lg:flex items-center">

    <form class="mr-3 mb-2 lg:mb-0" action="#" method="GET">
        @if(request('category'))
            <input type="hidden" name="category" value="{{request('category')}}">
        @endif
        <input class="w-56 font-primary bg-transparent border border-gray-300 focus:outline-none focus:border-gray-400 focus:shadow rounded-lg px-4 py-2 text-sm" type="search" name="search" placeholder="Search Keywords" value="{{request('search')}}">
    </form>

    <x-dropdown align="left" width="56">    
        <x-slot name="trigger">
            <div class="w-56 relative border border-gray-300 py-2 px-4 rounded-lg overflow-visible">
                <button class="flex items-center justify-between  w-full">
                    <span class="mr-2">{{isset($currentCategory) ? $currentCategory->name : 'Categories'}}</span>
                    <x-icons.arrow-down></x-icons.arrow-down>
                </button>
            </div>
        </x-slot>

        <x-slot name="content">
            <div class="my-1">
                <a class="text-gray-800 font-primary block text-sm hover:text-green-700 px-3 py-2 hover:bg-light text-sm" href="/">All</a>
            </div>
            @foreach($categories as $category)
            <div class="my-1" id="cat-{{$category->id}}">
                <a class="text-gray-800 font-primary block text-sm hover:text-green-700 px-3 py-2 hover:bg-light text-sm {{ Request::get('category') == $category->slug ? 'bg-light text-primary-500' : ''}}" href="/?category={{$category->slug}}&{{http_build_query(request()->except('category', 'page'))}}">
                    {{$category->name}}
                </a>
            </div>
            @endforeach
        </x-slot>
    </x-dropdown>

</div>

