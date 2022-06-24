@extends('admin.layout.admin')

@section('title', 'Colours')

@section('content')
 <div class="body d-flex py-3">
                <div class="container-xxl">

                    <div class="row align-items-center">
                        <div class="border-0 mb-4">
                            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                <h3 class="fw-bold mb-0">Colours</h3>                                
                            </div>
                        </div>
                    </div> <!-- Row end  -->  
                    
                    <div class="row g-3 mb-3">
                        <div class="col-lg-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <form action="{{route('admin-add-multi-colors')}}" method="post" enctype="multipart/form-data">
										@csrf
                                        <div class="row g-3 align-items-center">
											
                                            <table class="table">
                                                <tbody id="tbody">
                                                    <td>
                                                        <label  class="form-label">Name</label>
                                                        <input type="color" id="cat_name" name="color_name" class="form-control" value="{{ old('cat_name') }}" required>
                                                      </td>
                                                      <td>
                                                       
                                                        <input type="hidden" id="cat_slug" name="color_slug" value="slug" class="form-control" required>
                                                      </td>
                                                      <td>
                                                        <label class="form-label">Image</label>
                                                        <input type="file" id="cat_slug" name="images" class="form-control" required>
                                                      </td>
                                                      <td></td>
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
                                                 
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											@foreach($data as $size)
											<tr>
                                                <td><input type="color" value="{{$size['name']}}" disabled ></td>
                                                <td><img src="https://www.devpaper.webdevholdsite.co.uk/{{$size['image']}}" style="width:50px; height: 50px" >
</td>
                                                <td><a href="{{URL('paperadmin/color/delete/'.$size['id'])}}" class="btn btn-outline-secondary deleterow"><i class="icofont-ui-delete text-danger"></i></a></td>
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