<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class Users extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', Auth::id())->get();

        return view('pages.users', [
            'title' => 'Users',
            'users' => $users,
        ]);
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'username' => 'required|max:100|unique:users',
            'email' => 'required|max:150|email|unique:users|email:dns',
            'password' => 'required|min:5|max:255',
            'confirm_password' => 'required|min:5|max:255|same:password',
            'level' => 'required',
        ]);


        User::create($validatedData);
        return redirect('/users')->with('success', 'Registration successful!');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/users')->with('success', 'User deleted successfully!');
    }

    public function update(Request $request, User $user)
    {
        try {
            $validatedData = $request->validate([
                'username' => 'required|max:100|unique:users,username,' . $user->id,
                'name' => 'required|max:100',
                'level' => 'required',
            ]);

            // Update user fields
            $user->update([
                'username' => $validatedData['username'],
                'name' => $validatedData['name'],
                'level' => $validatedData['level'],
            ]);

            return redirect('/users')->with('success', 'User updated successfully!');
        } catch (\Exception $e) {
            return redirect('/users')->with('error', 'Failed to update user. Please try again.');
        }
    }
}
