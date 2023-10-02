<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyRating;
use App\Models\PropertyReview;
use App\Models\Favorite;
use App\Models\User;
use Exception;
use Str;
use Auth;

class PropertyListingController extends Controller
{

    public function propertyListing() {
        try {
            $property = Property::where('approval','=',1)
                                  ->where('user_id','<>',auth()->user()->id)->orderBy('created_at','desc')->paginate(9);
            $propertyType = 'all';
            if(Auth::check()) {
            $favorite = Favorite::select('user_id','property_id')->where('user_id',auth()->user()->id)->get();
            return view('home.property-grid',compact(['property','propertyType','favorite']));
            }
            //dd($property->property_size);
            return view('home.property-grid',compact(['property','propertyType']));
        } catch(\Exception $error) {
            return view('error.500');
        }
    }

    public function propertyView($property) {
       
        try {
            $id = $property;
            $property = Property::with('user')->find($property);
            $rating   = PropertyRating::where('property_id','=',$id)->avg('rating_value');
            $rating = round($rating,1);
            $review = PropertyReview::where('property_id','=',$id)->orderBy('id','desc')->limit(10)->get();
            return view('home.property-single',compact(['property','rating','review']));
        } catch(\Exception $error) {
            return view('error.500');
        }
    }

    public function propertyCustomFilter(Request $request) {
            try {
                $favorite = Favorite::select('user_id','property_id')->where('user_id',auth()->user()->id)->get();
                $propertyQuery = Property::query();

                if ($request->property_type !== 'all') {
                    $propertyQuery->where('sales_type', '=', $request->property_type);
                }
                
                $property = $propertyQuery->paginate(9);
                $propertyType = $request->property_type;
                
                if ($property->isEmpty()) {
                    $errorMessage = 'Sorry..No Results Found';
                    return view('home.property-grid', compact(['errorMessage', 'propertyType', 'property','favorite']));
                }
                
                return view('home.property-grid',with(['property'=>$property,
            'propertyType'=>$propertyType ,'favorite'=>$favorite]));
                
            } catch(\Exception $error) {

            }
    }
     public function propertySearch(Request $request) {
        try {
    $type = $request->input('type');
    $salestype = $request->input('sales_type');
    $city = str::upper($request->input('city'));
    $floor = $request->input('floor');
    $propertycondition = $request->input('condition');
    $bathroom = $request->input('bathroom');
    $bedroom = $request->input('bedroom');
    $garage = $request->input('garage');
    $price = $request->input('price');
    
    $query = Property::query();
      $query->pluck('sales_type');
      $query->pluck('property_type');
      $query->pluck('location');
      $query->pluck('floor_number');
      $query->pluck('property_condition');
      $query->pluck('price');
      $query->pluck('bedroom');
      $query->pluck('bathroom');
      $query->pluck('garage');
    if ($salestype && $salestype !== 'all') {
        $var = $query->orWhere('sales_type', $salestype);
    }

    if ($city) {
        $query->orWhere('location', $city);
    }
    if ($floor) {
        $query->orWhere('floor_number', $floor);
    }
    if ($propertycondition && $propertycondition !== 'all') {
       
        $query->orWhere('property_condition', $propertycondition);
    }
    if ($type && $type !== 'all') {
       
        $query->orWhere('property_type', $type);
    }
    if ($bedroom && $bedroom !== 'all') {
        if($bedroom!=4) {
        $query->orWhere('bedroom', $bedroom);
         } else {
            $query->orWhere('bedroom','>=',$bedroom);
         }
    }
    if ($bathroom && $bathroom !== 'all') {
        if($bathroom!=4) {
        $query->orWhere('bathroom', $bathroom);
         } else {
            $query->orWhere('bathroom','>=',$bathroom);
         }
    }
    if ($garage && $garage !== 'all') {
        if($garage!=4) {
        $query->orWhere('garage', $garage);
         } else {
            $query->orWhere('garage','>=',$garage);
         }
    }
    if ($price && $price !== 'all') {
        if ($price == '1') {
            $query->Where('price', '>=', '50')->orWhere('price', '<=', '1000');
        } else if ($price == '2') {
            $query->Where('price', '>=', '1000')->orWhere('price', '<=', '10000');
        } else if ($price == '3') {
            $query->Where('price', '>=', '10000')->orWhere('price', '<=', '100000');
        } else {
            $query->Where('price', '>', '100000');
        }
    }
    $property = $query->paginate(9);
    $propertyType = $salestype;
    $favorite = Favorite::select('user_id','property_id')->where('user_id',auth()->user()->id)->get();
    if ($property->isEmpty()) {
                   
        $errorMessage = 'Sorry..No Results Found';
        return view('home.property-grid', compact(['errorMessage','propertyType','property']));
    }
    return view('home.property-grid',with(['property'=>$property,
    'propertyType'=>$propertyType ,'favorite'=>$favorite]));
    } catch(\Exception $error) {
        return view('error.500');
    }

     }

     public function propertyCompareView() {
        try {
           $property = Property::where('approval','=',1)->get();
           $propertyType = 'all';
           return view('propertycompare.propertyindex',compact(['property','propertyType']));
        } catch(\Exception $error) {
            return view('error.500');
        }
   }

   public function propertyCompareShow(Request $request)
{
    $propertyIds = $request->input('property_ids', []);
    $property = Property::whereIn('id', $propertyIds)->get();
    return view('propertycompare.propertycompareshow', compact('property'));
}

public function viewFavoriteProperty() {
    try {
          $favorite = Favorite::where('user_id',auth()->user()->id)->paginate(9);
         
        return view('profile.Favorite-properties',compact('favorite'));

    } catch(\Exception $error) {
        return view('error.500');
    }
}

public function customCompare(Request $request)
{
    try {
        $propertyType = $request->property_type;
           if($request->location == null && ($request->property_type == 'all' || $request->property_type == 'Rent' || $request->property_type == 'Sales' )) {
            if($request->property_type == 'all') {
                $property = Property::where('approval','=',1)->orderByDesc("created_at")->get();
                return view('propertycompare.propertyindex', compact(['property','propertyType']));
            } else {
                $property = Property::where('sales_type','=',$request->property_type)
                ->where('approval','=',1)->orderByDesc("created_at")->get();
                return view('propertycompare.propertyindex', compact(['property','propertyType']));
            }
           } else {
            if($request->property_type == 'all') {
                $property = Property::where('approval','=',1)
                ->where('location','=',str($request->location))->orderByDesc("created_at")->get();
                return view('propertycompare.propertyindex', compact(['property','propertyType']));
            } else {
                $property = Property::where('approval','=',1)->where('sales_type','=',$request->property_type)
                ->where('location','=',str($request->location))->orderByDesc("created_at")->get();
                return view('propertycompare.propertyindex', compact(['property','propertyType']));
            }
           }
    }catch(\Exception $error) {
        return view('error.500');
    }
}
}
