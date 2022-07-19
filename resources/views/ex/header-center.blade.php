<div class="header-center hidden-sm-down">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div  id="_desktop_logo"
                class="contentsticky_logo d-flex align-items-center justify-content-start col-lg-3 col-md-3"><a
                    href="{{ route('home') }}">
                    <img class="h-24" src="{{ asset('build/images/logoezoom.png') }}"
                        alt="Prestashop_Savemart">
                </a></div>
            <div class="col-lg-6 col-md-9 header-menu d-flex ">

                <div id="_desktop_top_menu">
                    <nav id="nov-megamenu" class="clearfix">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div id="megamenu" class="nov-megamenu clearfix">
                            <ul class="menu level1">
                                <li class="item home-page  active">
                                    <a href="{{ route('home') }}"
                                        title="Home" >
                                        <div class="flex space-x-2 dark:text-white"><x-heroicon-o-home class="text-m_primary h-5 w-5 mx-2"/>الرئيسية</div></a>

                                </li>

                                <li class="item home-page  active">
                                    <a href="{{ route('home') }}"
                                        title="Home" >
                                        <div class="flex space-x-2 dark:text-white"><x-heroicon-o-home class="text-m_primary h-5 w-5 mx-2"/>الرئيسية</div></a>

                                </li>
                                <li class="item home-page  active">
                                    <a href="{{ route('home') }}"
                                        title="Home" >
                                        <div class="flex space-x-2 dark:text-white"><x-heroicon-o-home class="text-m_primary h-5 w-5 mx-2"/>الرئيسية</div></a>

                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>

            </div>
            <div class="contentsticky_group col-lg-3 col-md-3 d-flex justify-content-end align-items-center">
                <div class="header_link_myaccount">
                    <a href="{{ route('profile') }}" title="My Wishlists">
                        <x-bi-person-fill class="text-m_primary-100 dark:text-m_primary h-16 w-16"/>
                     </a>
                </div>
                <div class="header_link_wishlist">
                    <a href="{{ route('profile') }}" title="My Wishlists">
                        <x-heroicon-o-heart class="text-danger-light h-16 w-16"/>
                     </a>
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
                           <x-bi-cart2 class="text-primary-50 h-16 w-16"/>
                           <span class="text-sm absolute p-1 text-light bg-danger-lighter top-0 right-0 rounded-full">45</span>
                        </a>
                    </div>
                    <div class="header_link_wishlist">
                        <a href="{{ route('profile') }}" title="My Wishlists">
                           <x-heroicon-o-heart class="text-danger-light h-16 w-16"/>
                        </a>
                    </div>
                    <div class="header_link_wishlist">
                        <a href="{{ route('profile') }}" title="My Wishlists">
                           <x-bi-person-fill class="text-m_primary-100 h-16 w-16"/>
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
