@extends('bgbd.master')

@section('content')
@include('bgbd.subpage.banner-sm')
@include('bgbd.subpage.topmenubar')

<div class="container m-b-150 m-t-50">
  <div class="row">
    @include('bgbd.subpage.leftmenu')
    <div class="col-sm-9">
        <h4>{{ $title }}</h4>

        <div class="row">
          <div class="col-sm-12">
            <table class="table msg-table">
              <thead>
                <tr>
                   <th>Invoice Number</th>
                  <th>Package/Service Name</th>
                  <th>Amount</th>
                  <th>Date</th>
                  <th>Method</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($results as $item)
                  <tr>
                  <td>BD-{{ $item->id }}</td>
                    <td>{{ $item->pname }}{{ $item->sname }}</td>
                    <td>{{ $item->package_price }}{{ ($item->currency==1)?"BDT":"USD" }}</td>
                    <td>{{ substr($item->purchase_date, 0, 10) }}</td>
                    <td>{{ paymentMethods($item->paymentmethid) }}</td>
                    <td>
                      @if ($item->status == 1)
                        <span class="badge badge-success"> Approved </span>
                      @elseif ($item->status == 0)
                        <span class="badge badge-warning"> Pending </span>
                      @elseif ($item->status == 2)
                        <span class="badge badge-danger"> Rejected </span>
                      @endif
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>



  <script type="text/javascript">
  $(document).ready(function() {
    $(".msg-delete").click(function(event) {
      if (!confirm("Do you want to delete")){
        return false;
      }

      $(this).parent().hide();
      var formData = {
        "_token": $("meta[name='csrf-token']").attr("content"),
        "sid": $(this).attr("id")
      };

      $.ajax({
        url: "{{ route('delete_inbox') }}",
        type: 'post',
        data: formData,
        success: function(response){
          $("#invalid_alert_msg").text(response);
          $('#invalid_alert').modal('toggle');
        }
      });
      event.preventDefault();
      return false;
    });
    $(".cursor_pointer").click(function(event) {
      window.location = $(this).attr("links");
    });
  });
  </script>

  <!-- The Modal -->
  <div class="modal fade" id="invalid_alert">
    <div class="modal-dialog" style="top: 30%">
      <div class="modal-content">
        <div class="modal-body">
          <i class="fas fa-exclamation-triangle fa-2x"></i>
          <p id="invalid_alert_msg" align="center"></p>
          <br />
        </div>
      </div>
    </div>
  </div>

@endsection
