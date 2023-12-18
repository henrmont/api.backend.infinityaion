<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function getAllTopics(): JsonResponse
    {
        $topics = Topic::withCount(['comments'])->orderBy('created_at','desc')->get();

        return response()->json(['data' => $topics]);
    }

    public function getTopic($id): JsonResponse
    {
        $topic = Topic::find($id);

        return response()->json(['data' => $topic]);
    }
}
