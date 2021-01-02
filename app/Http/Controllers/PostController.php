<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Orion\Http\Controllers\Controller;
use Orion\Concerns\DisableAuthorization;

class PostController extends Controller
{
    use DisableAuthorization;
    protected $model = Post::class;

}
