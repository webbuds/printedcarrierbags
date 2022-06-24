@extends('admin.layout.admin')

@section('title', 'Bag Sizes')

@section('content')
 <div class="body d-flex py-3">
                <div class="container-xxl">

                    <div class="row align-items-center">
                        <div class="border-0 mb-4">
                            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                <h3 class="fw-bold mb-0">Bag Sizes</h3>                                
                            </div>
                        </div>
                    </div> <!-- Row end  -->  
                    
                    <div class="row g-3 mb-3">
                        <div class="col-lg-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <form action="{{route('admin-add-multi-sizes')}}" method="post" enctype="multipart/form-data" id="size_form">
										@csrf
                                      <!-- <button class="btn btn-md btn-primary" id="addBtn-size" type="button">Add Row</button> -->
                                        <div class="row g-3 align-items-center">
											<div class="col-lg-6 col-md-6 col-sm-12 col-12" style="margin-top:50px">
												<label  class="form-label">Select product <span class="text text-danger">*</span></label>
											<select class="form-control" name="product_id">
												<option value="">Select Product</option>
                                                @foreach($token as $product)
                                                <option value="{{$product['id']}}">{{$product['name']}}</option>
                                                @endforeach
											</select>
											</div>
                                            <table class="table">
                                                <tbody id="tbody">
                                                    <tr style="display: flex;">
                                                    <td>
                                                        <label  class="form-label">Size Name <span class="text text-danger">*</span></label>
                                                        <input type="text" id="size_name" name="size_name" class="form-control" value="{{ old('size_name') }}" style="width:30rem" required>
                                                      </td>
                                                      <td>
                                                        
                                                        <input type="hidden" id="size_slug" name="size_slug" value="slug" class="form-control" required>
                                                      </td>
														 <td>
                                                        <label class="form-label">Price <span class="text text-danger">*</span></label>
                                                        <input type="text" id="price" name="price" class="form-control" required>
                                                      </td>
                                                    
                                                      <td>
                                                        <label class="form-label">Image <span class="text text-danger">*</span></label>
                                                        <input type="file" id="size_image" name="size_image" class="form-control" required>
                                                      </td>
                                                      <td></td>
                                                      </tr>
													<tr>
														  <td>
                                                        <label class="form-label">Description</label>
														  
                                                        <textarea class="form-control textarea-height" id="editor-1" name="description"  style="width: 100%; height: 400px;"></textarea>
                                                      </td>
													</tr>
                                                </tbody>
                                              </table>
                                              <div class="col-lg-2 col-md-2 col-sm-12 col-12">
                                                <button type="submit" class="btn btn-primary py-2 px-5">Save</button>
                                              </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="myDataTable" class="table table-hover align-middle mb-0" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Name</th> 
                                                <th>Size</th>    
                                                <th>Image</th>
                                                <th>Product</th>                    
												<th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
											
											@foreach($data as $size)
											<tr>
                                                <td>{{$size['title']}}</td>
                                                <td>{{$size['size']}}</td>
                                                <td><img src="https://www.devpaper.webdevholdsite.co.uk/{{$size['image']}}" style="width:50px; height: 50px" ></td>
												<td>{{$size['name']}}</td>
                                                <td> 
													<a href="{{URL('paperadmin/size/edit/'.$size['id'])}}" class="btn btn-outline-secondary"><i class="icofont-edit text-success"></i></a>
													<a href="{{URL('paperadmin/size/delete/'.$size['id'])}}" class="btn btn-outline-secondary deleterow"><i class="icofont-ui-delete text-danger"></i></a></td>
                                            </tr>
											@endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row end  --> 

                </div>
            </div>    


@endsection