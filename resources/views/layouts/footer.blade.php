<footer class="main">
          
            <section class="section-padding footer-mid section-side-p">
                <div class="container pt-15 pb-20">
                    <div class="row">
<!--
                        <div class="col">
                            <div class="widget-about font-md mb-md-3 mb-lg-3 mb-xl-0 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                                <div class="logo mb-30">
                                    <a href="index" class="mb-15"><img src="{{asset('assets/imgs/theme/logo.svg')}}" alt="logo" /></a>
                                    <p class="font-lg text-heading">Awesome grocery store website template</p>
                                </div>
                                <ul class="contact-infor">
                                    <li><img src="{{asset('assets/imgs/theme/icons/icon-location.svg')}}" alt="" /><strong>Address: </strong> <span>5171 W Campbell Ave undefined Kent, Utah 53127 United States</span></li>
                                    <li><img src="{{asset('assets/imgs/theme/icons/icon-contact.svg')}}" alt="" /><strong>Call Us:</strong><span>(+91) - 540-025-124553</span></li>
                                    <li><img src="{{asset('assets/imgs/theme/icons/icon-email-2.svg')}}" alt="" /><strong>Email:</strong><span>sale@Nest.com</span></li>
                                    <li><img src="{{asset('assets/imgs/theme/icons/icon-clock.svg')}}" alt="" /><strong>Hours:</strong><span>10:00 - 18:00, Mon - Sat</span></li>
                                </ul>
                            </div>
                        </div>
-->
                        <div class="footer-link-widget col">
                        <h4 class="widget-title">Popular Categories</h4>
                        <ul class="footer-list mb-sm-5 mb-md-0">
							@php
							 $headers = [
            'Authorization' => 'Bearer '.session()->get('token'),
                ];
            $data=[
                
            ];
            // return $data['images'][0];
        
        $client =  new \GuzzleHttp\Client();
        $response = $client->request('get', 'https://www.devpaper.webdevholdsite.co.uk/public/paper_api/api/v1/product-categories',[
                'form_params'   => $data,
                'headers'       => $headers,
                ]);
        $categories=json_decode($response->getBody(),true);
        $categories=$categories['productcategories'];
							@endphp
							@foreach($categories as $category)
								@if($category['category']=='none')
                                <li class="menu-item-has-children">
                                    <a href="{{URL('/category/'.$category['slug'])}}">{{ $category['name']}}</a>
									@endif
							@endforeach
                        </ul>
                    </div>
                    <div class="footer-link-widget col">
                        <h4 class="widget-title">Quick Links</h4>
                        <ul class="footer-list mb-sm-5 mb-md-0">
							<li><a href="{{route('/')}}">Home</a></li>
							<li><a href="{{route('contact-us')}}">Contact Us</a></li>
                            @php $pages=App\Models\Pages::get();
							@endphp 
							@foreach($pages as $page) 
                            <li><a href="{{route('page',$page->slug)}}">{{$page->title}}</a></li>
							 @endforeach
                        </ul>
                    </div>
                    <div class="footer-link-widget col">
                        <h4 class="widget-title">Contact Us</h4>
                        <ul class="footer-list mb-sm-5 mb-md-0">
                            <li>0208 252 8471</li>
                            <li>info@printedcarrierbags.co.uk</li>
                            <li><a href="#"></a></li>
                            
                        </ul>
                    </div>
                    <div class="footer-link-widget col">
                        <h4 class="widget-title">Find Us</h4>
                        <ul class="footer-list mb-sm-5 mb-md-0">
                            <li>Unit 208, Pillbox Studios</li>
                            <li>115 Coventry Road</li>
                            <li>London</li>
                            <li>E2 6GG</li>
                           
                        </ul>
                    </div>
<!--
                    <div class="footer-link-widget widget-install-app col wow animate__animated animate__fadeInUp" data-wow-delay=".5s">
                        <h4 class="widget-title">Install App</h4>
                        <p class="">From App Store or Google Play</p>
                        <div class="download-app">
                            <a href="#" class="hover-up mb-sm-2 mb-lg-0"><img class="active" src="{{asset('assets/imgs/theme/app-store.jpg')}}" alt="" /></a>
                            <a href="#" class="hover-up mb-sm-2"><img src="{{asset('assets/imgs/theme/google-play.jpg')}}" alt="" /></a>
                        </div>
                        <p class="mb-20">Secured Payment Gateways</p>
                        <img class="" src="{{asset('assets/imgs/theme/payment-method.png')}}" alt="" />
                    </div>
-->					
					<div class="col-xl-12 col-lg-12 col-md-12">
                        <p style="color:#ffffff; margin-top:20px"  class="font-sm mb-0">&copy; Printed Carrier Bags. All Rights Reserved.</p>
                    </div>
                </div>
            </section>
           
        </footer>