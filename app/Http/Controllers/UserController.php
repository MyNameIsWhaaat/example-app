<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use \Spatie\Permission\Models\Role;

class UserController extends Controller
{
     
    public function index() : View
    {
        $users = User::orderBy('created_at')->get();

        return view('users.index', compact([
            'users'
        ]));
    }

     
    public function create()
    {
        //
    }

     
    public function store(Request $request)
    {
        
        // Валидация данных
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'department_id' => 'required|exists:departments,id',
        ]);

        // Создание пользователя
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt('testUser123'),
        ]);

        // Получение выбранного отдела из формы
        $departmentId = $validatedData['department_id'];

        // Связывание пользователя с выбранным отделом
        $user->departments()->attach($departmentId);

        return redirect()->route('users.index');
    }
 
    public function show(User $user)
    {
        //
    }
 
    public function edit(User $user): View
    {
        $roles = Role::orderBy('name')->get();

        return view('users.edit', compact([
            'user',
            'roles',
        ]));
    }

     
    public function update(Request $request, User $user)
    {
        
        
        $request->validate([
            'name' => 'required|max:255',
            'role_id' => 'required|integer|exists:roles,id',
        ]);

        $user->update([
            'name' => $request->name
        ]);
        $role = Role::find($request->role_id);

        $user->syncRoles([$role->name]);

        // Получение выбранного отдела из формы
        $department_id = $request->input('department_id');

        // Связывание пользователя с выбранным отделом
        $user->departments()->attach($department_id);

        return redirect()->route('users.index');
    }
 
    public function destroy(User $user)
    {
        $user = User::find($user->id)->delete();
        return redirect()->route('users.index');
    }
}
