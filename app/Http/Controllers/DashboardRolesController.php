<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class DashboardRolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Dashboard Roles',
            'roles' => Role::paginate(10),
        ];

        return view('dashboard.roles.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.roles.create', [
            'title' => 'Create New User',
            'roles' => Role::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'role' => 'required|unique:roles,role|min:3|max:100',
        ]);

        Role::create($validatedData);

        return redirect()->route('roles.index')
            ->with('success', 'Role berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    //VIEW EDIT ROLES
    public function edit(Role $role)
    {
        return view('dashboard.roles.edit', [
            'title' => 'Edit Roles',
            'role' => $role,
        ]);
    }

    // UPDATE(EDIT) ROLE 
    public function update(Request $request, Role $role)
    {
        $rules = [
            'role' => 'required|unique:roles,role|min:3|max:100',
        ];

        $validasiData = $request->validate($rules);

        Role::where('uuid', $role->uuid)
            ->update($validasiData);



        return redirect()->route('roles.index')
            ->with('success', 'Role berhasil diperbaharui!');
    }


    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Role berhasil di hapus!');
    }
}
