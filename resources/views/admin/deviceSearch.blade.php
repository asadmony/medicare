@extends('admin.layouts.adminMaster')

@push('css')
<style>
  .tableFixHead{ overflow-y: auto; height: 600px; }
    .tableFixHead thead th { position: sticky; top: 0; }

/* Just common table stuff. Really. */
table  { border-collapse: collapse; width: 100%; }
th, td { padding: 8px 16px; }
th     { background:#eee; } 
</style>
@endpush

@section('content')
  <section class="content">

    <br>

    <div class="row">
        <div class="col-md-12">
          <div class="card card-primary p-0">
            <div class="card-header">
              <h3 class="card-title">Product/Device Search</h3>



            <div class="card-tools">

              <a href="" onclick="return printDiv('printArea');" class="btn btn-sm btn-light float-left" style="color: #000; margin-top: -4px;">Print</a> &nbsp;

                <form action="{{ route('admin.deviceSearch') }}" class="float-right">
                <div class="input-group input-group-sm">
                  <input type="text" name="q" value="{{ isset($q) ? $q : '' }}" class="form-control" placeholder="Search Device ID/EMEI/Name">
                  <div class="input-group-append">
                    <button type="submit" class="btn btn-warning">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
                </form>
            </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            

                @include('admin.includes.productsAll')
               
            
   
              </div>
          <!-- /.card -->
        </div>
      </div>


          <!-- The Modal -->
  <div class="modal fade" id="myModalLg">
    <div class="modal-dialog modal-lg w3-animate-zoom w3-round">
 
        <div id="modalLargeFeed">
        <div class="card card-widget">  
          <div class="card-body">
            
          

            <div  style="min-height: 300px;" class=""></div>
      
         

      </div>


       <div class="overlay modal-feed"><i class="fas fa-2x fa-sync-alt fa-spin w3-xxxlarge w3-text-blue"></i>
            </div>
          </div>

 
        
      </div>

    </div>
  </div>
 
  
  </section>
@endsection


@push('js')



<script>

  function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
     window.print();
     // document.body.innerHTML = originalContents;
   };

  $(document).ready(function(){
  $(document).on('click','.states-modal-lg', function(e){

      e.preventDefault();
      var that =  $( this ),
          url = that.attr( "data-url" );
          $("#myModalLg").modal({backdrop: false});

      // alert(url);
    $.ajax({
      url: url,
      type: "Get",
      cache: false,
      dataType: 'json',
      beforeSend: function()
      {
          // $(".loadingModalData").show();
          $(".modal-feed").show();
      },
      complete: function()
      {
          // $(".loadingModalData").hide();
          $(".modal-feed").hide();
      },
    }).done(function(data){

      $('#modalLargeFeed').empty().append(data.view);      
 
    }).fail(function(){});
  });
  });
</script>


@endpush

