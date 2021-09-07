<aside class="w-48 flex-shrink-0">
    <ul class="space-y-2">
        <li><a href="/dashboard">Dashboard</a></li>
        @can('admin')
        <li><a href="/dashboard/post/create">Add New Post</a></li>
        <li><a href="/dashboard/posts">Edit Posts</a></li>
        @endcan
    </ul>
</aside>