{{-- top of details 1 ad --}}
@include('blog.includes.adv.topOfDetails1')

{{-- <img class="img-responsive" style="margin-top: 10px;" src="{{asset('img/bivag.jpg')}}"> --}}
<div class="panel panel-default">

    <div style="background-color: ;" class="panel-body">

@if($divPosts->count())
  @foreach($divPosts->chunk(2) as $p2)
  <div class="row">
    @foreach($p2 as $post)
      <div class="col-sm-6">

<a title="{{$post->title}}" href="{{route('welcome.postDetailsWithTitle',['post'=>$post,'title'=>new_slug($post->title)])}}">
  <div class="user-block" style="margin-bottom: 3px;">
    <img src="{{ route('imagecache', [ 'template'=>'sbixs','filename' => $post->fiName() ]) }}" alt="{{$post->title}}">
    <span class="username"><a title="{{$post->title}}" href="{{route('welcome.postDetailsWithTitle',['post'=>$post,'title'=>new_slug($post->title)])}}">&nbsp; {{str_limit($post->title,20,'..')}}</a></span>
    <span class="description">{{$post->div()}}, {{$post->created_at->diffForHumans()}}

      
      {{-- @include('blog.includes.others.readCommentCount') --}}
      {{-- @include('blog.includes.others.fbLikePart') --}}

      

    </span>
  </div>
</a>

    </div>
    @endforeach
  </div>
  @endforeach

  @endif
      

</div>
</div>

