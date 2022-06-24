@extends('layouts.app')
@php
$title=request()->segment(count(request()->segments()));
$title=ucwords(str_replace('-', ' ', $title));
@endphp
@section('title',$title )

@section('content')
        
        <main class="main">
			<div class="row vendor-grid section-side-p pt-50 mb-40">
						@if($products!=0)
						@foreach($products as $product)
                        <div class="col-lg-3 col-md-3 col-12 col-sm-6">
                            <div class="vendor-wrap mb-10" style="border:1px solid #707070 !important">
                                <div class="vendor-img-action-wrap">
                                    <div class="vendor-img">
                                        <a href="{{URL('product/'.$product['slug'])}}">
												 <img src="https://www.devpaper.webdevholdsite.co.uk{{$product['featured_image']}}" alt="product image" />                                        </a>
                                    </div>
                                </div> 
                            </div>
                            <div class="section-content-center">
                            	<h4 class="mb-5"><a class="primary-clr" style="color:#2C2D2E !important" href="{{URL('product/'.$product['slug'])}}">{{ $product['name'] }}</a></h4>
							</div>
							<ul style="display: flex; align-items: center; margin-top:10px; justify-content: center">
								@if($product['color'] != "")
								<li style="margin-left:10px;margin-bottom:10px;position:relative;">
									<img style="cursor:pointer" title="Color" src="{{asset('public/assets/imgs/products/product-icon-1-1.svg')}}" /></li>
								@endif
								@if($product['working_days'] != "")
								<li style="margin-left:10px;margin-bottom:10px;"><img style="cursor:pointer" title="Working Days" src="{{asset('public/assets/imgs/products/product-icon-1-2.svg')}}" /></li>
								@endif
								@if($product['eco_friendly'] != "")
								<li style="margin-left:10px;margin-bottom:10px;"><img style="cursor:pointer" title="Eco Friendly" src="{{asset('public/assets/imgs/products/product-icon-1-3.svg')}}" /></li>
								@endif
								@if($product['best_seller'] != "")
								<li style="margin-left:10px;margin-bottom:10px;"><img style="cursor:pointer" title="Best Seller" src="{{asset('public/assets/imgs/products/product-icon-1-4.svg')}}" /></li>
								@endif
								@if($product['made_in_the_uk'] != "")
								<li style="margin-left:10px;margin-bottom:10px;"><img style="cursor:pointer" title="Made in UK" src="{{asset('public/assets/imgs/products/product-icon-1-5.svg')}}" /></li>
								@endif
								@if($product['biodegradable_plastic'] != "")
								<li style="margin-left:10px;margin-bottom:10px;"><img style="cursor:pointer" title="Biodegradable Plastic" src="{{asset('public/assets/imgs/products/product-icon-1-6.svg')}}" /></li>
								@endif
							</ul>          
                        </div>
						@endforeach
				@else
				@foreach($categories as $product)
                        <div class="col-lg-3 col-md-3 col-12 col-sm-6">
                            <div class="vendor-wrap mb-10" style="border:1px solid #707070 !important">
                                <div class="vendor-img-action-wrap">
                                    <div class="vendor-img">
                                        <a href="{{URL('category/'.$product['slug'])}}">
												 <img src="{{URL('/storage/app/'.$product['image'])}}" alt="product image" />                                        </a>
                                    </div>
                                </div> 
                            </div>
                            <div class="section-content-center">
                            	<h4 class="mb-5"><a class="primary-clr" style="color:#2C2D2E !important" href="{{URL('category/'.$product['slug'])}}">{{ $product['name'] }}</a></h4>
							</div>
							         
                        </div>
						@endforeach
				@endif
                        <!--end vendor card-->
                    </div>   
        </main>
       @endsection