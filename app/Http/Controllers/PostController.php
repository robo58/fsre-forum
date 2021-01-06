<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Orion\Http\Controllers\Controller;
use Orion\Concerns\DisableAuthorization;

class PostController extends Controller
{
    use DisableAuthorization;
    protected $model = Post::class;

    protected function includes() : array
    {
        return ['author', 'theme', 'comments'];
    }

    protected function afterShow(\Orion\Http\Requests\Request $request, Model $entity)
    {
        foreach ($entity->comments as $comment){
            $comment->load('author');
        }
    }

}
