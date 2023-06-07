<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $specialpost=Post::where('is_spicial',1)->limit(6)->latest()->get();
        $latesposts=Post::limit(6)->latest()->get();
        $popularposts=Post::limit(4)->orderBy('view','DESC')->get();
        return view('index',compact('specialpost','latesposts','popularposts'));
    }

    public function categoryPost($slug){
        $category=Category::where('slug',$slug)->first();
        return view('categoryPost',compact('category',));
    }

    public function postDetaile($slug){
        $post=Post::where('slug',$slug)->first();
        $post->increment('view');
        $post->save();

        $otherPost=Post::where('category_id',$post->category_id)
        ->where('id','!=',$post->id)
        ->limit(3)
        ->latest()
        ->get();
        return view('postDetaile',compact('post','otherPost'));
    }

    public function contact(){
        return view('contact');
    }

    public function search(Request $request){
        $key=$request->key;
        $posts=Post::where('title_uz','like','%'.$key.'%')
        ->orWhere('title_ru', 'like', '%'.$key.'%')
        ->orWhere('body_uz', 'like', '%'.$key.'%')
        ->orWhere('body_ru', 'like', '%'.$key.'%')
        ->get();
        return view('search',compact('posts','key'));
    }
}
