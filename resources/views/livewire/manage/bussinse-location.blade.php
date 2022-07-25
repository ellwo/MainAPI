<div x-data='{open_delete:false}'>

    <div x-show="open_delete" class="absolute flex flex-col p-8 space-y-4 bg-white rounded-md top-24 right-1/2">
        <span class="w-full text-danger">تنويه</span>
        <hr>
        هل انت متاكد من الحذف ؟
        <div class="flex justify-between space-x-2">
  <x-button variant='success' wire:click='deleted_l({{ $deleted_loc }})' @click='open_delete=false' >تأكيد</x-button>
  <x-button variant='danger' @click="open_delete=false" > الغاء</x-button>
        </div>
    </div>

    <div>
        <div class="p-4 border border-blue-600 rounded-xl" dir="rtl" >
            <h5>
                بيانات الفرع
            </h5>
            <hr>
            <br>

        <div class="relative flex-wrap justify-between space-x-2 sm:flex " dir="rtl">

            <div class="mx-2 space-y-4">
                <x-label for="department_id" :value="__('السوق')" />
                <select wire:model.lazy='loc.markt_id'   name="markt_id[]" class="pl-5 pr-10 text-gray-600 bg-white border border-gray-300 rounded-md appearance-none hover:border-gray-400 focus:outline-none">
                   @foreach( $cities->first()->markts as $ca)
                   <option  value="{{$ca->id}}">{{$ca->name}}</option>
                   @endforeach

                </select>
            </div>
             <div class="space-y-4 sm:w-2/4">
                <x-label for="department_id" :value="__('العنوان')" />

                <input  wire:model.lazy='loc.address' name="locs_address" class="w-full py-2 pl-5 pr-10 text-gray-600 bg-white border border-gray-300 rounded-md appearance-none hover:border-gray-400 focus:outline-none"/>
            </div>
            <div class="space-y-4" dir="ltr" x-data='{locscontact_count:1}'>
                <x-label for="department_id" :value="__('ارقام الهاتف الخاصة بالفرع')" />

                <div class="flex flex-col space-y-2">




                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">

                            <x-heroicon-o-phone aria-hidden="true" class="w-5 h-5 text-primary-darker dark:text-primary-light" />



                        </x-slot>
                        <x-input wire:model.lazy='phone1' withicon id="email" class="block w-full focus:ring-primary_color focus:border-primary_color"
                        type="text" name="locs_phone[]"
                             placeholder="{{ __('+967') }}"   />


                        </x-input-with-icon-wrapper>

                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">

                            <x-heroicon-o-phone aria-hidden="true" class="w-5 h-5 text-primary-darker dark:text-primary-light" />



                        </x-slot>
                        <x-input wire:model.lazy='phone2' withicon id="email" class="block w-full focus:ring-primary_color focus:border-primary_color"
                        type="text" name="locs_phone[]"
                             placeholder="{{ __('+967') }}"   />


                        </x-input-with-icon-wrapper>

                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">

                            <x-heroicon-o-phone aria-hidden="true" class="w-5 h-5 text-primary-darker dark:text-primary-light" />



                        </x-slot>
                        <x-input wire:model.lazy='phone3' withicon id="email" class="block w-full focus:ring-primary_color focus:border-primary_color"
                        type="text" name="locs_phone[]"
                             placeholder="{{ __('+967') }}"   />


                        </x-input-with-icon-wrapper>

                <div class="mx-auto text-center">
                    <x-button x-show="locscontact_count<3" type="button" x-on:click="locscontact_count++" class="mx-auto" variant="goset">
                        <x-heroicon-o-plus class="w-4 h-4 text-success"/> اضافة رقم

                    </x-button>
                    </div>
                                    </div>
            </div>

          </div>


          <div  class="flex justify-center w-full p-2 mx-auto mt-4 text-center " >

            @if ($update==false)

            <button x-on:click="$wire.save()"  class="flex p-4 px-8 m-5 mx-auto text-xl font-bold text-center text-white rounded-md bg-success dark:text-white" >
                حفظ الفرع
                    <x-heroicon-s-save class="w-8 h-8"/>
                </button>
            @else

            <button x-on:click="$wire.updateloc()"  class="flex p-4 px-8 m-5 mx-auto text-xl font-bold text-center text-white bg-yellow-500 rounded-md dark:text-white" >
                حفظ التعديلات
                    <x-heroicon-s-save class="w-8 h-8"/>
                </button>
            @endif


        </div>
        </div>



    </div>



    <div class="flex flex-col w-full mx-auto overflow-x-scroll md:overflow-x-hidden ">
        <table class="table px-4 space-y-6 text-xs border-separate md:min-w-full sm:text-sm text-dark dark:text-light">
            <thead class=" dark:text-light bg-light dark:bg-dark">
                <tr>
                    <th class="p-3 text-left">عنوان الفرع</th>
                    <th class="p-3 text-left">المدينة /السوق</th>
                    <th class="p-3 text-left">ارقام التواصل</th>
                    <th class="p-3 text-left">تاريخ </th>
                    <th class="p-3 text-left">عمليات</th>
                </tr>
            </thead>
            <tbody class="">

                @foreach ($locs as $l)

                <tr class="bg-white dark:bg-dark">
                    <td class="p-3">
                        <div class="flex align-items-center">
                            <div class="ml-3">
                                {{ $l->address }}
                            </div>
                        </div>
                    </td>
                    <td class="p-3">
                       {{ $l->markt?->city?->name }}
                       <hr>
                       {{ $l->markt?->name }}
                    </td>
                    <td class="p-3 font-bold">
                        @foreach ($l->phone??[] as $p)
                <p class="flex mt-2 space-x-2 text-sm text-slate-500">
                    {{ $p }} <x-heroicon-s-phone class="w-5 h-5 mx-2 text-blue-700"/>
                </p>
                        @endforeach

                </td>

                    <td class="p-3">
                        {{$l->created_at}}
                    </td>
                    <td class="p-3 ">

                        <a  @click="open_delete=true; $wire.set('deleted_loc',{{ $l->id }})"
                            class="ml-2 cursor-pointer text-danger-light hover:text-danger">
                            <i class="text-base material-icons-round">delete_outline</i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>




</div>
