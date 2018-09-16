<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Comment;
use App\Http\Resources\Comment as CommentResource;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function store(Request $request,$id){
        
        $comment = Comment::create([
            'description' => request('description'),
            'user_id' => auth()->user()->id,
            'recipe_id' => $id
        ]);
        return CommentResource::collection(Comment::get()->where('user_id',auth()->user()->id));
    }
}
