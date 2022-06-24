@extends('admin.layout.admin')

@section('title', 'Products')

@section('content')
 <div class="body d-flex py-3">
                <div class="container-xxl">

                    <div class="row align-items-center">
                        <div class="border-0 mb-4">
                            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                <h3 class="fw-bold mb-0">Edit Product</h3>
                                <a href="/paperadmin/products" class="btn btn-primary btn-set-task w-sm-100 py-2 px-5 text-uppercase">All Products</a>
                            </div>
							<div class="col-md-12">
								@if(Session::has('success'))
									<div class="alert alert-success">{{ Session::get('success') }}</div>
								@endif
							</div>
                        </div>
                    </div> <!-- Row end  -->  
                    
                    <div class="row g-3 mb-3">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card mb-3">
                                <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                    <h6 class="mb-0 fw-bold ">Basic information</h6>
                                </div>
                                <div class="card-body">
                                    <form action="{{URL('/paperadmin/products/add-product')}}" enctype="multipart/form-data" method="post" >
										@csrf
                                        <div class="row g-3 align-items-center">
                                            <div class="col-md-6">
							<input type="hidden" id="" name="product_id" class="form-control" value="{{$product['id']}}">

                                                <label  class="form-label">Product Name <span class="text text-danger">*</span></label>
                                                <input type="text" id="p_title" name="name" onkeyup="slugMaking()" class="form-control" value="{{$product['name']}}" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label  class="form-label">Product Slug</label>
                                                <input type="text" id="p_slug" name="slug" class="form-control" value="{{$product['slug']}}" readonly="readonly" required>
                                            </div>
											<div class="col-md-6">
                                                @error('name')
													<p class="text text-danger">{{ $message }}</p>
												@enderror
                                            </div>
                                            <div class="col-md-6"></div>
                                            <div class="col-md-6">
                                                <label  class="form-label">Category <span class="text text-danger">*</span></label>
                                                <select class="form-select" name="category" aria-label="size 3 select example" required>
                                            			<option value="">Choose Category</option>
														@foreach ($parent as $p_item)
													 <option value="{{ $p_item['id'] }}" {{ ( $p_item['id'] == $product['category']) ? 'selected' : '' }}>
															{{ $p_item['name'] }}</option>
														@endforeach
                                                 </select>
                                            </div>
                                            <div class="col-md-6"></div>
											<div class="col-md-6">
                                                @error('p_parent')
													<p class="text text-danger">{{ $message }}</p>
												@enderror
                                            </div>
                                            <div class="col-md-6"></div>
											<div class="col-md-12">
												<h6 class="mb-0 fw-bold ">Price Per 1000 to 2999 Quantity</h6>
											</div>
											<div class="col-md-6">
												<label  class="form-label">Supplier Price(£) <span class="text text-danger">*</span></label>
                                                <input type="number" name="one_sp" class="form-control" value="{{$product['one_sp']}}" required>
											</div>
											<div class="col-md-6">
												<label  class="form-label">Commission(£) <span class="text text-danger">*</span></label>
                                                <input type="number" name="one_c" class="form-control" value="{{$product['one_c']}}" required>
											</div>
											<div class="col-md-6">
                                                @error('one_sp')
													<p class="text text-danger">{{ $message }}</p>
												@enderror
                                            </div>
											<div class="col-md-6">
                                                @error('one_c')
													<p class="text text-danger">{{ $message }}</p>
												@enderror
                                            </div>
											<div class="col-md-12">
												<h6 class="mb-0 fw-bold" style="margin-top:15px">Price Per 3000 to 4999 Quantity</h6>
											</div>
											<div class="col-md-6">
												<label  class="form-label">Supplier Price(£)</label>
                                                <input type="number" name="three_sp" class="form-control" value="{{$product['three_sp']}}" required>
											</div>
											<div class="col-md-6">
												<label  class="form-label">Commission(£)</label>
                                                <input type="number" name="three_c" class="form-control" value="{{$product['three_c']}}" required>
											</div>
											
											<div class="col-md-12">
												<h6 class="mb-0 fw-bold " style="margin-top:15px">Price Per 5000 to 9999 Quantity</h6>
											</div>
											<div class="col-md-6">
												<label  class="form-label">Supplier Price(£)</label>
                                                <input type="number" name="five_sp" class="form-control" value="{{$product['five_sp']}}" required>
											</div>
											<div class="col-md-6">
												<label  class="form-label">Commission(£)</label>
                                                <input type="number" name="five_c" class="form-control" value="{{$product['five_c']}}" required>
											</div>
											
											<div class="col-md-12">
												<h6 class="mb-0 fw-bold " style="margin-top:15px">Price Per 10000 and above Quantity</h6>
											</div>
											<div class="col-md-6">
												<label  class="form-label">Supplier Price(£)</label>
                                                <input type="number" name="ten_sp" class="form-control" value="{{$product['ten_sp']}}" required>
											</div>
											<div class="col-md-6">
												<label  class="form-label">Commission(£)</label>
                                                <input type="number" name="ten_c" class="form-control"  value="{{$product['ten_c']}}" required>
											</div>
											
											<div class="col-md-12">
												<h6 class="mb-0 fw-bold " style="margin-top:15px">Plate Charge</h6>
											</div>
											<div class="col-md-6">
												<label  class="form-label">Supplier Price(£) <span class="text text-danger">*</span></label>
                                                <input type="number" name="plate_sp" class="form-control" value="{{$product['plate_sp']}}" required>
											</div>
											<div class="col-md-6">
												<label  class="form-label">Commission(£) <span class="text text-danger">*</span></label>
                                                <input type="number" name="plate_c" class="form-control" value="{{$product['plate_c']}}" required>
											</div>
											<div class="col-md-6">
                                                @error('plate_sp')
													<p class="text text-danger">{{ $message }}</p>
												@enderror
                                            </div>
											<div class="col-md-6">
                                                @error('plate_c')
													<p class="text text-danger">{{ $message }}</p>
												@enderror
                                            </div>
											<div class="col-md-12">
                                                <h6 class="mb-0 fw-bold " style="margin-top:15px;">Product Description <span class="text text-danger">*</span></h6>
                                            </div>
											 <div>
												<input placeholder="Title" name="p_desc_title" style="width:100%; border:1px solid #aaa; border-radius:5px; padding:10px; font-family:inherit; margin-bottom: 5px;" value="{{$product['p_desc_title']}}"/>
                                                <textarea name="p_desc" style="width:100%; height:300px; border:1px solid #aaa; border-radius:5px; padding:10px; font-family:inherit;">{{$product['desc']}}</textarea>
                                            </div>
											
											<div class="col-md-12">
                                                <h6 class="mb-0 fw-bold " style="margin-top:15px;">Delivery Description <span class="text text-danger">*</span></h6>
                                            </div>
											 <div>
												<input placeholder="Title" name="p_del_title" style="width:100%; border:1px solid #aaa; border-radius:5px; padding:10px; font-family:inherit; margin-bottom: 5px;"  value="{{$product['p_del_title']}}"/>
                                                <textarea name="p_del_desc" style="width:100%; height:300px; border:1px solid #aaa; border-radius:5px; padding:10px; font-family:inherit;">{{$product['p_del_title']}}</textarea>
                                            </div>
											
											<div class="col-md-12">
                                                <h6 class="mb-0 fw-bold " style="margin-top:15px;">Art Work Description <span class="text text-danger">*</span></h6>
                                            </div>
											 <div>
												<input placeholder="Title" name="p_art_title" style="width:100%; border:1px solid #aaa; border-radius:5px; padding:10px; font-family:inherit; margin-bottom: 5px;"  value="{{$product['p_art_title']}}"/>
                                                <textarea name="p_art_desc" style="width:100%; height:300px; border:1px solid #aaa; border-radius:5px; padding:10px; font-family:inherit;">{{$product['p_art_desc']}}</textarea>
                                            </div>
                                          
											<div class="col-md-12">
                                                @error('p_desc')
													<p class="text text-danger">{{ $message }}</p>
												@enderror
                                            </div>
											<div class="col-md-12">
												<h6 class="mb-0 fw-bold " style="margin-top:15px;">Product Images Upload</h6>
                                               
                                                <small class="d-block text-muted mb-2">Only portrait, square and landscape images, 5M max and 20000px max-height.</small>
                                                <input type="file" id="input-file-to-destroy" class="dropify" data-allowed-formats="portrait square landscape" data-max-file-size="5M" data-max-height="20000"   data-default-file="https://www.devpaper.webdevholdsite.co.uk.{{$product['featured_image']}}">
                                            </div>
											
											<div class="col-md-3">
												@error('f_image')
													<p class="text text-danger">{{ $message }}</p>
												@enderror
											</div>
											<div class="col-md-3"></div>
											<div class="col-md-3"></div>
											<div class="col-md-3"></div>
                                        </div>
										
																					<div class="col-md-12">
											<h6 class="mb-0 fw-bold " style="margin-top:15px;">Gallery Image</h6><br>
                                            </div>
										
										<div style="display:flex; align-items:flex-start;justify-content:flex-start;width:100%;overflow:hidden;">
											<div class="col-md-3" style="margin-right:10px">
											<input type="file" id="input-file-to-destroy" name="gallery_image_1" class="dropify" data-default-file="https://www.devpaper.webdevholdsite.co.uk.{{$product['image1']}}">
                                            </div>
											<div class="col-md-3" style="margin-right:10px">
											<input type="file" id="input-file-to-destroy" name="gallery_image_2" class="dropify" data-default-file="https://www.devpaper.webdevholdsite.co.uk.{{$product['image2']}}">
                                            </div>
											<div class="col-md-3" style="margin-right:10px">
											<input type="file" id="input-file-to-destroy" name="gallery_image_3" class="dropify" data-default-file="https://www.devpaper.webdevholdsite.co.uk.{{$product['image3']}}">
                                            </div>
											<div class="col-md-3">
											<input type="file" id="input-file-to-destroy" name="gallery_image_4" class="dropify" data-default-file="https://www.devpaper.webdevholdsite.co.uk.{{$product['image4']}}">
                                            </div>
										</div>
										
                                    
                                </div>
							</div>
                            
							<div class="card mb-3">
                                <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                    <h6 class="mb-0 fw-bold ">Features <span class="text text-danger">*</span></h6>
                                </div>
                                 <div class="card-body">
                                        <div class="form-check">
											@if($product['color']=='checked')
                                            <input class="form-check-input" name="color" type="checkbox" value="checked" checked id="sizechek1">
                                            @else
										<input class="form-check-input" name="color" type="checkbox" value="checked" id="sizechek1">
											@endif
											<label class="form-check-label" for="sizechek1">
                                            1 Colour Print
                                            </label>
                                        </div>
									 	
									  <div class="form-check">
										  @if($product['color3']=='checked')
                                            <input class="form-check-input" name="color3" type="checkbox" value="checked" id="sizechek2" checked>
										  @else
										    <input class="form-check-input" name="color3" type="checkbox" value="checked" id="sizechek2">

										  	@endif
                                            <label class="form-check-label" for="sizechek2">
                                            1-3 Colour Print
                                            </label>
                                        </div>	
									 	<div class="form-check">
											@if($product['color4']=='checked')
                                            <input class="form-check-input" name="color4" type="checkbox" value="checked" id="sizechek3" checked>
                                           @else
											 <input class="form-check-input" name="color4" type="checkbox" value="checked" id="sizechek3">

											@endif
											<label class="form-check-label" for="sizechek3">
                                            1-4 Colour Print
                                            </label>
                                        </div>
									 <div class="form-check">
										 @if($product['color6']=='checked')
                                            <input class="form-check-input" name="color6" type="checkbox" value="checked" id="sizechek4" checked>
                                         @else  
                                            <input class="form-check-input" name="color6" type="checkbox" value="checked" id="sizechek4">

										 @endif
										 <label class="form-check-label" for="sizechek4">
                                            1-6 Colour Print
                                            </label>
                                        </div>
									  <div class="form-check">
										  @if($product['color_full']=='checked')
                                            <input class="form-check-input" name="color_full" type="checkbox" value="checked" id="sizechek5" checked>
                                          @else  
                                            <input class="form-check-input" name="color_full" type="checkbox" value="checked" id="sizechek5">

										  @endif
										  <label class="form-check-label" for="sizechek5">
                                            Full Colour Print
                                            </label>
                                        </div>
									 
									 
									 
                                        <div class="form-check">
											@if($product['working_days']=='checked')
										 <input class="form-check-input" name="working_days" type="checkbox" value="checked" checked id="sizechek7">
											 @else
                                         <input class="form-check-input" name="working_days" type="checkbox" value="checked" id="sizechek7">
                                            @endif
											<label class="form-check-label" for="sizechek7">
                                           7 working days
                                            </label>
                                        </div>
                                        <div class="form-check">
											@if($product['eco_friendly']=='checked')
							 <input class="form-check-input" name="eco_friendly" type="checkbox" value="checked" checked id="sizechek8">
											@else
                                    <input class="form-check-input" name="eco_friendly" type="checkbox" value="checked" id="sizechek8">
											@endif
                                            <label class="form-check-label" for="sizechek8">
                                           Eco friendly
                                            </label>
                                        </div>
                                        <div class="form-check">
												@if($product['best_seller']=='checked')
								 <input class="form-check-input" name="best_seller" type="checkbox" value="checked" checked id="sizechek9">
											@else
                                            <input class="form-check-input" name="best_seller" type="checkbox" value="checked" id="sizechek9">
                                            @endif
											<label class="form-check-label" for="sizechek9">
                                            Best Seller
                                            </label>
                                        </div>
                                        <div class="form-check">
												@if($product['made_in_the_uk']=='checked')
								<input class="form-check-input" name="made_in_the_uk" type="checkbox" value="checked" checked id="sizechek10"> 
											@else
                                    <input class="form-check-input" name="made_in_the_uk" type="checkbox" value="checked" id="sizechek10"> 													@endif
                                            <label class="form-check-label" for="sizechek10">
                                           Made in the UK
                                            </label>
                                        </div>
									 <div class="form-check">
									@if($product['biodegradable_plastic']=='checked')
				                <input class="form-check-input" name="biodegradable_plastic" type="checkbox" value="checked" checked id="sizechek11">
										 @else
                              <input class="form-check-input" name="biodegradable_plastic" type="checkbox" value="checked" id="sizechek11">
                                         @endif   
										 <label class="form-check-label" for="sizechek11">
                                           Biodegradable Plastic
                                            </label>
                                        </div>
									 <div class="form-check">
										 		@if($product['free_delivery']=='checked')
										   <input class="form-check-input" name="free_delivery" type="checkbox" value="checked" checked id="sizechek12">
										 @else
                                            <input class="form-check-input" name="free_delivery" type="checkbox" value="checked" id="sizechek12">
										 @endif
                                            <label class="form-check-label" for="sizechek12">
                                           Free Delivery
                                            </label>
                                        </div>
                                    </div>
							</div>
								
									
							<div class="card mb-3">
                                <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                    <h6 class="mb-0 fw-bold ">Colors</h6>
                                </div>
                                 <div class="card-body">
									  @php $i=1; @endphp									  
									 @php $j=0; @endphp

									 
									 @foreach($colors as $color)
									 @php 
									 $count=count($product['colors']);
									 
									if($i=$count){
									 $i=$count-1;
											}
									
									 @endphp
									  <div class="form-check">
									 @if($color->id=$product['colors'][$i]['id'] )
                                       
                                            <input class="form-check-input" name="colors[]" type="checkbox" value="{{$color->id}}" id="{{$j}}"  checked>
                                            <label class="form-check-label" for="{{$j}}">
                                            
												<input type="color" value="{{$color->name}}" id="{{$j}}" disabled>
 </label>
									 @else
									
                                            <input class="form-check-input" name="colors[]" type="checkbox" value="{{$color->id}}" id="{{$j}}" >
                                            <label class="form-check-label" for="{{$j}}">
                                          <input type="color" value="{{$color->name}}" id="{{$j}}" disabled>
                                            </label>
                                       
                                  	 @endif
												 </div>
									 @php $i++; @endphp									 
									 @php $j++; @endphp

                                     @endforeach  
                                     
                                    </div>
							</div>
								
								
							<div class="card mb-3">
                                <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                    <h6 class="mb-0 fw-bold ">Sizes</h6>
                                </div>
								@if($product['sizes']!=null)
                                 <div class="card-body">
									 
									 @foreach($sizes as $size)
									 
									 
                                        <div class="form-check">
                         <input class="form-check-input" name="sizes[]" type="checkbox" value="{{$size['id']}}" checked id="{{$size['id']}}">
                                            <label class="form-check-label" for="{{$size['id']}}">
                                            {{$size['title']}}
                                            </label>
                                        </div>
									 
								
									 @php $i++; @endphp
                                     @endforeach  
                                     
                                    </div>
								@else
								<p>No size assigned </p>
								@endif
							</div>
								
										 <div class="card mb-3">
                                <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                    <h6 class="mb-0 fw-bold ">Bag Print Type<span class="text text-danger">*</span></h6>
                                </div>
											 
											 <div class="card-body">
                                            <table class="table">
                                                <tbody id="tbody2">
                                                    <td>
                                                    <div class="form-check">
									@if($product['one_side']=='on')
                                            <input class="form-check-input" name="one_side" value="on" type="checkbox" name="couponsstatus" id="myCheck" onclick="myFunction()" checked>
									@else
														<input class="form-check-input" name="one_side" value="on" type="checkbox" name="couponsstatus" id="myCheck" onclick="myFunction()" >
									@endif
                                            <label class="form-check-label" for="myCheck">
                                                On one-side only
                                            </label>
                                        </div>
														@if($product['one_side']=='on')
														<input id="text" style=" width:100%; font-family:inherit; border:1px solid #aaa; padding:2px; border-radius:3px;" name="one_side_price" placeholder="Enter per piece price" value="{{$product['one_side_price']}}">
										@else
							<input id="text" style="display:none; width:100%; font-family:inherit; border:1px solid #aaa; padding:2px; border-radius:3px;" name="one_side_price" placeholder="Enter per piece price">
										@endif
                                                      </td>
                                                      <td>
                                                        <div class="form-check">
										@if($product['same_two_side']=='on')
                                            <input class="form-check-input" name="same_both_side" value="on" type="checkbox" name="couponsstatus" id="myCheck1" onclick="myFunction1()" checked>
										@else
															<input class="form-check-input" name="same_both_side" value="on" type="checkbox" name="couponsstatus" id="myCheck1" onclick="myFunction1()">
															@endif
                                            <label class="form-check-label" for="myCheck1">
                                              Print the same design on both sides
                                            </label>
                                        </div>
							@if($product['same_two_side']=='on')
						<input id="text1" style=" width:100%; font-family:inherit; border:1px solid #aaa; padding:2px; border-radius:3px;" name="same_both_side_price" placeholder="Enter per piece price" value="{{$product['same_two_side_price']}}">
														  @else
														  <input id="text1" style="display:none; width:100%; font-family:inherit; border:1px solid #aaa; padding:2px; border-radius:3px;" name="same_both_side_price" placeholder="Enter per piece price">
														  @endif

                                                      </td>
                                                      <td>
                                                         <div class="form-check">
															 	@if($product['diff_two_side']=='on')
                                            <input class="form-check-input" name="different_both_side" value="on" type="checkbox" name="couponsstatus" id="myCheck2" onclick="myFunction2()" checked>
															 @else
															  <input class="form-check-input" name="different_both_side" value="on" type="checkbox" name="couponsstatus" id="myCheck2" onclick="myFunction2()">
															 @endif
                                            <label class="form-check-label" for="myCheck2">
                                           Print different designs on each side
                                            </label>
                                        </div>
														  @if($product['diff_two_side']=='on')
						<input id="text2" style=" width:100%; font-family:inherit; border:1px solid #aaa; padding:2px; border-radius:3px;" name="diff_both_side_price" placeholder="Enter per piece price" value="{{$product['diff_two_side_price']}}">
 								@else
														  <input id="text2" style="display:none; width:100%; font-family:inherit; border:1px solid #aaa; padding:2px; border-radius:3px;" name="diff_both_side_price" placeholder="Enter per piece price">
														  @endif
                                                      </td>
                                                      
                                                      <td></td>
                                                </tbody>
                                              </table>
								</div>
											 
							</div>
							<div class="card mb-3">
                                <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                    <h6 class="mb-0 fw-bold ">Meta Data</h6>
                                </div>
								
                                 <div class="card-body">
									<div class="col-md-12">
									<label  class="form-label">Meta Title </label>
                                                <input type="text" name="meta_title" class="form-control" value="{{$product['meta_title']}}" >
									 </div>
									 <div class="col-md-12">
									<label  class="form-label">Meta Description </label>
                                                <input type="text" name="meta_desc" class="form-control" value="{{$product['meta_desc']}}" >
									 </div>
									 <br>
									 <br>
									  <div class="col-md-6 col-lg-6">
										 <label  class="form-label"> Send Quote <span class="text text-danger">*</span></label>
                                                <select class="form-select" id="send-quote-select" name="category_test" aria-label="size 3 select example" required>
                                        			 <option value="">Choose Option</option>
													@if($product['category_test']=='yes')
													 <option value="yes" selected>Yes</option>
													 <option value="no">No</option>
													@else
													<option value="yes" >Yes</option>
													 <option value="no" selected>No</option>
													@endif
                                    			</select>
                                    </div>
									 <br>
									 @if($product['category_test']=='yes')
									 <div class="col-md-12 col-lg-12 "  style="margin-top:30px; display:none;" id="custom-quote">
									 	<label  class="form-label">Custom Message</label>
										 <textarea class="form-control" style="margin-top:10px" name="custom_msg"></textarea>
									 </div>
									 @else
									  <div class="col-md-12 col-lg-12 "  style="margin-top:30px; " id="custom-quote">
									 	<label  class="form-label">Custom Message</label>
										 <textarea class="form-control" style="margin-top:10px" name="custom_msg">{{$product['custom_msg']}}</textarea>
									 </div>
									 @endif
							</div>
								</div>
							<div class="card mb-3">
                                
                                <div class="card-body">
                                    
                                        <div class="row g-3 align-items-center">
                                           
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary py-2 px-5 text-uppercase btn-set-task w-sm-100">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
							</div>
                        </div>
                    </div><!-- Row end  --> 
                    
                </div>
            </div>    
<script>
	
	const el = document.getElementById('send-quote-select');

const box = document.getElementById('custom-quote');

el.addEventListener('change', function handleChange(event) {
  if (event.target.value === 'no') {
    box.style.display = 'block';
  } else {
    box.style.display = 'none';
  }
});
	
		function myFunction() {
  var checkBox = document.getElementById("myCheck");
  var text = document.getElementById("text");

  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
}
	
		function myFunction1() {
  var checkBox = document.getElementById("myCheck1");
  var text = document.getElementById("text1");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
}
	
		function myFunction2() {
  var checkBox = document.getElementById("myCheck2");
  var text = document.getElementById("text2");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
}
	
function table_colour_function() {
  var table = document.getElementById("table_colour");
  var row = table.insertRow(1);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  var cell3 = row.insertCell(2);
  cell1.innerHTML = "<input type='text' id='color_name' name='color_name[]' class='form-control'>";
  cell2.innerHTML = "<input type='text' id='color_slug' name='color_slug[]' class='form-control'>";
  cell3.innerHTML = "<input type='file' id='images' name='images[]' class='form-control'>";
}
</script>
<script>
function table_size_function() {
  var table = document.getElementById("table_size");
  var row = table.insertRow(1);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  var cell3 = row.insertCell(2);
  var cell4 = row.insertCell(3);
  cell1.innerHTML = "<input type='text' id='size_name' name='size_name[]' class='form-control' >";
  cell2.innerHTML = "<input type='text' id='size_slug' name='size_slug[]' class='form-control'>";
  cell3.innerHTML = "<textarea class='form-control' name='description[]' id='description' style='width: 100%; height:100px'></textarea>";
  cell4.innerHTML = "<input type='file' id='size_image' name='size_image[]' class='form-control'>";
}
</script>

<script>
	function slugMaking() {
		
let text = document.getElementById("p_title").value; 
		
		var replaced = text.split(' ').join('-');
		var replaced=replaced.toLowerCase();
document.getElementById("p_slug").value = replaced;
		}
</script>
@endsection