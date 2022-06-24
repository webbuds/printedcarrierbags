<div class="sidebar px-4 py-4 py-md-4 me-0">
            <div class="d-flex flex-column h-100">
                <a href="{{route('dashboard')}}" class="mb-0 brand-icon">
                    <img style="width:150px" src="https://www.devpaper.webdevholdsite.co.uk/public/admin/assets/images/logo-white.svg" />
                </a>
                <!-- Menu: main ul -->
                <ul class="menu-list flex-grow-1 mt-3">
                    <li><a class="m-link {{ (request()->is('paperadmin/dashboard')) ? 'active' : '' }}" href="{{route('dashboard')}}"><i class="icofont-home fs-5"></i> <span>Dashboard</span></a></li>
                    <li class="collapsed">
                        <a class="m-link {{ (request()->is('paperadmin/products*')) ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#menu-product" href="#">
                            <i class="icofont-truck-loaded fs-5"></i> <span>Products</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                            <!-- Menu: Sub menu ul -->
                            <ul class="sub-menu collapse" id="menu-product">
                                <li><a class="ms-link {{ (request()->is('paperadmin/products')) ? 'active' : '' }}" href="/paperadmin/products">All Products</a></li>
                                <li><a class="ms-link {{ (request()->is('paperadmin/products/add')) ? 'active' : '' }}" href="/paperadmin/products/add">Add New</a></li>
                            </ul>
                    </li>
                    <li class="collapsed">
                        <a class="m-link {{ (request()->is('paperadmin/categories*')) ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#categories" href="#">
                            <i class="icofont-chart-flow fs-5"></i> <span>Categories</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                            <!-- Menu: Sub menu ul -->
                            <ul class="sub-menu collapse {{ (request()->is('paperadmin/categories*')) ? 'show' : '' }}" id="categories">
                                <li><a class="ms-link {{ (request()->is('paperadmin/categories')) ? 'active' : '' }}" href="/paperadmin/categories">All Categories</a></li>
                                <li><a class="ms-link {{ (request()->is('paperadmin/categories/add')) ? 'active' : '' }}" href="/paperadmin/categories/add">Add New</a></li>
                            </ul>
                    </li>
					 <li class="collapsed">
                        <a class="m-link" data-bs-toggle="collapse" data-bs-target="#attributes" href="#">
                            <i class="icofont-chart-flow fs-5"></i> <span>Attributes</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                            <!-- Menu: Sub menu ul -->
                            <ul class="sub-menu collapse" id="attributes">
                                <li><a class="ms-link" href="{{URL('admin-sizes')}}">Sizes</a></li>
                                <li><a class="ms-link" href="{{URL('admin-colours')}}">Colours</a></li>
                            </ul>
                    </li>
                    <li class="collapsed">
                        <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-order2" href="#">
                        <i class="icofont-notepad fs-5"></i> <span>Quotations</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse" id="menu-order2">
                            <li><a class="ms-link" href="/paperadmin/admin-orders">All Quotations</a></li>
                           
                        </ul>
                    </li>
					
					 <li class="collapsed">
                        <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-order" href="#">
                        <i class="icofont-notepad fs-5"></i> <span>Orders</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse" id="menu-order">
                            <li><a class="ms-link" href="/paperadmin/all-payment">All Orders</a></li>
                           
                        </ul>
                    </li>
					
					 <li class="collapsed">
                        <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-order1" href="#">
                        <i class="icofont-notepad fs-5"></i> <span>Static Pages</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse" id="menu-order1">
                            <li><a class="ms-link" href="{{route('new-page')}}">Add new page</a></li>
                           
                        </ul>
						 @php
						 $pages=App\Models\Pages::get();
						 @endphp
						 @foreach($pages as $page)
						  <ul class="sub-menu collapse" id="menu-order1">
                            <li><a class="ms-link" href="/paperadmin/viewPage/{{$page->id}}">{{$page->title}}</a><a href="{{route('delete_page',$page->id)}}">Delete</a></li>
                           
                        </ul>
						 @endforeach
						 
						 
                    </li>
                  
                </ul>
                <!-- Menu: menu collepce btn -->
                <button type="button" class="btn btn-link sidebar-mini-btn text-light">
                    <span class="ms-2"><i class="icofont-bubble-right"></i></span>
                </button>
            </div>
        </div>