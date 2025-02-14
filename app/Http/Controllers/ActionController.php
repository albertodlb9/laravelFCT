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
        return Action::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('actions.create');
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
        $pupils = User::where('rol_id', '2')->get();
        return view('actions.edit', compact('data', 'pupils'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $action = Action::find($id);
        $action->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Action::destroy($id);
    }
}
