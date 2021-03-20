
@foreach ( $allmembers as $user)
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box 
        w3-blue
      ">
        <div class="inner">
          <h3></h3>
          <p>{{ $user->email }}</p>
          <p>
            Name: {{ $user->name }}
          </p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="{{ route('admin.userDetails',  $user) }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
@endforeach