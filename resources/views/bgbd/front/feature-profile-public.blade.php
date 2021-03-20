@extends('bgbd.master')
@section('content')

<!-- search banner start -->
@include('bgbd.subpage.banner-sm')
<!-- search banner end -->

<!-- new arival start  -->
<section>
    <div class="container">
        <div class="row m-b-100">
            <div class="col-sm-12 new-arrival py-5 pl-sm-0">
                <a href="">Feature Profile</a>
            </div>
            <div class="col-sm-12">
                <div class="row">
                   @foreach($users as $user)
                   <div class="col-lg col-sm-6 col-md-4 pl-sm-0 ml-sm-0 pr-2">
                    <div class="card border-0">
                        <div class="card-image">
                            {{-- @if(isset(Auth::user()->id) && Auth::user()->premium && $item->picid != '' &&
                            file_exists("profiles/pics/{$item->id}/{$item->picext}")) --}}
                            <img src="{{asset($user->latestCheckedPP())}}" class="image card-img-top" alt="{{$user->username}}" />
                            
                            <div class="middle">
                                <div class="text">
                                    <a href="#"><i class="fas fa-thumbs-up"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-phone-alt"></i></a>
                                    <a href="#"><i class="fas fa-envelope"></i></a>
                                    <a href="#"><i class="fas fa-heart"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body w3-center arrival-card pl-0 ml-0">
                          {{-- <a href="{{ \App\Common::getUserUrl($item->id) }}"
                            ($item->created_at->format('ymd').$item->id)
                              class="py-0 my-0 profile-title">{{ $name }}</a> --}}
                          <p class="py-0 my-0"><strong>ID: BG-{{($user->created_at->format('ymd').$user->username)}}</strong></p>

                          <p class="card-text arrival-text p-0 m-0 pb-2">
                              {{$user->age()}} yrs <strong> | </strong>
                              {{$user->height}} <strong> |
                              </strong> {{$user->religion}} <strong> | </strong>
                              {{str_limit($user->education_level, 18)}}</p>
                          {{-- <a href="{{ \App\Common::getUserUrl($item->id) }}" class="btn btn-block p-2 m-0 text-bold w3-button w3-red w3-hover-red">View
                              Profile</a> --}}
                              <a href="{{route('welcome.featureDetails',$user)}}" class="btn btn-block p-2 m-0 text-bold w3-button w3-red w3-hover-red">View
                                Profile</a>
                      </div>
                    </div>
                </div>
                    @endforeach
                </div>
            </div>
            <!-- end card -->


        </div>
        <div class="row">
            <div class="col-sm">
                {{ $users->render() }}
            </div>
        </div>
    </div>
</section>
<!-- new arrival end -->

@include('bgbd.subpage.public-js')

@endsection