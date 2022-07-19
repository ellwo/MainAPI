@extends('layouts.search-layout')

@section('search-content')

    <div class="flex flex-col items-center justify-center w-3/4 mx-auto space-y-4 rounded">
        <div class="text-2xl text-darker dark:text-light">اقسام </div>
        <div class="flex flex-wrap w-3/4">
            @foreach ($searching_departments as $item)
                <div class="p-2 m-2 text-xl cursor-pointer rounded-xl bg-darker text-light dark:bg-m_primary">
                    <a href="{{ route('search',['dept'=>$item->id]) }}">
                       <div class="text-white hover:text-blue-500"> {{ $item->name }}</div>
                    </a>

                </div>
            @endforeach
        </div>
        <hr>
        <div class="text-2xl text-darker dark:text-light">فئات </div>
        <div class="flex flex-wrap w-3/4">
            @foreach ($searching_parts as $item)
                <div class="p-2 m-2 text-xl cursor-pointer rounded-xl bg-darker dark:bg-m_primary">
                    <a href="{{ route('search',['dept'=>$item->department_id,'part'=>$item->id]) }}">
                      <div class="text-light">  {{ $item->name }}</div>
                    </a>

                </div>
            @endforeach
        </div>
        <hr>


    </div>


    <div class="flex flex-col m-8">

        <div class="flex flex-row ">
            <h1 class="pb-4 text-3xl font-bold dark:text-white" >المنتجات</h1>
            <hr class="w-2/3 border-2 border-m_primary-dark"/>

        </div>





        <div class="rounded-md sm:flex sm:flex-row ">

        <div class="rounded-md sm:w-2/3">

            <div class="p-2 lg:p-8 sm:p-4 sm:grid sm:grid-cols-2">
                @foreach($products->take(4) as $product)
                   @include('search-pages.product-card-xl',['product'=>$product,'routename'=>'product.show'])
                @endforeach

            </div>


        </div>




        <div class="rounded-md sm:w-1/3 ">

            <div class="">

                @foreach ($products->skip(4)->take(3) as $product)
                    @include('search-pages.product-card-sm',['product'=>$product,'routename'=>'product.show'])
                @endforeach

            </div>

        </div>




        </div>





    </div>




    <div class="flex flex-col m-8">

        <div class="flex flex-row ">
            <h1 class="pb-4 text-3xl font-bold dark:text-white" >الخدمات</h1>
            <hr class="w-2/3 border-2 border-m_primary-dark"/>

        </div>





        <div class="rounded-md sm:flex sm:flex-row ">

        <div class="rounded-md sm:w-2/3">

            <div class="p-2 lg:p-8 sm:p-4 sm:grid sm:grid-cols-2">
                @foreach($services->take(4) as $service)
                   @include('search-pages.product-card-xl',['product'=>$service,'routename'=>'service.show'])
                @endforeach

            </div>


        </div>




        <div class="rounded-md sm:w-1/3 ">

            <div class="">

                @foreach ($services->skip(4)->take(3) as $service)
                    @include('search-pages.product-card-sm',['product'=>$service,'routename'=>'service.show'])
                @endforeach

            </div>

        </div>




        </div>





    </div>




    <div class="relative">
        <div class="flex flex-row ">
            <h1 class="pb-4 text-3xl font-bold dark:text-white" >حسابات تسويقية </h1>
            <hr class="w-2/3 border-2 border-m_primary-dark"/>

        </div>
    <div dir="rtl" class="grid grid-cols-2 gap-2 my-3 sm:grid-cols-4">

        @foreach ($bussinses as $buss)
        <div class="sm:h-64">
            <div class="flex flex-col max-h-full min-w-full min-h-full">
                <div class="bg-white dark:bg-dark dark:text-light dark:border->primary border border-white shadow-lg  rounded-3xl p-4 m-4">
                    <div class="flex-none sm:flex">
                        <div class="relative w-32 h-32 mb-3 sm:mb-0">
                            <a href="{{route('b.show',['username'=>$buss->username])}}">
                            <img src="{{$buss->avatar}}" alt="aji" class="object-cover w-32 h-32 rounded-2xl">

                            </a>
                        </div>
                        <div class="flex-auto sm:mr-5">
                            <div class="flex items-center justify-between sm:mt-2">
                                <div class="flex items-center">
                                    <div class="flex flex-col">
                                        <div class="w-full font-bold leading-none  text-md">{{$buss->name}}|<br><a href="{{route("b.show",["username"=>$buss->username])}}"><span class="text-sm text-info">{{"@".$buss->username}}</span></a></div>
                                        <div class="my-1 text-gray-500 ">
                                            <span class="mr-3 border-r border-gray-200 max-h-0"></span><span class="text-info"> {{$buss->department?->name}}</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-row items-center">
                                <div class="flex">

                                    @for ($i = 1; $i <= $buss->ratings_value_avg; $i++)

                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="w-8 h-8 text-yellow-500">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    @endfor
                                    @for ($i = 0; $i < 5-$buss->ratings_value_avg; $i++)

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" class="w-8 h-8 text-yellow-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                        </path>
                                    </svg>
                                    @endfor
                                </div>

                                </div>
                                <div class="flex justify-between pt-2 space-x-4 text-gray-500">
                                    <div class="" >
                                        <form method="POST" action="{{route('create_chatroom')}}">
                                            @csrf
                                            <input type="hidden" name="chatable_id" value="{{$buss->username}}" />
                                            <input type="hidden" name="type" value="Bussinse" />
                                        <button class="p-2 rounded-full bg-m_primary">
                                            <x-heroicon-o-chat class="w-8 h-8 text-darker"/>
                                        </button>
                                        </form>


                                    </div>






                                    @auth

                                    @if ($buss->user->id ==auth()->user()->id)
                                    @else


                                    @if (auth()->user()->isFollowing($buss))

                                    <div x-data='{showform2:false}'>
                                        <form x-show="showform2"  x-data="ContactForm({{$buss->id}},'follow','متابعة')"  @submit.prevent="submitForm({{$buss->id}},'follow')">
                                            @csrf
                                        <div    >
                                               <button @click='showform2=false' class="flex p-2 text-white bg-success rounded-xl">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 " viewBox="0 0 20 20"
                                                        fill="currentColor">
                                                        <path
                                                            d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z">
                                                        </path>
                                                    </svg>
                                                    <span >متابعة</span>

                                                    </button>

                                                <p class="">{{$buss->followers_b_count}}</p>

                                        </div>

                                    </form>



                                    <form x-show="!showform2" x-data="ContactForm({{$buss->id}},'unfollow','الغاء المتابعة')" @submit.prevent="submitForm({{$buss->id}},'unfollow')">
                                        <div   >
                                         <button @click='showform2=true' class="flex p-2 text-white bg-danger-darker rounded-xl">

                                             <x-bi-person-dash-fill class="w-8 h-8 text-light" />
                                                <span class="" >الغاء المتابعة</span>

                                         </button>


                                        </div>

                                         </form>
                                        </div>
                                    @else

                                    <div x-data='{showform2:false}'>
                                    <form x-show="!showform2"  x-data="ContactForm({{$buss->id}},'follow','متابعة')"  @submit.prevent="submitForm({{$buss->id}},'follow')">
                                        @csrf
                                    <div    >
                                           <button @click='showform2=true' class="flex p-2 text-white bg-success rounded-xl">
                                               <x-bi-person-plus class="w-8 h-8"/>
                                                <span >متابعة</span>

                                                </button>

                                    </div>

                                </form>



                                <form x-show="showform2" x-data="ContactForm({{$buss->id}},'unfollow','الغاء المتابعة')" @submit.prevent="submitForm({{$buss->id}},'unfollow')">
                                    <div   >
                                     <button @click='showform2=false' class="flex p-2 text-white bg-danger-darker rounded-xl">

                                         <x-bi-person-dash-fill class="w-8 h-8 text-light" />
                                            <span class="" >الغاء المتابعة</span>

                                     </button>


                                    </div>

                                     </form>
                                    </div>


                                    @endif


                                    @endif

                                    @endauth


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                @endforeach
    </div>
    </div>







    @section('script')

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
    @endsection



@endsection
