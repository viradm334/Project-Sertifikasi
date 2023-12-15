<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Profiler\Profile;

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
            $name = $request->input('name');
            $username = $request->input('username');
            $email = $request->input('email');
            $address = $request->input('address');
            $phone_number = $request->input('phone_number');
            $city = $request->input('city');
            DB::table('users')
                ->where('id', '=', Auth::user()->id)
                ->update([
                    'name'=> $name,
                    'username' => $username,
                    'phone_number' => $phone_number,
                    'address' => $address,
                    'city'=> $city,
                    'email' => $email
                ]);
            return redirect('/profile')->with('updateProfile', "User succesfully updated!");
    }

    public function destroy(User $user)
    {
        //
    }
}
