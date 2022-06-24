@extends('admin.layout.admin')

@section('title', ' Edit Bag Sizes')

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
												<label  class="form-label">Select product</label>
											<select class="form-control" name="product_id">
												<option value="">Select Product</option>
                                                @foreach($token as $product)
                                             
		 <option value="{{ $product['id'] }}" {{ ( $product['id'] ==  $data->product_id) ? 'selected' : '' }}>
															{{ $product['name'] }}</option>
                                                @endforeach
											</select>
											</div>
                                            <table class="table">
                                                <tbody id="tbody">
                                                    <tr style="display:flex;width:100%;">
                                                    <td style="width:50%">
                                                        <label  class="form-label">Size Name</label>
                                                        <input type="text" id="size_name" name="size_name" class="form-control" value="{{ $data->title}}" style="width: 100%; !important" required>
														<input type="hidden" id="id" name="id" class="form-control" value="{{ $data->id}}" style="width: 100%; !important" required>
                                                      </td>
                                                      <td>
                                                        <label class="form-label">Size</label>
                                                        <input type="text" id="size_slug" name="size_slug" class="form-control" style="width: 100%; !important"value="{{$data->size}}"  required>
                                                      </td>
													</tr>
													<tr style="display: flex;">
														 <td style="width:30rem">
                                                        <label class="form-label">Price</label>
                                                        <input type="text" id="price" name="price" class="form-control" style="width: 100%; !important" value="{{$data->price}}" required>
                                                      </td>
                                                    
                                                      <td>
                                                        <label class="form-label">Image</label>
                                                        <input type="file" id="size_image" name="size_image" class="form-control" required>
                                                      </td>
														@if($data->image)
                                                      <td><img style="width:6rem" src="https://www.devpaper.webdevholdsite.co.uk/{{$data->image}}"></td>
														@else
														<td></td>
														@endif
                                                      </tr>
													<tr>
														  <td>
                                                        <label class="form-label">Description</label>
														  
                                                        <textarea class="form-control" id="editor-1" name="description" required="required" style="width: 100%; height: 200px">{{$data->desciption}}</textarea>
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
               
                    </div><!-- Row end  --> 

                </div>
            </div>    


@endsection