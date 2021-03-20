<div class="box box-widget">
  <div class="box-body" style="padding: 0;">
    <div style="margin-bottom: 12px;" class="w3-bar w3-{{$blogParameter->main_color}}">
      <button class="w3-bar-item w3-button" onclick="opentab2('Tokyo2')">Most Visited</button>
  </div>

  @foreach($popularPosts as $post)

@include('blog.includes.others.sidebarPost')

  @endforeach


  </div>
    </div>