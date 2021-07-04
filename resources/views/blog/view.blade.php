@extends('admin-master')

@section('content')
<div class="container mt-4">

    <a href="{{route('blog.create')}}"><button class="btn btn-primary">Add Blog</button></a>

    @if(Session::has('blog-saved'))
      <div class="alert alert-success">
        {{Session::get('blog-saved')}}
      </div>
    @endif
    @if(Session::has('blog-edited'))
      <div class="alert alert-warning">
        {{Session::get('blog-edited')}}
      </div>
    @endif
    @if(Session::has('todo_deleted'))
      <div class="alert alert-danger">
        {{Session::get('todo_deleted')}}
      </div>
    @endif

    <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>S.N.</th>
          <th>Title</th>
          <th>Show</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($blog as $post)
            <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$post->title}}</td>
            <td>
                <span class="badge @php echo $post->show?'badge-success':'badge-danger' @endphp">{{$post->show?'Show':'Hide'}}</span>
            </td>
            <td>
                <a href="{{route('blog.show',$post['id'])}}"><span class="badge badge-primary">View</span></a>
                <a href="{{route('blog.edit',$post['id'])}}"><span class="badge badge-warning">Edit</span></a>
                <a href="{{route('blog.delete',$post['id'])}}" onclick="return confirm('Are you sure')"><span class="badge badge-danger">Delete</span></a>
            </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>S.N.</th>
            <th>Title</th>
            <th>Show</th>
            <th>Actions</th>
        </tr>
        </tfoot>
      </table>
</div>

@endsection