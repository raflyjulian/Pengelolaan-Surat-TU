<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'staff')->get();
        // $userStaff=User::where('role', 'staff')->count();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required',
            // 'role' => 'required',
        ]);
    
        $password = substr($request->email, 0, 3) . substr($request->name, 0, 3);
        try {
            //code...
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                // 'role' => $request->role,
                'password' => Hash::make($password) // Encrypt the password
            ]);
        return redirect()->route('users.home')->with('success', 'Berhasil menambahkan Pengguna!');

        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('users.home')->with('danger', 'Gagal menambahkan data pengguna!');

        }
        

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::find($id);

        return view('users.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email:dns',
            // 'role' => 'required',
        ]);
        $password = substr($request->email, 0, 3) . substr($request->name, 0, 3);

        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            // 'role' => $request->role,
            'password' => Hash::make($password)
        ]);

        return redirect()->route('users.home')->with('success', 'Berhasil mengubah data Pengguna!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id', $id)->delete();

        return redirect()->back()->with('delete', 'Berhasil menghapus data Pengguna     ');
    }
}