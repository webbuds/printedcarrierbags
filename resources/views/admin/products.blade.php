@extends('admin.layout.admin')

@section('title', 'Products')

@section('content')
  <div class="body d-flex py-3">
                <div class="container-xxl">
                    <div class="row align-items-center">
                        <div class="border-0 mb-4">
                            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                <h3 class="fw-bold mb-0">Products</h3>
                                <a href="/paperadmin/products/add" class="btn btn-primary py-2 px-5 btn-set-task w-sm-100">Add Product</a>
                            </div>
							<div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                @if(Session::has('delete'))
									<div class="alert alert-success">{{ Session::get('delete') }}</div>
								@endif
                            </div>
                        </div>
                    </div> <!-- Row end  -->
                    <div class="row g-3 mb-3">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="myDataTable" class="table table-hover align-middle mb-0" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Category</th>
												<th>Unit Price(1000)</th>
												<th>Unit Price(3000)</th>
												<th>Unit Price(5000)</th>
												<th>Unit Price(10000)</th>
												<th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										@foreach ($products as $product)
											
                                            <tr>
                                                <td>{{ $product['name']}}</td>
                                                <td>{{ $product['category'] }}</td>
                                                <td>{{ $product['one_unit'] }}</td>
												<td>{{ $product['three_unit'] }}</td>
												<td>{{ $product['five_unit'] }}</td>
												<td>{{ $product['ten_unit'] }}</td>
                                                <td>{{ $product['status'] }}</td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic outlined example">
														 
                                                        <a href="{{URL('paperadmin/products/edit/'.$product['slug'])}}" class="btn btn-outline-secondary"><i class="icofont-edit text-success"></i></a>
                                                        <a href="{{URL('paperadmin/products/delete/'.$product['id'])}}" class="btn btn-outline-secondary deleterow"><i class="icofont-ui-delete text-danger"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                       @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection