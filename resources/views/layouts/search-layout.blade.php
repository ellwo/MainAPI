@extends('ex.site')


@section('header')
    @include('ex.header')
@endsection

@section('content')
    <div class="container p-4">
        <div class="block-tab-title d-flex align-items-center justify-content-between">
            <ul class="nav nav-tabs justify-content-center" >
                <li class=" nav-item">
                    <a href="{{ route('search',['search'=>$search]) }}" class="nav-link @if(request()->routeIs('search')) bg-info active @endif" >
                        الكل</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('search-product',['search'=>$search]) }}" class="nav-link @if(request()->routeIs('search-product')) bg-info active @endif" >المنتجات</a></li>

                    <li class="nav-item">
                        <a href="{{ route('search-service',['search'=>$search]) }}" class="nav-link @if(request()->routeIs('search-service')) bg-info active @endif" >الخدمات</a></li>

                        <li class="nav-item">
                            <a href="{{ route('search-bussinse',['search'=>$search]) }}" class="nav-link @if(request()->routeIs('search-bussinse')) bg-info active @endif" >حسابات تسويقية </a></li>
            </ul>
        </div>
    </div>


    <div class="w-full rounded-xl">


        @yield('search-content')




    </div>
@endsection
