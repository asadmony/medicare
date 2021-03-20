<div class="container">
  <div class="row">
    <div class="col-md-3">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Conversations</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <ul class="nav nav-pills flex-column">
            @isset($conversations)
              @foreach ($conversations as $conv)
              @php
                  if ($conv->userTo->id != auth()->user()->id){
                    $to = $conv->userTo;
                  }
                  else {
                    $to = $conv->userFrom;
                  }
              @endphp
              {{-- @if () --}}
              <li class="nav-item">
                @if (isset($subrole))
                <a href="{{ route('subrole.message', [$subrole, $to]) }}" class="nav-link @if(isset($messageTo) && $messageTo->id == $to->id) active @endif "> 
                  <i class="fa fa-envelope-open"></i> 
                  {{ $to->email }}
                  {{-- <span class="badge bg-primary float-right">12</span> --}}
                </a>
                @elseif(isset($admin))
                <a href="{{ route('subrole.message', [$admin, $to]) }}" class="nav-link @if(isset($messageTo) && $messageTo->id == $to->id) active @endif "> 
                  <i class="fa fa-envelope-open"></i> 
                  {{ $to->email }}
                  {{-- <span class="badge bg-primary float-right">12</span> --}}
                @else
                <a href="{{ route('read.message', $to) }}" class="nav-link @if(isset($messageTo) && $messageTo->id == $to->id) active @endif ">
                  <i class="fa fa-envelope-open"></i> 
                  {{ $to->email }}
                  {{-- <span class="badge bg-primary float-right">12</span> --}}
                </a>
                @endif
              </li>
              {{-- @endif --}}
              @endforeach
            @endisset
          </ul>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
    <div class="col-lg-6 col-md-8">
      @if(isset($messageTo))
      <div class="card p-2">
        <div class="card-header border">
          <i class="fas fa-user fa-md"></i> {{ $messageTo->email }}
          @if (isset($subrole))
          <a class="btn m-0 py-0 border w3-hover-shadow float-right" href="{{ route('subrole.message', [$subrole, $messageTo]) }}">
            <i class="fas fa-sync"></i>
          </a>
          @else
          <a class="btn m-0 py-0 border w3-hover-shadow float-right" href="{{ route('read.message', $messageTo) }}">
            <i class="fas fa-sync"></i>
          </a>
          @endif
        </div>
        @isset($messageTo)
        <div class="card-body">
          <div class="">
            <form action="{{ route('send.message', $messageTo) }}" method="post">
              @csrf
              @if (isset($subrole))
              <input type="hidden" name="role_from" value="{{ $role_from }}">
              @else
              <input type="hidden" name="role_form" value="">
              @endif

              <div class="input-group mb-3">
                <input type="text" class="form-control" name="message" placeholder="Type your message" aria-label="Type your message" >
                <div class="input-group-append">
                  <button type="submit" class="input-group-text w3-purple"> <i class="fa fa-paper-plane" aria-hidden="true"></i> &nbsp; Send</button>
                </div>
              </div>
            </form>
          </div>
          <hr>
          @isset($conversation)
          <div class="">
            @foreach ($conversation as $message)    
            @include('message.conversationBody')
            @endforeach
          </div>
          <div class="row">
            {{ $conversation->links() }}
          </div>
          @endisset
        </div>
        @endisset
      </div>
      @endif 
    </div>
  </div>
</div>