<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Orion\Http\Controllers\Controller;
use Orion\Concerns\DisableAuthorization;

class CommentController extends Controller
{
    use DisableAuthorization;
    protected $model = Comment::class;

}
