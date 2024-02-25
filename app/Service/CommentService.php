<?php

namespace App\Service;

use App\Models\Comment;

class CommentService{
    // Add
    public function addService($model,$comments=[]){
        if(!empty($comments)){
            $commentArr=[];
            foreach ($comments as $key => $comment) {
                $commentModel=new Comment();
                $commentModel->model_type=$model;
                $commentModel->model_id=$model->id;
                $commentModel->comments=$comment;
                $commentArr[]=$commentModel;
            }
            $model->comments()->saveMany($commentArr);
        }
        return;
    }
    // delete
    public function deleteComments($comments){
       foreach ($comments as $key => $comment) {
        $comment->delete();
       }
    }

    // update
    public function updateComment($model,$comments){
       $this->deleteComments($model->comments);
       $this->addService($model,$comments);
    }

   
}