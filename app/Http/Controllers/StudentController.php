<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
   
    public function index()
    {
        //$students= Student::get();
        $students= Student::paginate(5);
        //  print_r($students);

        return view('students.index' , compact('students'));
    }

   
    public function create()
    {
        return view('students.create');
    }

  
    public function store(Request $request)
    {
        
        $request->validate([
            'name'=>'required|min:3',
            'roll'=>"required|min:4|numeric",
            'phone'=>"required|min:4|numeric",
            'address' => "required|in:dhaka,rajshahi",
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ],[
            'address.in'=>"Address must be inbetween Dhaka or Rajshahi",
        ]);
        
      
        $sutdent= new Student();
        $sutdent->name= $request->name;
        $sutdent->roll= $request->roll;
        $sutdent->phone= $request->phone;
        $sutdent->address= $request->address;
        $photoname=$request->name.".".$request->file('photo')->extension();

        $photoPath = public_path('photo/' . $photoname);
        if (file_exists($photoPath)) {
            unlink($photoPath);
        }

        $request->file('photo')->move(public_path('photo'), $photoname);

        $sutdent->photo= $photoname;

        if($sutdent->save()){
            return redirect('student')->with('success', "Student has been registred");
         } ;
        
    
    }

  
    public function show($id)
    {
        $student= Student::find($id);
        return view('students.show', compact('student'));

       
    }

   
    public function edit($id)
    {
        $student= Student::find($id);
        //$student= Student::where('id', $id)->get();

        return view('students.update', compact('student'));
    }

   
    public function update(Request $request ,$id)
    {
        $request->validate([
            'name'=>'required|min:3',
            'roll'=>"required|min:4|numeric",
            'phone'=>"required|min:4|numeric",
            'address' => "required|in:dhaka,rajshahi",
            'photo' => 'image|mimes:jpg,jpeg,png|max:2048',
        ],[
            'address.in'=>"Address must be inbetween Dhaka or Rajshahi",
        ]);

        //print_r($request->all());

        $sutdent= Student::find($id);
        $sutdent->name= $request->name;
        $sutdent->roll= $request->roll;
        $sutdent->phone= $request->phone;
        $sutdent->address= $request->address;


        if ($request->file('photo')) {
            $photoname=$request->name.".".$request->file('photo')->extension();

            $photoPath = public_path('photo/' . $photoname);
            if (file_exists($photoPath)) {
                unlink($photoPath);
            }


            $request->file('photo')->move(public_path('photo'), $photoname);
    
            $sutdent->photo= $photoname;
        }else{
            $sutdent->photo=  $sutdent->photo;
        }

    

        if($sutdent->save()){
            return redirect('student')->with('success', "Student has been updated");
         } ;

    }

   
    public function destroy_view($id)
    {
        $student= Student::find($id);
        return view('students.delete', compact('student'));
    }


    public function destroy($id)
    {
      $del= Student::destroy($id);
        if($del){
            return redirect('student')->with('success', "Student has been Deleted");
         } 
    }


    public function search(Request $request)
    {
        $students= Student::where('name',"like", "%{$request->name}%" )->paginate(5);

        $requestdata= $request->name;
     
        return view('students.index' , compact('students','requestdata'));
        if($students){
            return view('students.index' , compact('students'));
         }else{
            $students=[];
         }
    }
}
