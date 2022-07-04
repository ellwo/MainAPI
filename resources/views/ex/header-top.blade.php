<div id="support" class=" header-top">
    <div class="container">
        <div class="content">
            <div class="row">
                {{-- <div class="header-top-left col-lg-6 col-md-6 d-flex justify-content-start align-items-center">
                    <div class="detail-email d-flex align-items-center justify-content-center">
                        <i class="icon-email"></i>
                        <p>Email :  </p>
                        <span>
                  support@gmail.com
                </span>
                    </div>
                    <div class="detail-call d-flex align-items-center justify-content-center">
                        <i class="icon-deal"></i>
                        <p>Today Deals </p>
                    </div>
                </div> --}}
                <div class="col-lg-6 col-md-6 d-flex justify-content-end align-items-center header-top-right">


                    @guest
                          <div class="flex register-out">
                            <x-heroicon-o-user class="w-10 h-10 text-m_primary"/>
                        <a class="register" href="{{ route('register') }}" data-link-action="display-register-form">
                            انشاء حساب
                        </a>
                        <span class="or-text">او</span>

                        <x-heroicon-o-login class="w-10 h-10 text-m_primary"/>
                        <a class="login" href="{{ route('login') }}" rel="nofollow" title="تسجيل الدخول إلى حسابك">تسجيل دخول</a>
                    </div>
                    @else
                    <div class="register-out">
                        <x-heroicon-o-user class="w-16 h-16 text-m_primary"/>
                        <a class="register" href="{{ route('register') }}" data-link-action="display-register-form">
                            حسابي
                        </a>
                    </div>

                    @endguest

                    <button aria-hidden="true" class="relative focus:outline-none" x-cloak @click="toggleTheme">
                        <div
                            class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-lighter">
                        </div>
                        <div class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-150 transform scale-110 rounded-full shadow-sm"
                            :class="{ 'translate-x-0 -translate-y-px  bg-white text-primary-dark': !isDark, 'translate-x-6 text-primary-100 bg-primary-darker': isDark }">
                            <svg x-show="!isDark" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                            </svg>
                            <svg x-show="isDark" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                            </svg>
                        </div>
                    </button>


                    <!-- begin module:ps_currencyselector/ps_currencyselector.tpl -->
                    <!-- begin /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/ps_currencyselector/ps_currencyselector.tpl --><div id="_desktop_currency_selector" class="currency-selector groups-selector hidden-sm-down currentcy-selector-dropdown">

                    </div>




                    <!-- end /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/ps_currencyselector/ps_currencyselector.tpl -->
                    <!-- end module:ps_currencyselector/ps_currencyselector.tpl -->

                    <!-- begin module:ps_languageselector/ps_languageselector.tpl -->
                    <!-- begin /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/ps_languageselector/ps_languageselector.tpl --><div id="_desktop_language_selector" class="language-selector groups-selector hidden-sm-down language-selector-dropdown">

<div class="flex items-center gap-3">
{{--
    <x-button type="button" class="" iconOnly variant="secondary" srText="Toggle dark mode"
        @click="toggleTheme">
        <x-heroicon-o-moon x-show="!isDark" aria-hidden="true" class="w-6 h-6" />
        <x-heroicon-o-sun x-show="isDark" aria-hidden="true" class="w-6 h-6" />
    </x-button> --}}
</div>
                    </div>
                    <!-- end /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/ps_languageselector/ps_languageselector.tpl -->
                    <!-- end module:ps_languageselector/ps_languageselector.tpl -->

                </div>
            </div>
        </div>
    </div>
</div>
