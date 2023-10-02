<?php

namespace App\Http\Controllers;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Exception;
use Hash;
use Auth;
use Str;
use Illuminate\Http\Request;

class LogRegisterController extends Controller
{
    public function registerView() {
        try {
            return view('auth.register');
        } catch(\Exception $error) {
            return view('error.500');
        }
    }
    public function loginView() {
        try {
            return view('auth.login');
        } catch(\Exception $error) {
            return view('error.500');
        }
    }
    public function register(RegisterRequest $request) 
    {
           $validated = $request->validated();
           try {
            if(($request->hasFile('image'))) {
               
            $file=$request->file('image');
              $ext=$file->getClientOriginalExtension();
              $imageupload=time().'.'.$ext;
              $file->move('images/',$imageupload);
                 $user = User::create([
                    'name' => $validated['name'],
                    'email' => str::lower($validated['email']),
                    'image' => $imageupload,
                    'phone_number' => $validated['phone'],
                    'gender' => $validated['gender'],
                    'password' => Hash::make($validated['password']),
                 ]);
                 Auth::login($user);
                 return redirect('/property-listing');
                // return back()->with('success','Succefully Register..Login and countiune');
                } else {
                    return back()->with('message','Sorry something went wrong with the register plase do again');
                }
           } catch(\Exception $error) {
            return view('error.500');
           }
    }

    public function login(LoginRequest $request)
    {
        try {
            $validated = $request->validated();
            $user = User::where('email', $request->email)->first();
            if(is_null($user)) {
                return back()->with('message','Email doesnot exists.Please Register');
            }
            if($user) {
                if(Hash::check($request->password, $user->password)) {
                    Auth::login($user);
                    return redirect('/property-listing');

                } else {
                    return back()->with('message','Password does not match.Please enter correct password');
                }
            }

        } catch(\Exception $error) {
            return view('error.500');
        }
    }

    public function logout() {
        try {
            Auth::logout();
            return redirect('/');
        } catch(\Exception $error) {
            return view('error.500');
        }
    }
}
