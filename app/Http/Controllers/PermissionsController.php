<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PermissionsController extends Controller
{

    //index method
    public function index()
    {
        return view('permissions.index');
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
   }else{

    return redirect()-> route('permission.create') -> withInput() ->withErrors($validator);

        // $permission = new Permission;

        // $permission->name = $request->name;
        // $permission->description = $request->description;

        // $permission->save();

        // return redirect('/permissions');
    }
    }


    //show method

    public function show($id)
    {
        $permission = Permission::findOrFail($id);

        return view('permissions.show', ['permission' => $permission]);
    }

    //edit method

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);

        return view('permissions.edit', ['permission' => $permission]);
    }

    //update method

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|unique:permissions|max:255',
            'description' => 'required',
        ]);

        $permission = Permission::findOrFail($id);

        $permission->name = $request->name;
        $permission->description = $request->description;

        $permission->save();

        return redirect('/permissions');
    }

    //destroy method

    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return redirect('/permissions');
    }

}
