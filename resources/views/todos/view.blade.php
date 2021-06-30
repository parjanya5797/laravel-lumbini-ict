@extends('admin-master')

@section('title')
    View Todos | Dashboard
@endsection
@section('content')
<div class="container mt-4">
    <div class="row">
        @foreach($allTodos as $todos)
        <div class="col-md-4">
            <div class="card @php echo $todos['is_completed']?'card-success':'card-danger' @endphp">
                <div class="card-header">
                  <h3 class="card-title">{{$todos['title']}}</h3>
                  <a href="{{route('todo.edit',$todos['id'])}}">
                    <button class="btn btn-sm btn-warning float-right ml-4"><span class="fa fa-edit"></span></button>
                  </a>
                  <button class="btn btn-sm btn-danger float-right"><span class="fa fa-trash"></span></button>
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
                            @if($todos['is_completed'])
                            <span class="fa fa-check text text-success">Is Completed</span>    
                            @else
                            <span class="fa  fa-times text text-danger">Not Completed</span>
                            @endif
                    </div>
                </div>

              </div>
        </div>
        @endforeach
    </div>
</div>
@endsection