
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin | Paper Carrier Bags </title>
    <link rel="icon" href="../favicon.ico" type="image/x-icon"> <!-- Favicon-->

    <!-- project css file  -->
    <link rel="stylesheet" href="{{asset('/public/admin/assets/css/ebazar.style.min.css')}}">
</head>
<body>
    <div id="ebazar-layout" class="theme-blue">

        <!-- main body area -->
        <div class="main p-2 py-3 p-xl-5 ">
            
            <!-- Body: Body -->
            <div class="body d-flex p-0 p-xl-5">
                <div class="container-xxl">

                    <div class="row g-0">
                        <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center rounded-lg auth-h100">
                            <div style="max-width: 25rem;">
                                <div class="text-center mb-5">
									<a href="/">
                                    <img src="{{asset('/public/assets/imgs/logo.png')}}" alt="login-img">
									</a>
                                </div>
                                <div class="mb-5">
                                    <h2 class="color-900 text-center">A few clicks is all it takes.</h2>
                                </div>
                                <!-- Image block -->
                                <div class="">
                                    <img src="{{asset('/public/assets/imgs/categories/eco-carrier-bags.png')}}" alt="login-img">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 d-flex justify-content-center align-items-center border-0 rounded-lg auth-h100">
                            <div class="w-100 p-3 p-md-5 card border-0 shadow-sm" style="max-width: 32rem;">
                                <!-- Form -->
                                <form class="row g-1 p-3 p-md-4" action="{{route('login')}}" method="post">
									@csrf
                                    <div class="col-12 text-center mb-5">
                                        <h1>Sign in</h1>
                                        <span>To get access to dashboard.</span>
                                    </div>
									 <div class="col-12">
                                        @if(Session::has('error'))
										 	<div class="alert alert-danger">{{ Session::get('error') }}</div>
										@endif
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-2">
                                            <label class="form-label">Email address</label>
                                            <input type="email" name="email" class="form-control form-control-lg" value="{{ old('email')}}">
                                        </div>
                                    </div>
									<div class="col-12">
                                        @error('email')
											<p class="text text-danger">{{ $message }}</p>
										@enderror
									</div>
                                    <div class="col-12">
                                        <div class="mb-2">
                                            <div class="form-label">
                                                <span class="d-flex justify-content-between align-items-center">
                                                    Password
                                                    <a class="text-secondary" href="{{URL('/admin/forgot-password')}}">Forgot Password?</a>
                                                </span>
                                            </div>
                                            <input type="password" name="password" class="form-control form-control-lg">
                                        </div>
                                    </div>
									<div class="col-12">
                                        @error('password')
											<p class="text text-danger">{{ $message }}</p>
										@enderror
									</div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Remember me
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center mt-4">
                                        <button type="submit" class="btn btn-lg btn-block btn-light lift text-uppercase" style="background-color:#00A79D; width:100%; color:#ffffff" atl="signin">SIGN IN</button>
                                    </div>
                                </form>
                                <!-- End Form -->
                                
                            </div>
                        </div>
                    </div> <!-- End Row -->
                    
                </div>
            </div>

        </div>

    </div>

    <!-- Jquery Core Js -->
    <script src="{{asset('/public/admin/assets/bundles/libscripts.bundle.js')}}"></script>
</body>
</html>