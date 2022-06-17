<x-dashe-layout>


    <div class="flex flex-col p-4 mx-auto my-auto bg-white rounded-lg md:max-w-4xl dark:bg-darker lg:p-4">

        <form method="POST"  action="{{route('b.store')}}" x-data='stpes'>
            @csrf
            <x-auth-validation-errors class="mb-4" :errors="$errors" />


            <div id="steps" class="flex flex-col items-center">

                <div id="step0" x-show="step==0">
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

                </div>

           <div id="stpe1"  x-show="step==1">
            <div class="space-y-2 " dir="auto">
                <x-label for="name" :value="__('الاسم')" />

                    <x-input id="name" class="block w-full" type="text" name="name"
                    value="{{old('name')}}"
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
                            value="{{old('email')}}" placeholder="{{ __('Email') }}" required autofocus />
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
                       value="{{old('username')}}" type="text" name="username"
                        placeholder="{{ __('Username') }}" required autofocus />
                    </x-input-with-icon-wrapper>
                </div>

            </div>



            <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:space-x-4">
                <div class="w-full space-y-2" x-data='{contact_count:3}'>
                    <x-label for="email" :value="__('ارقام التواصل ')" />

                    <template x-for="i in contact_count">

                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">

                            <x-heroicon-o-phone aria-hidden="true" class="w-5 h-5 text-primary-darker dark:text-primary-light" />



                        </x-slot>
                        <x-input withicon id="email" class="block w-full focus:ring-primary_color focus:border-primary_color"
                        type="text" name="phone_numbers[]"
                             placeholder="{{ __('+967') }}" required autofocus />
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
                       value="{{old('username')}}" type="text" name="contact_links[]"
                        placeholder="{{ __('facebook user or link') }}" required autofocus />
                    </x-input-with-icon-wrapper>
                    <x-input-with-icon-wrapper>
                        <x-slot name="icon" class="border border-1">

                            <span aria-hidden="true" class="w-5 h-5 text-primary-dark dark:text-primary-light" >@</span>



                        </x-slot>
                        <x-input withicon id="username" class="block w-full focus:ring-primary_color focus:border-primary_color"
                       value="{{old('username')}}" type="text" name="contact_links[]"
                        placeholder="{{ __('twitter username') }}" required autofocus />
                    </x-input-with-icon-wrapper>
                    <x-input-with-icon-wrapper>
                        <x-slot name="icon" class="border border-1">

                            <span aria-hidden="true" class="w-5 h-5 text-primary-dark dark:text-primary-light" >@</span>


                        </x-slot>
                        <x-input withicon id="username" class="block w-full focus:ring-primary_color focus:border-primary_color"
                       value="{{old('username')}}" type="text" name="contact_links[]"
                        placeholder="{{ __('whatsApp number') }}" required autofocus />
                    </x-input-with-icon-wrapper>


                </div>

            </div>

           </div>
         <div id="step0" x-show="step==2">
            <div class="flex flex-col p-8 mx-auto ">
                <x-label for="avatar" :value="__('صورة العرض الاساسية  ')" />

                <div id="avatar" class="rounded-md "></div>
            </div>
            <div class="flex flex-col p-8 mx-auto ">
                <x-label for="imgs" :value="__('صور عرض اضافية   ')" />

                <div id="imgs" class="rounded-md "></div>
            </div>


            <x-button >
                حفظ
            </x-button>

        </div>





           <div class="flex space-x-4 justify-items-stretch ">

            <x-button type="button" x-show="step>0" x-on:click="pervstep">
                السابق

               </x-button>
            <x-button type="button" x-show="step<5" x-on:click="nextstep">
                التالي
               </x-button>


           </div>

            </div>





        </form>



    </div>



    <slot name="script">
        <script src="{{asset('js/jquery.min.js')}}"></script>

        <script src="{{asset('js/uploadeimage.js')}}">

        </script>
<script>
            newimage=new ImagetoServer(
                {
                    url:"{{route('uploade')}}",
                    id:"avatar",
                    shep:"rect",
                    w:650,h:650,
                     src:"no"
        });
         imgs=new ImagetoServer(
                {
                    url:"{{route('uploade')}}",
                    id:"imgs",
                    shep:"rect",
                    w:650,h:650,
                     src:"no",
                     multi:true

        });


            const stpes=()=>{

                return {
                    step:0,

                    nextstep(){
                        this.step++;

                    },
                    pervstep(){
                        this.step--;

                    },


                    dataform:{
                        step0:{
                            department_id:0,
                        }
                        ,
                        step1:{
                            name:'',
                            username:'',
                            email:'',


                        },
                        step2:{

                        }

                    }





                }


            }


        </script>


    </slot>





</x-dashe-layout>
