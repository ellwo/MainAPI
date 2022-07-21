<div  x-show="showForm" class="flex flex-col p-6 mx-auto mt-4 overflow-hidden bg-white rounded-md shadow-md lg:w-2/3 dark:bg-darker ">
    <form action="{{route('b.update',['b'=>$bussinse])}}" method="POST">
        @csrf
        @method('PUT')
    <div class="flex flex-col p-8 mx-auto ">

                    <div class="relative inline-flex flex-col items-center mx-auto space-y-4">

                        <x-label for="department_id" :value="__('اختر القسم ')" />

                        <select name="department_id" class="h-10 pl-5 pr-10 text-gray-600 bg-white border border-gray-300 rounded-full appearance-none hover:border-gray-400 focus:outline-none">
                            @foreach( $catgraies??[] as $ca)
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
