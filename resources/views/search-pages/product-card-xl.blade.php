
<div class="h-full max-h-full relative border-b border-l ">
    <span class="absolute bottom-4 text-md underline left-2 rounded-xl bg-white text-m_primary font-bold">
        {{ $product->updated_at }}
    </span>

    <div class="flex-wrap  d-flex align-items-center product-miniature js-product-miniature item-row first_item" data-id-product="3" data-id-product-attribute="95" itemscope="" itemtype="http://schema.org/Product">


    <div class="pl-0 col-6 col-w40">
        <div class="thumbnail-container">

                                <a href="{{ route($routename,$product) }}" class="thumbnail product-thumbnail two-image">
                <img class="img-fluid image-cover" src="{{ $product->img }}" alt="" data-full-size-image-url="{{ $product->img }}" width="600" height="600">
                <img class="img-fluid image-secondary" src="{{ $product->imgs!=null?$product->imgs[rand(0,count($product->imgs)-1)]:$product->img }}"
                                  alt=""
                                   data-full-size-image-url="{{ $product->imgs!=null?$product->imgs[rand(0,count($product->imgs)-1)]:$product->img }}"
                                      width="600" height="600">
                                    </a>

        </div>
    </div>
    <div class="col-6 col-w60 no-padding">
        <div class="product-description">
            <div class="product-groups">
               <div class="product-comments">
<div class="star_content">
@php
$count = (int) $product->ratings_value_avg;
@endphp
@for ($i = 1; $i <= $count; $i++)
<div class="star star_on"></div>
@endfor
@for ($i = 0; $i < 5 - $count; $i++)
<div class="star">

</div>
@endfor
</div>
<span>5 review</span>
</div>
<p class="">
<a title="View seller profile"
href="@if ($product->owner_type=="App\Models\Bussinse")
{{ route('b.show',$product->owner->username) }}

@else
{{ route('profile.show',$product->owner->username) }}

@endif">
<div class="flex dark:text-light">
    <span class="flex flex-row space-x-2">
    <x-heroicon-s-user class="w-6 h-6 text-gray-600"/>

    {{ $product->owner->name }}
</span>
</div>
</a>
</p>


                <div class="product-title" itemprop="name"><a href="{{ route($routename,$product) }}">
                    <div class="dark:text-white">   {{$product->name}}</div></a></div>

              <div class="product-group-price">

         <div class="product-price-and-shipping">



            <span itemprop="price" class="price"><div class="dark:text-light">{{ $product->price."/ر.ي" }}</div></span>






                    </div>

              </div>
              </div>
            <div class="product-buttons d-flex justify-content-center" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">

                <div class="flex flex-col justify-center p-2 rounded-full h-14 w-14 dark:bg-white bg-white border border-m_primary mx-2">
                    @livewire('cart.add-to-cart-button', ['p' => $product,'routename'=>$routename=="product.show"?'product.show':'service.show'], key(time()))
                </div>
                <div class="flex flex-col justify-center p-2 rounded-full h-14 w-14 dark:bg-white bg-white border border-m_primary">
                    @livewire('wishlist.add-to-wishlist-button', ['p' => $product,'routename'=>$routename=="product.show"?'product.show':'service.show'], key(time()))
                </div>


                                        <a href="{{ route('search',['deptname'=>$product->department?->name,'dept'=>$product->department?->name]) }}" class="quick-view hidden-sm-down bg-white" data-link-action="quickview">
                    <i class="fa fa-search"></i><span> نظرة سريعة</span>
                </a>
            </div>
        </div>
    </div>
</div>
</div>


{{-- <div class="flex-wrap d-flex align-items-center product-miniature js-product-miniature item-row first_item" data-id-product="3" data-id-product-attribute="95" itemscope="" itemtype="http://schema.org/Product">
			<div class="pl-0 col-6 col-w40">
				<div class="thumbnail-container">

										<a href="https://demo.bestprestashoptheme.com/savemart/ar/smartphone-tablet/3-95-the-best-is-yet-to-come-framed-poster.html#/1-الحجم-ص/13-اللون_-برتقالي" class="thumbnail product-thumbnail two-image">
						<img class="img-fluid image-cover" src="https://demo.bestprestashoptheme.com/savemart/34-home_default/the-best-is-yet-to-come-framed-poster.jpg" alt="" data-full-size-image-url="https://demo.bestprestashoptheme.com/savemart/34-large_default/the-best-is-yet-to-come-framed-poster.jpg" width="600" height="600">
																														<img class="img-fluid image-secondary" src="https://demo.bestprestashoptheme.com/savemart/35-home_default/the-best-is-yet-to-come-framed-poster.jpg" alt="" data-full-size-image-url="https://demo.bestprestashoptheme.com/savemart/35-large_default/the-best-is-yet-to-come-framed-poster.jpg" width="600" height="600">
											</a>

				</div>
			</div>
			<div class="col-6 col-w60 no-padding">
		        <div class="product-description">
		            <div class="product-groups">
		               <div class="product-comments">
	<div class="star_content">
						<div class="star star_on"></div>
								<div class="star star_on"></div>
								<div class="star star_on"></div>
								<div class="star star_on"></div>
								<div class="star star_on"></div>
				</div>
	<span>5 review</span>
</div>     <p class="">
    <a title="View seller profile"
        href="https://demo.bestprestashoptheme.com/savemart/ar/jmarketplace/1_david-james/">
        <div class="flex dark:text-light">
            <span class="flex flex-row space-x-2">
            <x-heroicon-s-user class="w-6 h-6 text-gray-600"/>

            David James
        </span>
</div>
    </a>
</p>


		                <div class="product-title" itemprop="name"><a href="https://demo.bestprestashoptheme.com/savemart/ar/smartphone-tablet/3-95-the-best-is-yet-to-come-framed-poster.html#/1-الحجم-ص/13-اللون_-برتقالي">
                            <div class="dark:text-white">Mauris molestie porttitor diam</div></a></div>

		              <div class="product-group-price">

		                  		                    <div class="product-price-and-shipping">



		                      <span itemprop="price" class="price"><div class="dark:text-light">30.00&nbsp;UK£</div></span>





		                    </div>

		              </div>
		          	</div>
					<div class="product-buttons d-flex justify-content-center" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
																								<form action="https://demo.bestprestashoptheme.com/savemart/ar/عربة التسوق" method="post" class="formAddToCart">
							<input type="hidden" name="token" value="28add935523ef131c8432825597b9928">
							<input type="hidden" name="id_product" value="3">
							<a class="add-to-cart" href="#" data-button-action="add-to-cart"><i class="novicon-cart"></i><span>أضف للسلة</span></a>
						</form>

<a class="addToWishlist wishlistProd_3" href="#" data-rel="3" onclick="WishlistCart('wishlist_block_list', 'add', '3', false, 1); return false;">
	<i class="fa fa-heart"></i>
	<span>Add to Wishlist</span>
</a>
												<a href="#" class="quick-view hidden-sm-down" data-link-action="quickview">
							<i class="fa fa-search"></i><span> نظرة سريعة</span>
						</a>
					</div>
		        </div>
	    	</div>
		</div> --}}
