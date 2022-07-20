<x-dashe-layout>

    <div class="max-w-4xl mx-auto my-24 mt-4 rounded shadow-2xl ">
        <div class="flex flex-col w-full bg-dark" >
          <div class="flex flex-col items-center justify-center h-full text-white bg-black bg-opacity-50 ">




            <form method="POST" action="{{ route('profile.updateimage') }}">

                @csrf
                <div class="rounded-full ">
                    <div id="avatar" class="h-2/3">

                    </div>

                </div>
                <x-button>حفظ التعديلات</x-button>
            </form>



            <h1 class="text-2xl font-semibold">{{ auth()->user()->name }}</h1>
            <h4 class="text-sm font-semibold">{{ auth()->user()->username }}</h4>
          </div>
        </div>
        <div class="grid grid-cols-12 bg-white " x-data='{tap:1}'>

          <div class="flex justify-center w-full col-span-12 px-3 py-6 space-x-4 border-b border-solid dark:bg-darker lg:space-x-0 lg:space-y-4 lg:flex-col lg:col-span-2 md:justify-start ">

            <button  type="button" :class='tap==1 ? "bg-primary  " : "bg-primary-50 hover:bg-primary" '  class="p-2 text-sm text-center rounded-md dark:text-light " @click="tap=1">
        المعلومات الاساسية </button>
            <button @click="tap=2" :class='tap==2 ? "bg-primary  " : "bg-primary-50 hover:bg-primary" ' class="p-2 text-sm font-semibold text-center rounded cursor-pointer hover:text-gray-200">كلمة السر </button>


          </div>

          <div x-show="tap==1" class="h-full col-span-12 pb-12 md:border-solid md:border-l dark:bg-dark md:border-black md:border-opacity-25 lg:col-span-10">
            <div class="px-4 pt-4">
              <form action="{{route('profile.update',auth()->user()->id)}}" method="POST" class="flex flex-col mx-8 space-y-8">

                @method("PUT")
                @if (session()->has("state"))
                    <span>Has State</span>
                @endif


                <x-auth-session-status class="mb-4" :status="session('status')" />

                <x-auth-validation-errors class="mb-4" :errors="$errors" />


                @csrf

                <div class="space-y-2 " dir="auto">
                    <x-label for="name" :value="__('الاسم')" />

                        <x-input id="name" class="block w-full" type="text" name="name"
                        value="{{auth()->user()->name}}"
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
                                value="{{auth()->user()->email}}" placeholder="{{ __('Email') }}" required autofocus />
                                @if (auth()->user()->hasVerifiedEmail())
                                <x-slot name="righticon">
                                    <span class="rounded bg-success text-light">
                                        تم التاكيد

                                    </span>
                                </x-slot>
                                @endif

                            </x-input-with-icon-wrapper>
                    </div>
                    <div class="w-full space-y-2">
                        <x-label for="username" :value="__('اسم المستخدم')" />

                        <x-input-with-icon-wrapper>
                            <x-slot name="icon" class="border border-1">

                                <span aria-hidden="true" class="w-5 h-5 text-primary-dark dark:text-primary-light" >@</span>



                            </x-slot>
                            <x-input withicon id="username" class="block w-full focus:ring-primary_color focus:border-primary_color"
                           value="{{auth()->user()->username}}" type="text" name="username"
                            placeholder="{{ __('Username') }}" required autofocus />
                        </x-input-with-icon-wrapper>
                    </div>

                </div>
                <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:space-x-4">

                <div class="w-full space-y-2">
                    <x-label for="username" :value="__('رقم الهاتف')" />

                    <x-input-with-icon-wrapper>
                        <x-slot name="icon" class="border border-1">

                            <span aria-hidden="true" class="w-5 h-5 text-primary-dark dark:text-primary-light" ></span>



                        </x-slot>
                        <x-input withicon id="phone" class="block w-full focus:ring-primary_color focus:border-primary_color"
                       value="{{auth()->user()->phone}}" type="tel" name="phone"
                        placeholder="{{ __('') }}"  />
                    </x-input-with-icon-wrapper>
                </div>
                <div class="w-full space-y-2">
                    <x-label for="username" :value="__('المدينة')" />

                    <x-input-with-icon-wrapper>
                        <x-slot name="icon" class="border border-1">

                            <span aria-hidden="true" class="w-5 h-5 text-primary-dark dark:text-primary-light" ></span>



                        </x-slot>
                        <select name="city_id" class="rounded-md" id="">

                            @foreach ($cities as $c)
                            <option @if ($c->id==auth()->user()->city_id)
                                selected
                            @endif value="{{ $c->id }}">{{ $c->name }}</option>
                            @endforeach

                        </select>
                    </x-input-with-icon-wrapper>
                </div>


                </div>
                <div class="w-full form-item" >
                    <label class="text-xl ">البايو</label>
            <textarea cols="30" rows="10"
            name="bio" maxlength="191"
             class="w-full px-2 py-1 mr-2 text-black text-opacity-50 rounded shadow appearance-none ckeditor dark:bg-primary-darker dark:text-light focus:outline-none focus:shadow-outline focus:border-primary" >
             {{auth()->user()->bio}}

                    </textarea>
                  </div>




                <x-button class="justify-center ">
                <span> حفظ</span>
                </x-button>

{{--
                <div>
                  <h3 class="text-2xl font-semibold ">More About Me</h3>
                  <hr>
                </div>


                <div>
                  <h3 class="text-2xl font-semibold">My Social Media</h3>
                  <hr>
                </div>

                <div class="form-item">
                  <label class="text-xl ">Instagram</label>
                  <input type="text" value="https://instagram.com/" class="w-full px-2 py-1 mr-2 text-black text-opacity-25 text-opacity-50 rounded shadow appearance-none focus:outline-none focus:shadow-outline focus:border-blue-200 " disabled>
                </div>
                <div class="form-item">
                  <label class="text-xl ">Facebook</label>
                  <input type="text" value="https://facebook.com/" class="w-full px-2 py-1 mr-2 text-black text-opacity-25 text-opacity-50 rounded shadow appearance-none focus:outline-none focus:shadow-outline focus:border-blue-200 " disabled>
                </div>
                <div class="form-item">
                  <label class="text-xl ">Twitter</label>
                  <input type="text" value="https://twitter.com/" class="w-full px-2 py-1 mr-2 text-black text-opacity-50 rounded shadow appearance-none focus:outline-none focus:shadow-outline focus:border-blue-200 " disabled>
                </div> --}}


              </form>
            </div>
          </div>
          <div x-show="tap==2" x-data="{isshow:true}" class="h-full col-span-12 pb-12 md:border-solid md:border-l dark:bg-dark md:border-black md:border-opacity-25 lg:col-span-10">

            <div class="flex flex-col space-x-8 space-y-8 sm:mx-8 sm:mt-8 sm:p-16">
                        <!-- Password -->
                        <form  x-data="ContactForm()"  @submit.prevent="submitForm()">
                            @csrf

                            <div x-text="formMessage" class= "text-sm font-medium text-green-600 dark:text-gray-400">

                            </div>

                        <div class="space-y-2" >
                          <x-label for="password" :value="__('كلمة المرور')" />
                          <x-input-with-icon-wrapper >
                              <x-slot name="icon">
                                  <x-heroicon-o-lock-closed aria-hidden="true" class="w-5 h-5" />
                              </x-slot>
                              <x-input withicon x-model="formData.password"  withrighticon id="password" class="block w-full"  x-bind:type=" isshow ? 'text' : 'password'" name="password" required
                                  autocomplete="new-password"  placeholder="{{ __('كلمة المرور') }}" />
                                  <x-slot name="righticon">
                                      <button type="button" @click="isshow=!isshow" class="z-30 ">
                                          <x-heroicon-o-eye x-show="!isshow" aria-hidden="true" class="w-5 h-5 " />
                                          <x-heroicon-o-eye-off x-show="isshow" aria-hidden="true" class="w-5 h-5 " />
                                      </button>
                                  </x-slot>

                              </x-input-with-icon-wrapper>

                              @error("password")

                          <hr class="border-2 text-danger bg-danger border-danger"/>
                          <span class="text-xs text-danger ">{{$message}}</span>
                          @enderror

                      </div>

                      <!-- Confirm Password -->
                      <div class="space-y-2">
                          <x-label for="password_confirmation" :value="__('تاكيد كلمة المرور')" />
                          <x-input-with-icon-wrapper>
                              <x-slot name="icon">
                                  <x-heroicon-o-lock-closed aria-hidden="true" class="w-5 h-5" />
                              </x-slot>
                              <x-input withicon x-model="formData.confirm_password" id="password_confirmation" x-bind:type=" isshow ? 'text' : 'password'" class="block w-full"
                                  name="password_confirmation" required placeholder="{{ __('تاكيد كلمة المرور') }}" />
                                  <x-slot name="righticon">
                                      <button type="button" @click="isshow=!isshow" class="z-30 ">
                                          <x-heroicon-o-eye x-show="!isshow" aria-hidden="true" class="w-5 h-5 " />
                                          <x-heroicon-o-eye-off x-show="isshow" aria-hidden="true" class="w-5 h-5 " />
                                      </button>
                                  </x-slot>

                              </x-input-with-icon-wrapper>
                          @error("password_confirmation")

                          <hr class="border-2 text-danger bg-danger border-danger"/>
                          <span class="text-xs text-danger ">{{$message}}</span>
                          @enderror

                      </div>
                      <x-button class="justify-center w-full m-4 ">
                        <span> حفظ</span>
                        </x-button>

                    </form>

            </div>




                  </div>

                   </div>


        </div>


      <x-slot  name="script">

    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/uploadeimage.js') }}"></script>

<script type="text/javascript">


            var img=new ImagetoServer({
                url:"{{ route('uploade') }}",
                src:"{{ auth()->user()->avatar }}",
                id:'avatar',
                h:500,
                w:500,
                with_w_h:true,


            });



const FORM_URL = "{{route('profile.update_password')}}";

function ContactForm() {
      return {
        formData: {
          password:"",
          confirm_password:""
        },
        formMessage: "",



        submitForm() {
          this.formMessage = "";
          fetch(FORM_URL, {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
              "Accept": "application/json",
              'X-CSRF-TOKEN': '{{csrf_token()}}'

            },
            body: JSON.stringify(this.formData),


          }).then(response=>{
              if(!response.ok){
              this.formMessage="something is wrong";
              return null;
              }
              return response.json()
          }).then(data => {
              if(data!=null){

              if(data.status==true){
                this.formMessage=data.message;

              }
              else{

                this.formMessage=data.message;

              }


              }
              console.log(data);

            }).catch((e) => {
                console.log(e);
              this.formMessage = "Something went wrong.";
            });
        }
      }
      }





const phoneInputField = document.querySelector("#phone");
   const phoneInput = window.intlTelInput(phoneInputField, {
    initialCountry:"ye",
     utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
   });


$(document).ready(function () {
        $('.ckeditor').ckeditor();
    });



</script>

      </x-slot>
</x-dashe-layout>
