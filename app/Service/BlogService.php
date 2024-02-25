<?php


namespace App\Service;

use App\Http\Controllers\Admin\BlogController;
use App\Models\Blog;

// morphMany
class BlogService{
    private $commentService;
    public function __construct() {
        $this->commentService =new CommentService();
    }
    // POST
    public function addService($data){
        $blog=Blog::create([
            'title'=>$data['title'],
            'slug'=>$data['slug']
        ]);
        $this->commentService->addService($blog,$data['comments']);
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
    public function updateService($data,$blog){
       $blog->update([
        'title'=>$data['title'],
        'slug'=>$data['slug']
       ]);
       if(!empty($data['comments'])){
        $this->commentService->updateComment($blog,$data['comments']);
       }
    }
}