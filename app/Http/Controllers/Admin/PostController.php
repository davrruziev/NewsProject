<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;  
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts=Post::paginate(20);
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        $tags=Tag::all();
        return view('admin.posts.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        
        $requestData=$request->all();

        if($request->hasFile('img')){
            $file=$request->file('img');
            $imageName=$file->getClientOriginalName();
            $file->move('site/images/posts',$imageName);
            $requestData['img']=$imageName;
        }

        // if($request->hasFile('img')){
  
        //     $name=$request->file('img')->getClientOriginalName();
        //     $path=$request->file('img')->storeAs('post-photos',$name);
        // }

        $requestData['slug']=Str::slug($request->title_uz);

        $post=Post::create($requestData);
        $post->tags()->attach($request->tags);
        return redirect()->route('admin.posts.index')->with('success','posts created successfully!');

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories=Category::all();
        $tags=Tag::all();
        return view('admin.posts.edit',compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $requestData=$request->all();

        if(empty($request->is_spicial)){
            $requestData['is_spicial']=0;
        }
        if($request->hasFile('img')){
            $file=$request->file('img');
            $imageName=$file->getClientOriginalName();
            $file->move('site/images/posts',$imageName);
            $requestData['img']=$imageName;
        }

       // $requestData['slug']=Str::slug($request->title_uz);

        $post->update($requestData);
        $post->tags()->sync($request->tags);
        return redirect()->route('admin.posts.index')->with('success','posts update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // if(isset($post->img)){
        //     Storage::delete($post->img);
        // }

        $post->delete();
        return redirect()->route('admin.posts.index')->with('success','posts deleted successfully!');
    }

    public function upload(Request $request){
 
        
        if($request->hasFile('upload')) {
            $filename =time().'-'. $request->file('upload')->getClientOriginalName();
            //$fileName = pathinfo($originName, PATHINFO_FILENAME);
            //$extension = $request->file('upload')->getClientOriginalExtension();
           // $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('upload')->move('site/images/posts/', $filename);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('site/images/posts/'.$filename); 
            $msg = 'Image successfully uploaded'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }
    }
}
