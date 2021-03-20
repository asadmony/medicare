@extends('admin.layouts.adminMaster')

@section('content')
<br>
    <!-- Main content -->
    <section class="content">
<br>

    <!-- Info cardes -->
    <div class="row">
        <div class="col-md-12">

            @include('alerts')

                <div class="card card-widget">
                    <div class="card-header with-border">
                        <h3 class="card-title py-1">
                            <i class="fa fa-th"></i> 
                            {{ucfirst($type)}} Orders 
                        </h3>
                        
                        <div class="float-right-">
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <div class="dropdown show py-1">
                                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{ucfirst($type)}}
                                        </a>
                                      
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                          <a class="dropdown-item" href="{{ route('admin.order',"pending") }}">Pending</a>
                                          <a class="dropdown-item" href="{{ route('admin.order',"confirmed") }}">Confirmed</a>
                                          <a class="dropdown-item" href="{{ route('admin.order',"delivered") }}">Delivered</a>
                                          <a class="dropdown-item" href="{{ route('admin.order',"cancelled") }}">Cancelled</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 float-right">
                                    <div class="input-group py-1">
                                        <input data-url="{{ route('admin.searchAjax') }}" type="text" class="form-control form-control-sm ajax-data-search" placeholder="Search by order id, package, course">
                                        <div class="input-group-append">
                                            <button class="btn btn-sm btn-primary" type="button">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body ">
                        <div class="table-responsive ajax-data-container">
                            @include('admin.order.modules.orderDetailsTable')
                        </div>
                    </div>
                </div>
            
            </div>        
        </div>
      <!-- /.row -->      

    </section>
@endsection