<?php

namespace App\Http\Controllers;
use App\Models\Designation;
use App\Models\Employee;
use Mail;
use App\Mail\EmployeeMail;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
   public function show(){

       $employee=Employee::all();
       $designation=Designation::orderby('designation','ASC')->get();
       return view('employees',compact('designation','employee'));
   }

   public function store(Request $request){

   $request->validate(
    [
        'name'=>'required',
        'email'=>'required',
        'designation'=>'required',
        'photo'=>'image|max:5000|mimes:jpeg,png,jpg,gif',
    ],
    [
        'name.required' => "Employee Name Is Required",
        'email.required' => "Employee Email ID Is Required",
        'designation.required' => "Employee Designation Is Required",
    ]


   );

    if($request->file('photo')){

        $emp_photo= $request->file('photo');
        $image_name=hexdec(uniqid()).'.'.$emp_photo->getClientOriginalExtension();
         $emp_photo->move(public_path('uploads/employee_images'),$image_name);
        $image_path='uploads/employee_images/'.$image_name;
        Employee::insert([

            'name' => $request->name,
            'email' => $request->email,
            'photo' => $image_path,
            'designation_id' => $request->designation,
            
           ]);
           $password=rand();

           $details = [
            'title' => 'Your account has been created',
            'body' => 'Your Password is '.$password
            ];
            Mail::to($request->email)->send(new EmployeeMail($details));

    }
    else{
        Employee::insert([

            'name' => $request->name,
            'email' => $request->email,
            'designation_id' => $request->designation,
            
           ]);

           $password=rand();

           $details = [
            'title' => 'Your account has been created',
            'body' => 'Your Password is '.$password
            ];

            Mail::to($request->email)->send(new EmployeeMail($details));
           
    }
       
   return redirect()->back();

   }

   public function editemployee($id){

   $empdetails=Employee::find($id);
   $des=Designation::orderBy('designation','ASC')->get();
   return view('editemp',compact('empdetails','des'));
   }
   
   public function destroyemployee($id){

    $employee=Employee::FindorFail($id);
    @unlink($employee->photo);
    Employee::findorFail($employee->id)->delete(); 
    return redirect()->back();

   }

   public function updateemployee(Request $request){

    $id= $request->id;
    $old_image= $request->old_photo;  
    $model=Employee::FindorFail($id);
    $model->name=$request->name;
    $model->email=$request->email;
    $model->designation_id=$request->des_id; 
     
   if($request->file('photo')){

    @unlink($old_image);
    $emp_image= $request->file('photo');
    $image_name=hexdec(uniqid()).'.'.$emp_image->getClientOriginalExtension(); 
    $emp_image->move(public_path('uploads/employee_images'),$image_name);
    $image_path='uploads/employee_images/'.$image_name;
    $model->photo=$image_path;
   }

   else{
   
    $model->photo=$old_image;

   }

    $model->save();
    return redirect()->route('employees');

   }
  
}
