    <!-- Content Header (Page header) -->
{{--     <section class="content-header">
      <h1>
        Media
        <small>All</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Media</a></li>
        <li class="active">All</li>
      </ol>
    </section> --}}

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-sm-12">

          @include('alerts')

          <div class="card card-widget">
           <div class="card-body text-center">

             @include('admin.media.includes.forms.mediaUploadForm')

           </div>
         </div>

          <div class="card card-widget">
            <div class="card-header">
              <h3 class="card-title">
                Media All
              </h3>
            </div>
           <div class="card-body ">

            <div class="card card-widget">
              <div class="card-body" style="background-color: #ccc;">
                @include('admin.media.includes.others.mediaAll')
              
              </div>
            </div>

             

           </div>
         </div>




        </div>
      </div>
      

    </section>
    <!-- /.content -->

