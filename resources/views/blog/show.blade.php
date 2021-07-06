@extends('admin-master')

@section('title')
View Blog Detail
@endsection

@section('content')
<div class="container">
    @if(Session::has('comment-added'))
    <div class="alert alert-success">{{Session::get('comment-added')}}</div>
    @endif
    <div>
        <span class="badge @php echo $blog->show?'badge-success':'badge-danger' @endphp">{{$blog->show?'Show':'Hide'}}</span>
    </div>
    <div class="row">
        <div class="col-md-12">
            <img src="{{url('public/images/'.$blog['image'])}}" alt="" style="height: 500px;width: auto;">
        </div>
        <div class="text text-center">
            <h3>{{$blog['title']}}</h3>
        </div>
        <div class="col-md-6">
            <h5> <strong>Summary:</strong></h5>
            {{$blog['summary']}}
        </div>
        <div class="col-md-6">
            <h5> <strong>Description:</strong></h5>
            {!!$blog['description']!!}
        </div>





        

    </div>

    
    <hr>
    <h2 class="text text-center">Comments({{$blog->getCommentCount()}})</h2>
    <div class="row">
        @foreach($blog->getComments() as $c)
        <div class="col-md-12" style="border:dashed; margin-bottom:4px">
            {{$loop->iteration}})
            <p>{{$c['message']}}</p>   
            <div class="badge badge-primary">
                {{-- 10 July 2021  --}}
                {{$c->dateFormat()}}
            </div>
        </div> 
        @endforeach
        
    </div>

    <h3>Add Comment</h3>
    <form action="{{route('comments.store')}}" method="POST">
        @csrf
        <textarea name="message" id="" cols="100%" rows="10">{{old('message')}}</textarea>
        <input type="hidden" name="blog_id" value="{{$blog['id']}}">
        @error('message')
        <div class="text text-danger"><small>{{$message}}</small></div>
        @enderror
        <hr>
        <button type="submit" class="btn btn-success">Add Comment</button>
    </form>

</div>
@endsection