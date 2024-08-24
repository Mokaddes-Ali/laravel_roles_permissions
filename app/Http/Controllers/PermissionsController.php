<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    public function index()
    {
        return view('permissions.index');
    }

    public function create()
    {
        return view('permissions.create');
    }

    public function store(Request $request)
    {
        // Validate the request...
        $request->validate([
            'name' => 'required|unique:permissions|max:255',
            'description' => 'required',
        ]);

        $permission = new Permission;

        $permission->name = $request->name;
        $permission->description = $request->description;

        $permission->save();

        return redirect('/permissions');
    }

    public function show($id)
    {
        $permission = Permission::findOrFail($id);

        return view('permissions.show', ['permission' => $permission]);
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);

        return view('permissions.edit', ['permission' => $permission]);
    }

    public function update(Request $request, $id)
    {
        // Validate the request...
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

    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return redirect('/permissions');
    }

}
