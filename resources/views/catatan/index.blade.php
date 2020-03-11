@extends('layout.backend.baseindex')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
               Catatan Karyawan TJ
            </h3>
            <div class="template-demo">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb breadcrumb-custom">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><span>Catatan Karyawan TJ</span></li>
                  </ol>
                </nav>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    <div class="card-header" role="tab" id="heading-4"> 
                        <a data-toggle="collapse" href="#collapse-4" aria-expanded="false" aria-controls="collapse-4"><button type="button" class="btn btn-info btn-rounded btn-icon"><i class="fas fa-plus-circle"></i></button></a>
                            <!-- Modal Add-->
                            <div id="collapse-4" class="collapse" role="tabpanel" aria-labelledby="heading-4" data-parent="#accordion-2">
                                <div class="card-body">
                                    <form action="" method="post">
                                    @csrf
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Bagian:</label>
                                            <!-- <select class="js-example-basic-single w-100 form-control"> -->
                                            <select class="form-control" id="exampleFormControlSelect2">
                                                <option value="AL">PK</option>
                                                <option value="WY">SK</option>
                                                <option value="AM">INV</option>
                                                <option value="CA">KU</option>
                                                <option value="RU">PG</option>
                                                <option value="RU">DT</option>
                                                <option value="RU">PS</option>
                                                <option value="RU">KP/MM</option>
                                                <option value="RU">PM</option>
                                                <option value="RU">MK</option>
                                                <option value="RU">LO</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Nama:</label>
                                            <select class="js-example-basic-single w-100">
                                            <!-- <select class="form-control" id="exampleFormControlSelect2"> -->
                                                <option value="AL">PK</option>
                                                <option value="WY">SK</option>
                                                <option value="AM">INV</option>
                                                <option value="CA">KU</option>
                                                <option value="RU">PG</option>
                                                <option value="RU">DT</option>
                                                <option value="RU">PS</option>
                                                <option value="RU">KP/MM</option>
                                                <option value="RU">PM</option>
                                                <option value="RU">MK</option>
                                                <option value="RU">LO</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Note:</label>
                                            <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Status:</label>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="0">
                                                    Belum Terbaca
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="1">
                                                    Terbaca
                                                </label>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary waves-effect" name="simpan" value="Simpan">SAVE</button>
                                            <button type="reset" class="btn btn-danger waves-effect" name="batal" value="Batal">CANCEL</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Modal Add-->

                        <a data-toggle="collapse" href="#collapse-6" aria-expanded="false" aria-controls="collapse-6"><button type="button" class="btn btn-danger btn-rounded btn-icon"><i class="fas fa-trash"></i></button></a>
                            <!-- Modal Delete All -->
                            <div id="collapse-6" class="collapse" role="tabpanel" aria-labelledby="heading-4" data-parent="#accordion-2">
                                <div class="card-header">
                                    <h4 class="card-title" style="text-align:center;">Apakah anda yakin menghapus semua data ini?</h4>
                                </div>
                                <div class="card-body">
                                    <form action="" method="post">
                                    @csrf

                                        <div style="margin:0px; border-top:0px; text-align:center;">
                                            <button type="submit" class="btn btn-danger waves-effect" name="simpan" value="Delete">DELETE</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Modal Delete All -->
                    </div>
                </h4>
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