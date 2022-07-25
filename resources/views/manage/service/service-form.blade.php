<div x-data="{step:1}"   class=" items-center p-4 mx-auto">

    <form action="{{ route('service.store') }}" method="POST" class="rounded-lg bg-white dark:bg-darker" >

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <x-auth-validation-errors class="mb-4" :errors="$errors" />


        @csrf
        <div dir="rtl" >


            <div class="" x-show='step==0'>
            </div>

            <div  class=" space-y-4 text-center" x-show='step==1'>




                @if ($type=="me")

                <input  type="hidden" name="owner_id" value="{{ auth()->user()->id }}"/>
                <input  type="hidden" name="owner_type" value="App\Models\User"/>

                @livewire('dept-part-mulit-select', ['type' => 2,'selected'=>[],'dept'=>'any'], key(time()))

                @else

                <input type="hidden" name="owner_id" value="{{$bussinse->id}}"/>
                <input type="hidden" name="department_id" value="{{$bussinse->department->id}}"/>

                <input type="hidden"  name="owner_type" value="App\Models\Bussinse"/>
                <div>
                @include('components.mulit-select',[
                    'inputname'=>'parts',
                    'items'=>$bussinse->department->parts,
                    'id'=>'parts',
                    'lablename'=>'الفئات' ,
                    'selected'=>$bussinse->parts->pluck('id')->toArray()
                                   ])
                </div>



                @endif


        </div>


            <div  class=" " wire:ignore x-show="step==1">
                <div class="grid gap-6 mb-6 lg:grid-cols-2 p-4">
                    <div>
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">اسم الخدمة</label>
                        <input type="text" value="{{ old('name')}}"  name="name" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">مدة الحجز </label>
                        <hr>

                        <div dir="ltr" class="custom-number-input text-center h-10 w-32" x-data="{qun:1}">
                            <label for="custom-input-number" class="w-full text-gray-700 dark:text-light text-sm font-semibold">{{__('عدد الايام')}}
                            </label>
                            <div class="flex flex-row h-10 w-full rounded-lg relative bg-transparent mt-1">
                                <button type="button" @click="qun--" class=" bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                                    <span class="m-auto text-2xl font-thin">−</span>
                                </button>
                                <input  value="{{ old('how_long') }}" x-model="qun" name="how_long" type="text" class=" focus:outline-none text-center w-full bg-gray-300 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none appearance-none" name="custom-input-number" />
                                <button type="button" @click="qun++" class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                                    <span class="m-auto text-2xl font-thin">+</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="flex space-x-4">

                        <div class="mx-2">
                        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">السعر</label>
                        <input type="number" value="{{ old('price') }}" name="price"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                        </div>
                       <div class="mx-2">
                        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">اقل مبلغ للحجز</label>
                        <input type="number" value="{{ old('min_pyment') }}" name="min_pyment"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                       </div>

                    </div>



                       <x-slot name="script">



                        <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                        <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.25.1/trumbowyg.min.js"></script>
                      <script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.25.1/langs/ar.min.js"></script>
                      <script>
                            $(document).ready(function() {
                                $('#discrip').trumbowyg({
                                    lang: 'ar'
                                });
                            });
                          </script>
                       </x-slot>




                </div>

                <div class="lg:flex space-x-2 ">

                    <div class="lg:w-1/3">

                <div class="rounded-md border p-8 text-center  ">
                    <div  wire:ignore>
                        <x-label :value="__('صورة العرض الاساسية')" />

                    <div id="img">
                </div>
                    </div>


                </div>
                    </div>
                    <div class="lg:w-2/3">

            <div wire:ignore class="px-2 text-center">
                <x-label :value="__('صور اضافية للخدمة')" />

                <div id="imgs">

                </div>
                </div>
                    </div>




                </div>


                <div class="px-2 space-y-2">
                    <x-label :value="__('وصف مختصر للخدمة')" />

                        <div id="discrip">@php
                            echo old('discrip');
                        @endphp</div>
                </div>


                        <div x-data='{note_count:2}' class="flex flex-col space-x-4 space-y-2">

                            <x-label :value="__('تفاصيل الخدمة ')" />

                            <template x-for="i in note_count" >
                                <div class="flex space-x-2">
                                <div class="w-1/4" ><input type="text" name="n_key[]" id="" class="w-full rounded-md dark:text-light font-bold dark:bg-darker p-2" ></div>
                                <div class="w-3/4"><input type="text" name="n_value[]" id="" class="w-full  rounded-md dark:text-light dark:bg-darker p-2"></div>
                                </div>


                            </template>


                            <x-button variant="success" @click="note_count++" class="mx-auto" type="button">
                               اضافة
                                <x-heroicon-o-plus class="w-4"/>
                            </x-button>




                        </div>

                        <div class="m-5 mx-auto text-center">
                            <x-button variant="success" @click="note_count++" class="mx-auto" >
                                حفظ
                                 <x-heroicon-o-plus class="w-4"/>
                             </x-button>


                        </div>





    <slot name="script">

        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/uploadeimage.js') }}"></script>
        <script>
             newimage=new ImagetoServer(
                {
                    url:"{{route('uploade')}}",
                    id:"img",
                    w:850,h:850,
                     src:"{{ old('img') }}"
        });
          newimage=new ImagetoServer(
                {
                    url:"{{route('uploade')}}",
                    id:"imgs",
                    w:850,h:850,
                     src:'@json(old("imgs"))',
                     multi:true
        });
        </script>

    </slot>
            </div>

{{--
            <div  class="flex w-1/2 mx-auto justify-between mt-4 ">

                <x-button x-show="step<2" type="button" class="block" variant="success" @click="step=step+1; $wire.set('step',{{ $step+1 }})" >التالي </x-button>

                @if($step > 0 )

                <x-button  type="button" @click="step=step-1; $wire.set('step',{{ $step-1 }})" variant="info" >السابق </x-button>

                @endif

            </div> --}}
        </div>




    </form>


</div>
