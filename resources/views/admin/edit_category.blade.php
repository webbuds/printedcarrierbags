@extends('admin.layout.admin')

@section('title', 'Edit Category')

@section('content')
 <div class="body d-flex py-3">
                <div class="container-xxl">

                    <div class="row align-items-center">
                        <div class="border-0 mb-4">
                            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                <h3 class="fw-bold mb-0">Edit Category</h3>
                                <a href="{{URL('/paperadmin/categories')}}" class="btn btn-primary py-2 px-5 btn-set-task w-sm-100"> All Categories</a>
                                
                            </div>
                        </div>
                    </div> <!-- Row end  -->  
                    
                    <div class="row g-3 mb-3">
                        <div class="col-lg-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <form action="{{URL('/paperadmin/categories/update')}}" method="post" enctype="multipart/form-data">
										@csrf
										<input type="hidden" name="id" value="{{$data['id']}}" />
                                        <div class="row g-3 align-items-center">
											<div class="col-md-6">
												@if(Session::has('success'))
													<div class="alert alert-success">{{ Session::get('success') }}</div>
												@endif
											</div>
											<div class="col-md-6"></div>
                                            <div class="col-md-6">
                                                <label  class="form-label">Name <span class="text text-danger">*</span></label>
                                                <input type="text" id="cat_name" name="name" onkeyup="slugMaking()" class="form-control" value="{{ $data['name'] }}" required>
												
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Slug <span class="text text-danger">*</span></label>
                                                <input type="text" id="cat_slug" name="slug" class="form-control" value="{{ $data['slug'] }}" readonly="readonly" required>
                                            </div>
											
											<div class="col-md-6">
												@error('cat_name')
													<p class="text-danger">{{ $message }}</p>
												@enderror
											</div>
											<div class="col-md-6">
												@error('cat_slug')
													<p class="text-danger">{{ $message }}</p>
												@enderror
											</div>
                                            <div class="col-md-6">
                                    			
                                        		<label  class="form-label">Parent category</label>
                                        			<select class="form-select" name="category" aria-label="size 3 select example">
														<option value="{{ $data['category'] }}">{{ $data['category'] }}</option>
                                            			<option value="none">None</option>
														@foreach ($categories as $category)
														<option value="{{ $category->name }}">{{ $category->name }}</option>
														@endforeach
                                                 </select>
                                           	</div>
											<div class="col-md-6>"></div>
											<div class="col-md-6">
												@error('cat_parent')
													<p class="text-danger">{{ $message }}</p>
												@enderror
											</div>
											<div class="col-md-6>"></div>
											<div class="col-md-6">
                                    				<label  class="form-label">Category Image <span class="text text-danger">*</span></label>
                                        			<input type="file" name="image" id="dropify-event" required>
												    
                                    			
                                			</div>
											<div class="col-md-6">
                                    				<img style="width:50%" src="{{URL('storage/app/'.$data['image'])}}" />
                                			</div>
											<div class="col-md-6">
                                    			@error('image')
													<p class="text-danger">{{ $message }}</p>
												@enderror
                                    			
                                			</div>
											<div class="col-md-6"></div>
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
	function slugMaking() {
		
let text = document.getElementById("cat_name").value; 
		
		var replaced = text.split(' ').join('-');
		var replaced=replaced.toLowerCase();

document.getElementById("cat_slug").value = replaced;
		}
</script>
@endsection