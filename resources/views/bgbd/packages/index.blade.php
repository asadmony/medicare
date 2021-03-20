@extends('hasan.master')
@section('content')

<!-- search banner start -->
@include('hasan.subpage.banner-sm')
<!-- search banner end -->

  <div class="container mt-4">
    <div class="row margin-top-30">
      <div class="col-sm-12 m-b-100">
        
        <table class="table1 table-desktop">
          <thead>
            <tr>
              <th class="package-feature">Package Feature</th>
              @foreach ($packages as $key => $value)
                <th scope="col">{{ $value->package_name }}</th>
              @endforeach
            </tr>
          </thead>
          <tfoot>
            <tr>
              <td>Package Price</td>
              @foreach ($packages as $key => $value)
                <td>
                  @if ($value->package_price)
                    <p class="price">${{ $value->package_nrb_price }} / ৳{{ $value->package_price }}</p>
                  @else
                    <p class="price">---</p>
                  @endif

                  @if ($value->package_price && $value->discount > 0)
                    <div class="price-discount">
                      <span>${{ ($value->package_nrb_price * $value->discount)/100 }}</span> /
                      <span>৳{{ ($value->package_price * $value->discount)/100 }}
                      </span>
                      &nbsp;&nbsp;-{{ $value->discount }} %
                    </div>
                  @endif                  
                </td>
              @endforeach
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>
                @if($value->package_price)
                    @guest
                      <a href="{{ route('login') }}" type="button" class="btn package-upgrade">Upgrade Memebership</a>
                    @else
                      <a class="btn package-upgrade" href="{{ route('purchase.package') }}">Purchase Package</a>
                    @endguest
                  @endif
              </td>
              <td>
                @if($value->package_price)
                    @guest
                      <a href="{{ route('login') }}" type="button" class="btn package-upgrade">Upgrade Memebership</a>
                    @else
                      <a class="btn package-upgrade" href="{{ route('purchase.package') }}">Purchase Package</a>
                    @endguest
                  @endif
              </td>
              <td>
                @if($value->package_price)
                    @guest
                      <a href="{{ route('login') }}" type="button" class="btn package-upgrade">Upgrade Memebership</a>
                    @else
                      <a class="btn package-upgrade" href="{{ route('purchase.package') }}">Purchase Package</a>
                    @endguest
                  @endif
              </td>
            </tr> 
          </tfoot>
          <tbody>
            <tr>
              <th scope="row">Profile Active Days</th>
              @foreach ($packages as $key => $value)
                <td>{{ $value->package_active_days }} Days</td>
              @endforeach
            </tr>
            <tr>
              <th scope="row">Top in search</th>
              @foreach ($packages as $key => $value)
                <td>{!! ($value->top_in_search)?'<i class="fas fa-check"></i>':'<i class="fas fa-times"></i>' !!}</td>
              @endforeach
            </tr>
            <tr>
              <th scope="row">Post Photo</th>
              @foreach ($packages as $key => $value)
                <td>{{ $value->post_photo }}</td>
              @endforeach
            </tr>
            <tr>
              <th scope="row">Direct Contact Info</th>
              @foreach ($packages as $key => $value)
                <td>{!! ($value->direct_contact_information)?$value->direct_contact_information:'<i class="fas fa-times"></i>' !!}</td>
              @endforeach
            </tr>
            <tr>
              <th scope="row">Total Message Sent</th>
              @foreach ($packages as $key => $value)
                <td>{!! ($value->send_message)?$value->send_message:'<i class="fas fa-times"></i>' !!}</td>
              @endforeach
            </tr>
            <tr>
              <th scope="row">Daily Message Sent</th>
              @foreach ($packages as $key => $value)
                <td>{!! ($value->daily_message)?$value->daily_message:'<i class="fas fa-times"></i>' !!}</td>
              @endforeach
            </tr>
            <tr>
              <th scope="row">Total Interest Express</th>
              @foreach ($packages as $key => $value)
                <td>{!! ($value->total_interest_express)?$value->total_interest_express:'<i class="fas fa-times"></i>' !!}</td>
              @endforeach
            </tr>
            <tr>
              <th scope="row">Daily Interest Express</th>
              @foreach ($packages as $key => $value)
                <td>{!! ($value->daily_interest_express)?$value->daily_interest_express:'<i class="fas fa-times"></i>' !!}</td>
              @endforeach
            </tr>
            <tr>
              <th scope="row">Total Interest Approve</th>
              @foreach ($packages as $key => $value)
                <td>{!! ($value->total_interest_approve)?$value->total_interest_approve:'<i class="fas fa-times"></i>' !!}</td>
              @endforeach
            </tr>
            <tr>
              <th scope="row">Daily Interest Approve</th>
              @foreach ($packages as $key => $value)
                <td>{!! ($value->daily_interest_approve)?$value->daily_interest_approve:'<i class="fas fa-times"></i>' !!}</td>
              @endforeach
            </tr>
            <tr>
              <th scope="row">Add Favorite</th>
              @foreach ($packages as $key => $value)
                <td>{!! ($value->add_favorite)?$value->add_favorite:'<i class="fas fa-times"></i>' !!}</td>
              @endforeach
            </tr>
            <tr>
              <th scope="row">Block Profile</th>
              @foreach ($packages as $key => $value)
                <td>{!! ($value->block_profile)?'<i class="fas fa-check"></i>':'<i class="fas fa-times"></i>' !!}</td>
              @endforeach
            </tr>
            <tr>
              <th scope="row">Counselling</th>
              @foreach ($packages as $key => $value)
                <td>{!! ($value->counselling)?'<i class="fas fa-check"></i>':'<i class="fas fa-times"></i>' !!}</td>
              @endforeach
            </tr>
            <tr>
              <th scope="row">Privacy Settings</th>
              @foreach ($packages as $key => $value)
                <td>{!! ($value->privacy_settings)?'<i class="fas fa-check"></i>':'<i class="fas fa-times"></i>' !!}</td>
              @endforeach
            </tr>
          </tbody>
        </table>

      </div>

      <table class="table1 table-mobile">
        <thead>
          <tr>
            <th class="package-feature">Package Feature</th>
            @foreach ($packages as $key => $value)
              <th scope="col">{{ $value->package_name }}</th>
              @break;
            @endforeach
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th scope="row">Package Price</th>
            @foreach ($packages as $key => $value)
              <td>
                @if ($value->package_price)
                  <p class="price">${{ $value->package_nrb_price }} / ৳{{ $value->package_price }}</p>
                @else
                  <p class="price">---</p>
                @endif

                @if ($value->package_price && $value->discount > 0)
                  <div class="price-discount">
                    <span>${{ ($value->package_nrb_price * $value->discount)/100 }}</span> /
                    <span>৳{{ ($value->package_price * $value->discount)/100 }}
                    </span>
                    &nbsp;&nbsp;-{{ $value->discount }} %
                  </div>
                @endif

                @if($value->package_price)
                  @guest
                    <a href="{{ route('login') }}" type="button" class="btn btn-primary">Upgrade Memebership</a>
                  @else
                    <a class="btn btn-primary" href="{{ route('purchase.package') }}">Purchase Package</a>
                  @endguest
                @endif
              </td>
              @break;
            @endforeach
          </tr>
        </tfoot>
        <tbody>
          <tr>
            <th scope="row">Profile Active Days</th>
            @foreach ($packages as $key => $value)
              <td>{{ $value->package_active_days }} Days</td>
              @break;
            @endforeach
          </tr>
          <tr>
            <th scope="row">Top in search</th>
            @foreach ($packages as $key => $value)
              <td>{!! ($value->top_in_search)?'<i class="fas fa-check"></i>':'<i class="fas fa-times"></i>' !!}</td>
              @break;
            @endforeach
          </tr>
          <tr>
            <th scope="row">Post Photo</th>
            @foreach ($packages as $key => $value)
              <td>{{ $value->post_photo }}</td>
              @break;
            @endforeach
          </tr>
          <tr>
            <th scope="row">Direct Contact Info</th>
            @foreach ($packages as $key => $value)
              <td>{!! ($value->direct_contact_information)?$value->direct_contact_information:'<i class="fas fa-times"></i>' !!}</td>
              @break;
            @endforeach
          </tr>
          <tr>
            <th scope="row">Total Message Sent</th>
            @foreach ($packages as $key => $value)
              <td>{!! ($value->send_message)?$value->send_message:'<i class="fas fa-times"></i>' !!}</td>
              @break;
            @endforeach
          </tr>
          <tr>
            <th scope="row">Daily Message Sent</th>
            @foreach ($packages as $key => $value)
              <td>{!! ($value->daily_message)?$value->daily_message:'<i class="fas fa-times"></i>' !!}</td>
              @break;
            @endforeach
          </tr>
          <tr>
            <th scope="row">Total Interest Express</th>
            @foreach ($packages as $key => $value)
              <td>{!! ($value->total_interest_express)?$value->total_interest_express:'<i class="fas fa-times"></i>' !!}</td>
              @break;
            @endforeach
          </tr>
          <tr>
            <th scope="row">Daily Interest Express</th>
            @foreach ($packages as $key => $value)
              <td>{!! ($value->daily_interest_express)?$value->daily_interest_express:'<i class="fas fa-times"></i>' !!}</td>
              @break;
            @endforeach
          </tr>
          <tr>
            <th scope="row">Total Interest Approve</th>
            @foreach ($packages as $key => $value)
              <td>{!! ($value->total_interest_approve)?$value->total_interest_approve:'<i class="fas fa-times"></i>' !!}</td>
              @break;
            @endforeach
          </tr>
          <tr>
            <th scope="row">Daily Interest Approve</th>
            @foreach ($packages as $key => $value)
              <td>{!! ($value->daily_interest_approve)?$value->daily_interest_approve:'<i class="fas fa-times"></i>' !!}</td>
              @break;
            @endforeach
          </tr>
          <tr>
            <th scope="row">Add Favorite</th>
            @foreach ($packages as $key => $value)
              <td>{!! ($value->add_favorite)?$value->add_favorite:'<i class="fas fa-times"></i>' !!}</td>
              @break;
            @endforeach
          </tr>
          <tr>
            <th scope="row">Block Profile</th>
            @foreach ($packages as $key => $value)
              <td>{!! ($value->block_profile)?'<i class="fas fa-check"></i>':'<i class="fas fa-times"></i>' !!}</td>
              @break;
            @endforeach
          </tr>
          <tr>
            <th scope="row">Counselling</th>
            @foreach ($packages as $key => $value)
              <td>{!! ($value->counselling)?'<i class="fas fa-check"></i>':'<i class="fas fa-times"></i>' !!}</td>
              @break;
            @endforeach
          </tr>
          <tr>
            <th scope="row">Privacy Settings</th>
            @foreach ($packages as $key => $value)
              <td>{!! ($value->privacy_settings)?'<i class="fas fa-check"></i>':'<i class="fas fa-times"></i>' !!}</td>
              @break;
            @endforeach
          </tr>
        </tbody>
      </table>


      <table class="table1 table-mobile">
        <thead>
          <tr>
            <th class="package-feature">Package Feature</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 1)
                <th scope="col">{{ $value->package_name }}</th>
                @break;
              @endif
            @endforeach
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th scope="row">Package Price</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 1)
                <td>
                  @if ($value->package_price)
                    <p class="price">${{ $value->package_nrb_price }} / ৳{{ $value->package_price }}</p>
                  @else
                    <p class="price">---</p>
                  @endif

                  @if ($value->package_price && $value->discount > 0)
                    <div class="price-discount">
                      <span>${{ ($value->package_nrb_price * $value->discount)/100 }}</span> /
                      <span>৳{{ ($value->package_price * $value->discount)/100 }}
                      </span>
                      &nbsp;&nbsp;-{{ $value->discount }} %
                    </div>
                  @endif

                  @if($value->package_price)
                    @guest
                      <a href="{{ route('login') }}" type="button" class="btn btn-primary">Upgrade Memebership</a>
                    @else
                      <a class="btn btn-primary" href="{{ route('purchase.package') }}">Purchase Package</a>
                    @endguest
                  @endif
                </td>
                @break;
              @endif
            @endforeach
          </tr>
        </tfoot>
        <tbody>
          <tr>
            <th scope="row">Profile Active Days</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 1)
                <td>{{ $value->package_active_days }} Days</td>
                @break;
              @endif
            @endforeach
          </tr>
          <tr>
            <th scope="row">Top in search</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 1)
                <td>{!! ($value->top_in_search)?'<i class="fas fa-check"></i>':'<i class="fas fa-times"></i>' !!}</td>
                @break;
              @endif
            @endforeach
          </tr>
          <tr>
            <th scope="row">Post Photo</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 1)
                <td>{{ $value->post_photo }}</td>
                @break;
              @endif
            @endforeach
          </tr>
          <tr>
            <th scope="row">Direct Contact Info</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 1)
                <td>{!! ($value->direct_contact_information)?$value->direct_contact_information:'<i class="fas fa-times"></i>' !!}</td>
                @break;
              @endif
            @endforeach
          </tr>
          <tr>
            <th scope="row">Total Message Sent</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 1)
                <td>{!! ($value->send_message)?$value->send_message:'<i class="fas fa-times"></i>' !!}</td>
                @break;
              @endif
            @endforeach
          </tr>
          <tr>
            <th scope="row">Daily Message Sent</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 1)
                <td>{!! ($value->daily_message)?$value->daily_message:'<i class="fas fa-times"></i>' !!}</td>
                @break;
              @endif
            @endforeach
          </tr>
          <tr>
            <th scope="row">Total Interest Express</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 1)
                <td>{!! ($value->total_interest_express)?$value->total_interest_express:'<i class="fas fa-times"></i>' !!}</td>
                @break;
              @endif
            @endforeach
          </tr>
          <tr>
            <th scope="row">Daily Interest Express</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 1)
                <td>{!! ($value->daily_interest_express)?$value->daily_interest_express:'<i class="fas fa-times"></i>' !!}</td>
                @break;
              @endif
            @endforeach
          </tr>
          <tr>
            <th scope="row">Total Interest Approve</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 1)
                <td>{!! ($value->total_interest_approve)?$value->total_interest_approve:'<i class="fas fa-times"></i>' !!}</td>
                @break;
              @endif
            @endforeach
          </tr>
          <tr>
            <th scope="row">Daily Interest Approve</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 1)
                <td>{!! ($value->daily_interest_approve)?$value->daily_interest_approve:'<i class="fas fa-times"></i>' !!}</td>
                @break;
              @endif
            @endforeach
          </tr>
          <tr>
            <th scope="row">Add Favorite</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 1)
                <td>{!! ($value->add_favorite)?$value->add_favorite:'<i class="fas fa-times"></i>' !!}</td>
                @break;
              @endif
            @endforeach
          </tr>
          <tr>
            <th scope="row">Block Profile</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 1)
                <td>{!! ($value->block_profile)?'<i class="fas fa-check"></i>':'<i class="fas fa-times"></i>' !!}</td>
                @break;
              @endif
            @endforeach
          </tr>
          <tr>
            <th scope="row">Counselling</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 1)
                <td>{!! ($value->counselling)?'<i class="fas fa-check"></i>':'<i class="fas fa-times"></i>' !!}</td>
                @break;
              @endif
            @endforeach
          </tr>
          <tr>
            <th scope="row">Privacy Settings</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 1)
                <td>{!! ($value->privacy_settings)?'<i class="fas fa-check"></i>':'<i class="fas fa-times"></i>' !!}</td>
                @break;
              @endif
            @endforeach
          </tr>
        </tbody>
      </table>

      <table class="table1 table-mobile">
        <thead>
          <tr>
            <th class="package-feature">Package Feature</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 2)
                <th scope="col">{{ $value->package_name }}</th>
                @break;
              @endif
            @endforeach
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th scope="row">Package Price</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 2)
                <td>
                  @if ($value->package_price)
                    <p class="price">${{ $value->package_nrb_price }} / ৳{{ $value->package_price }}</p>
                  @else
                    <p class="price">---</p>
                  @endif

                  @if ($value->package_price && $value->discount > 0)
                    <div class="price-discount">
                      <span>${{ ($value->package_nrb_price * $value->discount)/100 }}</span> /
                      <span>৳{{ ($value->package_price * $value->discount)/100 }}
                      </span>
                      &nbsp;&nbsp;-{{ $value->discount }} %
                    </div>
                  @endif

                  @if($value->package_price)
                    @guest
                      <a href="{{ route('login') }}" type="button" class="btn btn-primary">Upgrade Memebership</a>
                    @else
                      <a class="btn btn-primary" href="{{ route('purchase.package') }}">Purchase Package</a>
                    @endguest
                  @endif
                </td>
                @break;
              @endif
            @endforeach
          </tr>
        </tfoot>
        <tbody>
          <tr>
            <th scope="row">Profile Active Days</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 2)
                <td>{{ $value->package_active_days }} Days</td>
                @break;
              @endif
            @endforeach
          </tr>
          <tr>
            <th scope="row">Top in search</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 2)
                <td>{!! ($value->top_in_search)?'<i class="fas fa-check"></i>':'<i class="fas fa-times"></i>' !!}</td>
                @break;
              @endif
            @endforeach
          </tr>
          <tr>
            <th scope="row">Post Photo</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 2)
                <td>{{ $value->post_photo }}</td>
                @break;
              @endif
            @endforeach
          </tr>
          <tr>
            <th scope="row">Direct Contact Info</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 2)
                <td>{!! ($value->direct_contact_information)?$value->direct_contact_information:'<i class="fas fa-times"></i>' !!}</td>
                @break;
              @endif
            @endforeach
          </tr>
          <tr>
            <th scope="row">Total Message Sent</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 2)
                <td>{!! ($value->send_message)?$value->send_message:'<i class="fas fa-times"></i>' !!}</td>
                @break;
              @endif
            @endforeach
          </tr>
          <tr>
            <th scope="row">Daily Message Sent</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 2)
                <td>{!! ($value->daily_message)?$value->daily_message:'<i class="fas fa-times"></i>' !!}</td>
                @break;
              @endif
            @endforeach
          </tr>
          <tr>
            <th scope="row">Total Interest Express</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 2)
                <td>{!! ($value->total_interest_express)?$value->total_interest_express:'<i class="fas fa-times"></i>' !!}</td>
                @break;
              @endif
            @endforeach
          </tr>
          <tr>
            <th scope="row">Daily Interest Express</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 2)
                <td>{!! ($value->daily_interest_express)?$value->daily_interest_express:'<i class="fas fa-times"></i>' !!}</td>
                @break;
              @endif
            @endforeach
          </tr>
          <tr>
            <th scope="row">Total Interest Approve</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 2)
                <td>{!! ($value->total_interest_approve)?$value->total_interest_approve:'<i class="fas fa-times"></i>' !!}</td>
                @break;
              @endif
            @endforeach
          </tr>
          <tr>
            <th scope="row">Daily Interest Approve</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 2)
                <td>{!! ($value->daily_interest_approve)?$value->daily_interest_approve:'<i class="fas fa-times"></i>' !!}</td>
                @break;
              @endif
            @endforeach
          </tr>
          <tr>
            <th scope="row">Add Favorite</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 2)
                <td>{!! ($value->add_favorite)?$value->add_favorite:'<i class="fas fa-times"></i>' !!}</td>
                @break;
              @endif
            @endforeach
          </tr>
          <tr>
            <th scope="row">Block Profile</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 2)
                <td>{!! ($value->block_profile)?'<i class="fas fa-check"></i>':'<i class="fas fa-times"></i>' !!}</td>
                @break;
              @endif
            @endforeach
          </tr>
          <tr>
            <th scope="row">Counselling</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 2)
                <td>{!! ($value->counselling)?'<i class="fas fa-check"></i>':'<i class="fas fa-times"></i>' !!}</td>
                @break;
              @endif
            @endforeach
          </tr>
          <tr>
            <th scope="row">Privacy Settings</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 2)
                <td>{!! ($value->privacy_settings)?'<i class="fas fa-check"></i>':'<i class="fas fa-times"></i>' !!}</td>
                @break;
              @endif
            @endforeach
          </tr>
        </tbody>
      </table>

      <table class="table1 table-mobile">
        <thead>
          <tr>
            <th class="package-feature">Package Feature</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 3)
                <th scope="col">{{ $value->package_name }}</th>
                @break;
              @endif
            @endforeach
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th scope="row">Package Price</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 3)
                <td>
                  @if ($value->package_price)
                    <p class="price">${{ $value->package_nrb_price }} / ৳{{ $value->package_price }}</p>
                  @else
                    <p class="price">---</p>
                  @endif

                  @if ($value->package_price && $value->discount > 0)
                    <div class="price-discount">
                      <span>${{ ($value->package_nrb_price * $value->discount)/100 }}</span> /
                      <span>৳{{ ($value->package_price * $value->discount)/100 }}
                      </span>
                      &nbsp;&nbsp;-{{ $value->discount }} %
                    </div>
                  @endif

                  @if($value->package_price)
                    @guest
                      <a href="{{ route('login') }}" type="button" class="btn btn-primary">Upgrade Memebership</a>
                    @else
                      <a class="btn btn-primary" href="{{ route('purchase.package') }}">Purchase Package</a>
                    @endguest
                  @endif
                </td>
                @break;
              @endif
            @endforeach
          </tr>
        </tfoot>
        <tbody>
          <tr>
            <th scope="row">Profile Active Days</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 3)
                <td>{{ $value->package_active_days }} Days</td>
                @break;
              @endif
            @endforeach
          </tr>
          <tr>
            <th scope="row">Top in search</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 3)
                <td>{!! ($value->top_in_search)?'<i class="fas fa-check"></i>':'<i class="fas fa-times"></i>' !!}</td>
                @break;
              @endif
            @endforeach
          </tr>
          <tr>
            <th scope="row">Post Photo</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 3)
                <td>{{ $value->post_photo }}</td>
                @break;
              @endif
            @endforeach
          </tr>
          <tr>
            <th scope="row">Direct Contact Info</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 3)
                <td>{!! ($value->direct_contact_information)?$value->direct_contact_information:'<i class="fas fa-times"></i>' !!}</td>
                @break;
              @endif
            @endforeach
          </tr>
          <tr>
            <th scope="row">Total Message Sent</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 3)
                <td>{!! ($value->send_message)?$value->send_message:'<i class="fas fa-times"></i>' !!}</td>
                @break;
              @endif
            @endforeach
          </tr>
          <tr>
            <th scope="row">Daily Message Sent</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 3)
                <td>{!! ($value->daily_message)?$value->daily_message:'<i class="fas fa-times"></i>' !!}</td>
                @break;
              @endif
            @endforeach
          </tr>
          <tr>
            <th scope="row">Total Interest Express</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 3)
                <td>{!! ($value->total_interest_express)?$value->total_interest_express:'<i class="fas fa-times"></i>' !!}</td>
                @break;
              @endif
            @endforeach
          </tr>
          <tr>
            <th scope="row">Daily Interest Express</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 3)
                <td>{!! ($value->daily_interest_express)?$value->daily_interest_express:'<i class="fas fa-times"></i>' !!}</td>
                @break;
              @endif
            @endforeach
          </tr>
          <tr>
            <th scope="row">Total Interest Approve</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 3)
                <td>{!! ($value->total_interest_approve)?$value->total_interest_approve:'<i class="fas fa-times"></i>' !!}</td>
                @break;
              @endif
            @endforeach
          </tr>
          <tr>
            <th scope="row">Daily Interest Approve</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 3)
                <td>{!! ($value->daily_interest_approve)?$value->daily_interest_approve:'<i class="fas fa-times"></i>' !!}</td>
                @break;
              @endif
            @endforeach
          </tr>
          <tr>
            <th scope="row">Add Favorite</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 3)
                <td>{!! ($value->add_favorite)?$value->add_favorite:'<i class="fas fa-times"></i>' !!}</td>
                @break;
              @endif
            @endforeach
          </tr>
          <tr>
            <th scope="row">Block Profile</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 3)
                <td>{!! ($value->block_profile)?'<i class="fas fa-check"></i>':'<i class="fas fa-times"></i>' !!}</td>
                @break;
              @endif
            @endforeach
          </tr>
          <tr>
            <th scope="row">Counselling</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 3)
                <td>{!! ($value->counselling)?'<i class="fas fa-check"></i>':'<i class="fas fa-times"></i>' !!}</td>
                @break;
              @endif
            @endforeach
          </tr>
          <tr>
            <th scope="row">Privacy Settings</th>
            @php
            $i=0;
            @endphp
            @foreach ($packages as $key => $value)
              @if ($i++ == 3)
                <td>{!! ($value->privacy_settings)?'<i class="fas fa-check"></i>':'<i class="fas fa-times"></i>' !!}</td>
                @break;
              @endif
            @endforeach
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>

@foreach ($packages as $key => $value)
  <div class="modal fade" id="modal-id-{{ $value->id }}" style="display: none;">
    <form action="{{ route('users.upgradePackage') }}" method="POST" role="form">
      {{ csrf_field() }}
      <input type="hidden" name="package_name" value="Elite">
      <input type="hidden" name="package_id" value="29">
      <input type="hidden" name="package_price" value="5000">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">
              Buy {{ $value->package_name }} Memebrship
              Package
            </h5>
            <button type="button" class="close text-danger" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body">
            <div class="form-group row">
              <label for="input-id" class="col-sm-4">Payment
                Method</label>
                <div class="col-sm-8">
                  <select required="" name="paymentment" id="inputpaymentment" class="form-control">
                    <option value="">Select Payment
                      Method</option>
                      <option value="1">Bkash</option>
                      <option value="2">DBBL Rocket</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="input-id" class="col-sm-4">Transaction
                    ID</label>
                    <div class="col-sm-8">
                      <input required="" placeholder="Add transection id of your Bkash/Rocket" type="text" name="transcationid" id="transcationid" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="input-id" class="col-sm-4">Mobile
                      / Account
                      Number </label>
                      <div class="col-sm-8">
                        <input required="" placeholder="Add Bkash/Rocket Mobile No/Account No" type="text" name="mobnum" id="mobnum" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-block btn-primary">Confirm
                      Your Purchase Now.</button>
                    </div>
                  </div>


                </div>
              </form>
            </div>
          @endforeach
        @endsection
