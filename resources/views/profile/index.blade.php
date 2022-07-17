<x-guest-layout>
    <div x-data="{url:new URL(window.location.href)}"  class="max-w-4xl mx-auto mt-4 mb-32 rounded-md dark:bg-primary-dark">

        <div class="px-3 py-2 mx-auto ">

            <div class="sm:flex">

                <div class="flex flex-col items-center gap-1 p-4 sm:w-1/3 ">
                <a class="block w-40 h-40 bg-center bg-no-repeat bg-cover border border-gray-400 rounded-full shadow-lg" href="" style="background-image: url('{{$user->avatar}}')"></a>

                <div class="flex items-end">

                    @auth
                    @if($user->id!=auth()->user()->id)
                    <form method="POST" action="{{route('create_chatroom')}}">
                        @csrf
                        <input type="hidden" name="chatable_id" value="{{$user->username}}" />
                        <input type="hidden" name="type" value="user" />
                    <x-button>
                        <x-heroicon-o-chat class="w-4 h-4"/>
                        <span class="text-xs"> دردشة </span>
                    </x-button>
                    </form>
                    @else
                    <x-button href="{{route('profile.create')}}">
                        <span class="text-xs"> تعديل بيانات الحساب</span>
                    </x-button>

                    @endif
                    @endauth


  <div x-data="{ dropdownOpen: false }" class="relative">

    <x-button @click="dropdownOpen = !dropdownOpen" variant="secondary"   ><x-heroicon-o-menu class="w-5 h-5"/> </x-button>

    <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 z-10 w-full h-full"></div>

    <div x-show="dropdownOpen" class="absolute right-0 z-20 w-48 mt-2 overflow-hidden bg-white rounded-md shadow-xl">
      <a href="#" class="block px-4 py-2 text-sm text-gray-800 border-b hover:bg-gray-200">small <span class="text-gray-600">(640x426)</span></a>
      <a href="#" class="block px-4 py-2 text-sm text-gray-800 border-b hover:bg-gray-200">medium <span class="text-gray-600">(1920x1280)</span></a>
      <a href="#" class="block px-4 py-2 text-sm text-gray-800 border-b hover:bg-gray-200">large <span class="text-gray-600">(2400x1600)</span></a>
    </div>
  </div>
                </div>
                <div class="flex items-center gap-2 text-sm">
                    <div class="mx-4 font-semibold text-center">
                        <p class="text-black">{{$user->products_count+$user->services_count}}</p>
                        <span class="text-xs text-gray-400">العروض</span>
                    </div>

                    {{-- <div class="mx-4 font-semibold text-center">
                        <p class="text-black ">{{$user->following(App\Models\Bussinse::class)->count()}}</p>
                        <span class="text-xs text-gray-400">اتابعهم</span>
                    </div>
                    <div class="mx-4 font-semibold text-center">
                        <p class="text-black "></p>
                        <span class="text-xs text-gray-400">اتابعهم</span>
                    </div> --}}
                </div>
            </div>

            <div class="flex flex-col gap-1 p-4 text-sm sm:w-2/3 dark:border-light rounded-xl ">

                <div class="flex justify-between">
                    <div>
                    <p class="pt-4 pb-4 font-serif text-lg ">{{$user->username}}
                        <br>
{{--
                        <a href="{{'@'.$user->username}}"> <span class="text-sm ">{{'@'.$user->username}}</span></a> --}}

                    </p>
                    </div>

                </div>



                <div class="flex flex-col">
                    <span class="text-sm font-bold text-gray-800 dark:text-light">{{$user->name}}</span>
                    <span class="py-1 text-xs text-gray-800 dark:text-light">صفحة شخصية</span>
                    <span class="flex py-1 text-xs text-info dark:text-light">
                        <x-heroicon-o-map class="w-4 h-4"/>
                        {{$user->city!=null?$user->city->name:""}}</span>

                <p>
                    @php
                        echo $user->bio;
                    @endphp
                </p>
                </div>

            </div>
        </div>









            <div x-data="{selectedbus:'ps'}"
            x-init="
            selectedbus = url.searchParams.get('selected')!=null ? url.searchParams.get('selected') : 'ps';
            "
            >

            <div class="flex items-center justify-between text-sm">
                <button @click="selectedbus='ps';   url.searchParams.set('selected', 'ps');
                history.pushState(null, document.title, url.toString());" :class="{'border-b-2 border-primary':selectedbus=='ps'}" class="w-full py-2 ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                      </svg>
                      العروض
                </button>
                <button class="w-full py-2" :class="{'border-b-2 border-primary':selectedbus=='bus'}"
                @click="selectedbus='bus';   url.searchParams.set('selected', 'bus');
                history.pushState(null, document.title, url.toString());">
                    <svg xmlns="http://www.w3.org/2000/svg"  class="w-6 h-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                      </svg>
                    الحسابات التسويقية لهذا المستخدم
                </button>
            </div>
            <div
            x-transition:enter="transition duration-300 ease-in-out" x-transition:enter-start="opacity-0"
x-transition:enter-end="opacity-100" x-transition:leave="transition duration-300 ease-in-out"
            x-show="selectedbus=='ps'">

                <div x-data="{selected:'pro'}">
            <div class="flex items-center justify-between w-1/2 text-xs">
                <button @click="selected='pro'" :class="{'border-b-2 border-primary':selected=='pro'}" class="w-full py-2 ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                      </svg>
                      المنتجات
                </button>
                <button @click="selected='serv'" :class="{'border-b-2 border-primary':selected=='serv'}" class="w-full py-2">
                    <svg xmlns="http://www.w3.org/2000/svg"  class="w-6 h-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                      </svg>
                      الخدمات
                </button>
            </div>
            {{-- <div class="absolute right-0 z-30 w-full h-full mx-auto bg-darker opacity-10 top-16 ">

                <div class="absolute z-50 mx-auto bg-white opacity-100 h-80 w-80 ">

                    ksdc sdck
                </div>
            </div> --}}
               <div class="">

                <div
                x-transition:enter="transition duration-300 ease-in-out" x-transition:enter-start="opacity-0"
x-transition:enter-end="opacity-100" x-transition:leave="transition duration-300 ease-in-out"
                x-show="selected=='pro'" >

                {{-- <template x-for="(product,index) in products">
                   <div class="relative">
                   <a class="block w-full h-40 bg-center bg-no-repeat bg-cover rounded-lg" href="" :style="'background-image:url('+product.img+')'" ></a>
                <span class="absolute bottom-0 left-0 px-2 text-xl font-bold bg-primary rounded-xl text-dark" x-text="product.price+'/ر.ي'"><span x-text="'/ry'" class="text-xs">/ر.ي</span></span>
                </div>
                </template> --}}
                @livewire('show.products-serveces', ['username' => $user->username], key($user->id."okkkk"))

            </div>
                <div
                x-transition:enter="transition duration-300 ease-in-out" x-transition:enter-start="opacity-0"
x-transition:enter-end="opacity-100" x-transition:leave="transition duration-300 ease-in-out"
                x-show="selected=='serv'">
                    @livewire('show.products-serveces', ['username' => $user->username,$proORserv='serv'], key($user->id))


                </div>

               </div>
            </div>
        </div>
        <div class="min-h-full" x-show="selectedbus=='bus'"
        x-transition:enter="transition duration-300 ease-in-out" x-transition:enter-start="opacity-0"
x-transition:enter-end="opacity-100" x-transition:leave="transition duration-300 ease-in-out"
        >
            <div dir="rtl" class="grid gap-2 my-3 sm:grid-cols-2">
                @foreach ($user->bussinses()->with("department:id,name")->with("user:id")->withCount("followers_b")->withCount("products as products_count")->withAvg("ratings:value")->get() as $buss)
                <div class="w-full max-w-3xl mx-auto ">
                    <div class="flex flex-col">
                        <div class="bg-white dark:bg-dark dark:text-light dark:border->primary border border-white shadow-lg  rounded-3xl p-4 m-4">
                            <div class="flex-none sm:flex">
                                <div class="relative w-32 h-32 mb-3 sm:mb-0">
                                    <a href="{{route('b.show',['username'=>$buss->username])}}">
                                    <img src="{{$buss->avatar}}" alt="aji" class="object-cover w-32 h-32 rounded-2xl">

                                    </a>
                                </div>
                                <div class="flex-auto sm:mr-5 justify-evenly">
                                    <div class="flex items-center justify-between sm:mt-2">
                                        <div class="flex items-center">
                                            <div class="flex flex-col">
                                                <div class="flex-none w-full font-bold leading-none text-md">{{$buss->name}}|<br><a href="{{route("b.show",["username"=>$buss->username])}}"><span class="text-xs text-info">{{"@".$buss->username}}</span></a></div>
                                                <div class="flex-auto my-1 text-gray-500">
                                                    <span class="mr-3 border-r border-gray-200 max-h-0"></span><span class="text-info"> {{$buss->department?->name}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-row items-center">
                                        <div class="flex">

                                            @for ($i = 1; $i <= $buss->ratings_value_avg; $i++)

                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                                class="w-5 h-5 text-yellow-500">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                </path>
                                            </svg>
                                            @endfor
                                            @for ($i = 0; $i < 5-$buss->ratings_value_avg; $i++)

                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor" class="w-5 h-5 text-yellow-500">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                                </path>
                                            </svg>
                                            @endfor
                                        </div>
                                        <div class="inline-flex items-center flex-1">
                                            <img class="w-5 h-5" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDY0IDY0IiBoZWlnaHQ9IjY0cHgiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCA2NCA2NCIgd2lkdGg9IjY0cHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxwYXRoIGQ9Ik0zMiw3LjE3NEMxOC4zMTEsNy4xNzQsNy4xNzQsMTguMzExLDcuMTc0LDMyYzAsMTMuNjg5LDExLjEzNywyNC44MjYsMjQuODI2LDI0LjgyNmMxMy42ODksMCwyNC44MjYtMTEuMTM3LDI0LjgyNi0yNC44MjYgIEM1Ni44MjYsMTguMzExLDQ1LjY4OSw3LjE3NCwzMiw3LjE3NHogTTM4LjE3NCwzMi44NzRoLTQuMDM5YzAsNi40NTMsMCwxNC4zOTgsMCwxNC4zOThoLTUuOTg1YzAsMCwwLTcuODY4LDAtMTQuMzk4aC0yLjg0NXYtNS4wODggIGgyLjg0NXYtMy4yOTFjMC0yLjM1NywxLjEyLTYuMDQsNi4wNC02LjA0bDQuNDMzLDAuMDE3djQuOTM5YzAsMC0yLjY5NSwwLTMuMjE5LDBjLTAuNTI0LDAtMS4yNjgsMC4yNjItMS4yNjgsMS4zODZ2Mi45OWg0LjU2ICBMMzguMTc0LDMyLjg3NHoiLz48L3N2Zz4=">
                                            <img class="w-5 h-5" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDU2LjY5MyA1Ni42OTMiIGhlaWdodD0iNTYuNjkzcHgiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCA1Ni42OTMgNTYuNjkzIiB3aWR0aD0iNTYuNjkzcHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxwYXRoIGQ9Ik0yOC4zNDgsNS4xNTdjLTEzLjYsMC0yNC42MjUsMTEuMDI3LTI0LjYyNSwyNC42MjVjMCwxMy42LDExLjAyNSwyNC42MjMsMjQuNjI1LDI0LjYyM2MxMy42LDAsMjQuNjIzLTExLjAyMywyNC42MjMtMjQuNjIzICBDNTIuOTcxLDE2LjE4NCw0MS45NDcsNS4xNTcsMjguMzQ4LDUuMTU3eiBNNDAuNzUyLDI0LjgxN2MwLjAxMywwLjI2NiwwLjAxOCwwLjUzMywwLjAxOCwwLjgwM2MwLDguMjAxLTYuMjQyLDE3LjY1Ni0xNy42NTYsMTcuNjU2ICBjLTMuNTA0LDAtNi43NjctMS4wMjctOS41MTMtMi43ODdjMC40ODYsMC4wNTcsMC45NzksMC4wODYsMS40OCwwLjA4NmMyLjkwOCwwLDUuNTg0LTAuOTkyLDcuNzA3LTIuNjU2ICBjLTIuNzE1LTAuMDUxLTUuMDA2LTEuODQ2LTUuNzk2LTQuMzExYzAuMzc4LDAuMDc0LDAuNzY3LDAuMTExLDEuMTY3LDAuMTExYzAuNTY2LDAsMS4xMTQtMC4wNzQsMS42MzUtMC4yMTcgIGMtMi44NC0wLjU3LTQuOTc5LTMuMDgtNC45NzktNi4wODRjMC0wLjAyNywwLTAuMDUzLDAuMDAxLTAuMDhjMC44MzYsMC40NjUsMS43OTMsMC43NDQsMi44MTEsMC43NzcgIGMtMS42NjYtMS4xMTUtMi43NjEtMy4wMTItMi43NjEtNS4xNjZjMC0xLjEzNywwLjMwNi0yLjIwNCwwLjg0LTMuMTJjMy4wNjEsMy43NTQsNy42MzQsNi4yMjUsMTIuNzkyLDYuNDgzICBjLTAuMTA2LTAuNDUzLTAuMTYxLTAuOTI4LTAuMTYxLTEuNDE0YzAtMy40MjYsMi43NzgtNi4yMDUsNi4yMDYtNi4yMDVjMS43ODUsMCwzLjM5NywwLjc1NCw0LjUyOSwxLjk1OSAgYzEuNDE0LTAuMjc3LDIuNzQyLTAuNzk1LDMuOTQxLTEuNTA2Yy0wLjQ2NSwxLjQ1LTEuNDQ4LDIuNjY2LTIuNzMsMy40MzNjMS4yNTctMC4xNSwyLjQ1My0wLjQ4NCwzLjU2NS0wLjk3NyAgQzQzLjAxOCwyMi44NDksNDEuOTY1LDIzLjk0Miw0MC43NTIsMjQuODE3eiIvPjwvc3ZnPg==">
                                            <img class="w-5 h-5" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGhlaWdodD0iNjdweCIgaWQ9IkxheWVyXzEiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDY3IDY3OyIgdmVyc2lvbj0iMS4xIiB2aWV3Qm94PSIwIDAgNjcgNjciIHdpZHRoPSI2N3B4IiB4bWw6c3BhY2U9InByZXNlcnZlIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIj48cGF0aCBkPSJNNTAuODM3LDQ4LjEzN1YzNi40MjVjMC02LjI3NS0zLjM1LTkuMTk1LTcuODE2LTkuMTk1ICBjLTMuNjA0LDAtNS4yMTksMS45ODMtNi4xMTksMy4zNzRWMjcuNzFoLTYuNzljMC4wOSwxLjkxNywwLDIwLjQyNywwLDIwLjQyN2g2Ljc5VjM2LjcyOWMwLTAuNjA5LDAuMDQ0LTEuMjE5LDAuMjI0LTEuNjU1ICBjMC40OS0xLjIyLDEuNjA3LTIuNDgzLDMuNDgyLTIuNDgzYzIuNDU4LDAsMy40NCwxLjg3MywzLjQ0LDQuNjE4djEwLjkyOUg1MC44Mzd6IE0yMi45NTksMjQuOTIyYzIuMzY3LDAsMy44NDItMS41NywzLjg0Mi0zLjUzMSAgYy0wLjA0NC0yLjAwMy0xLjQ3NS0zLjUyOC0zLjc5Ny0zLjUyOHMtMy44NDEsMS41MjQtMy44NDEsMy41MjhjMCwxLjk2MSwxLjQ3NCwzLjUzMSwzLjc1MywzLjUzMUgyMi45NTl6IE0zNCw2NCAgQzE3LjQzMiw2NCw0LDUwLjU2OCw0LDM0QzQsMTcuNDMxLDE3LjQzMiw0LDM0LDRzMzAsMTMuNDMxLDMwLDMwQzY0LDUwLjU2OCw1MC41NjgsNjQsMzQsNjR6IE0yNi4zNTQsNDguMTM3VjI3LjcxaC02Ljc4OXYyMC40MjcgIEgyNi4zNTR6IiBzdHlsZT0iZmlsbC1ydWxlOmV2ZW5vZGQ7Y2xpcC1ydWxlOmV2ZW5vZGQ7ZmlsbDojMDEwMTAxOyIvPjwvc3ZnPg==">

                                        </div>
                                        </div>
                                        <div class="flex pt-2 text-sm text-gray-500">
                                            <div class="inline-flex items-center flex-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path
                                                        d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z">
                                                    </path>
                                                </svg>
                                                <p class="">{{$buss->followers_b_count}}</p>
                                            </div>
                                            <div class="inline-flex items-center flex-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <p class="">{{$buss->products_count}}</p>
                                            </div>



                                            @auth

                                            @if ($buss->user->id ==auth()->user()->id)
                                                <x-button>
                                                    Mange
                                                </x-button>
                                            @else


                                            @if (auth()->user()->isFollowing($buss))

                                            <form x-data="ContactForm({{$buss->id}},'unfollow','الغاء المتابعة')" @submit.prevent="submitForm({{$buss->id}},'unfollow')">
                                           <x-button x-show="showbutton" withIcon withicon variant="info">
                                                   <span x-text="formMessage"></span>


                                                </x-button>
                                           <span x-show="!showbutton" x-text="formMessage">

                                           </span>
                                            </form>

                                            @else

                                            <form  x-data="ContactForm({{$buss->id}},'follow','متابعة')"  @submit.prevent="submitForm({{$buss->id}},'follow')">
                                                @csrf
                                            <x-button   x-show="showbutton" withIcon withicon    variant="success">
                                                    <span x-text="formMessage"></span>

                                            </x-button>
                                            <span class="text-xs text-success" x-show="!showbutton" x-text="formMessage"></span>

                                        </form>


                                            @endif


                                            @endif

                                            @endauth


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                @endforeach
            </div>


        </div>
    </div>




        </div>



    </div>

      <x-slot name="script">

    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<script type="text/javascript">




const FORM_URL="{{route('b-follow')}}";

function ContactForm(buss_id ,typef,message) {
      return {

        showbutton:true,
        formMessage: message,
        button_message:"متابعة",
        submitForm(buss_id,typef) {
            fetch(FORM_URL, {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
              "Accept": "application/json",
              'X-CSRF-TOKEN': '{{csrf_token()}}'

            },
            body: JSON.stringify({'buss_id':buss_id,"typef":typef}),


          }).then(response=>{
              if(!response.ok){
              this.formMessage="اعدالمحاولة";
              return null;
              }
              return response.json()
          }).then(data => {
              if(data!=null){

              if(data.status==true){
                this.formMessage=data.message;
                this.showbutton=false;

              }
              else{

                this.formMessage=data.message;

              }


              }
              console.log(data);

            }).catch((e) => {
                console.log(e);
              this.formMessage = "اعد المحاولة";
            });

        }
    }
    };



// const phoneInputField = document.querySelector("#phone");
//    const phoneInput = window.intlTelInput(phoneInputField, {
//      utilsScript:
//        "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
//    });

// $(document).ready(function () {
//         $('.ckeditor').ckeditor();
//     });



</script>

      </x-slot>
</x-guest-layout>
