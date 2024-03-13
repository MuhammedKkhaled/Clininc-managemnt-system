<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Testing\ParallelTesting;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $patients = Patient::latest()->paginate(5);
        return view('Patients.patients' ,  compact('patients'));
    }

    public function store(Request $request)
    {

        $validate_date = $request->validate([
            'name'=>["required","min:3","string"],
            'age'=>["required","min:10","integer" ,"max:80"],
            'phone'=>["required","regex:/^(\+201|01|00201)[0-2,5]{1}[0-9]{8}$/",],
            'phone2'=>["nullable","regex:/^(\+201|01|00201)[0-2,5]{1}[0-9]{8}$/",],
            'gender'=>["required"],

        ],
            [
                "name.required"=>"The Name Is Required",
                "name.min"=>"Minimum is 3 characters",
                "age.required"=>"The Age Is Required ",
                "age.min"=>"The Minimum Age is 10 years old ",
                "age.max"=>"The Maximum Age is 80 years old ",
                "phone.required"=>"The Phone Number Is Required ",
                "phone.regex"=>"Please Enter a valid phone number (Egyptian phone number ) ",
                "phone2.regex"=>"Please Enter a valid phone number (Egyptian phone number ) ",
                "gender.required"=>"The Gender is required ",
            ]
        );


        Patient::create($validate_date);

        return response()->json([
            'status'=>'success',
        ]);
    }


    public function update(Request $request)
    {

        $validate_data = $request->validate(
            [
                'name'=>["required","min:3","string"],
                'age'=>["required","min:10","integer" ,"max:80"],
                'phone'=>["required","regex:/^(\+201|01|00201)[0-2,5]{1}[0-9]{8}$/",],
                'phone2'=>["nullable","regex:/^(\+201|01|00201)[0-2,5]{1}[0-9]{8}$/",],
                'gender'=>["required"],

            ],
            [
                "name.required"=>"The Name Is Required",
                "name.min"=>"Minimum is 3 characters",
                "age.required"=>"The Age Is Required ",
                "age.min"=>"The Minimum Age is 10 years old ",
                "age.max"=>"The Maximum Age is 80 years old ",
                "phone.required"=>"The Phone Number Is Required ",
                "phone.regex"=>"Please Enter a valid phone number (Egyptian phone number ) ",
                "phone2.regex"=>"Please Enter a valid phone number (Egyptian phone number ) ",
                "gender.required"=>"The Gender is required ",
            ]
        );

        $product = Patient::findOrFail($request->id);

        $product->update($validate_data);

        return response()->json([
            'status'=>'success',
        ]);
    }

    public function delete(Request $request)
    {

        $patient = Patient::findOrFail($request->id);

        $patient->delete();

        return response()->json([
            'status'=>'success',
        ]);
    }

    public function pagination(Request $request)
    {
        $patients = Patient::latest()->paginate(5);
        return view("Patients.pagination" , compact('patients'))->render();
    }
}
