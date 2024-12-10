<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUserRequest;
use App\Models\NotaConsumo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EditUserController extends Controller
{

    public function indexUsers(){
        $excludeUserId = 1;

        $users = User::where('id', '!=', $excludeUserId)->paginate(10);

        return view('user-index', compact('users'));
    }


    public function deleteUsers($id) {

        if (!$user = User::find($id)) {
            return redirect()->route('users.index');
        }

        $user->delete();


        return redirect()->route('users.index')->with('success');
    }

    public function editUsers($id) {

        if (!$user = User::find($id)) {
            return redirect()->route('user-index');
        }

        return view('user-edit', compact('user'));
    }

    public function updateUsers(Request $request, $id) {

        if (!$user = User::find($id)) {
            return redirect()->route('users.index');
        }

        if ($request->name) {
            $data['name'] = $request->name;
        }

        if ($request->email) {
            $data['email'] = $request->email;
        }

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $data['is_admin'] = 0;

        if ($request->is_admin) {
            $data['is_admin'] = $request->is_admin;
        }

        $user->update($data);
        
        return redirect()->route('users.index')->with('success');
    }

}
