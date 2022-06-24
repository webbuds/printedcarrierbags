@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
        <div class="mobile-header-active mobile-header-wrapper-style">
            <div class="mobile-header-wrapper-inner">
                <div class="mobile-header-top">
                    <div class="mobile-header-logo">
                        <a href="index.html"><img src="assets/imgs/theme/logo.svg" alt="logo" /></a>
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
                                <li class="menu-item-has-children">
                                    <a href="index.html">Home</a>
                                    <ul class="dropdown">
                                        <li><a href="index.html">Home 1</a></li>
                                        <li><a href="index-2.html">Home 2</a></li>
                                        <li><a href="index-3.html">Home 3</a></li>
                                        <li><a href="index-4.html">Home 4</a></li>
                                        <li><a href="index-5.html">Home 5</a></li>
                                        <li><a href="index-6.html">Home 6</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="shop-grid-right.html">shop</a>
                                    <ul class="dropdown">
                                        <li><a href="shop-grid-right.html">Shop Grid – Right Sidebar</a></li>
                                        <li><a href="shop-grid-left.html">Shop Grid – Left Sidebar</a></li>
                                        <li><a href="shop-list-right.html">Shop List – Right Sidebar</a></li>
                                        <li><a href="shop-list-left.html">Shop List – Left Sidebar</a></li>
                                        <li><a href="shop-fullwidth.html">Shop - Wide</a></li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Single Product</a>
                                            <ul class="dropdown">
                                                <li><a href="shop-product-right.html">Product – Right Sidebar</a></li>
                                                <li><a href="shop-product-left.html">Product – Left Sidebar</a></li>
                                                <li><a href="shop-product-full.html">Product – No sidebar</a></li>
                                                <li><a href="shop-product-vendor.html">Product – Vendor Infor</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="shop-filter.html">Shop – Filter</a></li>
                                        <li><a href="shop-wishlist.html">Shop – Wishlist</a></li>
                                        <li><a href="shop-cart.html">Shop – Cart</a></li>
                                        <li><a href="shop-checkout.html">Shop – Checkout</a></li>
                                        <li><a href="shop-compare.html">Shop – Compare</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Vendors</a>
                                    <ul class="dropdown">
                                        <li><a href="vendors-grid.html">Vendors Grid</a></li>
                                        <li><a href="vendors-list.html">Vendors List</a></li>
                                        <li><a href="vendor-details-1.html">Vendor Details 01</a></li>
                                        <li><a href="vendor-details-2.html">Vendor Details 02</a></li>
                                        <li><a href="vendor-dashboard.html">Vendor Dashboard</a></li>
                                        <li><a href="vendor-guide.html">Vendor Guide</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Mega menu</a>
                                    <ul class="dropdown">
                                        <li class="menu-item-has-children">
                                            <a href="#">Women's Fashion</a>
                                            <ul class="dropdown">
                                                <li><a href="shop-product-right.html">Dresses</a></li>
                                                <li><a href="shop-product-right.html">Blouses & Shirts</a></li>
                                                <li><a href="shop-product-right.html">Hoodies & Sweatshirts</a></li>
                                                <li><a href="shop-product-right.html">Women's Sets</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Men's Fashion</a>
                                            <ul class="dropdown">
                                                <li><a href="shop-product-right.html">Jackets</a></li>
                                                <li><a href="shop-product-right.html">Casual Faux Leather</a></li>
                                                <li><a href="shop-product-right.html">Genuine Leather</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Technology</a>
                                            <ul class="dropdown">
                                                <li><a href="shop-product-right.html">Gaming Laptops</a></li>
                                                <li><a href="shop-product-right.html">Ultraslim Laptops</a></li>
                                                <li><a href="shop-product-right.html">Tablets</a></li>
                                                <li><a href="shop-product-right.html">Laptop Accessories</a></li>
                                                <li><a href="shop-product-right.html">Tablet Accessories</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="blog-category-fullwidth.html">Blog</a>
                                    <ul class="dropdown">
                                        <li><a href="blog-category-grid.html">Blog Category Grid</a></li>
                                        <li><a href="blog-category-list.html">Blog Category List</a></li>
                                        <li><a href="blog-category-big.html">Blog Category Big</a></li>
                                        <li><a href="blog-category-fullwidth.html">Blog Category Wide</a></li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Single Product Layout</a>
                                            <ul class="dropdown">
                                                <li><a href="blog-post-left.html">Left Sidebar</a></li>
                                                <li><a href="blog-post-right.html">Right Sidebar</a></li>
                                                <li><a href="blog-post-fullwidth.html">No Sidebar</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Pages</a>
                                    <ul class="dropdown">
                                        <li><a href="page-about.html">About Us</a></li>
                                        <li><a href="page-contact.html">Contact</a></li>
                                        <li><a href="page-account.html">My Account</a></li>
                                        <li><a href="page-login.html">Login</a></li>
                                        <li><a href="page-register.html">Register</a></li>
                                        <li><a href="page-purchase-guide.html">Purchase Guide</a></li>
                                        <li><a href="page-privacy-policy.html">Privacy Policy</a></li>
                                        <li><a href="page-terms.html">Terms of Service</a></li>
                                        <li><a href="page-404.html">404 Page</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Language</a>
                                    <ul class="dropdown">
                                        <li><a href="#">English</a></li>
                                        <li><a href="#">French</a></li>
                                        <li><a href="#">German</a></li>
                                        <li><a href="#">Spanish</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                        <!-- mobile menu end -->
                    </div>
                    <div class="mobile-header-info-wrap">
                        <div class="single-mobile-header-info">
                            <a href="page-contact.html"><i class="fi-rs-marker"></i> Our location </a>
                        </div>
                        <div class="single-mobile-header-info">
                            <a href="page-login.html"><i class="fi-rs-user"></i>Log In / Sign Up </a>
                        </div>
                        <div class="single-mobile-header-info">
                            <a href="#"><i class="fi-rs-headphones"></i>(+01) - 2345 - 6789 </a>
                        </div>
                    </div>
                    <div class="mobile-social-icon mb-50">
                        <h6 class="mb-15">Follow Us</h6>
                        <a href="#"><img src="assets/imgs/theme/icons/icon-facebook-white.svg" alt="" /></a>
                        <a href="#"><img src="assets/imgs/theme/icons/icon-twitter-white.svg" alt="" /></a>
                        <a href="#"><img src="assets/imgs/theme/icons/icon-instagram-white.svg" alt="" /></a>
                        <a href="#"><img src="assets/imgs/theme/icons/icon-pinterest-white.svg" alt="" /></a>
                        <a href="#"><img src="assets/imgs/theme/icons/icon-youtube-white.svg" alt="" /></a>
                    </div>
                    <div class="site-copyright">Copyright 2021 © Nest. All rights reserved. Powered by AliThemes.</div>
                </div>
            </div>
        </div>
        <!--End header-->
        <main class="main pages">
            <div class="page-header breadcrumb-wrap">
                <div class="container">
                    <div class="breadcrumb">
                        <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                        <span></span> Pages <span></span> Terms of Service
                    </div>
                </div>
            </div>
            <div class="page-content pt-50">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-10 col-lg-12 m-auto">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="single-page pr-30 mb-lg-0 mb-sm-5">
                                        <div class="single-header style-2">
                                            <h2>Terms of Service</h2>
                                            <div class="entry-meta meta-1 meta-3 font-xs mt-15 mb-15">
                                                <span class="post-by">By <a href="#">Jonh</a></span>
                                                <span class="post-on has-dot">9 April 2020</span>
                                                <span class="time-reading has-dot">8 mins read</span>
                                                <span class="hit-count has-dot">29k Views</span>
                                            </div>
                                        </div>
                                        <div class="single-content mb-50">
                                            <p>Please read these Terms of Service (“Terms”, “Terms of Service”) carefully before using the https://Evara.com website (the “Service”) operated by Evara (“us”, “we”, or “our”).</p>
                                            <p>Your access to and use of the Service is conditioned on your acceptance of and compliance with these Terms. These Terms apply to all visitors, users and others who access or use the Service.</p>
                                            <p>By accessing or using the Service you agree to be bound by these Terms. If you disagree with any part of the terms then you may not access the Service.</p>
                                            <h4>Rights & restrictions</h4>
                                            <ol>
                                                <li>Members must be at least 18 years of age.</li>
                                                <li>Members are granted a time-limited, non-exclusive, revocable, nontransferable, and non-sublicensable right to access that portion of the online course corresponding to the purchase.</li>
                                                <li>The portion of the online course corresponding to the purchase will be available to the Member as long as the course is maintained by the Company, which will be a minimum of one year after Member’s purchase.</li>
                                                <li>The videos in the course are provided as a video stream and are not downloadable.</li>
                                                <li>By agreeing to grant such access, the Company does not obligate itself to maintain the course, or to maintain it in its present form.</li>
                                            </ol>
                                            <h4>Links To Other Web Sites</h4>
                                            <p>Our Service may contain links to third-party web sites or services that are not owned or controlled by Evara.</p>
                                            <p>Evara has no control over, and assumes no responsibility for, the content, privacy policies, or practices of any third party web sites or services. You further acknowledge and agree that Evara shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any such content, goods or services available on or through any such web sites or services.</p>
                                            <p>We strongly advise you to read the terms and conditions and privacy policies of any third-party web sites or services that you visit.</p>
                                            <h4>Termination</h4>
                                            <p>We may terminate or suspend access to our Service immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.</p>
                                            <p>All provisions of the Terms which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.</p>
                                            <h4>Governing Law</h4>
                                            <p>These Terms shall be governed and construed in accordance with the laws of Viet Nam, without regard to its conflict of law provisions.</p>
                                            <p>Our failure to enforce any right or provision of these Terms will not be considered a waiver of those rights. If any provision of these Terms is held to be invalid or unenforceable by a court, the remaining provisions of these Terms will remain in effect. These Terms constitute the entire agreement between us regarding our Service, and supersede and replace any prior agreements we might have between us regarding the Service.</p>
                                            <h4>Changes</h4>
                                            <p>We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If a revision is material we will try to provide at least 30 days notice prior to any new terms taking effect. What constitutes a material change will be determined at our sole discretion.</p>
                                            <p>By continuing to access or use our Service after those revisions become effective, you agree to be bound by the revised terms. If you do not agree to the new terms, please stop using the Service.</p>
                                            <h4>Contact Us</h4>
                                            <p>If you have any questions about these Terms, please <a href="page-contact.html">contact us</a>.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 primary-sidebar sticky-sidebar">
                                    <div class="widget-area">
                                        <div class="sidebar-widget-2 widget_search mb-50">
                                            <div class="search-form">
                                                <form action="#">
                                                    <input type="text" placeholder="Search…" />
                                                    <button type="submit"><i class="fi-rs-search"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="sidebar-widget widget-category-2 mb-30">
                                            <h5 class="section-title style-1 mb-30">Category</h5>
                                            <ul>
                                                <li>
                                                    <a href="shop-grid-right.html"> <img src="assets/imgs/theme/icons/category-1.svg" alt="" />Milks & Dairies</a><span class="count">30</span>
                                                </li>
                                                <li>
                                                    <a href="shop-grid-right.html"> <img src="assets/imgs/theme/icons/category-2.svg" alt="" />Clothing</a><span class="count">35</span>
                                                </li>
                                                <li>
                                                    <a href="shop-grid-right.html"> <img src="assets/imgs/theme/icons/category-3.svg" alt="" />Pet Foods </a><span class="count">42</span>
                                                </li>
                                                <li>
                                                    <a href="shop-grid-right.html"> <img src="assets/imgs/theme/icons/category-4.svg" alt="" />Baking material</a><span class="count">68</span>
                                                </li>
                                                <li>
                                                    <a href="shop-grid-right.html"> <img src="assets/imgs/theme/icons/category-5.svg" alt="" />Fresh Fruit</a><span class="count">87</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- Product sidebar Widget -->
                                        <div class="sidebar-widget product-sidebar mb-30 p-30 bg-grey border-radius-10">
                                            <h5 class="section-title style-1 mb-30">Trending Now</h5>
                                            <div class="single-post clearfix">
                                                <div class="image">
                                                    <img src="assets/imgs/shop/thumbnail-3.jpg" alt="#" />
                                                </div>
                                                <div class="content pt-10">
                                                    <h5><a href="shop-product-detail.html">Chen Cardigan</a></h5>
                                                    <p class="price mb-0 mt-5">$99.50</p>
                                                    <div class="product-rate">
                                                        <div class="product-rating" style="width: 90%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="single-post clearfix">
                                                <div class="image">
                                                    <img src="assets/imgs/shop/thumbnail-4.jpg" alt="#" />
                                                </div>
                                                <div class="content pt-10">
                                                    <h6><a href="shop-product-detail.html">Chen Sweater</a></h6>
                                                    <p class="price mb-0 mt-5">$89.50</p>
                                                    <div class="product-rate">
                                                        <div class="product-rating" style="width: 80%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="single-post clearfix">
                                                <div class="image">
                                                    <img src="assets/imgs/shop/thumbnail-5.jpg" alt="#" />
                                                </div>
                                                <div class="content pt-10">
                                                    <h6><a href="shop-product-detail.html">Colorful Jacket</a></h6>
                                                    <p class="price mb-0 mt-5">$25</p>
                                                    <div class="product-rate">
                                                        <div class="product-rating" style="width: 60%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="single-post clearfix">
                                                <div class="image">
                                                    <img src="assets/imgs/shop/thumbnail-6.jpg" alt="#" />
                                                </div>
                                                <div class="content pt-10">
                                                    <h6><a href="shop-product-detail.html">Lorem, ipsum</a></h6>
                                                    <p class="price mb-0 mt-5">$25</p>
                                                    <div class="product-rate">
                                                        <div class="product-rating" style="width: 60%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="banner-img wow fadeIn mb-40 animated d-lg-block d-none">
                                            <img src="assets/imgs/banner/banner-11.png" alt="" />
                                            <div class="banner-text">
                                                <span>Oganic</span>
                                                <h4>
                                                    Save 17% <br />
                                                    on <span class="text-brand">Oganic</span><br />
                                                    Juice
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
      @endsection