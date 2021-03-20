    <div class="panel panel-default">
      <div class="panel-body text-center">
        <form class="form-inline" method="get" action="{{route('welcome.postDivisionSearch')}}">

    <div class="form-group form-group-lg">
      <label class="sr-only" for="email">Division:</label>
      <select class="form-control div-select" data-url="{{route('welcome.divSelected')}}" name="div" style="border-radius: 4px;" required>

            <option value="{{$div->id}}">{{$div->name}}</option>
            @foreach($divs as $division)
            @if($div->id == $division->id)
              @continue
            @endif
            <option value="{{$division->id}}">{{$division->name}}</option>                       
            @endforeach      
          </select>
    </div>

    <div class="form-group form-group-lg">
      <label class="sr-only" for="pwd">District:</label>
      <select class="form-control dist-select" data-url="{{route('welcome.distSelected')}}" name="district" style="border-radius: 4px;">

            @if($dist)
            <option value="">District</option>
            <option value="{{$dist->id}}" selected>{{$dist->name}}</option>
            @else
            <option value="">District</option>
            @endif


            @foreach($div->districts as $district)
            @if($dist)
            @if($district->id == $dist->id)
              @continue
            @endif
            @endif
              <option value="{{$district->id}}">{{$district->name}}</option>
            @endforeach 

          </select>
    </div>


    <div class="form-group form-group-lg">
      <label class="sr-only" for="pwd">District:</label>
      <select class="form-control thana-select" name="thana" style="border-radius: 4px;">

            @if($thana)
            <option value="">Thana</option>
            <option value="{{$thana->id}}" selected>{{$thana->name}}</option>
            @else
            <option value="">Thana</option>
            @endif


            @if($dist)
            @foreach($dist->thanas as $th)
            @if($thana)
            @if($thana->id == $th->id)
              @continue
            @endif
            @endif
              <option value="{{$th->id}}">{{$th->name}}</option>
            @endforeach
            @endif

          </select>
    </div>
    <div class="form-group form-group-lg">
      <label class="sr-only" for="pwd"></label>
      <button type="submit" class="btn w3-red btn-lg">Search</button>
    </div>
</form>
      </div>
    </div>
<br>