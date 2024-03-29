<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{asset('log.svg')}}">

    @if (isset($title))
        {{ $title }}
    @else

    <title>{{ config('app.name') }}</title>
    @endif
    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />

    <!-- Styles -->
    <style>
        [x-cloak] {
            display: none;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">





    <!-- end modules/novblockwishlist/novblockwishlist_top.tpl -->





    @livewireStyles
    <!-- Scripts -->
</head>

<body dir="rtl" class="antialiased" >




    <div   x-data="setup()" @resize.window="handleWindowResize" x-init="$refs.loading.classList.add('hidden');
    setColors('mycolor'); isSidebarOpen=false" :class="{ 'dark': isDark}">






    <div   class="min-h-screen text-gray-900 bg-gray-100 dark:bg-dark dark:text-light">
            <!-- Loading screen -->

        <x-loading/>


                        <!-- Sidebar -->

                        @include('shop-navbar.nav')

            <div  class="flex flex-col flex-1 min-h-full "
            style="transition-property: margin; transition-duration: 150ms;"
            >



                    {{$slot}}


            </div>
        </div>
    </div>


    <script src="{{ asset('js/app.js') }}" defer></script>
    @livewireScripts

    @isset($script)
        {{$script}}
    @endisset

</body>

</html>
