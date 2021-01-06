<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Orion\Http\Controllers\Controller;
use Orion\Concerns\DisableAuthorization;

class CommentController extends Controller
{
    use DisableAuthorization;
    protected $model = Comment::class;

    protected function includes() : array
    {
        return ['author', 'theme', 'comments'];
    }

    protected function afterStore(\Orion\Http\Requests\Request $request, Model $entity)
    {
        $entity->load('author');
    }

}
