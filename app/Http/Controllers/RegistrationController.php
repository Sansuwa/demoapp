<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegistrationController extends Controller
{
    public function index(){
        return view('form');
    }

    // public function register(Request $request){

    //     $request->validate(
    //         [
    //             'firstname' => 'required',
    //             'lastname' => 'required',
    //             'email' => 'required|email',
    //             'gender' => 'required',
    //             'address' => 'required'

    //         ]
    //     );

    //     echo "<pre>";
    //     print_r($request->all());

    // }

    public function register(Request $request)
    {
        // Validate form data
        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'gender' => 'required',
            'address' => 'required',
        ]);

        // Create a new user using the validated data
        $user = User::create($validatedData);

        // Optionally, you can return a response or redirect to a success page
        return redirect()->route('index')->with('success', 'User registered successfully!');

}
}