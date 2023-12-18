<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function getTopicComments($id): JsonResponse
    {
        $comments = Comment::where('topic_id',$id)->with(['user','topic','quote'])->orderBy('id','asc')->get();

        return response()->json(['data' => $comments]);
    }
}
