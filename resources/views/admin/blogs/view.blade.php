<p>{{$blog->id}}</p>
<p>{{$blog->title}}</p>
<p>{{$blog->slug}}</p>
@foreach ($blog->comments as $comment)
    <p>{{$comment->comments}}</p>
@endforeach