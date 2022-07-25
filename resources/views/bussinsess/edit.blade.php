
<x-dashe-layout>

  <div class="flex flex-col justify-around w-full mx-auto"
                                                x-data="{ tap: 3 }">

                                                <div dir="rtl" class="flex m-4 mx-auto space-x-4">
                                                    <button type="button" x-on:click="tap=1"
                                                        :class="{
                                                            'border-2 text-light border-info bg-m_primary-dark hover:bg-m_primary hover:text-dark dark:bg-m_primary dark:text-dark': tap ==
                                                                1
                                                        }"
                                                        class="p-3 mx-8 text-xl font-bold border rounded-full cursor-pointer ">
                                                        الصور
                                                    </button>
                                                    <button type="button" x-on:click="tap=2"
                                                        :class="{
                                                            'border-2 text-light bg-m_primary-dark hover:bg-m_primary hover:text-dark dark:bg-m_primary dark:text-dark border-info': tap ==
                                                                2
                                                        }"
                                                        class="p-3 text-xl font-bold border rounded-full cursor-pointer ">
                                                        المعلومات
                                                    </button>
                                                    <button type="button" x-on:click="tap=3"
                                                        :class="{
                                                            'border-2 text-light bg-m_primary-dark hover:bg-m_primary hover:text-dark dark:bg-m_primary dark:text-dark border-info': tap ==
                                                                3
                                                        }"
                                                        class="p-3 text-xl font-bold border rounded-full cursor-pointer ">
                                                        الفروع
                                                    </button>




                                             </div>


                                             <div x-show="tap==3">
                                            @livewire('manage.bussinse-location', ['username' => $bussinse->username], key(time()))
                                             </div>


    <div x-show="tap==1" class="flex flex-col items-center w-full py-2 mx-auto space-y-2 rounded-xl ">

        <form dir="rtl" onsubmit="ajxaproform(event,this,'{{route('b.savechangeimgs')}}')">
            <input type="hidden" name="bussinse_username" value="{{$bussinse->username}}"/>

           <div class="lg:flex ">

            <div class="flex flex-col mx-auto lg:w-1/3 text-dark ">
            <x-label for="avatar" :value="__('صورة العرض الاساسية  ')" />

            <div id="avatar" class="rounded-md "></div>
        </div>
        <div class="flex flex-col mx-auto lg:w-2/3 ">
            <x-label for="imgs" :value="__('صور عرض اضافية   ')" />

            <div id="imgs" class="rounded-md "></div>
        </div>

    </div>
        <x-button variant="success">
            حفظ التعديلات

        </x-button>
        </form>




    </div>

<div x-show="tap==2"  class="flex flex-col p-6 mx-auto mt-4 overflow-hidden bg-white rounded-md shadow-md lg:w-2/3 dark:bg-darker ">

    <span dir="rtl" class="flex p-2 space-x-4 text-right bg-white rounded-full text-danger">
        <b class="text-2xl font-bold text-danger-darker">ملاحظة !  </b><br>
        عند تغيير قسم الحساب التسويقي الحالي سيتم تغيير القسم والفئات بنسبة لجميع العروض التابعة لهذا الحساب
    </span>

    <form action="{{route('b.update',['b'=>$bussinse])}}" method="POST">
        @csrf
        @method('PUT')
    <div dir="rtl" class="flex flex-col p-8 mx-auto lg:flex lg:flex-row ">

                    <div class="relative inline-flex flex-col items-center mx-auto space-y-4">

                        <x-label for="department_id" :value="__('اختر القسم ')" />

                        <select name="department_id" class="h-10 pl-5 pr-10 text-gray-600 bg-white border border-gray-300 rounded-full appearance-none hover:border-gray-400 focus:outline-none">
                            @foreach( $catgraies??[] as $ca)
                            <option @if ($ca->id==$bussinse->department?->id)
                                selected
                            @endif value="{{$ca->id}}">{{$ca->name}}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="flex flex-col items-center mx-auto">
                        @include('components.mulit-select',
                        ['id'=>'part',
                        'inputname'=>'parts',
                        'items'=>$bussinse->department?->parts,
                        'lablename'=>'الفئات',
                        'selected'=>$bussinse->parts?->pluck('id')->toArray()

                        ])
            </div>





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

    @foreach ($bussinse->phone_numbers??[] as $p)

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
<div  dir="rtl" class="w-full h-64 px-2 mx-auto space-y-2 text-darker md:w-2/3">
    <x-label :value="__('البايو /نبذة عن الحساب ')" />
    <textarea
    name="note" id="note"
     class="w-full px-2 py-1 mr-2 text-black text-opacity-50 rounded shadow appearance-none dark:text-darker dark:bg-darker ckeditor focus:outline-none focus:shadow-outline focus:border-primary" >
    @php
     echo old('note');
    @endphp
     </textarea>
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

<x-slot name="script">
    <script src="{{asset('js/jquery.min.js')}}"></script>

    <script src="{{asset('js/uploadeimage.js')}}"></script>

<script>

newimage=new ImagetoServer(
            {
                url:"{{route('uploade')}}",
                id:"avatar",
                    mx_w:1400,mx_h:800,
                 src:"{{$bussinse->avatar}}",
                 shep:'rect'
    });
     imgs=new ImagetoServer(
            {
                url:"{{route('uploade')}}",
                id:"imgs",
                shep:"rect",
                mx_w:1400,mx_h:800,
                w:650,h:650,
                 src:'@json($bussinse->imgs)',
                 multi:true

    });

        ClassicEditor
    .create( document.querySelector( '#note' ), {
        language: {
            // The UI will be English.
            ui: 'ar',

            // But the content will be edited in Arabic.
            content: 'ar'
        }  ,
         removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed'],

    } )
    .then( editor => {
        window.editor = editor;
    } )
    .catch( err => {
        console.error( err.stack );
    } );
</script>
</x-slot>

</x-dashe-layout>
