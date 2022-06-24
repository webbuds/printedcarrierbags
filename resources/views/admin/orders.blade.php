@extends('admin.layout.admin')

@section('title', 'Qutations')

@section('content')

	<div class="body d-flex py-lg-3 py-md-2">
                <div class="container-xxl">
                    <div class="row align-items-center">
                        <div class="border-0 mb-4">
                            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                <h3 class="fw-bold mb-0">Qutations</h3>
                            </div>
                        </div>
                    </div> <!-- Row end  -->
                    <div class="row clearfix g-3">
                        <div class="col-sm-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <table id="myDataTable" class="table table-hover align-middle mb-0" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Quotation ID</th>
                                                <th>Customers</th> 
                                                <th>Product</th>
                                                <th>Mail</th>
                                                <th>Phone</th> 
                                          
                                                <th>Actions</th>  
                                            </tr>
                                        </thead>
                                        <tbody>
											@foreach($data as $quot)
                                            <tr>
                                                <td><strong>{{$quot['reffrence']}}</strong></td>
                                                <td><span class="fw-bold ms-1">{{$quot['client_name']}}</span></td>
                                                <td>{{$quot['product']}}</td>
                                                <td>{{$quot['client_email']}}</td>
                                                <td>{{$quot['client_number']}}</td>
                                               
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                        <button type="button" class="btn btn-outline-secondary"  data-bs-toggle="modal" data-bs-target="#expedit"><i class="icofont-edit text-success"></i></button>
                                                        <a href="{{URL('/paperadmin/delete/quot/'.$quot['id'])}}"  class="btn btn-outline-secondary deleterow"><i class="icofont-ui-delete text-danger"></i></a>
														<a href="{{URL('/paperadmin/send/quot/'.$quot['id'])}}" class="btn btn-outline-secondary deleterow"><i class="icofont-send-mail"></i></a> 
                                                    </div>
                                                </td>
                                            </tr>
                                           @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row End -->
                </div>
            </div>

@endsection