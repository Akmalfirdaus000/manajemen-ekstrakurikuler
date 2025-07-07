<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::whereIn('role', ['guru', 'siswa'])->latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4',
            'role' => 'required|in:guru,siswa',
            'kelas' => 'nullable|string|max:50',
            'no_induk' => 'nullable|string|max:50',
            'nip' => 'nullable|string|max:50',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);
        return redirect()->route('admin.users')->with('message', 'User berhasil ditambahkan');
    }

    public function edit(User $user)
    {
        if (!in_array($user->role, ['guru', 'siswa'])) {
            abort(403);
        }
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        if (!in_array($user->role, ['guru', 'siswa'])) {
            abort(403);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'kelas' => 'nullable|string|max:50',
            'no_induk' => 'nullable|string|max:50',
            'nip' => 'nullable|string|max:50',
        ]);

        $user->update($validated);
        return redirect()->route('admin.users')->with('message', 'User berhasil diperbarui');
    }

    public function destroy(User $user)
    {
        if (!in_array($user->role, ['guru', 'siswa'])) {
            abort(403);
        }

        $user->delete();
        return redirect()->route('admin.users')->with('message', 'User berhasil dihapus');
    }
}
