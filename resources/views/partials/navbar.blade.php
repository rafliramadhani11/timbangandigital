<nav class="fixed z-30 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                <button type="button" id="toggleSidebarMobile" aria-expanded="true" aria-controls="sidebar" class="p-2 text-gray-600 rounded cursor-pointer lg:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 dark:focus:bg-gray-700 focus:ring-2 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <svg id="toggleSidebarMobileHamburger" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    </svg>
                    <svg id="toggleSidebarMobileClose" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>

                <x-chart-logo />

                <span class="self-center text-xl font-semibold text-gray-700 sm:text-2xl whitespace-nowrap dark:text-white">Timbangan Digital</span>

            </div>
            <div class="flex items-center ">
                <button id="theme-toggle" type="button" class="text-gray-500 mx-5 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700  dark:focus:ring-gray-700 rounded-lg text-sm p-2.5 transition duration-200">
                    <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <!-- Profile -->
                <div class="relative w-8 h-8 overflow-hidden bg-gray-100 rounded-full cursor-pointer dark:bg-gray-600" data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-start" data-dropdown-placement="bottom-start" type="button">
                    <svg class="absolute w-12 h-12 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <!-- Dropdown menu -->
                <div id="userDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                    @cannot('admin')
                    <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                        <div>Selamat Datang !!</div>
                        <div class="font-medium truncate">{{ $user->name }}</div>
                    </div>
                    @endcan
                    @can('admin')
                    <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                        <div>Selamat Datang !!</div>
                        <div class="font-medium truncate">{{ $user_nav->name }}</div>
                    </div>
                    @endcan
                    <!-- USER -->
                    @cannot('admin')
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="avatarButton">
                        <li>
                            <a href="{{ route('user.index') }}" class="block px-4 py-2 mx-3 my-1 rounded-md hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ route('user.show', $user->username) }}" class="block px-4 py-2 mx-3 my-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
                        </li>

                        <li>
                            <form action="{{ route('user.logout') }}" method="post">
                                @csrf
                                <button class="px-4 text-start w-[9.5rem] py-2 mx-3 my-1 rounded-md hover:bg-red-500 hover:text-white dark:hover:bg-red-500 dark:hover:text-white dark:text-white">
                                    Sign Out
                                </button>
                            </form>
                        </li>
                    </ul>
                    @endcannot
                    <!-- ----------------------- -->
                    <!-- ADMIN -->
                    @can('admin')
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="avatarButton">
                        <li>
                            <a href="{{ route('admin.index') }}" class="block px-4 py-2 mx-3 my-1 rounded-md hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.users') }}" class="block px-4 py-2 mx-3 my-1 rounded-md hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">All Users</a>
                        </li>
                        <li>
                            <form action="{{ route('admin.logout') }}" method="post">
                                @csrf
                                <button class="px-4 text-start w-[9.5rem] py-2 mx-3 my-1 rounded-md hover:bg-red-500 hover:text-white dark:hover:bg-red-500 dark:hover:text-white dark:text-white">
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
</nav>