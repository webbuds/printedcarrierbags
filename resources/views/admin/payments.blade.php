@extends('admin.layout.admin')

@section('title', 'Payments')

@section('content')

	<div class="body d-flex py-lg-3 py-md-2">
                <div class="container-xxl">
                    <div class="row align-items-center">
                        <div class="border-0 mb-4">
                            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                <h3 class="fw-bold mb-0">Payments</h3>
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
                                                <th>Payment ID</th>
                                                <th>First name</th> 
                                                <th>Last name</th>
                                                <th>Mail</th>
                                                <th>Billing address</th> 
                                                <th>Quantity</th> 
                                                <th>Price</th>
                                                <th>Actions</th>  
                                            </tr>
                                        </thead>
                                        <tbody>
											@foreach($data as $quot)
                                            <tr>
                                                <td><strong>{{$quot->id}}</strong></td>
                                                <td><span class="fw-bold ms-1">{{$quot->fname}}</span></td>
                                                <td>{{$quot->lname}}</td>
                                                <td>{{$quot->email}}</td>
                                                <td>{{$quot->billing_address}}</td>
                                                <td>{{$quot->quantity}}</td>
                                                <td>£{{$quot->price}}</td>
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