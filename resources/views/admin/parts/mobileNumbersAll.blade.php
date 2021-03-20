    <!-- Content Header (Page header) -->
    <section class="content-header no-print">
      <h1>
        Mobile Numbers All
        <small>Home</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Mobile Numbers All</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="min-height: 600px;">

      <div class="row">
        <div class="col-sm-12">

          <div class="box box-widget">
            <div class="box-header with-border no-print">
            <h3 class="box-title">All Mobile Numbers</h3>
            <div class="hidden-xs">
              {{ $users->render() }}
            </div>  
            <div class="box-tools pull-right">
              <a class="btn btn-primary btn-sm" href="" onclick="return window.print();"> <i class="fa fa-print"></i> Print</a>
            </div>
          </div>

            <div class="box-body table-responsive">

            <table class="table table-condensed table-bordered">
              <thead>
                <tr>
                  <th>SL</th>
                  <th>Name</th>
                  <th>Mobile</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = (($users->currentPage() - 1) * $users->perPage() + 1); ?>
                @foreach($users as $user)
                <tr>
                  <td>{{ $i }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ strlen(bdMobile($user->mobile)) == 13 ?bdMobile($user->mobile) : 'number incorrect'}}</td>
                </tr>

                <?php $i++; ?>
                @endforeach
              </tbody>
            </table>

            <div class="no-print">
              {{ $users->render() }}
            </div>               
            </div>
          </div>

        </div>
      </div>
      

    </section>
    <!-- /.content -->