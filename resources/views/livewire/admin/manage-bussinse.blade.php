<section x-data='{open_delete:false}'>
    <div class="relative ">



        <div x-transition:enter="transition duration-500 ease-in-out" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition duration-500 ease-in-out"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"

        @click.away="open_delete=false" x-show="open_delete" class="absolute flex flex-col p-8 space-y-4 bg-white rounded-md text-darker top-24 left-1/2 right-1/5">
            <span class="w-full text-3xl font-bold text-right text-danger">!تنويه</span>
            <hr>
            هل انت متاكد من الحذف ؟
            <div class="flex justify-between space-x-2">
      <x-button variant='success' @click='open_delete=false; $wire.delete_bu({{$delete_b}})' >تأكيد</x-button>
      <x-button variant='danger' x-on:click="open_delete=false;$wire.set('delete_b','no')" > الغاء</x-button>
            </div>
        </div>




        <x-auth-session-status class="mb-4" :status="session('status')" />

        <x-auth-validation-errors class="mb-4" :errors="$errors" />





        <div class="p-6 mt-2 overflow-hidden rounded-md rounded-t-none shadow-md dark:bg-dark" dir="rtl">

            <h1 class="text-3xl">ادارة جميع الحسابات التسويقية</h1>
        </div>
    <div class="flex flex-col items-center justify-center pt-4 dark:bg-darker">
        <div class="flex flex-col w-full col-span-12 mx-auto">



            <div class="items-center justify-between mb-4 space-x-2 space-y-2 md:flex md:mx-auto lg:w-2/3">
                <div class="w-full pr-4">
                    <div dir="rtl" class="relative md:w-full">
                        <input wire:model.lazy="search" type="search"
                            class="w-full py-2 pl-10 pr-4 font-medium text-gray-600 rounded-lg shadow focus:outline-none focus:shadow-outline"
                            placeholder="Search...">
                        <div class="absolute top-0 left-0 inline-flex items-center p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                                <circle cx="10" cy="10" r="7" />
                                <line x1="21" y1="21" x2="15" y2="15" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="flex transition-shadow shadow">
                        <div class=" flex flex-col items-center space-y-2 ">
                            <x-label value=" عرض الحسابات حسب القسم"  />
                        <select wire:model.lazy='dept'  class="bg-white text-dark dark:text-white dark:bg-dark rounded-2xl ">
                            <option value="all">جميع الاقسام </option>
                            @foreach ($depts as $d)
                            <option wire:click="choseBuss('{{ $d->id }}')" value="{{ $d->id }}">{{ $d->name }}</option>
                            @endforeach

                        </select>

                        </div>
                    </div>
                </div>
                <div>
                    <div  class="flex transition-shadow rounded-lg shadow">
                        <div class="flex flex-col items-center w-full space-y-2 ">

                               <x-button  onclick="printContent('printTable')" class='block w-32' variant="info">
                                طباعة
                                <x-heroicon-o-printer  class="w-4 h-4"/>
                               </x-button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="printTable" class="flex flex-col w-full mx-auto overflow-x-scroll md:overflow-x-hidden ">
                <table  class="table px-4 space-y-6 text-xs border-separate md:min-w-full sm:text-sm text-dark dark:text-light">
                    <thead class=" dark:text-light bg-light dark:bg-dark">
                        <tr>
                            <th class="p-3">الحساب التسويقي </th>
                            <th class="p-3 text-left">القسم </th>
                            <th class="p-3 text-left">المالك</th>
                            <th class="p-3 text-left">عدد البلاغات</th>
                            <th class="p-3 text-left">تاريخ </th>
                            <th class="p-3 text-left">عمليات</th>
                        </tr>
                    </thead>
                    <tbody class="">

                        @foreach ($bussinses as $b)

                        <tr class="bg-white dark:bg-dark">
                            <td class="p-3">
                                <div class="flex align-items-center">
                                    <img class="object-cover w-12 h-12 rounded-full" src="{{ $b->avatar }}" alt="EZ">
                                    <div class="ml-3">
                                        <div class="">{{ $b->name }}</div>
                                    </div>
                                </div>
                            </td>

                            <td class="p-3">
                                {{ $b->department?->name }}
                            </td>
                            <td class="p-3">
                                {{ $b->user->name }}
                                <hr>
                                 <a class="text-blue-900 font-bold" href="{{ route('profile.show', ['username'=>$b->user->username]) }}">{{ "@".$b->user->username }}</a>
                            </td>
                            <td class="p-3">
                                <span class="px-2">
                                    {{ $b->reports->count() }}
                                </span>
                            </td>

                            <td class="p-3">

                                {{$b->created_at}}
                            </td>
                            <td class="p-3 ">
                                <a href="{{ route('b.show',$b->username) }}" target="_blank" class="mr-2 text-gray-400 hover:text-dark dark:hover:text-gray-100">
                                    <x-heroicon-s-eye class="w-5 h-5"/>

                                </a>
                                <a  @click="open_delete=true; $wire.set('delete_b',{{ $b->id }})"
                                    href="#" class="ml-2 text-danger-light hover:text-danger">
                                    <x-heroicon-s-x class="w-5 h-5"/>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $bussinses->links() }}

    <style>
        .table {
            border-spacing: 0 15px;
        }

        i {
            font-size: 1rem !important;
        }

        .table tr {
            border-radius: 20px;
        }

        tr td:nth-child(n+6),
        tr th:nth-child(n+6) {
            border-radius: 0 .625rem .625rem 0;
        }

        tr td:nth-child(1),
        tr th:nth-child(1) {
            border-radius: .625rem 0 0 .625rem;
        }
    </style>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/uploadeimage.js') }}"></script>



    </div>
    </section>
