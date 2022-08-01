<x-bussinse-layout>
<div class="dark:bg-darker" x-data={img:'{{ $bussinse->avatar }}',openmodel:false,product:[],image:''}>
    <x-slot name="title">
        <title>{{ $bussinse->name }}</title>
    </x-slot>

<x-navbar/>






    <div dir="rtl"
    class="sticky top-0 z-10 transition-transform duration-500 sm:mb-0"
:class="{
    '-translate-y-full': scrollingDown,
    'translate-y-0 top-28': scrollingUp,
}">
   <div class="w-full max-w-4xl mx-auto bg-white border-b dark:bg-m_primary-darker text-primary-darker dark:text-primary">
        <div x-data="{ open: false }" class="flex flex-col max-w-screen-xl p-5 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
            <div class="flex flex-row items-center justify-between lg:justify-start">
                <a  class="text-lg font-bold tracking-tighter transition duration-500 ease-in-out transform tracking-relaxed lg:pr-8">

                    {{ $bussinse->name }}
                </a>
                <br>


                    <button type="button" class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-8 h-8">
                        <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" style="display: none"></path>
                    </svg>
                </button>
            </div>
            <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow hidden md:flex md:justify-end md:flex-row">
                <ul class="space-y-2 list-none lg:space-y-0 lg:items-center lg:inline-flex">

                    <li>
                        <div class="mt-3 rounded-lg sm:mt-0">
                            @auth

                            @if ($bussinse->user->id ==auth()->user()->id)
                            @else


                            @if (auth()->user()->isFollowing($bussinse))

                            <div x-data='{showform2:false}'>
                                <form x-show="showform2"  x-data="ContactForm({{$bussinse->id}},'follow','متابعة')"  @submit.prevent="submitForm({{$bussinse->id}},'follow')">
                                    @csrf
                                <div    >
                                       <button @click='showform2=false' class="bg-success flex text-white rounded-xl p-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8  h-8 " viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path
                                                    d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z">
                                                </path>
                                            </svg>
                                            <span >متابعة</span>

                                            </button>

                                        <p class="">{{$bussinse->followers_b_count}}</p>

                                </div>

                            </form>



                            <form x-show="!showform2" x-data="ContactForm({{$bussinse->id}},'unfollow','الغاء المتابعة')" @submit.prevent="submitForm({{$bussinse->id}},'unfollow')">
                                <div   >
                                 <button @click='showform2=true' class="bg-danger-darker text-white flex rounded-xl p-2">

                                     <x-bi-person-dash-fill class="h-8 w-8 text-light" />
                                        <span class="" >الغاء المتابعة</span>

                                 </button>


                                </div>

                                 </form>
                                </div>
                            @else

                            <div x-data='{showform2:false}'>
                            <form x-show="!showform2"  x-data="ContactForm({{$bussinse->id}},'follow','متابعة')"  @submit.prevent="submitForm({{$bussinse->id}},'follow')">
                                @csrf
                            <div    >
                                   <button @click='showform2=true' class="bg-success flex text-white rounded-xl p-2">
                                       <x-bi-person-plus class="h-8 w-8"/>
                                        <span >متابعة</span>

                                        </button>

                            </div>

                        </form>



                        <form x-show="showform2" x-data="ContactForm({{$bussinse->id}},'unfollow','الغاء المتابعة')" @submit.prevent="submitForm({{$bussinse->id}},'unfollow')">
                            <div   >
                             <button @click='showform2=false' class="bg-danger-darker text-white flex rounded-xl p-2">

                                 <x-bi-person-dash-fill class="h-8 w-8 text-light" />
                                    <span class="" >الغاء المتابعة</span>

                             </button>


                            </div>

                             </form>
                            </div>


                            @endif


                            @endif

                            @endauth


                            {{-- <button class="flex items-center px-2 py-4 text-base font-medium text-center text-white transition duration-500 ease-in-out transform bg-primary rounded-xl hover:bg-primary-darker hover:text-light focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-darker">متابعة الحساب <x-bi-plus class="w-8 h-8"/></button>
                         --}}
                        </div>
                         </li>
                    <li>
                      <div class="mt-3 rounded-lg sm:mt-0 sm:mr-3">
                        <form method="POST" action="{{route('create_chatroom')}}">
                            @csrf
                            <input type="hidden" name="chatable_id" value="{{$bussinse->username}}" />
                            <input type="hidden" name="type" value="Bussinse" />
                        <button type="submit" class="items-center  px-2 py-3.5 text-base font-medium text-center text-primary  hover:text-darker hover:bg-white transition duration-500 ease-in-out transform border-2 border-white shadow-md rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 flex">تواصل معنا الان  <x-bi-chat-fill class="w-8 h-8 mx-2 text-blue-500"/></button>
                        </form>
                    </div>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    </div>

    <section >
        <div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 md:px-12 lg:px-24 lg:py-12">
          <div class="flex flex-wrap items-center mx-auto max-w-7xl">
            <div class="w-full lg:max-w-xl lg:w-1/2 rounded-xl">
              <div>
                <div class="relative w-full max-w-lg">
                  <div class="absolute top-0 rounded-full bg-violet-300 -left-4 w-72 h-72 mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>

                  <div class="absolute rounded-full bg-fuchsia-300 -bottom-24 right-20 w-72 h-72 mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
                  <div class="relative">
                    <img class="object-cover object-center mx-auto rounded-lg shadow-2xl" alt="hero" src="{{ $bussinse->avatar }}">
                  </div>
                </div>
              </div>
            </div>
            <div dir="rtl" class="flex flex-col items-start mt-12 mb-16 text-right lg:flex-grow lg:w-1/2 lg:pl-6 xl:pl-24 md:mb-0 xl:mt-0">

              <h1 dir="rtl" class="mb-8 text-4xl font-bold leading-none tracking-tighter text-neutral-600 lg:text-4xl">{{ $bussinse->name }}</h1>
              <span class="flex mb-8 text-xs font-bold tracking-widest text-blue-600 uppercase">

                @for ($i = 1; $i <= $bussinse->ratingsAvg_(); $i++)

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                    class="w-5 h-5 text-yellow-500">
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                    </path>
                </svg>
                @endfor
                @for ($i = 0; $i < 5-$bussinse->ratingsAvg_(); $i++)

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" class="w-5 h-5 text-yellow-500">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                    </path>
                </svg>
                @endfor
            </span>

            <a href="{{ route('report.create', ['reportable_id'=>$bussinse->id,'reportable_type'=>'App\Models\Bussinse']) }}" class="text-xs border rounded-md bg-danger-lighter p-1 flex">
                بلاغ
                <x-bi-info class="h-6 w-6 text-danger"/>
            </a>
              <p class="mb-8 text-base leading-relaxed text-right text-gray-500">@php
                  echo $bussinse->note;
              @endphp
              </p>

              <div class="mt-0 lg:mt-2   max-w-7xl sm:flex">
                @foreach ($bussinse->phone_numbers??[] as $p)

                <div dir="rtl" class="flex mx-2 mt-3 space-x-4 text-blue-900 rounded-lg sm:mt-0">
                    <span>{{ $p }}</span>
                    <x-heroicon-s-phone class="w-8 h-8 text-blue-700"/>
                </div>
                @endforeach



              </div>
            </div>

            <div class="sm:flex text-center w-full mt-4 overflow-x-scroll ">
            @foreach ($bussinse->imgs??[] as $img)
            <div class="w-64 h-64 mx-4 my-4">
                <div class="relative w-full max-w-lg">
                  <div class="relative">
                    <img x-on:click="img='{{ $img }}';openmodel=true;" class="object-cover object-center mx-auto rounded-lg shadow-2xl cursor-pointer" alt="hero" src="{{ $img }}">
                  </div>
                </div>
              </div>
            @endforeach
            </div>




          </div>
        </div>
      </section>
      <section class="mb-4">
        <div class="px-4 py-12 mx-auto bg-white border rounded-md shadow-md text-darker dark:bg-dark dark:text-light max-w-7xl sm:px-6 md:px-12 lg:px-24 lg:py-24">
          <div  class="flex flex-wrap items-center mx-auto text-right max-w-7xl">

            <div dir="rtl" class="flex items-end w-full text-right">
            <h1  class="text-4xl font-bold ">المنتجات</h1>
            </div>
            <hr>
            <br>


            @livewire('show.products-serveces', ['username' => $bussinse->username,'type'=>'bussinse',$proORserv=$bussinse->department->type==1?'pro':'serv'], key($user->id."okkkk"))


    </div>

        </div>
      </section>

      @if ($bussinse->locations->count()!=0)

      <section class="mb-4">
        <div class="px-4 py-12 mx-auto bg-white border rounded-md shadow-md text-darker dark:bg-dark dark:text-light max-w-7xl sm:px-6 md:px-12 lg:px-24 lg:py-24">
            <div  class="flex flex-wrap items-center mx-auto text-right max-w-7xl">

              <div dir="rtl" class="flex items-end w-full text-right">
              <h1  class="text-4xl font-bold ">العناوين </h1>
              </div>
              <hr>
              <br>


            @foreach ($bussinse->locations as $lo)
            <div class="flex flex-col mx-2 items-center border rounded-xl  p-10 text-center cursor-pointer group hover:bg-slate-50">
                <span class="p-5 text-white bg-indigo-500 rounded-full shadow-lg shadow-indigo-200">
                    <x-bi-map class="h-10 w-10"/>
                </span>
                    <br>
                    <p>{{ $lo->markt->city?->name }}</p>
                 <p>{{ $lo->markt->name }}</p>
                <p class="mt-3 text-xl font-medium text-slate-700">{{ $lo->address }}</p>

                @foreach ($lo->phone??[] as $item)
                <p class="mt-2 text-sm text-slate-500 flex space-x-2">
                    {{ $item }} <x-heroicon-s-phone class="h-5 w-5 mx-2 text-blue-700"/>
                </p>
                @endforeach

            </div>
            @endforeach


            </div>
        </div>

      </section>
      @endif





      {{-- img view  --}}
<div x-show="openmodel" class="fixed inset-x-0 inset-y-0 top-0 bottom-0 z-50 m-0 overflow-y-scroll text-right" >


    <section class="relative overflow-y-scroll text-gray-700 bg-white body-font">
        <div class="container py-2 mx-auto sm:px-5 sm:py-24">
          <div dir="rtl" class="flex flex-wrap mx-auto lg:w-4/5">

            <div id="mine"  class="sm:w-1/2" >
                <div class="mb-4 bg-gray-100 border border-blue-600 rounded-lg lg:h-80">
                    <div  class="flex items-center justify-center mb-4 bg-gray-100 rounded-lg lg:h-80">
                        <img  class="h-full rounded-lg" :src="image"/>
                    </div>



                </div>

                <div class="flex flex-wrap mb-4 -mx-2">

                    <div class="w-6/12 px-2 mb-2 lg:w-1/4">
                        <img :src="product.img" x-on:click="image = product.img"
                             :class="{ 'ring-2 ring-indigo-300 ring-inset': image === product.img }" class="flex h-24 mt-2 bg-gray-100 border border-black rounded-lg cursor-pointer focus:outline-none sm:h-24 lg:h-32 "
                        />
                    </div>

                    <template x-for="(img) in product.imgs">
                        <div class="w-6/12 px-2 mb-2 lg:w-1/4">
                            <img :src="img" x-on:click="image = img"
                                 :class="{ 'ring-2 ring-indigo-300 ring-inset': image === img }" class="flex h-24 mt-2 bg-gray-100 border border-black rounded-lg cursor-pointer focus:outline-none sm:h-24 lg:h-32">
                        </div>
                    </template>

                </div>
            </div>


            <div class="w-full pr-2 mt-6 sm:w-1/2 lg:pr-10 lg:py-6 lg:mt-0">
              <a href="{{ route('search', ['dept'=>$bussinse->department->id]) }}"><h2 x-text="product.department.name" class="text-sm tracking-widest text-gray-500 title-font"></h2></a>
              <h1 class="mb-1 text-3xl font-medium text-gray-900 title-font" x-text="product.name"></h1>

              <p class="leading-relaxed" x-html="product.discrip"></p>
              <div class="flex items-center pb-5 mt-6 mb-5 border-b-2 border-gray-200">
              <hr>
              </div>
              <div class="flex">
                <span class="text-2xl font-medium text-gray-900 title-font" x-text="product.price+'/ر.ي'"></span>
                <a :href="'../product-order/'+product.id" class="">

                    <div class="flex p-4 border rounded-full text-dark">
                        <x-bi-send-plus-fill class="w-12 h-12 text-yellow-400"/>
                    <span class="text-3xl dark:text-white">اطلب الان </span>
                    </div>
                </a>
              </div>
            </div>
          </div>
        </div>    <div class="absolute top-10 right-10 ">
                    <button @click='openmodel=false'>
                    <x-heroicon-s-x class="w-10 h-10 text-danger-darker"/>
                    </button>

                </div>
      </section>










    <div class="w-full h-full text-center" >
        <div class="flex justify-center text-center bg-dark sm:block sm:p-0">
            <div class="transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle " aria-hidden="true">​</span>


            <div class="inline-block w-full overflow-hidden text-center align-bottom transition-all transform bg-white rounded-lg shadow-2xl sm:align-middle">




                {{-- هنا المنتج تفاصيله --}}




<div class="h-full mt-6 text-black bg-white shadow-2xl rounded-xl dark:bg-dark-eval-2 lg:px-8" >
    <div class="flex flex-col p-4 rounded lg:flex-row ">





        <div class="lg:flex-1 sm:px-4">

        </div>
    </div>
</div>



















            </div>
        </div>
    </div>
</div>










</div>


<x-slot name="script">
    <script type="text/javascript">




        const FORM_URL="{{route('b-follow')}}";

        function ContactForm(buss_id ,typef,message) {


            return {

                showbutton:true,
                formMessage: message,
                button_message:"متابعة",
                submitForm(buss_id,typef) {
                    fetch(FORM_URL, {
                    method: "POST",
                    headers: {
                      "Content-Type": "application/json",
                      "Accept": "application/json",
                      'X-CSRF-TOKEN': '{{csrf_token()}}'

                    },
                    body: JSON.stringify({'buss_id':buss_id,"typef":typef}),


                  }).then(response=>{
                      if(!response.ok){
                      this.formMessage="اعدالمحاولة";
                      return null;
                      }
                      return response.json()
                  }).then(data => {
                      if(data!=null){

                      if(data.status==true){
                        this.formMessage=data.message;
                        this.showbutton=false;

                      }
                      else{

                        this.formMessage=data.message;

                      }


                      }
                      console.log(data);

                    }).catch((e) => {
                        console.log(e);
                      this.formMessage = "اعد المحاولة";
                    });

                }
            }
            };



        // const phoneInputField = document.querySelector("#phone");
        //    const phoneInput = window.intlTelInput(phoneInputField, {
        //      utilsScript:
        //        "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        //    });

        // $(document).ready(function () {
        //         $('.ckeditor').ckeditor();
        //     });



        </script>

</x-slot>

</x-bussinse-layout>
