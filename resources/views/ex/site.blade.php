
<!-- begin index.tpl -->
<!doctype html>
<html lang="ar">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="x-ua-compatible" content="ie=edge">


    <style>
        [x-cloak] {
            display: none;
        }
    </style>
    <title>Prestashop_Savemart</title>
    <meta name="description" content="المتجر مدعوم من طرف بريستاشوب">
    <meta name="keywords" content="">





    <link rel="icon" type="image/vnd.microsoft.icon" href="/savemart/img/favicon.ico?1531456858">
    <link rel="shortcut icon" type="image/x-icon" href="/savemart/img/favicon.ico?1531456858">


    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700,900" rel="stylesheet">




    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme-4527f124.css') }}" type="text/css" media="all">

    @livewireStyles

    <script type="text/javascript" src="{{ asset('js/bottom-3c96ed23.js') }}" defer ></script>






    <script type="text/javascript">
        var added_to_wishlist = "The product was successfully added to your wishlist.";
        var isLogged = false;
        var isLoggedWishlist = false;
        var loggin_required = "You must be logged in to manage your wishlist.";
        var prestashop = {"cart":{"products":[],"totals":{"total":{"type":"total","label":"\u0627\u0644\u0625\u062c\u0645\u0627\u0644\u064a","amount":0,"value":"0.00\u00a0UK\u00a3"},"total_including_tax":{"type":"total","label":"\u0627\u0644\u0625\u062c\u0645\u0627\u0644\u064a (\u0634\u0627\u0645\u0644 \u0644\u0644\u0636\u0631\u064a\u0628\u0629)","amount":0,"value":"0.00\u00a0UK\u00a3"},"total_excluding_tax":{"type":"total","label":"\u0627\u0644\u0625\u062c\u0645\u0627\u0644\u064a (\u0628\u062f\u0648\u0646 \u0627\u0644\u0636\u0631\u064a\u0628\u0629)","amount":0,"value":"0.00\u00a0UK\u00a3"}},"subtotals":{"products":{"type":"products","label":"\u0625\u062c\u0645\u0627\u0644\u064a \u0627\u0644\u0637\u0644\u0628","amount":0,"value":"0.00\u00a0UK\u00a3"},"discounts":null,"shipping":{"type":"shipping","label":"\u0627\u0644\u0634\u062d\u0646","amount":0,"value":"\u0645\u062c\u0627\u0646\u0627\u064b"},"tax":null},"products_count":0,"summary_string":"0 \u0645\u0646\u062a\u062c\u0627\u062a","vouchers":{"allowed":0,"added":[]},"discounts":[],"minimalPurchase":0,"minimalPurchaseRequired":""},"currency":{"name":"\u062c\u0646\u064a\u0647 \u0625\u0633\u062a\u0631\u0644\u064a\u0646\u064a","iso_code":"GBP","iso_code_num":"826","sign":"UK\u00a3"},"customer":{"lastname":null,"firstname":null,"email":null,"birthday":null,"newsletter":null,"newsletter_date_add":null,"optin":null,"website":null,"company":null,"siret":null,"ape":null,"is_logged":false,"gender":{"type":null,"name":null},"addresses":[]},"language":{"name":"\u0627\u0644\u0644\u063a\u0629 \u0627\u0644\u0639\u0631\u0628\u064a\u0629 (Arabic)","iso_code":"ar","locale":"ar-SA","language_code":"ar-sa","is_rtl":"1","date_format_lite":"Y-m-d","date_format_full":"Y-m-d H:i:s","id":6},"page":{"title":"","canonical":null,"meta":{"title":"Prestashop_Savemart","description":"\u0627\u0644\u0645\u062a\u062c\u0631 \u0645\u062f\u0639\u0648\u0645 \u0645\u0646 \u0637\u0631\u0641 \u0628\u0631\u064a\u0633\u062a\u0627\u0634\u0648\u0628","keywords":"","robots":"index"},"page_name":"index","body_classes":{"lang-ar":true,"lang-rtl":true,"country-GB":true,"currency-GBP":true,"layout-full-width":true,"page-index":true,"tax-display-enabled":true},"admin_notifications":[]},"shop":{"name":"Prestashop_Savemart","logo":"\/savemart\/img\/prestashopsavemart-logo-1531456858.jpg","stores_icon":"\/savemart\/img\/logo_stores.png","favicon":"\/savemart\/img\/favicon.ico"},"urls":{"base_url":"http:\/\/demo.bestprestashoptheme.com\/savemart\/","current_url":"http:\/\/demo.bestprestashoptheme.com\/savemart\/ar\/?home=home_3&SubmitCurrency=1&id_currency=1","shop_domain_url":"http:\/\/demo.bestprestashoptheme.com","img_ps_url":"http:\/\/demo.bestprestashoptheme.com\/savemart\/img\/","img_cat_url":"http:\/\/demo.bestprestashoptheme.com\/savemart\/img\/c\/","img_lang_url":"http:\/\/demo.bestprestashoptheme.com\/savemart\/img\/l\/","img_prod_url":"http:\/\/demo.bestprestashoptheme.com\/savemart\/img\/p\/","img_manu_url":"http:\/\/demo.bestprestashoptheme.com\/savemart\/img\/m\/","img_sup_url":"http:\/\/demo.bestprestashoptheme.com\/savemart\/img\/su\/","img_ship_url":"http:\/\/demo.bestprestashoptheme.com\/savemart\/img\/s\/","img_store_url":"http:\/\/demo.bestprestashoptheme.com\/savemart\/img\/st\/","img_col_url":"http:\/\/demo.bestprestashoptheme.com\/savemart\/img\/co\/","img_url":"http:\/\/demo.bestprestashoptheme.com\/savemart\/themes\/vinova_savemart\/assets\/img\/","css_url":"http:\/\/demo.bestprestashoptheme.com\/savemart\/themes\/vinova_savemart\/assets\/css\/","js_url":"http:\/\/demo.bestprestashoptheme.com\/savemart\/themes\/vinova_savemart\/assets\/js\/","pic_url":"http:\/\/demo.bestprestashoptheme.com\/savemart\/upload\/","pages":{"address":"http:\/\/demo.bestprestashoptheme.com\/savemart\/ar\/\u0627\u0644\u0639\u0646\u0648\u0627\u0646","addresses":"http:\/\/demo.bestprestashoptheme.com\/savemart\/ar\/\u0627\u0644\u0639\u0646\u0627\u0648\u064a\u0646","authentication":"http:\/\/demo.bestprestashoptheme.com\/savemart\/ar\/\u062a\u0633\u062c\u064a\u0644 \u0627\u0644\u062f\u062e\u0648\u0644","cart":"http:\/\/demo.bestprestashoptheme.com\/savemart\/ar\/\u0639\u0631\u0628\u0629 \u0627\u0644\u062a\u0633\u0648\u0642","category":"http:\/\/demo.bestprestashoptheme.com\/savemart\/ar\/index.php?controller=category","cms":"http:\/\/demo.bestprestashoptheme.com\/savemart\/ar\/index.php?controller=cms","contact":"http:\/\/demo.bestprestashoptheme.com\/savemart\/ar\/\u0627\u062a\u0635\u0644 \u0628\u0646\u0627","discount":"http:\/\/demo.bestprestashoptheme.com\/savemart\/ar\/\u062e\u0635\u0645","guest_tracking":"http:\/\/demo.bestprestashoptheme.com\/savemart\/ar\/\u062a\u062a\u0628\u0639 \u0627\u0644\u0637\u0644\u0628","history":"http:\/\/demo.bestprestashoptheme.com\/savemart\/ar\/\u0633\u062c\u0644 \u0637\u0644\u0628\u0627\u062a \u0627\u0644\u0634\u0631\u0627\u0621","identity":"http:\/\/demo.bestprestashoptheme.com\/savemart\/ar\/\u0627\u0644\u0647\u0648\u064a\u0629","index":"http:\/\/demo.bestprestashoptheme.com\/savemart\/ar\/","my_account":"http:\/\/demo.bestprestashoptheme.com\/savemart\/ar\/\u0627\u0644\u062d\u0633\u0627\u0628 \u0627\u0644\u0634\u062e\u0635\u064a","order_confirmation":"http:\/\/demo.bestprestashoptheme.com\/savemart\/ar\/\u062a\u0623\u0643\u064a\u062f \u0637\u0644\u0628 \u0627\u0644\u0634\u0631\u0627\u0621","order_detail":"http:\/\/demo.bestprestashoptheme.com\/savemart\/ar\/index.php?controller=order-detail","order_follow":"http:\/\/demo.bestprestashoptheme.com\/savemart\/ar\/\u062a\u062a\u0628\u0639 \u0627\u0644\u0637\u0644\u0628","order":"http:\/\/demo.bestprestashoptheme.com\/savemart\/ar\/\u0637\u0644\u0628 \u0634\u0631\u0627\u0621","order_return":"http:\/\/demo.bestprestashoptheme.com\/savemart\/ar\/index.php?controller=order-return","order_slip":"http:\/\/demo.bestprestashoptheme.com\/savemart\/ar\/\u0627\u064a\u0635\u0627\u0644 \u0627\u0644\u062f\u0641\u0639","pagenotfound":"http:\/\/demo.bestprestashoptheme.com\/savemart\/ar\/\u0635\u0641\u062d\u0629 \u063a\u064a\u0631 \u0645\u0648\u062c\u0648\u062f\u0629","password":"http:\/\/demo.bestprestashoptheme.com\/savemart\/ar\/\u0627\u0633\u062a\u0639\u0627\u062f\u0629 \u0643\u0644\u0645\u0629 \u0627\u0644\u0645\u0631\u0648\u0631","pdf_invoice":"http:\/\/demo.bestprestashoptheme.com\/savemart\/ar\/index.php?controller=pdf-invoice","pdf_order_return":"http:\/\/demo.bestprestashoptheme.com\/savemart\/ar\/index.php?controller=pdf-order-return","pdf_order_slip":"http:\/\/demo.bestprestashoptheme.com\/savemart\/ar\/index.php?controller=pdf-order-slip","prices_drop":"http:\/\/demo.bestprestashoptheme.com\/savemart\/ar\/\u0627\u0644\u062a\u062e\u0641\u064a\u0636\u0627\u062a","product":"http:\/\/demo.bestprestashoptheme.com\/savemart\/ar\/index.php?controller=product","search":"http:\/\/demo.bestprestashoptheme.com\/savemart\/ar\/\u0628\u062d\u062b","sitemap":"http:\/\/demo.bestprestashoptheme.com\/savemart\/ar\/\u062e\u0631\u064a\u0637\u0629 \u0627\u0644\u0645\u0648\u0642\u0639","stores":"http:\/\/demo.bestprestashoptheme.com\/savemart\/ar\/\u0645\u062a\u0627\u062c\u0631","supplier":"http:\/\/demo.bestprestashoptheme.com\/savemart\/ar\/\u0627\u0644\u0645\u0648\u0631\u062f","register":"http:\/\/demo.bestprestashoptheme.com\/savemart\/ar\/\u062a\u0633\u062c\u064a\u0644 \u0627\u0644\u062f\u062e\u0648\u0644?create_account=1","order_login":"http:\/\/demo.bestprestashoptheme.com\/savemart\/ar\/\u0637\u0644\u0628 \u0634\u0631\u0627\u0621?login=1"},"alternative_langs":{"en-us":"http:\/\/demo.bestprestashoptheme.com\/savemart\/en\/?home=home_3&SubmitCurrency=1&id_currency=1","fr-fr":"http:\/\/demo.bestprestashoptheme.com\/savemart\/fr\/?home=home_3&SubmitCurrency=1&id_currency=1","es-es":"http:\/\/demo.bestprestashoptheme.com\/savemart\/es\/?home=home_3&SubmitCurrency=1&id_currency=1","it-it":"http:\/\/demo.bestprestashoptheme.com\/savemart\/it\/?home=home_3&SubmitCurrency=1&id_currency=1","pl-pl":"http:\/\/demo.bestprestashoptheme.com\/savemart\/pl\/?home=home_3&SubmitCurrency=1&id_currency=1","ar-sa":"http:\/\/demo.bestprestashoptheme.com\/savemart\/ar\/?home=home_3&SubmitCurrency=1&id_currency=1"},"theme_assets":"\/savemart\/themes\/vinova_savemart\/assets\/","actions":{"logout":"http:\/\/demo.bestprestashoptheme.com\/savemart\/ar\/?mylogout="},"no_picture_image":{"bySize":{"cart_default":{"url":"http:\/\/demo.bestprestashoptheme.com\/savemart\/img\/p\/ar-default-cart_default.jpg","width":125,"height":125},"small_default":{"url":"http:\/\/demo.bestprestashoptheme.com\/savemart\/img\/p\/ar-default-small_default.jpg","width":150,"height":150},"medium_default":{"url":"http:\/\/demo.bestprestashoptheme.com\/savemart\/img\/p\/ar-default-medium_default.jpg","width":210,"height":210},"home_default":{"url":"http:\/\/demo.bestprestashoptheme.com\/savemart\/img\/p\/ar-default-home_default.jpg","width":600,"height":600},"large_default":{"url":"http:\/\/demo.bestprestashoptheme.com\/savemart\/img\/p\/ar-default-large_default.jpg","width":600,"height":600}},"small":{"url":"http:\/\/demo.bestprestashoptheme.com\/savemart\/img\/p\/ar-default-cart_default.jpg","width":125,"height":125},"medium":{"url":"http:\/\/demo.bestprestashoptheme.com\/savemart\/img\/p\/ar-default-medium_default.jpg","width":210,"height":210},"large":{"url":"http:\/\/demo.bestprestashoptheme.com\/savemart\/img\/p\/ar-default-large_default.jpg","width":600,"height":600},"legend":""}},"configuration":{"display_taxes_label":true,"display_prices_tax_incl":true,"is_catalog":false,"show_prices":true,"opt_in":{"partner":true},"quantity_discount":{"type":"discount","label":"\u062e\u0635\u0645"},"voucher_enabled":0,"return_enabled":0},"field_required":[],"breadcrumb":{"links":[{"title":"\u0627\u0644\u0635\u0641\u062d\u0629 \u0627\u0644\u0631\u0626\u064a\u0633\u064a\u0629","url":"http:\/\/demo.bestprestashoptheme.com\/savemart\/ar\/"}],"count":1},"link":{"protocol_link":"http:\/\/","protocol_content":"http:\/\/"},"time":1590861359,"static_token":"28add935523ef131c8432825597b9928","token":"cad5fe8236d849a3b4023c4e5ca6a313"};
        var psr_icon_color = "#F19D76";
    </script>


<script src="{{ asset('js/app.js') }}" defer></script>



    <!-- end modules/novblockwishlist/novblockwishlist_top.tpl -->


    <style type="text/css">
        #main-site {background-color: #ffffff;}@media (min-width: 1200px) {.container {width: 1200px;}#header .container {width: 1200px;}.footer .container {width: 1200px;}#index .container {width: 1200px;}}#popup-subscribe .modal-dialog .modal-content {background-image: url(/savemart/modules/novthemeconfig/images/newsletter_bg-1.png);}
    </style>
        <script type="text/javascript">
            var baseDir = "/savemart/";
            var static_token = "{{ csrf_token() }}";
        </script>



</head>
<body id="index"    class="lang-ar lang-rtl country-gb currency-gbp layout-full-width page-index tax-display-enabled">

    <div  x-data="setup()" @resize.window="handleWindowResize" x-init="$refs.loading.classList.add('hidden');
    setColors('mycolor'); isSidebarOpen=false" :class="{ 'dark': isDark}">

<main id="main-sitep" class="displayhomenovthree dark:bg-dark dark:text-white">
    <x-loading/>




  @include('ex.header')



<div class="sticky top-0 z-50 bg-white text-white transition-transform duration-500 bg-black sm:hidden sm:mb-0"
:class="{
    '-translate-y-full': scrollingDown,
    'translate-y-0 ': scrollingUp,
}"
>
<div class="grid items-center justify-between grid-cols-3 gap-12 p-2 bg-white border-b dark:bg-darker dark:border-primary-darker">



    @auth

    <div class="flex justify-between">
        <div class="mx-4">
            <div class="relative w-16 h-16 " x-data="{ open: false }">
                <button @click="open = !open;"
                    type="button" aria-haspopup="true" :aria-expanded="open ? 'true' : 'false'"
                    class="transition-opacity duration-200 rounded-full dark:opacity-75 dark:hover:opacity-100 focus:outline-none focus:ring dark:focus:opacity-100">
                    <span class="sr-only">User menu</span>
                    <img class="rounded-full " src="{{auth()->user()->avatar}}"
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

                    <a  href="{{ route('profile') }}" role="menuitem"
                    class="block px-1 py-2 text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                    حسابي الشخصي
                </a>
                    <a @click="isSettingsPanelOpen=!isSettingsPanelOpen" href="#" role="menuitem"
                        class="block px-1 py-2 text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                        لوحة التحكم
                    </a>
                    <a href="#" role="menuitem"
                        class="block px-1 py-2 text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full">
                                {{ __('تسجيل الخروج') }}
                            </button>
                        </form>
                    </a>
                </div>
                        </div>
            </div>

        </div>
        </div>

    @endauth
        <div class="flex justify-between space-x-4">
            @livewire('cart.cart-view', key(time()))
            @livewire('wishlist.wishlist-view', key(time()))

        </div>

       @auth
            <div>  <span class="relative">
            <x-bi-chat-fill class="w-16 h-16 text-blue-400" />

            <span class="absolute top-0 right-0 bg-white border rounded-full text-danger ">{{ auth()->user()->unreaded_message_count() }}</span>
        </span>
        </div>

       @endauth

</div>




</div>















    <div id="header-sticky">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="d-flex align-items-center col-xl-4 col-md-4">
                    <div class="contentstickynew_verticalmenu"></div>
                    <div class="contentstickynew_logo"></div>
                </div>
                <div class="contentstickynew_search col-xl-6 col-md-5"></div>
                <div class="contentstickynew_group d-flex justify-content-end col-xl-2 col-md-3"></div>
            </div>
        </div>
    </div>




    <aside id="notifications">
        <div class="container">



        </div>
    </aside>


    <div id="wrapper-site">
        <div id="content-wrapper" class="full-width">



            @yield('content')





        </div>
    </div>

    @include('ex.footer')

    <div class="canvas-overlay"></div>
    <div id="back-top">
  <span>
    <i class="fa fa-long-arrow-up"></i>  </span>
    </div>
</main>

<div id="mobile_top_menu_wrapper" class="hidden-md-up">
    <div class="content">

        <div  class="w-full m-8 text-4xl font-bold text-center">
            <ul class="flex flex-col justify-center space-y-6">
                <li class="">
                    <a href="{{ route('home') }}"
                        title="Home" >
                        <div class="flex space-x-2 dark:text-white"><x-heroicon-o-home class="w-16 h-16 mx-2 text-m_primary"/>الرئيسية</div></a>

                </li>

                <li class="">
                    <a href="{{ route('contact') }}"
                        title="Home" >
                        <div class="flex space-x-2 dark:text-white"><x-heroicon-o-phone class="w-16 h-16 mx-2 text-m_primary"/>تواصل معنا</div></a>


                </li>
                <li class="">
                    <a href="{{ route('aboutus') }}"
                        title="Home" >
                        <div class="flex space-x-2 dark:text-white">من نحن</div></a>

                </li>
            </ul>
        </div></div>
</div>


<div id="mobile-pagemenu" class="mobile-boxpage d-flex hidden-md-up">
    <div class="content-boxpage col">
        <div class="box-header d-flex justify-content-between align-items-center">
            <div class="title-box">Menu</div>
            <div class="text-4xl font-bold close-box text-danger-dark">X</div>
        </div>
        <div class="box-content">
            <div id="desktop_search_content" >
                <form method="get"
                    action="{{ route('search') }}"
                    id="searchbox" class="form-novadvancedsearch">
                    <div class="input-group">
                        <input type="text" id="search_query_top"
                            class="search_query ui-autocomplete-input form-control ac_input"
                            name="search" value="" placeholder="بحث" >

                        {{-- <div class="input-group-btn nov_category_tree hidden-sm-down">
                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" value="" aria-expanded="false">
                                CATEGORIES
                            </button>

                        </div> --}}

                        <span class="input-group-btn">
                            <button class="btn btn-secondary" type="submit" name="submit_search">
                                <i
                                    class="material-icons">search</i></button>
                        </span>
                    </div>

                </form>
            </div>
            <div id="_mobile_verticalmenu"></div>


        </div>
    </div>
</div>

{{-- <div id="mobile-blockcart" class="mobile-boxpage d-flex hidden-md-up">
    <div class="content-boxpage col">
        <div class="box-header d-flex justify-content-between align-items-center">
            <div class="title-box">Cart</div>
            <div class="close-box">Close</div>
        </div>
        <div id="_mobile_cart" class="box-content"></div>
    </div>
</div> --}}



{{-- <div id="mobile-pageaccount" class="mobile-boxpage d-flex hidden-md-up" data-titlebox-parent="Account">
    <div class="content-boxpage col">
        <div class="box-header d-flex justify-content-between align-items-center">
            <div class="back-box">Back</div>
            <div class="title-box">Account</div>
            <div class="close-box">Close</div>
        </div>
        <div class="box-content text-center d-flex justify-content-center align-items-center">
            <div>
                <div id="_mobile_account_list">
                    <div class="account-list-content">
                        <div>
                            <a class="login" href="http://demo.bestprestashoptheme.com/savemart/ar/الحساب الشخصي" rel="nofollow" title="Log in to your customer account"><i class="fa fa-sign-in"></i>Sign in</a>
                        </div>
                        <div>
                            <a class="register" href="http://demo.bestprestashoptheme.com/savemart/ar/الحساب الشخصي" rel="nofollow" title="Register Account"><i class="fa fa-user"></i>Register Account</a>
                        </div>
                        <div>
                            <a class="check-out" href="http://demo.bestprestashoptheme.com/savemart/ar/طلب شراء" rel="nofollow" title="Checkout"><i class="material-icons">check_circle</i>Checkout</a>
                        </div>
                        <div class="link_wishlist">
                            <a href="http://demo.bestprestashoptheme.com/savemart/ar/module/novblockwishlist/mywishlist" title="My Wishlists">
                                <i class="fa fa-heart"></i>My Wishlists
                            </a>
                        </div>
                    </div>
                </div>
                <div class="links-currency" data-target="#box-currency" data-titlebox="Currency"><span>Currency</span><i class="zmdi zmdi-arrow-right"></i></div>
                <div class="links-language" data-target="#box-language" data-titlebox="Language"><span>Language</span><i class="zmdi zmdi-arrow-right"></i></div>
            </div>
        </div>
        <div id="box-currency" class="box-content d-flex">
            <div class="w-100">
                <div class="item-currency current">
                    <a title="جنيه إسترليني" rel="nofollow" href="http://demo.bestprestashoptheme.com/savemart/ar/?home=home_3&amp;SubmitCurrency=1&amp;id_currency=1">جنيه إسترليني: GBP</a>
                </div>
                <div class="item-currency">
                    <a title="دولار أمريكي" rel="nofollow" href="http://demo.bestprestashoptheme.com/savemart/ar/?home=home_3&amp;SubmitCurrency=1&amp;id_currency=2">دولار أمريكي: USD</a>
                </div>
            </div>
        </div>

        <div id="box-language" class="box-content d-flex">
            <div class="w-100">
                <div class="item-language">
                    <a href="http://demo.bestprestashoptheme.com/savemart/en/?home=home_3&SubmitCurrency=1&id_currency=1" class="d-flex align-items-center"><img class="mr-2 img-fluid" src="/savemart/img/l/1.jpg" alt="English (English)" width="16" height="11" /><span>English</span></a>
                </div>
                <div class="item-language">
                    <a href="http://demo.bestprestashoptheme.com/savemart/fr/?home=home_3&SubmitCurrency=1&id_currency=1" class="d-flex align-items-center"><img class="mr-2 img-fluid" src="/savemart/img/l/2.jpg" alt="Français (French)" width="16" height="11" /><span>Français</span></a>
                </div>
                <div class="item-language">
                    <a href="http://demo.bestprestashoptheme.com/savemart/es/?home=home_3&SubmitCurrency=1&id_currency=1" class="d-flex align-items-center"><img class="mr-2 img-fluid" src="/savemart/img/l/3.jpg" alt="Español (Spanish)" width="16" height="11" /><span>Español</span></a>
                </div>
                <div class="item-language">
                    <a href="http://demo.bestprestashoptheme.com/savemart/it/?home=home_3&SubmitCurrency=1&id_currency=1" class="d-flex align-items-center"><img class="mr-2 img-fluid" src="/savemart/img/l/4.jpg" alt="Italiano (Italian)" width="16" height="11" /><span>Italiano</span></a>
                </div>
                <div class="item-language">
                    <a href="http://demo.bestprestashoptheme.com/savemart/pl/?home=home_3&SubmitCurrency=1&id_currency=1" class="d-flex align-items-center"><img class="mr-2 img-fluid" src="/savemart/img/l/5.jpg" alt="Polski (Polish)" width="16" height="11" /><span>Polski</span></a>
                </div>
                <div class="item-language current">
                    <a href="http://demo.bestprestashoptheme.com/savemart/ar/?home=home_3&SubmitCurrency=1&id_currency=1" class="d-flex align-items-center"><img class="mr-2 img-fluid" src="/savemart/img/l/6.jpg" alt="اللغة العربية (Arabic)" width="16" height="11" /><span>اللغة العربية</span></a>
                </div>
            </div>
        </div>

    </div>
</div> --}}

<x-auth-session-status class="mb-4" :status="session('status')" />

<div id="stickymenu_bottom_mobile" class="flex justify-between px-16 text-center bg-m_primary-100 d-flex hidden-md-up">
    <div class="flex flex-col text-xl stickymenu-ite"><a href="{{ route('home') }}"><x-heroicon-o-home class="w-12 h-12 text-m_primary"/><span>الرئيسية</span></a></div>
    <div class="flex flex-col text-xl stickymenu-ite"><a id="_mobile_menutop" class="item-mobile-top nov-toggle-page align-items-center justify-content-center" data-target="#mobile-pagemenu" ><x-heroicon-o-search class="w-12 h-12 text-m_primary"/><span>بحث</span></a></div>
    <div class="flex flex-col text-xl stickymenu-ite"><a href="#"><x-heroicon-o-heart class="w-12 h-12 text-m_primary"/><span>المفضلة</span></a></div>
    <div class="flex flex-col text-xl stickymenu-ite"><a href="#" class="nov-toggle-page" data-target="#mobile-pageaccount"><x-heroicon-o-user class="w-12 h-12 text-m_primary"/><span>حسابي </span></a></div>
</div>
    </div>




    @livewireScripts

    @yield('script')

</body>
</html>
<!-- end index.tpl -->
