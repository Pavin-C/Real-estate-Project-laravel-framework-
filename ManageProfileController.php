<?php

namespace App\Http\Controllers;
use App\Models\Property;
use App\Models\User;
use App\Models\Userquery;
use Exception;
use Auth;
use App\Http\Requests\UpdateProfileRequest;
use Str;

use Illuminate\Http\Request;

class ManageProfileController extends Controller
{
    public function index() 
    {
        try {
            $user = User::find(auth()->id());
            return view('profile.manage-profile',compact('user'));
        } catch(\Exception $error) {
            return view('error.500');
        }
    }

    public function editProfile()
    {
        try {
            $user = User::find(auth()->id());
            return view('profile.update-profile',compact('user'));
        } catch(\Exception $error) {
            return view('error.500');
        }
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
      
        try {
            $validated = $request->validated();
            $user = User::find(auth()->id());
            if($request->hasFile('image')) {
                $file=$request->file('image');
                            $ext=$file->getClientOriginalExtension();
                            $imageupload=time().'.'.$ext;
                            $file->move('images/',$imageupload);
                            $user->name = $validated['name'];
                            if(!(str::lower($validated['email'])==auth()->user()->email)) {
                            $user->email = $validated['email'];
                            }
                            $user->gender = $validated['gender'];
                            if(!($validated['phone']==auth()->user()->phone_number)) {
                            $user->phone_number = $validated['phone'];
                            }
                            $user->image = $imageupload;
                            $user->update();
                            return redirect('/userprofile');
            } else {
                $user->name = $validated['name'];
                $user->email = str::lower($validated['email']);
                if(str::lower($validated['email'])==auth()->user()->email) {
                    $user->email = $validated['email'];
                    }
                    $user->gender = $validated['gender'];
                    if(!($validated['phone']==auth()->user()->phone_number)) {
                    $user->phone_number = $validated['phone'];
                    }
                $user->update();
                return redirect('/userprofile');
            }
        } catch (\Exception $error) {
            return view('error.500');
        }
    }

    public function userPropertyShow() {
        try {
            $property = Property::where('user_id',auth()->user()->id)->paginate(10);
            return view('profile.userproperty-show',compact('property'));
        } catch (\Exception $error) {
            return view('error.500');
        }
    }
}
