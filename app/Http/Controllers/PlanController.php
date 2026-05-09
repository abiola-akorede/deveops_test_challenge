<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('section.plan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function createOperationalPlan(Request $request)
    {
        $user = auth()->user();

        $businessProfile = $request->session()->get('business_profile');
        if(empty($businessProfile)){
            session()->flash('error', 'You need to create your business profile before starting your business plan generation.');
            return redirect( route('create_business_profile') );
        }

        $request -> validate([
            'operational_workflow' => 'required',
            'production_plan' => 'required',
            'supply_chain' => 'required',
            'quality_control' => 'required',

        ]);

        $plan = Plan::create([
            'operational_workflow' => $request->input('operational_workflow'),
            'production_plan' => $request->input('production_plan'),
            'supply_chain' => $request->input('supply_chain'),
            'status' => $request->input('status', 'pending'),
            'quality_control' => $request->input('quality_control'),
            'user_id' => $user->id,
            'profile_id' => $businessProfile->profile_id,
        ]);

        if(!empty($plan)){
            session()->flash('success', 'Operational Plan Completed Successfully.');
            return redirect('/mybizplan/bizplan_profile_created');
        }else{
            session()->flash('error', 'Operational Plan has not been Created.');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plan $plan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plan $plan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plan $plan)
    {
        //
    }
}
