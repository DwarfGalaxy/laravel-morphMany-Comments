@extends('admin.layouts.master')
@section('content')
<div class="container">
    <a href="{{route('blogs.create')}}" class="btn btn-success">Add Blog</a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Comment1</th>
            <th scope="col">Comment2</th>
            <th scope="col">Action</th>

          </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
            <tr>
                <td>{{$blog->id}}</td>
                <td>{{$blog->title}}</td>
                <td>{{$blog->slug}}</td>
                @foreach ($blog->comments as $comment)
                    <td>{{$comment->comments}}</td>
                @endforeach
                <td>
                    <form action="{{route('blogs.destroy',$blog)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <a href="{{route('blogs.edit',$blog)}}" class="btn btn-warning">Edit</a>
                    <a href="{{route('blogs.show',$blog)}}" class="btn btn-primary">View</a>
                </td>
              </tr>
            @endforeach
         
        </tbody>
      </table>
</div>
@endsection