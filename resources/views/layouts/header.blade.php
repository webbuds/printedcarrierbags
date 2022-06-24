<style>
    .hotline a {
        color:#fff !important;
    }
    .hotline a:hover {
        color:#fff !important;
    }
</style>
<header class="header-area header-style-1 header-style-5 header-height-2">
            <div class="mobile-promotion">
                <span>The UK's Leading Online Supplier Of Printed Carrier Bags</span>
            </div>
            <div class="header-top header-top-ptb-1 d-none d-lg-block section-side-p">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-4 col-lg-4">
                            <div class="header-info">
                               <div class="d-inline-block">
                                    <ul>
                                        <li>The UK's Leading Online Supplier Of Printed Carrier Bags</li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4">
                            <div class="text-center">
                                
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
            <div class="header-middle header-middle-ptb-1 d-none d-lg-block section-side-p">
                <div class="container">
                    <div class="header-wrap">
                        <div class="logo logo-width-1">
                            <a href="{{URL('/')}}">
   								<img style="min-width:220px; width:220px" src="{{ asset('/public/assets/imgs/site-logo.svg') }}" />
							</a>
                        </div>
                        <div class="header-right">
                            <div class="search-style-2">
                                <form action="#" style="z-index:9999999999">
                                    <select class="select-active" style="z-index:999999999">
										@php
										$headers = [
			'Authorization' => 'Bearer '.session()->get('token'),
				];
			$data=[	];
			$client =  new \GuzzleHttp\Client();
			$response = $client->request('get', 'https://www.devpaper.webdevholdsite.co.uk/public/paper_api/api/v1/product-categories',[
					'form_params'   => $data,
					'headers'       => $headers,
					]);
			$token=json_decode($response->getBody(),true);   
	   	$categories =$token['productcategories'];
										@endphp
										<option>All Categories</option>
										@foreach($categories as $category)
                                        <option>{{ $category['name']}}</option>
										@endforeach
                                    </select>
                                    <input type="text" placeholder="Search for items..." />
                                </form>
                            </div>
                            <div class="header-action-right">
                                <div class="header-action-2">
                                    <div class="hotline d-none d-lg-flex">
                            			<img style="width:0px !important" src="{{asset('/public/assets/imgs/theme/icons/icon-headphone.svg')}}" alt="hotline" />
                            			<p><a href="tel:0201234567" style="color:#425E7A !important">0208 252 8471</a><span style="color:#425E7A !important">Contact our support team</span></p>
                        			</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom header-bottom-bg-color sticky-bar section-side-p" style="z-index:999999999; background:#253D4E;padding-left:0%;padding-right:0%">
                <div class="container" style="z-index:999999999; background:#253D4E; max-width:100%;padding-left:30px">
                    <div class="header-wrap header-space-between position-relative">
                        <div class="logo logo-width-1 d-block d-lg-none">
                            <a href="{{URL('/')}}"><img style="min-width: 100px; width: 100px"  src="{{ asset('/public/assets/imgs/logo.png') }}" alt="logo" /></a>
                        </div>
                        <div class="header-nav d-none d-lg-flex">
                            
                            <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading"  style"z-index:99999999">
                                <nav>
                                    <ul>
										@foreach($categories as $category)
                                        <li>
											@if($category['category']=='none')
                                            <a class="active" style="font-weight:600" href="{{URL('/category/'.$category['slug'])}}">{{ $category['name']}} <i class="fi-rs-angle-down"></i></a>
											@endif
				@php
											 
										   $headers = [
			'Authorization' => 'Bearer '.session()->get('token'),
				];
			$data=[
				'category' => $category['slug'],
				];
			$client =  new \GuzzleHttp\Client();
			$response = $client->request('get', 'https://www.devpaper.webdevholdsite.co.uk/public/paper_api/api/v1/product-categories',[
					'form_params'   => $data,
					'headers'       => $headers,
					]);
			$token1=json_decode($response->getBody(),true); 
				$products = [];
				$term=0;
		foreach($token1['productcategories'] as $cat){
			if( $cat['category']==$category['name']){
			$products[$term] = $cat;
			$url='/category/';
			}
			
				$term++;
											}
											if(count($products)==0){
												   $headers = [
			'Authorization' => 'Bearer '.session()->get('token'),
				];
			$data=[
				'category' => $category['slug'],
				];
			$client =  new \GuzzleHttp\Client();
			$response = $client->request('post', 'https://www.devpaper.webdevholdsite.co.uk/public/paper_api/api/v1/product-by-categories',[
					'form_params'   => $data,
					'headers'       => $headers,
					]);
			$token1=json_decode($response->getBody(),true);  
			if( $token1['message']=='Product not found'){
				$products = [];
			}
			else{
		$products = $token1['products'];
											$url='/product/';
			} 
											}
											else{
											$products=$products;
											}
											
											
	   								$menuproducts =$products;
											@endphp
											
                                            <ul class="sub-menu" style="z-index: 99999999999; top:40px">
												
												@foreach($menuproducts as $menuproduct)
												
                                                    <li><a href="{{URL($url.$menuproduct['slug'])}}">{{ $menuproduct['name'] }}</a></li>
											

												@endforeach
                                            </ul>
                                        </li>
                                       @endforeach
										
                                    </ul>
										
                                </nav>
                            </div>
                        </div>
                        <div class="hotline d-none d-lg-flex">
                            
                        </div>
                        <div class="header-action-icon-2 d-block d-lg-none">
                            <div class="burger-icon burger-icon-white">
                                <span class="burger-icon-top"></span>
                                <span class="burger-icon-mid"></span>
                                <span class="burger-icon-bottom"></span>
                            </div>
                        </div>
                        <div class="header-action-right d-block d-lg-none">
                            <div class="header-action-2">
<!--
                                <div class="header-action-icon-2">
                                    <a href="shop-wishlist">
                                        <img alt="Nest" src="{{asset('/public/assets/imgs/theme/icons/icon-heart.svg')}}" />
                                        <span class="pro-count white">4</span>
                                    </a>
                                </div>
                                <div class="header-action-icon-2">
                                    <a class="mini-cart-icon" href="#">
                                        <img alt="Nest" src="{{asset('/public/assets/imgs/theme/icons/icon-cart.svg')}}" />
                                        <span class="pro-count white">2</span>
                                    </a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                        <ul>
                                            <li>
                                                <div class="shopping-cart-img">
                                                    <a href="shop-product-right"><img alt="Nest" src="{{asset('/public/assets/imgs/shop/thumbnail-3.jpg')}}" /></a>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a href="shop-product-right">Plain Striola Shirts</a></h4>
                                                    <h3><span>1 × </span>$800.00</h3>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="#"><i class="fi-rs-cross-small"></i></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="shopping-cart-img">
                                                    <a href="shop-product-right"><img alt="Nest" src="{{asset('/public/assets/imgs/shop/thumbnail-4.jpg')}}" /></a>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a href="shop-product-right">Macbook Pro 2022</a></h4>
                                                    <h3><span>1 × </span>$3500.00</h3>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="#"><i class="fi-rs-cross-small"></i></a>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="shopping-cart-footer">
                                            <div class="shopping-cart-total">
                                                <h4>Total <span>$383.00</span></h4>
                                            </div>
                                            <div class="shopping-cart-button">
                                                <a href="shop-cart">View cart</a>
                                                <a href="shop-checkout">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
<div class="mobile-header-active mobile-header-wrapper-style">
            <div class="mobile-header-wrapper-inner">
                <div class="mobile-header-top">
                    <div class="mobile-header-logo">
                        <a href="{{URL('/')}}"><img src="{{ asset('/public/assets/imgs/logo.png') }}" alt="logo" /></a>
                    </div>
                    <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                        <button class="close-style search-close">
                            <i class="icon-top"></i>
                            <i class="icon-bottom"></i>
                        </button>
                    </div>
                </div>
                <div class="mobile-header-content-area">
                    <div class="mobile-search search-style-3 mobile-header-border">
                        <form action="#">
                            <input type="text" placeholder="Search for items…" />
                            <button type="submit"><i class="fi-rs-search"></i></button>
                        </form>
                    </div>
                    <div class="mobile-menu-wrap mobile-header-border">
                        <!-- mobile menu start -->
                        <nav>
                            <ul class="mobile-menu font-heading">
							@foreach($categories as $category)
                                <li class="menu-item-has-children">
                                    <a href="{{URL('/category/'.$category['slug'])}}">{{ $category['name']}}</a>
									@php
											 
										   
										   $headers = [
			'Authorization' => 'Bearer '.session()->get('token'),
				];
			$data=[
				'category' => $category['slug'],
				];
			$client =  new \GuzzleHttp\Client();
			$response = $client->request('post', 'https://www.devpaper.webdevholdsite.co.uk/public/paper_api/api/v1/product-by-categories',[
					'form_params'   => $data,
					'headers'       => $headers,
					]);
			$token1=json_decode($response->getBody(),true);  
			if( $token1['message']=='Product not found'){
				$products = [];
			}
			else{
		$products = $token1['products'];
			} 
	   								$menuproducts =$products;
											@endphp
                                    <ul class="dropdown">
										@foreach($menuproducts as $menuproduct)
										                                                    <li><a href="{{URL('product/'.$menuproduct['slug'])}}">{{ $menuproduct['name'] }}</a></li>

												@endforeach
                                       
                                        
                                    </ul>
                                </li>
                             @endforeach  
                            </ul>
                        </nav>
                        <!-- mobile menu end -->
                    </div>
                  
                    <div class="mobile-social-icon mb-50" style="margin-top: 50px">
                        <h6 class="mb-15">Follow Us</h6>
                        <a href="#"><img src="{{asset('/public/assets/imgs/theme/icons/icon-facebook-white.svg')}}" alt="" /></a>
                        <a href="#"><img src="{{asset('/public/assets/imgs/theme/icons/icon-twitter-white.svg')}}" alt="" /></a>
                        <a href="#"><img src="{{asset('/public/assets/imgs/theme/icons/icon-instagram-white.svg')}}" alt="" /></a>
                        <a href="#"><img src="{{asset('/public/assets/imgs/theme/icons/icon-pinterest-white.svg')}}" alt="" /></a>
                        <a href="#"><img src="{{asset('/public/assets/imgs/theme/icons/icon-youtube-white.svg')}}" alt="" /></a>
                    </div>
                    <div class="site-copyright">Copyright 2022 © Paper Carrier Bags.</div>
                </div>
            </div>
        </div>
        <!--End header-->