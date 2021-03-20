@extends('hasan.master')
@section('content')

<!-- search banner start -->
@include('hasan.subpage.banner-sm')
<!-- search banner end -->
<div class="container">
  <div class="row margin-top-30 m-t-50 m-b-150">
    <div class="col-sm-5">
      <table class="table table-bordered">
        <thead>
          <th>Services</th>
          <th width="200">Fees</th>
        </thead>
        <tbody>
          @foreach ($packages as $key => $value)
          @if ($value->package_price)
          <input type="hidden" id="title-{{ $value->id }}" value="{{ $value->package_name }}">
          <input type="hidden" id="price-{{ $value->id }}" value="{{ $value->package_price }}">
          <input type="hidden" id="price-nrb-{{ $value->id }}" value="{{ $value->package_nrb_price }}">
          <input type="hidden" id="discount-{{ $value->id }}" value="{{ $value->discount }}">

          <tr>
            <td>{{ $value->package_name }}</td>
            <td>
              ${{ $value->package_nrb_price }} /
              ৳{{ $value->package_price }}
              <i class="fas fa-plus-circle package-plus" id="package-{{ $value->id }}"></i>
            </td>
          </tr>
          @endif
          @endforeach

          @foreach ($services as $key => $value)
          <input type="hidden" id="ser-title-{{ $value->id }}" value="{{ $value->title }}">
          <input type="hidden" id="ser-price-{{ $value->id }}" value="{{ $value->price }}">
          <input type="hidden" id="ser-price-nrb-{{ $value->id }}" value="{{ $value->nrb_price }}">
          <input type="hidden" id="ser-discount-{{ $value->id }}" value="{{ $value->discount }}">
          <tr>
            <td>{{ $value->title }}</td>
            <td>
              ${{ $value->nrb_price }} /
              ৳{{ $value->price }}
              <i class="fas fa-plus-circle service-plus" id="services-{{ $value->id }}"></i>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="col-sm-7">
      <form class="" action="{{ route('purchase_confirm') }}" method="post">
        @csrf
        <table class="table table-bordered">
          <thead>
            <th width="40"></th>
            <th width="250">Services</th>
            <th width="200">Fees</th>
            <th>Discount</th>
            <th width="170">Amount</th>
          </thead>
          <tbody>
            <tr class="checkout-package" id="checkout-package"></tr>
            @foreach ($services as $key => $value)
            <tr class="checkout-service" id="checkout-service-{{ $value->id }}"></tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <td colspan="4" align="right"><b>Total Amount</b></td>
              <td id="total"></td>
            </tr>
          </tfoot>
        </table>

        <div class="form-group row">
          <label for="input-id" class="col-sm-4">Currency</label>
          <div class="col-sm-8">
            <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg"
              uk-form-custom="target: > * > span:first-child">
              <select required="" name="currency" id="inputpaymentment" class="uk-input">
                <option value="">Select Currency</option>
                <option value="1">BDT</option>
                <option value="2">USD</option>
              </select>
              <button class="uk-button birth_day_btn uk-button-default px-0 mx-0 " type="button" tabindex="-1">
                <span>
                  Relativeship
                </span>
                <span class="uk-icon" uk-icon="icon: chevron-down"><svg width="20" height="20" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg" data-svg="chevron-down">
                    <polyline fill="none" stroke="#000" stroke-width="1.03" points="16 7 10 13 4 7"></polyline>
                  </svg></span>
              </button>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="input-id" class="col-sm-4">Payment Method</label>
          <div class="col-sm-8">
            <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg"
              uk-form-custom="target: > * > span:first-child">
              <select required="" name="paymentment" id="inputpaymentment" class="uk-input">
                <option value="">Select Payment
                  Method</option>
                <option value="1">Bkash</option>
                <option value="2">DBBL Rocket</option>
              </select>
              <button class="uk-button birth_day_btn uk-button-default px-0 mx-0 " type="button" tabindex="-1">
                <span>
                  Relativeship
                </span>
                <span class="uk-icon" uk-icon="icon: chevron-down"><svg width="20" height="20" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg" data-svg="chevron-down">
                    <polyline fill="none" stroke="#000" stroke-width="1.03" points="16 7 10 13 4 7"></polyline>
                  </svg></span>
              </button>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="input-id" class="col-sm-4">Transaction ID</label>
          <div class="col-sm-8">
            <input required="" placeholder="Add transection id of your Bkash/Rocket" type="text" name="transcationid"
              id="transcationid" class="uk-input">
          </div>
        </div>
        <div class="form-group row">
          <label for="input-id" class="col-sm-4">Mobile/Account Number </label>
          <div class="col-sm-8">
            <input required="" placeholder="Add Bkash/Rocket Mobile No/Account No" type="text" name="mobnum" id="mobnum"
              class="uk-input">
          </div>
        </div>

        <div class="form-group row">
          <div class="col-sm-3 ml-auto">
            <button type="submit" id="pay_now" class="uk-button uk-button-block create_acc">
              Pay Now
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
      var package_total = 0;
      var package_total_nrb = 0;
      var service_total = 0;
      var service_total_nrb = 0;

      $("body").on('click', '.package-plus', function(event) {
        event.preventDefault();
        var ids = $(this).attr('id');
        ids = parseInt(ids.substr(8));
        $("#checkout-package").show();

        html = "";
        html += "<input type='hidden' name='package-id' id='package-id' value='"+ids+"' />";

        html += "<td><i class='fas fa-minus-circle package-minus'></i></td>";
        html += "<td>" + $("#title-" + ids).val() + "</td>";
        html += "<td>$" + $("#price-nrb-" + ids).val() + " / ৳" + $("#price-" + ids).val() + "</td>";
        html += "<td>" + Number($("#discount-" + ids).val()) +"%</td>";
        html += "<td>$";
        html += Number($("#price-nrb-" + ids).val()) - (Number($("#price-nrb-" + ids).val()) * Number($("#discount-" + ids).val()))/100;
        html += " / ৳";
        html +=  Number($("#price-" + ids).val()) - (Number($("#price-" + ids).val()) * Number($("#discount-" + ids).val()))/100;
        html += "</td>";

        package_total_nrb = Number($("#price-nrb-" + ids).val()) - (Number($("#price-nrb-" + ids).val()) * Number($("#discount-" + ids).val()))/100;
        package_total =  Number($("#price-" + ids).val()) - (Number($("#price-" + ids).val()) * Number($("#discount-" + ids).val()))/100;

        $("#total").html("<b>$" + (package_total_nrb + service_total_nrb) + " / ৳" + (package_total + service_total)+"</b>");

        $("#checkout-package").html(html);
      });

      /* ############################################## */
      $("body").on('click', '.service-plus', function(event) {
        event.preventDefault();
        var ids = $(this).attr('id');
        ids = parseInt(ids.substr(9));
        if ($('#service-id-' + ids).length == 0){
          $("#checkout-service-" + ids).show();
          html = "";
          html += "<input type='hidden' name='service-id-"+ids+"' id='service-id-"+ids+"' value='"+ids+"' />";
          html += "<td><i class='fas fa-minus-circle service-minus'></i></td>";
          html += "<td>" + $("#ser-title-" + ids).val() + "</td>";
          html += "<td>$" + $("#ser-price-nrb-" + ids).val() + " / ৳" + $("#ser-price-" + ids).val() + "</td>";
          html += "<td>" + Number($("#ser-discount-" + ids).val()) +"%</td>";
          html += "<td>$";
          html += Number($("#ser-price-nrb-" + ids).val()) - (Number($("#ser-price-nrb-" + ids).val()) * Number($("#ser-discount-" + ids).val()))/100;
          html += " / ৳";
          html +=  Number($("#ser-price-" + ids).val()) - (Number($("#ser-price-" + ids).val()) * Number($("#ser-discount-" + ids).val()))/100;
          html += "</td>";

          service_total_nrb += Number($("#ser-price-nrb-" + ids).val()) - (Number($("#ser-price-nrb-" + ids).val()) * Number($("#ser-discount-" + ids).val()))/100;
          service_total += Number($("#ser-price-" + ids).val()) - (Number($("#ser-price-" + ids).val()) * Number($("#ser-discount-" + ids).val()))/100;
          $("#total").html("<b>$" + (package_total_nrb + service_total_nrb) + " / ৳" + (package_total + service_total)+"</b>");

          $("#checkout-service-" + ids).html(html);
        }
      });

      $("body").on('click', '.package-minus, .service-minus', function(event) {
        event.preventDefault();
        if($(this).parent().parent().attr("id") == "checkout-package"){
          $("#total").html("<b>$" + service_total_nrb + " / ৳" + service_total +"</b>");
          $(this).parent().parent().hide();
        }
        else{
          ids = $(this).parent().parent().attr("id");
          ids = parseInt(ids.substr(17));
          service_total_nrb -= Number($("#ser-price-nrb-" + ids).val()) - (Number($("#ser-price-nrb-" + ids).val()) * Number($("#ser-discount-" + ids).val()))/100;
          service_total -= Number($("#ser-price-" + ids).val()) - (Number($("#ser-price-" + ids).val()) * Number($("#ser-discount-" + ids).val()))/100;
          $("#total").html("<b>$" + (package_total_nrb + service_total_nrb) + " / ৳" + (package_total + service_total)+"</b>");
          $(this).parent().parent().html("");
          $(this).parent().parent().hide();
        }
      });
      $("body").on('click', '#pay_now', function(event) {
        if((package_total + service_total) <= 0){
          alert("You need to choose at least one service");
          event.preventDefault();
        }
      });
    });
</script>
@endsection