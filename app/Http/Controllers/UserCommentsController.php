<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\RelationController;

class UserCommentsController extends RelationController
{
    use DisableAuthorization;

    protected $model = User::class;

    protected $relation = 'comments';


}
