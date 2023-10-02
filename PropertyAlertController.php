<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePropertyAlertRequest;
use App\Http\Requests\UpdatePropertyAlertRequest;
use App\Models\PropertyAlerty;
use Exception;
use Carbon\Carbon;
use Auth;
use Str;

class PropertyAlertController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
           $propertyalert = PropertyAlerty::where('user_id',auth()->user()->id)->paginate(10);
           return view('alerts.user-property-alert-show',compact('propertyalert'));
        } catch(\Exception $error) {
            return view('error.500');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('alerts.create-property-alert');
        } catch(\Exception $error) {
            return view('error.500');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePropertyAlertRequest $request)
    {
        $validated = $request->validated();
        try{
            PropertyAlerty::create([
                'type'    => $validated['type'],
                'sales_type' => $validated['sales-type'],
                'property_type' => $validated['property-type'],
                'location' => str::upper($validated['location']),
                'min_price' => $validated['minprice'],
                'max_price' => $validated['maxprice'],
                'user_id' =>Auth::user()->id,
                'email' => Auth::user()->email,
            ]);
            return back()->with('success','property setup was successfullly created');

        } catch(\Exception $error) {
            return view('error.500');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
        $property = PropertyAlerty::find($id);
        return view('alerts.edit-property-alert',compact('property'));
        } catch(\Exception $error) {
            return view('error.500');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePropertyAlertRequest $request,  $id)
    {
        $validated = $request->validated();
        try {
            $propertyalert = PropertyAlerty::find($id);
            $propertyalert->type          = $validated['type'];
            $propertyalert->sales_type    = $validated['sales-type'];
            $propertyalert->property_type = $validated['property-type'];
            $propertyalert->location      = str::upper($validated['location']);
            $propertyalert->min_price                 = $validated['minprice'];
            $propertyalert->max_price                 = $validated['maxprice'];
            $propertyalert->update();
            return back()->with('success','Set for property alert successfully Updated');
        } catch(\Exception $error) {
            return view('error.500');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $propertyalert  = PropertyAlerty::find($id);
            $propertyalert->delete();
            return back()->with('success','Set up for alert Property deleted successfully'); 
        } catch(\Exception $error) {
            return view('error.500');
        }
    }

   
}
