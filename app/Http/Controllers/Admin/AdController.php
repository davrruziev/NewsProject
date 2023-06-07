<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Http\Requests\StoreAdRequest;
use App\Http\Requests\UpdateAdRequest;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ad=Ad::first();
        return view('admin.ads.index',compact('ad'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ads.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdRequest $request)
    {
        $requestData=$request->all();

        if($request->hasFile('img1')){
            $file=$request->file('img1');
            $imageName=time().'.'.$file->getClientOriginalName();
            $file->move('site/images/ads',$imageName);
            $requestData['img1']=$imageName;
        }

        if($request->hasFile('img2')){
            $file=$request->file('img2');
            $imageName=time().'2.'.$file->getClientOriginalName();
            $file->move('site/images/ads',$imageName);
            $requestData['img2']=$imageName;
        }


        Ad::create($requestData);
        return redirect()->route('admin.posts.index')->with('success','posts created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ad $ad)
    {
        return view('admin.ads.show',compact('ad'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ad $ad)
    {
        return view('admin.ads.edit',compact('ad'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdRequest $request, Ad $ad)
    {
        $requestData=$request->all();

        if($request->hasFile('img1')){
            $file=$request->file('img1');
            $imageName=time().'.'.$file->getClientOriginalName();
            $file->move('site/images/ads',$imageName);
            $requestData['img1']=$imageName;
        }

        if($request->hasFile('img2')){
            $file=$request->file('img2');
            $imageName=time().'2.'.$file->getClientOriginalName();
            $file->move('site/images/ads',$imageName);
            $requestData['img2']=$imageName;
        }


        $ad->update($requestData);
        return redirect()->route('admin.ad.index')->with('success','Ads created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ad $ad)
    {
        $ad->delete();
        return redirect()->route('admin.ad.index')->with('success','Ad deleted sucessfully');
    }
}
