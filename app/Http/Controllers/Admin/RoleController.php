<?php

namespace App\Http\Controllers\Admin;
use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\Role;
class RoleController extends Controller
{
    //
    use SoftDeletes;
    public function index()
    {

    }
    public function show()
    {
        $role=Role::all()->toArray();
        return view('role.show' ,compact('role'));

    }
    public function add()
    {
        return view('role.add');
//        echo "add";
    }
    public function store(Request $request)
    {
        //dd($request->toArray());
        $role= new Role();
        $role->name =$request->name;
        $role->display_name =$request->display_name;
        $role->description=$request->description;
        $role->save();
        return back()->with('returnStatus', true)->with('status', 101)->with('message', 'Roles Added Successfully')->with("dummy data");

    }
    public function edit($id)
    {
        $role=Role::where('id','=',$id)->first()->toArray();
        return view('role.edit',compact('role'));
    }
    public function update(Request $request)
    {
     //   dd($request->toArray());
        $id= $request->id;
        $role= Role::where('id','=',$id)->first();
        //$role= new Role();
        $role->name =$request->name;
        $role->display_name =$request->display_name;
        $role->description=$request->description;
        $role->save();
        return redirect('Role/show')->with('returnStatus', true)->with('status', 101)->with('message', 'Role Edited Successfully');

    }
    public function delete($id)
    {
//        dd($id);

        $role= Role::find($id);
//        dd($role);
        //$role->delete();
//        $role->softDeletes();
        //$role->forceDelete();

        return redirect('Role/show')->with('returnStatus', true)->with('status', 101)->with('message', 'Role Deleted Not Allow');

    }

}
