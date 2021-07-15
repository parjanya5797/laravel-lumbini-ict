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
    @if(Session::has('blog-deleted'))
      <div class="alert alert-danger">
        {{Session::get('blog-deleted')}}
      </div>
    @endif

    <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>S.N.</th>
          <th>Title</th>
          <th>Total Comments</th>
          <th>Author</th>
          <th>Show</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($blog as $key=>$post)
            <tr>
            <td>{{request()->has('page') && request()->page != 1?(request()->page - 1) * $blog->perpage() + $loop->iteration :$key +1 }}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->getCommentCount()}}</td>
            <td>{{$post->getAuthor()->name}}</td>
            <td>
                <span class="badge @php echo $post->show?'badge-success':'badge-danger' @endphp">{{$post->show?'Show':'Hide'}}</span>
            </td>
            <td>
                <a href="{{route('blog.show',$post->id)}}"><span class="badge badge-primary">View</span></a>
                @if($post['user_id'] == Auth::user()->id)
                <a href="{{route('blog.edit',$post->id)}}"><span class="badge badge-warning">Edit</span></a>
                <a href="{{route('blog.delete',$post['id'])}}" onclick="return confirm('Are you sure')"><span class="badge badge-danger">Delete</span></a>
                @endif
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
      
      <div class="links">
        {{$blog->links()}}
    </div>
</div>

@endsection