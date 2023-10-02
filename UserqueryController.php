<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserQueryRequest;
use App\Models\User;
use App\Models\Property;
use App\Models\Userquery;
use Illuminate\Http\Request;
use Exception;
use Auth;
use App\Events\CustomerQueryMailEvent;

class UserqueryController extends Controller
{
    public function userQuery(UserQueryRequest $request, $property)
    {
        try {
            $validated = $request->validated();
            $property = Property::find($property);
            $userQueryData = [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'message' => $validated['message'],
                'user_id' => $property->user_id,
            ];
            if ($property) {
                $property->queries()->create($userQueryData);
            }

            return back()->with('success', 'Your query submitted to the property owner. They will inform you through your given email.');

        } catch (\Exception $error) {
            return view('error.500');
        }
    }

    public function userQueryShow()
    {
        try {
            $query = Userquery::where('userqueries.user_id', auth()->user()->id)
            ->join('properties', 'userqueries.id', '=', 'properties.id')
            ->select('userqueries.name','userqueries.id','userqueries.email','userqueries.message', 'properties.type','properties.sales_type','properties.currency','properties.price','properties.image') // Select the columns you need from both tables
            ->paginate(5);
        
            return view('profile.property-query', compact('query'));

        } catch (\Exception $error) {
            return view('error.500');
        }
    }

    public function userQueryDelete($queryId)
    {
        try {
            $query = Userquery::find($queryId);
            $query->delete();

            return back()->with('success', 'Customer query deleted successfully');
        } catch (\Exception $error) {
            return view('error.500');
        }
    }

    public function userQueryReply($id)
    {
        try {
            $query = Userquery::with('propertyquery', 'userquery')->find($id);


            return view('profile.customer-query-reply', compact('query'));
        } catch (\Exception $error) {
            return view('error.500');
        }
    }

    public function userSendMail(Request $request, $id)
    {
        try {
            CustomerQueryMailEvent::dispatch($request->except('_token'));
            Userquery::find($id)->delete();

            return redirect('/userquery-show')->with('success', 'Reply email sent successfully');
        } catch (\Exception $error) {
            return view('error.500');
        }
    }
}
