<div class="row">
	<div class="col-sm-8">
		@foreach($searchPosts as $post)
			@include('blog.includes.others.sidebarPost')
		@endforeach

		{{$searchPosts->render()}}
	</div>

	<div class="col-sm-4">
		@include('blog.includes.others.rightPopular')

    @include('blog.includes.others.rightLatest')

    @include('blog.includes.others.counterMap')
    
	</div>
</div>