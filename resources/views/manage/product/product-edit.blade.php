<x-dashe-layout>

    <div x-data="{step:1}"   class="md:max-w-4xl items-center p-4 mx-auto">

        <form action="{{ route('product.update',$product) }}" method="POST" class="rounded-lg bg-white dark:bg-darker" >

            @method('PUT')
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <x-auth-validation-errors class="mb-4" :errors="$errors" />


            @csrf
            <div dir="rtl" >


                <div class="" x-show='step==0'>

                </div>

                <div  class=" space-y-4 text-center" x-show='step==1'>






                    <input type="hidden" name="owner_id" value="{{ $product->owner_id}}"/>
                    <input type="hidden" name="owner_type" value="{{ $product->owner_type }}"/>

                @if ($product->owner_type=="App\Models\User")

                <livewire:dept-part-mulit-select selected="{{ $product->parts->pluck('id')->toArray() }}" dept="{{ $product->department_id }}" key="{{ time() }}">

                @else
                <div>
                    @include('components.mulit-select',[
                        'inputname'=>'parts',
                        'items'=>$product->owner->department->parts,
                        'id'=>'parts',
                        'lablename'=>'الفئات' ,
                        'selected'=> $product->parts->pluck('id')->toArray()
                            ])
                    </div>


                    <input type="hidden" name="department_id" value="{{ $product->depratment_id!=null?$product->depratment_id:$product->owner->department->id }}">


                @endif




            </div>


                <div  class=" " wire:ignore x-show="step==1">
                    <div class="grid gap-6 mb-6 lg:grid-cols-3 p-4">
                        <div>
                            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">اسم المنتج</label>
                            <input type="text" value="{{ $product->name }}"  name="name" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        </div>
                        <div>
                            <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">السعر</label>
                            <input type="number" value="{{ $product->price }}" name="price"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                        </div>
                        <div class="flex space-x-2 justify-between">

                            <div>
                            <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">سنة الصنع </label>

                            <select  name="year_created" class="rounded-xl bg-white appearance-none dark:bg-darker text-darker dark:text-light" id="">
                                @for($i =(int)(date('Y')); $i >1980; $i--)
                                <option  @if (strval($product->year_created)==$i)
                                    selected
                                @endif value="{{ $i }}">{{ $i }}</option>
                              @endfor
                            </select>
                            </div>
                            <div>
                            <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">الحالة</label>

                            <label>
                                مستخدم
                            <input  type="radio" @if ($product->status==0)
                                checked
                            @endif name="status" id="status" value="0" />
                        </label>
                        <label>
                            جديد
                            <input  type="radio" @if ($product->status==1)
                            checked
                        @endif  type="radio" name="status" id="status" checked value="1" />
                        </label>
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
                    <div class="flex ">
                        <div class="rounded-md flex flex-col w-1/4 border p-8 text-center  ">
                            <div  wire:ignore>
                                <x-label :value="__('صورة العرض الاساسية')" />

                            <div id="img">
                        </div>
                            </div>


                        </div>
                        <div wire:ignore class="px-2 w-3/4 text-center">
                        <x-label :value="__('صور اضافية للمنتج')" />

                        <div id="imgs">

                        </div>
                        </div>


                    </div>

                    <div class="px-2 space-y-2">
                        <x-label :value="__('وصف مختصر للمنتج')" />

                            <div id="discrip">@php
                                echo $product->discrip;
                            @endphp</div>
                    </div>


                            <div x-data='{note_count:0}' class="flex flex-col space-x-4 space-y-2">
                                <x-label :value="__('تفاصيل المنتج ')" />
                                @foreach ($product->note as $k=>$v)
                                <div class="flex space-x-2">
                                    <div class="w-1/4" ><input type="text" value="{{ $k }}" name="n_key[]" id="" class="w-full rounded-md text-info dark:text-light font-bold dark:bg-darker p-2" ></div>
                                    <div class="w-3/4"><input type="text" value="{{ $v }}" name="n_value[]" id="" class="w-full  rounded-md dark:text-light dark:bg-darker p-2"></div>
                                    </div>

                                @endforeach


                                <template x-for="i in note_count" >
                                    <div class="flex space-x-2">
                                    <div class="w-1/4" ><input type="text" name="n_key[]" id="" class="w-full rounded-md dark:text-light text-info font-bold dark:bg-darker p-2" ></div>
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
                         src:"{{ $product->img }}"
            });
              newimage=new ImagetoServer(
                    {
                        url:"{{route('uploade')}}",
                        id:"imgs",
                        w:850,h:850,
                         src:'@json( $product->imgs)',
                         multi:true,

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






</x-dashe-layout>
