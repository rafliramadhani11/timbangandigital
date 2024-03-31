<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 ">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 ">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                    </svg>
                </button>
                <x-chart-logo />

                <span class="self-center text-xl font-semibold text-gray-700 sm:text-2xl whitespace-nowrap ">Timbangan Digital</span>

            </div>
            <div class="flex items-center">
                <div class="flex items-center ms-3">
                    <div>
                        <!-- DROPDOWN PROFILE -->
                        <button type="button" class="text-gray-500 mx-5
                            hover:bg-gray-200  rounded-lg text-sm p-1.5 transition duration-200" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <span class="sr-only">Open user menu</span>
                            <div class="relative w-8 h-8 overflow-hidden bg-gray-100 rounded-full cursor-pointer " type="button">
                                <svg class="absolute w-8 h-8 text-gray-400" fill="currentColor" viewBox="0 0 20 16" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </button>
                    </div>
                    <!-- Dropdown menu -->
                    <div id="dropdown-user" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 ">
                        @cannot('admin')
                        <div class="px-4 py-3 text-sm text-gray-900 ">
                            <div>Selamat Datang !!</div>
                            <div class="font-medium truncate">{{ $user->name }}</div>
                        </div>
                        @endcan
                        @can('admin')
                        <div class="px-4 py-3 text-sm text-gray-900 ">
                            <div>Selamat Datang !!</div>
                            <div class="font-medium truncate">{{ $user_nav->name }}</div>
                        </div>
                        @endcan
                        <!-- USER -->
                        @cannot('admin')
                        <ul class="py-2 text-sm text-gray-700 " aria-labelledby="avatarButton">
                            <li>
                                <a href="{{ route('user.index') }}" class="block px-4 py-2 mx-3 my-1 rounded-md hover:bg-gray-100 font-semibold ">Dashboard</a>
                            </li>
                            <li>
                                <a href="{{ route('user.show', $user->username) }}" class="block px-4 py-2 mx-3 my-2 rounded-md hover:bg-gray-100 ">Profile</a>
                            </li>

                            <li>
                                <form action="{{ route('user.logout') }}" method="post">
                                    @csrf
                                    <button class="px-4 text-center text-white font-semibold w-[9.5rem] py-2 mx-3  rounded-lg shadow-md bg-red-500 ">
                                        Sign Out
                                    </button>
                                </form>
                            </li>
                        </ul>
                        @endcannot
                        <!-- ----------------------- -->
                        <!-- ADMIN -->
                        @can('admin')
                        <ul class="py-2 text-sm text-gray-700 " aria-labelledby="avatarButton">
                            <li>
                                <a href="{{ route('admin.index') }}" class="block px-4 py-2 mx-3 my-1 rounded-md hover:bg-gray-100 ">Dashboard</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.users') }}" class="block px-4 py-2 mx-3 my-1 rounded-md hover:bg-gray-100 ">All Users</a>
                            </li>
                            <li>
                                <form action="{{ route('admin.logout') }}" method="post">
                                    @csrf
                                    <button class="px-4 w-[9.5rem] py-2 mx-3 my-1 font-semibold rounded-lg text-center bg-red-500 text-white ">
                                        Sign Out
                                    </button>
                                </form>
                            </li>
                        </ul>
                        @endcan
                        <!-- ----------------------- -->
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
</nav>
@include('partials.sidebar')
</div>