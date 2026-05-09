<?php

namespace App\Http\Controllers;

use App\Models\BusinessProfile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class BusinessProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $bizprofile = BusinessProfile::all()->where('user_id', $user->id);

        // dd($bizprofile);

        return view('dashboard', compact('bizprofile'));
    }

    public function manage($id, Request $request)
    {
        $user = auth()->user();
        $profile_id = $request->input('profile_id');

        if(!empty($profile_id)){
             // Retrieve the business profile by ID
            $businessProfile = BusinessProfile::with(['descriptions', 'financials', 'marketings', 'managements', 'competitives', 'operational', 'research', 'products'])
            ->where('user_id', $user->id)->where('profile_id', $profile_id)->first();

            if ($businessProfile) {

            // Store the business profile and its related data in the session
            $request->session()->put('business_profile', $businessProfile);
            }
            else{
                return "Profile not found";
            }
        }else{
            return "Not found";
        }

        return view('section.description', compact('businessProfile'));

        // Redirect to the desired form where the data will be used
        // return redirect()->route('section.description');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('business_profile');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function createBusinessProfile(Request $request)
    {
        $user = auth()->user();

        $request -> validate([
            'business_name' => 'required',
        ]);

        $business_name = $request->input('business_name');

        $checkDoubleName = BusinessProfile::where('user_id', $user->id)->where('business_name', $business_name)->count();

        if ($checkDoubleName > 0) {
            session()->flash('error', 'Business profile with this name already exists.');
            return redirect()->back();
        }

        $businessProfile = BusinessProfile::create([
            'business_name' => $request->input('business_name'),
            'status' => $request->input('status', 'pending'),
            'profile_id' => Str::uuid()->toString(),
            'user_id' => $user->id,
        ]);

        if(!empty($businessProfile)){
            session()->flash('success', 'Business Profile Successfuly Created. You can now start building your business plan');
            return redirect('/mybizplan/bizplan_profile_created');
        }else{
            session()->flash('error', 'Business Profile was not Created.');
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(BusinessProfile $businessProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BusinessProfile $businessProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BusinessProfile $businessProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BusinessProfile $businessProfile)
    {
        //
    }
}
