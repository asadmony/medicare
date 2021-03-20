<form class="form-inline" method="get" action="{{route('welcome.postDivisionSearch')}}">

  <div class="box box-widget">
    <div class="box-header with-border">
      <h3 class="box-title"><i class="fa fa-map-marker"></i> Division Posts</h3>
    </div>
    <div class="box-body">

      <div class="form-group">

    <div class="row">
        <div class="col-sm-6">
          <select class="form-control div-select" data-url="{{route('welcome.divSelected')}}" name="div" style="width: 140px;border-radius: 4px;" required>
            <option value="">Division</option>
            @foreach($divs as $div)
            <option value="{{$div->id}}">{{$div->name}}</option>
            @endforeach
            
            

          </select>
        </div>
        <div class="col-sm-6">
          <select class="form-control dist-select" data-url="{{route('welcome.distSelected')}}" name="district" style="width: 100%;border-radius: 4px;">
            <option value="">District</option>

          </select>
          
        </div>
    </div>
    <br>
    <div class="row">
      <div class="col-sm-6">
        <select class="form-control thana-select" name="thana" style="width: 140px;border-radius: 4px;">
            <option value="">Thana</option>
          </select>
      </div>
      <div class="col-sm-6">
        <button class="btn btn-md w3-{{$blogParameter->main_color}} w3-round" style="width: 100%;">Search</button>
      </div>
    </div>
  </div>
      
    </div>
  </div>
  
</form>