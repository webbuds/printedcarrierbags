@extends('admin.layout.admin')

@section('title', 'Customers')

@section('content')

	<div class="body d-flex py-lg-3 py-md-2">
                <div class="container-xxl">
                    <div class="row align-items-center">
                        <div class="border-0 mb-4">
                            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                <h3 class="fw-bold mb-0">Customers</h3>
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
                                                <th>Id</th>
                                                <th>Customers</th> 
                                                <th>Quotation ID</th>
                                                <th>Mail</th>
                                                <th>Phone</th> 
                                                <th>Country</th> 
                                                
                                                <th>Actions</th>  
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><strong>0001</strong></td>
                                                <td>
                                                        <a href="customer-detail.html">
                                                            <img class="avatar rounded" src="{{asset('public/admin/assets/images/xs/avatar1.svg')}}" alt="">
                                                            <span class="fw-bold ms-1">Joan Dyer</span>
                                                        </a>
                                                </td>
                                                <td>
                                                        001
                                                </td>
                                                <td>JoanDyer@gmail.com</td>
                                                <td>202-555-0983</td>
                                                <td>South Africa</td>
                                               
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                        <button type="button" class="btn btn-outline-secondary"  data-bs-toggle="modal" data-bs-target="#expedit"><i class="icofont-edit text-success"></i></button>
                                                        <button type="button" class="btn btn-outline-secondary deleterow"><i class="icofont-ui-delete text-danger"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row End -->
                </div>
            </div>

@endsection