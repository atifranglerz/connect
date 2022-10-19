<?php

namespace App\Http\Controllers\Admin;

use App\Models\AllAd;
use App\Models\AddPackage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $packages = AddPackage::all();
        return view('admin.simpleAds.package.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ad=Allad::find($id);
        $ad->delete();
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $packages =AddPackage::find($id);
        return view('admin.simpleAds.package.edit', compact('packages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $package = AddPackage::find($id);
        $package->package_name = $request->package_name;
        $package->price = $request->price;
        $package->validity = $request->validity;
        $package->save();
        
        $packages = AddPackage::all();
        return view('admin.simpleAds.package.index', compact('packages'))->with($this->data("Package updated successfyully", 'success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) 
    {

    }
    public function adIndex()
    {
         $ads = AllAd::all(); 
        return view('admin.simpleAds.ads.index', compact('ads'));
    }
}
