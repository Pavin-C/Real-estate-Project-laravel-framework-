<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Property;
use App\Models\Approval;
use App\Models\Userquery;
use Exception;
use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        try {
        $user = User::withCount('properties')->paginate(10);
        return view('profile.User-details',compact('user'));
        } catch(\Exception $error){

        }
    }

    public function userDelete($id) 
    {
       try {
       User::find($id)->delete();
       $properties = Property::Where('user_id',$id)->get();
       if($properties) {
       foreach($properties as $property) {
       $property->delete();
       }
    }
    $userqueries = Userquery::Where('user_id',$id)->get();
    if($userqueries) {
    foreach($userqueries as $query) {
    $query->delete();
    }
}
return back()->with('success','Customer deleted successfully along with their properties');
          
       } catch(\Exception $error) {
        return $error->getMessage();
       }
    }

    public function approvePropertyPage()
    {
        try {
            $property = Property::with('user')->where('approval', '=', 0)->paginate(10);
        return view('profile.approve-property',compact('property'));
        } catch (\Exception $error) {
            return view('error.500');
        }
        
    }

    public function approveProperty($id) 
    {
       try {
        $property=Property::find($id);
        $property->approval = 1;
        $property->update();
        return back();
       } catch (\Exception $error) {
        return view('error.500');
    }
    }
    public function approveUnProperty(Request $request,$id,$userid) 
    {
       try {
        $property=Property::find($id);
        Approval::create([
            'property_id' => $id,
            'user_id' => $userid,
            'comments' => $request->input('comment'),

        ]);
        $property->approval = 2;
        $property->update();
        return back();
       } catch (\Exception $error) {
        return view('error.500');
    }
    }

    public function userUnApproveProperty() {
        try {
              $unapproval = Approval::where('user_id','=',auth()->user()->id)->paginate(10);
              return view ('profile.user-property-unapproval',compact('unapproval'));
        } catch (\Exception $error) {
            return view('error.500');
        }
    }
    
}
