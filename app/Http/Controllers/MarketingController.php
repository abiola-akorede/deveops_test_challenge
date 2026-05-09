<?php

namespace App\Http\Controllers;

use App\Models\Marketing;
use App\Models\BusinessProfile;
use Illuminate\Http\Request;

class MarketingController extends Controller
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
        return view('section.marketing');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function createMarketingStrategies(Request $request)
    {
        $user = auth()->user();

        $businessProfile = $request->session()->get('business_profile');
        if(empty($businessProfile)){
            session()->flash('error', 'You need to create your business profile before starting your business plan generation.');
            return redirect( route('create_business_profile') );
        }

        $request -> validate([
            'marketing_plan' => 'required',
            'sales_strategies' => 'required',
            'sales_forcast' => 'required',
            'customer_acquisition_strategies' => 'required',
        ]);

        $marketing = Marketing::create([
            'marketing_plan' => $request->input('marketing_plan'),
            'sales_strategies' => $request->input('sales_strategies'),
            'sales_forcast' => $request->input('sales_forcast'),
            'status' => $request->input('status', 'pending'),
            'customer_acquisition_strategies' => $request->input('customer_acquisition_strategies'),
            'user_id' => $user->id,
            'profile_id' => $businessProfile->profile_id,
        ]);

        if(!empty($marketing)){
            session()->flash('success', 'Marketing Strategies Completed Successfully.');
            return redirect('/mybizplan/bizplan_profile_created');
        }else{
            session()->flash('error', 'Marketing Strategies has not been Created.');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Marketing $marketing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Marketing $marketing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Marketing $marketing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Marketing $marketing)
    {
        //
    }
}
