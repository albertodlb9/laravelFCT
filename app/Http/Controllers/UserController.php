<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Rol;
use Illuminate\Support\Facades\DB;
use App\Models\Company;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->surname1 = $request->surname1;
        $user->surname2 = $request->surname2;
        $user->tlfn = $request->tlfn;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        if(auth()->user()){
            return redirect(route('users.index', absolute: false));
        }
        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user =  User::find($id);
        $companies = Company::all();
        $rols = Rol::all();
        return view('users.show', compact('user', 'rols', 'companies'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        $rols = Rol::all();
        $companies = Company::all();
        $rolUser=$user->rols;
        $companyUser=$user->companies;
        return view('users.edit', compact('user', 'rols', 'companies','rolUser','companyUser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $user = User::findOrFail($id);

    $data = $request->except('password'); 
    if ($request->filled('password')) { 
        $data['password'] = Hash::make($request->password); 
    } else {
        $data['password'] = $user->password; 
    }
    DB::table('companies_roles_users')->updateOrInsert(
        ['user_id' => $user->id],  // Condición para buscar si ya existe
        ['rol_id' => $request->rol, 'company_id' => $request->company] // Datos a insertar o actualizar
    );
    
    $user->update($data);

    return redirect()->route('users.index');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente');
    }

    public function changeRol(Request $request, string $id)
    {

        return view('dashboard');
    }

    public function changeCompany(Request $request, string $id)
    {

        return view('dashboard');
    }
}
