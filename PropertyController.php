<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyRating;
use App\Models\Approval;
use App\Models\PropertyReview;
use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyMail;
use Illuminate\Http\Request;
use App\Models\PropertyAlerty;
use App\Models\Favorite;
use App\Jobs\NotifyJob;
use Exception;
use Carbon\Carbon;
use Auth;
use Log;
use Str;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('property-create-update.create-property');
        } catch(\Exception $error) {
            return view('error.500');  
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePropertyRequest $request)
    {
        $validated = $request->validated();
        try {
            if ($request->hasFile('image1') && $request->hasFile('document')) {
                $file = $request->file('image1');
                $ext = $file->getClientOriginalExtension();
                $imageupload = time() . '.' . $ext;
                $file->move('images/', $imageupload);
    
                $document = $request->file('document');
                $ext_document = $document->getClientOriginalExtension();
                $docupload = time() . '.' . $ext_document;
                $document->move('images/', $docupload);
                if(auth()->user()->email == 'pavinsanthi6@gmail.com') {
                    $approval = 1; 
                } else {
                    $approval = 0; 
                }
    
                Property::create([
                    'type' => $validated['type'],
                    'sales_type' => $validated['sales-type'],
                    'property_type' => $validated['property-type'],
                    'floor_number' => $validated['floor'],
                    'location' => Str::upper($validated['location']),
                    'address' => $validated['address'],
                    'zipcode' => $validated['zipcode'],
                    'property_size' => $validated['property-size'],
                    'lot_size' => $validated['lot-size'],
                    'bedroom' => $validated['bedroom'],
                    'bathroom' => $validated['bathroom'],
                    'garage' => $validated['garage'],
                    'property_condition' => $validated['property-condition'],
                    'currency' => $validated['currency'],
                    'price' => $validated['price'],
                    'date' => $validated['date'],
                    'description' => $validated['description'],
                    'approval' =>$approval,
                    'image' => $imageupload,
                    'document' => $docupload,
                    'user_id' => Auth::user()->id,
                ]);
    
                $alert = PropertyAlerty::get();
                foreach ($alert as $notify) {
                    if (
                        $validated['sales-type'] === $notify->sales_type &&
                        $validated['location'] == $notify->location &&
                        $validated['type'] == $notify->type &&
                        $validated['property-type'] === $notify->property_type &&
                        $notify->max_price >= $validated['price'] &&
                        $notify->min_price <= $validated['price']
                    ) {
                        Mail::to($notify->email)->later(now()->addMinutes(2), new NotifyMail($notify));
                        $notify->delete();
                    }
                }
    
                return back()->with('success', 'Your Property has been successfully submitted for verification. Once verified or if there is an issue with the document, we will notify you through email. Thank you.');
            } else {
                return back()->with('message', 'Something went wrong when posting the property. Please try again.');
            }
        } catch (\Exception $error) {
            return view('error.500');
        }
    }
    

    /**
     * Display the specified resource.
     */
   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($property)
    {
        try {
            $property = Property::find($property);
            return view('property-create-update.edit-property', compact('property'));
        } catch (\Exception $error) {
            return view('error.500');
        }
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePropertyRequest $request, $property)
    {
        $validated = $request->validated();
        
        try {
            $property = Property::find($property);
            
            if ($request->hasFile('image1')) {
                $imageupload = $this->uploadFile($request->file('image1'));
                $property->image = $imageupload;
            } elseif ($request->hasFile('document')) {
                $docupload = $this->uploadFile($request->file('document'));
                $property->document = $docupload;
            }
            
            // Update property fields
            $this->updatePropertyFields($property, $validated);
            
            // Save and update related data
            $property->update();
            Approval::where('property_id', '=', $property->id)->delete();
            $this->sendAlertsAndEmails($validated, $property);
            
            return back()->with('success', 'Your Property has been successfully submitted for verification. Once verified or if there are issues with the document, we will notify you via email. Thank you');
        } catch (\Exception $error) {
            return view('error.500');
        }
    }
    
    private function uploadFile($file)
    {
        $ext = $file->getClientOriginalExtension();
        $filename = time() . '.' . $ext;
        $file->move('images/', $filename);
        return $filename;
    }
    
    private function updatePropertyFields($property, $validated)
    {
        $property->type = $validated['type'];
        $property->sales_type = $validated['sales-type'];
        $property->property_type = $validated['property-type'];
        $property->floor_number = $validated['floor'];
        $property->location = strtoupper($validated['location']);
        $property->address = $validated['address'];
        $property->zipcode = $validated['zipcode'];
        $property->property_size = $validated['property-size'];
        $property->lot_size = $validated['lot-size'];
        $property->bedroom = $validated['bedroom'];
        $property->bathroom = $validated['bathroom'];
        $property->garage = $validated['garage'];
        $property->property_condition = $validated['property-condition'];
        $property->currency = $validated['currency'];
        $property->price = $validated['price'];
        $property->date = $validated['date'];
        $property->approval = 0;
        $property->description = $validated['description'];
    }
    
    private function sendAlertsAndEmails($validated, $property)
    {
        $alerts = PropertyAlerty::get();
    
        foreach ($alerts as $alert) {
            if (
                $validated['sales-type'] === $alert->sales_type &&
                $validated['location'] == $alert->location &&
                $validated['type'] == $alert->type &&
                $validated['property-type'] === $alert->property_type &&
                $alert->max_price >= $validated['price'] &&
                $alert->min_price <= $validated['price']
            ) {
                Mail::to($alert->email)->later(now()->addMinutes(2), new NotifyMail($alert));
                $alert->delete();
            }
        }
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($property)
{
    try {
        $property = Property::find($property);
        $property->delete();

        return back()->with('success', 'Property deleted successfully');
    } catch (\Exception $error) {
        return view('error.500');
    }
}

public function storeRating(Request $request)
{
    $ratingValue = $request->input('rating');
    $propertyId = $request->input('property_id');

    PropertyRating::create([
        'rating_value' => $ratingValue,
        'property_id' => $propertyId,
    ]);

    return response()->json(['message' => 'Rating stored successfully']);
}


public function storeReview(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'comment' => 'required',
        'property_id' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => 400,
            'errors' => $validator->errors(),
        ]);
    }

    $review = new PropertyReview();
    $review->name = $request->input('name');
    $review->comment = $request->input('comment');
    $review->property_id = $request->input('property_id');

    $review->save();

    return response()->json([
        'status' => 200,
        'message' => 'Review Created Successfully',
    ]);
}

public function storeFavorite(Request $request) {
    $validator = Validator::make($request->all(), [
        'property_id' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => 400,
            'errors' => $validator->errors(),
        ]);
    }
    if(!(Favorite::where('property_id','=',$request->property_id)->where('user_id','=',auth()->user()->id)->first())) {
        $favorite=new Favorite();
        $favorite->user_id=auth()->user()->id;
        $favorite->property_id=$request->input('property_id');
        $favorite->save();
         return response()->json([
            'status' => 200,
            'message' => 'Review Created Successfully',
        ]);
    } else {
        $favorite = Favorite::where('property_id','=',$request->property_id)->where('user_id','=',auth()->user()->id)->first();
        $favorite->delete();
        return response()->json([
            'status' => 204,
            'message' => 'Favorite deleted',
        ]);
    }
}

public function userstoreFavorite(Request $request) {
    $validator = Validator::make($request->all(), [
        'property_id' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => 400,
            'errors' => $validator->errors(),
        ]);
    }
    if((Favorite::where('property_id','=',$request->property_id)->where('user_id','=',auth()->user()->id)->first())) {
        $favorite = Favorite::where('property_id','=',$request->property_id)->where('user_id','=',auth()->user()->id)->first();
        $favorite->delete();
        return response()->json([
            'status' => 204,
            'message' => 'Favorite deleted',
        ]);
    } else {
        $favorite=new Favorite();
        $favorite->user_id=auth()->user()->id;
        $favorite->property_id=$request->input('property_id');
        $favorite->save();
         return response()->json([
            'status' => 200,
            'message' => 'Review Created Successfully',
        ]);
    }
}

}
