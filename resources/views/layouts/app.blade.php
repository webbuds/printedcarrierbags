<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
         <title>@yield('title')</title>
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
      @yield('metadata')
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta property="og:title" content="" />
        <meta property="og:type" content="" />
        <meta property="og:url" content="" />
        <meta property="og:image" content="" />
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('/public/assets/imgs/favicon.jpeg')}}" />

        <!-- Template CSS -->
        <link rel="stylesheet" href="{{asset('/public/assets/css/plugins/animate.min.css')}}" />
        <link rel="stylesheet" href="{{asset('/public/assets/css/main.css')}}?v=3.2" />
		<link rel="stylesheet" href="{{asset('/public/assets/css/style.css')}}?v=3.2" />
		
		
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style type="text/css">
        .panel-title {
        display: inline;
        font-weight: bold;
        }
        .display-table {
            display: table;
        }
        .display-tr {
            display: table-row;
        }
        .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 61%;
        }
    </style>
    </head>

    <body>
        <!-- Modal -->
<!--
        <div class="modal fade custom-modal" id="onloadModal" tabindex="-1" aria-labelledby="onloadModalLabel" aria-hidden="true" style="display:none">
            <div class="modal-dialog">
                <div class="modal-content" style="display:none">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-body" >
                        <div class="deal" style="background-image: url('/public/assets/imgs/banner/popup-1.png')">
                            <div class="deal-top">
                                <h6 class="mb-10 text-brand-2">Deal of the Day</h6>
                            </div>
                            <div class="deal-content detail-info">
                                <h4 class="product-title"><a href="shop-product-right" class="text-heading">Organic fruit for your family's health</a></h4>
                                <div class="clearfix product-price-cover">
                                    <div class="product-price primary-color float-left">
                                        <span class="current-price text-brand">$38</span>
                                        <span>
                                            <span class="save-price font-md color3 ml-15">26% Off</span>
                                            <span class="old-price font-md ml-15">$52</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="deal-bottom">
                                <p class="mb-20">Hurry Up! Offer End In:</p>
                                <div class="deals-countdown pl-5" data-countdown="2025/03/25 00:00:00">
                                    <span class="countdown-section"><span class="countdown-amount hover-up">03</span><span class="countdown-period"> days </span></span><span class="countdown-section"><span class="countdown-amount hover-up">02</span><span class="countdown-period"> hours </span></span><span class="countdown-section"><span class="countdown-amount hover-up">43</span><span class="countdown-period"> mins </span></span><span class="countdown-section"><span class="countdown-amount hover-up">29</span><span class="countdown-period"> sec </span></span>
                                </div>
                                <div class="product-detail-rating">
                                    <div class="product-rate-cover text-end">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (32 rates)</span>
                                    </div>
                                </div>
                                <a href="shop-grid-right" class="btn hover-up">Shop Now <i class="fi-rs-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
-->

        <!-- Quick view -->
        <div class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                                <div class="detail-gallery">
                                    <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                    <!-- MAIN SLIDES -->
                                    <div class="product-image-slider">
                                        <figure class="border-radius-10">
                                            <img src="{{asset('/public/assets/imgs/shop/product-16-2.jpg')}}" alt="product image" />
                                        </figure>
                                        <figure class="border-radius-10">
                                            <img src="{{asset('/public/assets/imgs/shop/product-16-1.jpg')}}" alt="product image" />
                                        </figure>
                                        <figure class="border-radius-10">
                                            <img src="{{asset('/public/assets/imgs/shop/product-16-3.jpg')}}" alt="product image" />
                                        </figure>
                                        <figure class="border-radius-10">
                                            <img src="{{asset('/public/assets/imgs/shop/product-16-4.jpg')}}" alt="product image" />
                                        </figure>
                                        <figure class="border-radius-10">
                                            <img src="{{asset('/public/assets/imgs/shop/product-16-5.jpg')}}" alt="product image" />
                                        </figure>
                                        <figure class="border-radius-10">
                                            <img src="{{asset('/public/assets/imgs/shop/product-16-6.jpg')}}" alt="product image" />
                                        </figure>
                                        <figure class="border-radius-10">
                                            <img src="{{asset('/public/assets/imgs/shop/product-16-7.jpg')}}" alt="product image" />
                                        </figure>
                                    </div>
                                    <!-- THUMBNAILS -->
                                    <div class="slider-nav-thumbnails">
                                        <div><img src="{{asset('/public/assets/imgs/shop/thumbnail-3.jpg')}}" alt="product image" /></div>
                                        <div><img src="{{asset('/public/assets/imgs/shop/thumbnail-4.jpg')}}" alt="product image" /></div>
                                        <div><img src="{{asset('/public/assets/imgs/shop/thumbnail-5.jpg')}}" alt="product image" /></div>
                                        <div><img src="{{asset('/public/assets/imgs/shop/thumbnail-6.jpg')}}" alt="product image" /></div>
                                        <div><img src="{{asset('/public/assets/imgs/shop/thumbnail-7.jpg')}}" alt="product image" /></div>
                                        <div><img src="{{asset('/public/assets/imgs/shop/thumbnail-8.jpg')}}" alt="product image" /></div>
                                        <div><img src="{{asset('/public/assets/imgs/shop/thumbnail-9.jpg')}}" alt="product image" /></div>
                                    </div>
                                </div>
                                <!-- End Gallery -->
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="detail-info pr-30 pl-30">
                                    <span class="stock-status out-stock"> Sale Off </span>
                                    <h3 class="title-detail"><a href="shop-product-right" class="text-heading">Seeds of Change Organic Quinoa, Brown</a></h3>
                                    <div class="product-detail-rating">
                                        <div class="product-rate-cover text-end">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                        </div>
                                    </div>
                                    <div class="clearfix product-price-cover">
                                        <div class="product-price primary-color float-left">
                                            <span class="current-price text-brand">$38</span>
                                            <span>
                                                <span class="save-price font-md color3 ml-15">26% Off</span>
                                                <span class="old-price font-md ml-15">$52</span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="detail-extralink mb-30">
                                        <div class="detail-qty border radius">
                                            <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                            <span class="qty-val">1</span>
                                            <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                        </div>
                                        <div class="product-extra-link2">
                                            <button type="submit" class="button button-add-to-cart"><i class="fi-rs-shopping-cart"></i>Add to cart</button>
                                        </div>
                                    </div>
                                    <div class="font-xs">
                                        <ul>
                                            <li class="mb-5">Vendor: <span class="text-brand">Nest</span></li>
                                            <li class="mb-5">MFG:<span class="text-brand"> Jun 4.2021</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Detail Info -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.header')
        @yield('content')
        
         @include('layouts.footer')
        <!-- Preloader Start -->
<!--
        <div id="preloader-active">
            <div class="preloader d-flex align-items-center justify-content-center">
                <div class="preloader-inner position-relative">
                    <div class="text-center">
                        <img src="/public/assets/imgs/theme/loading.gif" alt="" />
                    </div>
                </div>
            </div>
        </div>
-->
        <!-- Vendor JS-->
        <script src="{{asset('/public/assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
        <script src="{{asset('/public/assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
        <script src="{{asset('/public/assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
        <script src="{{asset('/public/assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('/public/assets/js/plugins/slick.js')}}"></script>
        <script src="{{asset('/public/assets/js/plugins/jquery.syotimer.min.js')}}"></script>
        <script src="{{asset('/public/assets/js/plugins/waypoints.js')}}"></script>
        <script src="{{asset('/public/assets/js/plugins/wow.js')}}"></script>
        <script src="{{asset('/public/assets/js/plugins/jquery-ui.js')}}"></script>
        <script src="{{asset('/public/assets/js/plugins/perfect-scrollbar.js')}}"></script>
        <script src="{{asset('/public/assets/js/plugins/magnific-popup.js')}}"></script>
        <script src="{{asset('/public/assets/js/plugins/select2.min.js')}}"></script>
        <script src="{{asset('/public/assets/js/plugins/counterup.js')}}"></script>
        <script src="{{asset('/public/assets/js/plugins/jquery.countdown.min.js')}}"></script>
        <script src="{{asset('/public/assets/js/plugins/images-loaded.js')}}"></script>
        <script src="{{asset('/public/assets/js/plugins/isotope.js')}}"></script>
        <script src="{{asset('/public/assets/js/plugins/scrollup.js')}}"></script>
        <script src="{{asset('/public/assets/js/plugins/jquery.vticker-min.js')}}"></script>
        <script src="{{asset('/public/assets/js/plugins/jquery.theia.sticky.js')}}"></script>
        <script src="{{asset('/public/assets/js/plugins/jquery.elevatezoom.js')}}"></script>
        <!-- Template  JS -->
        <script src="{{asset('/public/assets/js/main.js?v=3.2')}}"></script>
        <script src="{{asset('/public/assets/js/shop.js?v=3.2')}}"></script>
        <script>
            jQuery(document).ready(function(){
                setTimeout(function() {
                    jQuery('.modal').trigger('click');
                }, 2000);
            });
        </script>
    </body>
	
	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  
<script type="text/javascript">
$(function() {
   
    var $form         = $(".require-validation");
   
    $('form.require-validation').bind('submit', function(e) {
        var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');
  
        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
          var $input = $(el);
          if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
          }
        });
   
        if (!$form.data('cc-on-file')) {
          e.preventDefault();
          Stripe.setPublishableKey($form.data('stripe-publishable-key'));
          Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
          }, stripeResponseHandler);
        }
  
  });
  
  function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            /* token contains id, last4, and card type */
            var token = response['id'];
               
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
   
});
</script>
</html>
