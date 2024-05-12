<?php

namespace App\Http\Controllers;
use Illuminate\Console\View\Components\Component;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Component
{
     
    
    public function index(){ 
        $permissions = Permission::query();
        $a = $permissions->get();
        return view( "role-permission.permission.index", ['a' => $a] );
    }

    public function create(){
        return view("role-permission.permission.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=> [
                'required',
                'string',
                'unique:permissions,name'
            ]
        ]);

        Permission:: create([
            'name' => $request->name
        ]);

        return redirect('permissions')->with('status','Permission Created Successfully');

    }

    public function edit(){
        
    }

    public function update(){
        
    }

    public function destroy(){
        
    }
}
