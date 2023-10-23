<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function show()
    {
        return view('register');
    }
    public function store(StoreUserRequest $request)
    {
        $data = $request->all();
        $data['number'] = str_replace(['+', '-', '(', ')', ' '], '', $data['number']);
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        auth()->login($user);
        return redirect()->route('home');
    }
}
