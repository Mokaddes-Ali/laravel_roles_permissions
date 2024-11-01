<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    // this methiod will return the view of the roles
    public function index()
    {

        return view('roles.list',[

        ]);
    }

     // this methiod will return the view of the roles
    public function create()
    {
        $permissions = Permission::orderBy('name', 'ASC')->get();

        return view('role.create',[

            'permissions' => $permissions
        ]);
    }

    // this methiod will return the view of the roles

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|unique:roles|min:4|max:255',
        ]);
        if($validator->passes()){

            Role::create(['name' => $request->name]);

            return redirect()->route('role.index')->with('success', 'Role created successfully');

        }else{

            return redirect()-> route('role.create') -> withInput() ->withErrors($validator);

        }
    }

    public function edit($id)
    {
        $roles = Role::findOrFail($id);

        return view('roles.edit',
            ['role' => $roles]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|unique:roles|min:4|max:255',
        ]);
        if($validator->passes()){

            $role = Role::findOrFail($id);
            $role->name = $request->name;
            $role->save();

            return redirect()->route('role.index')->with('success', 'Role updated successfully');

        }else{

            return redirect()-> route('role.edit', $id) -> withInput() ->withErrors($validator);

        }
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('role.index')->with('success', 'Role deleted successfully');
    }

}



