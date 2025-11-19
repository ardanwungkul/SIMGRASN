<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data = User::paginate(10);
        return view('master.user.index', compact('data'));
    }
    public function create()
    {
        return view('master.user.create');
    }
    public function edit(User $user)
    {
        return view('master.user.edit', compact('user'));
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|max:30',
                'username' => 'required|unique:user|max:20',
                'email' => 'required|unique:user|max:30',
                'password' => 'required',
                'level' => 'required',
            ],
            [
                'name.max' => 'Nama User Tidak Boleh Lebih dari 30 Karakter',
                'username.max' => 'Username Tidak Boleh Lebih dari 20 Karakter',
                'email.max' => 'Email Tidak Boleh Lebih dari 30 Karakter',
            ]
        );

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->level = $request->level;
        $user->skpd = $request->skpd ?? '';
        $user->save();
        return redirect()->route('user.index')->with(['success' => 'Berhasil Menambahkan User']);
    }
    public function update(Request $request, User $user)
    {
        $request->validate(
            [
                'name' => 'required|max:30',
                'username' => 'required|max:20|unique:user,username,' . $user->id,
                'email' => 'required|max:30|unique:user,email,' . $user->id,
            ],
            [
                'name.max' => 'Nama User Tidak Boleh Lebih dari 30 Karakter',
                'username.max' => 'Username Tidak Boleh Lebih dari 20 Karakter',
                'email.max' => 'Email Tidak Boleh Lebih dari 30 Karakter',
            ]
        );
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        if ($request->has('password') && $request->password !== null) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect()->route('user.index')->with(['success' => 'Berhasil Mengubah User']);
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with(['success' => 'Berhasil Menghapus User']);
    }
}
