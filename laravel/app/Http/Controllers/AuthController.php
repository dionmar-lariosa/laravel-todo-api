<?php

namespace App\Http\Controllers;

use App\Traits\HttpResponses;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use HttpResponses;

    public function login()
    {
        return 'this is login';
    }

    public function register()
    {
        return 'this is login';
    }

    public function logout()
    {
        return 'this is login';
    }
}
