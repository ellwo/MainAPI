<x-dashe-layout>


    <div dir="rtl" class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-darker">
        مرحبا عزيزنا العميل{{ '  ' . $bussinse->name }}
    </div>




    <div class="p-6 mt-2 overflow-hidden rounded-md rounded-t-none shadow-md dark:bg-dark" dir="rtl">

        <!-- State cards -->
        <div class="grid grid-cols-1 gap-8 p-4 lg:grid-cols-2 xl:grid-cols-4">


            <!-- Orders card -->
            <a href="{{ route('product.create', ['username' => 'me']) }}"
                class="flex items-center justify-between p-4 bg-white rounded-md hover:shadow-2xl dark:bg-darker">
                <div>
                    <h6
                        class="text-lg font-bold leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                     الرسائل
                    </h6>
                    <span class="text-xs font-semibold">
                        اذهب للماسنجر الخاص بك
                    </span>
                </div>
                <div>


                    <span class="relative">
                        <x-bi-chat-fill class="w-12 h-12 text-blue-400" />

                        <span class="absolute top-0 right-0 bg-white border rounded-full text-danger ">{{ $bussinse->unreaded_message_count() }}</span>
                    </span>

                </div>
            </a>





            <!-- Orders card -->




            @if ($bussinse->department->type==1)

            <a href="{{ route('owne-product-orders', ['type' => 'bussinse','username'=>$bussinse->username]) }}"
                class="flex items-center justify-between p-4 bg-white rounded-md hover:shadow-2xl dark:bg-darker">
                <div>
                    <h6
                        class="text-lg font-bold leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                       الطلبات المنتجات الواردة
                    </h6>
                    <span class="text-xs font-semibold">

                    </span>

                </div>
                <div>


                    <span class="relative">
                        <x-bi-inbox-fill class="w-12 h-12 text-yellow-700 mr-2" />
                        <span class="absolute top-0 right-0 bg-white border border-danger rounded-full text-danger text-center text-xs w-6 h-6">{{ $bussinse->owne_product_orders()->where('product_orders.status','=',0)->count() }}</span>

                    </span>

                </div>
            </a>
            @else

            <a href="{{ route('owne-service-orders',['type' => 'bussinse','username'=>$bussinse->username]) }}"
                class="flex items-center justify-between p-4 bg-white rounded-md hover:shadow-2xl dark:bg-darker">
                <div>
                    <h6
                        class="text-lg font-bold leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                       طلبات الخدمات الواردة
                    </h6>
                    <span class="text-xs font-semibold">

                    </span>

                </div>
                <div>


                    <span class="relative">
                        <x-bi-inbox class="w-12 h-12 text-yellow-700" />
                        <span class="absolute top-0 right-0 bg-white border rounded-full text-danger w-4 h-4">{{ $bussinse->owne_service_orders()->get()->count() }}</span>

                    </span>

                </div>
            </a>
            @endif



            <!-- Orders card -->
            @if ($bussinse->department->type==1)


            <a href="{{ route('product.create', ['username' => $bussinse->username]) }}"
                class="flex items-center justify-between p-4 bg-white rounded-md hover:shadow-2xl dark:bg-darker">
                <div>
                    <h6
                        class="text-lg font-bold leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                        اضافة منتج جديد
                    </h6>
                    <span class="text-xs font-semibold">
                        يمكنك اضافة منتجات بعدد غير محدود

                    </span>

                </div>
                <div>


                    <span>
                        <x-heroicon-o-plus class="w-12 h-12 text-success" />
                    </span>

                </div>
            </a>
            @else
        <!-- Orders card -->
        <a href="{{ route('service.create', ['username' => $bussinse->username]) }}"
            class="flex items-center justify-between p-4 bg-white rounded-md hover:shadow-2xl dark:bg-darker">
            <div>
                <h6
                    class="text-lg font-bold leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                    اضافة خدمة جديدة
                </h6>
                <span class="text-xs font-semibold">
                    يمكنك اضافة خدمات بعدد غير محدود

                </span>

            </div>
            <div>


                <span>
                    <x-heroicon-o-plus class="w-12 h-12 text-success" />
                </span>

            </div>
        </a>

            @endif

            @if ($bussinse->department->type==1)

            <a href="{{ route('service.create', ['username' => $bussinse->username]) }}"
                class="flex items-center justify-between p-4 bg-white rounded-md hover:shadow-2xl dark:bg-darker">
                <div>
                    <h6
                        class="text-lg font-bold leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                        ادارة المنتجات
                    </h6>

                </div>
                <div>


                    <span class="flex">
                        <x-bi-bag class="w-6 h-6 " />
                        <x-bi-wrench-adjustable class="w-6 h-6 " />
                    </span>

                </div>
            </a>


            @else
            <a href="{{ route('service.create', ['username' => $bussinse->username]) }}"
                class="flex items-center justify-between p-4 bg-white rounded-md hover:shadow-2xl dark:bg-darker">
                <div>
                    <h6
                        class="text-lg font-bold leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                        ادارة الخدمات
                    </h6>

                </div>
                <div>


                    <span class="flex">

        <svg class="flex-shrink-0 w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
            <g>
                <path fill="none" d="M0 0h24v24H0z"></path>
                <path d="M14.121 10.48a1 1 0 0 0-1.414 0l-.707.706a2 2 0 1 1-2.828-2.828l5.63-5.632a6.5 6.5 0 0 1 6.377 10.568l-2.108 2.135-4.95-4.95zM3.161 4.468a6.503 6.503 0 0 1 8.009-.938L7.757 6.944a4 4 0 0 0 5.513 5.794l.144-.137 4.243 4.242-4.243 4.243a2 2 0 0 1-2.828 0L3.16 13.66a6.5 6.5 0 0 1 0-9.192z"></path>
            </g>
        </svg>
        <x-bi-wrench-adjustable class="w-6 h-6 text-success" />
                    </span>

                </div>
            </a>

            @endif






        </div>
    </div>






    <div class="mx-auto mt-4 space-x-2 dark:bg-dark text-darker dark:text-light rounded-xl">


    <div dir="rtl" class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-darker ">
       الاحصائيات

    </div>

    <div dir="rtl" class="grid grid-cols-1 gap-8 p-4 lg:grid-cols-2 xl:grid-cols-4">
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

                <a href="   @if ($bussinse->department->type==1)
                   {{ route('mange.products', ['type'=>"bussinse",' bussinse_username'=>$bussinse->username]) }} @else
                   {{ route('mange.services', ['type'=>"bussinse",' bussinse_username'=>$bussinse->username]) }} @endif
                   ">
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
                    عدد الطلبات الواردة
                </h6>


                <span class="text-xl font-semibold">20,516</span>

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


    {{-- hhhhhhhh --}}

{{--
    <div x-data='{showForm:false}'>

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
                @foreach ($bussinse->cities??[] as $c)
                    <div class="p-1 rounded-lg dark:bg-white bg-dark text-light dark:text-dark">
                        {{$c->name}}
                    </div>
                @endforeach
            </div>
            <div class="flex flex-wrap space-x-2">
                <h6 class="mx-1 font-bold text-primary">الفئات  : </h6>
                @foreach ($bussinse->parts??[] as $c)
                    <div class="p-1 rounded-lg dark:bg-white bg-dark text-light dark:text-dark">
                        {{$c->name}}
                    </div>
                @endforeach
            </div>
            <div class="flex flex-col space-y-1">
                <h6 class="mx-1 font-bold text-primary">ارقام التواصل  : </h6>

                @if ($bussinse->phone_numbers !=null)


                @foreach ($bussinse->phone_numbers??[] as $p )
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
            <div class="flex flex-col mx-auto text-dark ">
                <x-label for="avatar" :value="__('صورة العرض الاساسية  ')" />

                <div id="avatar" class="rounded-md "></div>
            </div>
            <div class="flex flex-col mx-auto ">
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

    </div> --}}








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
