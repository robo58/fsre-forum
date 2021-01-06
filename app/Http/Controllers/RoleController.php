<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Orion\Http\Controllers\Controller;
use Orion\Concerns\DisableAuthorization;

class RoleController extends Controller
{
    use DisableAuthorization;
    protected $model = Role::class;

}
