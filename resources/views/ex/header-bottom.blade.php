
<div class="header-bottom hidden-sm-down">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="contentsticky_verticalmenu verticalmenu-main col-md-1 col-lg-3 d-flex"
                data-textshowmore="Show More" data-textless="Hide" data-desktop_item="3">
                <div class="toggle-nav bg-m_primary-dark dark:bg-m_primary d-flex align-items-center justify-content-start">
                    <span class="btnov-lines"></span>
                    <span>تسوق عن طريق القسم </span>
                    <span class="caret-circle"></span>
                </div>
                <div class=" verticalmenu-content has-showmore">
                    <div id="_desktop_verticalmenu" class="block nov-verticalmenu" data-count_showmore="6">
                        <div class="box-content block_content">
                            <div id="verticalmenu" class="verticalmenu" role="navigation">
                                <ul class="menu level1">
                                    @foreach ($depts as $d)
                                    <li class="item parent"><a href="{{ route('search',['dept'=>$d->id]) }}"
                                    title="{{ $d->name }}">
                                            <i class="hasicon nov-icon"></i>{{ $d->name }}
                                        </a><span class="show-sub fa-active-sub"></span>
                                        <span class="w-3/4 truncate menu-sub-title">{{ $d->note }}</span>
                                        <div class="dropdown-menu" style="width:222px">


                                            <ul>

                                                @foreach ($d->parts as $p)
                                                    <li class="item ">
                                                        <a href="{{ route('search',['dept'=>$d->id,'part'=>$p->id]) }}"
                                                            title="{{ $p->name }}">{{ $p->name }}</a>
                                                    </li>
                                                @endforeach


                                            </ul>
                                        </div>
                                    </li>
                                @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-2 rounded-full col-lg-9 col-md-11 dark:bg-m_primary dark:text-m_primary-darker bg-m_primary-dark text-m_primary header-menu d-flex align-items-center justify-content-end">

                <div id="_desktop_top_menu" algin='left'>
                    <nav id="nov-megamenu" class="clearfix">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div id="megamenu" class="clearfix nov-megamenu">
                            <ul class="menu level1">

                                <li class="item has-sub" x-data='{opendropdown1:false,dclass:"hidden"}' x-on:mousemove='opendropdown1=true; dclass=""' ><span class="opener"></span>

                                    <a  x-on:click='opendropdown1=!opendropdown1; dclass=dclass=="hidden"?"":"hidden";'
                                        title="Blog"><div class="flex space-x-2 dark:text-white"><x-bi-shop class="w-5 h-5 mx-2 text-m_primary dark:text-m_primary-dark"/><span class="text-light">الاسواق</span></div></a>
                                    <div :class="dclass" class="dropdown-menu" style="width:270px">
                                        <ul class="">
                                            @foreach ($markts as $m)
                                            <li class="item "><a
                                                    href="{{ route('search-bussinse',['markt'=>$m->id]) }}"
                                                    title="Blog detail">{{ $m->name }}</a></li>
                                                    @endforeach
                                        </ul>
                                    </div>
                                </li>
                                <li class="item group"  x-data='{opendropdown2:false,dclass:"hidden"}' x-on:mousemove='opendropdown2=true;dclass=""'><span class="opener"></span><a
                                    x-on:click='opendropdown2=!opendropdown2; dclass=dclass=="hidden"?"":"hidden";' class="cursor-pointer" title="Categories"><div class="flex dark:text-white"><x-bi-grid-fill class="w-5 h-5 mx-2 dark:text-m_primary-dark text-m_primary"/><span class="text-light">الاقسام</span></div></a>
                                    <div  :class="dclass" class="dropdown-menu">
                                        <ul class="">
                                            <li class="container item group">
                                                <div class="dropdown-menu">
                                                    <ul class="">

                                                        @foreach ($depts as $dept )

                                                        <li class="item col-lg-3 col-md-3 html">
                                                            <a href="{{route('search',['dept'=>$dept->id]) }}"><span
                                                                class="menu-title">{{ $dept->name }}</span></a>

                                                        </li>

                                                        @endforeach

                                                    </ul>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>

                                    {{-- <div x-bind:class="{'hidden':!opendropdown2,'flex flex-col sm:h-0 h-64 sm:overflow-hidden':opendropdown2}" class="flex flex-col h-64 sm:h-0 sm:overflow-hidden" >
                                        <ul class="">
                                            @foreach ($depts as $m)
                                            <li class="item "><a
                                                    href="/savemart/en/index.php?fc=module&amp;module=smartblog&amp;id_post=14&amp;controller=details"
                                                    title="Blog detail">{{ $m->name }}</a></li>
                                                    @endforeach
                                        </ul>
                                    </div> --}}
                                </li>

                            </ul>
                        </div>
                    </nav>
                </div>

                <div id="_desktop_search" class="contentsticky_search">
                    <!-- block seach mobile -->
                    <!-- Block search module TOP -->
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
                    <!-- /Block search module TOP -->

                </div>
            </div>
        </div>
    </div>
</div>




{{-- <div class="header-bottom hidden-sm-down">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div x-data="{ opennav: false }"
                class="rounded-full contentsticky_verticalmenu verticalmenu-main col-lg-3 col-md-1 d-flex"
                data-textshowmore="Show More" data-textless="Hide" data-desktop_item="4">
                <div x-on:click='opennav=!opennav'
                    class="bg-dark dark:bg-m_primary toggle-nav d-flex align-items-center justify-content-start">
                    <span x-on:click='opennav=!opennav' class="btnov-lines"></span>
                    <span x-on:click='opennav=!opennav'>الاقسام</span>
                </div>
                <div class="verticalmenu-content has-showmore show">

                    <!-- begin /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/novverticalmenu/views/templates/hook/novverticalmenu.tpl -->
                    <div id="_desktop_verticalmenu" class="block nov-verticalmenu"
                        data-count_showmore="4">
                        <div class="box-content block_content">
                            <div id="verticalmenu" class="verticalmenu" role="navigation">
                                <ul class="menu level1 ">


                                    @foreach ($depts as $d)
                                        <li class="item parent"><a href="#" title="Laptops &amp; Accessories">
                                                <i class="hasicon nov-icon"></i>{{ $d->name }} &amp;
                                                Accessories</a><span class="show-sub fa-active-sub"></span>
                                            <span class="w-3/4 truncate menu-sub-title">{{ $d->note }}</span>
                                            <div class="dropdown-menu" style="width:222px">


                                                <ul>

                                                    @foreach ($d->parts as $p)
                                                        <li class="item ">
                                                            <a href="#"
                                                                title="Macbook Pro">{{ $p->name }}</a>
                                                        </li>
                                                    @endforeach


                                                </ul>
                                            </div>
                                        </li>
                                    @endforeach


                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- end /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/novverticalmenu/views/templates/hook/novverticalmenu.tpl -->

                </div>
            </div>

            <div class="col-lg-9 col-md-11 header-menu d-flex align-items-center justify-content-start">
                <div
                    class="rounded-full dark:bg-m_primary dark:text-m_primary-darker bg-m_primary-dark text-m_primary d-flex justify-content-between w-100 align-items-center">


                    <div class="advencesearch_header">
                        <span class="toggle-search hidden-lg-up"><i class="zmdi zmdi-search"></i></span>
                        <div id="_desktop_search" class="contentsticky_search">

                            <!-- begin modules/novadvancedsearch/novadvancedsearch-top.tpl -->
                            <!-- block seach mobile -->
                            <!-- Block search module TOP -->
                            <div id="desktop_search_content" data-id_lang="6" data-ajaxsearch="1"
                                data-novadvancedsearch_type="top" data-instantsearch="" data-search_ssl="">
                                <form method="get" id="searchbox" class="form-novadvancedsearch">
                                    <input type="hidden" name="fc" value="module">
                                    <input type="hidden" name="module" value="novadvancedsearch">
                                    <input type="hidden" name="controller" value="result">
                                    <input type="hidden" name="orderby" value="position" />
                                    <input type="hidden" name="orderway" value="desc" />
                                    <input type="hidden" name="id_category" class="id_category" value="0" />
                                    <div class="input-group">
                                        <input type="text" id="search_query_top"
                                            class="search_query ui-autocomplete-input form-control"
                                            name="search_query" value="" placeholder="Search" />



                                        <span class="input-group-btn">
                                            <button class="btn btn-secondary" type="submit" name="submit_search"><i
                                                    class="material-icons">search</i></button>
                                        </span>
                                    </div>

                                </form>
                            </div>
                            <!-- /Block search module TOP -->

                            <!-- end modules/novadvancedsearch/novadvancedsearch-top.tpl -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}




































{{-- <div id="_desktop_top_menu">

                        <!-- begin modules/novmegamenu/views/templates/hook/novmegamenu.tpl -->
                        <nav id="nov-megamenu" class="clearfix">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div id="megamenu" class="clearfix nov-megamenu">
                                <ul class="menu level1">
                                    <li
                                        class="item dark:hover:text-m_primary-darker hover:text-m_primary dark:text-m_primary-darker text-light ">
                                        <a href="?home" title="Home"><i class="zmdi zmdi-home"></i><span
                                                class="text-white dark:hover:text-m_primary-darker hover:text-m_primary">اتصل
                                                بنا</span></a>
                                    </li>
                                    <li
                                        class="item dark:hover:text-m_primary-darker hover:text-m_primary dark:text-m_primary-darker text-light ">
                                        <a href="?home" title="Home"><i class="zmdi zmdi-home"></i><span
                                                class="text-white hover:text-m_primary">من نحن</span></a>
                                    </li>

                                    <li class="item home-page has-sub"><span class="opener">
                                        </span>
                                        <a href="#" title="Home">
                                            <i class="zmdi zmdi-home"></i>
                                            <span
                                                class="hover:text-m_primary dark:text-m_primary-darker text-light">الاسواق</span>
                                        </a>
                                        <div class="dropdown-menu" style="width:200px">
                                            <ul class="">
                                                <li class="item ">
                                                    <span title="Homepage 1">مرحبا بكم يمكنكم استعراض الاسواق</span>
                                                </li>

                                                @foreach ($markts as $m)
                                                    <li
                                                        class="item col-md-3 dark:text-m_primary-darker text-m_primary mw-20 html">
                                                        <a href="?home=home_1"><span
                                                                class="menu-title text-m_primary">{{ $m->name }}</span>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </li>

                                    <li class="item group"><span class="opener"></span>
                                        <a href="#" class="" title="Categories">
                                            <i class="zmdi zmdi-group"></i><span
                                                class="hover:text-m_primary dark:text-m_primary-darker text-light">
                                                الاقسام </span></a>
                                        <div class="dropdown-menu">
                                            <ul class="">
                                                <li class="container item group">
                                                    <div class="dropdown-menu">
                                                        <ul class="">




                                                            @foreach ($depts as $d)
                                                                <li class="item col-lg-3 col-md-3 html">
                                                                    <span class="menu-title">{{ $d->name }}</span>
                                                                    <div class="menu-content">
                                                                        <ul class="col">
                                                                            @foreach ($d->parts()->take(3) as $p)
                                                                                <li><a href="#"
                                                                                        title="HP Pavilion">{{ $p->name }}</a>
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                </li>
                                                            @endforeach

                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        <!-- end modules/novmegamenu/views/templates/hook/novmegamenu.tpl -->

                    </div> --}}
