<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\Permission;

class PermissionController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

    }
    public function show()
    {
        $permission=Permission::all()->toArray();
        return view('permission.show' ,compact('permission'));


    }
    public function add()
    {
        return view('permission.add');
    }
    public function store(Request $request)
    {
        $permission= new Permission();
        $permission->name =$request->name;
        $permission->display_name =$request->display_name;
        $permission->description=$request->description;
        $permission->save();
        return back()->with('returnStatus', true)->with('status', 101)->with('message', 'Permission Added Successfully')->with("dummy data");


    }
    public function edit($id)
    {
        $permission=Permission::where('id','=',$id)->first()->toArray();
        return view('permission.edit',compact('permission'));

    }
    public function update(Request $request)
    {
        $id= $request->id;
        $role= Permission::where('id','=',$id)->first();
        //$role= new Role();
        $role->name =$request->name;
        $role->display_name =$request->display_name;
        $role->description=$request->description;
        $role->save();
        return redirect('Permission/show')->with('returnStatus', true)->with('status', 101)->with('message', 'Permission Edited Successfully');

    }
    public function delete($id)
    {
        return redirect('Permission/show')->with('returnStatus', true)->with('status', 101)->with('message', 'Permission Delete Not Allowed ');

    }


}
