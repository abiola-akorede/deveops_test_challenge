<?php

namespace App\Http\Controllers;

use App\Models\Competitve;
use App\Models\BusinessProfile;
use Illuminate\Http\Request;

class CompetitveController extends Controller
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
        return view('section.competitive');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function createCompetitiveAnalysis(Request $request)
    {
        $user = auth()->user();

        $businessProfile = $request->session()->get('business_profile');
        if(empty($businessProfile)){
            session()->flash('error', 'You need to create your business profile before starting your business plan generation.');
            return redirect( route('create_business_profile') );
        }


        $request -> validate([
            'direct_competitors' => 'required',
            'indirect_competitors' => 'required',
            'competitive_edge' => 'required',
        ]);

        $competitive = Competitve::create([
            'direct_competitors' => $request->input('direct_competitors'),
            'indirect_competitors' => $request->input('indirect_competitors'),
            'status' => $request->input('status', 'pending'),
            'competitive_edge' => $request->input('competitive_edge'),
            'user_id' => $user->id,
            'profile_id' => $businessProfile->profile_id,
        ]);

        if(!empty($competitive)){
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
    public function show(Competitve $competitve)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Competitve $competitve)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Competitve $competitve)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Competitve $competitve)
    {
        //
    }
}
