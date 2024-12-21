<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = $request->only(['query']);

        $data = [
            'title' => 'Dashboard Users',
            'users' => User::with('role')->filter($filters)->paginate(5)->appends($filters),
        ];

        return view('dashboard.users.index', $data);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.users.create', [
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
            'image' => 'required|image|file|max:10240',
            'username' => ['required', 'min:3', 'max:100', 'unique:users'],
            'fullname' => 'required|max:255',
            'role' => 'required|exists:roles,uuid',
            'isVerified' => 'in:true,false',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|min:8',
            'password2' => 'required|min:8|same:password',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('avatar');
        }

        if ($validatedData['isVerified']) {
            if ($validatedData['isVerified'] === 'true') {
                $validatedData['isVerified'] = true;
            } else {
                $validatedData['isVerified'] = false;
            }
        }

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['role_uuid'] = $validatedData['role'];


        User::create($validatedData);

        return redirect()->route('users.index')
            ->with('success', 'User berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('dashboard.users.show', [
            'title' => 'User Details',
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit', [
            'title' => 'Edit User',
            'user' => $user->load('role'),
            'roles' => Role::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {

        $rules = [
            'username' => 'required|min:3|max:100',
            'fullname' => 'required|max:255',
            'role' => 'required|exists:roles,uuid',
            'isVerified' => 'in:true,false',
            'email' => 'required|email:rfc,dns',
        ];

        if ($request->file('image')) {
            $rules['image'] = 'required|image|file|max:10240';
        }


        if ($request->get('username') !== $user->username) {
            $rules['username'] = 'required|min:3|max:100|unique:users';
        }

        if ($request->get('email') !== $user->email) {
            $rules['email'] = 'required|email:rfc,dns|unique:users';
        }

        if ($request->get('password')) {
            $rules['password'] =  'required|min:8';
            $rules['password2'] =  'required|min:8|same:password';
        }

        $validatedData = $request->validate($rules);



        if ($request->get('password')) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('avatar');
        }


        if ($request->get('role') === Role::where('role', 'EO')->first()->uuid) {

            if ($validatedData['isVerified']) {
                if ($validatedData['isVerified'] === 'true') {
                    $validatedData['isVerified'] = true;
                } else {
                    $validatedData['isVerified'] = false;
                }
            }
        } else {
            $validatedData['isVerified'] = false;
        }

        $validatedData['role_uuid'] = $validatedData['role'];

        $user->update($validatedData);

        return redirect()->route('users.index')
            ->with('success', 'User berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'User berhasil di hapus!');
    }
}
