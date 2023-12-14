<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('profile.index', [
            'title' => 'Profile',
            'user' => User::where('id', auth()->user()->id)->first()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        return view('profile.edit', [
            'title' => 'Edit Profile',
            'user' => User::where('id', auth()->user()->id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|max:255',
            'image' => 'image|file|max:2048',
        ];

        $validatedData = $request->validate($rules);

        if($request->file('image')){
            if($user->image != null){
                Storage::delete($user->image);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        User::where('id', $user->id)
            ->update($validatedData);

        return redirect('/profile')->with('success', 'New user succesfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
