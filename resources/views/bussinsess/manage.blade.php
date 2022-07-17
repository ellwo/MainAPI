<x-dashe-layout>


    <div class="mx-auto mt-4 space-x-2 dark:bg-dark text-darker dark:text-light rounded-xl">

        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </div>
    <div dir="rtl" class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-darker ">
        مرحبا عزيزنا  {{$bussinse->name}}

    </div>

    <div class="grid grid-cols-1 gap-8 p-4 lg:grid-cols-2 xl:grid-cols-4">
        <!-- Value card -->
        <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
            <div>
                <h6

                    class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                   @if ($bussinse->department->type==1)
                       عدد المنتجات
                   @else
                       عدد الخدمات
                   @endif
                </h6>
                <span class="text-xl font-semibold">{{$bussinse->items_count()}}</span>

                <a href="">
                <span
                    class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                    ادارة العروض
                </span>
                </a>
            </div>
            <div>
                <span>
                    <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </span>
            </div>
        </div>

        <!-- Users card -->
        <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
            <div>
                <h6
                    class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                    عدد المتابعين
                </h6>
                <span class="text-xl font-semibold">{{$bussinse->f_count}}</span>
                <span
                    class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                    +2.6%
                </span>
            </div>
            <div>
                <span>
                    <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </span>
            </div>
        </div>

        <!-- Orders card -->
        <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
            <div>
                <h6
                    class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                    عدد الزيارات
                </h6>
                <span class="text-xl font-semibold">{{$bussinse->vzt()->count()}}</span>
                <span
                    class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                    +3.1%
                </span>
            </div>
            <div>
                <span>
                    <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                    </svg>
                </span>
            </div>
        </div>

        <!-- Tickets card -->
        <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
            <div>
                <h6
                    class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                    Tickets
                </h6>
                <span class="text-xl font-semibold">20,516</span>
                <span
                    class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                    +3.1%
                </span>
            </div>
            <div>
                <span>
                    <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                    </svg>
                </span>
            </div>
        </div>
    </div>

    <div x-data='{showForm:false}'>
        @if (session()->has("state"))
        <span>Has State</span>
    @endif


    <x-auth-session-status class="mb-4" :status="session('status')" />

    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <div dir="rtl" x-show="!showForm" class="p-6 mt-4 overflow-hidden bg-white rounded-md shadow-md dark:bg-darker ">
        <div class="flex space-x-2">
           <span class="text-xl font-bold"> المعلومات الاساسية</span>
            <span @click="showForm=!showForm" class="rounded-full cursor-pointer ">
                <span class="w-6 h-6 ">
                <svg class="p-1 rounded-full bg-primary text-primary" id="icon_content_create_24px" data-name="icon/content/create_24px" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <rect id="Boundary" width="24" height="24" fill="none"/>
                    <path id="_Color" data-name=" ↳Color" d="M3.75,18h0L0,18v-3.75L11.06,3.192l3.75,3.75ZM15.88,5.872h0L12.13,2.122,13.96.292a1,1,0,0,1,1.41,0l2.34,2.34a1,1,0,0,1,0,1.41L15.88,5.872Z" transform="translate(3 3)"/>
                  </svg>
                </span>

            </span>
        </div>
        <hr>
        <div class="gap-3 sm:flex md:flex-row">
        <div class="flex flex-col w-3/4 py-2 mx-auto space-y-2 rounded-xl ">
            <div class="flex">
                <h6 class="mx-1 font-bold text-primary">اسم الحساب  : </h6>{{$bussinse->name}}
            </div>
            <div class="flex">
                <h6 class="mx-1 font-bold text-primary">اسم المستحدم  : </h6>{{$bussinse->username.'@'}}
            </div>
            <div class="flex">
                <h6 class="mx-1 font-bold text-primary">البريد الالكتروني  : </h6>{{$bussinse->email}}
            </div>
             <div class="flex">
                <h6 class="mx-1 font-bold text-primary">الفسم  : </h6>{{$bussinse->department->name}}
            </div>
            <div class="flex flex-wrap space-x-2">
                <h6 class="mx-1 font-bold text-primary">المدن  : </h6>
                @foreach ($bussinse->cities as $c)
                    <div class="p-1 rounded-lg dark:bg-white bg-dark text-light dark:text-dark">
                        {{$c->name}}
                    </div>
                @endforeach
            </div>
            <div class="flex flex-wrap space-x-2">
                <h6 class="mx-1 font-bold text-primary">الفئات  : </h6>
                @foreach ($bussinse->parts as $c)
                    <div class="p-1 rounded-lg dark:bg-white bg-dark text-light dark:text-dark">
                        {{$c->name}}
                    </div>
                @endforeach
            </div>
            <div class="flex flex-col space-y-1">
                <h6 class="mx-1 font-bold text-primary">ارقام التواصل  : </h6>

                @if ($bussinse->phone_numbers !=null)


                @foreach ($bussinse->phone_numbers as $p )
                    <span class="flex w-full p-2 space-x-2 border rounded-lg border-info ">
                        {{$p}}
                        <x-heroicon-o-phone class="w-5 h-5 font-bold text-info" />


                    </span>
                @endforeach
                  @endif
            </div>
            <div class="flex flex-col space-y-1">
                <h6 class="mx-1 font-bold text-primary">روابط مواقع التواصل  : </h6>
                <span class="flex w-full p-2 space-x-2 border rounded-lg border-info ">
                    {{$bussinse->contact_links!=null && $bussinse->contact_links[0]!=null ? $bussinse->contact_links[0]:''}}

                    <span class="p-1 mx-2 bg-blue-800 rounded-md text-light"> Facebook</span>
                    <x-heroicon-o-phone class="w-5 h-5 font-bold text-info" />
                </span>

                <span class="flex w-full p-2 mx-2 space-x-2 border rounded-lg border-info ">

                    {{$bussinse->contact_links!=null && $bussinse->contact_links[1]!=null ? $bussinse->contact_links[1]:''}}
                    <span class="p-1 rounded-md bg-info-light text-light">Twitter</span>
                    <x-heroicon-o-phone class="w-5 h-5 font-bold text-info" />


                </span>

                <span class="flex w-full p-2 mx-2 space-x-2 border rounded-lg border-info ">

                    {{$bussinse->contact_links!=null && $bussinse->contact_links[2]!=null ? $bussinse->contact_links[2]:''}}

                    <span class="p-1 rounded-md bg-success text-light">WahtsApp</span>
                    <x-heroicon-o-phone class="w-5 h-5 font-bold text-info" />


                </span>

            </div>



        </div>
        <div  class="flex flex-col items-center w-3/4 py-2 mx-auto space-y-2 rounded-xl ">

            <form onsubmit="ajxaproform(event,this,'{{route('b.savechangeimgs')}}')">
                <input type="hidden" name="bussinse_username" value="{{$bussinse->username}}"/>
            <div class="flex  flex-col mx-auto text-dark ">
                <x-label for="avatar" :value="__('صورة العرض الاساسية  ')" />

                <div id="avatar" class="rounded-md "></div>
            </div>
            <div class="flex flex-col  mx-auto ">
                <x-label for="imgs" :value="__('صور عرض اضافية   ')" />

                <div id="imgs" class="rounded-md "></div>
            </div>
            <x-button variant="success">
                حفظ التعديلات

            </x-button>
            </form>




        </div>



    </div>


    </div>



    <div  x-show="showForm" class="flex flex-col p-6 mx-auto mt-4 overflow-hidden bg-white rounded-md shadow-md lg:w-2/3 dark:bg-darker ">
        <form action="{{route('b.update',['b'=>$bussinse])}}" method="POST">
            @csrf
            @method('PUT')
        <div class="flex flex-col p-8 mx-auto ">

                        <div class="relative inline-flex flex-col items-center mx-auto space-y-4">

                            <x-label for="department_id" :value="__('اختر القسم ')" />

                            <select name="department_id" class="h-10 pl-5 pr-10 text-gray-600 bg-white border border-gray-300 rounded-full appearance-none hover:border-gray-400 focus:outline-none">
                                @foreach( $catgraies as $ca)
                                <option value="{{$ca->id}}">{{$ca->name}}</option>
                                @endforeach
                            </select>
                          </div>





                    </div>
                    <div class="flex flex-col items-center mx-auto">
                                @include('components.mulit-select',
                                ['id'=>'part',
                                'inputname'=>'parts',
                                'items'=>$parts,
                                'lablename'=>'الفئات',
                                'selected'=>$bussinse->parts?->pluck('id')->toArray()

                                ])
                    </div>


<div class="space-y-2 " dir="auto">
    <x-label for="name" :value="__('الاسم')" />

        <x-input id="name" class="block w-full" type="text" name="name"
        value="{{$bussinse->name}}"
        placeholder="{{ __('الاسم') }}" required autofocus />
</div>

<div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:space-x-4">
    <div class="w-full space-y-2 ">
        <x-label for="email" :value="__('Email')" />

        <x-input-with-icon-wrapper>
            <x-slot name="icon">

                <x-heroicon-o-mail aria-hidden="true" class="w-5 h-5 text-primary-darker dark:text-primary-light" />



            </x-slot>
            <x-input withicon id="email" class="block w-full focus:ring-primary_color focus:border-primary_color" type="email" name="email"
                value="{{$bussinse->email}}" placeholder="{{ __('Email') }}" required autofocus />
                {{-- @if (auth()->user()->hasVerifiedEmail())
                <x-slot name="righticon">
                    <span class="rounded bg-success text-light">
                        تم التاكيد

                    </span>
                </x-slot>
                @endif --}}

            </x-input-with-icon-wrapper>
    </div>
    <div class="w-full space-y-2">
        <x-label for="username" :value="__('اسم المستخدم')" />

        <x-input-with-icon-wrapper>
            <x-slot name="icon" class="border border-1">

                <span aria-hidden="true" class="w-5 h-5 text-primary-dark dark:text-primary-light" >@</span>



            </x-slot>
            <x-input withicon id="username" class="block w-full focus:ring-primary_color focus:border-primary_color"
           value="{{$bussinse->username}}" type="text" name="username"
            placeholder="{{ __('Username') }}" required autofocus />
        </x-input-with-icon-wrapper>
    </div>

</div>



<div class="flex flex-col space-y-4 md:space-y-0 md:flex-row">
    <div class="w-full space-y-2" x-data='{contact_count:0}'>
        <x-label for="email" :value="__('ارقام التواصل ')" />

        @foreach ($bussinse->phone_numbers as $p)

        <x-input-with-icon-wrapper>
            <x-slot name="icon">

                <x-heroicon-o-phone aria-hidden="true" class="w-5 h-5 text-primary-darker dark:text-primary-light" />
            </x-slot>
            <x-input withicon id="email" class="block w-full focus:ring-primary_color focus:border-primary_color"
            type="text" value="{{$p}}" name="phone_numbers[]"
                 placeholder="{{ __('+967') }}"  />
                {{-- @if (auth()->user()->hasVerifiedEmail())
                <x-slot name="righticon">
                    <span class="rounded bg-success text-light">
                        تم التاكيد

                    </span>
                </x-slot>
                @endif --}}

            </x-input-with-icon-wrapper>
        </template>

        @endforeach


        <template x-for="i in contact_count">

        <x-input-with-icon-wrapper>
            <x-slot name="icon">

                <x-heroicon-o-phone aria-hidden="true" class="w-5 h-5 text-primary-darker dark:text-primary-light" />
            </x-slot>
            <x-input withicon id="email" class="block w-full focus:ring-primary_color focus:border-primary_color"
            type="text" value="" name="phone_numbers[]"
                 placeholder="{{ __('+967') }}"  />
                {{-- @if (auth()->user()->hasVerifiedEmail())
                <x-slot name="righticon">
                    <span class="rounded bg-success text-light">
                        تم التاكيد

                    </span>
                </x-slot>
                @endif --}}

            </x-input-with-icon-wrapper>
        </template>

        <div class="mx-auto text-center">
        <x-button x-show="contact_count<4" type="button" x-on:click="contact_count++" class="mx-auto" variant="goset">
            <x-heroicon-o-plus class="w-4 h-4 text-success"/> اضافة رقم

        </x-button>
        </div>



        </div>



    <div class="w-full space-y-2" >
        <x-label for="username" :value="__('روابط مواقع التواصل ')" />



        <x-input-with-icon-wrapper>
            <x-slot name="icon" class="border border-1">

                <span aria-hidden="true" class="w-5 h-5 text-primary-dark dark:text-primary-light" >@</span>



            </x-slot>
            <x-input withicon id="username" class="block w-full focus:ring-primary_color focus:border-primary_color"
           value="                    {{$bussinse->contact_links!=null && $bussinse->contact_links[0]!=null ? $bussinse->contact_links[0]:''}}
           " type="text" name="contact_links[]"
            placeholder="{{ __('facebook user or link') }}"  autofocus />
        </x-input-with-icon-wrapper>
        <x-input-with-icon-wrapper>
            <x-slot name="icon" class="border border-1">

                <span aria-hidden="true" class="w-5 h-5 text-primary-dark dark:text-primary-light" >@</span>



            </x-slot>
            <x-input withicon id="username" class="block w-full focus:ring-primary_color focus:border-primary_color"
           value="                    {{$bussinse->contact_links!=null && $bussinse->contact_links[1]!=null ? $bussinse->contact_links[1]:''}}
           " type="text" name="contact_links[]"
            placeholder="{{ __('twitter username') }}"  autofocus />
        </x-input-with-icon-wrapper>
        <x-input-with-icon-wrapper>
            <x-slot name="icon" class="border border-1">

                <span aria-hidden="true" class="w-5 h-5 text-primary-dark dark:text-primary-light" >@</span>


            </x-slot>
            <x-input withicon id="username" class="block w-full focus:ring-primary_color focus:border-primary_color"
           value="                    {{$bussinse->contact_links!=null && $bussinse->contact_links[2]!=null ? $bussinse->contact_links[2]:''}}
           " type="text" name="contact_links[]"

           placeholder="{{ __('whatsApp number') }}"  autofocus />

        </x-input-with-icon-wrapper>


    </div>

</div>

       <div class="flex justify-between w-1/2 p-2 mx-auto space-x-4 rounded-xl">
        <x-button variant="success">
            حفظ التعديلات

        </x-button>
        <x-button @click="showForm=false" type="button" class="bg-danger" variant="danger">
            الغاء
            <x-heroicon-o-x class="w-4 h-4 text-white" />
        </x-button>


       </div>
        </form>



    </div>



    </div>








    </div>


    <x-slot name="script">
        <script src="{{asset('js/jquery.min.js')}}"></script>

        <script src="{{asset('js/uploadeimage.js')}}"></script>

    <script>

 newimage=new ImagetoServer(
                {
                    url:"{{route('uploade')}}",
                    id:"avatar",
                    w:650,h:650,
                     src:"{{$bussinse->avatar}}",
                     shep:'rect'
        });
         imgs=new ImagetoServer(
                {
                    url:"{{route('uploade')}}",
                    id:"imgs",
                    shep:"rect",
                    w:650,h:650,
                     src:'@json($bussinse->imgs)',
                     multi:true

        });
    </script>
    </x-slot>

</x-dashe-layout>
