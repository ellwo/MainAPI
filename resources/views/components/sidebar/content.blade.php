<x-perfect-scrollbar as="nav" aria-label="main" class="flex flex-col flex-1 gap-4 px-3">
{{--
    <x-sidebar.link title="Dashboard" href="{{ route('dashboard') }}" :isActive="request()->routeIs('dashboard')">
        <x-slot name="icon">
            <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link> --}}


<x-sidebar.link title="Dashboard" href="{{ route('dashboard') }}" :isActive="request()->routeIs('dashboard')">
    <x-slot name="icon">
        <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
    </x-slot>
</x-sidebar.link>

@role('admin')
<x-sidebar.content-admin />
@endrole

<x-sidebar.link title="ادارة منتجاتي" href="{{ route('mange.products',['type'=>'all']) }}" :isActive="request()->routeIs('mange.products')">
    <x-slot name="icon">
        <x-heroicon-o-view-grid class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
    </x-slot>

</x-sidebar.link>
<x-sidebar.link title="ادارة خدماتي المعروضة" href="{{ route('mange.services',['type'=>'all']) }}" :isActive="request()->routeIs('mange.services')">
    <x-slot name="icon">
        <x-heroicon-o-view-grid class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
    </x-slot>

</x-sidebar.link>

<x-sidebar.dropdown title="حسابي " :active="request()->routeIs('profile')">

    <x-slot name="icon" >
        <span aria-hidden="true">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
        </span>
    </x-slot>
    <x-sidebar.sublink href="{{route('profile')}}" title="استعراض " :active="request()->routeIs('profile')">

    </x-sidebar.sublink>


    <x-sidebar.sublink href="{{route('profile.create')}}" title="تعديل البيانات " :active="request()->routeIs('profile')">

    </x-sidebar.sublink>


</x-sidebar.dropdown>

<x-sidebar.dropdown collapsible="true" title="حساباتي التسويقية " :active="request()->routeIs('bussinses')">

    <x-slot name="icon" >
        <x-heroicon-s-collection class="h-5 w-5"/>
    </x-slot>
    @foreach (auth()->user()->bussinses as  $buss)

    <x-sidebar.sublink class="flex space-x-4" href="{{route('b.manage',['username'=>$buss->username])}}" title="{{$buss->name}} " :active="request()->routeIs('b.manage/@'.$buss->username)">

        <x-slot name='icon'>
        <x-heroicon-o-adjustments class="w-5 h-5" />
        </x-slot>


    </x-sidebar.sublink>
    @endforeach

</x-sidebar.dropdown>

<x-sidebar.link title="انشاء حساب تسويقي جديد" href="{{ route('b.create') }}" :isActive="request()->routeIs('b.create')">
    <x-slot name="icon">
        <x-heroicon-o-plus class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
    </x-slot>

</x-sidebar.link>





{{--
<nav aria-label="Main" class="flex-1  py-4 space-y-2  ">
    <!-- Dashboards links -->

    <x-sidebar.link title="Dashboard" href="{{ route('dashboard') }}" :isActive="request()->routeIs('dashboard')">
        <x-slot name="icon">
            <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    <x-sidebar.link title="Dashboard" href="{{ route('dashboard') }}" :isActive="request()->routeIs('dashboard')">
        <x-slot name="icon">
            <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    <div x-data="{ isActive: false, open: false}"


    >
        <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
        <a href="#" @click="$event.preventDefault(); open = !open"
            class="flex items-center p-2 text-primary-onprimary transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
            :class="{'bg-primary dark:bg-primary': isActive || open}" role="button"
            aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
            <span aria-hidden="true">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
            </span>
            <span class="ml-2 text-sm"> Dashboards {{request()->routeIs('dashboard')}}  </span>
            <span class="ml-auto" aria-hidden="true">
                <!-- active class 'rotate-180' -->
                <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 9l-7 7-7-7" />
                </svg>
            </span>
        </a>
        <div role="menu" x-show="open" class="mt-2 space-y-2 px-7" aria-label="Dashboards">
            <!-- active & hover classes 'text-gray-700 dark:text-light' -->
            <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
            <a href="index.html" role="menuitem"
                class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:text-light dark:hover:text-light hover:text-gray-700">
                Default
            </a>
        </div>
    </div>

    <!-- Components links -->
    <div x-data="{ isActive: false, open: false }">
        <!-- active classes 'bg-primary-100 dark:bg-primary' -->
        <a href="#" @click="$event.preventDefault(); open = !open"
            class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
            :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }" role="button"
            aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
            <span aria-hidden="true">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                </svg>
            </span>
            <span class="ml-2 text-sm"> Components </span>
            <span aria-hidden="true" class="ml-auto">
                <!-- active class 'rotate-180' -->
                <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 9l-7 7-7-7" />
                </svg>
            </span>
        </a>
        <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="Components">
            <!-- active & hover classes 'text-gray-700 dark:text-light' -->
            <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
            <a href="#" role="menuitem"
                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                Alerts (soon)
            </a>
            <a href="#" role="menuitem"
                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                Buttons (soon)
            </a>
            <a href="#" role="menuitem"
                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                Cards (soon)
            </a>
            <a href="#" role="menuitem"
                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                Dropdowns (soon)
            </a>
            <a href="#" role="menuitem"
                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                Forms (soon)
            </a>
            <a href="#" role="menuitem"
                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                Lists (soon)
            </a>
            <a href="#" role="menuitem"
                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                Modals (soon)
            </a>
        </div>
    </div>

    <!-- Pages links -->
    <div x-data="{ isActive: false, open: false }">
        <!-- active classes 'bg-primary-100 dark:bg-primary' -->
        <a href="#" @click="$event.preventDefault(); open = !open"
            class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
            :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }" role="button"
            aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
            <span aria-hidden="true">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                </svg>
            </span>
            <span class="ml-2 text-sm"> Pages </span>
            <span aria-hidden="true" class="ml-auto">
                <!-- active class 'rotate-180' -->
                <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 9l-7 7-7-7" />
                </svg>
            </span>
        </a>
        <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="Pages">
            <!-- active & hover classes 'text-gray-700 dark:text-light' -->
            <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
            <a href="pages/blank.html" role="menuitem"
                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                Blank
            </a>
            <a href="pages/404.html" role="menuitem"
                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                404
            </a>
            <a href="pages/500.html" role="menuitem"
                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                500
            </a>
            <a href="profile" role="menuitem"
                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                Profile (soon)
            </a>
            <a href="#" role="menuitem"
                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                Pricing (soon)
            </a>
            <a href="#" role="menuitem"
                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                Kanban (soon)
            </a>
            <a href="#" role="menuitem"
                class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                Feed (soon)
            </a>
        </div>
    </div>

    <!-- Authentication links -->
    <div x-data="{ isActive:false, open :
         false } ">
         <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
         <a href="#" @click="$event.preventDefault(); open = !open"

             class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
             :class="{'bg-primary-100 text-light dark:bg-primary': isActive || open}" role="button"
             aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
             <span aria-hidden="true">
                 <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                 </svg>
             </span>
             <span class="ml-2 text-sm"> حسابي </span>
             <span aria-hidden="true" class="ml-auto">
                 <!-- active class 'rotate-180' -->
                 <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="M19 9l-7 7-7-7" />
                 </svg>
             </span>
         </a>
         <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" aria-label="Authentication">
             <!-- active & hover classes 'text-gray-700 dark:text-light' -->
             <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
             <a href="{{route("profile")}}" role="menuitem"
                 class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                 استعراض
             </a>
             <a x-data="{isActiveEdit:false }"  href="{{route("profile.create")}}" role="menuitem"
             :class="{'bg-primary-50 text-darker font-bold':isActiveEdit}"
                 class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                 تعديل البيانات
                 {{request()->routeIs('profile.create')}}
             </a>
             <a href="auth/forgot-password.html" role="menuitem"
                 class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                 Forgot Password
             </a>
             <a href="auth/reset-password.html" role="menuitem"
                 class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                 Reset Password
             </a>
         </div>
     </div>

     <!-- Layouts links -->
     <div x-data="{ isActive: false, open: false }">
         <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
         <a href="#" @click="$event.preventDefault(); open = !open"
             class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
             :class="{'bg-primary-100 dark:bg-primary': isActive || open}" role="button"
             aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
             <span aria-hidden="true">
                 <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                 </svg>
             </span>
             <span class="ml-2 text-sm"> Layouts </span>
             <span aria-hidden="true" class="ml-auto">
                 <!-- active class 'rotate-180' -->
                 <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="M19 9l-7 7-7-7" />
                 </svg>
             </span>
         </a>
         <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" aria-label="Layouts">
             <!-- active & hover classes 'text-gray-700 dark:text-light' -->
             <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
             <a href="layouts/two-columns-sidebar.html" role="menuitem"
                 class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                 Two Columns Sidebar
             </a>
             <a href="layouts/mini-plus-one-columns-sidebar.html" role="menuitem"
                 class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                 Mini + One Columns Sidebar
             </a>
             <a href="layouts/mini-column-sidebar.html" role="menuitem"
                 class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                 Mini Column Sidebar
             </a>
         </div>
     </div>
 </nav> --}}

</x-perfect-scrollbar>
