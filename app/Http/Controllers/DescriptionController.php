<?php

namespace App\Http\Controllers;

use App\Models\Description;
use App\Models\BusinessProfile;
use Illuminate\Http\Request;

class DescriptionController extends Controller
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
        return view('section.description');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function createDescription(Request $request)
    {
        $user = auth()->user();

        $businessProfile = $request->session()->get('business_profile');
        if(empty($businessProfile)){
            session()->flash('error', 'You need to create your business profile before starting your business plan generation.');
            return redirect( route('create_business_profile') );
        }


        // $request -> validate([
        //     'overview' => 'required',
        //     'structure' => 'required',
        //     'country' => 'required',
        //     'state' => 'required',
        //     'local_govt' => 'required',
        //     'street' => 'required',
        //     'ownership' => 'required',
        // ]);

        $description = Description::create([
            'overview' => $request->input('overview'),
            'structure' => $request->input('structure'),
            'status' => $request->input('status', 'pending'),
            'country' => $request->input('country'),
            'state' => $request->input('state'),
            'local_govt' => $request->input('local_govt'),
            'street' => $request->input('street'),
            'ownership' => $request->input('ownership'),
            'user_id' => $user->id,
            'profile_id' => $businessProfile->profile_id,
        ]);

        // dd($description);

        if(!empty($description)){
            session()->flash('success', 'Company Descrption Completed Successfully.');
            return redirect('/mybizplan/bizplan_profile_created');
        }else{
            session()->flash('error', 'Company Description has not been Created.');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Description $description)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Description $description)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Description $description)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Description $description)
    {
        //
    }
}
