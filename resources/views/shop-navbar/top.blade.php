<div class="flex w-full dark:bg-darker">

    <div class="flex relative justify-between w-full px-2 mx-auto bg-yellow-400 sm:px-8 dark:bg-darker ">


        <ul class="flex items-center justify-end ">
            <li dir="ltr" class="p-2 border-l ">

                <x-dashborade.backdrop>
                    <x-slot name="button">

                <x-button class=" sm:hidden" variant="gosit" iconOnly="true">
                    <x-heroicon-s-menu class="w-5 h-5 text-primary-50"/>
                 </x-button>
                    </x-slot>
                    <x-slot name="content">
                        @foreach ($depts as $d)
                            <x-cards.card-menu :bottomnote="$d->itemscount().'عنصر'" :title="$d->name" :discrip="$d->note"
                                :href="route('search',['dept'=>$d->id])"
                                >
                            </x-cards.card-menu>
                        @endforeach
                    </x-slot>
                </x-dashborade.backdrop>
            </li>
            <li class="p-2 border-l">
                      <button aria-hidden="true" class="relative focus:outline-none"  @click="toggleTheme">
                <div
                    class="w-8 h-4 transition rounded-full outline-none sm:w-12 sm:h-6 bg-primary-50 dark:bg-primary-lighter">
                </div>
                <div class="absolute top-0 left-0 inline-flex items-center justify-center w-4 h-4 transition-all duration-150 transform scale-110 rounded-full shadow-sm sm:w-6 sm:h-6"
                    :class="{ 'translate-x-0 -translate-y-px  bg-white text-primary-dark': !isDark, 'translate-x-6 text-primary-100 bg-primary-darker': isDark }">
                    <svg x-show="!isDark" class="w-2 h-2 sm:w-4 sm:h-4" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                    <svg x-show="isDark" class="w-2 h-2 md:w-4 md:h-4" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                    </svg>
                </div>
            </button>
    </li>
            <li class="flex p-2 border-l">

                <x-button variant="gosit" iconOnly="true" href="{{ route('profile') }}">
                    <x-bi-person class="w-4 h-4 sm:w-6 sm:h-6"/>

                </x-button>
            </li>
            <li class="flex p-2 border-l " >

                <button @click="isMobileMainMenuOpen = !isMobileMainMenuOpen" class="p-1 transition-colors duration-200 rounded-md text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark md:hidden focus:outline-none focus:ring">
                    <span class="sr-only">Open main manu</span>
                    <span aria-hidden="true">
                      <svg
                        class="w-8 h-8"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                      </svg>
                    </span>
                  </button>


                  <div class="border-b md:hidden fixed top-16 inset-x-0 h-64 border rounded-md overflow-y-scroll dark:border-primary-darker" x-show="isMobileMainMenuOpen" @click.away="isMobileMainMenuOpen = false">
                    <nav aria-label="Main" class="px-2 overflow-y-scroll py-4 space-y-2">
                        <!-- Dashboards links -->

                        <div x-data="{ isActive: true, open: true}">
                            <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                            <a href="{{ route('home') }}"  class="flex items-center p-2 text-primary-50 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary  @if(request()->routeIs('shop')) bg-primary dark:bg-primary @endif"
                                role="button" aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
                                <span aria-hidden="true">
                  <svg
                    class="w-5 h-5"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                    />
                  </svg>
                </span>
                                <span class="ml-2 text-sm"> الرئيسية </span>

                            </a>
                        </div>

                        <!-- Components links -->
                        <div x-data="{ isActive: false, open: false }">
                            <!-- active classes 'bg-primary-100 dark:bg-primary' -->
                            <a href="#" @click="$event.preventDefault(); open = !open" class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary" :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }"
                                role="button" aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
                                <span aria-hidden="true">
                  <svg
                    class="w-5 h-5"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"
                    />
                  </svg>
                </span>
                                <span class="ml-2 text-sm"> Components </span>
                                <span aria-hidden="true" class="ml-auto">
                  <!-- active class 'rotate-180' -->
                  <svg
                    class="w-4 h-4 transition-transform transform"
                    :class="{ 'rotate-180': open }"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                  </svg>
                </span>
                            </a>
                            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="Components">
                                <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                                <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                                <a href="#" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                  Alerts (soon)
                </a>
                                <a href="#" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                  Buttons (soon)
                </a>
                                <a href="#" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                  Cards (soon)
                </a>
                                <a href="#" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                  Dropdowns (soon)
                </a>
                                <a href="#" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                  Forms (soon)
                </a>
                                <a href="#" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                  Lists (soon)
                </a>
                                <a href="#" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                  Modals (soon)
                </a>
                            </div>
                        </div>

                        <!-- Pages links -->
                        <div x-data="{ isActive: false, open: false }">
                            <!-- active classes 'bg-primary-100 dark:bg-primary' -->
                            <a href="#" @click="$event.preventDefault(); open = !open" class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary" :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }"
                                role="button" aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
                                <span aria-hidden="true">
                  <svg
                    class="w-5 h-5"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"
                    />
                  </svg>
                </span>
                                <span class="ml-2 text-sm"> Pages </span>
                                <span aria-hidden="true" class="ml-auto">
                  <!-- active class 'rotate-180' -->
                  <svg
                    class="w-4 h-4 transition-transform transform"
                    :class="{ 'rotate-180': open }"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                  </svg>
                </span>
                            </a>
                            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="Pages">
                                <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                                <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                                <a href="pages/blank.html" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                  Blank
                </a>
                                <a href="pages/404.html" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                  404
                </a>
                                <a href="pages/500.html" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                  500
                </a>
                                <a href="#" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                  Profile (soon)
                </a>
                                <a href="#" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                  Pricing (soon)
                </a>
                                <a href="#" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                  Kanban (soon)
                </a>
                                <a href="#" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                  Feed (soon)
                </a>
                            </div>
                        </div>

                        <!-- Authentication links -->
                        <div x-data="{ isActive: false, open: false}">
                            <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                            <a href="#" @click="$event.preventDefault(); open = !open" class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary" :class="{'bg-primary-100 dark:bg-primary': isActive || open}"
                                role="button" aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
                                <span aria-hidden="true">
                  <svg
                    class="w-5 h-5"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                    />
                  </svg>
                </span>
                                <span class="ml-2 text-sm"> Authentication </span>
                                <span aria-hidden="true" class="ml-auto">
                  <!-- active class 'rotate-180' -->
                  <svg
                    class="w-4 h-4 transition-transform transform"
                    :class="{ 'rotate-180': open }"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                  </svg>
                </span>
                            </a>
                            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" aria-label="Authentication">
                                <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                                <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                                <a href="auth/register.html" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                  Register
                </a>
                                <a href="auth/login.html" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                  Login
                </a>
                                <a href="auth/forgot-password.html" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                  Forgot Password
                </a>
                                <a href="auth/reset-password.html" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                  Reset Password
                </a>
                            </div>
                        </div>

                        <!-- Layouts links -->
                        <div x-data="{ isActive: false, open: false}">
                            <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                            <a href="#" @click="$event.preventDefault(); open = !open" class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary" :class="{'bg-primary-100 dark:bg-primary': isActive || open}"
                                role="button" aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
                                <span aria-hidden="true">
                  <svg
                    class="w-5 h-5"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"
                    />
                  </svg>
                </span>
                                <span class="ml-2 text-sm"> Layouts </span>
                                <span aria-hidden="true" class="ml-auto">
                  <!-- active class 'rotate-180' -->
                  <svg
                    class="w-4 h-4 transition-transform transform"
                    :class="{ 'rotate-180': open }"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                  </svg>
                </span>
                            </a>
                            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" aria-label="Layouts">
                                <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                                <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                                <a href="layouts/two-columns-sidebar.html" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                  Two Columns Sidebar
                </a>
                                <a href="layouts/mini-plus-one-columns-sidebar.html" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                  Mini + One Columns Sidebar
                </a>
                                <a href="layouts/mini-column-sidebar.html" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                  Mini Column Sidebar
                </a>
                            </div>
                        </div>
                    </nav>
                </div>

            </li>
            <li class="p-2">
                <div class="flex items-center ml-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>jjj</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </li>
        </ul>

        <ul class=" items-center hidden sm:flex justify-start ">
            <li class="flex p-2 ">
                <x-nav-link :href="route('home')"> الرئيسية
                    <x-heroicon-s-home class="h-4 mx-2 w-4"/>
                </x-nav-link>
            </li>
            <li class="flex p-2 ">
                <x-nav-link :href="route('contact')"> تواصل معنا
                    <x-heroicon-s-phone class="h-4 mx-2 w-4"/>
                </x-nav-link>
            </li>
            <li class="flex p-2 ">
                <x-nav-link :href="route('aboutus')"> من نحن
                    <x-bi-info class="h-6  w-6"/>
                </x-nav-link>
            </li>
        </ul>
        <ul class="flex items-center justify-start bg-info">

            <li class="flex p-2 ">

                <x-button variant="gosit" iconOnly="true" href="{{ route('profile') }}">
                    <x-bi-person class="w-4 h-4 sm:w-6 sm:h-6"/>

                </x-button>
            </li>
        </ul>

    </div>

</div>
