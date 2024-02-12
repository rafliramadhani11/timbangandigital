<div>
    @include('partials.navbar')
    <div class="flex min-h-screen pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">
        @include('partials.sidebar')
        <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
            <main class="px-4 py-6">

                <livewire:admin.user-table />

            </main>
        </div>
    </div>
</div>
