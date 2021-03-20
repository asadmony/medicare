    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Setting Field Value
        <small>All</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> All</a></li>
        <li class="active">User Setting Field Value</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-sm-12">

          @include('alerts.alerts')

          <div class="box box-widget">
           <div class="box-body text-center">

            @include('admin.includes.forms.userSettingFieldValueForm')


           </div>
         </div>

         <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">All User Setting Field Values</h3>

            </div>
            <!-- /.box-header -->
          </div>


          @foreach($fields as $field)

          @if ($field->hasValue())
            <div class="box box-widget">
            <div class="box-header with-border">
              <b>ID: {{ $field->id }} &nbsp; &nbsp; {{$field->title}}</b>
            </div>
            <div class="box-body">

              <table class="table table-condensed table-striped table-bordered">
                <thead>
                  <tr>
                    <th width="50">SL</th>
                    <th>Setting Field Value</th>
                    <th width="150">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>

                  @foreach($field->values as $value)

                  @include('admin.ajax.settingValueSingleTr')
                  
                  <?php $i++; ?>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          @endif

          
          @endforeach


        </div>
      </div>
      

    </section>
    <!-- /.content -->

