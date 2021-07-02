@extends('admin-master')

@section('title')
    View Todos | Dashboard
@endsection
@section('content')
<div class="container mt-4">
    @if(Session::has('todo_created'))
      <div class="alert alert-success">
        {{Session::get('todo_created')}}
      </div>
    @endif
    @if(Session::has('todo_edited'))
      <div class="alert alert-warning">
        {{Session::get('todo_edited')}}
      </div>
    @endif
    @if(Session::has('todo_deleted'))
      <div class="alert alert-danger">
        {{Session::get('todo_deleted')}}
      </div>
    @endif
    <div class="row">
        @foreach($allTodos as $todos)
        <div class="col-md-4">
            <div class="card @php echo $todos['is_completed']?'card-success':'card-danger' @endphp">
                <div class="card-header">
                  <h3 class="card-title">{{$todos['title']}}</h3>
                  <a href="{{route('todo.edit',$todos['id'])}}">
                    <button class="btn btn-sm btn-warning float-right ml-4"><span class="fa fa-edit"></span></button>
                  </a>
                  <a href="{{route('todo.delete',$todos['id'])}}" onclick="return confirm('Are you Sure?')">
                    <button class="btn btn-sm btn-danger float-right"><span class="fa fa-trash"></span></button>
                  </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="">
                            @if($todos['summary'] != NULL)
                            <p>{{$todos['summary']}}</p>
                            @else
                                <p class="text text-danger">Summary Not Added</p>   
                            @endif
                            <span class="fa fa-calendar"> {{$todos['start_date']}}</span>
                            <span class="fa @php echo $todos['is_completed']?'fa-check text text-success':'fa-times text text-danger' @endphp">Is Completed</span>    
                    </div>
                </div>

              </div>
        </div>
        @endforeach
    </div>
</div>
@endsection