<div class="card card-widget mb-1">
	<div class="card-body">
		SL: <b>{{ $loop->iteration }}</b>, &nbsp;
		Part Title: <b> {{ $item->title }}</b>, &nbsp; 
		 
		Active: <b>{{ $page->active ? 'Yes' : 'No' }}</b>,
		 

 
		<div class="float-right">
		<a class="btn-primary btn btn-xs " href="{{ route('admin.pageItemEdit', $item) }}">Edit</a>
		&nbsp; 
 
		<a class="btn-danger btn btn-xs " onclick="return confirm('Do you really want to delete?');" href="{{ route('admin.pageItemDelete', $item) }}">Delete</a>
		</div>
	</div>
</div>