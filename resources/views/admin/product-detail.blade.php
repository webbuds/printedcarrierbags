@extends('admin.layout.admin')

@section('title', 'Product Detail')

@section('content')
 <div class="body d-flex py-3">
                <div class="container-xxl">

                    <div class="row align-items-center">
                        <div class="border-0 mb-4">
                            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                <h3 class="fw-bold mb-0">Products Detail</h3>
                            </div>
                        </div>
                    </div> <!-- Row end  -->  

                    <div class="row g-3 mb-3">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="product-details">
                                        <div class="row align-items-center">
                                            <div class="col-lg-6">
                                               <div class="detail-gallery">
                                        <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                        <!-- MAIN SLIDES -->
                                        <div class="product-image-slider">
											@foreach($product['images'] as $image)
                                            <figure class="border-radius-10">
                                            <img src="https://www.devpaper.webdevholdsite.co.uk{{$image['name']}}" alt="product image" />
                                        </figure>
											@endforeach
                                        </div>
                                        <!-- THUMBNAILS -->
                                        <div class="slider-nav-thumbnails">
											@foreach($product['images'] as $image)
                          <div> <img src="https://www.devpaper.webdevholdsite.co.uk{{$image['name']}}" alt="product image" /></div>
                                   @endforeach

										</div>
                                    </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="product-details-content mt-45">
                                                    <h2 class="fw-bold fs-4">{{$product['name']}}</h2>
                                                    <div class="product-items flex-wrap">
                                                        <h6 class="item-title fw-bold">Category</h6>
                                                        <p>{{$product['category']}}</p>
                                                    </div>
													<div class="product-items flex-wrap">
                                                        <h6 class="item-title fw-bold">Status</h6>
                                                        <p>{{$product['status']}}</p>
                                                    </div>
													<div class="product-items flex-wrap">
														<h6 class="item-title fw-bold">Features</h6>
                                                        <ul style="list-style: none; padding-left: 0px">
                                                <li>
													@if($product['color'] != "")
														<img src="http://localhost/papercarrierbags/public/assets/imgs/products/product-icon-1.png"><span style="padding-left:20px">1-2 Colour Print</span>
													@endif
												</li>
                                                <li style="margin-top:10px">
													@if($product['working_days'] != "")
														<img src="http://localhost/papercarrierbags/public/assets/imgs/products/product-icon-2.png"><span style="padding-left:20px">7 working days</span>
													@endif
												</li>
												<li style="margin-top:10px">
													@if($product['eco_friendly'] != "")
														<img src="http://localhost/papercarrierbags/public/assets/imgs/products/product-icon-3.png"><span style="padding-left:20px">Eco friendly</span>
													@endif
												</li>
												<li style="margin-top:10px">
													@if($product['best_seller'] != "")
														<img src="http://localhost/papercarrierbags/public/assets/imgs/products/product-icon-4.png"><span style="padding-left:20px">Best Seller</span>
													@endif
												</li>
												<li style="margin-top:10px">
													@if($product['made_in_the_uk'] != "")
														<img src="http://localhost/papercarrierbags/public/assets/imgs/products/product-icon-5.png"><span style="padding-left:20px">Made in the UK</span>
													@endif
												</li>
												<li style="margin-top:10px">
													@if($product['biodegradable_plastic'] != "")
														<img src="http://localhost/papercarrierbags/public/assets/imgs/products/product-icon-6.png"><span style="padding-left:20px">Biodegradable Plastic</span>
													@endif
												</li>
												<li style="margin-top:10px">
													@if($product['free_delivery'] != "")
														<img src="http://localhost/papercarrierbags/public/assets/imgs/products/product-icon-7.png"><span style="padding-left:20px">Free Delivery</span>
													@endif
												</li>
                                            </ul>
                                                    </div>
													
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Row end  -->  
					
					<div class="row g-3 mb-3">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="product-items flex-wrap">
                                                        <h6 class="item-title fw-bold">Price Per 1000 Quantity</h6>
                                                       	<table  class="product-table" style="width:100%">
															<tr>
																<td><strong>Supplier Price</strong></td>
																<td><strong>Commission</strong></td>
																<td><strong>Total price</strong></td>
																<td><strong>Unit Price</strong></td>
															</tr>
															<tr>
																<td>{{$product['one_sp']}}</td>
																<td>{{$product['one_c']}}</td>
																<td>{{$product['one_total']}}</td>
																<td>{{$product['one_unit']}}</td>
															</tr>
														</table>
                                                    </div>
													
													<div class="product-items flex-wrap">
                                                        <h6 class="item-title fw-bold">Price Per 3000 Quantity</h6>
                                                       	<table  class="product-table" style="width:100%">
															<tr>
																<td><strong>Supplier Price</strong></td>
																<td><strong>Commission</strong></td>
																<td><strong>Total price</strong></td>
																<td><strong>Unit Price</strong></td>
															</tr>
															<tr>
																<td>{{$product['three_sp']}}</td>
																<td>{{$product['three_c']}}</td>
																<td>{{$product['three_total']}}</td>
																<td>{{$product['three_unit']}}</td>
															</tr>
														</table>
                                                    </div>
                                                
													<div class="product-items flex-wrap">
                                                        <h6 class="item-title fw-bold">Price Per 5000 Quantity</h6>
                                                       	<table  class="product-table" style="width:100%">
															<tr>
																<td><strong>Supplier Price</strong></td>
																<td><strong>Commission</strong></td>
																<td><strong>Total price</strong></td>
																<td><strong>Unit Price</strong></td>
															</tr>
															<tr>
																<td>{{$product['five_sp']}}</td>
																<td>{{$product['five_c']}}</td>
																<td>{{$product['five_total']}}</td>
																<td>{{$product['five_unit']}}</td>
															</tr>
														</table>
                                                    </div>
                                                    
                                                   <div class="product-items flex-wrap">
                                                        <h6 class="item-title fw-bold">Price Per 10000 Quantity</h6>
                                                       	<table  class="product-table" style="width:100%">
															<tr>
																<td><strong>Supplier Price</strong></td>
																<td><strong>Commission</strong></td>
																<td><strong>Total price</strong></td>
																<td><strong>Unit Price</strong></td>
															</tr>
															<tr>
                                                                <td>{{$product['ten_c']}}</td>
																<td>{{$product['ten_total']}}</td>
																<td>{{$product['ten_unit']}}</td>
																<td>{{$product['ten_sp']}}</td>
															</tr>
														</table>
                                                    </div>
													 <div class="product-items flex-wrap">
                                                        <h6 class="item-title fw-bold">Plate Charge</h6>
                                                       	<table  class="product-table" style="width:100%">
															<tr>
																<td><strong>Supplier Price</strong></td>
																<td><strong>Commission</strong></td>
																<td><strong>Total price</strong></td>
																<td><strong>Unit Price</strong></td>
															</tr>
															<tr>
																<td>{{$product['plate_sp']}}</td>
																<td>{{$product['plate_c']}}</td>
																<td>{{$product['plate_total']}}</td>
																<td>{{$product['plate_unit']}}</td>
															</tr>
														</table>
                                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div><!-- Row end  -->  
					
					
                    <div class="row g-3 mb-3">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <ul class="nav nav-tabs tab-body-header rounded  d-inline-flex" role="tablist">
                                        <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#descriptions" role="tab">Descriptions</a></li>
                                       
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="descriptions">
                                        <div class="card-body">
                                            <p>{{$product['desc']}}</p>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div><!-- Row end  -->  

                </div>
            </div>    
@endsection