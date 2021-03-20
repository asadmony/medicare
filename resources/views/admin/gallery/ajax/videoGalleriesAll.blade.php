<div class="box-body table-responsive no-padding">
  <table class="table table-hover">
  	<thead>
    	<tr>
        <th width="120">Video</th>
        <th width="200">ID</th>
        <th width="300">Title</th>
        <th >Description</th>
        <th >Action</th>
      </tr>
  	</thead>
  	<tbody>
  	@foreach($galleries as $gallery)
  		<tr class="gallery-tr-{{$gallery->id}}">
        @include('admin.gallery.ajax.videoGalleryTr')
      </tr>
  @endforeach             		
  	</tbody>
    
    
  </table>
</div>
<!-- /.box-body -->
<div class="box-footer">
	<div class="pull-right">
		{{$galleries->links()}}            		
	</div>
</div>