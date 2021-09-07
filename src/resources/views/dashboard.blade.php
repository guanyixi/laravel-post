<x-app-layout>
    <x-slot name="header">
        <h1 class="mb-0 text-white">
            {{ __('Dashboard') }}
        </h1>
    </x-slot>

    <div class="h-full flex items-center py-4">
        <div class="bg-white w-full container mx-auto md:flex rounded-lg lg:py-16 px-6 lg:px-12">
            <x-dashboard-nav/>

            <main class="flex-1">
                <div class="text-9xl my-32 font-bold text-center text-gray-100">DASHBOARD</div>
            </main>
        </div>
    </div>
</x-app-layout>
