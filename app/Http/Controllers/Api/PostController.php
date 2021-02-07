<?php

namespace App\Http\Controllers\Api;
use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {   $post=Post::when(request('Category_id','')!='', function ($query)    
    {
        $query->where('Category_id',request('Category_id'));
    })->paginate(3);
        return PostResource::collection($post);
    }
}
