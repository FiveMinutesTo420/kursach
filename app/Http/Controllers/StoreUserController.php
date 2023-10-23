<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;

class StoreUserController extends Controller
{
    public function __invoke(StoreUserRequest $request)
    {
        $data = $request;
    }
}
