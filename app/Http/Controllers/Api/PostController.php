<?php

namespace App\Http\Controllers\Api;
use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {  
        $sortFiled = request('sort_field','created_at');
        if(!in_array($sortFiled,['title','post_text','created_at'])){
            $sortFiled='created_at';
        }
          
        $sortDirection = request('sort_direction','desc');
        if(!in_array($sortDirection,['asc','desc'])){
            $sortDirection='desc';
        }
        $post=Post::when(request('Category_id','')!='', function ($query)    
    {
        $query->where('Category_id',request('Category_id'));
    })->orderBy($sortFiled,$sortDirection)->paginate(3);
        return PostResource::collection($post);
    }
    public function Store(StorePostRequest $request){
        $post = Post::create($request->validated());
        return new PostResource($post);
    }
    public function show(Post $post){
        return new PostResource( $post);
    }
    public function update(Post $post,StorePostRequest $request){
        $post->update($request->validated());
        return new PostResource( $post);
        
    }
}
