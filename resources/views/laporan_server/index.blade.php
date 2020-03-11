@extends('layout.backend.baseindex')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
               Server Lokal TJ
            </h3>
            <div class="template-demo">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb breadcrumb-custom">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><span>Server Lokal TJ</span></li>
                  </ol>
                </nav>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data table</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>Order #</th>
                                        <th>Purchased On</th>
                                        <th>Customer</th>
                                        <th>Ship to</th>
                                        <th>Base Price</th>
                                        <th>Purchased Price</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>2012/08/03</td>
                                        <td>Edinburgh</td>
                                        <td>New York</td>
                                        <td>$1500</td>
                                        <td>$3200</td>
                                        <td>
                                        <label class="badge badge-info">On hold</label>
                                        </td>
                                        <td>
                                        <button class="btn btn-outline-primary">View</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>2015/04/01</td>
                                        <td>Doe</td>
                                        <td>Brazil</td>
                                        <td>$4500</td>
                                        <td>$7500</td>
                                        <td>
                                        <label class="badge badge-danger">Pending</label>
                                        </td>
                                        <td>
                                        <button class="btn btn-outline-primary">View</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection