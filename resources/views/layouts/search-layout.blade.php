@extends('ex.site')


@section('header')
    @include('ex.header')
@endsection

@section('content')
      <div class="container p-4">
    <div class="block-tab-title d-flex align-items-center justify-content-between">
        <ul class="nav nav-tabs justify-content-center" role="tablist">
            <li class="nav-item rounded-full bg-info mx-4"><a href="#producttab797884078newproducts" class="nav-link active" role="tab"
                    data-toggle="tab">New Arrivals</a></li>
            <li class="nav-item"><a href="#producttab797884078bestseller" class="nav-link" role="tab"
                    data-toggle="tab">Best Seller</a></li>
            <li class="nav-item"><a href="#producttab797884078featured" class="nav-link" role="tab"
                    data-toggle="tab">Featured</a></li>
        </ul>
    </div>
      </div>


      <div class="  rounded-xl w-full">


        @yield('search-content')




      </div>


@endsection
