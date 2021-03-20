<div class="box box-widget">
  <div class="box-body" style="padding: 0;">

  @foreach($latestPosts as $post)

  @include('blog.includes.others.sidebarPost')

   @if ($loop->iteration == 7)
        @break
    @endif

  @endforeach

  </div>
    </div>