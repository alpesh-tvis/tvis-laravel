<?php

namespace App\Http\Controllers;

use App\Role;
use Session;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {  
       $roles = Role::orderBy('created_at', 'DESC')->paginate(20);
       return view('admin.role.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.role.create');
    }

    public function store(Request $request){

        $this->validate($request, [
            'name' => 'required|unique:roles,name',
        ]);

        $roles = Role::create([
            'name' => $request->name,
            'guard_name' => $request->guard_name,
         ]);

        Session::flash('success', 'Tag created successfully');
        return redirect()->route('admin.role.index') ;

    }
    public function edit(Role $role){

        $role = Role::all();;
        return view('admin.post.edit', compact(['role']));
    }
       

}
