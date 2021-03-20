@extends('company.layouts.companyMaster')

@push('css')
@endpush

@section('content')
  <section class="content">
    <br>
    <div class="row">
      <div class="col-sm-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">
              Filtered Data
            </h3>
          </div>
        </div>
      </div>

        <div class="col-md-12">
            <form action="{{route('company.alarmSearch', $company)}}">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-3">
                                <label for=""> From Date:</label>
                                <input type="date" name="from" id="" class="form-control datetimepicker-input" placeholder="From">
                            </div>

                            <div class="col-md-3">
                                <label for=""> To Date:</label>
                                <input type="date" name="to" id="" class="form-control datetimepicker-input" placeholder="To">
                            </div>
                            <div class="col-md-3 col-sm-3 ">
                                <div class="form-group">
                                <label>Select MacId/SiteId</label>
                                <div class="select2-purple">
                                <select class="select2-another" multiple="multiple" name="macids[]" id="search" data-placeholder="Select Device" style="width: 100%;">
                                    @foreach($company->products as $product)
                                        <option>{{$product->macid}}</option>
                                    @endforeach
                                </select>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-2 ">
                              <div class="form-group">
                                <label>Per Page</label>
                                <input type="text" name="pages" value="20"  class="form-control datetimepicker-input" placeholder="Data Per Page">
                              </div>
                            </div>
                            <div class="col-md-1 mt-4">
                                <div class="form-group mt-1">
                                <button class="btn btn-primary" type="submit">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- /.card-body -->
                </div>
            </form>
        </div>


      <div class="col-sm-12">
        <div class="card">
          <div class="card-body w3-center">
            <h3>Search Data</h3>
          </div>
        </div>
      </div>
    </div>



  </section>
@endsection


@push('js')
<!-- Select2 -->
<script src="{{asset('cp/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- moment -->
<script src="{{asset('cp/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('cp/plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>

<!-- date-range-picker -->
<script src="{{asset('cp/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

<script>
  $( document ).ready(function() {
    $('#all-checked').click(function(event) {
      if(this.checked) {
          // Iterate each checkbox
          $(':checkbox').each(function() {
              this.checked = true;
          });
      }
      else {
        $(':checkbox').each(function() {
              this.checked = false;
          });
      }
    });
  });

    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()
    })



    $(function () {
      //Initialize Select2 Elements
      $('.select2-another').select2();
    })

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()

    // $('#datepicker').datepicker({
    //         uiLibrary: 'bootstrap4'
    //     });

    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )
  //   if($('#all-checked').is(':checked')) {
  //     $('#checkboxPrimary3').prop('checked', true);
  //  }

  </script>

@endpush

