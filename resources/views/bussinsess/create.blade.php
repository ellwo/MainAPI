<x-dashe-layout>


    <div class="flex flex-col p-4 mx-auto my-auto mb-8 space-y-4 bg-white rounded-lg dark:bg-darker lg:p-4" x-data='stpes'>

        <form method="POST" x-init="setUp"  action="{{route('b.store')}}" >
            @csrf
            <x-auth-validation-errors class="mb-4" :errors="$errors" />


            <div id="steps" class="flex-col items-center justify-center p-0 mx-auto lg:w-3/4">

                <div id="step0"    x-transition:enter="transition  opacity-25 duration-500 ease-in-out"
                 x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="transition opacity-25 translate-x-0 duration-500 ease-in-out"
                           x-show="step==0">
                    <div class="flex flex-col p-8 mx-auto space-y-4 " dir="auto">

                        <h1 class="text-3xl font-bold dark:text-white text-darker">
                            تحديد نوع الحساب التسويقي
                            
                        </h1>
                        <hr>

                        @livewire('dept-part-mulit-select',[
                            'dept'=>old('department_id')!=null? old('department_id'):'any',
                            'selected'=>old('parts')!=null ? explode(',',old('parts')):[] ])





                    </div>


            </div>

           <div id="stpe1"    x-transition:enter="transition  opacity-25 duration-500 ease-in-out"
           x-transition:enter-start="opacity-0"
          x-transition:enter-end="opacity-100" x-transition:leave="transition opacity-25 translate-x-0 duration-500 ease-in-out"
                  x-show="step==1">
                  <h1 dir="rtl" class="space-y-4 text-3xl font-bold dark:text-white text-darker">
                    المعلومات الاساسية
                </h1>
                <hr>
                <br>
                <div class="flex flex-col p-8 mx-auto ">
                    <x-label for="avatar" :value="__('صورة العرض الاساسية  ')" />

                    <div id="avatar" class="border rounded-full "></div>
                </div>
                <br>

            <div class="space-y-2 " dir="auto">
                <x-label for="name" :value="__('اسم الحساب التسويقي')" />

                    <x-input x-model='dataform.name' id="name" class="block w-full" type="text" name="name"
                    placeholder="{{ __('اسم الحساب التسويقي') }}" required autofocus />
                     @error('name')
                         <span x-init="step=1" class="text-sm text-danger">{{ $message }}</span>
                     @enderror
            </div>

            <div class="flex flex-col space-y-8 md:space-y-0 md:flex-row md:space-x-4">
                <div class="w-full space-y-2 ">
                    <x-label for="email" dir="rtl" :value="__('الايميل')" />

                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">

                            <x-heroicon-o-mail aria-hidden="true" class="w-5 h-5 text-primary-darker dark:text-primary-light" />



                        </x-slot>
                        <x-input x-model='dataform.email' withicon id="email" class="block w-full focus:ring-primary_color focus:border-primary_color" type="email" name="email"
                             placeholder="{{ __('Email') }}" required autofocus />

                        </x-input-with-icon-wrapper>  @error('email')
                         <span x-init="step=1" class="text-sm text-danger">{{ $message }}</span>
                     @enderror
                </div>
                <div class="w-full space-y-2">
                    <x-label for="username" :value="__('اسم المستخدم')" />

                    <x-input-with-icon-wrapper>
                        <x-slot name="icon" class="border border-1">

                            <span aria-hidden="true" class="w-5 h-5 text-primary-dark dark:text-primary-light" >@</span>



                        </x-slot>
                        <x-input withicon id="username" class="block w-full focus:ring-primary_color focus:border-primary_color"
                       x-model='dataform.username'  type="text" name="username"
                        placeholder="{{ __('Username') }}" required autofocus />
                    </x-input-with-icon-wrapper>
                    @error('name')
                    <span x-init="step=1" class="text-sm text-danger">{{ $message }}</span>
                @enderror
                </div>

            </div>



            <br>


           </div>
           <div x-show="step==2">
            <h1 dir="rtl" class="text-3xl font-bold dark:text-white text-darker">
                معلومات التواصل
            </h1>
            <hr>
            <br>
            <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:space-x-4">

                <div class="w-full space-y-2 " x-data='{contact_count:1}'>
                    <x-label for="email" :value="__('ارقام التواصل ')" />

                    <template x-for="i in contact_count">

                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">

                            <x-heroicon-o-phone aria-hidden="true" class="w-5 h-5 text-primary-darker dark:text-primary-light" />



                        </x-slot>
                        <x-input withicon id="email" class="block w-full focus:ring-primary_color focus:border-primary_color"
                        type="text" name="phone_numbers[]"
                             placeholder="{{ __('+967') }}"  autofocus />
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



                <div class="w-full space-y-2 " >
                    <x-label for="username" :value="__('روابط مواقع التواصل ')" />



                    <x-input-with-icon-wrapper>
                        <x-slot name="icon" class="border border-1">

                            <x-bi-facebook class="w-5 h-5 text-blue-900 dark:text-primary-light" />



                        </x-slot>
                        <x-input withicon id="username" class="block w-full focus:ring-primary_color focus:border-primary_color"
                       value="{{old('username')}}" type="text" name="contact_links[]"
                        placeholder="{{ __('facebook user or link') }}"  autofocus />
                    </x-input-with-icon-wrapper>
                    <x-input-with-icon-wrapper>
                        <x-slot name="icon" class="border border-1">

                            <x-bi-twitter class="w-5 h-5 text-info " />



                        </x-slot>
                        <x-input withicon id="username" class="block w-full focus:ring-primary_color focus:border-primary_color"
                       value="{{old('username')}}" type="text" name="contact_links[]"
                        placeholder="{{ __('twitter username') }}"  autofocus />
                    </x-input-with-icon-wrapper>
                    <x-input-with-icon-wrapper>
                        <x-slot name="icon" class="border border-1">

                            <x-bi-whatsapp aria-hidden="true" class="w-5 h-5 text-green-900 "/>


                        </x-slot>
                        <x-input withicon id="username" class="block w-full focus:ring-primary_color focus:border-primary_color"
                       value="{{old('username')}}" type="text" name="contact_links[]"
                        placeholder="{{ __('whatsApp number') }}"  autofocus />
                    </x-input-with-icon-wrapper>


                </div>

            </div>

            <br>
            <hr>
            <br>
            <div x-data="{loc_count:0}" class="space-y-4">
                <h4 dir="rtl" class="text-xl font-bold dark:text-white text-darker">
                    العناوين
                    <hr dir="rtl" class="w-1/5 text-right "/>

                </h4>



                <div class="p-4 border border-blue-600 rounded-xl" dir="rtl" >
                    <h5>
                        الفرع الرئيسي
                    </h5>
                    <hr>
                    <br>

                <div class="relative flex-wrap justify-between space-x-2 sm:flex " dir="rtl">

                    @livewire('city-markt-select', ['city' => auth()->user()->city_id!=null?auth()->user()->city_id:'any'], key(time()))
                     <div class="space-y-4">
                        <x-label for="department_id" :value="__('العنوان')" />

                        <input   name="address[]" class="py-2 pl-5 pr-10 text-gray-600 bg-white border border-gray-300 rounded-md appearance-none hover:border-gray-400 focus:outline-none"/>
                    </div>
                    <div class="space-y-4">
                        <x-label for="department_id" :value="__('رقم الهاتف')" />

                        <input   name="phone[]" class="py-2 pl-5 pr-10 text-gray-600 bg-white border border-gray-300 rounded-md appearance-none hover:border-gray-400 focus:outline-none"/>
                    </div>

                  </div>


                </div>



                    @for ($i=1; $i<=3; $i++)

                    <div x-show="loc_count>={{ $i }}" class="p-4 border border-blue-600 rounded-xl" dir="rtl" >
                        <h5 >
                            {{ 'فرع رقم['.($i+1).']' }}
                        </h5>
                        <hr>
                        <br>

                    <div class="relative flex-wrap justify-between space-x-2 sm:flex " dir="rtl">
                        @livewire('city-markt-select', ['city' => auth()->user()->city_id!=null?auth()->user()->city_id:'any'], key(time()))
                         <div class="space-y-4">
                            <x-label for="department_id" :value="__('العنوان')" />

                            <input   name="address[]" class="py-2 pl-5 pr-10 text-gray-600 bg-white border border-gray-300 rounded-md appearance-none hover:border-gray-400 focus:outline-none"/>
                        </div>
                        <div class="space-y-4">
                            <x-label for="department_id" :value="__('رقم الهاتف')" />

                            <input   name="phone[]" class="py-2 pl-5 pr-10 text-gray-600 bg-white border border-gray-300 rounded-md appearance-none hover:border-gray-400 focus:outline-none"/>
                        </div>

                      </div>


                    </div>

                    @endfor


                <div x-show="loc_count<4" class="flex mx-auto text-center">
                <button type="button" x-on:click="loc_count++" class="flex p-2 mx-auto text-green-900 border border-green-900 dark:bg-white rounded-xl">
                    اضافة فرع
                    <x-heroicon-o-plus class="w-5 h-5 text-green-900 border "/>
                </button>
                </div>







            </div>


            <div  class="flex justify-center w-full p-2 mx-auto mt-4 text-center " x-show="step==2">
                <button   class="flex p-4 px-8 m-5 mx-auto text-xl font-bold text-center text-white rounded-md bg-success dark:text-white" >
                   انشاء الحساب
                    <x-heroicon-s-save class="w-8 h-8"/>
                </button>


            </div>

           </div>
         <div id="step0" class="flex flex-col space-y-4"
         x-transition:enter="transition  opacity-25 duration-500 ease-in-out"
         x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition opacity-25 translate-x-0 duration-500 ease-in-out"

         class="flex justify-between" x-show="step==1">
            <div class="flex flex-col p-8 mx-auto ">
                <x-label for="imgs" :value="__('صور عرض اضافية   ')" />

                <div id="imgs" class="rounded-md "></div>
            </div>


        </div>








            </div>





        </form>

        <div dir="rtl" class="flex items-end justify-between w-1/2 mx-auto ">

            <x-button  variant="info" type="button" x-show="step<5" x-on:click="nextstep">
                التالي
               </x-button>
            <x-button  variant="goset" type="button" x-show="step>0" x-on:click="pervstep">
                السابق

               </x-button>


           </div>


    </div>




    <x-slot name="script">
        <script src="{{asset('js/jquery.min.js')}}"></script>

        <script src="{{asset('js/uploadeimage.js')}}">

        </script>

<script>


            newimage=new ImagetoServer(
                {
                    url:"{{route('uploade')}}",
                    id:"avatar",
                    shep:"rect",
                    w:850,h:850,
                     src:"{{ old('avatar') }}"
        });
         imgs=new ImagetoServer(
                {
                    url:"{{route('uploade')}}",
                    id:"imgs",
                    shep:"rect",
                    w:650,h:650,
                     src:'@json(old("imgs"))',
                     multi:true

        });


            const stpes=()=>{

                return {
                    step:{{ isset($step)?$step:0 }},

                    nextstep(){
                        this.step++;

                    },
                    pervstep(){
                        this.step--;

                    },
                    errors:{
                        step:0
                    },
                    setUp(){
//                        this.step=this.errors.step;

                    },


                    dataform:{
                            name:'{{ old("name") }}',
                            username:'{{ old("username") }}',
                            email:'{{ old("email") }}',


                    }





                }


            }


        </script>


    </x-slot>





</x-dashe-layout>
