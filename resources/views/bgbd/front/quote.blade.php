@extends('bgbd.master')

@section('content')
@include('bgbd.subpage.banner-sm')
@include('bgbd.subpage.topmenubar')
<div class="container m-b-150 m-t-50">
  <div class="row">
    @include('bgbd.subpage.leftmenu')
    <div class="col-sm-9">
        <h4>{{ $title }}</h4>
        <hr />

        <table class="table table-striped">
          <tr>
            <td width="20%">Package Validate:</td>
            <td>{{ $result->deadline }}</td>
          </tr>
          <tr>
            <td width="20%">Post Photo:</td>
            <td>{{ $result->post_photo }}</td>
          </tr>
          <tr>
            <td width="20%">Direct Contact Info:</td>
            <td>{{ $result->direct_contact_information }}</td>
          </tr>
          <tr>
            <td width="20%">Send Message:</td>
            <td>{{ $result->send_message }}</td>
          </tr>
          <tr>
            <td width="20%">Daily Message:</td>
            <td>{{ $result->daily_message }}</td>
          </tr>
          <tr>
            <td width="20%">Total Interest Express:</td>
            <td>{{ $result->total_interest_express }}</td>
          </tr>
          <tr>
            <td width="20%">Daily Interest Express:</td>
            <td>{{ $result->daily_interest_express }}</td>
          </tr>
          <tr>
            <td width="20%">Interest Approve:</td>
            <td>{{ $result->interest_approve }}</td>
          </tr>
          <tr>
            <td width="20%">Total Interest Express:</td>
            <td>{{ $result->total_interest_approve }}</td>
          </tr>
          <tr>
            <td width="20%">Daily Interest Express:</td>
            <td>{{ $result->daily_interest_approve }}</td>
          </tr>
          <tr>
            <td width="20%">Send Profle:</td>
            <td>{{ $result->send_profile }}</td>
          </tr>
          <tr>
            <td width="20%">Add Favorite:</td>
            <td>{{ $result->add_favorite }}</td>
          </tr>
          <tr>
            <td width="20%">Most Favorite:</td>
            <td>{{ $result->most_favorite }}</td>
          </tr>
          <tr>
            <td width="20%">Block Profile:</td>
            <td>{{ $result->block_profile }}</td>
          </tr>
          <tr>
            <td width="20%">Counselling:</td>
            <td>{{ ($result->counselling)?"Yes":"No" }}</td>
          </tr>
        </table>
      </div>
    </div>
  </div>


@endsection
