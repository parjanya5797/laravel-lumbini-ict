@extends('admin-master')

@section('title')
    Edit Blog |Dashboard
@endsection

@section('content')

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Edit Blog</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    {{-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}
                    <form action="{{route('blog.update',$data['id'])}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Title</label>
                          <input type="text" name="title" class="form-control" placeholder="Enter Title" value="{{$data['title']}}">
                          @error('title')
                              <div class="text text-danger"><small>{{$message}}</small></div>
                          @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Summary</label>
                            <textarea type="text" name="summary" class="form-control" >{{$data['summary']}}</textarea>
                            @error('summary')
                            <div class="text text-danger"><small>{{$message}}</small></div>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <textarea type="text" name="description" id="summernote" class="form-control" >{!!$data['description']!!}</textarea>
                            @error('summary')
                            <div class="text text-danger"><small>{{$message}}</small></div>
                            @enderror
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">Image</label>
                            <input type="file" name="image" class="form-control">
                            @error('summary')
                            <div class="text text-danger"><small>{{$message}}</small></div>
                            @enderror
                          </div>
                      
                        <div class="form-check">
                          <input type="checkbox" name="show" class="form-check-input" @php echo $data['show']?'checked':'' @endphp>
                          <label class="form-check-label">Show</label>

                          @error('status')
                              <div class="text text-danger"><small>{{$message}}</small></div>
                          @enderror
                        </div>
                      </div>
                      <!-- /.card-body -->
      
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                  </div>
            </div>

        </div>
    </div>
@endsection