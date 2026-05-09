<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\BusinessProfile;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $bprofile = BusinessProfile::all()->where('user_id', $user->id);
        return view('dashboard', compact('bprofile', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('section.product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function createProductAndServices(Request $request)
    {
        $user = auth()->user();

        $businessProfile = $request->session()->get('business_profile');
        if(empty($businessProfile)){
            session()->flash('error', 'You need to create your business profile before starting your business plan generation.');
            return redirect( route('create_business_profile') );
        }

        $request -> validate([
            'product_description'  => 'required',
            'benefits'  => 'required',
            'life_cycle'  => 'required',
            'intellectual_property'  => 'required',
        ]);

        $product = Product::create([
            'product_description' => $request->input('product_description'),
            'benefits' => $request->input('benefits'),
            'intellectual_property' => $request->input('intellectual_property'),
            'status' => $request->input('status', 'pending'),
            'life_cycle' => $request->input('life_cycle'),
            'user_id' => $user->id,
            'profile_id' => $businessProfile->profile_id,
        ]);

        if(!empty($product)){
            session()->flash('success', 'Competitive Analysis Completed Successfully.');
            return redirect('/mybizplan/bizplan_profile_created');
        }else{
            session()->flash('error', 'Competitive Analysis has not been Created.');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
