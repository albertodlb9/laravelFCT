<?php

namespace App\Http\Controllers;
use App\Models\Action;

use Illuminate\Http\Request;
use App\Models\User;

class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $actions = Action::all();
        $users = User::all();
        return view('actions.index', compact('actions', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::whereHas('rols', function ($query) {
            $query->where('rols.id', 3); // ID del rol
        })->get();
        return view('actions.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Action::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Action::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $action = Action::find($id);
        $users = User::whereHas('rols', function ($query) {
            $query->where('rols.id', 3); // ID del rol
        })->get();
        return view('actions.edit', compact('action', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $action = Action::find($id);
        $action->update($request->all());
        return view('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Action::destroy($id);
    }
}
