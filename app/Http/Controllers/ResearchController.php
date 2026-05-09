<?php

namespace App\Http\Controllers;

use App\Models\Research;
use Illuminate\Http\Request;
use App\Models\BusinessProfile;

class ResearchController extends Controller
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
        return view('section.research');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function createMarketResearch(Request $request)
    {
        $user = auth()->user();

        $businessProfile = $request->session()->get('business_profile');
        if(empty($businessProfile)){
            session()->flash('error', 'You need to create your business profile before starting your business plan generation.');
            return redirect( route('create_business_profile') );
        }


        $request -> validate([
            'analysis' => 'required',
            'target_market' => 'required',
            'market_needs' => 'required',
            'market_growth' => 'required',
        ]);

        $research = Research::create([
            'analysis' => $request->input('analysis'),
            'target_market' => $request->input('target_market'),
            'status' => $request->input('status', 'pending'),
            'market_needs' => $request->input('market_needs'),
            'market_growth' => $request->input('market_growth'),
            'user_id' => $user->id,
            'profile_id' => $businessProfile->profile_id,
        ]);

        if(!empty($research)){
            session()->flash('success', 'Market Research Completed Successfully.');
            return redirect('/mybizplan/bizplan_profile_created');
        }else{
            session()->flash('error', 'Market Research has not been Created.');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Research $research)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Research $research)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Research $research)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Research $research)
    {
        //
    }
}
