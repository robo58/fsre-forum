<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Orion\Http\Controllers\RelationController;
use Orion\Concerns\DisableAuthorization;

class CommentAuthorController extends RelationController
{
    use DisableAuthorization;

    protected $model = Comment::class;

    protected $relation = 'author';

}
