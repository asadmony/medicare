@extends('subrole.layouts.subRoleMaster')

@push('css')

<style>
   tr.nowrap td {
        white-space:nowrap;
    }
</style>
@endpush

@section('content')
  <section class="content">
    <br>
    
    <br>
    <iframe class="w3-card w3-round" width="100%" height="450" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q={{ $product->lat }},{{  $product->lng  }}&amp;output=embed"></iframe><br />

    <script src="http://maps.google.com/maps/api/js?sensor=false" 
            type="text/javascript">
    </script>

    {{-- <script type="text/javascript">
        var locations = [
        ['Bondi Beach', -33.890542, 151.274856, 4],
        ['Coogee Beach', -33.923036, 151.259052, 5],
        ['Cronulla Beach', -34.028249, 151.157507, 3],
        ['Manly Beach', -33.80010128657071, 151.28747820854187, 2],
        ['Maroubra Beach', -33.950198, 151.259302, 1]
        ];

        var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: new google.maps.LatLng(-33.92, 151.25),
        mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var infowindow = new google.maps.InfoWindow();

        var marker, i;

        for (i = 0; i < locations.length; i++) {  
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map
        });

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
            infowindow.setContent(locations[i][0]);
            infowindow.open(map, marker);
            }
        })(marker, i));
        }
    </script>  --}}
  
  </section>
@endsection


@push('js')



@endpush

