@extends('admin-master')

@section('title')
    Add Todo |Dashboard
@endsection

@section('content')

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Add Todo</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{route('todo.store')}}" method="POST">
                      @csrf
                      <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Title</label>
                          <input type="text" name="title" class="form-control" placeholder="Enter Title" value="{{old('title')}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Summary</label>
                            <textarea type="text" name="summary" class="form-control" >{{old('summary')}}</textarea>
                          </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Start Date</label>
                          <input type="date" class="form-control" id="exampleInputPassword1" name="start_date" value="{{old('start_date')}}">
                        </div>
                        <div class="form-check">
                          <input type="checkbox" name="is_completed" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label"  for="exampleCheck1">Completed</label>
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