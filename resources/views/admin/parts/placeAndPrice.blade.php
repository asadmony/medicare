    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Place And Price
        <small>All</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Place And Price</a></li>
        <li class="active">All</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-sm-12">

          @include('alerts')

          <div class="box box-widget">
           <div class="box-body text-center">

             @include('admin.includes.forms.placeAndPriceAddForm')

           </div>
         </div>

         <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">All Places</h3>

              {{-- <form class="pull-right">
                <div class="box-tools">
                  <div class="input-group input-group-sm " style="width: 250px;">
                    <input type="text" name="q" class="form-control input-xs pull-right profile-search w3-border" placeholder="Search By ID, Title, Thana, Category" data-url="http://projectbd.oo/admin/profile/searching">

                    <div class="input-group-btn">
                      <button type="button" class="btn btn-default w3-deep-orange w3-border-deep-orange"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </form> --}} 

            </div>
            <!-- /.box-header -->


            <div class="box-body table-responsive">

              <table class="table table-condensed table-striped table-bordered text-center">
                <thead>
                  <tr>
                    <th>SL</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Ambulance Type</th>
                    <th>Price (Tk)</th>
                    <th>Payable Advance (Tk)</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = (($placesAll->currentPage() - 1) * $placesAll->perPage() + 1); ?>
                  @foreach($placesAll as $place)
                  <tr>
                    <td>{{$i}}</td>
                    <td>{{$place->from}}</td>
                    <td>{{$place->to}}</td>
                    <td>{{$place->carType->car_type}}</td>
                    <td>{{$place->price}}</td>
                    <td>{{$place->payable_advance}}</td>
                    <td>

                      <div class="btn-group btn-group-xs">

                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fa fa-trash"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right" role="menu">                        

                          <li class="w3-padding"><a class="w3-btn w3-red w3-small w3-round w3-hover-red btn-cat-delete" href="{{route('admin.placeAndPriceDelete',$place)}}" data-url="">Confirm</a></li>
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
                {{$placesAll->render()}}

              </div>
            </div>




          </div>


        </div>
      </div>
      

    </section>
    <!-- /.content -->

