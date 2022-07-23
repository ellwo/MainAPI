<x-bussinse-layout>
<div class="dark:bg-darker" x-data={img:'{{ $bussinse->avatar }}',openmodel:false,product:[]}>
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
                <a href="./index.html" class="text-lg font-bold tracking-tighter transition duration-500 ease-in-out transform tracking-relaxed lg:pr-8">

                    {{ $bussinse->name }}
                </a>
                    <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
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
                            <button class="flex items-center px-2 py-4 text-base font-medium text-center text-white transition duration-500 ease-in-out transform bg-primary rounded-xl hover:bg-primary-darker hover:text-light focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-darker">متابعة الحساب <x-bi-plus class="w-8 h-8"/></button>
                          </div>
                         </li>
                    <li>
                      <div class="mt-3 rounded-lg sm:mt-0 sm:mr-3">
                        <button class="items-center  px-2 py-3.5 text-base font-medium text-center text-primary  hover:text-darker hover:bg-white transition duration-500 ease-in-out transform border-2 border-white shadow-md rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 flex">تواصل معنا الان  <x-bi-chat-fill class="w-8 h-8 mx-2 text-blue-500"/></button>
                      </div>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    </div>

    <section >
        <div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 md:px-12 lg:px-24 lg:py-24">
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

              <h1 dir="rtl" class="mb-8 text-4xl font-bold leading-none tracking-tighter text-neutral-600 md:text-7xl lg:text-5xl">{{ $bussinse->name }}</h1>
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
              <p class="mb-8 text-base leading-relaxed text-left text-gray-500">{{ $bussinse->note }}</p>
              <div class="mt-0 lg:mt-6 max-w-7xl sm:flex">
                <div class="mt-3 rounded-lg sm:mt-0">
                  <button class="flex items-center px-10 py-4 text-base font-medium text-center text-white transition duration-500 ease-in-out transform bg-blue-600 rounded-xl hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">متابعة الحساب <x-bi-plus class="w-8 h-8"/></button>
                </div>
                <div class="mt-3 rounded-lg sm:mt-0 sm:ml-3">
                  <button class="items-center  px-10 py-3.5 text-base font-medium text-center text-blue-600 transition duration-500 ease-in-out transform border-2 border-white shadow-md rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 flex">تواصل معنا الان  <x-bi-chat-fill class="w-8 h-8 mx-2 text-blue-500"/></button>
                </div>
              </div>
            </div>

            <div class="flex w-full mt-4 overflow-x-scroll ">
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





      {{-- img view  --}}
<div x-show="openmodel" class="fixed inset-x-0 inset-y-0 top-0 bottom-0 z-50 m-0 text-right" >


    <section class="relative overflow-hidden text-gray-700 bg-white body-font">
        <div class="container px-5 py-24 mx-auto">
          <div dir="rtl" class="flex flex-wrap mx-auto lg:w-4/5">

            <div id="mine" x-data="{ image: product.img }" class="w-1/2" x-cloak>
                <div class="mb-4 bg-gray-100 border border-blue-600 rounded-lg lg:h-80">
                    <div  class="flex items-center justify-center mb-4 bg-gray-100 rounded-lg lg:h-80">
                        <img  class="h-full rounded-lg" :src="image">
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


            <div class="w-full mt-6 lg:w-1/2 lg:pl-10 lg:py-6 lg:mt-0">
              <h2 class="text-sm tracking-widest text-gray-500 title-font">BRAND NAME</h2>
              <h1 class="mb-1 text-3xl font-medium text-gray-900 title-font">The Catcher in the Rye</h1>
              <div class="flex mb-4">
                <span class="flex items-center">
                  <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                  </svg>
                  <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                  </svg>
                  <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                  </svg>
                  <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                  </svg>
                  <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                  </svg>
                  <span class="ml-3 text-gray-600">4 Reviews</span>
                </span>
                <span class="flex py-2 pl-3 ml-3 border-l-2 border-gray-200">
                  <a class="text-gray-500">
                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                      <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                    </svg>
                  </a>
                  <a class="ml-2 text-gray-500">
                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                      <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                    </svg>
                  </a>
                  <a class="ml-2 text-gray-500">
                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                      <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                    </svg>
                  </a>
                </span>
              </div>
              <p class="leading-relaxed">Fam locavore kickstarter distillery. Mixtape chillwave tumeric sriracha taximy chia microdosing tilde DIY. XOXO fam indxgo juiceramps cornhole raw denim forage brooklyn. Everyday carry +1 seitan poutine tumeric. Gastropub blue bottle austin listicle pour-over, neutra jean shorts keytar banjo tattooed umami cardigan.</p>
              <div class="flex items-center pb-5 mt-6 mb-5 border-b-2 border-gray-200">
                <div class="flex">
                  <span class="mr-3">Color</span>
                  <button class="w-6 h-6 border-2 border-gray-300 rounded-full focus:outline-none"></button>
                  <button class="w-6 h-6 ml-1 bg-gray-700 border-2 border-gray-300 rounded-full focus:outline-none"></button>
                  <button class="w-6 h-6 ml-1 bg-red-500 border-2 border-gray-300 rounded-full focus:outline-none"></button>
                </div>
                <div class="flex items-center ml-6">
                  <span class="mr-3">Size</span>
                  <div class="relative">
                    <select class="py-2 pl-3 pr-10 text-base border border-gray-400 rounded appearance-none focus:outline-none focus:border-red-500">
                      <option>SM</option>
                      <option>M</option>
                      <option>L</option>
                      <option>XL</option>
                    </select>
                    <span class="absolute top-0 right-0 flex items-center justify-center w-10 h-full text-center text-gray-600 pointer-events-none">
                      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4" viewBox="0 0 24 24">
                        <path d="M6 9l6 6 6-6"></path>
                      </svg>
                    </span>
                  </div>
                </div>
              </div>
              <div class="flex">
                <span class="text-2xl font-medium text-gray-900 title-font">$58.00</span>
                <button class="flex px-6 py-2 ml-auto text-white bg-red-500 border-0 rounded focus:outline-none hover:bg-red-600">Button</button>
                <button class="inline-flex items-center justify-center w-10 h-10 p-0 ml-4 text-gray-500 bg-gray-200 border-0 rounded-full">
                  <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                    <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"></path>
                  </svg>
                </button>
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
</x-bussinse-layout>
