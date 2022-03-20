<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Education;
use App\Models\Employee;
use App\Models\Hobby;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $employees = Employee::with(['Deparment','Education','Hobby'])->get();
        return view('home')->with(['employees'=>$employees]);
    }

    public function Form(){
        $departments = Department::all();
        $hobbies = Hobby::all();
        $educations = Education::all();
        return view("create")->with(['departments'=>$departments,'hobbies'=>$hobbies,'educations'=>$educations]);
    }

    public function Create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:employee_info,email',
            'gender' => 'required',
            'contact' => 'required|numeric',
            'address' => 'required',
            'photo' => 'required|image|max:2048',
            'j_date' => 'required|date',
            'dob' => 'required|date|before:today',
            'department' => 'required|exists:department,id',
            'education' => 'required|exists:education,id',
            'exp' => 'required',
            'hobby' => 'required|exists:hobby,id'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $employee = new Employee;
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->gender = $request->gender;
        $employee->contact_number = $request->contact;
        $employee->address = $request->address;
        $employee->joined = $request->j_date;
        $employee->dob = $request->dob;
        $employee->d_id = $request->department;
        $employee->ed_id = $request->education;
        $employee->experience = $request->exp;
        $employee->h_id = $request->hobby;
        $employee->save();

        $image      = $request->file('photo');
        $fileName   = $employee->id . '.' . $image->getClientOriginalExtension();
        $request->photo->storeAs(
            'images/',$fileName
        );
        $employee->photo = $fileName;
        $employee->save();


        //custom task to create db and folder for no reason (Because one can so yeah...)
        $custom_name = preg_replace('/\s+/', '_',strtolower($request->name));
        $new_db = DB::statement("CREATE DATABASE IF NOT EXISTS {$custom_name}" );

        $path = storage_path()."/allemployees/{$custom_name}";
        File::makeDirectory($path, $mode = 0777, true, true);

        return redirect(route("home"));
    }

    public function deleteEmployee(Request $request){
        Employee::find($request->employee)->delete();

        //session()->flash('success', 'Employee details deleted successfully.');
        return redirect()->back();
    }

    public function checkEmail(Request $request)
    {
        $input = $request->only(['email']);

        $request_data = [
            'email' => 'required|email|unique:employee_info,email',
        ];

        $validator = Validator::make($input, $request_data);

        if ($validator->fails()) {
            $errors = json_decode(json_encode($validator->errors()), 1);
            return response()->json([
                'success' => false,
                'message' => array_reduce($errors, 'array_merge', array()),
            ]);
        } else {
            return response()->json([
                'success' => true,
                'message' => 'The email is valid'
            ]);
        }
    }
}
