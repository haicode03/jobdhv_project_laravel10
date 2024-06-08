<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\Models\Role;
use app\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        $users = User::with('role')->get();
        return view('admin/users/index', compact('users'));
    }

    public function create() {
        return view('admin/users/create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role_id' => 'required|in:2,3',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
        ]);

        return redirect()->route('admin/users/index')->with('success', 'Tạo người dùng thành công');
    }

    public function show($id) {
        $user = User::with('role')->findOrFail($id);
        return view('admin/users/show', compact('user'));
    }

    public function edit($id) {
        $user = User::findOrFail($id);
        return view('admin/users/edit', compact('user'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
        ]);

        return redirect()->route('admin/users/index')->with('success', 'Cập nhật người dùng thành công');
    }

    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin/users/index')->with('success', 'Xóa người dùng thành công');
    }
}
