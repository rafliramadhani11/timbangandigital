<!-- ADMIN -->
<ul class="pb-2 space-y-2">
    <span class="px-3 text-xs font-semibold tracking-wide text-slate-500 text-muted ">ADMINISTRATOR</span>
    <li class="mt-2">
        <a href="{{ route('admin.index') }}" class="flex items-center p-2 text-sm text-gray-900 hover:font-semibold rounded-lg hover:bg-gray-100 group
                        {{ Request::is('dashboard/admin')? 'bg-gray-100 font-semibold ' : '' }}">
            <svg class="w-6 h-6 text-gray-400 transition duration-75 svg-icon group-hover:text-gray-900
                            {{ Request::is('dashboard/admin')? 'text-gray-900 ' : '' }}" fill="currentColor" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <path d="M752.4 329.6c-6.7-6.4-15.9-9.5-25.2-8.6-9.3 1-17.7 5.9-23 13.5L601.4 480.9l-75-237.9c-3.7-11.6-13.5-20.1-25.4-22-11.9-1.9-23.9 3-31 12.8L362.1 382.1l-38.2-41.7a31.934 31.934 0 0 0-43.5-3.4l-114 90.6c-13.8 11-16.1 31.2-5.1 45 11 13.8 31.2 16.1 45 5.1l90.6-72 44.5 48.6c6.5 7.1 15.8 10.8 25.4 10.3 9.6-0.5 18.5-5.3 24.1-13.1l93.6-128.7L559.9 562c3.6 11.6 13.6 20.1 25.6 22 1.6 0.3 3.3 0.4 4.9 0.4 10.3 0 20.1-5 26.2-13.6l118.7-169.3 80.2 76.2c12.8 12.1 33 11.6 45.2-1.2 12.1-12.8 11.6-33-1.2-45.2L752.4 329.6z" />
                <path d="M868.6 96.7H155.3C108.3 96.7 70 135 70 182v443.6c0 47 38.3 85.3 85.3 85.3H480v152.3H183c-17.7 0-32 14.3-32 32s14.3 32 32 32h658c17.7 0 32-14.3 32-32s-14.3-32-32-32H544V710.9h324.7c47 0 85.2-38.2 85.2-85.3V182c0-47-38.3-85.3-85.3-85.3z m21.3 529c0 11.8-9.6 21.3-21.3 21.3H514.4c-0.8-0.1-1.6-0.1-2.4-0.1s-1.6 0-2.4 0.1H155.3c-11.8 0-21.3-9.6-21.3-21.3V182.1c0-11.8 9.6-21.3 21.3-21.3v-0.1h713.3c11.8 0 21.3 9.6 21.3 21.3v443.7z" />
            </svg>
            <span class="ml-3" sidebar-toggle-item>Dashboard</span>
        </a>
    </li>
    <li>
        <a href="{{ route('admin.users') }}" class="flex items-center p-2 text-sm text-gray-900 hover:font-semibold rounded-lg hover:bg-gray-100 group
                        {{ Request::is('dashboard/admin/users*')? 'bg-gray-100 font-semibold ' : '' }}
                        ">
            <svg class="w-6 h-6 text-gray-400 transition duration-75 svg-icon group-hover:text-gray-900
                            {{ Request::is('dashboard/admin/users*')? 'text-gray-900 ' : '' }}" fill="currentColor" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <path d="M947.2 921.6h-563.2c-42.3424 0-76.8-34.4576-76.8-76.8 0-2.4576 0.5632-60.928 47.3088-118.528 26.88-33.0752 63.5392-59.2896 108.9536-77.9264 54.8352-22.528 122.88-33.8944 202.1376-33.8944s147.2512 11.4176 202.1376 33.8944c45.4144 18.6368 82.0736 44.8512 108.9536 77.9264 46.7968 57.6 47.3088 116.0704 47.3088 118.528 0 42.3424-34.4576 76.8-76.8 76.8zM358.4 844.9536a25.6 25.6 0 0 0 25.6 25.4464h563.2a25.6 25.6 0 0 0 25.6-25.4464c-0.0512-1.792-1.6384-45.824-37.8368-88.7808-49.8688-59.2384-143.0016-90.5216-269.3632-90.5216s-219.4944 31.3344-269.3632 90.5216c-36.1984 43.008-37.7856 86.9888-37.8368 88.7808zM665.6 563.2c-112.9472 0-204.8-91.8528-204.8-204.8s91.8528-204.8 204.8-204.8 204.8 91.8528 204.8 204.8-91.8528 204.8-204.8 204.8z m0-358.4c-84.6848 0-153.6 68.9152-153.6 153.6s68.9152 153.6 153.6 153.6 153.6-68.9152 153.6-153.6-68.9152-153.6-153.6-153.6zM230.4 921.6h-153.6C34.4576 921.6 0 887.1424 0 844.8c0-1.8944 0.4096-47.4624 33.9456-92.16 19.3536-25.856 45.7728-46.2848 78.4896-60.8256 39.1168-17.408 87.4496-26.2144 143.616-26.2144 9.1648 0 18.2272 0.256 26.9824 0.7168a25.6 25.6 0 0 1-2.7136 51.1488 465.92 465.92 0 0 0-24.2176-0.6144c-199.3728 0-204.6464 121.8048-204.8 128.1536a25.6 25.6 0 0 0 25.6 25.4464h153.6a25.6 25.6 0 0 1 0 51.2zM256 614.4c-84.6848 0-153.6-68.9152-153.6-153.6s68.9152-153.6 153.6-153.6 153.6 68.9152 153.6 153.6-68.9152 153.6-153.6 153.6z m0-256c-56.4736 0-102.4 45.9264-102.4 102.4s45.9264 102.4 102.4 102.4 102.4-45.9264 102.4-102.4-45.9264-102.4-102.4-102.4z" fill="" />
            </svg>
            <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
            <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
            <span class="ml-3" sidebar-toggle-item>All Users</span>
        </a>
    </li>
    <li>
        <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 " aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
            <svg class="w-6 h-6 text-gray-400 transition duration-75 svg-icon group-hover:text-gray-900 " xmlns=" http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205 3 1m1.5.5-1.5-.5M6.75 7.364V3h-3v18m3-13.636 10.5-3.819" />
            </svg>

            <span class="flex-1 ml-3 text-left whitespace-nowrap hover:font-semibold">Region</span>
            <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </button>
        <ul id="dropdown-example" class="hidden py-2 space-y-2">
            @foreach ($regions as $region)
            <li>
                <a href="{{ route('admin.region', $region->slug) }}" class="flex items-center p-2 text-base text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100
                                            {{ Request::is('dashboard/admin/regions/'.$region->slug)? 'bg-gray-100  ' : '' }}">
                    {{ $region->name }}
                </a>
            </li>
            @endforeach
        </ul>
    </li>
    <li>
        <form action="{{ route('admin.logout') }}" method="post">
            @csrf
            <button class="w-full px-4 font-semibold py-2 my-1 text-center text-white bg-red-500 rounded-lg shadow-md">
                Sign Out
            </button>
        </form>
    </li>
</ul>
<!-- ------------------------------------------- -->