    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ambulance/Drivers
        <small>All</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Ambulance/Drivers</a></li>
        <li class="active">All</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-sm-12">

        @include('alerts')

 
         <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">All Ambulance/Drivers</h3>


            </div>
            <!-- /.box-header -->


            <div class="box-body table-responsive">

              <table class="table table-condensed table-striped table-bordered">
                <thead>
                  <tr>
                    <th width="50">SL</th>
                    <th width="100"></th>
                    <th>Driver Info</th>
                    <th>Ambulance Info</th>
                     
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = (($drivers->currentPage() - 1) * $drivers->perPage() + 1); ?>
                  @foreach($drivers as $driver)
                  <tr>
                    <td width="50">{{$i}}</td>
                    <td width="100"><img width="90" height="90" src="{{asset($driver->user->profilePic())}}"></td>
                    <td>{{$driver->user->name}} <br> {{$driver->user->mobile}} <br> {{$driver->user->email}} <br>{{$driver->user->driverInfo->address}}</td>
                    <td>Car No:{{$driver->user->driverInfo->car_number}} <br>BRTA Fitness no: {{$driver->user->driverInfo->brta_fitness_number}} <br> NID: {{$driver->user->driverInfo->nid_number}} <br> Ambulance Type:
                      @foreach($driver->user->driverCarTypes as $type)
                      {{$type->carType->car_type}},
                      @endforeach
                    </td>

                    <td>

                      <div class="btn-group btn-group-xs">

                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fa fa-trash"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right" role="menu">                        

                          <li class="w3-padding"><a class="w3-btn w3-red w3-small w3-round w3-hover-red btn-contact-delete" href="{{route('admin.driverDelete',$driver)}}" data-url="">Confirm</a></li>
                        </ul>
                      </div>


                    </td>
                  </tr>
                  <?php $i++; ?>
                  @endforeach
                </tbody>
              </table>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
                {{$drivers->render()}}

              </div>
            </div>




          </div>


        </div>
      </div>
      

    </section>
    <!-- /.content -->

