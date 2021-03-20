@extends('admin.layouts.adminMaster')

@section('content')
    <br>
    <section class="content"> 
        <div class="row">
            <div class="col-md-12">      
            @include('alerts')      
                <div class="card card-primary">
                    <div class="card-header with-border">
                        <h3 class="card-title">
                            <i class="fa fa-plus"></i>
                            Add Topic
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="card card-widget mb-0">
                            <div class="card-body w3-gray">
                                <div class="card card-widget mb-0">
                                    <div class="card-body">
                                        <form action="{{route('admin.addNewTopicPost',$course)}}" class="form-inline" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="title">Title: </label>
                                                <input type="text" class="form-control" placeholder="Topic Title" id="title" name="title">
                                            </div>
                                            <div class="form-group pl-3">
                                                <label for="file_name">Upload: </label>
                                                <input type="file" class="form-control" id="file_name" name="file_name">
                                            </div>
                                            <div class="form-group mt-2 mr-3">
                                                <label for="description">Description: </label>
                                                <input type="text" class="form-control" placeholder="Description" id="description" name="description">
                                            </div>
                                            <div class="checkbox pl-1 pr-2">
                                                <label><input type="checkbox" checked name="active"> Active</label>
                                              </div>
                                            
                                            <button type="submit" class="btn  btn-primary  w3-right float-right">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="card card-widget">
                    <div class="card-header with-border">
                        <h3 class="card-title">
                            <i class="fa fa-th"></i>
                            All Topics</h3>
                    </div>
                    @if($courseTopics->count() > 0)
                    <div class="card-body">
                        <table class="table table-bordered table-condensed">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>File</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                        <?php $i = (($courseTopics->currentPage() - 1) * $courseTopics->perPage() + 1); ?>
                        @foreach ($courseTopics as $topic)  

                                <tr>
                                    <td>
                                        {{$i}}
                                    </td>
                                    <td>
                                        {{$topic->title}}
                                    </td>
                                    <td>
                                        {{$topic->description}}
                                    </td>
                                    @if($topic->file_name)
                                    <td>
                                        <a href="{{asset('storage/topic/'.$topic->file_name)}}" download><i class="fa fa-download" aria-hidden="true"></i> File</a>
                                        
                                    </td>
                                    @else 
                                    <td>

                                    </td>
                                    @endif
                                    <td>
                                        <a href="" class="btn btn-primary btn-sm">Edit</a>
                                    </td>
                                </tr> 
                                <?php $i++; ?>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    @else 
                    <h3 class="w3-center w3-text-red">No Topics Yet</h3>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection