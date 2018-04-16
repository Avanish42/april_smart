<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\model\Role;
use App\model\Permission;

class RelationController extends Controller
{
    //

    public function showEmployeeRelation()
    {
        $employee=User::with('roles')->get()->toArray();
        return view('relation.showEmployeeRelation' ,compact('employee'));
    }
    public function showPermissionRelation()
    {
        $role=Role::with('perms')->get()->toArray();

        return view('relation.showPermissionRelation' ,compact('role'));

        //dd($role);

    }

    public function editPermissionRelation($id)
    {

//        dd("editPermissionRelation");
        $role=Role::where('id','=',$id)->with('perms')->get()->toArray();
        $allpermission=Permission::all()->toArray();
//        dd($role);
        return view('relation.editPermissionRelation' ,compact('role','allpermission'));
//        dd($allpermission);
//        dd($role);


    }
    public function updatePermissionRelation( Request $request)

    {
//        dd($request->toArray());
        $role = Role::where('id', '=', $request->id)->first();

        //dd($role);
        // $admin->attachPermission($createPost);
        //$role->perms()->detach($permission)
        //dd("updatePermissionRelation");
        //delete permission
        if($request->removeperm) {

            foreach ($request->removeperm as $k => $v) {

                $permission = Permission::where('name', '=', $v)->first();
                $role->perms()->detach($permission);

            }
        }
            //For check permission and add new Permission
        if($request->addperm) {
            foreach ($request->addperm as $k => $v) {
                if (!($role->hasPermission($v))) {
                    $permission = Permission::where('name', '=', $v)->first();
                    $role->attachPermission($permission);

                }
            }
        }

        return redirect('Relation/PermissionRelation')->with('returnStatus', true)->with('status', 101)->with('message', 'Permission  Edited Successfully');

    }

    public function editEmployeeRelation($id)
    {

        $employee=User::where('id','=',$id)->with('roles')->get()->toArray();
        $allrole=Role::all()->toArray();

        return view('relation.editEmployeeRelation' ,compact('employee','allrole'));

    }
    public function updateEmployeeRelation(Request $request)
    {
       // $admin=Role::where('name','=','manager')->first();
        $user = User::where('id','=',$request->id)->first();
        //$user->attachRole($admin);
//for removing the role
        if($request->removeroles) {

            foreach ($request->removeroles as $k => $v) {
//                echo $v;
                    $role = Role::where('name', '=', $v)->first();
                    $user->detachRoles($role->roles);
//                $role = $user->roles()->where("name", $v)->first();
                 //$user->roles()->detatch($role);

            }
        }
        //For check role and add new role
        if($request->addroles) {
            foreach ($request->addroles as $k => $v) {
                echo $v;
                if (!($user->hasRole($v))) {
                    $role = Role::where('name', '=', $v)->first();
                    $user->attachRole($role);
                }
            }
        }
        return redirect('Relation/EmployeeRelation')->with('returnStatus', true)->with('status', 101)->with('message', 'Roles  Edited Successfully');


        //dd($request->toArray());
    }
}
