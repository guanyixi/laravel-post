<x-app-layout>

    <x-slot name="header"><h1 class="text-white mb-0">Edit Posts</h1></x-slot>

    <div class="h-full flex items-center py-4">
        <div class="bg-white w-full container mx-auto md:flex rounded-lg lg:py-16 px-6 lg:px-12">

            <x-dashboard-nav/>

            <main class="flex-1">
        
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Title
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                   <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($posts as $post)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="">{{$post->id}}</div>
                                    </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                    <div class=""><a href="/post/{{$post->slug}}">{{$post->title}}</a></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="py-1 px-3 inline-block rounded-full font-medium text-xs text-center text-white {{$post->status->name == 'publish' ? 'bg-accent-600' : 'bg-gray-700'}}">{{$post->status->name == 'publish' ? 'Published' : 'Draft'}}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right font-medium">
                                        <div class="flex">
                                            <a href="/dashboard/post/{{$post->id}}/edit" class="text-accent-600 hover:text-accent-900 pr-8">Edit</a>
                                            <form method="POST" action="/dashboard/post/{{$post->id}}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-gray-600 hover:text-gray-900">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                    </div>
                </div>
  
            </main>
            
        </div>
    </div>
</x-app-layout>