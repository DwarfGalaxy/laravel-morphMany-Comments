<?php


namespace App\Service;

use App\Models\Blog;

// morphMany
class BlogService{
    private $commentService;
    public function __construct() {
        $this->commentService =new CommentService();
    }
    // POST
    public function addService($request){
        $blog=Blog::create([
            'title'=>$request['title'],
            'slug'=>$request['slug']
        ]);
        $this->commentService->addService($blog,$request['comments']);
    }
    // GET all
    public function fetchBlogs(){
       $blogs=Blog::with('comments')->get();
       return $blogs;
    }
    // delete
    public function delete($blog){
        $this->commentService->deleteComments($blog->comments);
         $blog->delete();
    }

    // get single
    function view($blog){
       $blog = $blog->load('comments');
      return $blog;
    }
    // UPDATE
    public function updateService($request,$blog){
       $blog->update([
        'title'=>$request['title'],
        'slug'=>$request['slug']
       ]);
       if(!empty($request['comments'])){
        $this->commentService->updateComment($blog,$request['comments']);
       }
    }
}