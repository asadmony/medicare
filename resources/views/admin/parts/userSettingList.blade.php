    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Setting Field 
        <small>All</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> All</a></li>
        <li class="active">User Setting Field </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-sm-12">

          @include('alerts.alerts')

          <div class="box box-widget">
           <div class="box-body text-center">

             @include('admin.includes.forms.userSettingFieldForm')

           </div>
         </div>

         <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">All User Setting Fields</h3>

            </div>
            <!-- /.box-header -->


            <div class="box-body table-responsive">

              <table class="table table-condensed table-striped table-bordered">
                <thead>
                  <tr>
                    <th width="50">ID</th>
                    <th>Field Name</th>
                    <th width="150">Action</th>
                  </tr>
                </thead>
                <tbody>

                  @foreach($fields as $field)

                  @include('admin.ajax.fieldTr')

                  @endforeach
                </tbody>
              </table>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
                {{$fields->render()}}

              </div>
            </div>




          </div>


        </div>
      </div>
      

    </section>
    <!-- /.content -->

