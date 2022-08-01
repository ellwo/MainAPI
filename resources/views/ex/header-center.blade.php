


<div class="header-center hidden-sm-down">
    <div class="container">
        <div class="row d-flex align-items-center">


            <div  id="_desktop_logo"
                class="contentsticky_logo d-flex align-items-center justify-content-start col-lg-3 col-md-3">











                <div class="flex justify-between">

                    @auth

                    <div class="mx-4">
                    <div class="relative w-16 h-16 mt-2" x-data="{ open: false }">
                        <button @click="open = !open;"
                            type="button" aria-haspopup="true" :aria-expanded="open ? 'true' : 'false'"
                            class="mt-4 transition-opacity duration-200 rounded-full dark:opacity-75 dark:hover:opacity-100 focus:outline-none focus:ring dark:focus:opacity-100">
                            <span class="sr-only">User menu</span>
                            <img class="mt-4 rounded-full" src="{{auth()->user()->avatar}}"
                                alt="Img" />
                        </button>

                        <!-- User dropdown menu -->

                        <div class="z-50 bg-white">

                            <div x-show="open" x-ref="userMenu"
                            x-transition:enter="transition-all transform ease-out"
                            x-transition:enter-start="translate-y-1/2 opacity-0"
                            x-transition:enter-end="translate-y-0 opacity-100"
                            x-transition:leave="transition-all transform ease-in"
                            x-transition:leave-start="translate-y-0 opacity-100"
                            x-transition:leave-end="translate-y-1/2 opacity-0"
                             @click.away="open = false"
                            @keydown.escape="open = false"
                            {{-- @class(['bottom-12 absolute right-0 w-48 py-1 bg-white rounded-md shadow-lg  ring-1 ring-black ring-opacity-5 dark:bg-dark focus:outline-none', 'totop' => false])
                            @class(['top-12 ', 'totop' => true]) --}}

                           class="absolute right-0 z-50 w-48 py-1 bg-white rounded-md shadow-lg top-16 ring-1 ring-black ring-opacity-5 dark:bg-dark focus:outline-none"
                            tabindex="-1" role="menu" aria-orientation="vertical" aria-label="User menu">

                            <x-dropdown-link    class="block px-4 py-2 text-sm text-gray-700 transition-colors bg-primary text-primary-darker hover:bg-primary-darker hover:text-primary-light dark:text-light dark:hover:bg-primary" href="{{route('profile')}}" role="menuitem">

                                Your Profile
                            </x-dropdown-link>
                            <a @click="isSettingsPanelOpen=!isSettingsPanelOpen" href="#" role="menuitem"
                                class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                                Settings
                            </a>
                            <a href="#" role="menuitem"
                                class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </a>
                        </div>
                                </div>
                    </div>

                </div>

                @endauth


                <a
                    href="{{ route('home') }}">
                    <img class="h-24" src="{{ asset('build/images/logoezoom.png') }}"
                        alt="Prestashop_Savemart">
                </a>
                </div>
            </div>

            <div class="col-lg-6 col-md-9 header-menu d-flex ">

                <div id="_desktop_top_menu">
                    <nav id="nov-megamenu" class="clearfix">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div id="megamenu" class="clearfix nov-megamenu">
                            <ul class="menu level1">
                                <li class="item home-page active">
                                    <a href="{{ route('home') }}"
                                        title="Home" >
                                        <div class="flex space-x-2 text-4xl dark:text-white"><x-heroicon-o-home class="w-12 h-12 mx-2 text-m_primary"/>الرئيسية</div></a>

                                </li>

                                <li class="item home-page active">
                                    <a href="{{ route('aboutus') }}"
                                        title="Home" >
                                        <div class="flex space-x-2 text-4xl dark:text-white"><x-bi-info class="w-12 h-12 mx-2 dark:text-info"/>من نحن</div></a>

                                </li>
                                <li class="item home-page active">
                                    <a href="{{ route('contact') }}"
                                        title="Home" >
                                        <div class="flex space-x-2 text-4xl dark:text-white"><x-heroicon-s-phone class="w-12 h-12 mx-2 text-m_primary"/>تواصل معنا </div></a>

                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>

            </div>
            <div class="contentsticky_group col-lg-3 col-md-3 d-flex justify-content-end align-items-center">
                <div class="header_link_myaccount">
                    {{-- <a href="{{ route('profile') }}" title="My Wishlists">
                        <x-bi-person-fill class="w-16 h-16 text-m_primary-100 dark:text-m_primary"/>
                     </a> --}}


            </div>
                <div class="header_link_wishlist">

                    @livewire('wishlist.wishlist-view', key(time()))

                </div>
                <div id="_desktop_cart">
                    @livewire('cart.cart-view', key(time()))
                </div>
            </div>
        </div>
    </div>
</div>



{{-- <div class="header-center hidden-sm-down">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div id="_desktop_logo" class="contentsticky_logo d-flex align-items-center justify-content-start col-lg-3 col-md-3">
                <a href="{{ route('home') }}">
                    <img class="w-32 h-32 logo img-fluid" src="{{ asset('build/images/logoezoom.png') }}" alt="Prestashop_Savemart">
                </a>
            </div>
            <div class="col-lg-9 col-md-9 header-menu d-flex align-items-center justify-content-end">

                <div class="contentsticky_group d-flex justify-content-end">


                    <div class="bg-darker rounded-xl ">


                        <div id="">

                            <!-- begin modules/novmegamenu/views/templates/hook/novmegamenu.tpl -->
                            <nav id="nov-megamenu" x-show="false" class="clearfix">
                                <!-- Brand and toggle get grouped for better mobile display -->
                                <div id="megamenu" class="clearfix nov-megamenu">
                                    <ul class="menu level1">
                                        <li class="item dark:hover:text-m_primary-darker hover:text-m_primary dark:text-m_primary-darker text-light " >
                                            <a href="?home" title="Home"><i class="zmdi zmdi-home"></i><span class="text-white dark:hover:text-m_primary-darker hover:text-m_primary">اتصل بنا</span></a>
                                            </li>
                                            <li class="item dark:hover:text-m_primary-darker hover:text-m_primary dark:text-m_primary-darker text-light " >
                                                <a href="?home" title="Home"><i class="zmdi zmdi-home"></i><span class="text-white hover:text-m_primary">من نحن</span></a>
                                                </li>

                                                <li class="item home-page has-sub" ><span class="opener"></span><a href="#" title="Home"><i class="zmdi zmdi-home"></i><span class="hover:text-m_primary dark:text-m_primary-darker text-light">الاسواق</span></a><div class="dropdown-menu" style="width:200px"><ul class=""><li class="item " ><span  title="Homepage 1">مرحبا بكم يمكنكم استعراض الاسواق</span></li>

                                                    @foreach ($markts as $m)
                                                    <li class="item col-md-3 dark:text-m_primary-darker text-m_primary mw-20 html" >
                                                        <a href="?home=home_1" ><span class="menu-title text-m_primary">{{ $m->name }}</span>
                                                        </a> </li>
                                                    @endforeach
                                                </ul></div></li>

                                        <li class="item group" ><span class="opener"></span>
                                            <a href="#" class="" title="Categories">
                                            <i class="zmdi zmdi-group"></i><span class="hover:text-m_primary dark:text-m_primary-darker text-light"> الاقسام </span></a>
                                            <div class="dropdown-menu" >
                                                <ul class=""><li class="container item group" >
                                                    <div class="dropdown-menu" >
                                                        <ul class="">




                                                            @foreach ($depts as $d)

                                                            <li class="item col-lg-3 col-md-3 html" >
                                                                <span class="menu-title">{{ $d->name }}</span>
                                                            <div class="menu-content">
                                                                <ul class="col">
                                                                    @foreach ($d->parts()->take(3) as $p)
                                                                    <li><a href="#" title="HP Pavilion">{{ $p->name }}</a></li>

                                                                    @endforeach
                                                                            </ul></div></li>
                                                            @endforeach

                                                                        </ul></div></li>
                                                </ul></div></li>
                                    </ul>
                                </div>
                            </nav>
                            <!-- end modules/novmegamenu/views/templates/hook/novmegamenu.tpl -->

                        </div>

                    </div>


                    <div class="header_link_wishlist">
                        <a href="{{ route('profile') }}" class="relative" title="My Wishlists">
                           <x-bi-cart2 class="w-16 h-16 text-primary-50"/>
                           <span class="absolute top-0 right-0 p-1 text-sm rounded-full text-light bg-danger-lighter">45</span>
                        </a>
                    </div>
                    <div class="header_link_wishlist">
                        <a href="{{ route('profile') }}" title="My Wishlists">
                           <x-heroicon-o-heart class="w-16 h-16 text-danger-light"/>
                        </a>
                    </div>
                    <div class="header_link_wishlist">
                        <a href="{{ route('profile') }}" title="My Wishlists">
                           <x-bi-person-fill class="w-16 h-16 text-m_primary-100"/>
                        </a>
                    </div>




                    <!-- begin module:ps_shoppingcart/ps_shoppingcart.tpl -->
                    <!-- begin /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/ps_shoppingcart/ps_shoppingcart.tpl --><div id="_desktop_cart">

                    </div><!-- end /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/ps_shoppingcart/ps_shoppingcart.tpl -->
                    <!-- end module:ps_shoppingcart/ps_shoppingcart.tpl -->

                </div>
            </div>
        </div>
    </div>
</div> --}}
