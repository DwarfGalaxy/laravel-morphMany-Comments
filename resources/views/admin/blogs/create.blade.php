@extends('admin.layouts.master')
@section('content')
<div class="container">
    <form method="POST" action="{{route('blogs.store')}}">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" id="title" value="{{old('title')}}" name="title">
          @if ($errors->has('title'))
          <span class="text-danger">{{$errors->first('title')}}</span>
         @endif
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" value="{{old('slug')}}" name="slug">
            @if ($errors->has('slug'))
            <span class="text-danger">{{$errors->first('slug')}}</span>
           @endif
          </div>
          {{-- multiple comments --}}
          <div class="mb-3">
            <label for="comments" class="form-label">Comments</label>
            <textarea class="form-control" id="comments1" name="comments[]">{{ old('comments.0') }}</textarea>
              @if ($errors->has('comments.0'))
                  <span class="text-danger">{{ $errors->first('comments.0') }}</span>
              @endif
            <textarea class="form-control" id="comments2" name="comments[]">{{ old('comments.1') }}</textarea>
            @if ($errors->has('comments.1'))
                <span class="text-danger">{{ $errors->first('comments.1') }}</span>
            @endif
          </div>
          {{-- multiple images --}}
          {{-- <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" name="image[]"  multiple>
            @if ($errors->has('image'))
                <span class="text-danger">{{$errors->first('image')}}</span>
            @endif
          </div> --}}
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
@endsection