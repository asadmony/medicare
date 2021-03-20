<div class="row">
    <div class="col-sm-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Request Call Back Messages</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-hover">
            <tbody>
              <tr>
                <th style="width: 20%">Name</th>
                <th>Message</th>
                <th style="width: 10%">Email</th>
                <th style="width: 10%">Mobile</th>
                <th style="width: 10%">Request By</th>
                <th style="width: 10%">Resume</th>
                <th style="width: 10%">Picture</th>
                <th style="width: 10%">Date</th>
                <th width="120" style="width:120px !important;">Status</th>
              </tr>
              @isset($allMessage)
                @foreach ($allMessage as $item)
                  <tr>
                    <td>{{ $item->name }}</td>
                    <td>{!! str_limit($item->description,50) !!}</td>
                    <td>{{ $item->email}}</td>
                    <td>{{ $item->mobile}}</td>
                    <td>{{ $item->profilemadeby}}</td>
                    @if ($item->img_url)
                    <td>
                      <a href="{{asset('storage/cv/'.$item->img_name)}}" download>CV</a>
                    </td>
                    @else
                    <td>Empty</td>
                    @endif

                    <td>
                      @if($item->picture_name)
                      <img width="50" src="{{ asset('storage/cv/'.$item->picture_name) }}" alt="">
                      @endif
                    </td>
                    

                    <td>{{ substr($item->created_at, 0, 10) }}</td>
                    <td width="120">
                        @if($item->completed == 0)
                        <a href="{{route('admin.seen',$item->id)}}" class="btn btn-xs btn-danger" style="margin-bottom: 2px;">Unseen</a>
                        @else
                        <a class="btn btn-xs btn-success" style="margin-bottom: 2px;">Seen</a>
                        @endif

                        <a class="btn btn-xs btn-danger" onclick="return confirm('Do you really want to delete this information?');" href="{{ route('admin.calldelete', $item->id) }}">Delete</a>
                    </td>
                  </tr>
                @endforeach
              @endisset
            </tbody>
          </table>
        </div>
        <div class="box-footer clearfix">
          {{ $allMessage->links() }}
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>