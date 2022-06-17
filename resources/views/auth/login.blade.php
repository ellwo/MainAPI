<x-guest-layout>
    {{-- <x-auth-card class="">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" class="" action="{{ route('login') }}">
            @csrf
            <div class="grid gap-6 ">
                <!-- Email Address -->

                <div class="space-y-2 ">
                    <x-label for="email" :value="__('Email')" />

                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">

                            <x-heroicon-o-mail aria-hidden="true" class="w-5 h-5" />



                        </x-slot>
                        <x-input withicon id="email" class="block focus:ring-primary_color focus:border-primary_color w-full" type="email" name="email"
                            :value="old('email')" placeholder="{{ __('Email') }}" required autofocus />
                    </x-input-with-icon-wrapper>
                </div>

                <!-- Password -->
                <div class="space-y-2 ">
                    <x-label for="password" :value="__('Password')" />

                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-lock-closed aria-hidden="true" class="w-5 h-5" />
                        </x-slot>
                        <x-input withicon id="password" class="block focus:ring-primary_color focus:border-primary_color w-full" type="password" name="password" required
                            autocomplete="current-password" placeholder="{{ __('Password') }}" />
                    </x-input-with-icon-wrapper>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="text-base-300 border-gray-300 rounded focus:border-base-100 focus:ring focus:ring-primary_color dark:border-primary_color dark:bg-dark-eval-1 dark:focus:ring-offset-dark-eval-1"
                            name="remember">
                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                    <a class="text-sm text-blue-500 hover:underline" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                    @endif
                </div>

                <div>
                    <x-button  class="justify-center  w-full gap-2">
                        <x-heroicon-o-login class="w-6 h-6" aria-hidden="true" />
                        <span>{{ __('Log in') }}</span>
                    </x-button>
                </div>

                @if (Route::has('register'))
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Don’t have an account?') }}
                    <a href="{{ route('register') }}" class="text-blue-500 hover:underline">
                        {{ __('Register') }}
                    </a>
                </p>
                @endif
            </div>
        </form>
    </x-auth-card>
    884820155
 --}}

 <div x-data="setup()" x-init="$refs.loading.classList.add('hidden'); setColors('mycolor');" :class="{ 'dark': isDark}">
    <!-- Loading screen -->
    <div
      x-ref="loading"
      class="fixed inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white bg-primary-darker"
    >
      Loading.....
    </div>
    <div
      class="flex flex-col items-center justify-center min-h-screen p-4 space-y-4 antialiased text-gray-900 bg-gray-100 dark:bg-dark dark:text-light"
    >
      <!-- Brand -->
     <x-application-logo/>
      <main>
        <div class="w-full max-w-sm px-4 py-6 space-y-6 bg-white rounded-md dark:bg-darker">
          <h1 class="text-xl font-semibold text-center">Login</h1>
          <x-auth-validation-errors class="mb-4" :errors="$errors" />

          <form action="{{route('login')}}" method="POST" class="space-y-6">
            @csrf
            <div class="space-y-2 text-danger">
                <x-label for="user" class="mx-auto text-center" :value="__(' البريد الالكتروني /اسم المستخدم')" />
                <x-input-with-icon-wrapper >
                    <x-slot name="icon">
                        <x-heroicon-o-user aria-hidden="true" class="w-5 h-5" />
                    </x-slot>
                    <x-input  withicon id="user" class="block
                   w-full" type="text" name="user"
                        :value="old('user')" required placeholder="{{ __('Email/Username') }}" />
                </x-input-with-icon-wrapper>

                @error("user")

                <hr class="text-danger bg-danger border-2 border-danger"/>
                <span class="text-danger text-xs ">{{$message}}</span>
                @enderror
                @error("username")

                <hr class="text-danger bg-danger border-2 border-danger"/>
                <span class="text-danger text-xs ">{{$message}}</span>
                @enderror
            </div>
            <div class="space-y-2" x-data='{isshow:false}' >
                <x-label for="password" class="mx-auto text-center" :value="__('كلمة المرور')" />
                <x-input-with-icon-wrapper >
                    <x-slot name="icon">
                        <x-heroicon-o-lock-closed aria-hidden="true" class="w-5 h-5" />
                    </x-slot>
                    <x-input withicon withrighticon id="password" class="block w-full"  x-bind:type=" isshow ? 'text' : 'password'" name="password" required
                        autocomplete="new-password"  placeholder="{{ __('كلمة المرور') }}" />
                        <x-slot name="righticon">
                            <button type="button" @click="isshow=!isshow" class="z-30 ">
                                <x-heroicon-o-eye x-show="!isshow" aria-hidden="true" class="w-5 h-5 " />
                                <x-heroicon-o-eye-off x-show="isshow" aria-hidden="true" class="w-5 h-5 " />
                            </button>
                        </x-slot>

                    </x-input-with-icon-wrapper>

                    @error("password")

                <hr class="text-danger bg-danger border-2 border-danger"/>
                <span class="text-danger text-xs ">{{$message}}</span>
                @enderror

            </div>
            <div class="flex items-center justify-between">
              <!-- Remember me toggle -->
              <label class="flex items-center">
                <div class="relative inline-flex items-center">
                  <input
                    type="checkbox"
                    name="remembr_me"
                    class="w-10 h-4 transition bg-gray-200 border-none rounded-full shadow-inner outline-none appearance-none toggle checked:bg-primary-light disabled:bg-gray-200 focus:outline-none"
                  />
                  <span
                    class="absolute top-0 left-0 w-4 h-4 transition-all transform scale-150 bg-white rounded-full shadow-sm"
                  ></span>
                </div>
                <span class="ml-3 text-sm font-normal text-gray-500 dark:text-gray-400">تذكرني</span>
              </label>

              <a href="forgot-password.html" class="text-sm text-blue-600 hover:underline">نسيت كلمة المرور؟</a>
            </div>
            <div>
              <button
                type="submit"
                class="w-full px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker"
              >
                دخول
              </button>
            </div>
          </form>

          <!-- Or -->
          <div class="flex items-center justify-center space-x-2 flex-nowrap">
            <span class="w-20 h-px bg-gray-300"></span>
            <span>OR</span>
            <span class="w-20 h-px bg-gray-300"></span>
          </div>

          <!-- Social login links -->
          <!-- Brand icons src https://boxicons.com -->
          <div class="flex flex-1 items-center text-center">
            <x-button variant='goset'   pill=true  class='bg-white'>
                <x-heroicon-s-filter class="w-5 h-5 bg-white text-blue-700"/>
            </x-button>
            <x-button class="m-2">ss</x-button>
            <x-button class="m-2">ss</x-button>



          </div>
          <a
            href="#"
            class="flex items-center justify-center px-4 py-2 space-x-2 text-white transition-all duration-200 bg-black rounded-md hover:bg-opacity-80 focus:outline-none focus:ring-2 focus:ring-black focus:ring-offset-1 dark:focus:ring-offset-darker"
          >
            <svg
              aria-hidden="true"
              class="w-6 h-6 text-white"
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="currentColor"
            >
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M12.026,2c-5.509,0-9.974,4.465-9.974,9.974c0,4.406,2.857,8.145,6.821,9.465 c0.499,0.09,0.679-0.217,0.679-0.481c0-0.237-0.008-0.865-0.011-1.696c-2.775,0.602-3.361-1.338-3.361-1.338 c-0.452-1.152-1.107-1.459-1.107-1.459c-0.905-0.619,0.069-0.605,0.069-0.605c1.002,0.07,1.527,1.028,1.527,1.028 c0.89,1.524,2.336,1.084,2.902,0.829c0.091-0.645,0.351-1.085,0.635-1.334c-2.214-0.251-4.542-1.107-4.542-4.93 c0-1.087,0.389-1.979,1.024-2.675c-0.101-0.253-0.446-1.268,0.099-2.64c0,0,0.837-0.269,2.742,1.021 c0.798-0.221,1.649-0.332,2.496-0.336c0.849,0.004,1.701,0.115,2.496,0.336c1.906-1.291,2.742-1.021,2.742-1.021 c0.545,1.372,0.203,2.387,0.099,2.64c0.64,0.696,1.024,1.587,1.024,2.675c0,3.833-2.33,4.675-4.552,4.922 c0.355,0.308,0.675,0.916,0.675,1.846c0,1.334-0.012,2.41-0.012,2.737c0,0.267,0.178,0.577,0.687,0.479 C19.146,20.115,22,16.379,22,11.974C22,6.465,17.535,2,12.026,2z"
              ></path>
            </svg>
            <span> Login with github </span>
          </a>

          <!-- Register link -->
          <div dir="rtl" class="text-sm text-gray-600 dark:text-gray-400">
            هل لديك حساب بالفعل? <a href="{{route('register')}}" class="text-blue-600 hover:underline">Register</a>
          </div>
        </div>
      </main>
    </div>
    <!-- Toggle dark mode button -->
    <div class="fixed bottom-5 left-5">
      <button
        aria-hidden="true"
        @click="toggleTheme"
        class="p-2 transition-colors duration-200 rounded-full shadow-md bg-primary hover:bg-primary-darker focus:outline-none focus:ring focus:ring-primary"
      >
        <svg
          x-show="isDark"
          class="w-8 h-8 text-white"
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"
          />
        </svg>
        <svg
          x-show="!isDark"
          class="w-8 h-8 text-white"
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"
          />
        </svg>
      </button>
    </div>
  </div>



    <x-slot name="script">

        <script>

console.log("from script");
//  alret("eee");
        </script>

    </x-slot>


</x-guest-layout>
