<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GarageRequest;
use App\Models\Area;
use App\Models\Category;
use App\Models\City;
use App\Models\Garage;
use App\Models\GarageCategory;
use App\Models\Vendor;
use Illuminate\Http\Request;

class GarageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $garages = Garage::all();
        $page_title = 'Garages';
        return view('admin.garage.index', compact('garages', 'page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $page_title = 'Create Garage';
        $vendor = Vendor::all();
        $category = Category::all();
        return view('admin.garage.create', compact('page_title', 'vendor', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(GarageRequest $request)
    {
        if ($request->file('image')) {
            $image = $request->file('image');
            $image_name = hexdec(uniqid()) . '.' . strtolower($image->getClientOriginalExtension());
            $image->move('public/image/garage/', $image_name);
            $image = 'public/image/garage/' . $image_name;
        }
        $data = $request->only(['vendor_id', 'garage_name', 'trading_no', 'vat', 'phone', 'address', 'country', 'city', 'post_box', 'image', 'description']);
        $data['image'] = $image ?? '';
        $garage = Garage::create($data);
        //dd($request->category_id);
        foreach ($request->category_id as $category) {
            GarageCategory::create([
                'garage_id' => $garage->id ,
                'category_id' => $category
            ]);
        }
        return $this->message($garage, 'admin.garage.index', 'Garage Create Successfully', 'Garage Create Error');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Garage $garage
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Garage $garage)
    {
        $page_title = 'Edit Garage';
        $vendor = Vendor::all();
        $category = Category::all();
        $garage_category1 = GarageCategory::where('garage_id', $garage->id)->get();
        $garage_category = [];
        foreach ($garage_category1 as $data) {
            $garage_category[] = $data->id;
        }
        return view('admin.garage.edit', compact('page_title', 'vendor', 'category', 'garage', 'garage_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Garage $garage
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(GarageRequest $request, Garage $garage)
    {
        if ($request->file('image')) {
            $image = $request->file('image');
            $image_name = hexdec(uniqid()) . '.' . strtolower($image->getClientOriginalExtension());
            $image->move('public/image/garage/', $image_name);
            $image = 'public/image/garage/' . $image_name;
            if ($request->old_image !== null) {
                unlink($request->old_image);
            }
        } else {
            $image = $request->old_image;
        }
        $garage_id = $garage->id;
        $data = $request->only(['vendor_id', 'garage_name', 'trading_no', 'vat', 'phone', 'address', 'country', 'city', 'post_box', 'image', 'description']);
        $data['image'] = $image ?? '';
        $garage = $garage->update($data);
        $data['image'] = $image ?? '';
        $garage_category = GarageCategory::where('garage_id', $garage_id)->whereNotIn('category_id', $request->category_id)->get();
        if (!$garage_category->isEmpty()) {
            $garage_category->each->delete();
        }
        foreach ($request->category_id as $category) {
            GarageCategory::updateOrCreate([
                'garage_id' => $garage_id,
                'category_id' => $category,
            ]);
        }
        return $this->message($garage, 'admin.garage.index', 'Garage Update Successfully', 'Garage Update Error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Garage $garage
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        Garage::destroy($id);
        return redirect()->route('admin.garage.index')->with($this->data("Garage deleted successfyully", 'success'));
    }

}
