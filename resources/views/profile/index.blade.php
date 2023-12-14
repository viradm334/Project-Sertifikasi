@extends('layouts.main')

@section('container')


@if (session()->has('success'))

    <div class="alert alert-success col-lg-8" role="alert">
        {{ session('success') }}
    </div>
    
@endif

<div class="container rounded bg-white mt-3 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                <span class="font-weight-bold">{{ $user->name }}</span>
                <span class="text-black-50">{{ $user->email }}</span>
            </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Name</label><input type="text" class="form-control" placeholder="first name" value="{{ $user->name }}" disabled></div>
                    <div class="col-md-12"><label class="labels">Username</label><input type="text" class="form-control" placeholder="enter phone number" value="{{ $user->username }}" disabled></div>
                    <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control" placeholder="enter address line 1" value="{{ $user->email }}" disabled></div>
                    <div class="col-md-12"><label class="labels">Alamat</label><input type="text" class="form-control" placeholder="enter address line 2" value="{{ $user->address }}" disabled></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">No.HP</label><input type="text" class="form-control" placeholder="country" value="{{ $user->phone_number }}" disabled></div>
                    <div class="col-md-6"><label class="labels">Kota</label><input type="text" class="form-control" value="{{ $user->city }}" placeholder="state" disabled></div>
                </div>
                <div class="mt-5 text-center">
                    <a href="/profile/{{ $user->id }}/edit" class="btn btn-primary profile-button">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection

