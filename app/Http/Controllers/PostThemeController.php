<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\RelationController;

class PostThemeController extends RelationController
{
    use DisableAuthorization;

    protected $model = Post::class;

    protected $relation = 'theme';


}
