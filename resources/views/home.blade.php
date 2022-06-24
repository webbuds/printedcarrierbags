@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
        
        <main class="main">
   <!--         <section class="home-slider position-relative mb-30">
                <div class="container" style="max-width: 100% !important">
                    <div class="home-slide-cover mt-30">
                        <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
                            <div class="single-hero-slider single-animation-wrap" style="background-image:url({{URL('/public/assets/imgs/home-bg.png')}})">
                                <div class="slider-content">
                                    <h1 class="display-2 mb-40" style="color:#ffffff">
                                        Add Your Strapline
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="slider-arrow hero-slider-1-arrow"></div>
                    </div>
                </div>
            </section>
	-->
            <!--End hero slider-->
			
			<div class="imageContainer">
			<img src="{{asset('/public/assets/imgs/homeImage.png')}}" alt="" />
			</div>
			
			<section class="featured section-padding section-side-p">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 home-card" style="margin-bottom:15px;">
                            <div style="min-height: 100%;" class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay="0">
                                <div class="banner-icon">
                                    <img src="{{asset('/public/assets/imgs/home-icon-1.png')}}" alt="" />
                                </div>
                                <div class="banner-text">
                                    <h3 class="icon-box-title">Guaranteed Quality</h3>
                                    <p>Our staff ensures you get high-quality</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 home-card" style="margin-bottom:15px;">
                            <div style="min-height: 100%" class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                                <div class="banner-icon">
                                    <img src="{{asset('/public/assets/imgs/home-icon-2.png')}}" alt="" />
                                </div>
                                <div class="banner-text">
                                    <h3 class="icon-box-title">Fast Turnaround Time</h3>
                                    <p>We offer the fastest turnaround time</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 home-card" style="margin-bottom:15px;">
                            <div style="min-height: 100%" class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                                <div class="banner-icon">
                                    <img src="{{asset('/public/assets/imgs/home-icon-3.png')}}" alt="" />
                                </div>
                                <div class="banner-text">
                                    <h3 class="icon-box-title">Best prices & offers</h3>
                                    <p>Orders £50 or more for offers</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 home-card" style="margin-bottom:15px;">
                            <div style="min-height: 100%" class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                                <div class="banner-icon">
                                    <img src="{{asset('/public/assets/imgs/home-icon-4.png')}}" alt="" />
                                </div>
                                <div class="banner-text">
                                    <h3 class="icon-box-title">Excellent Support</h3>
                                    <p>Consultation with our customer support</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 home-card" style="margin-bottom:15px;">
                            <div style="min-height: 100%" class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                                <div class="banner-icon">
                                    <img src="{{asset('/public/assets/imgs/home-icon-5.png')}}" alt="" />
                                </div>
                                <div class="banner-text">
                                    <h3 class="icon-box-title">Free Shipping Services</h3>
                                    <p>Benefit from our free shipping services</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 d-xl-none home-card" style="margin-bottom:15px;">
                            <div style="min-height: 100%" class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".5s">
                                <div class="banner-icon">
                                    <img src="{{asset('/public/assets/imgs/theme/icons/icon-6.svg')}}" alt="" />
                                </div>
                                <div class="banner-text">
                                    <h3 class="icon-box-title">Safe delivery</h3>
                                    <p>Within 30 days</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
			
<!--			About Section-->
			<section class="row align-items-center">
                                <div class="col-lg-12">
                                    <div class="pt-50" style="width:70%; margin:0px auto">
                                        <h2 class="mb-30 text-center">UK’s Leading Supplier Of Printed Carrier Bags</h2>
                                        <p class="text-center">Our carrier bag printing service gives you complete creative freedom, bringing your vision to life and creating a design that perfectly represents your brand personality to provide your customers with a bag they’ll love. Add your brand name, logo and any messaging in line with your brand colour scheme that is complete with a high-quality finish thanks to our top of the range machinery.</p>
                                        
                                    </div>
                                </div>
                            </section>
			
<!--			Categories Section-->
			
			<div class="row vendor-grid section-side-p pt-50" style="padding-left:50px; padding-right:50px">
                        @foreach($categories as $category)
				@if($category['category']=='none')
						<div class="col-lg-4 col-md-6 col-12 col-sm-6">
                            <div class="vendor-wrap mb-40">
                                <div class="vendor-img-action-wrap">
                                    <div class="vendor-img">
                                        <a href="{{URL('/category/'.$category['slug'])}}">
                                            <img class="default-img section-content-center" src="{{URL('/storage/app/'.$category['image'])}}" alt="" />
                                        </a>
                                    </div>
                                </div>
                                <div class="vendor-content-wrap">
                                    <div class="d-flex justify-content-between align-items-end mb-30">
                                        <div class="section-content-center">
                                      
                                            <h4 class="mb-5"><a class="primary-clr" href="{{URL('/category/'.$category['slug'])}}">{{$category['name']}}</a></h4>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
				@endif
						@endforeach
                        <!--end vendor card-->  
                    </div>
			
          {{--  <section class="product-tabs section-padding position-relative section-side-p">
                <div class="container">
                    <div class="section-title style-2 wow animate__animated animate__fadeIn section-content-center">
						<h3>Our Best Selling Products</h3>
                    </div>
                    <!--End nav-tabs-->
                    <div class="tab-content pt-50" id="myTabContent">
                        <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                            <div class="row product-grid-4">
                                
                              @foreach($token as $product)
                                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                    <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                        <a href="{{URL('product/'.$product['slug'])}}">
                                           
                          <div> <img src="https://www.devpaper.webdevholdsite.co.uk{{$product['featured_image']}}" alt="product image" /></div>
                                 
                                                </a>
                                            </div>
                                            
                                        </div>
                                        <div class="product-content-wrap">
                                           
                                            <h2><a href="{{URL('product/'.$product['slug'])}}">{{ $product['name'] }}</a></h2>
                                           
											<div style="clear: both"></div>
											<div>
                                                <ul class="product-feature-list" style="display:flex;align-items:center;justify-content:flex-start;flex-wrap:wrap">
																					@if($product['color'] != "")
								<li style="margin-left:10px"><img src="{{asset('public/assets/imgs/products/product-icon-1.svg')}}" /></li>
								@endif
								@if($product['working_days'] != "")
								<li style="margin-left:10px"><img src="{{asset('public/assets/imgs/products/product-icon-1-2.svg')}}" /></li>
								@endif
								@if($product['eco_friendly'] != "")
								<li style="margin-left:10px"><img src="{{asset('public/assets/imgs/products/product-icon-1-3.svg')}}" /></li>
								@endif
								@if($product['best_seller'] != "")
								<li style="margin-left:10px"><img src="{{asset('public/assets/imgs/products/product-icon-1-4.svg')}}" /></li>
								@endif
								@if($product['made_in_the_uk'] != "")
								<li style="margin-left:10px"><img src="{{asset('public/assets/imgs/products/product-icon-1-5.svg')}}" /></li>
								@endif
								@if($product['biodegradable_plastic'] != "")
								<li style="margin-left:10px"><img src="{{asset('public/assets/imgs/products/product-icon-1-6.svg')}}" /></li>
								@endif
							<!--	@if($product['free_delivery'] != "")
								<li style="margin-left:10px"><img src="{{asset('public/assets/imgs/products/product-icon-1-7.svg')}}" /></li>
								@endif -->
												</ul>
                                            </div>
                                            
                                           
                                        </div>
                                    </div>
                                </div>
								@endforeach
                                <!--end product card-->
                            </div>
                            <!--End product-grid-4-->
                        </div>
                        <!--En tab one-->
                    </div>
                    <!--End tab-content-->
                </div>
            </section> --}}
            <!--Products Tabs-->
              <section class="newsletter mb-15 wow animate__animated animate__fadeIn section-side-p pt-50">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="position-relative newsletter-inner">
                                <div class="newsletter-content">
                                    <h2 class="mb-20 text-center">
                                       Some facts about carrier bags!
                                    </h2>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="featured section-padding section-side-p pt-30">
                <div class="container">
                    <div class="row">
						<div class="col-lg-12 col-md-12 col-12 col-sm-12 mb-md-12 mb-xl-0">
                        	<h3 class="mb-20 text-center">
                             	Top high street brands
                            </h3>     
                        </div>
                        <div class="col-lg-2 col-md-4 col-12 col-sm-6 mb-md-4 mb-xl-0">
                        	<img class="section-content-center" src="{{asset('/public/assets/imgs/brands/1.png')}}" alt="" />     
                        </div>
                       <div class="col-lg-2 col-md-4 col-12 col-sm-6 mb-md-4 mb-xl-0">
                        	<img class="section-content-center" src="{{asset('/public/assets/imgs/brands/2.png')}}" alt="" />     
                        </div>
						<div class="col-lg-2 col-md-4 col-12 col-sm-6 mb-md-4 mb-xl-0">
                        	<img class="section-content-center" src="{{asset('/public/assets/imgs/brands/3.png')}}" alt="" />     
                        </div>
						<div class="col-lg-2 col-md-4 col-12 col-sm-6 mb-md-4 mb-xl-0">
                        	<img class="section-content-center" src="{{asset('/public/assets/imgs/brands/4.png')}}" alt="" />     
                        </div>
						<div class="col-lg-2 col-md-4 col-12 col-sm-6 mb-md-4 mb-xl-0">
                        	<img class="section-content-center" src="{{asset('/public/assets/imgs/brands/5.png')}}" alt="" />     
                        </div>
						<div class="col-lg-2 col-md-4 col-12 col-sm-6 mb-md-4 mb-xl-0">
                        	<img class="section-content-center" src="{{asset('/public/assets/imgs/brands/6.png')}}" alt="" />     
                        </div>
                        
                    </div>
                </div>
            </section>
        </main>
       @endsection