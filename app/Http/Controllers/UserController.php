<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Orion\Http\Controllers\Controller;
use Orion\Concerns\DisableAuthorization;

class UserController extends Controller
{
    use DisableAuthorization;
    protected $model = User::class;

}
