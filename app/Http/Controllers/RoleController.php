<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles= Role::get();
        return view('roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         echo "hello create";
      // return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>"required|unique:roles,name"
        ]);

        //$success=  Role::create($request->all());

        $role= new Role();
        $role->name= $request->name;
        $success = $role->save();



       if ($success) {
          return redirect('role')->with('success', 'New role is created');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
       // $role= Role::find($id);
      
     return view('roles.update', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {      
          $role=Role::find($id);
          $role->name= $request->name;
          $success= $role->save();
         if ( $success) {
            return redirect('role')->with('success', ' Role is Updated');
         }
    }

    // public function update(Request $request, Role $role)
    // {
    //       $role->name= $request->name;
    //        $success= $role->save();
    //      if ( $success) {
    //         return redirect('role')->with('success', ' Role is Updated');
    //      }
    // }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
  
    public function destroy($id)
    {
       Role::destroy($id);
       return redirect('role')->with('success', ' role is deleted');
    }
    public function manualDel($id)
    {
       Role::destroy($id);
       return redirect('role')->with('success', ' role is deleted');
    }

   // model binding
    // public function destroy( Role $role)
    // {
    //     $role->delete();
    //    return redirect('role')->with('success', ' role is deleted');
    // }
}
