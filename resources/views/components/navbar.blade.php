<nav aria-label="secondary" x-data="{ open: false }"
    class="sticky top-0 z-20 flex items-center justify-between px-4 py-4 transition-transform duration-500 bg-white sm:px-6 dark:bg-darker"
    :class="{
        '-translate-y-full': scrollingDown,
        'translate-y-0': scrollingUp,
    }">

<div class="z-50 hidden max-w-4xl border-2 rounded-md border-light sm:flex item-start">

    <a href="">
    <x-application-logo aria-hidden="true" class="w-16 h-16" />
    </a>
</div>


<div class="hidden max-w-4xl mx-auto border-2 rounded-md border-light sm:flex item-start">

    <div x-data="{ dropdownOpen: false }" class="relative">


        <x-input-with-icon-wrapper>

            <x-slot name="icon">
                <x-heroicon-o-search class="w-6 h-6"/>
            </x-slot>
            <x-input  withicon type="text" @click=" dropdownOpen=true" class="border rounded-md border-darker" placeholder="ابحث" dir="auto"/>
        </x-input-with-icon-wrapper>

        <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 z-10 w-full h-full"></div>

        <div x-show="dropdownOpen" class="absolute left-0 right-0 z-20 w-full mt-2 overflow-hidden bg-white rounded-md shadow-xl dark:bg-dark dark:text-light">
          <a href="#" class="block px-4 py-2 text-sm border-b hover:bg-gray-200">small <span class="text-gray-600">(640x426)</span></a>
          <a href="#" class="block px-4 py-2 text-sm border-b hover:bg-gray-200">medium <span class="text-gray-600">(1920x1280)</span></a>
          <a href="#" class="block px-4 py-2 text-sm border-b hover:bg-gray-200">large <span class="text-gray-600">(2400x1600)</span></a>
        </div>
      </div>
</div>
    <div class="flex items-center gap-3">

        <x-button type="button" class="md:hidden" iconOnly variant="secondary" srText="Toggle dark mode"
            @click="toggleTheme">
            <x-heroicon-o-moon x-show="!isDark" aria-hidden="true" class="w-6 h-6" />
            <x-heroicon-o-sun x-show="isDark" aria-hidden="true" class="w-6 h-6" />
        </x-button>
    </div>

    <div class="flex items-center gap-3">
        <x-button type="button" class="hidden md:inline-flex" iconOnly variant="secondary" srText="Toggle dark mode"
            @click="toggleTheme">
            <x-heroicon-o-moon x-show="!isDark" aria-hidden="true" class="w-6 h-6" />
            <x-heroicon-o-sun x-show="isDark" aria-hidden="true" class="w-6 h-6" />
        </x-button>
        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                <button
                    class="flex items-center p-2 text-sm font-medium text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none focus:ring focus:ring-purple-500 focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark-eval-1 dark:text-gray-400 dark:hover:text-gray-200">

                    @auth

                    <div>{{ Auth::user()->name }}</div>

                    @endauth
                    <div class="ml-1">
                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>
            </x-slot>

            <x-slot name="content">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
    </div>
</nav>

<!-- Mobile bottom bar -->
<div class="fixed inset-x-0 bottom-0 z-20 flex items-center justify-between px-4 py-4 transition-transform duration-500 bg-white sm:px-6 md:hidden dark:bg-dark-eval-1"
    :class="{
        'translate-y-full': scrollingDown,
        'translate-y-0': scrollingUp,
    }">
    <x-button type="button" iconOnly variant="secondary" srText="Search">
        <x-heroicon-o-search aria-hidden="true" class="w-6 h-6" />
    </x-button>

    <a href="{{ route('dashboard') }}">
        <x-application-logo aria-hidden="true" class="w-10 h-10" />
        <span class="sr-only">K UI</span>
    </a>

    <x-button type="button" iconOnly variant="secondary" srText="Open main menu"
        @click="isSidebarOpen = !isSidebarOpen">
        <x-heroicon-o-menu x-show="!isSidebarOpen" aria-hidden="true" class="w-6 h-6" />
        <x-heroicon-o-x x-show="isSidebarOpen" aria-hidden="true" class="w-6 h-6" />
    </x-button>
</div>
