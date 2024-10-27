<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{

    //index method
    public function index()
    {
        $permissions = Permission::orderBy('created_at', 'DESC')->paginate(10);
        return view('permissions.list',[
            'permissions' => $permissions
        ]);
    }

    //Create method

    public function create()
    {
        return view('permissions.create');
    }


    //Store method
    public function store(Request $request)
    {
       $validator = Validator::make($request->all(),[
            'name' => 'required|unique:permissions|min:4|max:255',
        ]);
   if($validator->passes()){

    Permission::create(['name' => $request->name]);

        return redirect()->route('permission.index')->with('success', 'Permission created successfully');

   }else{

    return redirect()-> route('permission.create') -> withInput() ->withErrors($validator);

    }
    }

    //edit method


    public function edit($id)
    {
        $permissions = Permission::findOrFail($id);

        return view('permissions.edit',
         ['permission' => $permissions]);
    }




    //update method

    public function update(Request $request, $id)
    {
        $permissions = Permission::findOrFail($id);

        $validator = Validator::make($request->all(),[
            'name' => 'required|unique:permissions,name|min:3,'.$id.', id',
        ]);
   if($validator->passes()){

   // Permission::create(['name' => $request->name]);
   $permissions->name = $request->name;
    $permissions->save();

        return redirect()->route('permission.index')->with('success', 'Permission Updated successfully');

   }else{

    return redirect()-> route('permission.edit', $id) -> withInput() ->withErrors($validator);

    }
    }



    //destroy method

    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        session()->flash('success', 'Permission deleted successfully');

        return redirect('/permissions');
    }

}
