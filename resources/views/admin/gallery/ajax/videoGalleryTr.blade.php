<td>

	{{-- <iframe width="200" height="100" src="https://www.youtube.com/watch?v=p0ORl-WzqaE" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe> --}}


	<iframe width="300" height="200" src="{{asset($gallery->video_url)}}?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

</td>
<td>
	<b>ID:</b> {{$gallery->id}} <br> 
	<b>Status:</b> {{$gallery->publish_status}}
</td>
<td>
	<b>Title:</b> {{$gallery->title}}
</td>
<td>
	<b>Description:</b> {{$gallery->description}}
</td>

<td>


	<div class="btn-group btn-group-xs pull-right ">
		<a class="btn btn-primary"  href="{{route('admin.videoGalleryEdit',$gallery)}}">Edit</a>
		<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
			<span class="caret"></span>
		</button>
		<ul class="dropdown-menu" role="menu">

			<li><a  target="_blank" href="{{route('welcome.videoGallery',$gallery)}}">Details</a></li>

			<li><a href="{{route('admin.videoGalleryDelete',$gallery)}}" onclick="return confirm('Do you really want to delete this gallery?');">Delete</a></li>
		</ul>                  
	</div>

</td>