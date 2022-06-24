@extends('layouts.app')

@section('title', $products['name'])

@section('metadata')
<meta name="title" content="{{$products['meta_title']}}">
<meta name="description" content="{{$products['meta_desc']}}">

@endsection
@section('content')
     <style>
[type=radio] {
    position: absolute;
    opacity: 0;
}
[type=radio]+img {
  cursor: pointer;
  margin-right: 0.5rem;
}
[type=radio]:checked + img {
  outline: 5px solid #425E7A;
	padding: 2px;
}
[type=radio]:checked + input {
  outline: 5px solid #425E7A;
	border-radius:0 !important;
}
</style>   
        <main class="main">
            <div class="container mb-30">
                <div class="row">
                    <div class="col-xl-10 col-lg-12 m-auto">
			@if(Session::has('message'))
    <div class="alert alert-success" role="alert">
        {{session('message')}}
    </div>
@endif
                        <div class="product-detail accordion-detail">
                            <div class="row mb-50 mt-30">
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                                    <div class="detail-gallery">
                                        <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                        <!-- MAIN SLIDES -->
                                        <div class="product-image-slider border-1 border-dark rounded">
											
                                            <figure class="border-radius-10">
                                            <img src="https://www.devpaper.webdevholdsite.co.uk{{$products['featured_image']}}" alt="product image" />	
                                        </figure>
										
                                            <figure class="border-radius-10">
							<div> <img src="https://www.devpaper.webdevholdsite.co.uk{{$products['image1']}}" alt="product image" /></div>
												
                                        </figure>
										
											 <figure class="border-radius-10">
							<div> <img src="https://www.devpaper.webdevholdsite.co.uk{{$products['image2']}}" alt="product image" /></div>
												
                                        </figure>
											 <figure class="border-radius-10">
							<div> <img src="https://www.devpaper.webdevholdsite.co.uk{{$products['image3']}}" alt="product image" /></div>
												
                                        </figure>
											 <figure class="border-radius-10">
							<div> <img src="https://www.devpaper.webdevholdsite.co.uk{{$products['image4']}}" alt="product image" /></div>
												
                                        </figure>
                                        </div>
                                        <!-- THUMBNAILS -->
                                        <div class="slider-nav-thumbnails">
						<div> <img src="https://www.devpaper.webdevholdsite.co.uk{{$products['featured_image']}}" alt="product image" /></div>
                               <div> <img src="https://www.devpaper.webdevholdsite.co.uk{{$products['image1']}}" alt="product image" /></div>
							<div> <img src="https://www.devpaper.webdevholdsite.co.uk{{$products['image2']}}" alt="product image" /></div>
							 <div> <img src="https://www.devpaper.webdevholdsite.co.uk{{$products['image3']}}" alt="product image" /></div>
 							<div> <img src="https://www.devpaper.webdevholdsite.co.uk{{$products['image4']}}" alt="product image" /></div>
                                

										</div>
                                    </div>
                                    <!-- End Gallery -->
									<!-- Description -->
										
<div class="wrapper">
  <div class="wrap-1">
    <input type="radio" id="tab-1" name="tabs">
    <label for="tab-1"><div>{{$products['p_desc_title']}}</div><div class="cross"></div></label>
    <div class="content">{{$products['desc']}}</div>
  </div>

  <div class="wrap-2">
    <input type="radio" id="tab-2" name="tabs">
    <label for="tab-2"><div>{{$products['p_del_title']}}</div><div class="cross"></div></label>
    <div class="content">{{$products['p_del_title']}}</div>
  </div>
	
	<div class="wrap-3">
    <input type="radio" id="tab-3" name="tabs">
    <label for="tab-3"><div>{{$products['p_art_title']}}</div><div class="cross"></div></label>
    <div class="content">{{$products['p_art_desc']}}</div>
  </div>
</div>
									
									
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-info pr-30 pl-30">
                                        <h3 class="title-detail">{{$products['name']}}</h3>
										<div class="short-desc_udpate mt-30 mb-30 d-flex align-content-start justify-content-start flex-xl-row flex-sm-column">
                                            <ul class="prod-features_update mr-30">
												@if($products['color'] != "")
													 <li class="mb-5 d-flex align-items-center justify-content-start px-3 py-2 rounded text-light" style="background: #425E7A"><img src="{{asset('public/assets/imgs/products/product-icon-1.svg')}}" /><span class="pl-10">1 Colour Print</span></span></li>
										@elseif($products['color3'] != "")
												 <li class="mb-5 d-flex align-items-center justify-content-start px-3 py-2 rounded text-light" style="background: #425E7A"><img src="{{asset('public/assets/imgs/products/product-icon-1.svg')}}" /><span class="pl-10">1-3 Colour Print</span></span></li>
																		@elseif($products['color4'] != "")
												 <li class="mb-5 d-flex align-items-center justify-content-start px-3 py-2 rounded text-light" style="background: #425E7A"><img src="{{asset('public/assets/imgs/products/product-icon-1.svg')}}" /><span class="pl-10">1-4 Colour Print</span></span></li>
																@elseif($products['color6'] != "")
												 <li class="mb-5 d-flex align-items-center justify-content-start px-3 py-2 rounded text-light" style="background: #425E7A"><img src="{{asset('public/assets/imgs/products/product-icon-1.svg')}}" /><span class="pl-10">1-6 Colour Print</span></span></li>
					@elseif($products['color_full'] != "")
												 <li class="mb-5 d-flex align-items-center justify-content-start px-3 py-2 rounded text-light" style="background: #425E7A"><img src="{{asset('public/assets/imgs/products/product-icon-1.svg')}}" /><span class="pl-10">Full Colour Print</span></span></li>
												@endif
												@if($products['working_days'] != "")
													 <li class="mb-5 d-flex align-items-center justify-content-start px-3 py-2 rounded text-light" style="background: #425E7A"><img src="{{asset('public/assets/imgs/products/product-icon-2.svg')}}" /><span class="pl-10">7 working days</span></li>
												@endif
												@if($products['eco_friendly'] != "")
													 <li class="mb-5 d-flex align-items-center justify-content-start px-3 py-2 rounded text-light" style="background: #425E7A"><img src="{{asset('public/assets/imgs/products/product-icon-3.svg')}}" /><span class="pl-10">Eco friendly</span></li>
												@endif
												@if($products['best_seller'] != "")
													<li class="d-flex align-items-center justify-content-start px-3 py-2 rounded text-light" style="background: #425E7A"><img src="{{asset('public/assets/imgs/products/product-icon-4.svg')}}" /><span class="pl-10">Best Seller</span></li>
												@endif
                                               
                                               
                                               
												
                                            </ul>
                                            <ul class="prod-features_update">
												@if($products['made_in_the_uk'] != "")
													 <li class="mb-5 d-flex align-items-center justify-content-start px-3 py-2 rounded text-light" style="background: #425E7A"><img src="{{asset('public/assets/imgs/products/product-icon-5.svg')}}" /><span class="pl-10">Made in the UK</span></li>
												@endif
												@if($products['biodegradable_plastic'] != "")
													 <li class="mb-5 d-flex align-items-center justify-content-start px-3 py-2 rounded text-light" style="background: #425E7A"><img src="{{asset('public/assets/imgs/products/product-icon-6.svg')}}" /><span class="pl-10">Biodegradable Plastic</span></li>
												@endif
												@if($products['free_delivery'] != "")
													<li class="mb-5 d-flex align-items-center justify-content-start px-3 py-2 rounded text-light" style="background: #425E7A"><img src="{{asset('public/assets/imgs/products/product-icon-7.svg')}}" /><span class="pl-10">Free Delivery</span></li>
												@endif
                                               
                                               
                                                
                                            </ul>
                                        </div>
										<div style="clear: both"></div>
								
								<div class="quick-quote" id="quote">
								<img src="{{asset('public/assets/imgs/quote.svg')}}" />
								</div>
                                       
										<div class="short-desc mt-30 mb-30">
											<p id="quote-error-message" class="quote-error-message d-none">Please select all the options</p>
                                            <h5>Get a Quote</h5>
                                        </div>
										<!-- Accordion Settings -->
								<form action="{{route('insert-qout')}}" method="post" id="quote-form-validate">
									@csrf
									<input type="hidden" name="product_id" value="{{$products['id']}}">
   <div class="accordion" id="accordionExample">
    <div class="accordion-item" id="scrollTo">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          1. Enter Quantity
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          <div class="prod-quantity mt-30 mb-30 pl-20">
											<p>How would you like to print your design?</p>
											<ul class="list-filter size-filter font-small mt-20 quantity-filter filter-container">
												<li>
													<input type="radio" id="a1000" name="quantity" />
    												<label for="a1000">1000</label>
												</li>
												<li>
													<input type="radio" id="a2000" name="quantity" />
    												<label for="a2000">3000</label>
												</li>
												<li>
													<input type="radio" id="a3000" name="quantity" />
    												<label for="a3000">5000</label>
												</li>
												<li>
													<input type="radio" id="a40000" name="quantity" />
    												<label for="a40000">10000</label>
												</li>
                                            </ul>
											<p class="mt-20">or</p>
											<input class="mt-20" style="width:200px; height: 50px; border-radius:0px" type="text" placeholder="Enter Your Qunatity" />
										</div>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          2. Choose a Bag Size
        </button>
      </h2>
      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
        <div class="accordion-body">
			
<div class="modal-container">
  <details>
    <summary>
     <p class="popup-btn">&#8505; Size Guide Explained</p>
		<div class="details-modal-overlay"></div>
    </summary>
    <div class="details-modal bag-size-modal">
      <div class="details-modal-close">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M13.7071 1.70711C14.0976 1.31658 14.0976 0.683417 13.7071 0.292893C13.3166 -0.0976311 12.6834 -0.0976311 12.2929 0.292893L7 5.58579L1.70711 0.292893C1.31658 -0.0976311 0.683417 -0.0976311 0.292893 0.292893C-0.0976311 0.683417 -0.0976311 1.31658 0.292893 1.70711L5.58579 7L0.292893 12.2929C-0.0976311 12.6834 -0.0976311 13.3166 0.292893 13.7071C0.683417 14.0976 1.31658 14.0976 1.70711 13.7071L7 8.41421L12.2929 13.7071C12.6834 14.0976 13.3166 14.0976 13.7071 13.7071C14.0976 13.3166 14.0976 12.6834 13.7071 12.2929L8.41421 7L13.7071 1.70711Z" fill="black" />
        </svg>
      </div>
      <div class="details-modal-title">
        <h1>Bag Size Guide</h1>
      </div>
      <div class="details-modal-content bag-size-modal-container">
		  <div class="bag-size-modal-text">
		  <p>
         From large to small, we will create the perfect carrier bags to suit your needs. All of our plastic, plastic-free and paper bags are available in a wide range of sizes.
        </p>
			   <p>
         We have provided large bags for homeware stores selling large household goods, toy stores and heavy duty carrier bags for automotive stores. At the opposite end of the scale we have made small bags which have been used for jewellers, goody bags at parties and small vaping products.
        </p>
			    <p>
         Using our online quotation tool, you will see a number of the 'standard sizes' listed. However all of our bags are bespoke so they can be made to your exact specification, in any size required.
        </p>
			      <p>
    Each carrier bags is measured using width, length and bottom gusset and we have provided a couple of examples below to demonstrate this in our size guides.
        </p>
		  </div>
		  <div class="bag-sizes-control">
			   <img src="{{asset('public/assets/imgs/products/bag-size-img.png')}}" />
		  <div class="sizes-guide">
			  <p>A= Height</p>
			  <p>B= Width</p>
			  <p>C= Bottom Gusset</p>
			  <p>220x170x30</p>
		  </div>
		  </div>
      </div>
    </div>
  </details>
</div>
			
			
			<div class="bag-sizes-container">
			
				@php
				$sizes=$products['sizes'];
				@endphp
				@foreach($sizes as $size)
				<div class="bag-sizes">
					<label for="">
						<input type="radio" name="size" value="{{$size['title']}}"  style="cursor:pointer" >
						<img style="padding:2px" src="{{asset('public/assets/imgs/products/bag-size.png')}}"/>
						<div class="sizes-container">
						<p class="size" style="font-weight:bold">{{$size['title']}}</p>
						<p class="size">{!!$size['desciption'] !!}</p>
						</div>
					</label>
			</div>
				@endforeach
				
			</div>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          3. Choose a Bag Colour
        </button>
      </h2>
      <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          	<div class="bag-color mt-30 mb-30 pl-20">
											<div class="row">
												@foreach($products['colors'] as $color)
											<div class="col-lg-2 col-md-2 col-sm-12 mt-20 w-25">
												<label for="" style="width:100%">
                                                    <input type="radio" name="color" value="{{$color['id']}}"  style="cursor:pointer;width:5rem" >
												  			<input type="color" value="{{$color['name']}}" disabled style="width:5rem;padding-left:0">
                                                </label>
											</div>
												@endforeach
											</div>
										</div>
        </div>
      </div>
    </div>
	<div class="accordion-item">
      <h2 class="accordion-header" id="headingFour">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
          4. Choose a Print Colour
        </button>
      </h2>
      <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          	<div class="print-color mt-30 mb-30 pl-20">
											<div class="row">
												@if($products['one_side']=='on')
											<div class="col-lg-4 col-md-4 col-sm-12 mt-20">
                                                <label for="">
                                                    <input type="radio" class="radio-design" name="design" value="1"  style="cursor:pointer; height:120px" >
                                                    <img src="{{ asset('/public/assets/imgs/products/print-1.png')}}" />
												    <p style="text-align: center">On one-side only</p>
                                                </label>
												
											</div>
												@endif
												@if($products['same_two_side']=='on')
											<div class="col-lg-4 col-md-4 col-sm-12 mt-20">
                                                <label for="">
                                                    <input type="radio" name="design" value="2"  style="cursor:pointer; height:120px">
												    <img src="{{ asset('/public/assets/imgs/products/print-2.png')}}" />
												    <p style="text-align: center">print the same design on both sides</p>
                                                </label>
											</div>
												@endif
											{{--	@if($products['diff_two_side']=='on')
											<div class="col-lg-4 col-md-4 col-sm-12 mt-20">
                                                <label for="">
                                                    <input type="radio" name="design" value="3"  style="cursor:pointer; height:120px">
                                                    <img src="{{ asset('/public/assets/imgs/products/print-3.png')}}" />
												    <p style="text-align: center">print different designs on each side</p>
                                                </label>
												
											</div>
												@endif --}}
											<div class="col-lg-12 col-md-12 col-sm-12 mt-20" style="color:#000">
												<p style="color:#000">Front of bag</p>
												<div class="d-flex align-items-center justify-content-start">
													<select class="mt-10 mb-10" style="color:#000">
													<option value="">No of Colours</option>
													<option value="Unprinted">Unprinted</option>
													<option value="46">1 Spot Colour</option>
													<option value="47">2 Spot Colours</option>
													<option value="48">3 Spot Colours</option>
													<option value="49">4 Spot Colours</option>
													<option value="50">5 Spot Colours</option>
													<option value="51">6 Spot Colours</option>
													<option value="52">Full Colour </option>
												</select>
								<div class="modal-container">
  <details>
    <summary>
     <p class="popup-btn">&#8505; Colors Explained</p>
		<div class="details-modal-overlay"></div>
    </summary>
    <div class="details-modal colors-modal">
      <div class="details-modal-close">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M13.7071 1.70711C14.0976 1.31658 14.0976 0.683417 13.7071 0.292893C13.3166 -0.0976311 12.6834 -0.0976311 12.2929 0.292893L7 5.58579L1.70711 0.292893C1.31658 -0.0976311 0.683417 -0.0976311 0.292893 0.292893C-0.0976311 0.683417 -0.0976311 1.31658 0.292893 1.70711L5.58579 7L0.292893 12.2929C-0.0976311 12.6834 -0.0976311 13.3166 0.292893 13.7071C0.683417 14.0976 1.31658 14.0976 1.70711 13.7071L7 8.41421L12.2929 13.7071C12.6834 14.0976 13.3166 14.0976 13.7071 13.7071C14.0976 13.3166 14.0976 12.6834 13.7071 12.2929L8.41421 7L13.7071 1.70711Z" fill="black" />
        </svg>
      </div>
      <div class="details-modal-title">
        <h1>Print Colors Explained</h1>
      </div>
      <div class="details-modal-content">
        <p>
         We can produce your bags in a wide range of colours and the majority of bag designs are achievable by printing flexographic solid ink colours and we can print up to 6 individual colours.
        </p>
		   <p>
        We also offer full colour print work using CMYK print which is available when ordering larger quantities of bags.
        </p>
		   <p>
        Our knowledgeable team can also help with your artwork and we produce proofs for your approval before the bags are produced.
        </p>
		  <div class="colors-explained-guide">
		    <div>
			  <h5 class="colors-heading">Solid Colour Print</h5>
		   <p>
     Often referred to as solid or spot colour print, colour is created by mixing inks to a given shade without screens or dots using the Pantone Matching System® and is the best option for an accurate, clean print on plastic carrier bags.
        </p>
		   <p>
      Formed from a palette of 14 basic colours, each of the spot colours in the Pantone Matching System is mixed according to its own unique ink mixing formula developed by Pantone.
        </p>
		  </div>
			    <div>
			  <h5 class="colors-heading">Process Colour Print / CMYK</h5>
		   <p>
  Process colours are normally used where continuous tones such as gradient and photographs are required.
        </p>
		   <p>
    The method of achieving colour using this type of print uses the primary colours Cyan [C], Magenta [M], Yellow [Y] which are mixed with Black [K] to produce the full range of colours.
        </p>
		  </div>
		  </div>
      </div>
    </div>
  </details>
</div>
												</div>
												
												<p style="color:#000">Back of bag</p>
												<div class="d-flex align-items-center justify-content-start">
												<select class="mt-10 mb-10" style="color:#000">
													<option value="">No of Colours</option>
													<option value="Unprinted">Unprinted</option>
													<option value="46">1 Spot Colour</option>
													<option value="47">2 Spot Colours</option>
													<option value="48">3 Spot Colours</option>
													<option value="49">4 Spot Colours</option>
													<option value="50">5 Spot Colours</option>
													<option value="51">6 Spot Colours</option>
													<option value="52">Full Colour </option>			
												</select>
														<div class="modal-container">
  <details>
    <summary>
     <p class="popup-btn">&#8505; Colors Explained</p>
		<div class="details-modal-overlay"></div>
    </summary>
    <div class="details-modal colors-modal">
      <div class="details-modal-close">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M13.7071 1.70711C14.0976 1.31658 14.0976 0.683417 13.7071 0.292893C13.3166 -0.0976311 12.6834 -0.0976311 12.2929 0.292893L7 5.58579L1.70711 0.292893C1.31658 -0.0976311 0.683417 -0.0976311 0.292893 0.292893C-0.0976311 0.683417 -0.0976311 1.31658 0.292893 1.70711L5.58579 7L0.292893 12.2929C-0.0976311 12.6834 -0.0976311 13.3166 0.292893 13.7071C0.683417 14.0976 1.31658 14.0976 1.70711 13.7071L7 8.41421L12.2929 13.7071C12.6834 14.0976 13.3166 14.0976 13.7071 13.7071C14.0976 13.3166 14.0976 12.6834 13.7071 12.2929L8.41421 7L13.7071 1.70711Z" fill="black" />
        </svg>
      </div>
      <div class="details-modal-title">
        <h1>Print Colors Explained</h1>
      </div>
      <div class="details-modal-content">
        <p>
         We can produce your bags in a wide range of colours and the majority of bag designs are achievable by printing flexographic solid ink colours and we can print up to 6 individual colours.
        </p>
		   <p>
        We also offer full colour print work using CMYK print which is available when ordering larger quantities of bags.
        </p>
		   <p>
        Our knowledgeable team can also help with your artwork and we produce proofs for your approval before the bags are produced.
        </p>
		  <div class="colors-explained-guide">
		    <div>
			  <h5 class="colors-heading">Solid Colour Print</h5>
		   <p>
     Often referred to as solid or spot colour print, colour is created by mixing inks to a given shade without screens or dots using the Pantone Matching System® and is the best option for an accurate, clean print on plastic carrier bags.
        </p>
		   <p>
      Formed from a palette of 14 basic colours, each of the spot colours in the Pantone Matching System is mixed according to its own unique ink mixing formula developed by Pantone.
        </p>
		  </div>
			    <div>
			  <h5 class="colors-heading">Process Colour Print / CMYK</h5>
		   <p>
  Process colours are normally used where continuous tones such as gradient and photographs are required.
        </p>
		   <p>
    The method of achieving colour using this type of print uses the primary colours Cyan [C], Magenta [M], Yellow [Y] which are mixed with Black [K] to produce the full range of colours.
        </p>
		  </div>
		  </div>
      </div>
    </div>
  </details>
</div>
												</div>
												<div class="d-flex align-items-center justify-content-start popup-container">
												<p style="color:#000">Do you have any artwork? (optional)</p>
														<div class="modal-container">
  <details>
    <summary>
     <p class="popup-btn">&#8505; Artwork Guideline</p>
		<div class="details-modal-overlay"></div>
    </summary>
    <div class="details-modal">
      <div class="details-modal-close">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M13.7071 1.70711C14.0976 1.31658 14.0976 0.683417 13.7071 0.292893C13.3166 -0.0976311 12.6834 -0.0976311 12.2929 0.292893L7 5.58579L1.70711 0.292893C1.31658 -0.0976311 0.683417 -0.0976311 0.292893 0.292893C-0.0976311 0.683417 -0.0976311 1.31658 0.292893 1.70711L5.58579 7L0.292893 12.2929C-0.0976311 12.6834 -0.0976311 13.3166 0.292893 13.7071C0.683417 14.0976 1.31658 14.0976 1.70711 13.7071L7 8.41421L12.2929 13.7071C12.6834 14.0976 13.3166 14.0976 13.7071 13.7071C14.0976 13.3166 14.0976 12.6834 13.7071 12.2929L8.41421 7L13.7071 1.70711Z" fill="black" />
        </svg>
      </div>
      <div class="details-modal-title">
        <h1>Artwork Guidelines</h1>
      </div>
      <div class="details-modal-content">
        <p>
       We accept artwork in many formats, but the easiest for us to use successfully is Adobe Illustrator and most vector format EPS, PDF and PSD artworks too.
        </p>
		   <p>
      Please ensure you convert all fonts to outlines or supply the TTF font file to be used. We can resend a PDF back via email for final approval of artwork before we proceed to print. Artwork files should be high quality minimum 300dpi.
        </p>
      </div>
    </div>
  </details>
</div>
												</div>
											</div>
											<div class="col-lg-6 col-md-6 col-sm-12 mt-20 print-color-buttons">
												<label style="color:#000"> Upload Artwork 1
   												 	<input type="file" name="artwork-1" >
    											</label> 
											</div>
											<div class="col-lg-6 col-md-6 col-sm-12 mt-20 print-color-buttons">
												<label style="color:#000"> Upload Artwork 2
   												 	<input type="file" name="artwork-2" >
    											</label>
											</div>
											</div>
										</div>
        </div>
      </div>
    </div>
  </div>
								
										<!-- End Accordion Settings -->
										
										
                                       	
										
										
										
										
										<div class="prod-requirements mt-30 mb-30">
                                            <a href="javascript:void(0)" id="generate-quote"><h5 style="background:#FDC040">Generate Quote</h5></a>
                                        </div>
										<div class="get-quote mt-30 mb-30 pl-20 d-none" id="get-quote">
											<p style="text-align: center">Thank you. Your *instant* no-obligation quotation is ready to email. Please confirm your contact details to receive it.</p>
										</div>
										<div class="prod-requirements mt-30 mb-30 d-none" id="contact-details">
                                            <h5 style="text-align: center; color: #fff;">Your Contact Details</h5>
                                        </div>
										<div class="contact-details mt-30 mb-30 pl-20 d-none" id="contact-form">
											<div class="row">
												<div class="col-lg-6 col-md-6 col-sm-12 mt-20">
													<input type="text" name="full_name" placeholder="Full Name" required />
												</div>
												<div class="col-lg-6 col-md-6 col-sm-12 mt-20">
													<input type="text" name="phone" placeholder="Phone / Cell"  required/>
												</div>
												<div class="col-lg-6 col-md-6 col-sm-12 mt-20">
													<input type="email" name="email" placeholder="Email" required />
												</div>
												<div class="col-lg-6 col-md-6 col-sm-12 mt-20">
													<input type="text" name="post_code" placeholder="Post Code" required />
												</div>
												<div class="col-lg-12 col-md-12 col-sm-12 mt-20">
													<textarea name="message" placeholder="Message"></textarea>
												</div>
												<div class="col-lg-12 col-md-12 col-sm-12 mt-20">
													<button>Confirm and Submit</button>
												</div>
											</div>
										</div>
                                    </div>
								<form>
                                    <!-- Detail Info -->
                                </div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
		<script>
			jQuery(document).ready(function(){
				jQuery('#generate-quote').click(function(){
					var quantity = jQuery("input[name='quantity']:checked");
					var size = jQuery("input[name='size']:checked");
					var color = jQuery("input[name='color']:checked");
					var design = jQuery("input[name='design']:checked");
					if(quantity.length>0 && size.length>0 && color.length>0 && design.length>0){
						jQuery('#get-quote').removeClass('d-none');
   						jQuery('#contact-details').removeClass('d-none');
    					jQuery('#contact-form').removeClass('d-none');
					}
					else{
						jQuery('#quote-error-message').removeClass('d-none');
						$([document.documentElement, document.body]).animate({
       					 scrollTop: $("#quote").offset().top
  						  	}, 0);
					}
				});
			});
		</script>
	<script>
const selector = '.bag-sizes';

$(selector).on('click', function(){
    $(selector).removeClass('.bag-sizes-active');
    $(this).addClass('.bag-sizes-active');
});
		
		$("#quote").click(function() {
    $([document.documentElement, document.body]).animate({
        scrollTop: $("#scrollTo").offset().top
    }, 0);
});
	</script>

       @endsection








