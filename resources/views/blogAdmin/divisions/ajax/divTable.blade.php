 <tbody>
	<tr>
		<td style="width: 50px;">{{$div->id}}</td>
		<td >{{$div->name}}</td>
		<td style="width: 150px;"> <a class="btn btn-xs btn-warning btn-cat-edit" href="{{route('admin.divisionEdit',$div)}}">Edit</a> 
		
		<div class="btn-group btn-group-xs pull-right">
 
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fa fa-trash"></i>
            </button>
            <ul class="dropdown-menu" role="menu">
 

              <li class="w3-padding"><a class="w3-btn w3-red w3-small w3-round w3-hover-red btn-cat-delete" href="{{route('admin.divisionDelete',$div)}}" data-url="">Confirm</a></li>
            </ul>
          </div>

		</td>
	</tr>
</tbody>