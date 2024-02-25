@extends('admin.layouts.master')
@section('content')
<div class="container">
    <form method="POST" action="{{route('blogs.update',$blog)}}">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="slug" class="form-label">Title</label>
          <input type="text" class="form-control" id="title" value="{{$blog->title}}" name="title">
          @if ($errors->has('title'))
          <span class="text-danger">{{$errors->first('title')}}</span>
         @endif
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" value="{{$blog->slug}}" name="slug">
            @if ($errors->has('slug'))
            <span class="text-danger">{{$errors->first('slug')}}</span>
           @endif
          </div>
          <div class="mb-3">
            <label for="comments" class="form-label">Comments</label>
            @foreach ($blog->comments as $key => $comment)
            <textarea class="form-control" name="comments[]">{{ $comment->comments }}</textarea>
            @if ($errors->has('comments.' . $key))
                <span class="text-danger">{{ $errors->first('comments.' . $key) }}</span>
            @endif
        @endforeach
        
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
@endsection