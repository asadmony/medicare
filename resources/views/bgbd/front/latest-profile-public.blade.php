@extends('bgbd.master')
@section('content')

<!-- search banner start -->
@include('bgbd.subpage.banner-sm')
<!-- search banner end -->

<!-- new arival start  -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 new-arrival py-5 pl-sm-0">
                <a href="{{ route('latest_profile') }}">NEW ARRIVAL</a>
            </div>
            <div class="col-sm-12">
                <div class="row">
                    @php $i = 0; @endphp
                    @foreach ($latestProfiles as $item)
                    @php
                    if ($item->settings_name == 1){
                    $name = trim($item->first_name) ." ". trim($item->last_name);
                    }
                    elseif ($item->settings_name == 2){
                    $name = trim($item->first_name);
                    }
                    else{
                    $name = trim($item->last_name);
                    }
                    @endphp
                    <div class="col-lg-3 col-sm-6 col-md-4 pl-sm-0 ml-sm-0 pr-2">
                        <div class="card border-0">
                            <div class="card-image">
                                @if(isset(Auth::user()->id) && Auth::user()->premium && $item->picid != '' &&
                                file_exists("profiles/pics/{$item->id}/{$item->picext}"))
                                <img src="{{ url('profiles/pics/' . $item->id ) . '/' . $item->picext  }}"
                                    class="image card-img-top" alt="{{ $name }}" />
                                @elseif(!$item->private && $item->picid != '' &&
                                file_exists("profiles/pics/{$item->id}/{$item->picext}"))
                                <img src="{{ url('profiles/pics/' . $item->id ) . '/' . $item->picext  }}"
                                    class="image card-img-top" alt="{{ $name }}" />
                                @else
                                @if ($item->gender == 1)
                                <img src="{{ url('assets/defaults/male.png') }}" class="image card-img-top"
                                    alt="{{ $name }}" />
                                @else
                                <img src="{{ url('assets/defaults/female.png') }}" class="image card-img-top"
                                    alt="{{ $name }}" />
                                @endif
                                @endif
                                <div class="middle">
                                    <div class="text">
                                        <a href="#" class="activity"><i
                                                class="fas fa-thumbs-up add-like inactive"></i></a>
                                        <a href="#" class="activity"><i
                                                class="fas fa-star add-interest inactive"></i></a>
                                        <a href="#" class="activity"><i
                                                class="fas fa-phone-alt add-contact inactive"></i></a>
                                        <a href="#" class="activity"><i
                                                class="fas fa-envelope send-message inactive"></i></a>
                                        <a href="#" class="activity"><i
                                                class="fas fa-heart add-favourite inactive"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body arrival-card pl-0 ml-0">
                                {{-- <a href="{{ \App\Common::getUserUrl($item->id) }}"
                                    class="py-0 my-0 profile-title">{{ $name }}</a> --}}
                                <p class="py-0 my-0"><strong>ID: BG-{{ $item->created_at->format('ymd').$item->id }}</strong></p>

                                <p class="card-text arrival-text p-0 m-0 mb-2">
                                    {{ \App\Common::getAge($item->date_of_birth) }} yrs <strong> | </strong>
                                    {{ height($item->height) }} <strong> |
                                    </strong> {{ religion($item->religion) }} <strong> | </strong>
                                    {{ $item->education_level ?? ' - ' }}</p>
                                <a href="{{ \App\Common::getUserUrl($item->id) }}" class="btn btn-block p-2 m-0 text-bold w3-button w3-red w3-hover-red">View
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
                {{ $latestProfiles->links() }}
            </div>
        </div>
    </div>
</section>
<!-- new arrival end -->

@include('bgbd.subpage.public-js')

@endsection