<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.users.index', [
            'users' => User::paginate(5)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'image' => 'image|file|max:2048',
            'password' => 'required|min:5|max:255',
            'is_admin' => 'required'
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['password'] = Hash::make($validatedData['password']);
        //$validatedData['is_admin'] = (int)['is_admin'];


        User::create($validatedData);

        return redirect('/dashboard/users')->with('success', 'New user succesfully added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|max:255',
            'password' => 'required|min:5|max:255',
            'image' => 'image|file|max:2048',
            'is_admin' => 'required'
        ];

        if($request->username != $user->username){
            $rules['username'] = 'required|unique:users|min:3|max:255';
        }

        if($request->email != $user->email){
            $rules['email'] = 'required|email:dns|unique:users';
        }

        $validatedData = $request->validate($rules);

        if($request->file('image')){
            if($user->image != null){
                Storage::delete($user->image);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::where('id', $user->id)
            ->update($validatedData);

        return redirect('/dashboard/users')->with('success', 'New user succesfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {

        if($user->image){
            Storage::delete($user->image);
        }
        
        User::destroy($user->id);

        return redirect('/dashboard/users')->with('success', 'User has been successfully deleted!');
    }
}
